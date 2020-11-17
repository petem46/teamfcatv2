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
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="teal">Open Letter</v-btn>
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
					<v-col cols="12" md="6" lg="4" class="align-self-stretch">
						<v-card class="align-self-stretch">
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
								We are continuing to provide access to free and confidential employee wellbeing support.
							</v-card-text>
							<!-- <v-divider></v-divider> -->
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="teal" :to="'/p2/hr/staffwellbeing'">Read More</v-btn>
							</v-card-actions>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-card flat>
							<v-card-title class="py-1 mt-1">
								<v-icon color="teal" large>far fa-check-circle fa-fw</v-icon>
							</v-card-title>
							<v-card-title class="py-1 mt-1">Title Title</v-card-title>
							<v-card-text>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis quam et necessitatibus, cum adipisci itaque hic quisquam modi, quia tempore, culpa atque provident perspiciatis molestias vitae deserunt dignissimos? Cupiditate, doloremque.</v-card-text>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-card flat>
							<v-card-title class="py-1 mt-1">
								<v-icon color="teal" large>far fa-check-circle fa-fw</v-icon>
							</v-card-title>
							<v-card-title class="py-1 mt-1">Title Title</v-card-title>
							<v-card-text>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis quam et necessitatibus, cum adipisci itaque hic quisquam modi, quia tempore, culpa atque provident perspiciatis molestias vitae deserunt dignissimos? Cupiditate, doloremque.</v-card-text>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-card flat>
							<v-card-title class="py-1 mt-1">
								<v-icon color="teal" large>far fa-check-circle fa-fw</v-icon>
							</v-card-title>
							<v-card-title class="py-1 mt-1">Title Title</v-card-title>
							<v-card-text>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis quam et necessitatibus, cum adipisci itaque hic quisquam modi, quia tempore, culpa atque provident perspiciatis molestias vitae deserunt dignissimos? Cupiditate, doloremque.</v-card-text>
						</v-card>
					</v-col>
				</v-row>
			</v-container>
		</section>
		<section class="header white--text py-0">
			<v-container>
				<v-row py-3>
					<v-col class="text-center h3 m-0">EXCELLENCE</v-col>
					<v-col class="text-center h3 m-0">AMBITION</v-col>
					<v-col class="text-center h3 m-0">RESPECT</v-col>
				</v-row>
			</v-container>
		</section>
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
				<v-row class="align-items-center text-center">
					<v-col cols="12" class="display-3">OUR CORE VALUES</v-col>
					<v-col cols="12" md="4">
						<div>
							<v-img height="400" contain src="/images/teamfcat-hexagon.png"></v-img>
						</div>
					</v-col>
					<v-col cols="12" md="8">
						<div>
							<v-card-text>
								<div class="display-1 text--primary">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>PRIDE
								</div>
								<div
									class="text--primary"
								>A feeling of deep satisfaction derived from one’s own achievements</div>
							</v-card-text>
							<v-card-text>
								<div class="display-1 text--primary">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>AMBITION
								</div>
								<div class="text--primary">A strong desire to do or achieve something</div>
							</v-card-text>
							<v-card-text>
								<div class="display-1 text--primary">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>RESPECT
								</div>
								<div
									class="text--primary"
								>A feeling of deep admiration for someone or something elicited by their abilities, qualities, or achievements</div>
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
					<v-col cols="12" md="8">
						<div>
							<v-card-text>
								<div class="display-1 text--primary">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>RESILIENCE
								</div>
								<div class="text--primary">The capacity to recover quickly from difficulties</div>
							</v-card-text>
							<v-card-text>
								<div class="display-1 text--primary">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>INTEGRITY
								</div>
								<div class="text--primary">The quality of being honest and having strong moral principles</div>
							</v-card-text>
							<v-card-text>
								<div class="display-1 text--primary">
									<v-icon class="teal--text">far fa-check-square fa-fw</v-icon>EXCELLENCE
								</div>
								<div class="text--primary">The quality of being outstanding or extremely good</div>
							</v-card-text>
						</div>
					</v-col>
					<v-col cols="12" md="4">
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
	padding-top: 3rem;
	padding-bottom: 3rem;
	background-image: linear-gradient(
		to top,
		#c7c7c7 0%,
		#d5d4d0 1%,
		#eeeeec 31%,
		#efeeec 75%,
		#e9e9e7 100%
	);
}
</style>
