<template>
	<section style="top: 64px;">
		<v-container>
			<v-card>
				<v-card-title class="grey lighten-4 black--text">
					FCAT Staff Directory
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
					class="grey lighten-4 black--text"
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
				class: "teal--text overline"
			},
			{
				text: "School",
				align: "start",
				sortable: true,
				value: "school",
				class: "teal--text overline"
			},
			{
				text: "Email",
				align: "start",
				sortable: true,
				value: "email",
				class: "teal--text overline"
			},
			{
				text: "Role(s)",
				align: "start",
				sortable: true,
				value: "keyrole",
				class: "teal--text overline"
			},
			{
				text: "Ext",
				align: "start",
				sortable: true,
				value: "ext",
				class: "teal--text overline"
			},
			{
				text: "Mobile",
				align: "start",
				sortable: true,
				value: "mobile",
				class: "teal--text overline"
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
	background-image: url("/images/blue-frame-grid.jpg");
	background-size: cover;
	background-repeat: no-repeat;
}
/* section {
	background: rgb(0, 150, 136);
	background: -moz-radial-gradient(
		circle,
		rgba(0, 150, 136, 1) 0%,
		rgba(0, 77, 64, 1) 50%,
		rgba(128, 203, 196, 1) 100%
	);
	background: -webkit-radial-gradient(
		circle,
		rgba(0, 150, 136, 1) 0%,
		rgba(0, 77, 64, 1) 50%,
		rgba(128, 203, 196, 1) 100%
	);
	background: radial-gradient(
		circle,
		rgba(0, 150, 136, 1) 0%,
		rgba(0, 77, 64, 1) 50%,
		rgba(128, 203, 196, 1) 100%
	);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#009688",endColorstr="#80cbc4",GradientType=1);
} */
</style>
