<template>
		<v-dialog v-model="showMe">
			<v-container fluid app class="px-0">
				<v-form ref="form">
					<v-card>
						<v-toolbar dark color="teal">
							<v-toolbar-title  class="teal white--text">CREATE NEW LINK</v-toolbar-title>
							<v-spacer></v-spacer>
							<v-toolbar-items>
								<v-btn dark text @click="savePage()">Save</v-btn>
							</v-toolbar-items>
						</v-toolbar>
						<v-text-field
							hide-details="auto"
							outlined
							v-model="link.title"
							label="Link Title"
							required
							ref="title"
						></v-text-field>
						<v-card-actions>
							<v-spacer></v-spacer>
							<v-btn @click="savePage()" :dark="valid" color="green">Save</v-btn>
						</v-card-actions>
					</v-card>
				</v-form>
			</v-container>
		</v-dialog>
</template>
<script>
export default {
    props: ["showMe"],
    data() {
		return {
      link: "",
      valid: true,
		};
	},
	methods: {
		saveLink() {
			if (this.valid) {
				// this.link.jsoncontent = JSON.stringify(this.list2);
				let newlink = new FormData();
				newlink.append("id", this.link.id);
				newlink.append("section_id", this.link.section_id);
				newlink.append("title", this.link.title);
				newlink.append("subtitle", this.link.subtitle);
				newlink.append("pagetype_id", 2);
				newlink.append("slug", this.link.slug);
				newlink.append("htmlcontent", "LINK ONLY");
				newlink.append("jsoncontent", JSON.stringify("LINK ONLY"));
				newlink.append("state_id", 3);
				axios
					.post("/post/savepage2", newlink)
					.then(res => {
						if (res.status == 200) {
							this.$router.push(this.link.slug).catch(() => {
								this.getContent();
							});
							this.onShowEditClick();
						}
					})
					.catch(error => {
						this.scrollToTop();
						this.$refs.title.focus();
						this.snackbar.color = "red";
						this.snackbar.text = error.response.data;
						this.snackbar.show = true;
						console.log(error.response);
					});
			}
		}
	}
};
</script>
