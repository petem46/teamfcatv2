<template>
	<div style="top: 64px;">
		<section class="elevation-5">
			<v-container>
				<h1 class="display-3 white--text text--darken-2 text-center">STAFF DIRECTORY</h1>
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
						:items="staffs"
						:search="search"
						:sort-by="['school', 'name']"
						class="grey--text text--darken-2"
					></v-data-table>
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
				text: "Name",
				align: "start",
				sortable: true,
				value: "name",
				class: "white--text overline grey darken-2"
			},
			{
				text: "School",
				align: "start",
				sortable: true,
				value: "school",
				class: "white--text overline grey darken-2"
			},
			{
				text: "Email",
				align: "start",
				sortable: true,
				value: "email",
				class: "white--text overline grey darken-2"
			},
			{
				text: "Role(s)",
				align: "start",
				sortable: true,
				value: "keyrole",
				class: "white--text overline grey darken-2"
			},
			{
				text: "Ext",
				align: "start",
				sortable: true,
				value: "ext",
				class: "white--text overline grey darken-2"
			},
			{
				text: "Mobile",
				align: "start",
				sortable: true,
				value: "mobile",
				class: "white--text overline grey darken-2"
			}
		],
		staffs: []
	}),
	mounted() {
		console.log("MOUNTED");
		this.getAllStaff();
	},
	methods: {
		getAllStaff() {
			console.log("GET ALL STAFF");
			this.loading = true;
			axios.get("/get/allStaff").then(({ data }) => {
				this.staffs = data;
				console.log(data);
			});
		}
	}
};
</script>
<style scoped>
section {
	background: linear-gradient(90deg, #fc466b 0%, #3f5efb 100%);
}
</style>
