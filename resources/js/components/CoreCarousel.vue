<template>
	<section class="header white--text py-0 elevation-10">
		<v-container class="py-0">
			<v-carousel
				height="57"
				hide-delimiters
				:show-arrows="false"
				:cycle="true"
				:interval="6000"
				vertical
			>
				<!-- <v-container> -->
				<v-carousel-item
					transition="slide-x-transition"
					reverse-transition="slide-x-reverse-transition"
				>
					<v-row py-3>
						<v-col class="text-center h3 m-0">{{ this.value1 }}</v-col>
						<v-col class="text-center h3 m-0">{{ this.value2 }}</v-col>
						<v-col class="text-center h3 m-0">{{ this.value3 }}</v-col>
					</v-row>
				</v-carousel-item>
				<v-carousel-item
					transition="slide-x-transition"
					reverse-transition="slide-x-reverse-transition"
				>
					<v-row py-3>
						<v-col class="text-center h3 m-0">{{ this.value4 }}</v-col>
						<v-col class="text-center h3 m-0">{{ this.value5 }}</v-col>
						<v-col class="text-center h3 m-0">{{ this.value6 }}</v-col>
					</v-row>
				</v-carousel-item>
				<!-- </v-container> -->
			</v-carousel>
		</v-container>
	</section>
</template>
<script>
export default {
	data: () => ({
		value1: "EXCELLENCE",
		value2: "AMBITION",
		value3: "RESPECT",
		value4: "INTEGRITY",
		value5: "RESILIENCE",
		value6: "PRIDE",
	}),
	computed: {},
};
</script>
