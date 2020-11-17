<template>
	<section style="top: 64px;">
		<v-container>
			<v-card>
				<v-card-title class="black--text">
					<h1 class="h2 grey--text text--darken-2">STAFF DIRECTORY</h1>
					<v-spacer></v-spacer>
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
	background-image: linear-gradient(135deg, #ffe985 10%, #fa742b 100%);
}
table .v-data-table-header {
  background-image: linear-gradient(135deg, #ffe985 10%, #fa742b 100%) !important;
}
</style>
