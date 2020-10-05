<template>
	<div>
		<div class="container pt-md-6rem">
			<v-row>
				<v-col cols="12" md="6" class="d=flex align-center">
					<h1 class="text-h3 line-height-1pt5 py-2">
						Welcome to
						<span class="teal--text">Team FCAT</span>
						<br />Content Coming Soon
					</h1>
					<p
						class="lead grey--text text-subtitle text-center text-md-left"
					>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit omnis perspiciatis dolor dolorum libero eveniet, officia sint praesentium modi ratione voluptate dolore, provident corporis. Rerum quod error dolor eum numquam!</p>
					<v-row>
						<!-- <v-col> -->
              <!-- <google-picker></google-picker> -->
							<!-- <v-btn @click="driveIconClicked" dark class="teal" x-large>
								<v-icon class="mr-2">fa fa-arrow-right</v-icon>PICKER
							</v-btn> -->
						<!-- </v-col> -->
						<v-col>
							<v-btn dark class="teal" x-large>
								<v-icon class="mr-2">far fa-star</v-icon>Button
							</v-btn>
						</v-col>
						<v-col>
							<v-btn dark class="orange darken-2" x-large>
								<v-icon class="mr-2">far fa-star</v-icon>Button
							</v-btn>
						</v-col>
						<v-col>
							<v-btn dark class="grey" x-large>
								<v-icon class="mr-2">fab fa-rebel</v-icon>Button
							</v-btn>
						</v-col>
					</v-row>
				</v-col>
				<v-col cols="12" md="6">
					<v-img height="400" contain src="/images/teamfcat-hexagon.png"></v-img>
				</v-col>
			</v-row>
		</div>
		<div></div>
	</div>
</template>
<script>
import Axios from "axios";
export default {
	data() {
		return {
			loading: true,

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
}
</style>
