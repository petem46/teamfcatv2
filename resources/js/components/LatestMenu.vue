<template>
	<div>
		<v-menu open-on-hover offset-y v-if="this.$vuetify.breakpoint.mdAndUp">
			<template v-slot:activator="{ on, attrs }">
				<v-btn text class="mr-2" v-bind="attrs" v-on="on">
					<v-icon class="mr-2 grey--text lighten-1">mdi-clock-alert-outline</v-icon>Latest
				</v-btn>
			</template>
			<v-card>
				<v-row>
					<v-col cols="6">
						<v-list class="mr-4">
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2 grey--text lighten-2">fa-people-arrows fa-fw</v-icon>FCAT HR
									<p class="overline grey--text mt-2">some subtext</p>
								</v-list-item-title>
							</v-list-item>
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2 grey--text lighten-2">fa-lock fa-fw</v-icon>Data Protection
									<p class="overline grey--text mt-2">some subtext for menu item</p>
								</v-list-item-title>
							</v-list-item>
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2">fa-calculator fa-fw</v-icon>Finance
									<p class="overline grey--text mt-2">some subtext for menu</p>
								</v-list-item-title>
							</v-list-item>
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2">fa-people-carry fa-fw</v-icon>Health & Safety
									<p class="overline grey--text mt-2">some subtext for menu item</p>
								</v-list-item-title>
							</v-list-item>
						</v-list>
					</v-col>
					<v-col cols="6">
						<v-list class="mr-4">
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2">far fa-building fa-fw</v-icon>Premisies
									<p class="overline grey--text mt-2">some subtext for menu item</p>
								</v-list-item-title>
							</v-list-item>
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2">fa-bullhorn fa-fw</v-icon>Media & PR
									<p class="overline grey--text mt-2">some subtext for menu item</p>
								</v-list-item-title>
							</v-list-item>
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2">fa-hammer fa-fw</v-icon>IT
									<p class="overline grey--text mt-2">some subtext for menu item</p>
								</v-list-item-title>
							</v-list-item>
							<v-list-item @click class="py-2">
								<v-list-item-title>
									<v-icon class="mr-2">far fa-chart-bar fa-fw</v-icon>Data & Assessment
									<p class="overline grey--text mt-2">some subtext for menu item</p>
								</v-list-item-title>
							</v-list-item>
						</v-list>
					</v-col>
				</v-row>
			</v-card>
		</v-menu>
	</div>
</template>
<script>
export default {};
</script>
