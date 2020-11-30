<template>
	<v-navigation-drawer expand-on-hover app clipped floating light>
		<v-list dense nav>
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
			<a
				href="https://www.spongyelephant.com/login/?register=true&access_code=FCAT-AFE2"
				target="_blank"
			>
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
			<v-list-group prepend-icon="mdi-web">
				<template v-slot:activator>
					<v-list-item-title>FCAT Websites</v-list-item-title>
				</template>
				<a :href="site.url" v-for="(site, i) in schoolsites" :key="i" target="_blank">
					<v-list-item link>
						<v-list-item-action>
							<v-icon class="grey--icon grey--text">mdi-open-in-new</v-icon>
						</v-list-item-action>
						<v-list-item-content>
							<v-list-item-title class="grey--text" v-text="site.name"></v-list-item-title>
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
			schoolsites: [
				{
					name: "FCAT",
					url: "http://www.fcat.org.uk/"
				},
				{
					name: "Armfield",
					url: "http://www.armfieldacademy.co.uk/"
				},
				{
					name: "Aspire",
					url: "https://www.blackpoolaspireacademy.co.uk/"
				},
				{
					name: "Garstang",
					url: "https://www.garstangcommunityacademy.com/"
				},
				{
					name: "Gateway",
					url: "https://www.gateway.fcat.org.uk/"
				},
				{
					name: "Hambleton",
					url:
						"https://files.schudio.com/fcat/images/menu/Hambleton_Primary.jpg"
				},
				{
					name: "Mereside",
					url: "https://www.meresideprimary.com/"
				},
				{
					name: "Montgomery",
					url: "https://www.montgomeryschool.co.uk/"
				},
				{
					name: "Unity",
					url: "https://www.unity.blackpool.org.uk/"
				},
				{
					name: "Westcliff",
					url: "http://www.westcliffprimaryacademy.co.uk/"
				},
				{
					name: "Westminster",
					url: "http://westminsterprimary.co.uk/"
				}
			]
		};
	}
};
</script>
<style>
.v-navigation-drawer a,
.v-list-group__items {
	min-width: 3rem;
}

.v-navigation-drawer__content {
	margin-bottom: -50px; /* maximum width of scrollbar */
	padding-bottom: 50px; /* maximum width of scrollbar */
	margin-right: -50px; /* maximum width of scrollbar */
	padding-right: 50px; /* maximum width of scrollbar */
}
</style>
