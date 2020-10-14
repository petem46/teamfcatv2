<template>
	<v-app-bar app clipped-left elevate-on-scroll white class="top-border--teal">
		<!-- <v-app-bar app clipped-left flat hide-on-scroll scroll-threshold="500" class="top-border--teal"> -->
		<v-app-bar-nav-icon @click.stop='navdrawerClick'></v-app-bar-nav-icon>
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

		<g-apps-menu :avatar="this.$store.getters.getAvatar" @logout="logout" v-on="$listeners"></g-apps-menu>

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
		</v-menu>-->
	</v-app-bar>
</template>
<script>
export default {
	props: ["navdrawer"],
	methods: {
    navdrawerClick() {
      this.$emit("navdrawerClick");
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
