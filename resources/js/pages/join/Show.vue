<template>
	<div>
		<div v-if="loading">
			<v-progress-linear indeterminate> </v-progress-linear>
			<v-skeleton-loader
				type="list-item-avatar, divider, list-item-three-line, card-heading, image, actions"
			></v-skeleton-loader>
		</div>
		<div v-if="!loading">
			<video-background
				src="/videos/hr.mp4"
				style="min-height: 300px; max-height: 450px; height: 100vh"
				class="d-none d-sm-block"
			>
				<!-- <v-container class="pt-lg-15 d-none">
					<v-card
						elevation="10"
						outlined
						v-if="this.vacancy.details.postTitle || this.academy.icon"
						cols="12"
						class="banner-opacity"
					>
						<v-card-title
							class="p-1"
							:class="academy.color || 'grey'"
						></v-card-title>
						<v-list-item three-line>
							<v-list-item-content>
								<div class="text-overline mb-4">INTERNAL ONLY</div>
								<v-list-item-title class="text-h4 mb-1" v-if="academy">
									{{ this.vacancy.details.postTitle }}
								</v-list-item-title>
								<v-list-item-subtitle
									class="text-h5"
									v-if="
										this.vacancy.details.location &&
										this.vacancy.details.postTitle
									"
									>{{ this.vacancy.details.location }}</v-list-item-subtitle
								>
							</v-list-item-content>

							<v-list-item-avatar v-if="academy.icon" size="100">
								<v-img :src="'/images/icons/' + this.academy.icon"></v-img
							></v-list-item-avatar>
						</v-list-item>
						<v-card-text class="slight-op">
							<v-divider
								v-if="
									this.vacancy.details.location &&
									this.vacancy.details.postTitle
								"
								class="mt-0"
							></v-divider>
							<v-row>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.salarypayscale"
								>
									<span class="font-weight-bold">Scale:</span>
									{{ this.vacancy.details.salarypayscale }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.grade"
								>
									<span class="font-weight-bold">Grade:</span>
									{{ this.vacancy.details.grade }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.range"
								>
									<span class="font-weight-bold">Range:</span>
									{{ this.vacancy.details.range }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.salary"
								>
									<span class="font-weight-bold">Salary:</span>
									{{ this.vacancy.details.salary }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.contractType"
								>
									<span class="font-weight-bold">Contract:</span>
									{{ this.vacancy.details.contractType }}
									{{ this.vacancy.details.contractTime }}
									{{ this.vacancy.details.contractTermTimeOnly }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.contractHours"
								>
									<span class="font-weight-bold">Hours:</span>
									{{ this.vacancy.details.contractHours }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.contractWeeks"
								>
									<span class="font-weight-bold">Weeks:</span>
									{{ this.vacancy.details.contractWeeks }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.contractEndDateFormatted"
								>
									<span class="font-weight-bold">Fixed End Date:</span>
									{{ this.vacancy.details.contractEndDateFormatted }}
								</v-col>
								<v-col
									cols="12"
									md="6"
									lg="4"
									v-if="this.vacancy.details.contractStartDateFormatted"
								>
									<span class="font-weight-bold">Start Date:</span>
									{{ this.vacancy.details.contractStartDateFormatted }}
								</v-col>
							</v-row>
						</v-card-text>
					</v-card>
				</v-container> -->
			</video-background>
			<!-- ADVERT MOCK UP -->
			<v-container class="mt-neg15">
				<v-card
					elevation="2"
					outlined
					v-if="this.vacancy.details.postTitle || this.academy.icon"
					class="banner-opacity"
				>
					<v-card-title class="p-1" :class="academy.color || 'grey'">
					</v-card-title>
					<v-list-item three-line class="">
						<v-list-item-content>
							<div class="text-overline mb-4">INTERNAL ONLY</div>
							<v-list-item-title class="text-h4 mb-1 text-wrap" v-if="academy">
								{{ this.vacancy.details.postTitle }}
							</v-list-item-title>
							<v-list-item-subtitle
								class="text-h5"
								v-if="
									this.vacancy.details.location &&
									this.vacancy.details.postTitle
								"
								>{{ this.vacancy.details.location }}</v-list-item-subtitle
							>
						</v-list-item-content>

						<v-list-item-avatar v-if="academy.icon" size="100" class="">
							<v-img :src="'/images/icons/' + this.academy.icon"></v-img
						></v-list-item-avatar>
					</v-list-item>
					<v-card-text class="">
						<v-divider
							v-if="
								this.vacancy.details.location && this.vacancy.details.postTitle
							"
							class="mt-0"
						></v-divider>
						<v-row>
							<v-col
								cols="12"
								md="6"
								lg="4"
								v-if="this.vacancy.details.salarypayscale"
							>
								<span class="font-weight-bold">Scale:</span>
								{{ this.vacancy.details.salarypayscale }}
							</v-col>
							<v-col cols="12" md="6" lg="4" v-if="this.vacancy.details.grade">
								<span class="font-weight-bold">Grade:</span>
								{{ this.vacancy.details.grade }}
							</v-col>
							<v-col cols="12" md="6" lg="4" v-if="this.vacancy.details.range">
								<span class="font-weight-bold">Range:</span>
								{{ this.vacancy.details.range }}
							</v-col>
							<v-col cols="12" md="6" lg="4" v-if="this.vacancy.details.salary">
								<span class="font-weight-bold">Salary:</span>
								{{ this.vacancy.details.salary }}
							</v-col>
							<v-col
								cols="12"
								md="6"
								lg="4"
								v-if="this.vacancy.details.contractType"
							>
								<span class="font-weight-bold">Contract:</span>
								{{ this.vacancy.details.contractType }}
								{{ this.vacancy.details.contractTime }}
								{{ this.vacancy.details.contractTermTimeOnly }}
							</v-col>
							<v-col
								cols="12"
								md="6"
								lg="4"
								v-if="this.vacancy.details.contractHours"
							>
								<span class="font-weight-bold">Hours:</span>
								{{ this.vacancy.details.contractHours }}
							</v-col>
							<v-col
								cols="12"
								md="6"
								lg="4"
								v-if="this.vacancy.details.contractWeeks"
							>
								<span class="font-weight-bold">Weeks:</span>
								{{ this.vacancy.details.contractWeeks }}
							</v-col>
							<v-col
								cols="12"
								md="6"
								lg="4"
								v-if="this.vacancy.details.contractEndDateFormatted"
							>
								<span class="font-weight-bold">Fixed End Date:</span>
								{{ this.vacancy.details.contractEndDateFormatted }}
							</v-col>
							<v-col
								cols="12"
								md="6"
								lg="4"
								v-if="this.vacancy.details.contractStartDateFormatted"
							>
								<span class="font-weight-bold">Start Date:</span>
								{{ this.vacancy.details.contractStartDateFormatted }}
							</v-col>
						</v-row>
					</v-card-text>
					<v-card-text>
						<v-divider class=""></v-divider>
						<div v-if="academy.about" class="pt-3">
							<div class="text-h4">
								About {{ this.vacancy.details.location }}
							</div>
							<div class="whitespace-pre-line">
								{{ academy.about }}
							</div>
						</div>
						<div v-if="this.vacancy.details.aboutTheRole">
							<v-divider></v-divider>
							<div class="text-h4">About The Role</div>
							<div class="whitespace-pre-line">
								{{ this.vacancy.details.aboutTheRole }}
							</div>
						</div>
						<v-divider></v-divider>
						<div v-if="academy.about">
							<div class="text-h4 mb-4">How to apply</div>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor,
								commodi. Asperiores possimus explicabo voluptate. Dolore quam,
								ab voluptatum deserunt similique in culpa esse vero laboriosam
								numquam aliquid suscipit optio aut sequi corporis veniam,
								consectetur deleniti sapiente ipsam voluptatibus nobis
								necessitatibus officia? Repudiandae natus dolor vero molestias
								possimus, officiis voluptas excepturi fuga suscipit, repellendus
								quibusdam porro, voluptatem reprehenderit soluta tempore enim
								quia?
							</p>
							<p>
								Maiores, harum. Aliquam, totam laborum nesciunt, perspiciatis
								tempora necessitatibus porro, commodi ipsa quidem quam quas
								quisquam laboriosam ea nihil. Deserunt sequi nihil aliquid nobis
								optio asperiores!
							</p>
							<p>
								Totam reprehenderit veritatis accusantium. Consequuntur, error
								dignissimos perferendis modi architecto ipsam doloribus eius.
							</p>
						</div>
						<v-divider></v-divider>
						<v-card-actions>
							<v-btn
								v-if="$isHrUser()"
								color="red"
								outlined
								link
								:to="'/join/' + this.vacancy_id + '/edit'"
								>Edit Vacancy</v-btn
							>
						</v-card-actions>
					</v-card-text>
				</v-card>
			</v-container>
		</div>
	</div>
</template>
<script>
import axios from "axios";
import Banner from "./Banner.vue";
export default {
	props: ["vacancy_id"],
	components: {
		Banner,
	},
	data() {
		return {
			loading: false,
			vacancy: {},
			academy: {},
		};
	},
	created() {
		this.loading = true;
	},
	mounted() {
		this.scrollToTop();
		this.getContent();
		// this.loading = false;
	},
	methods: {
		scrollToTop() {
			window.scrollTo(0, 0);
		},
		getContent() {
			this.loading = true;
			axios.get("/get/vacancy/" + this.vacancy_id).then(({ data }) => {
				this.vacancy = data;
				if (data.details) {
					this.vacancy.details = JSON.parse(data.details);
					this.vacancyDetails = this.vacancy.details;
				}
				this.getAcademyDetails();
			});
		},
		getAcademyDetails() {
			this.loading = true;
			axios.get("/get/academy/" + this.vacancy.academy_id).then(({ data }) => {
				this.academy = data;
				this.academy.icon = this.academy.logourl;
				this.loading = false;
			});
		},
	},
};
</script>
<style lang="scss" scoped>
.mt-neg15 {
	position: relative;
	top: -25%;
	left: 0;
	transform: translate(0, -25%);
	@media (max-width: 576px) {
		position: relative;
		transform: translate(0px, 0px);
	}
}
.banner-opacity {
	background: rgb(255, 255, 255);
	background: -moz-linear-gradient(
		0deg,
		rgba(255, 255, 255, 1) 50%,
		rgba(255, 255, 255, 0.8) 100%
	);
	background: -webkit-linear-gradient(
		0deg,
		rgba(255, 255, 255, 1) 50%,
		rgba(255, 255, 255, 0.8) 100%
	);
	background: linear-gradient(
		0deg,
		rgba(255, 255, 255, 1) 50%,
		rgba(255, 255, 255, 0.8) 100%
	);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff",endColorstr="#ffffff",GradientType=1);
}
</style>
