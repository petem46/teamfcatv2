<template>
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
			<v-list-item link to="https://www.spongyelephant.com/login/?register=true&access_code=FCAT-AFE2">
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
</template>
<script>
export default {
  props: ['navdrawer']
}
</script>
