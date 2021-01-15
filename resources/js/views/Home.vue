<template>
	<div>
		<home-header></home-header>
		<core-carousel></core-carousel>
		<section class="mt-md-n15x christmas-bg-1">
			<v-container class="mt-md-n15x">
				<v-row class="d-flex align-self-stretch" height="100px">
					<v-col cols="12" md="6" lg="4">
						<a @click="gotoPage(seanslatestletter.link)">
							<v-hover v-slot="{ hover }" close-delay="200">
								<v-card>
									<v-system-bar dark height="8" color="teal darken-2"></v-system-bar>
									<v-sheet color="grey lighten-2">
										<v-img src="/images/seans-letter-image.jpg" height="200">
											<v-expand-transition>
												<div
													v-if="hover"
													class="d-flex transition-fast-in-fast-out teal darken-2 v-card--reveal display-1 white--text"
													style="height: 100%;"
												>READ LETTER</div>
											</v-expand-transition>
										</v-img>
									</v-sheet>
									<v-system-bar dark height="1" color="black"></v-system-bar>
									<v-list>
										<v-list-item>
											<v-list-item-avatar>
												<v-img src="/images/headshots/sean.jpg" position="top center"></v-img>
											</v-list-item-avatar>
											<v-list-item-content>
												<v-list-item-title class="h5">Sean's Letter</v-list-item-title>
												<v-list-item-subtitle v-text="seanslatestletter.subtitle"></v-list-item-subtitle>
											</v-list-item-content>
										</v-list-item>
									</v-list>
								</v-card>
							</v-hover>
						</a>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<a @click="gotoPage('/covid')">
							<v-hover v-slot="{ hover }" close-delay="200">
								<v-card class="align-self-stretch">
									<v-system-bar dark height="8" color="blue lighten-2"></v-system-bar>
									<v-sheet color="grey lighten-2">
										<v-img src="/images/covid-update-image.jpg" height="200">
											<v-expand-transition>
												<div
													v-if="hover"
													class="d-flex transition-fast-in-fast-out blue darken-2 v-card--reveal display-1 white--text"
													style="height: 100%;"
												>
													<v-btn outlined x-large class="display-1" dark>COVID UPDATES</v-btn>
												</div>
											</v-expand-transition>
										</v-img>
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
								</v-card>
							</v-hover>
						</a>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<a href="https://cpd.teamfcat.co.uk" target="_blank">
							<v-hover v-slot="{ hover }" close-delay="200">
								<v-card class="align-self-stretch">
									<v-system-bar dark height="8" color="green"></v-system-bar>
									<v-sheet color="green lighten-2">
										<v-img src="/images/cpd-thumbnail.jpg" height="200">
											<v-expand-transition>
												<div
													v-if="hover"
													class="d-flex transition-fast-in-fast-out green darken-2 v-card--reveal display-1 white--text"
													style="height: 100%;"
												>CPD PORTAL</div>
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
						</a>
					</v-col>
					<v-col cols="12" md="6" lg="4" class="align-self-stretch">
						<a @click="gotoPage('/p2/hr/staffwellbeing')">
							<v-hover v-slot="{ hover }" close-delay="200">
								<v-card class="align-self-stretch">
									<v-system-bar dark height="8" color="red"></v-system-bar>
									<v-sheet color="red lighten-2">
										<v-img src="/images/1_FINAL_JPG_FCAT_Work_-_Wellbeing_Charter.jpg" height="200">
											<v-expand-transition>
												<div
													v-if="hover"
													class="d-flex transition-fast-in-fast-out red darken-2 v-card--reveal display-1 white--text"
													style="height: 100%;"
												>WORK &amp; WELLBEING</div>
											</v-expand-transition>
										</v-img>
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
								</v-card>
							</v-hover>
						</a>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<a href="#">
							<v-hover v-slot="{ hover }" close-delay="200">
								<v-card class="align-self-stretch">
									<v-system-bar dark height="8" color="blue darken-4"></v-system-bar>
									<v-sheet color="blue">
										<v-img src="/images/slt-updates-tile.jpg" height="200">
											<v-expand-transition>
												<div
													v-if="hover"
													class="d-flex transition-fast-in-fast-out blue v-card--reveal display-1 white--text"
													style="height: 100%;"
												>SLT UPDATES</div>
											</v-expand-transition>
										</v-img>
									</v-sheet>
									<v-system-bar dark height="1" color="black"></v-system-bar>
									<v-list>
										<v-list-item>
											<v-list-item-avatar color="blue darken-4">
												<v-icon dark>fas fa-bullhorn fa-fw</v-icon>
											</v-list-item-avatar>
											<v-list-item-content>
												<v-list-item-title class="h5">SLT Weekly Updates</v-list-item-title>
												<v-list-item-subtitle>Information &amp; updates from FCAT SLT</v-list-item-subtitle>
											</v-list-item-content>
										</v-list-item>
									</v-list>
								</v-card>
							</v-hover>
						</a>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<a href="https://forms.gle/ySav4sUtmV1Yx3Qc6" target="_blank">
							<v-hover v-slot="{ hover }" close-delay="200">
								<v-card class="align-self-stretch">
									<v-system-bar dark height="8" color="amber"></v-system-bar>
									<v-sheet color="amber lighten-2">
										<v-img src="/images/feedback-thumbnail.jpg" height="200">
											<v-expand-transition>
												<div
													v-if="hover"
													class="d-flex transition-fast-in-fast-out amber darken-2 v-card--reveal display-1 white--text"
													style="height: 100%;"
												>OPEN FORM</div>
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
						</a>
					</v-col>
					<v-col cols="12" md="6" lg="4" hidden>
						<a href="#">
							<v-hover v-slot="{ hover }" close-delay="200">
								<v-card class="align-self-stretch">
									<v-system-bar dark height="8" color="deep-purple lighten-2"></v-system-bar>
									<v-sheet color="deep-purple lighten-4">
										<v-img src="/images/undraw_Faq_re_31cw.png" height="200">
											<v-expand-transition>
												<div
													v-if="hover"
													class="d-flex transition-fast-in-fast-out deep-purple darken-2 v-card--reveal display-1 white--text"
													style="height: 100%;"
												>FAQs</div>
											</v-expand-transition>
										</v-img>
									</v-sheet>
									<v-system-bar dark height="1" color="black"></v-system-bar>
									<v-list>
										<v-list-item>
											<v-list-item-avatar color="deep-purple lighten-2">
												<v-icon dark>far fa-question-circle fa-fw</v-icon>
											</v-list-item-avatar>
											<v-list-item-content>
												<v-list-item-title class="h5">STAFF FAQs</v-list-item-title>
												<v-list-item-subtitle>Asnswers to Frequently Asked Questions</v-list-item-subtitle>
											</v-list-item-content>
										</v-list-item>
									</v-list>
								</v-card>
							</v-hover>
						</a>
					</v-col>
				</v-row>
			</v-container>
		</section>
		<!-- <core-carousel></core-carousel> -->
		<home-twitters></home-twitters>
		<!-- <staff-search></staff-search> -->
		<core-values></core-values>
	</div>
</template>
<script>
import Axios from "axios";
export default {
	data() {
		return {
			loading: true,
			index: 0,
      latest: [],
      seanslatestletter: {
        title: "",
        subtitle: "",
        slug: "",
        link: ""
      },
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
	mounted() {
		this.getLatestPages();
		this.getSeansLatestLetter();
	},
	methods: {
		getLatestPages() {
			axios
				.get("/get/latestpages")
				.then(({ data }) => {
					this.latest = data.latest;
				})
				.then(() => {
					// this.getPages();
				});
		},
		getSeansLatestLetter() {
			axios
				.get("/get/seanslatestletter")
				.then(({ data }) => {
					this.seanslatestletter = data.seanslatestletter;
				})
				.then(() => {
					// this.getPages();
				});
		},
		gotoPage(slug) {
			this.$router.push(slug);
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
	background: linear-gradient(90deg, #008283, #03b0a2);
	background-size: 200%, 200%;

	-webkit-animation: AnimationName 31s ease infinite;
	-moz-animation: AnimationName 31s ease infinite;
	animation: AnimationName 31s ease infinite;
}

@-webkit-keyframes AnimationName {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 51%;
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
		background-position: 100% 51%;
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
		background-position: 100% 51%;
	}
	100% {
		background-position: 0% 50%;
	}
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
	background: linear-gradient(90deg, #fafafa, #bebebe, #ebebeb);
	background-size: 600% 600%;

	-webkit-animation: AnimationName 15s ease infinite;
	-moz-animation: AnimationName 15s ease infinite;
	animation: AnimationName 15s ease infinite;
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
.christmas-bg-1 {
	background-image: url("/images/winter-bg-1.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	background-position: right;
	-webkit-animation: none;
	-moz-animation: none;
	animation: none;
}
</style>
