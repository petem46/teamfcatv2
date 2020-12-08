<template>
	<div>
		<v-menu open-on-hover open-delay="200" close-delay="200" offset-y v-if="this.$vuetify.breakpoint.mdAndUp">
			<template v-slot:activator="{ on, attrs }">
				<v-btn text class="mr-2" v-bind="attrs" v-on="on">
					<v-icon class="mr-2 grey--text lighten-1">mdi-wan</v-icon>Central Services
				</v-btn>
			</template>
			<v-card class="left-border--teal">
				<v-row>
					<v-col cols="6">
						<v-list shaped subheader class="" min-width="250px">
							<v-list-item v-for="item in itemscol1" :key="item.title" :to="item.link">
								<v-list-item-avatar class="mr-1">
									<v-icon :class="[item.iconClass]" v-text="item.icon"></v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title v-text="item.title"></v-list-item-title>
									<!-- <v-list-item-subtitle class="overline grey--text" v-text="item.subtitle"></v-list-item-subtitle> -->
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-col>
					<v-col cols="6">
						<v-list shaped subheader  class="left-border--grey" min-width="250px">
							<v-list-item v-for="item in itemscol2" :key="item.title" :to="item.link">
								<v-list-item-avatar class="mr-1">
									<v-icon :class="[item.iconClass]" v-text="item.icon"></v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title v-text="item.title"></v-list-item-title>
									<!-- <v-list-item-subtitle class="overline grey--text" v-text="item.subtitle"></v-list-item-subtitle> -->
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-col>
				</v-row>
			</v-card>
		</v-menu>
	</div>
</template>
<script>
export default {
	data: () => ({
		itemscol1: [
			{
				icon: "mdi-account-network-outline",
				iconClass: "teal--text text--lighten-2",
				title: "Human Resources",
        subtitle: "Subtext for menu item",
        link: "/hr"
			},
			{
				icon: "mdi-account-cash-outline",
				iconClass: "teal--text text--lighten-2",
				title: "Finance",
        subtitle: "Subtext for menu item",
        link: "/finance"
			},
			{
				icon: "mdi-shield-key-outline",
				iconClass: "teal--text text--lighten-2",
				title: "Data Protection",
        subtitle: "Keeping personal data safe",
        link: "/dataprotection"
			},
			{
				icon: "mdi-bookmark-check-outline",
				iconClass: "teal--text text--lighten-2",
				title: "Health & Safety",
        subtitle: "Subtext for menu item",
        link: "/healthandsafety"
			},
		],
		itemscol2: [
			{
				icon: "mdi-hammer-screwdriver",
				iconClass: "teal--text text--lighten-2",
				title: "ICT Services",
        subtitle: "Help and support",
        link: "/ict"
			},
			{
				icon: "mdi-bullhorn",
				iconClass: "teal--text text--lighten-2",
				title: "Media & PR",
        subtitle: "Latest News from FCAT",
        link: "/mediaandpr"
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
        link: "/datamis"
			}
		]
	})
};
</script>
