<template>
	<div>
		<div v-if="loading" class="container pt-md-6rem">
			<v-progress-circular indeterminate teal></v-progress-circular>
		</div>
		<div v-if="!loading">
			<v-app-bar
				absolute
				elevate-on-scroll
				color="grey lighten-3"
				style="position: sticky; top: 64px"
			>
				<v-toolbar-title>Join TeamFCAT - Create New vacancy</v-toolbar-title>

				<v-spacer></v-spacer>
			</v-app-bar>
			<v-form class="teal">
				<v-container>
					<v-row>
						<v-col cols="12" md="6">
							<v-card outlined>
								<v-card-title class="p-1 orange darken-2"> </v-card-title>
								<v-card-title>New Vacancy Details </v-card-title>
								<v-card-text>
									<v-row>
										<!-- POST TITLE -->
										<v-col cols="12">
											<v-text-field
												prepend-icon="fas fa-user fa-fw"
												v-model="vacancyDetails.postTitle"
												label="Post Title"
												required
											></v-text-field>
										</v-col>
										<!-- SELECT ACADEMY -->
										<v-col cols="12">
											<v-select
												prepend-icon="fas fa-map-marker-alt fa-fw"
												:items="academies"
												item-text="label"
												item-value="value"
												v-model="selectedAcademy"
												label="Academy"
												required
											></v-select>
										</v-col>
										<!-- SELECT SALARY SCALE -->
										<v-col
											cols="12"
											v-if="vacancyDetails.postTitle && vacancyDetails.location"
										>
											<v-select
												prepend-icon="fas fa-balance-scale fa-fw"
												:items="salaryscales"
												item-text="name"
												item-value="id"
												v-model="selectedSalary"
												label="Salary Pay Scale"
												required
											></v-select>
										</v-col>
										<!-- NJC SCALES SELECTOR -->
										<v-col cols="12" v-if="selectedSalary === 1">
											<v-select
												prepend-icon="fas fa-sliders-h fa-fw"
												:items="payScales"
												item-text="details"
												item-value="id"
												v-model="selectedPayScale"
												label="Select Pay Scale Range"
												required
											></v-select>
										</v-col>
										<!-- LEADERSHIP SCALE SELECTOR -->
										<v-col
											cols="12"
											v-if="selectedSalary === 2 || selectedPayScale === 10"
										>
											<v-range-slider
												prepend-icon="fas fa-sliders-h fa-fw"
												v-model="leadershipScaleRange"
												:max="leadershipMaxPoint"
												:min="leadershipMinPoint"
												hide-details
												class="align-center"
												thumb-color="teal"
												thumb-size="32"
												thumb-label="always"
												label="Set Scale Range"
												inverse-label
											>
											</v-range-slider>
										</v-col>
										<!-- TEACHER MAIN PAY SCALE PLACEHOLDER -->
										<v-col cols="12" v-if="selectedSalary === 3">
											<v-text-field
												prepend-icon="fas fas fa-sliders-h fa-fw"
												label="Scale Range"
												v-model="this.vacancyDetails.range"
												disabled
											></v-text-field>
										</v-col>
										<!-- UNQUALIFIFED TEACHER PAY SCALE PLACEHOLDER -->
										<v-col cols="12" v-if="selectedSalary === 5">
											<v-text-field
												prepend-icon="fas fas fa-sliders-h fa-fw"
												label="Scale Range"
												v-model="this.vacancyDetails.range"
												disabled
											></v-text-field>
										</v-col>
										<!-- ENTER SALARY - FREE TEXT -->
										<v-col cols="12" v-if="selectedSalary">
											<v-text-field
												prepend-icon="fas fa-pound-sign fa-fw"
												label="Salary"
												v-model="vacancyDetails.salary"
											></v-text-field>
										</v-col>
										<v-col cols="12" class="py-2" v-if="selectedSalary">
											<p>
												<v-icon>fas fa-map-marker-alt fa-fw</v-icon>
												<span class="v-label"> Select Contract Type </span>
											</p>
											<v-row>
												<v-col>
													<v-btn-toggle
														v-model="selectedContractType"
														color="teal"
													>
														<v-btn outlined value="Permanent">Permanent</v-btn>
														<v-btn outlined value="Fixed Term"
															>Fixed Term</v-btn
														>
													</v-btn-toggle>
													<v-btn-toggle
														v-model="vacancyDetails.contractTime"
														color="teal"
													>
														<v-btn outlined value="Full Time">Full Time</v-btn>
														<v-btn outlined value="Part Time">Part Time</v-btn>
													</v-btn-toggle>
													<v-btn-toggle
														v-model="vacancyDetails.contractTermTimeOnly"
														color="teal"
													>
														<v-btn
															outlined
															value="Term Time Only"
															@click="!vacancyDetails.contractTermTimeOnly"
															>Term Time</v-btn
														>
													</v-btn-toggle>
												</v-col>
											</v-row>
										</v-col>
										<v-row>
											<!-- ENTER WEEKLY HOURS - FREE TEXT -->
											<v-col
												cols="12"
												md="6"
												v-if="vacancyDetails.contractTime"
											>
												<v-text-field
													prepend-icon="fas fa-hourglass-half fa-fw"
													label="Contract Hours"
													v-model="vacancyDetails.contractHours"
												></v-text-field>
											</v-col>
											<!-- ENTER WEEKS PER YEAR - FREE TEXT -->
											<v-col
												cols="12"
												md="6"
												v-if="vacancyDetails.contractTermTimeOnly"
											>
												<v-text-field
													prepend-icon="fas fa-calendar-week fa-fw"
													label="Contract Weeks"
													v-model="vacancyDetails.contractWeeks"
												></v-text-field>
											</v-col>
										</v-row>
										<v-row>
											<!-- START DATE PICKER -->
											<v-col
												cols="12"
												md="6"
												v-if="
													vacancyDetails.contractType &&
													vacancyDetails.contractTime
												"
											>
												<v-menu
													v-model="startDatePicker"
													:close-on-content-click="false"
													transition="scale-transition"
													offset-y
													max-width="290px"
													min-width="auto"
												>
													<template v-slot:activator="{ on, attrs }">
														<v-text-field
															v-model="contractStartDateFormatted"
															label="Start Date"
															readonly
															prepend-icon="far fa-calendar-check fa-fw"
															v-bind="attrs"
															v-on="on"
															@blur="
																contractStartDate = parseDate(
																	contractStartDateFormatted
																)
															"
														></v-text-field>
													</template>
													<v-date-picker
														v-model="contractStartDate"
														no-title
														@input="startDatePicker = false"
													></v-date-picker>
												</v-menu>
											</v-col>
											<!-- START DATE PICKER END -->
											<!-- FIXED TERM END DATE PICKER -->
											<v-col
												cols="12"
												md="6"
												v-if="
													vacancyDetails.contractType === 'Fixed Term' &&
													vacancyDetails.contractTime
												"
											>
												<v-menu
													v-model="fixedEndPicker"
													:close-on-content-click="false"
													transition="scale-transition"
													offset-y
													max-width="290px"
													min-width="auto"
												>
													<template v-slot:activator="{ on, attrs }">
														<v-text-field
															v-model="contractEndDateFormatted"
															label="Fixed Term End Date"
															readonly
															prepend-icon="far fa-calendar-times fa-fw"
															v-bind="attrs"
															v-on="on"
															@blur="
																contractEndDate = parseDate(
																	contractEndDateFormatted
																)
															"
														></v-text-field>
													</template>
													<v-date-picker
														v-model="contractEndDate"
														no-title
														@input="fixedEndPicker = false"
													></v-date-picker>
												</v-menu>
											</v-col>
											<!-- FIXED TERM END DATE PICKER END-->
										</v-row>
										<!-- CLOSING DATE PICKER -->
										<v-col
											cols="12"
											v-if="
												vacancyDetails.contractType &&
												vacancyDetails.contractHours
											"
										>
											<v-menu
												v-model="closingDatePicker"
												:close-on-content-click="false"
												transition="scale-transition"
												offset-y
												max-width="290px"
												min-width="auto"
											>
												<template v-slot:activator="{ on, attrs }">
													<v-text-field
														v-model="closingDateFormatted"
														label="Closing Date"
														readonly
														prepend-icon="fas fa-hourglass-end fa-fw"
														v-bind="attrs"
														v-on="on"
														@blur="
															closingDate = parseDate(closingDateFormatted)
														"
													></v-text-field>
												</template>
												<v-date-picker
													v-model="closingDate"
													no-title
													@input="closingDatePicker = false"
												></v-date-picker>
											</v-menu>
										</v-col>
										<!-- CLOSING DATE PICKER END -->
										<!-- ABOUT THE ROLE TEXT AREA START -->
										<v-col cols="12" v-if="contractStartDate">
											<v-textarea
												prepend-icon="fas fa-user-edit fa-fw"
												v-model="vacancyDetails.aboutTheRole"
												auto-grow
												color="teal"
												label="About the Role"
												rows="4"
											></v-textarea>
										</v-col>
										<!-- ABOUT THE ROLE TEXT AREA END -->
									</v-row>
									<v-divider></v-divider>
									<v-card-actions>
										<v-btn text tile color="warning">CANCEL</v-btn>
										<v-spacer></v-spacer>
										<v-btn @click="saveVacancy" text tile color="teal"
											>SAVE</v-btn
										>
									</v-card-actions>
								</v-card-text>
							</v-card>
						</v-col>
						<!-- ADVERT MOCK UP PLACEHOLDER -->
						<v-col cols="12" md="6">
							<v-card
								elevation="2"
								outlined
								v-if="
									!this.vacancyDetails.postTitle &&
									!this.selectedAcademyDetails.icon
								"
							>
								<v-card-title
									class="p-1"
									:class="selectedAcademyDetails.color || 'grey'"
								>
								</v-card-title>
								<v-skeleton-loader
									type="list-item-avatar, divider, list-item-three-line, divider, article"
								></v-skeleton-loader>
							</v-card>
							<!-- ADVERT MOCK UP -->
							<v-card
								elevation="2"
								outlined
								v-if="
									this.vacancyDetails.postTitle ||
									this.selectedAcademyDetails.icon
								"
							>
								<v-card-title
									class="p-1"
									:class="selectedAcademyDetails.color || 'grey'"
								>
								</v-card-title>
								<v-list-item three-line>
									<v-list-item-content>
										<div class="text-overline mb-4">INTERNAL ONLY</div>
										<v-list-item-title
											class="text-h4 mb-1"
											v-if="selectedAcademyDetails"
										>
											{{ this.vacancyDetails.postTitle }}
										</v-list-item-title>
										<v-list-item-subtitle
											v-if="
												this.vacancyDetails.location &&
												this.vacancyDetails.postTitle
											"
											>{{ this.vacancyDetails.location }}</v-list-item-subtitle
										>
									</v-list-item-content>

									<v-list-item-avatar
										v-if="selectedAcademyDetails.icon"
										size="100"
									>
										<v-img
											:src="'/images/icons/' + this.selectedAcademyDetails.icon"
										></v-img
									></v-list-item-avatar>
								</v-list-item>
								<v-card-text>
									<v-divider
										v-if="
											this.vacancyDetails.location &&
											this.vacancyDetails.postTitle
										"
										class="mt-0"
									></v-divider>
									<div>
										<p v-if="this.vacancyDetails.salarypayscale">
											Scale: {{ this.vacancyDetails.salarypayscale }}
										</p>
										<p v-if="this.vacancyDetails.grade">
											Grade: {{ this.vacancyDetails.grade }}
										</p>
										<p v-if="this.vacancyDetails.range">
											Range: {{ this.vacancyDetails.range }}
										</p>
										<p v-if="this.vacancyDetails.salary">
											Salary: {{ this.vacancyDetails.salary }}
										</p>
										<p v-if="this.vacancyDetails.contractType">
											Contract: {{ this.vacancyDetails.contractType }}
											{{ this.vacancyDetails.contractTime }}
											{{ this.vacancyDetails.contractTermTimeOnly }}
										</p>
										<p v-if="this.vacancyDetails.contractHours">
											Hours:
											{{ this.vacancyDetails.contractHours }}
										</p>
										<p v-if="this.vacancyDetails.contractWeeks">
											Weeks:
											{{ this.vacancyDetails.contractWeeks }}
										</p>
										<p v-if="this.vacancyDetails.contractEndDateFormatted">
											Fixed End Date:
											{{ this.vacancyDetails.contractEndDateFormatted }}
										</p>
										<p v-if="this.vacancyDetails.contractStartDateFormatted">
											Start Date:
											{{ this.vacancyDetails.contractStartDateFormatted }}
										</p>
									</div>
									<v-divider
										v-if="
											this.vacancyDetails.location &&
											this.vacancyDetails.salarypayscale
										"
									></v-divider>
									<div v-if="selectedAcademyDetails.about">
										<div class="text-h4">
											About {{ this.vacancyDetails.location }}
										</div>
										<div class="whitespace-pre-line">
											{{ selectedAcademyDetails.about }}
										</div>
									</div>
									<div v-if="this.vacancyDetails.aboutTheRole">
										<v-divider></v-divider>
										<div class="text-h4">About The Role</div>
										<div class="whitespace-pre-line">
											{{ this.vacancyDetails.aboutTheRole }}
										</div>
									</div>
									<v-divider></v-divider>
									<div v-if="selectedAcademyDetails.about">
										<div class="text-h4 mb-4">How to apply</div>
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit.
											Dolor, commodi. Asperiores possimus explicabo voluptate.
											Dolore quam, ab voluptatum deserunt similique in culpa
											esse vero laboriosam numquam aliquid suscipit optio aut
											sequi corporis veniam, consectetur deleniti sapiente ipsam
											voluptatibus nobis necessitatibus officia? Repudiandae
											natus dolor vero molestias possimus, officiis voluptas
											excepturi fuga suscipit, repellendus quibusdam porro,
											voluptatem reprehenderit soluta tempore enim quia?
										</p>
										<p>
											Maiores, harum. Aliquam, totam laborum nesciunt,
											perspiciatis tempora necessitatibus porro, commodi ipsa
											quidem quam quas quisquam laboriosam ea nihil. Deserunt
											sequi nihil aliquid nobis optio asperiores!
										</p>
										<p>
											Totam reprehenderit veritatis accusantium. Consequuntur,
											error dignissimos perferendis modi architecto ipsam
											doloribus eius.
										</p>
									</div>
								</v-card-text>
							</v-card>
						</v-col>
					</v-row>
				</v-container>
			</v-form>
		</div>
	</div>
</template>
<script>
import axios from "axios";
import CovidLandingPage from "../CovidLandingPage.vue";
export default {
	components: { CovidLandingPage },
	watch: {
		selectedAcademy() {
			this.selectedAcademyDetails = this.academies.find(
				(a) => a.id === this.selectedAcademy
			);
			this.vacancyDetails.about = this.selectedAcademyDetails.about;
			this.vacancyDetails.icon = this.selectedAcademyDetails.icon;
			this.vacancy.academy_id = this.selectedAcademyDetails.id;
			this.vacancyDetails.location = this.selectedAcademyDetails.name;
			this.vacancyDetails.name = this.selectedAcademyDetails.name;
		},
		selectedSalary() {
			this.selectedSalaryDetails = this.salaryscales.find(
				(a) => a.id === this.selectedSalary
			);
			this.vacancyDetails.salarypayscale = this.selectedSalaryDetails.name;
			this.payScales = [];
			this.selectedPayScaleDetails = null;
			this.selectedPayScale = null;
			this.leadershipScaleRange[0] = 1;
			this.leadershipScaleRange[1] = 43;
			delete this.vacancyDetails.grade;
			delete this.vacancyDetails.range;
			// Check Salary Pay Scale then set appropriate Pay Scale Range options
			this.selectedSalary === 1 // NJC Pay Scale
				? this.getPayScales()
				: this.selectedSalary === 2 // Leadership Pay Scale
				? (this.vacancyDetails.range =
						this.leadershipScaleRange[0] + "-" + this.leadershipScaleRange[1])
				: this.selectedSalary === 3 // Teacher Main Pay Scale
				? (this.vacancyDetails.range = "M1-M6")
				: this.selectedSalary === 4 // Upper Pay Scale
				? (this.vacancyDetails.range = "U1-U3")
				: this.selectedSalary === 5 // Unqualified Teacher Pay Scale
				? (this.vacancyDetails.range = "UQ1-UQ6")
				: (this.payScales = []);
		},
		selectedPayScale() {
			this.selectedPayScaleDetails = this.payScales.find(
				(a) => a.id === this.selectedPayScale
			);
			if (this.selectedPayScaleDetails.grade) {
				this.vacancyDetails.grade = this.selectedPayScaleDetails.grade;
			}
			if (this.selectedPayScaleDetails.range) {
				this.vacancyDetails.range = this.selectedPayScaleDetails.range;
			}
		},
		leadershipScaleRange() {
			this.vacancyDetails.range =
				this.leadershipScaleRange[0] + "-" + this.leadershipScaleRange[1];
		},
		selectedContractType() {
			this.vacancyDetails.contractType = this.selectedContractType;
			if (this.selectedContractType === "Permanent") {
				this.contractEndDate = null;
				this.contractEndDateFormatted = null;
				delete this.vacancyDetails.contractEndDate;
				delete this.vacancyDetails.contractEndDateFormatted;
			}
		},
		contractEndDate(val) {
			this.contractEndDateFormatted = this.formatDate(this.contractEndDate);
			this.vacancyDetails.contractEndDateFormatted = this.contractEndDateFormatted;
			this.vacancyDetails.contractEndDate = this.contractEndDate;
		},
		contractStartDate(val) {
			this.contractStartDateFormatted = this.formatDate(this.contractStartDate);
			this.vacancyDetails.contractStartDateFormatted = this.contractStartDateFormatted;
			this.vacancyDetails.contractStartDate = this.contractStartDate;
		},
		closingDate(val) {
			this.closingDateFormatted = this.formatDate(this.closingDate);
			this.vacancy.closingDateFormatted = this.closingDateFormatted;
			this.vacancy.closingDate = this.closingDate;
		},
	},
	data() {
		(vm) => ({
			contractEndDate: new Date(
				Date.now() - new Date().getTimezoneOffset() * 60000
			)
				.toISOString()
				.substr(0, 10),
			contractEndDateFormatted: vm.formatDate(
				new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
					.toISOString()
					.substr(0, 10)
			),
			contractStartDate: new Date(
				Date.now() - new Date().getTimezoneOffset() * 60000
			)
				.toISOString()
				.substr(0, 10),
			contractStartDateFormatted: vm.formatDate(
				new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
					.toISOString()
					.substr(0, 10)
			),
			closingDate: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
				.toISOString()
				.substr(0, 10),
			closingDateFormatted: vm.formatDate(
				new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
					.toISOString()
					.substr(0, 10)
			),
			fixedEndPicker: false,
			startDatePicker: false,
			closingDatePicker: false,
		});
		return {
			contractEndDate: null,
			contractEndDateFormatted: null,
			fixedEndPicker: false,
			contractStartDate: null,
			contractStartDateFormatted: null,
			startDatePicker: false,
			closingDate: null,
			closingDateFormatted: null,
			closingDatePicker: false,
			selectedContractType: null,
			loading: false,
			academies: [],
			salaryscales: [],
			payScales: [],
			vacancy: {},
			vacancyDetails: {},
			contracts: [
				{
					type: "Permanent",
				},
				{
					type: "Fixed Term",
				},
			],
			selectedAcademy: null,
			selectedAcademyDetails: {},
			selectedSalary: null,
			selectedSalaryDetails: {},
			selectedPayScale: null,
			selectedPayScaleDetails: {},
			leadershipScaleRange: [1, 43],
			leadershipMinPoint: 1,
			leadershipMaxPoint: 43,
		};
	},
	created() {
		this.loading = true;
		console.log(this.$isSiteAdmin());
		if (this.$isHrUser() == false || this.$isSiteAdmin() == false) {
			console.log("Thou Shall Not Pass");
			this.$router.push("/");
		}
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
			axios.get("/get/createVacancy").then(({ data }) => {
				// console.log(data);
				this.academies = data.academies;
				this.salaryscales = data.salaryscales;
				this.loading = false;
			});
		},
		getPayScales() {
			axios.get("/get/payScales/" + this.selectedSalary).then(({ data }) => {
				// console.log(data);
				this.payScales = data;
			});
		},
		saveVacancy() {
			console.log(this.vacancy);
			let details = JSON.stringify(this.vacancyDetails);
			let vacancy = new FormData();
			vacancy.append("academy_id", this.vacancy.academy_id);
			vacancy.append("closingDate", this.vacancy.closingDate);
			vacancy.append("closingDateFormatted", this.vacancy.closingDateFormatted);
			vacancy.append("details", details);

			axios.post("/post/saveVacancy", vacancy).then((res) => {
				// console.log(res);
				this.$router.push("/join");
			});
		},
		formatDate(date) {
			if (!date) return null;

			const [year, month, day] = date.split("-");
			return `${day}/${month}/${year}`;
		},
		parseDate(date) {
			if (!date) return null;

			const [month, day, year] = date.split("/");
			return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
		},
	},
};
</script>
