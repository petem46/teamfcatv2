<template>
	<section class="headerx py-0">
		<v-container>
			<v-row>
				<v-col cols="12" lg="8">
					<v-carousel height="450" :cycle="true" :interval="5000" :show-arrows="false">
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
				<v-col cols="12" lg="4">
					<v-card light class="d-flex align-stretch">
						<v-carousel
							height="450"
							:cycle="true"
							:interval="3500"
							hide-delimiters
							:show-arrows="false"
							vertical
						>
							<v-carousel-item>
								<v-card height="450">
									<a
										class="twitter-timeline"
										href="https://twitter.com/FCATrust?ref_src=twsrc%5Etfw"
										data-lang="en"
										data-height="450"
										data-dnt="true"
									>Tweets by MontgomeryFCAT</a>
								</v-card>
							</v-carousel-item>
							<v-carousel-item>
								<v-card height="450">
									<v-system-bar dark height="8" color="orange darken-2"></v-system-bar>
									<v-sheet color="grey lighten-2">
										<v-img src="/images/seans-letter-image.jpg" height="200"></v-img>
									</v-sheet>
									<v-system-bar dark height="1" color="black"></v-system-bar>
									<v-list>
										<v-list-item>
											<v-list-item-avatar>
												<v-img src="/images/sean.jpg" position="top center"></v-img>
											</v-list-item-avatar>
											<v-list-item-content>
												<v-list-item-title class="h5">Sean's Weekly Letter</v-list-item-title>
												<v-list-item-subtitle>Monday 9th November 2020</v-list-item-subtitle>
											</v-list-item-content>
											<v-list-item-action>
												<v-btn icon>
													<v-icon color="grey lighten-1">mdi-information</v-icon>
												</v-btn>
											</v-list-item-action>
										</v-list-item>
									</v-list>
								</v-card>
							</v-carousel-item>
							<v-carousel-item>
								<v-card height="450">
									<v-system-bar dark height="8" color="blue lighten-2"></v-system-bar>
									<v-sheet color="grey lighten-2">
										<v-img src="/images/covid-update-image.jpg" height="200"></v-img>
									</v-sheet>
									<v-system-bar dark height="1" color="black"></v-system-bar>
									<v-card-title>
										<v-avatar size="64" class="mr-2">
											<v-img src="/images/jane.jpg" position="top center"></v-img>
										</v-avatar>COVID-19 UPDATES
									</v-card-title>
									<v-card-text>Please remember to check the COVID-19 page for important updates and links to key information from FCAT and the Department for Education</v-card-text>
								</v-card>
							</v-carousel-item>
							<v-carousel-item>
								<v-card height="450">
									<v-system-bar dark height="8" color="teal"></v-system-bar>
									<v-sheet color="red lighten-2">
										<v-img src="/images/1_FINAL_JPG_FCAT_Work_-_Wellbeing_Charter.jpg" height="200"></v-img>
									</v-sheet>
									<v-system-bar dark height="1" color="black"></v-system-bar>
									<v-card-title>
										<v-avatar size="64" class="mr-2" color="red">
											<!-- <v-img src="/images/sean.jpg" position="top center"></v-img> -->
											<v-icon dark>fa-heartbeat fa-fw</v-icon>
										</v-avatar>Work &amp; Wellbeing Charter
									</v-card-title>
									<v-card-text>
										<v-skeleton-loader boilerplate type="list-item-three-line"></v-skeleton-loader>
									</v-card-text>
									<!-- <v-divider></v-divider> -->
									<v-card-actions>
										<v-spacer></v-spacer>
										<v-btn text color="teal">Read More</v-btn>
									</v-card-actions>
								</v-card>
							</v-carousel-item>
						</v-carousel>
					</v-card>
				</v-col>
			</v-row>
		</v-container>
	</section>
</template>
<script>
export default {
	mounted() {
		let embedTwitter = document.createElement("script");
		embedTwitter.setAttribute("src", "https://platform.twitter.com/widgets.js");
		document.head.appendChild(embedTwitter);
	}
};
</script>
<style scoped>
section {
	background-image: linear-gradient(
		to top,
		#d5d4d0 0%,
		#d5d4d0 1%,
		#eeeeec 31%,
		#efeeec 75%,
		#e9e9e7 100%
	);
}
.hidden {
	display: none;
}
</style>
