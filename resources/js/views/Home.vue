<template>
	<div>
		<home-header></home-header>
		<section class="header white--text py-0">
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
			<v-carousel
				height="80"
				hide-delimiters
				:show-arrows="false"
				:cycle="true"
				:interval="6000"
				vertical
			>
				<v-container>
					<v-carousel-item
						transition="slide-x-transition"
						reverse-transition="slide-x-reverse-transition"
					>
						<v-row py-3>
							<v-col class="text-center h3 m-0">INTEGRITY</v-col>
							<v-col class="text-center h3 m-0">RESILIENCE</v-col>
							<v-col class="text-center h3 m-0">PRIDE</v-col>
						</v-row>
					</v-carousel-item>
					<v-carousel-item
						transition="slide-x-transition"
						reverse-transition="slide-x-reverse-transition"
					>
						<v-row py-3>
							<v-col class="text-center h3 m-0">EXCELLENCE</v-col>
							<v-col class="text-center h3 m-0">AMBITION</v-col>
							<v-col class="text-center h3 m-0">RESPECT</v-col>
						</v-row>
					</v-carousel-item>
				</v-container>
			</v-carousel>
		</section>
		<section class="mt-md-n15x amber lighten-5">
			<v-container class="mt-md-n15x">
				<!-- <h1 class="display-2 orange--text text--darken-4">SECTION TWO</h1> -->
				<v-row class="d-flex align-self-stretch" height="100px">
					<v-col cols="12" md="6" lg="4">
						<v-card>
							<v-system-bar dark height="8" color="teal darken-2"></v-system-bar>
							<v-sheet color="grey lighten-2">
								<v-img src="/images/seans-letter-image.jpg" height="200"></v-img>
								<div class="custom-shape-divider-bottom-1606219370">
									<svg
										data-name="Layer 1"
										xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 1200 120"
										preserveAspectRatio="none"
									>
										<path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill" />
									</svg>
								</div>
							</v-sheet>
							<v-system-bar dark height="1" color="black"></v-system-bar>
							<v-list>
								<v-list-item>
									<v-list-item-avatar>
										<v-img src="/images/headshots/sean.jpg" position="top center"></v-img>
									</v-list-item-avatar>
									<v-list-item-content>
										<v-list-item-title class="h5">Sean's Letter</v-list-item-title>
										<v-list-item-subtitle>Monday 23rd November 2020</v-list-item-subtitle>
									</v-list-item-content>
								</v-list-item>
							</v-list>
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="teal" to="/p2/updates/seansletter11">Read Letter</v-btn>
							</v-card-actions>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-card class="align-self-stretch">
							<v-system-bar dark height="8" color="blue lighten-2"></v-system-bar>

							<v-sheet color="grey lighten-2">
								<v-img src="/images/covid-update-image.jpg" height="200"></v-img>
							</v-sheet>
							<v-system-bar dark height="1" color="black"></v-system-bar>
							<v-list>
								<v-list-item>
									<v-list-item-avatar>
										<v-img src="/images/headshots/jane.jpg" position="top center"></v-img>
									</v-list-item-avatar>
									<v-list-item-content>
										<v-list-item-title class="h5">COVID-19</v-list-item-title>
										<v-list-item-subtitle>Important links &amp; updates</v-list-item-subtitle>
									</v-list-item-content>
								</v-list-item>
							</v-list>
							<!-- <v-divider></v-divider> -->
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="blue">COVID PAGE</v-btn>
							</v-card-actions>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4" class="align-self-stretch">
						<v-card class="align-self-stretch">
							<v-system-bar dark height="8" color="red"></v-system-bar>
							<v-sheet color="red lighten-2">
								<v-img src="/images/1_FINAL_JPG_FCAT_Work_-_Wellbeing_Charter.jpg" height="200"></v-img>
							</v-sheet>
							<v-system-bar dark height="1" color="black"></v-system-bar>
							<v-list>
								<v-list-item>
									<v-list-item-avatar color="red">
										<v-icon dark>fa-heartbeat fa-fw</v-icon>
									</v-list-item-avatar>
									<v-list-item-content>
										<v-list-item-title class="h5">Work &amp; Wellbeing Charter</v-list-item-title>
										<v-list-item-subtitle>Free &amp; confidential employee wellbeing support</v-list-item-subtitle>
									</v-list-item-content>
								</v-list-item>
							</v-list>
							<!-- <v-divider></v-divider> -->
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="red" :to="'/p2/hr/staffwellbeing'">Read More</v-btn>
							</v-card-actions>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-hover v-slot="{ hover }" close-delay="200">
							<v-card class="align-self-stretch">
								<v-system-bar dark height="8" color="green"></v-system-bar>
								<v-sheet color="green lighten-2">
									<v-img src="/images/cpd-thumbnail.jpg" height="200">
										<v-expand-transition>
											<div
												v-if="hover"
												class="d-flex transition-fast-in-fast-out green darken-2 v-card--reveal display-3 white--text"
												style="height: 100%;"
											>
												<a href="https://cpd.teamfcat.co.uk" target="_blank">
													<v-btn dark>
														GO TO CPD PORTAL
														<v-icon class="ml-2">fas fa-external-link-alt fa-fw</v-icon>
													</v-btn>
												</a>
											</div>
										</v-expand-transition>
									</v-img>
								</v-sheet>
								<v-system-bar dark height="1" color="black"></v-system-bar>
								<v-list>
									<v-list-item>
										<v-list-item-avatar color="green">
											<v-icon dark>fa-user-graduate fa-fw</v-icon>
										</v-list-item-avatar>
										<v-list-item-content>
											<v-list-item-title class="h5">FCAT CPD Portal</v-list-item-title>
											<v-list-item-subtitle>Search large selection of CPD</v-list-item-subtitle>
										</v-list-item-content>
									</v-list-item>
								</v-list>
							</v-card>
						</v-hover>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-hover v-slot="{ hover }" close-delay="200">
							<v-card class="align-self-stretch">
								<v-system-bar dark height="8" color="amber"></v-system-bar>
								<v-sheet color="amber lighten-2">
									<v-img src="/images/feedback-thumbnail.jpg" height="200">
										<v-expand-transition>
											<div
												v-if="hover"
												class="d-flex transition-fast-in-fast-out amber darken-2 v-card--reveal display-3 white--text"
												style="height: 100%;"
											>
												<a href="https://cpd.teamfcat.co.uk" target="_blank">
													<v-btn dark>
														FEEDBACK FORM
														<v-icon class="ml-2">far fa-arrow-alt-circle-right</v-icon>
													</v-btn>
												</a>
											</div>
										</v-expand-transition>
									</v-img>
								</v-sheet>
								<v-system-bar dark height="1" color="black"></v-system-bar>
								<v-list>
									<v-list-item>
										<v-list-item-avatar color="amber">
											<v-icon dark>far fa-lightbulb fa-fw</v-icon>
										</v-list-item-avatar>
										<v-list-item-content>
											<v-list-item-title class="h5">Suggestions & Feedback</v-list-item-title>
											<v-list-item-subtitle>Share thoughts &amp; ideas for this site</v-list-item-subtitle>
										</v-list-item-content>
									</v-list-item>
								</v-list>
							</v-card>
						</v-hover>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-hover v-slot="{ hover }" close-delay="200">
							<v-card class="align-self-stretch">
								<v-system-bar dark height="8" color="pink"></v-system-bar>
								<v-sheet color="pink lighten-2">
									<v-img src="/images/christmas.gif" height="200">
										<v-expand-transition>
											<div
												v-if="hover"
												class="d-flex transition-fast-in-fast-out pink darken-2 v-card--reveal display-1 white--text"
												style="height: 100%;"
											>22 GET UPS</div>
										</v-expand-transition>
									</v-img>
								</v-sheet>
								<v-system-bar dark height="1" color="black"></v-system-bar>
								<v-list>
									<v-list-item>
										<v-list-item-avatar color="pink">
											<v-icon dark>fas fa-tree fa-fw</v-icon>
										</v-list-item-avatar>
										<v-list-item-content>
											<v-list-item-title class="h5">Christmas Season</v-list-item-title>
											<v-list-item-subtitle>It's nearly time for a well earned rest</v-list-item-subtitle>
										</v-list-item-content>
									</v-list-item>
								</v-list>
							</v-card>
						</v-hover>
					</v-col>
				</v-row>
			</v-container>
		</section>
		<section class="header white--text py-0">
			<v-container>
				<v-carousel
					height="80"
					hide-delimiters
					:show-arrows="false"
					:cycle="true"
					:interval="6000"
					vertical
				>
					<v-container>
						<v-carousel-item
							transition="slide-x-transition"
							reverse-transition="slide-x-reverse-transition"
						>
							<v-row py-3>
								<v-col class="text-center h3 m-0">EXCELLENCE</v-col>
								<v-col class="text-center h3 m-0">AMBITION</v-col>
								<v-col class="text-center h3 m-0">RESPECT</v-col>
							</v-row>
						</v-carousel-item>
						<v-carousel-item
							transition="slide-x-transition"
							reverse-transition="slide-x-reverse-transition"
						>
							<v-row py-3>
								<v-col class="text-center h3 m-0">INTEGRITY</v-col>
								<v-col class="text-center h3 m-0">RESILIENCE</v-col>
								<v-col class="text-center h3 m-0">PRIDE</v-col>
							</v-row>
						</v-carousel-item>
					</v-container>
				</v-carousel>
			</v-container>
		</section>
		<home-twitters></home-twitters>
		<staff-search></staff-search>
		<!-- <section>
			<v-container>
				<v-sheet class="mx-auto" elevation="8">
					<v-slide-group class="pa-4" center-active show-arrows>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
						<v-slide-item v-slot="{ active, toggle }">
							<v-card @click="toggle" class="ma-4" height="200" width="250"></v-card>
						</v-slide-item>
					</v-slide-group>
				</v-sheet>
			</v-container>
		</section>-->
		<section class="grey lighten-2">
			<v-container>
				<v-row class="align-items-center">
					<v-col cols="12" class="display-3 text-center">OUR CORE VALUES</v-col>
					<v-col cols="12" md="6">
						<div class="text-center">
							<v-img height="400" contain src="/images/teamfcat-hexagon.png"></v-img>
						</div>
					</v-col>
					<v-col cols="12" md="6">
						<div>
							<v-card-text>
								<div class="display-1 pb-2">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>PRIDE
								</div>
								<div class="display-1 pb-2">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>AMBITION
								</div>
								<div class="display-1 pb-2">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>RESPECT
								</div>
								<div class="display-1 pb-2">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>RESILIENCE
								</div>
								<div class="display-1 pb-2">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>RESILIENCE
								</div>
								<div class="display-1 pb-2">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>INTEGRITY
								</div>
							</v-card-text>
						</div>
					</v-col>
				</v-row>
			</v-container>
			<v-container>
				<v-divider inset></v-divider>
			</v-container>
			<v-container>
				<v-row class="align-items-center">
					<v-col cols="12" class="display-3 text-center">OUR NON-NEGOTIABLES</v-col>
					<v-col cols="12" md="6">
						<div class="display-1 pb-2">
							<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>CHILDREN FIRST
						</div>
						<div class="display-1 pb-2">
							<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>HIGH EXPECTATIONS
						</div>
						<div class="display-1 pb-2">
							<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>NO EXCUSES
						</div>
						<div class="display-1 pb-2">
							<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>PASSION FOR LEARNING
						</div>
						<div class="display-1 pb-2">
							<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>WORKING TOGETHER
						</div>
						<div class="display-1 pb-2">
							<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>CONSISTENCY &amp; COMPLIANCE
						</div>
						<div class="display-1 pb-2">
							<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>OUTWARD FACING
						</div>
					</v-col>
					<v-col cols="12" md="6">
						<div>
							<v-img height="400" contain src="/images/teamfcat-hexagon.png"></v-img>
						</div>
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
section {
	padding-top: 1rem;
	padding-bottom: 1rem;
	background-image: linear-gradient(
		to top,
		#c7c7c7 0%,
		#d5d4d0 1%,
		#eeeeec 31%,
		#efeeec 75%,
		#e9e9e7 100%
	);
}
.custom-shape-divider-bottom-1606219370 {
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	overflow: hidden;
	line-height: 0;
	// transform: rotate(180deg);
}

.custom-shape-divider-bottom-1606219370 svg {
	position: relative;
	display: block;
	width: calc(100% + 1.3px);
	height: 50px;
	// transform: rotateY(180deg);
}

.custom-shape-divider-bottom-1606219370 .shape-fill {
	fill: #ffffff;
}
.v-card--reveal {
	align-items: center;
	bottom: 0;
	justify-content: center;
	opacity: 0.8;
	position: absolute;
	width: 100%;
}
</style>
