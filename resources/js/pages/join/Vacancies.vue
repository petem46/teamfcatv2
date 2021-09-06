<template>
	<section id="internalvacancies" class="grey lighten-2">
		<video-background
			src="/videos/hr.mp4"
			style="max-height: 300px; height: 100vh"
			class="elevation-10"
		>
		</video-background>
		<v-container class="mt-md-n15x nerd">
			<div class="align-items-center">
				<v-card
					class="p-3 top-border--teal"
					style="background-color: rgba(255, 255, 255, 0.7)"
				>
					<h1 class="text-lg-h2 text-md-h3">Team FCAT Internal Vacancies</h1>
					<v-btn to="/join/create" class="mt-6" color="teal" dark
						>Create Vacancy</v-btn
					>
				</v-card>
			</div>
			<!-- <div class="col-4">
					<div class="p-lg-3">
						<img
							class="img-fluid rounded-circle"
							src="/images/internal-vacancies.jpg"
							alt
						/>
					</div>
				</div> -->
		</v-container>
		<v-container fluid v-if="!loading">
			<v-data-iterator
				:items="vacancies"
				:items-per-page.sync="itemsPerPage"
				hide-default-footer
			>
				<template v-slot:header>
					<v-toolbar class="mb-2 d-none" color="indigo darken-5" dark flat>
						<v-toolbar-title>This is a header</v-toolbar-title>
					</v-toolbar>
				</template>

				<template v-slot:default="props">
					<v-row class="pb-15">
						<v-col v-for="item in props.items" :key="item.id" cols="12">
							<v-card class="pa-5" :class="item.details.topBorder">
								<v-row>
									<v-col
										cols="12"
										md="2"
										order="1"
										order-sm="10"
										class="text-center text-md-right"
									>
										<div class="text-center text-md-right">
											<v-img
												contain
												eager
												width="150"
												:src="'/images/icons/' + item.details.icon"
												:alt="item.details.icon"
											/>
										</div>
									</v-col>
									<v-col cols="12" md="10" order="10" order-sm="1">
										<v-row>
											<v-col cols="12">
												<div class="text-h6 text-md-h4">
													{{ item.details.postTitle }}
												</div>
											</v-col>
											<v-col cols="12" md="6">
												<v-icon class="mr-2 grey--text lighten-2"
													>fas fa-map-marker-alt fa-fw</v-icon
												>
												{{ item.details.location }}
											</v-col>
											<v-col cols="12" md="6">
												<v-icon class="mr-2 grey--text lighten-2"
													>fas fa-business-time fa-fw</v-icon
												>
												{{ item.details.contractType }}
												{{ item.details.contractTime }}
												{{ item.details.contractTermTimeOnly }}
											</v-col>
											<v-col cols="12" md="6">
												<v-icon class="mr-2 grey--text lighten-2"
													>fa-clock fa-fw</v-icon
												>
												{{ item.details.contractHours }}
												{{ item.details.contractWeeks }}
											</v-col>
											<v-col cols="12" md="6">
												<v-icon class="mr-2 grey--text lighten-2"
													>far fa-calendar-alt fa-fw</v-icon
												>
												Start: {{ item.details.contractStartDateFormatted }}
											</v-col>
											<v-col cols="12" md="6">
												<v-icon class="mr-2 grey--text lighten-2"
													>fas fa-pound-sign fa-fw</v-icon
												>
												{{ item.details.salarypayscale }}
												{{ item.details.grade }} {{ item.details.range }}
												<span v-if="item.details.tlrLabel">
													+ {{ item.details.tlrLabel }}</span
												>
											</v-col>
											<v-col cols="12" md="6">
												<v-icon class="mr-2 grey--text lighten-2"
													>fas fa-pound-sign fa-fw</v-icon
												>
												{{ item.details.salary }}
												<span v-if="item.details.tlrAmount">
													+ {{ item.details.tlrAmount }}</span
												>
											</v-col>
											<v-col cols="12" md="6">
												<v-icon class="mr-2 grey--text lighten-2"
													>fas fa-stopwatch fa-fw</v-icon
												>
												Closing: {{ item.closingDateFormatted }}
											</v-col>
										</v-row>
									</v-col>
								</v-row>
								<v-divider></v-divider>
								<v-card-actions>
									<v-btn color="teal" link :to="'/join/' + item.id" outlined
										>More Details</v-btn
									>
								</v-card-actions>
							</v-card>
						</v-col>
						<v-col cols="12">
							<p>
								These internal vacancies are only open to application to staff
								employed by FCAT, colleagues seconded to work in FCAT from
								another organisation or supply staff with 12+ weeks service with
								FCAT who are covered by the Agency Worker Regulations (2010).
							</p>
						</v-col>
					</v-row>
				</template>
			</v-data-iterator>
		</v-container>
	</section>
</template>
<script>
export default {
	data() {
		return {
			loading: false,
			itemsPerPage: 50,
			vacancies: [],
		};
	},
	created() {
		this.loading = true;
	},
	mounted() {
		this.scrollToTop();
		this.getContent();
		this.loading = false;
	},
	methods: {
		scrollToTop() {
			window.scrollTo(0, 0);
		},
		getContent() {
			this.loading = true;
			this.scrollToTop();
			axios.get("/get/allInternalVacancies").then(({ data }) => {
				this.vacancies = data;
				this.loading = false;
			});
		},
	},
};
</script>
<style lang="scss" scoped>
.nerd {
	margin-top: -150px;
}
</style>
