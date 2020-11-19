<template>
	<section id="twitterfeeds">
		<v-container>
			<header class="display-3 pb-3 white--text">
				<v-icon class="mr-2 white--text" style="font-size: 5rem;">fab fa-twitter</v-icon>Twitter Feeds
			</header>
			<v-row>
				<v-col cols="2" md="3">
					<v-card>
						<v-list subtitle>
							<v-subheader>Select Feed</v-subheader>
							<v-list-item-group v-model="showTwitterCard" color="teal">
								<template v-for="(school, i) in schools">
									<v-list-item :key="i+school" :value="school">
										<v-list-item-icon>
											<v-icon>fa-at</v-icon>
										</v-list-item-icon>
										<v-list-item-content>
											<v-list-item-title v-text="school"></v-list-item-title>
										</v-list-item-content>
									</v-list-item>
									<v-divider class="py-0 my-0" v-if="i < schools.length - 1" :key="i"></v-divider>
								</template>
							</v-list-item-group>
						</v-list>
					</v-card>
				</v-col>
				<v-col cols="10" md="6" offset-md="2">
					<v-card v-for="(school, i) in schools" :key="i" :value="school" :class="filterTwitter(school)">
						<a
							class="twitter-timeline"
							:href="'https://twitter.com/'+school+'?ref_src=twsrc%5Etfw'"
							data-lang="en"
							data-height="585"
						>Tweets by {{ school }}</a>
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
			showTwitterCard: ["FCATrust"],
			schools: [
				"ArmfieldFCAT",
				"blackpoolaspire",
				"GarstangAcademy",
				"GatewayFCAT",
				"MeresidePrimary",
				"MontgomeryFCAT",
				"UnityBlackpool",
				"WestcliffFCAT",
				"WestminsterFCAT",
				"FCATrust"
			]
		};
	},
	mounted() {
		let embedTwitter = document.createElement("script");
		embedTwitter.setAttribute("src", "https://platform.twitter.com/widgets.js");
		document.head.appendChild(embedTwitter);
	},
	created() {},
	methods: {
		getSchool() {
			this.showTwitterCard = this.$store.getters.getUser;
			this.showTwitterCard = this.showTwitterCard.school;
		},
		filterTwitter(school) {
			if (this.showTwitterCard != school) {
				return "hidden";
			}
		}
	},
	computed: {}
};
</script>
<style scoped>
section {
	background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%);
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
</style>
