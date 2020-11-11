<template>
	<div>
		<v-sheet elevation="10" color="teal">
			<v-container>
				<v-row>
					<v-col cols="12" lg="9">
						<v-card>
							<v-carousel :cycle="true" :interval="5000" :show-arrows="false" delimiter-icon="mdi-minus">
								<v-carousel-item v-for="(slide, i) in slides" :key="i">
									<v-sheet :color="colors[i]" height="100%" tile>
										<v-row class="fill-height" align="center" justify="center">
											<div class="display-3">{{ slide }} Slide</div>
										</v-row>
									</v-sheet>
								</v-carousel-item>
								<v-carousel-item>
									<v-img contain src="/images/aspire-banner-1.jpg"></v-img>
								</v-carousel-item>
							</v-carousel>
						</v-card>
					</v-col>
					<v-col cols="12" lg="3">
						<v-card height="500">
							<v-img height="250" contain src="/images/teamfcat-hexagon.png"></v-img>
							<v-skeleton-loader boilerplate type="list-item-three-line,list-item-three-line, actions"></v-skeleton-loader>
						</v-card>
					</v-col>
				</v-row>
			</v-container>
		</v-sheet>
		<v-sheet>
			<v-container>
				<v-row>
					<v-col cols="12" md="6" lg="4">
						<v-card class="top-border--orange">
							<v-sheet color="blue lighten-2">
								<v-img src="/images/seans-letter-image.jpg" height="200"></v-img>
							</v-sheet>
							<v-card-title>
								<v-avatar size="64" class="mr-2">
									<v-img src="/images/sean.jpg" position="top center"></v-img>
								</v-avatar>Sean's Weekly Letter
							</v-card-title>
							<v-card-text>
								<p>Dear Colleague,</p>
								<p>
									Good morning or good afternoon, hopefully not good evening!
									Well I do not know if it is the same where you live, but Bonfire Night seemed to happen over a number of
									evenings, just as the American election ....
								</p>
								<!-- <v-skeleton-loader boilerplate type="list-item-three-line"></v-skeleton-loader> -->
							</v-card-text>
							<!-- <v-divider></v-divider> -->
							<v-card-actions>
								<v-spacer></v-spacer>
								<v-btn text color="teal">Open Letter</v-btn>
							</v-card-actions>
						</v-card>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" boilerplate type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
					<v-col cols="12" md="6" lg="4">
						<v-skeleton-loader class="border" boilerplate type="card-avatar, article, actions"></v-skeleton-loader>
					</v-col>
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
		</v-sheet>
	</div>
</template>
<script>
import Axios from "axios";
export default {
	data() {
		return {
			loading: true,
			colors: [
				"green",
				"secondary",
				"yellow darken-4",
				"red lighten-2",
				"orange darken-1",
				"blue lighten-2"
			],
			cycle: false,
			slides: [
				"Ambition",
				"Pride",
				"Respect",
				"Integrity",
				"Excellence",
				"Resilience"
			],
			items: [
				{
					src: "/images/slide1.jpg",
					text: "TEAM FCAT"
				},
				{
					src: "/images/slide2.jpg",
					text: "Slide Text"
				},
				{
					src: "/images/slide3.jpg",
					text: "Slide Text"
				},
				{
					src: "/images/slide4.jpg",
					text: "Slide Text"
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
	created() {},
	mounted() {},
	methods: {}
};
</script>

<style lang="scss" scoped>
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
	.opacity6 {
		background-color: black !important;
		opacity: 0.6 !important;
	}
}
</style>
