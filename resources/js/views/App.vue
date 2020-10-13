<template>
	<v-app id="teamfcat">
		<v-navigation-drawer stateless v-model="navdrawer" app fixed clipped floating light>
			<v-list dense nav shaped>
				<v-list-item link to="/">
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title class="grey--text">Home</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				<v-list-item link to="/covid">
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title class="grey--text">COVID-19</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				<v-list-item link to="/updates">
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">mdi-account-group</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title class="grey--text">Updates</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				<v-list-item link to="https://cpd.teamfcat.co.uk">
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title class="grey--text">CPD Portal</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				<v-list-item
					link
					to="https://www.spongyelephant.com/login/?register=true&access_code=FCAT-AFE2"
				>
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title class="grey--text">GDPR Training</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				<v-list-item link>
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title class="grey--text">Menu</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				<v-list-item link>
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title class="grey--text">Menu</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
			</v-list>
		</v-navigation-drawer>

		<v-app-bar
			app
			clipped-left
			elevate-on-scroll
			white
			class="top-border--teal"
		>
			<!-- <v-app-bar app clipped-left flat hide-on-scroll scroll-threshold="500" class="top-border--teal"> -->
			<v-app-bar-nav-icon @click.stop="navdrawer = !navdrawer"></v-app-bar-nav-icon>
			<v-toolbar-title class="pl-1">
				<v-avatar :size="avatarsize" tile class="mr-3 teal--text">
					<img src="/images/hexagon-icon.png" />
				</v-avatar>
				<span class>Team FCAT</span>
			</v-toolbar-title>
			<v-spacer></v-spacer>

			<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp" to="/updates">
				<v-icon class="mr-2 grey--text lighten-1">mdi-clock-alert-outline</v-icon>Updates
			</v-btn>

			<!-- <latest-menu></latest-menu> -->
			<key-info-menu></key-info-menu>
			<remote-learning-menu></remote-learning-menu>
			<central-services-menu></central-services-menu>

      <g-apps-menu :avatar="avatar" @logout="logout"></g-apps-menu>

			<!-- <v-menu :nudge-width="200" offset-y>
				<template v-slot:activator="{ on }">
					<v-btn icon v-on="on">
						<v-icon>mdi-dots-vertical</v-icon>
					</v-btn>
				</template>

				<v-card class="top-border--teal">
					<v-list>
						<v-list-item>
							<v-list-item-avatar>
								<img :src="avatar" />
							</v-list-item-avatar>

							<v-list-item-content>
								<v-list-item-title>{{name}}</v-list-item-title>
								<v-list-item-subtitle>{{school}}</v-list-item-subtitle>
							</v-list-item-content>
						</v-list-item>
					</v-list>
					<v-divider></v-divider>
					<v-list>
						<v-list-item>
							<v-list-item-title>
								<v-icon class="mr-2 grey--text lighten-2">far fa-check-circle</v-icon>Menu choice
							</v-list-item-title>
						</v-list-item>
						<v-list-item>
							<v-list-item-title>
								<v-icon class="mr-2 grey--text lighten-2">far fa-check-circle</v-icon>Menu choice
							</v-list-item-title>
						</v-list-item>
						<v-list-item>
							<v-list-item-title>
								<v-icon class="mr-2 grey--text lighten-2">far fa-check-circle</v-icon>Menu choice
							</v-list-item-title>
						</v-list-item>
					</v-list>
					<v-divider></v-divider>
					<v-card-actions>
						<v-spacer></v-spacer>
						<v-btn small text @click.prevent="logout()">
							<v-icon class="mr-2">fa-sign-out-alt</v-icon>Log Out
						</v-btn>
					</v-card-actions>
				</v-card>
			</v-menu> -->
		</v-app-bar>

		<!-- MAIN ROUTER-VIEW ------------------------------------->
		<v-main class="pb-0">
			<!-- <transition name="fade" mode="out-in"> -->
			<v-fade-transition>
				<router-view :key="$route.path" />
			</v-fade-transition>
			<!-- </transition> -->
		</v-main>

		<!-- FOOTER SECTION ------------------------------------->
		<v-footer hidden app clipped class="px-10">
			<span>TeamFCAT &copy; 2020</span>
		</v-footer>
	</v-app>
</template>
<script>
import ClickOutside from "vue-click-outside";
export default {
	props: ["userid", "roleid", "avatar", "name", "school", "token"],
	watch: {
		$route: function() {}
	},
	data: () => ({
		navdrawer: null
	}),
	created() {
		// this.$vuetify.theme.dark = false;
	},
	mounted() {
		this.$store.commit("setName", this.name);
		this.$store.commit("setUserId", this.userid);
		this.$store.commit("setRoleId", this.roleid);
		this.$store.commit("setAvatar", this.avatar);
		this.$store.commit("setGtoken", this.token);
		this.token = "";
	},
	methods: {
		gotoCovid() {
			this.$router.push("/covid");
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
	},
	computed: {
		avatarsize() {
			if (this.$vuetify.breakpoint.smAndDown) {
				return 32;
			} else {
				return 48;
			}
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
