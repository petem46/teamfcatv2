<template>
	<div>
		<section class="headerx">
			<v-container>
				<v-row></v-row>
				<v-row>
					<v-col cols="12" lg="8">
						<v-carousel height="450" :cycle="true" :interval="5000" :show-arrows="false">
							<!-- <v-carousel-item v-for="(slide, i) in slides" :key="i">
									<v-sheet :color="colors[i]" height="100%" tile>
										<v-row class="fill-height" align="center" justify="center">
											<div class="display-3">{{ slide }} Slide</div>
										</v-row>
									</v-sheet>
							</v-carousel-item>-->
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
							<v-carousel height="450" :cycle="true" :interval="3500" hide-delimiters :show-arrows="false" vertical>
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
								<v-carousel-item></v-carousel-item>
								<v-carousel-item></v-carousel-item>
							</v-carousel>
						</v-card>
					</v-col>
				</v-row>
			</v-container>
		</section>
		<section class="mt-n15 hidden">
			<div class="mt-n15">
				<svg
					data-name="Layer 1"
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 1200 80"
					preserveAspectRatio="none"
				/>
			</div>
		</section>
		<section class="header white--text">
			<div class="ticker box hidden">
				<article class="media">
					<span class="breaking-news media-left">Breaking News</span>
					<div class="media-content">
						<transition name="fade" mode="out-in">
							<span class="time">
								{{news[0].time}}:
								<a class="news" href="#">{{news[0].summary}}</a>
							</span>
						</transition>
					</div>
				</article>
			</div>
			<v-container>
				<v-row py-3>
					<v-col class="text-center h3 m-0">INTEGRITY</v-col>
					<v-col class="text-center h3 m-0">RESILIENCE</v-col>
					<v-col class="text-center h3 m-0">PRIDE</v-col>
				</v-row>
			</v-container>
		</section>
		<section class="mt-md-n15x">
			<v-container class="mt-md-n15x">
				<!-- <h1 class="display-2 orange--text text--darken-4">SECTION TWO</h1> -->
				<v-row>
					<v-col cols="12" md="6" lg="4">
						<v-card>
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
							<!-- <v-card-text>
								<p>Dear Colleague,</p>
								<p>
									Good morning or good afternoon, hopefully not good evening!
									Well I do not know if it is the same where you live, but Bonfire Night seemed to happen over a number of
									evenings, just as the American election ....
								</p>
							</v-card-text>-->
							<!-- <v-skeleton-loader boilerplate type="list-item-three-line"></v-skeleton-loader> -->
							<!-- <v-divider></v-divider> -->
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="teal">Open Letter</v-btn>
							</v-card-actions>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-card>
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
							<v-card-text>Please remember to check the COVID-19 page for important updates and links to key information from FCAT and the DfE (Department for Education)</v-card-text>
							<!-- <v-divider></v-divider> -->
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="blue">COVID PAGE</v-btn>
							</v-card-actions>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-card>
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
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" boilerplate type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" boilerplate type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" boilerplate type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
				</v-row>
			</v-container>
		</section>
		<section class="header white--text">
			<v-container>
				<v-row py-3>
					<v-col class="text-center h3 m-0">EXCELLENCE</v-col>
					<v-col class="text-center h3 m-0">AMBITION</v-col>
					<v-col class="text-center h3 m-0">RESPECT</v-col>
				</v-row>
			</v-container>
		</section>

		<section class="grey lighten-2">
			<v-container>
				<v-row>
					<v-col cols="12" lg="8">
						<v-sheet min-height="70vh" rounded="lg" class="border">
							<v-img height="400" contain src="/images/teamfcat-hexagon.png"></v-img>
						</v-sheet>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
				</v-row>
			</v-container>
		</section>
	</div>
</template>
<script>
import Axios from "axios";
export default {
	data() {
		return {
			loading: true,
			index: 0,
			news: [
				{
					time: "10:15",
					summary: "There has been a massive explosion at the cheese factory"
				},
				{
					time: "11:36",
					summary: "Bob is on fire"
				},
				{
					time: "12:47",
					summary: "Look its Superman!"
				}
			],
			snackbar: {
				color: "",
				mode: "",
				show: false,
				text: "",
				timeout: 2000,
				y: "top"
			}
		};
	},
	created() {
		setInterval(this.updateTicker, 5000);
	},
	mounted() {},
	methods: {
		updateTicker: function() {
			var removed = this.news.pop();
			this.news.unshift(removed);
		}
	}
};
</script>

<style lang="scss" scoped>
.hidden {
	display: none;
}
.actions {
	max-width: 30rem;
	margin: 0 auto 2rem auto;
}
.export {
	max-width: 30rem;
	margin: 0 auto 2rem auto;
	pre {
		padding: 1rem;
		border-radius: 5px;
		font-size: 0.8rem;
		font-weight: bold;
		color: lightgray;
	}
	code {
		display: block;
		white-space: pre-wrap;
	}
}
.header {
	background: rgb(0, 150, 136);
	background: -moz-linear-gradient(
		126deg,
		rgba(0, 150, 136, 1) 0%,
		rgba(0, 77, 64, 1) 50%,
		rgba(128, 203, 196, 1) 100%
	);
	background: -webkit-linear-gradient(
		126deg,
		rgba(0, 150, 136, 1) 0%,
		rgba(0, 77, 64, 1) 50%,
		rgba(128, 203, 196, 1) 100%
	);
	background: linear-gradient(
		126deg,
		rgba(0, 150, 136, 1) 0%,
		rgba(0, 77, 64, 1) 50%,
		rgba(128, 203, 196, 1) 100%
	);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#009688",endColorstr="#80cbc4",GradientType=1);
}

.breaking-news {
	background-color: orange;
	color: #ffffff;
	border-radius: 10px 50px 50px 10px;
	padding: 5px;
}

.media-content {
	padding: 5px;
}

.time {
	color: white;
}

.news {
	color: white;
}

.fade-enter-active,
.fade-leave-active {
	transition: opacity 1s;
}
.fade-enter,
.fade-leave-to {
	opacity: 0;
}
</style>
