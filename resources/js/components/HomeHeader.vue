<template>
	<section class="headerx pb-0">
		<v-container class>
			<v-row>
				<v-col cols="12" lg="8">
					<v-carousel height="450" :cycle="true" :interval="5000" :show-arrows="false">
						<v-carousel-item>
							<v-card>
								<v-system-bar dark height="8" color="blue"></v-system-bar>
								<v-sheet color="grey lighten-2">
									<v-img height="550" src="/images/armfield-banner.jpg"></v-img>
								</v-sheet>
							</v-card>
						</v-carousel-item>
						<v-carousel-item>
							<v-card>
								<v-system-bar dark height="8" color="blue"></v-system-bar>
								<v-sheet color="grey lighten-2">
									<v-img height="550" src="/images/gateway-banner.jpg"></v-img>
								</v-sheet>
							</v-card>
						</v-carousel-item>
						<v-carousel-item>
							<v-card>
								<v-system-bar dark height="8" color="purple darken-1"></v-system-bar>
								<v-sheet color="purple lighten-2">
									<v-img height="550" src="/images/aspire-banner-1.jpg"></v-img>
								</v-sheet>
							</v-card>
						</v-carousel-item>
						<v-carousel-item>
							<v-card>
								<v-system-bar dark height="8" color="blue darken-2"></v-system-bar>
								<v-sheet color="blue lighten-2">
									<v-img height="550" src="/images/westcliff-banner.jpg"></v-img>
								</v-sheet>
							</v-card>
						</v-carousel-item>
						<v-carousel-item>
							<v-card>
								<v-system-bar dark height="8" color="orange darken-2"></v-system-bar>
								<v-sheet color="grey lighten-2">
									<v-img height="550" src="/images/garstang-banner.jpg"></v-img>
								</v-sheet>
							</v-card>
						</v-carousel-item>
					</v-carousel>
				</v-col>
				<v-col cols="12" lg="4" class="hidden">
					<v-card height="450">
						<a
							class="twitter-timeline"
							href="https://twitter.com/FCATrust?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="450"
							data-dnt="true"
						>Tweets by FCATrust</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card class="align-self-stretch">
						<v-system-bar dark height="8" color="teal lighten-2"></v-system-bar>
						<v-toolbar dark class="teal">
            <v-list-item>
							<v-list-item-avatar>
								<v-icon>fas fa-rss fa-fw</v-icon>
							</v-list-item-avatar>
							<v-list-item-content>
								<v-list-item-title class="h5">LATEST UPDATES</v-list-item-title>
								<v-list-item-subtitle></v-list-item-subtitle>
							</v-list-item-content>
						</v-list-item>
						</v-toolbar>
						<v-list two-line>
							<v-list-item link v-for="(page, i) in latest" :key="i" :to="page.link">
								<v-list-item-avatar>
									<v-icon class="teal--text">far fa-file-alt fa-fw</v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title v-text="page.title"></v-list-item-title>
									<v-list-item-subtitle v-text="page.subtitle"></v-list-item-subtitle>
								</v-list-item-content>
							</v-list-item>
						</v-list>
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
			latest: []
		};
	},
	mounted() {
		let embedTwitter = document.createElement("script");
		embedTwitter.setAttribute("src", "https://platform.twitter.com/widgets.js");
		document.head.appendChild(embedTwitter);
		this.getLatestPages();
	},
	methods: {
		getLatestPages() {
			axios
				.get("/get/latestpages/")
				.then(({ data }) => {
					this.latest = data.latest;
				})
				.then(() => {
					// this.getPages();
				});
		}
	}
};
</script>
<style scoped>
section {
	background: linear-gradient(147deg, #fafafa, #bebebe, #a5a5a5);
	background-size: 600% 600%;

	-webkit-animation: AnimationName 16s ease infinite;
	-moz-animation: AnimationName 16s ease infinite;
	animation: AnimationName 16s ease infinite;
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
.hidden {
	display: none;
}
</style>
