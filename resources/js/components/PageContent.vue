<template>
	<div>
		<div class="mb-4 px-5 order-md-2 order-1">
			<h1 class="">{{page.title}}</h1>
			<h4 v-if="page.subtitle" class="text--secondary">{{page.subtitle}}</h4>
			<div v-html="page.htmlcontent"></div>
		</div>
	</div>
</template>
<script>
export default {
	watch: {
		$route: function() {
			this.getReady();
		}
	},
	props: ["id", "page"],
	data() {
		return {
			ready: false
		};
	},
	mounted() {
		this.getReady();
	},
	methods: {
		getReady() {
			this.ready = false;
			setTimeout(() => {
				this.ready = true;
			}, 250);
		}
	}
};
</script>
