<template>
	<section id="twitterfeeds">
		<v-container>
			<header class="display-3 pb-3 white--text">
				<v-icon class="mr-2 white--text" style="font-size: 5rem;">fab fa-twitter</v-icon>Twitter Feeds
			</header>
			<v-row>
				<v-col cols="12" md="3">
					<v-card>
						<v-list>
							<v-subheader>Filter Feed</v-subheader>
							<v-list-item-group v-model="showTwitterCard" color="teal">
								<template v-for="school in schools">
									<v-list-item :key="school.id" :value="school.name">
										<v-list-item-icon class="mr-2">
											<v-icon small>fa-at</v-icon>
										</v-list-item-icon>
										<v-list-item-content>
											<v-list-item-title v-text="school.name"></v-list-item-title>
										</v-list-item-content>
									</v-list-item>
									<v-divider class="py-0 my-0" v-if="school.id < schools.length - 1" :key="school.id + 100"></v-divider>
								</template>
							</v-list-item-group>
						</v-list>
					</v-card>
				</v-col>
				<v-col :class="mook()">
					<v-card
						v-for="school in schools"
						:key="school.id"
						:value="school.name"
						:class="filterTwitter(school.name)"
					>
						<a
							class="twitter-timeline"
							:href="'https://twitter.com/'+school.handle+'?ref_src=twsrc%5Etfw'"
							data-lang="en"
							data-height="655"
						></a>
					</v-card>
				</v-col>
				<v-col
					cols="12"
					md="4"
					style="min-width: 100px; max-width: 100%;"
					class="flex-grow-1 flex-shrink-0"
				>
					<v-card>
						<a
							class="twitter-timeline"
							href="https://twitter.com/tex4spete/lists/fcat-13317?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="655"
						>A Twitter List by tex4spete</a>
					</v-card>
				</v-col>
			</v-row>
		</v-container>
	</section>
</template>
<script>
export default {
	data() {
		return {
			showTwitterCard: "Armfield",
			schools: [
				{
					id: 0,
					name: "FCAT",
					handle: "FCATrust"
				},
				{
					id: 1,
					name: "Armfield",
					handle: "ArmfieldFCAT"
				},
				{
					id: 2,
					name: "Aspire",
					handle: "blackpoolaspire"
				},
				{
					id: 3,
					name: "Garstang",
					handle: "GarstangAcademy"
				},
				{
					id: 4,
					name: "Gateway",
					handle: "GatewayFCAT"
				},
				{
					id: 5,
					name: "Hambleton",
					handle: "HambletonFCAT"
				},
				{
					id: 6,
					name: "Mereside",
					handle: "MeresidePrimary"
				},
				{
					id: 7,
					name: "Montgomery",
					handle: "MontgomeryFCAT"
				},
				{
					id: 8,
					name: "Unity",
					handle: "UnityBlackpool"
				},
				{
					id: 9,
					name: "Westcliff",
					handle: "WestcliffFCAT"
				},
				{
					id: 10,
					name: "Westminster",
					handle: "WestminsterFCAT"
				}
			]
		};
	},
	mounted() {
		let embedTwitter = document.createElement("script");
		embedTwitter.setAttribute("src", "https://platform.twitter.com/widgets.js");
		document.head.appendChild(embedTwitter);
	},
	created() {
		this.showTwitterCard = this.getSchool;
	},
	methods: {
		filterTwitter(school) {
			if (this.showTwitterCard != school) {
				return "hidden";
			}
		},
		mook() {
			if (this.showTwitterCard != undefined) {
				return "col-12 col-md-4 offset-md-1";
			} else {
				return "col-1";
			}
		}
	},
	computed: {
		getSchool() {
			return this.$store.getters.getSchool;
		}
	}
};
</script>
<style scoped>
section {
	background: linear-gradient(91deg, #00d2ff, #3a47d5);
	background-size: 400% 400%;

	-webkit-animation: AnimationName 14s ease infinite;
	-moz-animation: AnimationName 14s ease infinite;
	animation: AnimationName 14s ease infinite;
}

@-webkit-keyframes AnimationName {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
@-moz-keyframes AnimationName {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
@keyframes AnimationName {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
.hidden {
	display: none;
}
blockquote.twitter-tweet {
	display: inline-block;
	font-family: "Helvetica Neue", Roboto, "Segoe UI", Calibri, sans-serif;
	font-size: 12px;
	font-weight: bold;
	line-height: 16px;
	border-color: #eee #ddd #bbb;
	border-radius: 5px;
	border-style: solid;
	border-width: 1px;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
	margin: 10px 5px;
	padding: 0 16px 16px 16px;
	max-width: 468px;
}

blockquote.twitter-tweet p {
	font-size: 16px;
	font-weight: normal;
	line-height: 20px;
}

blockquote.twitter-tweet a {
	color: inherit;
	font-weight: normal;
	text-decoration: none;
	outline: 0 none;
}

blockquote.twitter-tweet a:hover,
blockquote.twitter-tweet a:focus {
	text-decoration: underline;
}
.timeline-Header-subtitle {
	display: none !important;
}
</style>
