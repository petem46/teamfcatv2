<template>
	<div>
		<div v-if="!$isSiteAdmin()" class="container pt-md-6rem">
			<h1 class="display-1 red--text">NOPE</h1>
		</div>
		<div v-if="loading && $isSiteAdmin()" class="container pt-md-6rem">
			<v-progress-circular indeterminate teal></v-progress-circular>
		</div>
		<div v-if="!loading && $isSiteAdmin()">
			<section
				class="elevation-5"
				:class="$vuetify.breakpoint.smAndDown ? 'sm' : ''"
			>
				<div class="p-15 mx-15">
					<h1 class="display-3 pt-15 white--text text--darken-2 text-center">
						USER MANAGEMENT
					</h1>
					<v-card class="mb-15">
						<!-- <v-card-title class="text-center">
						<v-text-field
							v-model="search"
							append-icon="mdi-magnify"
							label="Search"
							single-line
							hide-details
							clearable
						></v-text-field>
					</v-card-title> -->
						<v-data-table
							@click:row="editUser"
							:headers="datatableheaders"
							:items="staffs"
							:search="search"
							fixed-header
							:multi-sort="multisort"
							:items-per-page="100"
							class="grey--text text--darken-2"
						>
							<template v-slot:top>
								<v-row>
									<v-col cols="12" md="4">
										<v-text-field
											v-model="search"
											append-icon="fas fa-search fa-sm"
											label="Staff Search"
											hint="Search for staff member"
											persistent-hint
											class="ml-5"
										></v-text-field>
									</v-col>
									<v-col cols="12" md="4" class="order-md-3 order-9">
										<v-select
											append-icon="fa-filter fa-sm"
											hint="School Filter"
											persistent-hint
											v-model="school"
											:items="schools"
											class="ml-5"
										></v-select>
									</v-col>
								</v-row>
							</template>
							<template v-slot:item.role="{ item }">
								<v-chip
									v-for="role in item.role"
									:key="role.id"
									v-bind="role"
									small
									outlined
									class="mr-2 my-2"
								>
									{{ role.name }}
								</v-chip>
							</template>
						</v-data-table>
					</v-card>
					<v-dialog v-model="dialog" fullscreen>
						<v-card>
							<v-toolbar color="primary">
								<v-btn icon @click="close">
									<v-icon>mdi-close</v-icon>
								</v-btn>
								<v-toolbar-title
									>{{ formTitle }} {{ editedUser.name }}</v-toolbar-title
								>
								<v-spacer></v-spacer>
								<v-toolbar-items>
									<v-btn text @click="submit">Save</v-btn>
								</v-toolbar-items>
							</v-toolbar>
							<v-container>
								<form @submit.prevent="submit">
									<v-card-text>
										<v-container>
											<v-row>
												<v-col cols="12">
													<v-text-field
														id="name"
														v-model="editedUser.name"
														label="Staff Name"
														:rules="rules"
														hide-details="auto"
													></v-text-field>
												</v-col>
												<v-col cols="12">
													<v-select
														id="school"
														:items="schools"
														v-model="editedUser.school"
														item-text="name"
														item-value="id"
														label="School"
													></v-select>
												</v-col>
												<v-col cols="6">
													<v-text-field
														id="email"
														v-model="editedUser.email"
														label="Staff Email Address"
														:rules="rules"
														hide-details="auto"
													></v-text-field>
												</v-col>
												<v-col cols="6">
													<v-text-field
														id="twitterHandle"
														v-model="editedUser.twitterHandle"
														label="Staff Twitter Handle"
														hide-details="auto"
													></v-text-field>
												</v-col>
												<v-col cols="6">
													<v-text-field
														id="ext"
														v-model="editedUser.ext"
														label="Staff Extension Number"
														hide-details="auto"
													></v-text-field>
												</v-col>
												<v-col cols="6">
													<v-text-field
														id="mobile"
														v-model="editedUser.mobile"
														label="Staff Mobile Number"
														hide-details="auto"
													></v-text-field>
												</v-col>

												<v-col cols="12">
													<v-select
														v-model="editedUser.role"
														:items="roles"
														item-text="name"
														item-value="id"
														label="Select Access Roles for User"
														multiple
														chips
														return-object
													></v-select>
												</v-col>
											</v-row>
										</v-container>
									</v-card-text>

									<v-card-actions>
										<v-btn
											v-if="formDelete"
											outlined
											color="red darken-1"
											text
											@click="deleteCPD()"
											>Delete</v-btn
										>
										<v-spacer></v-spacer>
										<v-btn text @click="close">Cancel</v-btn>
										<v-btn type="submit" text>Save</v-btn>
									</v-card-actions>
								</form>
							</v-container>
						</v-card>
					</v-dialog>
				</div>
				<!--
    ****  SNACKBAR ALERT AFTER EDIT OR ADD COURSE
		-->
				<v-snackbar
					v-model="snackbar.show"
					:color="snackbar.color"
					:timeout="snackbar.timeout"
					multi-line
					bottom
				>
					{{ snackbar.text }}
					<v-btn dark text @click="snackbar.show = false">Close</v-btn>
				</v-snackbar>
			</section>
		</div>
	</div>
</template>
<script>
export default {
	data: () => ({
		loading: false,
		dialog: false,
		search: "",
		school: "All",
		multisort: false,
		editedIndex: -1,
		editedUser: {
			name: "",
			school: "",
			email: "",
			roles: [],
		},
		snackbar: {
			color: "",
			mode: "",
			show: false,
			text: "",
			timeout: 2000,
			x: null,
			y: "top",
		},
		datatableheaders: [
			{
				text: "Name",
				align: "start",
				sortable: true,
				value: "name",
				class: "white--text overline grey darken-2",
			},
			{
				text: "School",
				align: "left",
				sortable: true,
				value: "school",
				// filter: (value) => {
				// 	if (this.school === "All") return true;
				// 	if (!this.school) return true;
				// 	return value === this.school;
				// },
				class: "white--text overline grey darken-2",
			},
			{
				text: "Email",
				align: "start",
				sortable: true,
				value: "email",
				class: "white--text overline grey darken-2",
			},
			{
				text: "Role(s)",
				align: "start",
				sortable: true,
				value: "role",
				class: "white--text overline grey darken-2",
			},
		],
		staffs: [],
		schools: [],
		roles: [],
		selectedRoles: [],
		rules: [
			(value) => !!value || "Required.",
			(value) => (value && value.length >= 3) || "Min 3 characters",
		],
	}),
	mounted() {
		if (this.$isSiteAdmin()) {
      this.getAllStaff();
			this.getSchools();
			this.getRoles();
    }
		if (!this.$isSiteAdmin()) {
			this.$router.push("/");
		}
	},
	methods: {
		getAllStaff() {
			this.loading = true;
			axios
				.get("/get/allStaff")
				.then(({ data }) => {
					console.log(data);
					this.staffs = data;
				})
				.then(() => {
					setTimeout(() => {
						this.loading = false;
					}, 1000);
				});
		},
		getSchools() {
			this.loading = true;
			axios
				.get("/get/getSchools")
				.then(({ data }) => {
					this.schools = data.schools.map((schools) => schools.school);
				})
				.then(() => {
					this.schools.unshift("All");
				});
		},
		getRoles() {
			this.loading = true;
			axios.get("/get/getRoles").then(({ data }) => {
				this.roles = data;
			});
		},
		checkrow(value) {
			alert(value.name);
		},
		editUser(item) {
			this.editedIndex = this.staffs.indexOf(item);
			this.editedUser = Object.assign({}, item);
			this.dialog = true;
		},
		close() {
			this.dialog = false;
			setTimeout(() => {
				this.editedUser = Object.assign({}, this.defaultItem);
				this.editedIndex = -1;
			}, 300);
		},
		submit() {
			axios;
			axios
				.post("/post/userDetails/" + this.editedUser.id, this.editedUser)
				.then((response) => {
					this.dialog = false;
					this.getAllStaff();
					this.snackbar.color = "success";
					this.snackbar.text = response.data;
					this.snackbar.show = true;
					this.close();
				})
				.catch((error) => {
					if (error.response.status === 422) {
						this.errors = error.response.data.errors || {};
					}
				});
		},
	},
	computed: {
		formTitle() {
			return this.editedIndex === -1 ? "New User" : "Edit User: ";
		},
		formDelete() {
			return this.editedIndex === -1 ? false : true;
		},
	},
};
</script>
<style scoped lang="scss">
section {
	background: linear-gradient(90deg, #fc466b 0%, #3f5efb 100%);
	min-height: calc(100vh - 64px);
	&.sm {
		min-height: calc(100vh - 58px);
		background: linear-gradient(90deg, #fcf946 0%, #3fb6fb 100%);
	}
}
</style>
