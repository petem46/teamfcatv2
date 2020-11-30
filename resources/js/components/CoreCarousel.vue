<template>
  		<section class="header white--text py-0 elevation-10">
			<v-container>
				<v-carousel
					height="80"
					hide-delimiters
					:show-arrows="false"
					:cycle="true"
					:interval="6000"
					vertical
				>
					<v-container>
						<v-carousel-item
							transition="slide-x-transition"
							reverse-transition="slide-x-reverse-transition"
						>
							<v-row py-3>
								<v-col class="text-center h3 m-0">EXCELLENCE</v-col>
								<v-col class="text-center h3 m-0">AMBITION</v-col>
								<v-col class="text-center h3 m-0">RESPECT</v-col>
							</v-row>
						</v-carousel-item>
						<v-carousel-item
							transition="slide-x-transition"
							reverse-transition="slide-x-reverse-transition"
						>
							<v-row py-3>
								<v-col class="text-center h3 m-0">INTEGRITY</v-col>
								<v-col class="text-center h3 m-0">RESILIENCE</v-col>
								<v-col class="text-center h3 m-0">PRIDE</v-col>
							</v-row>
						</v-carousel-item>
					</v-container>
				</v-carousel>
			</v-container>
		</section>

</template>
