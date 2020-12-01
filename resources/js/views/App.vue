<template>
	<v-app id="teamfcat">
		<side-nav-drawer :navdrawer="navdrawer"></side-nav-drawer>

		<top-nav-bar :navdrawer="navdrawer" @navdrawerClick="navdrawerClick" @showCheckDetailsDialog="showCheckDetailsDialog=true"></top-nav-bar>

		<!-- MAIN ROUTER-VIEW ------------------------------------->
		<v-main class="pb-0 pt-15">
			<!-- <transition name="fade" mode="out-in"> -->
			<v-fade-transition>
				<router-view :key="$route.path" />
			</v-fade-transition>
			<!-- </transition> -->
		</v-main>

		<v-dialog v-model="showCheckDetailsDialog" persistent class="container">
			<v-card class>
				<v-toolbar color="teal" dark>
					<v-toolbar-title class="container">Please check and update your details</v-toolbar-title>
					<v-spacer></v-spacer>
					<v-btn text @click="saveDetails">Save</v-btn>
				</v-toolbar>
				<v-container fluid pt-3>
					<v-row>
						<v-col cols="12" lg="6">
							<v-text-field v-model="user.name" label="Name" color="teal" disabled hide-details dense>
								<v-icon slot="prepend" class="mx-2" color="teal">fa-user fa-fw</v-icon>
							</v-text-field>
						</v-col>
						<v-col cols="12" lg="6">
							<v-text-field
								v-model="user.email"
								label="Email Address"
								color="teal"
								disabled
								hide-details
								dense
							>
								<v-icon slot="prepend" class="mx-2" color="teal">far fa-id-badge fa-fw</v-icon>
							</v-text-field>
						</v-col>
					</v-row>
					<v-row>
						<v-col cols="12">
							<v-text-field
								v-model="user.keyrole"
								outlined
								label="Role(s)"
								color="teal"
								hint="Please enter your role(s) in school. (DSL, French Teacher, Attendance Officer, etc)"
								persistent-hint
							>
								<v-icon slot="prepend" class="mx-2" color="teal">fa-user-tag fa-fw</v-icon>
							</v-text-field>
						</v-col>
					</v-row>
					<v-row>
						<v-col cols="12">
							<v-text-field
								v-model="user.twitterHandle"
								outlined
								label="School / Professional Twitter Handle"
								color="teal"
								hint="If you have a school or work Twitter account you can add it here so that colleagues can follow you"
								persistent-hint
							>
								<v-icon slot="prepend" class="mx-2" color="teal">fab fa-twitter fa-fw</v-icon>
							</v-text-field>
						</v-col>
					</v-row>
					<v-row>
						<v-col cols="12" md="6">
							<v-text-field
								v-model="user.ext"
								outlined
								label="Phone or extension number(s)"
								color="teal"
								hint="If you have a phone or extension number please enter it here"
								persistent-hint
							>
								<v-icon slot="prepend" class="mx-2" color="teal">fa-phone fa-fw</v-icon>
							</v-text-field>
						</v-col>
						<v-col cols="12" md="6">
							<v-text-field
								v-model="user.mobile"
								outlined
								label="Mobile phone number(s)"
								color="teal"
								hint="If you have a mobile phone for work use please enter it here"
								persistent-hint
							>
								<v-icon slot="prepend" class="mx-2" color="teal">fa-mobile-alt fa-fw</v-icon>
							</v-text-field>
						</v-col>
					</v-row>
				</v-container>
			</v-card>
		</v-dialog>

		<!-- FOOTER SECTION ------------------------------------->
		<v-footer hidden app clipped class="px-10">
			<span>TeamFCAT &copy; 2020</span>
		</v-footer>
	</v-app>
</template>
<script>
import ClickOutside from "vue-click-outside";
export default {
	watch: {
		$route: function() {}
	},
	data: () => ({
		navdrawer: false,
		showCheckDetailsDialog: false,
		user: ""
	}),
	created() {
		// this.$vuetify.theme.dark = false;
	},
	mounted() {
		this.getUserDetails();
	},
	methods: {
		getUserDetails() {
			axios
				.get("/get/userDetails")
				.then(({ data }) => {
					this.$store.commit("setUser", data);
					this.$store.commit("setName", data.name);
					this.$store.commit("setUserId", data.id);
					this.$store.commit("setRoleId", data.role_id);
					this.$store.commit("setAvatar", data.avatar);
					this.$store.commit("setGtoken", data.token);
					this.$store.commit("setSchool", data.school);
				})
				.then(() => {
					this.checkDetails();
				});
		},
		checkDetails() {
			this.user = this.$store.getters.getUser;
			if (!this.user.keyrole) {
				this.showCheckDetailsDialog = true;
			}
		},
		saveDetails() {
			console.log("Saving Details");
			axios.post("/post/userDetails/" + this.user.id, this.user).then(() => {});
			this.showCheckDetailsDialog = false;
		},
		gotoCovid() {
			this.$router.push("/covid");
		},
		navdrawerClick() {
			if (!this.navdrawer) {
				this.navdrawer = true;
			} else {
				this.navdrawer = false;
			}
		},
		logout() {
			console.log("logout");
			axios
				.post("/logout")
				.then(() => {
					window.location.href = "/login";
				})
				.catch(error => {
					window.location.href = "/login";
				});
		}
	}
};
</script>
<style lang="scss" scoped>
.fade-enter {
	opacity: 0;
}

.fade-enter-active {
	transition: opacity 0.25s ease;
}

.fade-leave {
}

.fade-leave-active {
	transition: opacity 0.25s ease;
	opacity: 0;
}
</style>
