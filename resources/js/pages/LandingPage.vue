<template>
	<div>
		<div v-if="loading" class="container pt-md-6rem">
			<v-progress-circular indeterminate teal></v-progress-circular>
		</div>
		<div v-if="!loading">
			<div
				class="container pt-md-6rem"
				@mouseover="showEditHeaderButton = true"
				@mouseleave="showEditHeaderButton = false"
			>
				<v-row>
					<v-col
						data-aos="zoom-out-left"
						data-aos-easing="ease-in-out"
						data-aos-duration="1500"
						cols="12"
						lg="6"
						class="d=flex align-center order-md-1 order-2"
						@dblclick="editTitle = true"
					>
						<h1 class="text-h3 py-0 align-center-md">
							{{section.title}}
							<span class="teal--text">{{section.tealTitle }}</span>
						</h1>
						<h2 class="text-h4 text-subtitle py-0 align-center-md">{{section.subTitle}}</h2>
						<p
							v-if="!editWelcomeSubText"
							class="lead grey--text text-subtitle text-center text-md-left"
							style="white-space: pre-line !important;"
						>{{ section.welcomeSubText }}</p>
						<v-row>
							<v-col cols="12" lg="4" v-for="button in section.buttons" :key="button.id" :to="button.link">
								<v-btn dark :class="button.color + ' v-size--' + getBtnSize" class="btn-block">
									<v-icon class="mr-2">{{button.icon}}</v-icon>
									{{button.text}}
								</v-btn>
							</v-col>
						</v-row>
					</v-col>
					<v-col cols="12" lg="6" class="order-md-2 order-1">
						<v-btn dark fab absolute top right v-if="showEditHeaderButton" @click="editTitle = true">EDIT</v-btn>
						<v-img
							data-aos="zoom-in"
							data-aos-easing="ease-in-out"
							data-aos-duration="1500"
							height="350"
							contain
							:src="section.landingImage"
						></v-img>
						<div class="text-right">
							<div v-html="section.landingImageCaption"></div>
						</div>
					</v-col>
				</v-row>
			</div>

			<v-dialog v-model="editTitle" width="600px">
				<v-card>
					<v-toolbar color="teal" dark>
						<v-toolbar-title>Edit Content</v-toolbar-title>
						<v-spacer></v-spacer>
						<v-btn text @click="editTitle = false">Close</v-btn>
					</v-toolbar>
					<v-container fluid pt-3>
						<v-row>
							<v-col cols="12" sm="6">
								<v-text-field
									class="pb-3"
									v-model="section.title"
									@keyup="save"
									outlined
									label="Title Text"
									color="teal"
									:hint="hint"
									placeholder="Text Entered Here Will be Black"
								></v-text-field>
							</v-col>
							<v-col cols="12" sm="6">
								<v-text-field
									class="pb-3"
									style="color: teal !important"
									v-model="section.tealTitle"
									@keyup="save"
									outlined
									label="Teal Text Title"
									color="teal"
									:hint="hint"
									placeholder="Text Entered Here Will be Teal"
								></v-text-field>
							</v-col>
						</v-row>
						<v-row>
							<v-col cols="12" sm="12">
								<v-text-field
									class="pb-3"
									v-model="section.subTitle"
									@keyup="save"
									outlined
									label="Sub Title Text"
									:hint="hint"
									placeholder="Enter Sub Title If Needed"
									color="teal"
								></v-text-field>
							</v-col>
						</v-row>
						<v-textarea
							class="pb-3"
							color="teal"
							v-model="section.welcomeSubText"
							@keyup="save"
							label="Welcome Text"
							outlined
							:hint="hint"
						></v-textarea>
						<v-card-actions hidden>
							<v-spacer></v-spacer>
							<v-btn text @click="editTitle = false">Close</v-btn>
						</v-card-actions>
					</v-container>
				</v-card>
			</v-dialog>

			<v-card flat tile class="grey lighten-2 mb-md-10">
				<!-- <v-parallax src="/images/grey.jpg" min-height="350"> -->
				<v-container fluid>
					<v-row class="py-5">
						<v-col
							cols="12"
							lg="4"
							data-aos="flip-left"
							data-aos-duration="1500"
							v-for="(card, index) in section.actioncards"
							:key="card.id"
						>
							<v-card class="text-center" @mouseover="showEditCard(card.id)" @mouseleave="showEditCard(0)">
								<v-btn
									small
									fab
									class="mt-2"
									absolute
									right
									v-if="showEditCardOneButton && card.id == 1"
									@click="onEditCard(index)"
								>
									<v-icon small :color="card.color">fa-edit</v-icon>
								</v-btn>
								<v-btn
									small
									fab
									class="mt-2"
									absolute
									right
									v-if="showEditCardTwoButton && card.id == 2"
									@click="onEditCard(index)"
								>
									<v-icon small :color="card.color">fa-edit</v-icon>
								</v-btn>
								<v-btn
									small
									fab
									class="mt-2"
									absolute
									right
									v-if="showEditCardThreeButton && card.id == 3"
									@click="onEditCard(index)"
								>
									<v-icon small :color="card.color">fa-edit</v-icon>
								</v-btn>
								<v-card-title class="p-1" :class="card.color"></v-card-title>
								<v-card-text>
									<div class="text-h4 pt-2 mb-5" v-text="card.title"></div>
									<v-avatar size="66" class="mb-5">
										<v-icon
											v-if="card.icon != 'fa-flag-usa'"
											v-text="card.icon"
											size="32"
											class="white--text"
											:class="card.color"
										/>
									</v-avatar>
									<p class="text-gray-700 mb-5" v-text="card.text"></p>
									<v-chip v-text="card.chip"></v-chip>
								</v-card-text>
								<!-- </v-img> -->
							</v-card>
						</v-col>
					</v-row>
				</v-container>
				<!-- </v-parallax> -->
			</v-card>

			<v-dialog v-model="showEditCardDialog" width="600px">
				<v-card>
					<v-toolbar :color="editedCard.color" dark>
						<v-toolbar-title>Edit Card Style &amp; Content</v-toolbar-title>
						<v-spacer></v-spacer>
						<v-btn text @click="showEditCardDialog = false">Close</v-btn>
					</v-toolbar>
					<v-container fluid pt-3>
						<v-row>
							<v-col cols="12">
								<v-select
									class="pb-3"
									:items="actioncardsColorsList"
									v-model="editedCard.color"
									@keyup="save"
									@change="save"
									outlined
									label="Card Color"
									:color="editedCard.color"
								>
									<template slot="item" slot-scope="data">
										<v-icon class="mr-3" :color="data.item">fa-square</v-icon>
										<span class="cb-item">{{data.item}}</span>
									</template>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color">fa-square fa-fw</v-icon>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
												>fa-info-circle fa-fw</v-icon>
											</template>This option sets the color for the card and central icon
										</v-tooltip>
									</template>
								</v-select>
							</v-col>
							<v-col cols="12">
								<v-text-field
									class="pb-3"
									v-model="editedCard.title"
									@keyup="save"
									outlined
									label="Title Text"
									:color="editedCard.color"
								>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color">fa-pencil-alt fa-fw</v-icon>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
												>fa-info-circle fa-fw</v-icon>
											</template>This text will appear above the central icon
										</v-tooltip>
									</template>
								</v-text-field>
							</v-col>
							<v-col cols="12">
								<v-select
									class="pb-3"
									:items="actioncardsIconsList"
									v-model="editedCard.icon"
									@keyup="save"
									@change="save"
									outlined
									label="Card Icon"
									:color="editedCard.color"
								>
									<template slot="item" slot-scope="data">
										<v-icon class="mr-3" :color="editedCard.color">{{data.item}} fa-fw</v-icon>
										<span class="cb-item">{{data.item}}</span>
									</template>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color">{{editedCard.icon}} fa-fw</v-icon>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
												>fa-info-circle fa-fw</v-icon>
											</template>The selected icon will appear in the central of the card with a coloured circle background
										</v-tooltip>
									</template>
								</v-select>
							</v-col>
							<v-col cols="12">
								<v-text-field
									class="pb-3"
									v-model="editedCard.text"
									@keyup="save"
									outlined
									label="Card Text"
									:color="editedCard.color"
								>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color">fa-pencil-alt fa-fw</v-icon>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
												>fa-info-circle fa-fw</v-icon>
											</template>This text will appear below the central icon
										</v-tooltip>
									</template>
								</v-text-field>
							</v-col>
							<v-col cols="12">
								<v-text-field
									class="pb-3"
									v-model="editedCard.chip"
									@keyup="save"
									outlined
									label="Bottom Text"
									:color="editedCard.color"
								>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color">fa-comment-medical fa-fw</v-icon>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
												>fa-info-circle fa-fw</v-icon>
											</template>Text here will appear in the grey bar at the bottom of the card. Email addresses and phone numbers work best here.
										</v-tooltip>
									</template>
								</v-text-field>
							</v-col>
						</v-row>
					</v-container>
				</v-card>
			</v-dialog>

			<v-container class="z2 pb-md-30" id="example-anchor">
				<v-card
					class="z2"
					elevation="8"
					style="min-height: 400px;"
					data-aos="zoom-in-up"
					data-aos-duration="1000"
					data-aos-anchor="#example-anchor"
				>
					<v-toolbar dark flat class="teal" src>
						<v-toolbar-title class="text-uppercase text-h4 py-2">{{section.tealTitle}} Pages</v-toolbar-title>
						<v-tooltip left>
							<template v-slot:activator="{ on, attrs }">
								<v-btn
									v-bind="attrs"
									v-on="on"
									small
									dark
									fab
									absolute
									bottom
									right
									color="green"
									:to="'/p2' + section.link + '/newpage'"
								>
									<v-icon small>fa fa-plus fa-fw</v-icon>
								</v-btn>
							</template>
							Add New Page
						</v-tooltip>
					</v-toolbar>
					<v-list two-line shaped class="grey lighten-5">
						<v-row>
							<v-col cols="12" md="6" v-for="page in pages" :key="page.id">
								<v-list-item :to="'/p2' + section.link + '/' + page.slug">
									<v-list-item-avatar class="mr-3">
										<!-- <v-icon :class="[item.iconClass]" v-text="item.icon"></v-icon> -->
										<v-icon class="teal--text">fa-book-open</v-icon>
									</v-list-item-avatar>
									<v-list-item-content>
										<v-list-item-title v-html="page.title" class></v-list-item-title>
										<v-list-item-subtitle v-html="page.subtitle" class="text--secondary"></v-list-item-subtitle>
									</v-list-item-content>
									<v-list-item-action>
										<v-chip v-if="chipStatusShow(page)" small color="teal" dark>{{chipStatusText(page)}}</v-chip>
									</v-list-item-action>
								</v-list-item>
							</v-col>
						</v-row>
					</v-list>
				</v-card>
			</v-container>
			<div
				data-aos="fade-up"
				data-aod-delay="100"
				data-aos-duration="1500"
				class="position-relative mt-n16"
			>
				<div class="shape shape-bottom shape-fluid-x svg-shim teal--text text--darken-4">
					<svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
					</svg>
				</div>
			</div>
			<div class="teal darken-4">
				<v-card class="teal darken-4" min-height="400px"></v-card>
			</div>
		</div>
	</div>
</template>
<script>
import Axios from "axios";
import moment from "moment";
import AOS from "aos";

export default {
	props: ["id", "sectionname"],
	watch: {
		$route: function() {
			this.getContent();
			alert("ALERT");
		}
	},
	data() {
		return {
			loading: true,
			section: {},
			pages: {},
			showEditHeaderButton: false,
			showEditCardOneButton: false,
			showEditCardTwoButton: false,
			showEditCardThreeButton: false,
			showEditCardDialog: false,
			editedCard: "",
			actioncardsColorsList: [
				"deep-purple",
				"purple",
				"pink",
				"indigo",
				"blue darken-4",
				"blue",
				"light-blue",
				"teal",
				"green",
				// "light-green accent-3",
				"yellow darken-2",
				"orange darken-2",
				"red",
				"grey"
			],
			actioncardsIconsList: [
				"fa-at",
				"fa-envelope-open-text",
				"fa-voicemail",
				"fa-phone",
				"far fa-address-book",
				"fa-award",
				"fa-balance-scale",
				"fa-balance-scale-left",
				"fa-balance-scale-right",
				"fa-ban",
				"fa-bell",
				"fa-book",
				"fa-bookmark",
				"fa-bug",
				"fa-building",
				"fa-calculator",
				"far fa-calendar-alt",
				"fa-car",
				"fa-cat",
				"far fa-chart-bar",
				"fa-chart-pie",
				"fa-check",
				"fa-chalkboard-teacher",
				"fa-child",
				"fa-clipboard-list",
				"far fa-comment",
				"fa-directions",
				"fa-exclamation",
				"fa-file-alt",
				"fa-cat",
				"fa-cat",
				"fa-cat",
				"fa-cat"
			],
			editWelcomeSubText: false,
			editTitle: false,
			typing: false
		};
	},
	created() {
		this.loading = true;
		AOS.init({
			debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
		});
	},
	mounted() {
		this.scrollToTop();
		this.getContent();
	},
	methods: {
		getContent() {
			this.loading = true;
			this.scrollToTop();
			axios
				.get("/get/sectionlanding/" + this.$route.name)
				.then(({ data }) => {
					this.section = data;
				})
				.then(() => {
					this.getPages();
				});
		},
		getPages() {
			this.loading = true;
			axios.get("/get/listpages/" + this.section.id).then(({ data }) => {
				this.pages = data;
				setTimeout(() => {
					this.loading = false;
				}, 550);
			});
		},
		scrollToTop() {
			window.scrollTo(0, 0);
		},
		hideEditWelcomeSubText() {
			this.editWelcomeSubText = false;
		},
		hideEditTitle() {
			this.editTitle = false;
		},
		showEditCard(id) {
			console.log("BOOM! - " + id);
			if (id == 1) {
				this.showEditCardOneButton = true;
				this.showEditCardTwoButton = false;
				this.showEditCardThreeButton = false;
			}
			if (id == 2) {
				this.showEditCardOneButton = false;
				this.showEditCardTwoButton = true;
				this.showEditCardThreeButton = false;
			}
			if (id == 3) {
				this.showEditCardOneButton = false;
				this.showEditCardTwoButton = false;
				this.showEditCardThreeButton = true;
			}
			if (id == 0) {
				this.showEditCardOneButton = false;
				this.showEditCardTwoButton = false;
				this.showEditCardThreeButton = false;
			}
		},
		onEditCard(index) {
			console.log(this.section.actioncards[index]);
			this.showEditCardDialog = true;
			this.editedCard = this.section.actioncards[index];
			this.editedCard.index = index;
		},
		save(event) {
			if (!this.typing) {
				setTimeout(() => {
					console.log(event.key);
					this.typing = false;
					axios
						.put("/put/updateSectionLanding/" + this.section.id, this.section)
						.then(res => {
							if (res.status == 200) {
								console.log(res.status);
							}
						});
				}, 1750);
			}
			this.typing = true;
		},
		newPage() {
			console.log("NEW PAGE CLICK");
		},
		chipStatusShow(page) {
			var now = moment();
			var updatedAt = moment(page.updated_at);
			var createdAt = moment(page.created_at);
			if (moment(updatedAt).isAfter(moment(createdAt.add(5, "d")))) {
				return true;
			}
			if (moment(createdAt).isAfter(moment(now).subtract(7, "d"))) {
				return true;
			}
			return false;
		},
		chipStatusText(page) {
			var now = moment();
			var updatedAt = moment(page.updated_at);
			var createdAt = moment(page.created_at);
			if (moment(updatedAt).isAfter(moment(createdAt.add(5, "d")))) {
				return "Updated";
			}
			if (moment(createdAt).isAfter(moment(now).subtract(7, "d"))) {
				return "New";
			}
			return "";
		}
	},
	computed: {
		getBtnSize() {
			if (this.$vuetify.breakpoint.lgAndUp) {
				return "x-large";
			}
			if (this.$vuetify.breakpoint.mdAndUp) {
				return "large";
			}
			if (this.$vuetify.breakpoint.smAndDown) {
				return "small";
			}
		},
		hint() {
			if (this.typing == true) {
				return "Typing...";
			}
			if (this.typing == false) {
				return "Saved";
			}
		}
	}
};
</script>
<style lang="scss" scoped>
.z1 {
	z-index: 1;
}
.z2 {
	z-index: 2;
}
.mt-n16,
.my-n16 {
	margin-top: -25rem !important;
}
.position-relative {
	position: relative !important;
}

.shape:not([class*="shape-blur"]) {
	overflow: hidden;
}
.shape-bottom {
	right: 0;
	bottom: 0;
	left: 0;
}
.shape {
	position: absolute;
	pointer-events: none;
}
.text-dark {
	color: #009688 !important;
}

.shape:not([class*="shape-blur"]) > * {
	-webkit-transform: scale(2);
	transform: scale(2);
}
.shape-fluid-x > * {
	width: 100%;
	height: auto;
}
.shape-bottom > * {
	-webkit-transform-origin: top center;
	transform-origin: top center;
}
.shape > * {
	display: block;
}
svg {
	overflow: hidden;
	vertical-align: middle;
}

.v-input input {
	color: teal !important;
}
</style>
