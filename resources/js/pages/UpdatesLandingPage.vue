<template>
	<landing-page :seanslatestletter="seanslatestletter"></landing-page>
</template>
<script>
export default {
	data() {
		return {
			loading: false,
			seanslatestletter: {
				title: "",
				subtitle: "",
				slug: "",
				link: "",
			},
		};
	},
	created() {
		this.getSeansLatestLetter();
	},
	methods: {
		getSeansLatestLetter() {
			axios
				.get("/get/seanslatestletter")
				.then(({ data }) => {
					this.seanslatestletter = data.seanslatestletter;
				})
				.then(() => {
					// this.getPages();
				});
		},
	},
};
</script>
