<template>
	<div>
		<div class="container pt-md-6rem">
			<v-row>
				<v-col cols="12" md="6" class="d=flex align-center">
					<h1 class="text-h3 line-height-1pt5 py-2">
						<span class="orange--text text--darken-2">COVID-19</span>
            <br>Updates &amp; information

					</h1>
					<p
						class="lead grey--text text-subtitle text-center text-md-left"
					>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit omnis perspiciatis dolor dolorum libero eveniet, officia sint praesentium modi ratione voluptate dolore, provident corporis. Rerum quod error dolor eum numquam!</p>
					<v-row>
						<v-col>
							<v-btn dark class="teal" x-large>
								<v-icon class="mr-2">fa-virus</v-icon>Button
							</v-btn>
						</v-col>
						<v-col>
							<v-btn dark class="orange darken-2" x-large>
								<v-icon class="mr-2">fa-virus</v-icon>Button
							</v-btn>
						</v-col>
						<v-col>
							<v-btn dark class="grey" x-large>
								<v-icon class="mr-2">fa-virus</v-icon>Button
							</v-btn>
						</v-col>

					</v-row>
				</v-col>
				<v-col cols="12" md="6">
					<v-img height="350" contain src="/images/covid-landing.jpg"></v-img>
					<div class="text-right">
						<a class="freepik" href="https://www.freepik.com/free-photos-vectors/health" target="_blank">Health vector created by freepik - www.freepik.com</a>
					</div>
				</v-col>
			</v-row>
		</div>
		<div></div>
	</div>
</template>
<script>
export default {
	data() {
		return {
			loading: false
		};
	}
};
</script>
