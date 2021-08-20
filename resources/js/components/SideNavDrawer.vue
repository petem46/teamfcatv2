<template>
	<v-navigation-drawer v-model="navdrawer" app clipped floating light stateless>
		<v-list dense nav>
			<v-list-item link @click="navdrawerClick" to="/">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-home</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">Home</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<v-list-item link @click="navdrawerClick" to="/covid">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text"
						>mdi-cellphone-information</v-icon
					>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">COVID-19</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<v-list-item link @click="navdrawerClick" to="/updates">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text"
						>mdi-newspaper-variant-outline</v-icon
					>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">Updates</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<!--
        Join TeamFCAT Menu Item
      -->
			<v-list-item v-if="$isHrUser() || $isSiteAdmin()" link @click="navdrawerClick" to="/join">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text"
						>mdi-account-multiple-plus-outline</v-icon
					>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text"
						>Join TeamFCAT</v-list-item-title
					>
				</v-list-item-content>
			</v-list-item>
			<!--
        Join TeamFCAT Menu Item
      -->
			<v-list-item v-if="$isHrUser() || $isSiteAdmin()" link @click="navdrawerClick" to="/join/create">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text"
						>mdi-account-multiple-plus-outline</v-icon
					>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text"
						>Create Join</v-list-item-title
					>
				</v-list-item-content>
			</v-list-item>
			<v-list-item link @click="navdrawerClick" to="/remotetl">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-cast-education</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text"
						>Remote T&amp;L</v-list-item-title
					>
				</v-list-item-content>
			</v-list-item>
			<v-divider></v-divider>
			<v-list-group prepend-icon="mdi-key-wireless">
				<template v-slot:activator>
					<v-list-item-title>Key Info</v-list-item-title>
				</template>
				<v-list-item
					v-for="(page, i) in keyinfopages"
					:key="i"
					link
					:to="page.url"
				>
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">{{ page.icon }}</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title
							class="grey--text"
							v-text="page.name"
						></v-list-item-title>
					</v-list-item-content>
				</v-list-item>
			</v-list-group>
			<v-divider></v-divider>
			<v-list-group prepend-icon="mdi-wan">
				<template v-slot:activator>
					<v-list-item-title>Central Services</v-list-item-title>
				</template>
				<v-list-item
					v-for="(page, i) in centralervicespages"
					:key="i"
					link
					:to="page.link"
				>
					<v-list-item-action>
						<v-icon class="grey--icon grey--text">{{ page.icon }}</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title
							class="grey--text"
							v-text="page.title"
						></v-list-item-title>
					</v-list-item-content>
				</v-list-item>
			</v-list-group>
			<v-divider v-if="$isSiteAdmin()"></v-divider>
			<v-list-item
				v-if="$isSiteAdmin()"
				link
				@click="navdrawerClick"
				to="/usermanagement"
			>
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-account-group</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">User Manager</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<v-divider></v-divider>
			<v-list-group prepend-icon="mdi-web">
				<template v-slot:activator>
					<v-list-item-title>FCAT Websites</v-list-item-title>
				</template>
				<a
					:href="site.url"
					v-for="(site, i) in schoolsites"
					:key="i"
					target="_blank"
				>
					<v-list-item link>
						<v-list-item-action>
							<v-icon class="grey--icon grey--text">mdi-open-in-new</v-icon>
						</v-list-item-action>
						<v-list-item-content>
							<v-list-item-title
								class="grey--text"
								v-text="site.name"
							></v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</a>
			</v-list-group>
		</v-list>
	</v-navigation-drawer>
</template>
<script>
export default {
	props: ["navdrawer"],
	data() {
		return {
			keyinfopages: [
				{
					name: "Staff Directory",
					url: "/staffsearch",
					icon: "mdi-account-search",
				},
				{
					name: "QIG Information",
					url: "/qigs",
					icon: "mdi-account-group",
				},
				{
					name: "FCAT Calendar",
					url: "/calendar",
					icon: "mdi-calendar-clock",
				},
			],
			centralervicespages: [
				{
					icon: "mdi-account-network-outline",
					iconClass: "teal--text text--lighten-2",
					title: "Human Resources",
					subtitle: "Subtext for menu item",
					link: "/hr",
				},
				{
					icon: "mdi-account-cash-outline",
					iconClass: "teal--text text--lighten-2",
					title: "Finance",
					subtitle: "Subtext for menu item",
					link: "/finance",
				},
				{
					icon: "mdi-shield-key-outline",
					iconClass: "teal--text text--lighten-2",
					title: "Data Protection",
					subtitle: "Keeping personal data safe",
					link: "/dataprotection",
				},
				{
					icon: "mdi-bookmark-check-outline",
					iconClass: "teal--text text--lighten-2",
					title: "Health & Safety",
					subtitle: "Subtext for menu item",
					link: "/healthandsafety",
				},
				{
					icon: "mdi-hammer-screwdriver",
					iconClass: "teal--text text--lighten-2",
					title: "ICT Services",
					subtitle: "Help and support",
					link: "/ict",
				},
				{
					icon: "mdi-bullhorn",
					iconClass: "teal--text text--lighten-2",
					title: "Media & PR",
					subtitle: "Latest News from FCAT",
					link: "/mediaandpr",
				},
				// {
				// 	icon: "mdi-domain",
				// 	iconClass: "teal--text text--lighten-2",
				// 	title: "Premises",
				//   subtitle: "Subtext for menu item",
				//   link: "/premises"
				// },
				{
					icon: "mdi-monitor-dashboard",
					iconClass: "teal--text text--lighten-2",
					title: "Data & Exams",
					subtitle: "Subtext for menu item",
					link: "/datamis",
				},
			],
			schoolsites: [
				{
					name: "FCAT",
					url: "http://www.fcat.org.uk/",
				},
				{
					name: "Armfield",
					url: "http://www.armfieldacademy.co.uk/",
				},
				{
					name: "Aspire",
					url: "https://www.blackpoolaspireacademy.co.uk/",
				},
				{
					name: "Garstang",
					url: "https://www.garstangcommunityacademy.com/",
				},
				{
					name: "Gateway",
					url: "https://www.gateway.fcat.org.uk/",
				},
				{
					name: "Hambleton",
					url:
						"https://files.schudio.com/fcat/images/menu/Hambleton_Primary.jpg",
				},
				{
					name: "Mereside",
					url: "https://www.meresideprimary.com/",
				},
				{
					name: "Montgomery",
					url: "https://www.montgomeryschool.co.uk/",
				},
				{
					name: "Unity",
					url: "https://www.unity.blackpool.org.uk/",
				},
				{
					name: "Westcliff",
					url: "http://www.westcliffprimaryacademy.co.uk/",
				},
				{
					name: "Westminster",
					url: "http://westminsterprimary.co.uk/",
				},
			],
		};
	},
	methods: {
		navdrawerClick() {
			this.$emit("navdrawerClick");
		},
		isSiteAdmin() {
			this.$isSiteAdmin();
		},
	},
};
</script>
<style>
.v-navigation-drawer a,
.v-list-group__items {
	min-width: 2.5rem;
}

.v-navigation-drawer__content {
	margin-bottom: -50px; /* maximum width of scrollbar */
	padding-bottom: 50px; /* maximum width of scrollbar */
	margin-right: -50px; /* maximum width of scrollbar */
	padding-right: 50px; /* maximum width of scrollbar */
}
</style>
