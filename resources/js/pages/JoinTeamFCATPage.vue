<template>
	<div>
		<div v-if="loading" class="container pt-md-6rem">
			<v-progress-circular indeterminate teal></v-progress-circular>
		</div>
		<div v-if="!loading">
			<v-app-bar
				absolute
				elevate-on-scroll
				color="grey lighten-3"
				style="position: sticky; top: 64px"
			>
				<v-toolbar-title>Join TeamFCAT</v-toolbar-title>

				<v-spacer></v-spacer>
				<a href="#support">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp"
						>Link</v-btn
					>
				</a>
				<a href="#safeguarding">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp"
						>Link</v-btn
					>
				</a>
				<a href="#google">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp"
						>Link</v-btn
					>
				</a>
				<a href="#microsoft">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp"
						>Link</v-btn
					>
				</a>
				<a href="#internalvacancies">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp"
						>Internal Vacancies</v-btn
					>
				</a>
				<a href="#research">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp"
						>Link</v-btn
					>
				</a>
			</v-app-bar>

			<Banner />
			<Vacancies />
			<SectionOne />
			<SectionTwo />
			<SectionThree />
			<SectionFour />
			<SectionFive />
		</div>
	</div>
</template>
<script>
import Axios from "axios";
import moment from "moment";
import AOS from "aos";

import Banner from "./join/Banner.vue";
import SectionOne from "./join/SectionOne.vue";
import SectionTwo from "./join/SectionTwo.vue";
import SectionThree from "./join/SectionThree.vue";
import SectionFour from "./join/SectionFour.vue";
import Vacancies from "./join/Vacancies.vue";
import SectionFive from "./join/SectionFive.vue";

export default {
	components: {
		Banner,
		SectionOne,
		SectionTwo,
		SectionThree,
		SectionFour,
		Vacancies,
		SectionFive,
	},
	props: ["id", "sectionname"],
	watch: {
		// $route: function() {
		// 	this.getContent();
		// 	alert("ALERT");
		// }
	},
	data() {
		return {
			loading: true,
			updates: {},
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
				"grey",
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
				"fa-cat",
			],
			editWelcomeSubText: false,
			editTitle: false,
			typing: false,
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
			axios.get("/get/remotetlupdates").then(({ data }) => {
				this.updates = data.updates;
			});
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
			this.showEditCardDialog = true;
			this.editedCard = this.section.actioncards[index];
			this.editedCard.index = index;
		},
		save(event) {
			if (!this.typing) {
				setTimeout(() => {
					this.typing = false;
					axios
						.put("/put/updateSectionLanding/" + this.section.id, this.section)
						.then((res) => {
							if (res.status == 200) {
								console.log(res.status);
							}
						});
				}, 1750);
			}
			this.typing = true;
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
		},
		cardtrans(id) {
			if (id == 1) {
				return "zoom-out-right";
			}
			if (id == 2) {
				return "zoom-in";
			}
			if (id == 3) {
				return "zoom-in-left";
			}
		},
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
		},
	},
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
.vh-rtl-100 {
	min-height: calc(100vh - 128px);
}
section:before {
	content: "";
	display: block;
	height: 100px;
}
section:after {
	content: "";
	display: block;
	height: 100px;
}

@-webkit-keyframes AnimationName {
	0% {
		background-position: 10% 0%;
	}
	50% {
		background-position: 91% 100%;
	}
	100% {
		background-position: 10% 0%;
	}
}
@-moz-keyframes AnimationName {
	0% {
		background-position: 10% 0%;
	}
	50% {
		background-position: 91% 100%;
	}
	100% {
		background-position: 10% 0%;
	}
}
@keyframes AnimationName {
	0% {
		background-position: 10% 0%;
	}
	50% {
		background-position: 91% 100%;
	}
	100% {
		background-position: 10% 0%;
	}
}
</style>
