<template>
	<v-app-bar app clipped-left elevate-on-scroll white class="top-border--teal">
		<!-- <v-app-bar app clipped-left flat hide-on-scroll scroll-threshold="500" class="top-border--teal"> -->
		<v-app-bar-nav-icon @click.stop="navdrawerClick"></v-app-bar-nav-icon>
		<v-toolbar-title class="pb-md-2 linkCursor" @click="gotoPage('/')">
			<v-avatar :size="avatarsize" tile class="mr-3 teal--text">
				<img src="/images/hexagon-icon.png" />
			</v-avatar>
			<span class>Team FCAT</span>
		</v-toolbar-title>
		<v-spacer></v-spacer>
		<v-responsive
			class="noOverflowHide"
			max-width="225"
			v-if="this.$vuetify.breakpoint.lgAndUp"
		>
			<a href="http://www.google.co.uk" target="_blank">
				<v-text-field
					dense
					readonly
					outlined
					hide-details
					rounded
					placeholder="Search Google"
					prepend-inner-icon="mdi-magnify"
					clearable
					class="mr-2"
				></v-text-field>
			</a>
		</v-responsive>

		<!-- <v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.lgAndUp" to="/">
			<v-icon class=" grey--text lighten-1">mdi-home</v-icon>
		</v-btn> -->

		<v-btn
			text
			class="mr-2"
			v-if="this.$vuetify.breakpoint.mdAndUp"
			to="/pagesearch"
		>
			<v-icon class="mr-2 grey--text lighten-1">mdi-magnify</v-icon>Search Site
		</v-btn>

		<v-btn
			text
			class="mr-2"
			v-if="this.$vuetify.breakpoint.mdAndUp"
			to="/covid"
		>
			<v-icon class="mr-2 grey--text lighten-1"
				>mdi-cellphone-information</v-icon
			>COVID-19
		</v-btn>

		<v-btn
			text
			class="mr-2"
			v-if="this.$vuetify.breakpoint.lgAndUp"
			to="/remotetl"
		>
			<v-icon class="mr-2 grey--text lighten-1">mdi-cast-education</v-icon
			>REMOTE T&amp;L
		</v-btn>

		<key-info-menu v-if="this.$vuetify.breakpoint.lgAndUp"></key-info-menu>
		<central-services-menu
			v-if="this.$vuetify.breakpoint.lgAndUp"
		></central-services-menu>

		<g-apps-menu
			:avatar="this.$store.getters.getAvatar"
			@logout="logout"
			v-on="$listeners"
		></g-apps-menu>

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
import { mdiArrowRightThinCircleOutline } from "@mdi/js";
export default {
	// props: ["navdrawer"],
	methods: {
		navdrawerClick() {
			this.$emit("navdrawerClick");
		},
		gotoPage(slug) {
			this.$router.push(slug);
		},
		logout() {
			// console.log("logout");
			axios
				.post("/logout")
				.then(() => {
					window.location.href = "/login";
				})
				.catch((error) => {
					window.location.href = "/login";
				});
		},
	},
	computed: {
		avatarsize() {
			if (this.$vuetify.breakpoint.smAndDown) {
				return 32;
			} else {
				return 48;
			}
		},
	},
};
</script>
<style lang="scss" scoped>
.noOverflowHide {
	overflow: visible;
  .v-responsive__content a {
    text-decoration: none;
  }
}
</style>
