<template>
	<div>
		<v-menu
			open-on-hover
			open-delay="200"
			close-delay="200"
			offset-y
			v-if="this.$vuetify.breakpoint.mdAndUp"
		>
			<template v-slot:activator="{ on, attrs }">
				<v-btn text class="mr-2" v-bind="attrs" v-on="on">
					<v-icon class="grey--icon">mdi-key-wireless</v-icon>Key Info
				</v-btn>
			</template>
			<v-card class="left-border--teal">
				<v-row>
					<v-col cols="12">
						<v-list shaped two-line subheader class>
							<v-list-item v-for="item in items" :key="item.title" :to="item.link">
								<v-list-item-avatar class="mr-1">
									<v-icon :class="[item.iconClass]" v-text="item.icon"></v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title v-text="item.title"></v-list-item-title>
									<v-list-item-subtitle class="overline grey--text" v-text="item.subtitle"></v-list-item-subtitle>
								</v-list-item-content>
							</v-list-item>
						</v-list>
						<!-- <v-list-item @click class="">
								<v-list-item-avatar class="mr-1">
									<v-icon size="30" class="teal--text text--lighten-2">mdi-file-cabinet</v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title>Policies</v-list-item-title>
									<span class="overline grey--text">menu subtitle text</span>
								</v-list-item-content>
							</v-list-item>

							<v-list-item @click class="">
								<v-list-item-avatar class="mr-1">
									<v-icon size="30" class="teal--text text--lighten-2">mdi-calendar-clock</v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title>Events &amp; Key Dates</v-list-item-title>
									<span class="overline grey--text">menu subtitle text</span>
								</v-list-item-content>
							</v-list-item>

							<v-list-item @click class="">
								<v-list-item-avatar class="mr-1">
									<v-icon size="30" class="teal--text text--lighten-2">mdi-panda</v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title>Menu Item 3</v-list-item-title>
									<span class="overline grey--text">Subtitle text three</span>
								</v-list-item-content>
							</v-list-item>

							<v-list-item @click class="">
								<v-list-item-avatar class="mr-1">
									<v-icon size="30" class="teal--text text--lighten-2">mdi-penguin</v-icon>
								</v-list-item-avatar>
								<v-list-item-content>
									<v-list-item-title>Menu Item 4</v-list-item-title>
									<span class="overline grey--text">Subtitle text four</span>
								</v-list-item-content>
							</v-list-item>
						</v-list>-->
					</v-col>
				</v-row>
			</v-card>
		</v-menu>
	</div>
</template>
<script>
export default {
	data: () => ({
		items: [
			{
				icon: "mdi-file-cabinet",
				iconClass: "teal--text text--lighten-2",
				title: "Policies & Documents",
        subtitle: "Subtext for menu item",
        link: '/policies'
			},
			{
				icon: "mdi-calendar-clock",
				iconClass: "teal--text text--lighten-2",
				title: "Events & Key Dates",
        subtitle: "Subtext for menu item",
        link: '/calendar'
			},
			// {
			// 	icon: "mdi-panda",
			// 	iconClass: "teal--text text--lighten-2",
			// 	title: "Key Info Menu 3",
      //   subtitle: "Subtext for menu item",
      //   link: '/panda'
			// },
			// {
			// 	icon: "mdi-penguin",
			// 	iconClass: "teal--text text--lighten-2",
			// 	title: "Key Info Menu 4",
      //   subtitle: "Subtext for menu item",
      //   link: '/penguin'
			// }
		]
	})
};
</script>
