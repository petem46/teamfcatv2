<template>
	<div class="sidebar__sticky">
		<v-card flat outlined>
			<!-- <v-toolbar flat color="teal" dark dense>
				<v-toolbar-title>Side Menu</v-toolbar-title>
			</v-toolbar>-->
			<v-list-group no-action :value="!showEdit">
				<v-icon slot="prependIcon" color="teal">fa-book-open</v-icon>
				<template v-slot:activator>
					<v-list-item-content>
						<v-list-item-title>More Pages</v-list-item-title>
					</v-list-item-content>
				</template>
				<v-list dense nav>
					<v-list-item
						v-for="item in sidemenuitems"
						:key="item.id"
						:to="'/p2' + area.link + '/' + item.slug"
					>
						<v-list-item-content>
							<v-list-item-title>
								<v-icon small class="mr-3">far fa-arrow-alt-circle-right fa-fw</v-icon>
								{{item.title}}
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list>
			</v-list-group>
		</v-card>
		<v-card flat outlined>
			<!-- <v-toolbar flat color="teal" dark dense>
				<v-toolbar-title>Side Menu</v-toolbar-title>
			</v-toolbar>-->
			<v-list-group no-action :value="showEdit">
				<v-icon slot="prependIcon" color="teal">fa-cog</v-icon>
				<template v-slot:activator>
					<v-list-item-content>
						<v-list-item-title>Admin Options</v-list-item-title>
					</v-list-item-content>
				</template>
				<v-list dense nav>
					<v-list-item v-if="!showEdit" @click="$emit('showEdit')">
						<v-list-item-content>
							<v-list-item-title>
								<v-icon small class="mr-3">far fa-edit fa-fw</v-icon>Edit Page
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
					<v-list-item v-if="showEdit" @click="$emit('savePage')" class="teal" dark>
						<v-list-item-content>
							<v-list-item-title class>
								<v-icon color="white" small class="mr-3">far fa-save fa-fw</v-icon>Save Page
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
					<draggable
						v-if="showEdit"
						class="list-group"
						:list="listOne"
						:clone="clone"
						tag="section"
						:group="{ name: 'pageElements', pull: 'clone', put: false }"
					>
						<v-list-item
							v-for="item in listOne"
							:key="item.name"
							@click="addSection(item)"
							@change="$emit('updateHTML')"
						>
							<v-list-item-content>
								<v-list-item-title>
									<v-icon small class="mr-3">{{item.icon}}</v-icon>
									Add {{item.name }}
									<!-- <v-btn text tile outlined class="btn-block" @click="addSection(item.name)">Add {{item.name }}</v-btn> -->
								</v-list-item-title>
							</v-list-item-content>
						</v-list-item>
					</draggable>
					<google-picker v-if="showEdit" @addGoolgeDriveFile="addGoolgeDriveFile"></google-picker>
					<v-list-item v-if="showEdit" @click="addImage">
						<v-list-item-content>
							<v-list-item-title>
								<v-icon small class="mr-3">far fa-image fa-fw</v-icon>Add/Upload Image
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
					<v-list-item v-if="showEdit" @click="addFile">
						<v-list-item-content>
							<v-list-item-title>
								<v-icon small class="mr-3">far fa-file-alt fa-fw</v-icon>Add/Upload File
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
					<v-list-item v-if="slug != 'newpage' && showEdit" @click="$emit('deletePage')" class="red">
						<v-list-item-content>
							<v-list-item-title class="white--text">
								<v-icon small class="mr-3 white--text">fas fa-trash fa-fw</v-icon>Delete Page
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
					<v-list-item v-if="slug != 'newpage' && !showEdit" :to="'/p2' + area.link + '/newpage'">
						<v-list-item-content>
							<v-list-item-title>
								<v-icon small class="mr-3">far fa-plus-square fa-fw</v-icon>Add New Page
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list>
			</v-list-group>
		</v-card>
	</div>
</template>
<script>
import draggable from "vuedraggable";
export default {
	components: {
		draggable
	},
	props: [
		"slug",
		"sidemenuitems",
		"loading",
		"showEdit",
		"section",
		"areaname"
	],
	data() {
		return {
			area: [],
			showConfirmDelete: false,
			listOne: [
				{
					name: "Heading",
					icon: "fas fa-heading fa-fw",
					content: "<h2>Section Heading</h2>"
				},
				{
					name: "Text Block",
					icon: "fa-align-left fa-fw",
					content:
						"<p>Ne modus evertitur ius, has an reque consulatu. Eu sed menandri inciderint, vim id omnes suavitate accommodare. Id invenire consectetuer his, quo ea vitae congue appareat. Te sit nonumes scripserit. Eam at malis electram, scripta hendrerit vis ex. Sed ea platonem molestiae.</p>"
				},
				{
					name: "Divider Line",
					icon: "fa-grip-lines fa-fw",
					content:
						'<hr role="separator" aria-orientation="horizontal" class="v-divider teal">'
				}
			]
		};
	},
	mounted() {
		this.getPageTitle();
		this.getAreaDetails(this.areaname);
	},
	methods: {
		getPageTitle() {},
		getAreaDetails(areaname) {
			// this.loading = true;
			axios.get("/get/areadetails/" + this.areaname).then(res => {
				this.area = res.data;
			});
			console.log(this.area);
		},
		addSection(item) {
			if (item.name == "Heading") {
				this.$emit("addHeading", item);
			}
			if (item.name == "Text Block") {
				this.$emit("addTextBlock", item);
			}
			if (item.name == "Divider Line") {
				this.$emit("addDivider", item);
			}
			if (item.name == "Image" || item.name == "File") {
				this.$emit("showFileManager");
			}
		},
		addImage() {
			this.$emit("showFileManager");
		},
		addFile() {
			this.$emit("showFileManager");
		},
		addGoolgeDriveFile(files) {
			this.$emit("addGoolgeDriveFile", files);
		},
		clone(item) {
			// Create a fresh copy of item
			let cloneMe = JSON.parse(JSON.stringify(item));
			this.$delete(cloneMe, "id");
			return cloneMe;
		}
	}
};
</script>
<style lang="scss" scoped>
.sidebar__sticky {
	position: sticky;
	position: -webkit-sticky;
	top: 150px;
}
</style>


