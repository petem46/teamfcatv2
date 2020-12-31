<template>
	<div>
		<section class="elevation-5" :class="($vuetify.breakpoint.smAndDown) ? 'sm' : ''">
			<v-container class="pt-15">
				<h1 class="display-3 white--text text--darken-2 text-center">SITE PAGE DIRECTORY</h1>
				<v-card>
					<v-card-title class="text-center">
						<v-text-field
							v-model="search"
							append-icon="mdi-magnify"
							label="Search"
							single-line
							hide-details
							clearable
						></v-text-field>
					</v-card-title>
					<v-data-table
						:headers="headers"
						:items="pages"
						:search="search"
						:sort-by="['title', 'created_at']"
						class="grey--text text--darken-2"
					>
						<template v-slot:item.jsoncontent="{ item }">
							<v-btn icon :to="'/p2' + item.area_link + '/' + item.slug" >Visit Page</v-btn>
						</template>
					</v-data-table>
				</v-card>
			</v-container>
		</section>
	</div>
</template>
<script>
export default {
	data: () => ({
		loading: false,
		search: "",
		headers: [
			{
				text: "Page Title",
				align: "start",
				sortable: true,
				value: "title",
				class: "white--text overline grey darken-2"
			},
			{
				text: "Area",
				align: "start",
				sortable: true,
				value: "area_title",
				class: "white--text overline grey darken-2"
			},
			{
				text: "Section",
				align: "start",
				sortable: true,
				value: "section_title",
				class: "white--text overline grey darken-2"
			},
			{
        text: "",
				// align: "start",
				sortable: false,
				value: "jsoncontent",
				class: "white--text overline grey darken-2"
			}
		],
		pages: []
	}),
	mounted() {
		console.log("MOUNTED");
		this.getAllPages();
	},
	methods: {
		getAllPages() {
			console.log("GET ALL PAGES");
			this.loading = true;
			axios.get("/get/pages/all").then(({ data }) => {
				this.pages = data;
				console.log(data);
			});
		}
	}
};
</script>
<style scoped lang="scss">
section {
	background: linear-gradient(90deg, #46b9fc 0%, #3f5efb 100%);
	min-height: calc(100vh - 64px);
	&.sm {
		min-height: calc(100vh - 58px);
		background: linear-gradient(90deg, #6146fc 0%, #3fb6fb 100%);
	}
}
</style>
<style scoped>
.hidden {
	display: none;
}
</style>
