<template>
	<section class>
		<v-container>
			<header class="display-3 pb-3">Twitter Feeds</header>
			<v-row>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/ArmfieldFCAT?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by ArmfieldFCAT</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/blackpoolaspire?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by @blackpoolaspire</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/GarstangAcademy?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by GarstangAcademy</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/GatewayFCAT?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by GatewayFCAT</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/MeresidePrimary?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by MeresidePrimary</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/MontgomeryFCAT?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by MontgomeryFCAT</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/UnityBlackpool?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by UnityBlackpool</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/WestcliffFCAT?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by WestcliffFCAT</a>
					</v-card>
				</v-col>
				<v-col cols="12" md="6" lg="4">
					<v-card height="600">
						<a
							class="twitter-timeline"
							href="https://twitter.com/WestminsterFCAT?ref_src=twsrc%5Etfw"
							data-lang="en"
							data-height="600"
							data-dnt="true"
						>Tweets by WestminsterFCAT</a>
					</v-card>
				</v-col>
			</v-row>
		</v-container>
	</section>
</template>
<script>
export default {
	mounted() {
		let embedTwitter = document.createElement("script");
		embedTwitter.setAttribute("src", "https://platform.twitter.com/widgets.js");
		document.head.appendChild(embedTwitter);
	}
};
</script>
<style scoped>
section {
	background-image: linear-gradient(
		to top,
		#d5d4d0 0%,
		#d5d4d0 1%,
		#eeeeec 31%,
		#efeeec 75%,
		#e9e9e7 100%
	);
}
.hidden {
	display: none;
}
</style>
