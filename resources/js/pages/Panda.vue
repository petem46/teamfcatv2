<template>
	<div>
		<div class="container pt-md-6rem">
			<v-row>
				<v-col cols="12" md="6" class="d=flex align-center">
					<h1 class="text-h3 line-height-1pt5 py-2">
						It's the
						<span class="teal--text">Panda</span> Page
						<br />Content Coming Soon
					</h1>
					<p
						class="lead grey--text text-subtitle text-center text-md-left"
					>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit omnis perspiciatis dolor dolorum libero eveniet, officia sint praesentium modi ratione voluptate dolore, provident corporis. Rerum quod error dolor eum numquam!</p>
					<v-row>
						<v-col>
							<v-btn dark class="teal" x-large>
								<v-icon class="mr-2">fa fa-arrow-right</v-icon>Button
							</v-btn>
						</v-col>
						<v-col>
							<v-btn dark class="orange darken-2" x-large>
								<v-icon class="mr-2">far fa-star</v-icon>Button
							</v-btn>
						</v-col>
						<v-col>
							<v-btn dark class="grey" x-large>
								<v-icon class="mr-2">fab fa-rebel</v-icon>Button
							</v-btn>
						</v-col>
					</v-row>
				</v-col>
				<v-col cols="12" md="6">
					<v-img height="350" contain src="/images/panda-landing.jpg"></v-img>
					<div class="text-right">
						<a
							class="freepik"
							href="https://www.freepik.com/free-photos-vectors/design"
							target="_blank"
						>Design vector created by ajipebriana - www.freepik.com</a>
					</div>
				</v-col>
			</v-row>
		</div>

		<!-- <div class="grey lighten-3">
			<v-container app fluid>
				<v-row>
					<v-col cols="9" class="white" v-html="this.page.htmlcontent"></v-col>
					<v-col>
						<v-btn class="mx-2" fab dark color="red" absolute right>
							<v-icon dark>mdi-pencil</v-icon>
						</v-btn>
					</v-col>
				</v-row>
			</v-container>
		</div>-->
		<div class="grey lighten-3">
			<v-container v-if="!this.showEdit">
				<v-row>
					<!-- Sidebar Column -->
					<div v-if="!loading" class="col-lg-3 mb-4 order-md-2 order-2">
						<page-side-bar
							:sidemenuitems="sidemenuitems"
							:showEdit="showEdit"
							@showEdit="onShowEditClick"
						/>
					</div>
					<v-col cols="9" class="flex-grow-1 flex-shrink-0">
						<div class="white drag-area">
							<div class="list-group pa-5" v-html="this.page.htmlcontent"></div>
						</div>
					</v-col>
				</v-row>
			</v-container>
			<v-container v-if="this.showEdit">
				<!-- <div class="text-h2 my-5">Pete's Page Builder</div> -->
				<v-row>
					<v-col cols="3">
						<div class="white drag-area">
							<div class="white--text grey darken-4 text-center text-h4 pa-2">Drag n Drop</div>
							<draggable
								class="list-group"
								:list="list1"
								:clone="clone"
								tag="section"
								:group="{ name: 'pageElements', pull: 'clone', put: false }"
							>
								<v-list-item v-for="item in list1" :key="item.name" @change="updateHTML">
									<v-btn
										text
										tile
										outlined
										class="btn-block"
										@click="addSection(item.name)"
									>Add {{item.name }}</v-btn>
								</v-list-item>
							</draggable>
							<v-list-item>
								<v-btn
									text
									tile
									outlined
									class="btn-block"
									@click="onShowFileManager(); getFolders()"
								>File Manager</v-btn>
							</v-list-item>
							<v-list-item>
								<v-btn text tile outlined class="btn-block" @click="savePage()">Save Page</v-btn>
							</v-list-item>
							<v-list-item>
								<v-btn text tile outlined class="btn-block" @click="onShowEditClick()">Close Editor</v-btn>
							</v-list-item>

							<v-list-item hidden>
								<input
									type="file"
									accept="image/*"
									@change="onFileSelected"
									style="display: none"
									ref="fileInputUpload"
								/>
							</v-list-item>
						</div>
					</v-col>
					<v-col cols="9">
						<div class="white drag-area">
							<draggable
								class="list-group"
								:list="list2"
								group="pageElements"
								v-bind="dragOptions"
								@start="drag = true"
								@end="drag = false"
								@change="updateHTML"
							>
								<transition-group type="transition" :name="!drag ? 'flip-list' : null">
									<tip-tap-editor
										class="editor__content"
										v-for="(item, idx) in list2"
										:key="newId(item)"
										:item="item"
										:idx="idx"
										@updateItemContent="updateHTMLContent"
										@deleteItem="deleteItem(idx)"
									>
										<div class="my-2 col-12" style="border: thin dashed grey" v-html="item.content"></div>
									</tip-tap-editor>
								</transition-group>
							</draggable>
						</div>
					</v-col>
				</v-row>
				<v-row>
					<v-col cols="12">
						<div v-for="item in list2" :key="item.id"></div>
					</v-col>
				</v-row>
				<v-row>
					<v-col cols="12" title="List 2 Array">
						{{this.page.htmlcontent}}
						<pre>{{ this.list2}}</pre>
					</v-col>
				</v-row>
			</v-container>
			<v-dialog v-model="showFileManager">
				<v-row>
					<v-col cols="12" sm="12">
						<v-card>
							<v-toolbar color="teal" dark>
								<v-toolbar-title class="white--text">File Manager</v-toolbar-title>
								<v-btn fab color="green" bottom right absolute @click="$refs.fileInputUpload.click()">
									<v-icon>mdi-plus</v-icon>
								</v-btn>
							</v-toolbar>
							<v-list two-line subheader>
								<v-subheader inset>Folders</v-subheader>
								<v-list-item v-if="previousFolder != currentFolder" @click="onFolderClick(previousFolder)">
									<v-list-item-avatar>
										<v-icon class="grey lighten-1 white--text">fa-level-up-alt</v-icon>
									</v-list-item-avatar>

									<v-list-item-content>
										<v-list-item-title>previousFolder</v-list-item-title>
									</v-list-item-content>
								</v-list-item>
								<v-list-item v-for="folder in subFolders" :key="folder" link @click="onFolderClick(folder)">
									<v-list-item-avatar>
										<v-icon class="grey lighten-1 white--text">far fa-folder-open</v-icon>
									</v-list-item-avatar>

									<v-list-item-content>
										<v-list-item-title>{{ showFolderName(folder) }}</v-list-item-title>
										<!-- <v-list-item-subtitle>subtitle</v-list-item-subtitle> -->
									</v-list-item-content>
								</v-list-item>
							</v-list>
							<v-divider inset></v-divider>
							<div>
								<v-list two-line subheader>
									<v-subheader inset>Files</v-subheader>

									<v-list-item v-for="file in dirFiles" :key="file.path" link @click="onFileClick(file)">
										<v-list-item-avatar tile v-if="file.type.indexOf('image/') >= 0">
											<v-img :src="file.path" contain></v-img>
										</v-list-item-avatar>
										<v-list-item-avatar tile v-if="file.type == 'application/pdf'">
											<v-icon class="white red--text">far fa-file-pdf</v-icon>
										</v-list-item-avatar>
										<v-list-item-content>
											<v-list-item-title>{{ file.name }}</v-list-item-title>
											<v-list-item-subtitle>{{file.size | prettyBytes}}</v-list-item-subtitle>
										</v-list-item-content>
										<!-- **** SPEED DIAL - POTENTIAL FOR FILE MANAGEMENT **** -->
										<v-list-item-action hidden>
											<v-speed-dial bottom right direction="left">
												<template v-slot:activator>
													<v-btn icon ripple fab dark>
														<v-icon color="grey lighten-1">mdi-information</v-icon>
													</v-btn>
												</template>
												<v-btn fab dark small color="green">
													<v-icon>mdi-pencil</v-icon>
												</v-btn>
												<v-btn fab dark small color="indigo">
													<v-icon>mdi-plus</v-icon>
												</v-btn>
												<v-btn fab dark small color="red">
													<v-icon>mdi-delete</v-icon>
												</v-btn>
											</v-speed-dial>
										</v-list-item-action>
										<!-- **** SPEED DIAL - POTENTIAL FOR FILE MANAGEMENT **** -->
									</v-list-item>
								</v-list>
							</div>
						</v-card>
					</v-col>
				</v-row>
			</v-dialog>

			<v-dialog v-model="showFileUploadDialog" width="40%">
				<v-card v-if="this.selectedFile">
					<v-toolbar dark color="teal">
						<v-icon class="mr-5">fa-upload</v-icon>
						<v-toolbar-title class="teal white--text">File Upload</v-toolbar-title>
						<v-spacer></v-spacer>
						<v-divider class="mx-4" inset vertical></v-divider>
						<v-btn class="mx-0 px-0" text @click="endUpload">
							<v-icon>far fa-window-close</v-icon>
						</v-btn>
					</v-toolbar>
					<div class="container">
						<v-row>
							<v-col cols="4">
								<!-- <v-avatar tile> -->
								<v-img :src="this.imageData"></v-img>
								<!-- </v-avatar> -->
							</v-col>
							<v-col>
								<div>
									<v-text-field v-model="selectedFileDetails.name" label="Name: "></v-text-field>
								</div>
								<div>Filename: {{this.selectedFile.name}}</div>
								<div>Type: {{this.selectedFile.type}}</div>
								<div class="overline">Size: {{this.selectedFile.size | prettyBytes }}</div>
							</v-col>
						</v-row>
					</div>
					<v-divider class="ma-0"></v-divider>
					<v-card-actions>
						<v-btn text class="grey--text" @click="endUpload">Cancel</v-btn>
						<v-spacer></v-spacer>
						<v-btn text class="teal--text" @click="onUpload">Upload</v-btn>
					</v-card-actions>
				</v-card>
			</v-dialog>
		</div>
	</div>
</template>
<script>
import draggable from "vuedraggable";
import Axios from "axios";

export default {
	components: {
		draggable
	},
	data() {
		return {
			dialog: false,
			drag: false,
			showEdit: false,
			showFileManager: false,
			loading: false,
			newItem: {},
			newIndex: "",
			list1: [
				{
					name: "Heading",
					content: "<h2>Section Heading</h2>"
				},
				{
					name: "Text Block",
					content:
						"<p>Ne modus evertitur ius, has an reque consulatu. Eu sed menandri inciderint, vim id omnes suavitate accommodare. Id invenire consectetuer his, quo ea vitae congue appareat. Te sit nonumes scripserit. Eam at malis electram, scripta hendrerit vis ex. Sed ea platonem molestiae.</p>"
				},
				{
					name: "Divider Line",
					content:
						'<hr role="separator" aria-orientation="horizontal" class="v-divider teal">'
				}
			],
			list2: [],
			page: {
				htmlcontent: "",
				jsoncontent: {
					content: []
				}
			},
			selectedFile: "",
			selectedFileDetails: {
				name: "",
				type: ""
			},
			uploadedFile: {},
			showFileUploadDialog: false,
			imageData: "",
			currentFolder: "uploads",
			previousFolder: "uploads",
			allFolders: {},
			dirFiles: {},
      subFolders: {},
      sidemenuitems: {},
			test: ""
		};
	},
	mounted() {
		this.getPage();
		this.getFolders();
	},
	methods: {
		getPage() {
			axios.get("/getpagetest/sed-corrupti-nobis-aut-veritatis").then(res => {
				this.list2 = JSON.parse(res.data.jsoncontent);
				this.page = res.data;
				this.page.jsoncontent = JSON.parse(res.data.jsoncontent);
				this.updateHTMLContent();
			});
		},
		savePage() {
			this.page.jsoncontent = JSON.stringify(this.list2);
			this.page.title = "WUT";
			this.page.subtitle = "subWUT";
			let newpage = new FormData();
			newpage.append("id", this.page.id);
			newpage.append("section_id", this.page.section_id);
			newpage.append("title", this.page.title);
			newpage.append("subtitle", this.page.subtitle);
			newpage.append("slug", this.page.slug);
			newpage.append("htmlcontent", this.page.htmlcontent);
			newpage.append("jsoncontent", this.page.jsoncontent);
			newpage.append("state_id", this.page.state_id);
			axios.post("/post/savepage2", newpage).then(res => {
				if (res.status == 200) {
					this.getPage(res.data.page_id);
				}
			});
		},
		onShowFileManager() {
			this.showFileManager = true;
		},
		getFolders() {
			let fdfolders = new FormData();
			fdfolders.append("folder", this.currentFolder);

			axios.post("/getFolders", fdfolders).then(res => {
				if (res.status == 200) {
					this.allFolders = res.data.allFolders;
					this.dirFiles = res.data.dirFiles;
					this.subFolders = res.data.subFolders;
					// this.fileDetails();
				}
			});
		},
		showFolderName(folder) {
			return folder.replace("public/uploads/", "");
		},
		onFolderClick(folder) {
			this.currentFolder = folder.replace("public/uploads/", "uploads/");
			this.getFolders();
		},
		onFileClick(file) {
			alert(file.name);
			if (file.type.indexOf("image/") >= 0) {
				this.insertImage(file);
			}
			if (file.type.indexOf("application/") >= 0) {
				this.insertFile(file);
			}
			this.showFileManager = false;
    },
		onShowEditClick() {
			if (this.showEdit == true) {
				this.showEdit = false;
			} else {
				this.showEdit = true;
			}
		},
		insertImage(file) {
			this.list2.push({
				name: file.type,
				id: this.randID(),
				content:
					'<div role="imageHolder"><a href="' +
					file.path +
					'" target="_blank" class="' +
					file.type +
					'"><img src="' +
					file.path +
					'" />' +
					'</div></div>'
			});
		},
		insertFile(file) {
			this.list2.push({
				name: file.type,
				id: this.randID(),
				content:
					'<div class="row"><div class="text-left col-12"><a href="' +
					file.path +
					'" target="_blank"' +
					'"><div role="listitem" class="v-list-item v-list-item--link"><div class="v-avatar v-list-item__avatar rounded-0 v-avatar--tile" style="height: 40px; min-width: 40px; width: 40px;"><i aria-hidden="true" class="v-icon notranslate white red--text far fa-file-pdf theme--light" ></i></div>' +
					file.name +
					"</div></a></div></div>"
			});
		},
		clone(item) {
			// Create a fresh copy of item
			let cloneMe = JSON.parse(JSON.stringify(item));
			this.$delete(cloneMe, "id");
			return cloneMe;
		},
		addSection(sectionName) {
			if (sectionName == "Title") {
				this.addTitle();
			}
			if (sectionName == "Heading") {
				this.addHeading();
			}
			if (sectionName == "Text Block") {
				this.addTextBlock();
			}
			// if (sectionName == "Image") {
			// 	this.addImage();
			// }
			if (sectionName == "Divider Line") {
				this.addDivider();
			}
			// if (sectionName == "File Download") {
			// 	this.addFileDownload();
			// }
		},
		addTitle() {
			this.list2.push({
				name: this.list1[0].name,
				id: this.randID(),
				content: this.list1[0].content
			});
		},
		addHeading() {
			this.list2.push({
				name: this.list1[0].name,
				id: this.randID(),
				content: this.list1[0].content
			});
		},
		addTextBlock() {
			this.list2.push({
				name: this.list1[1].name,
				id: this.randID(),
				content: this.list1[1].content
			});
		},
		addDivider() {
			this.list2.push({
				name: this.list1[2].name,
				id: this.randID(),
				content: this.list1[2].content
			});
		},
		addFileDownload() {
			this.list2.push({
				name: this.list1[4].name,
				id: this.randID(),
				content: this.list1[4].content
			});
		},
		randID() {
			return Math.random()
				.toString(16)
				.slice(2);
		},
		newId(e) {
			if (e.id) return e.id;

			const key = Math.random()
				.toString(16)
				.slice(2);

			this.$set(e, "id", key);

			return e.newId;
		},
		deleteItem(idx) {
			this.list2.splice(idx, 1);
		},
		updateHTML(e) {
			this.page.htmlcontent = "";
			length = this.list2.length;
			for (var i = 0; i < length; i++) {
				this.page.htmlcontent += this.list2[i].content;
			}
		},
		updateHTMLContent() {
			this.updateHTML("updated");
		},
		onFileSelected(event) {
			this.selectedFile = event.target.files[0];
			this.selectedFileDetails.name = this.selectedFile.name;
			this.selectedFileDetails.type = this.selectedFile.type;
			const reader = new FileReader();
			reader.onload = e => {
				this.imageData = e.target.result;
			};
			reader.readAsDataURL(event.target.files[0]);

			this.showFileUploadDialog = true;
		},
		endUpload() {
			this.imageData = "";
			this.selectedFile = "";
			this.showFileUploadDialog = false;
		},
		onUpload() {
			this.selectedFileType = this.selectedFile.type;
			let fd = new FormData();
			fd.append("file", this.selectedFile, this.selectedFile.name);
			fd.append("name", this.selectedFileDetails.name);
			fd.append("type", this.selectedFileDetails.type);
			axios.post("/upload", fd).then(res => {
				if (res.status == 200) {
					this.showFileUploadDialog = false;
					this.uploadedFile.name = this.selectedFile.name;
					this.uploadedFile.type = this.selectedFile.type;
					this.uploadedFile.src = res.data.src;
					// this.endUpload();

					// this.list2.push({
					// 	name: this.uploadedFile.type,
					// 	id: this.randID(),
					// 	content:
					// 		'<img src="' +
					// 		this.uploadedFile.src +
					// 		'" />' +
					// 		'<div class="row"><div class="text-right col-12"><a href="' +
					// 		this.uploadedFile.src +
					// 		'" target="_blank" class="' +
					// 		this.uploadedFile.type +
					// 		'">[View Full Size]</a></div></div>'
					// });
					this.getFolders();
					this.onShowFileManager();
				}
			});
		}
	},
	computed: {
		dragOptions() {
			return {
				animation: 200,
				group: "description",
				disabled: false,
				ghostClass: "ghost"
			};
		}
	}
};
</script>
<style lang="scss" scoped>
.drag-area {
	min-height: 300px;
	min-width: 80%;
	padding-bottom: 2rem;
}
>>> img {
	max-width: 100%;
	border-radius: 4px;
}
.handle {
	float: left;
	padding-top: 8px;
	padding-bottom: 8px;
}
.v-application p {
	margin-bottom: 0 !important;
}
pre {
	overflow-x: auto;
	white-space: pre-wrap;
	white-space: -moz-pre-wrap;
	white-space: -pre-wrap;
	white-space: -o-pre-wrap;
	word-wrap: break-word;
}
</style>
