<template>
	<v-navigation-drawer permanent expand-on-hover app fixed clipped floating light>
		<v-list dense nav shaped>
			<v-list-item link to="/">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-home</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">Home</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<v-list-item link to="/covid">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-information-outline</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">COVID-19</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<v-list-item link to="/updates">
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-newspaper-variant-outline</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">Updates</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<a href="https://cpd.teamfcat.co.uk" target="_blank">
      <v-list-item link>
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-food-apple-outline</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">CPD Portal</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			</a>
			<a href="https://www.spongyelephant.com/login/?register=true&access_code=FCAT-AFE2" target="_blank">
			<v-list-item link>
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-shield-account</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">GDPR Training</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			</a>
			<v-list-item link>
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-view-dashboard</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">Add Link</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<v-list-item link>
				<v-list-item-action>
					<v-icon class="grey--icon grey--text">mdi-lightbulb-on-outline</v-icon>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title class="grey--text">Feedback</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
		</v-list>
	</v-navigation-drawer>
</template>
<script>
export default {
	props: ["navdrawer"]
};
</script>
