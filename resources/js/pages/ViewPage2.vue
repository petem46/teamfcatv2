<template>
	<div id="pageview" class>
		<div class="xtop-border--teal grey lighten-5 container" id="top">
			<page-header
				v-if="!loading"
				:title="page.title"
				:subtitle="page.subtitle"
				:section="page.section"
			/>
			<!-- Content Row -->
			<v-row>
				<!-- Sidebar Column -->
				<div v-if="!loading" class="col-lg-3 mb-4 order-md-2 order-2">
					<page-side-bar
						:slug="slug"
						:loading="loading"
						:sidemenuitems="sidemenuitems"
						:showEdit="showEdit"
						:section="page.section"
						@addHeading="addHeading"
						@addTextBlock="addTextBlock"
						@addDivider="addDivider"
						@addGoolgeDriveFile="addGoolgeDriveFile"
						@deletePage="onShowDeletePageConfirm"
						@savePage="savePage"
						@showEdit="onShowEditClick"
						@showFileManager="onShowFileManager"
						@updateHTML="updateHTML"
					/>
				</div>
				<!-- Content Column -->
				<div v-if="!loading" class="col-lg-9 pl-4 mb-4 order-md-1 order-1 white">
					<page-content v-if="!showEdit" :page="page" fluid app class="container"></page-content>

					<v-container v-if="showEdit" fluid app class="px-0">
						<v-form ref="form" v-model="valid">
							<v-card>
								<v-toolbar dark color="teal">
									<v-toolbar-title
										v-if="slug !='new'"
										class="teal white--text"
										@click="checkSlug()"
									>EDIT {{page.title}} PAGE</v-toolbar-title>
									<v-toolbar-title v-if="slug =='new'" class="teal white--text">CREATE NEW PAGE</v-toolbar-title>
									<v-spacer></v-spacer>
									<v-toolbar-items>
										<v-btn dark v-if="showEdit" text @click="savePage()">Save</v-btn>
									</v-toolbar-items>
								</v-toolbar>
								<v-col>
									<v-select
										hide-details="auto"
										:items="sections"
										item-text="tealTitle"
										item-value="id"
										label="Page Section"
										outlined
										v-model="page.section_id"
										:rules="[() => !!page.section_id || 'A Section required']"
									></v-select>
								</v-col>
								<v-col>
									<v-text-field
										hide-details="auto"
										outlined
										v-model="page.title"
										label="Page Title"
										required
										ref="title"
										:rules="[
                      () => !!page.title || 'A page title required',
                      () => !!checkTitle || 'A page with this title already exists, please choose a new title'
                    ]"
										:error-messages="errorMessages"
									></v-text-field>
								</v-col>
								<v-col>
									<v-text-field
										hide-details="auto"
										outlined
										v-model="page.subtitle"
										label="Page Subtitle"
										required
										ref="subtitle"
										:rules="[() => !!page.subtitle || 'Subtitle required']"
										:error-messages="errorMessages"
									></v-text-field>
								</v-col>
								<v-row class="px-4">
									<v-col cols="12" sm="6" class="px-auto">
										<v-text-field
											hide-details="auto"
											readonly
											outlined
											v-model="computedslug"
											label="Default Page Link"
											:rules="[() => !!checkDefaultSlug || 'A page with this link already exists, please choose a new link']"
											required
										>
											<template v-slot:append>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon v-on="on">mdi-help-circle-outline</v-icon>
													</template>
													This is the default page link generated from the page title.
												</v-tooltip>
											</template>
										</v-text-field>
									</v-col>
									<v-col cols="12" sm="6" class="px-auto">
										<v-text-field
											@keydown="sanitizeSlug($event)"
											hide-details="auto"
											persistent-hint
											hint="Choose page link or leave blank to use default"
											outlined
											v-model="page.slug"
											label="Add Custom Page Link"
											:rules="[
                        () => !!checkCustomSlug || 'A page with this link already exists, please choose a new link'
                      ]"
										>
											<template v-slot:append>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon v-on="on">mdi-help-circle-outline</v-icon>
													</template>
													The custom link will overide the default link and form part of the page link URL
												</v-tooltip>
											</template>
										</v-text-field>
									</v-col>
								</v-row>
								<v-col>
									<div class="content-label px-1">Page Content</div>
									<div class="white drag-area">
										<draggable
											class="list-group pt-3"
											style="border: thin solid rgba(0,0,0,0.38)"
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
													<!-- <v-col cols="12" class="my-2" style="border: thin dashed grey" v-html="item.content"></v-col> -->
												</tip-tap-editor>
											</transition-group>
										</draggable>
									</div>
								</v-col>
								<v-card-actions>
									<v-spacer></v-spacer>
									<v-btn @click="scrollToTop(); onShowEditClick();" dark color="grey">Close</v-btn>
									<v-btn :disabled="!valid" @click="savePage()" :dark="valid" color="green">Save</v-btn>
								</v-card-actions>
							</v-card>
						</v-form>
					</v-container>
				</div>

				<v-dialog v-model="showNewFolderDialog" persistent max-width="600px">
					<v-card>
						<v-card-title>
							<span class="headline">Create New Folder</span>
						</v-card-title>
						<v-card-text>
							<v-container>
								<v-row>
									<v-col cols="12">
										<v-text-field label="New Folder Name" required v-model="newFolderName"></v-text-field>
									</v-col>
								</v-row>
							</v-container>
						</v-card-text>
						<v-card-actions>
							<v-spacer></v-spacer>
							<v-btn color="blue darken-1" text @click="showNewFolderDialog = false">Close</v-btn>
							<v-btn color="blue darken-1" text @click="onMakeFolder()">Save</v-btn>
						</v-card-actions>
					</v-card>
				</v-dialog>

				<v-dialog id="fileManager" v-model="showFileManager">
					<v-row>
						<v-col cols="12" sm="12">
							<v-card>
								<v-toolbar color="teal" dark>
									<v-toolbar-title class="white--text">Pete's File Manager | {{ currentFolderName }}</v-toolbar-title>
									<!-- <v-btn fab color="green" bottom right absolute @click="$refs.fileInputUpload.click()">
										<v-icon>mdi-plus</v-icon>
									</v-btn>-->
									<v-spacer></v-spacer>
									<v-menu bottom left offset-x>
										<template v-slot:activator="{ on, attrs }">
											<v-btn v-bind="attrs" v-on="on" fab color="green" bottom right absolute>
												<v-icon>mdi-plus</v-icon>
											</v-btn>
										</template>
										<v-list>
											<v-list-item @click.stop="showNewFolderDialog = true">
												<v-list-item-title>
													<v-icon large color="grey" class="mr-3">mdi-folder</v-icon>New Folder
												</v-list-item-title>
											</v-list-item>
											<v-list-item @click="fileInputClick(fileDocAccept)">
												<v-list-item-title>
													<v-icon large color="blue" class="mr-3">mdi-file</v-icon>Upload File
												</v-list-item-title>
											</v-list-item>
											<v-list-item @click="fileInputClick(fileImageAccept)">
												<v-list-item-title>
													<v-icon large color="green" class="mr-3">mdi-image</v-icon>Upload Image
												</v-list-item-title>
											</v-list-item>
											<v-list-item hidden>
												<input
													type="file"
													:accept="fileAccept"
													@change="onFileSelected"
													style="display: none"
													ref="fileInputUpload"
												/>
											</v-list-item>
										</v-list>
									</v-menu>
								</v-toolbar>
								<v-list two-line subheader>
									<v-subheader inset>Folders</v-subheader>
									<v-list-item
										v-if="currentFolderName != 'home' || currentFolder != 'uploads'"
										@click="onFolderClick(previousFolder)"
									>
										<v-list-item-avatar>
											<v-icon class="grey lighten-1 white--text">fa-level-up-alt</v-icon>
										</v-list-item-avatar>

										<v-list-item-content>
											<v-list-item-title>{{previousFolderName}}</v-list-item-title>
											<v-divider></v-divider>
										</v-list-item-content>
									</v-list-item>
									<v-list-item
										v-for="folder in subFolders"
										:key="folder"
										link
										@click="onFolderClick(folder)"
									>
										<v-list-item-avatar>
											<v-icon class="teal darken-2 white--text">far fa-folder-open</v-icon>
										</v-list-item-avatar>

										<v-list-item-content>
											<v-list-item-title>{{ showFolderName(folder) }}</v-list-item-title>
											<!-- <v-list-item-subtitle>subtitle</v-list-item-subtitle> -->
										</v-list-item-content>
									</v-list-item>
								</v-list>
								<v-divider inset></v-divider>
								<div v-if="dirFiles.length > 0">
									<v-list two-line subheader>
										<v-subheader inset>Files {{currentFolderName}}</v-subheader>

										<v-list-item v-for="file in dirFiles" :key="file.url" link @click="onFileClick(file)">
											<v-list-item-avatar tile v-if="file.type.indexOf('image/') >= 0">
												<v-img :src="file.url" contain></v-img>
											</v-list-item-avatar>
											<v-list-item-avatar tile v-if="file.type.indexOf('application/') >= 0">
												<span v-html="getFileIcon(file.type)"></span>
											</v-list-item-avatar>
											<v-list-item-content>
												<v-list-item-title>{{ file.name }}</v-list-item-title>
												<v-list-item-subtitle>{{file.size | prettyBytes}}</v-list-item-subtitle>
											</v-list-item-content>
										</v-list-item>
									</v-list>
								</div>
							</v-card>
						</v-col>
					</v-row>
				</v-dialog>

				<v-dialog id="fileUploadDialog" v-model="showFileUploadDialog" width="40%">
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
			</v-row>
		</div>

		<!-- START OF CONFIRM DELETE PAGE DIALOG BOX -->
		<v-dialog v-model="showConfirmDelete" persistent min-width="300" max-width="30%">
			<v-card>
				<v-card-title class="headline red darken-2 white--text">Confirm Delete Page</v-card-title>
				<v-card-text class="text-body-1 pt-3">Are you sure you want to delete this page?</v-card-text>
				<v-card-text class="text-body-1 red--text">This action will delete this page and all content!</v-card-text>
				<v-card-actions>
					<v-btn color="grey darken-1" outlined @click="showConfirmDelete = false">NO, Cancel</v-btn>
					<v-spacer></v-spacer>
					<v-btn color="red darken-1" text @click="showConfirmDelete = false; deletePage()">YES, DELETE</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>
		<!-- END OF CONFIRM DELETE PAGE DIALOG BOX -->

		<v-snackbar
			v-model="snackbar.show"
			:color="snackbar.color"
			:timeout="snackbar.timeout"
			multi-line
			bottom
		>
			{{ snackbar.text }}
			<v-btn dark text @click="snackbar.show = false">Close</v-btn>
		</v-snackbar>
	</div>
</template>
<script>
import draggable from "vuedraggable";
import Axios from "axios";

export default {
	components: {
		draggable
	},
	props: ["sectionname", "slug"],
	data() {
		return {
			dialog: false,
			fab: false,
			drag: false,
			showEdit: false,
			showFileManager: false,
			showConfirmDelete: false,
			loading: true,
			title: "",
			// newItem: {},
			// newIndex: "",
			list2: [],
			page: {
				title: "",
				htmlcontent: "",
				jsoncontent: {
					content: []
				}
			},
			valid: "",
			sections: [],
			selectedFile: "",
			selectedFileDetails: {
				name: "",
				type: ""
			},
			uploadedFile: {},
			showFileUploadDialog: false,
			fileAccept: "",
			fileDocAccept: ".pdf,.doc,.zip,.docx,.xlsx,.xls",
			fileImageAccept: ".png, .jpeg, .jpg, video/mp4,audio/mp3",
			showNewFolderDialog: false,
			newFolderName: "",
			imageData: "",
			currentFolder: "uploads",
			previousFolder: "uploads",
			allFolders: {},
			dirFiles: {},
			subFolders: {},
			sidemenuitems: {},
			test: "",
			errorMessages: "",
			snackbar: {
				color: "",
				mode: "",
				show: false,
				text: "",
				timeout: 2000,
				y: "top"
			}
		};
	},
	mounted() {
		this.getContent();
		this.currentFolder = "uploads";
		this.getFolders();
	},
	methods: {
		getContent() {
			this.loading = true;
			axios
				.get("/get/page/content/" + this.sectionname + "/" + this.slug)
				.then(res => {
					if (this.slug != "newpage") {
						this.list2 = JSON.parse(res.data.pagecontent.jsoncontent);
						this.page = res.data.pagecontent;
						this.page.section_id = this.page.section.id;
						this.page.jsoncontent = JSON.parse(
							res.data.pagecontent.jsoncontent
						);
						this.title = this.page.title;
					}
					if (this.slug == "newpage") {
						this.page.section_id = res.data.section_id;
						this.list2.push({
							name: "Text Block",
							id: this.randID(),
							content:
								"<p>Replace this text with new page content using the edit tools on the right.</p>"
						});
						this.showEdit = true;
					}
					this.sections = res.data.sections;
					this.sidemenuitems = res.data.sidemenuitems;
					this.updateHTMLContent();
					this.scrollToTop();
					this.loading = false;
					this.endUpload();
					console.log(this.sidemenuitems.includes("New Page"));
				});
		},
		savePage() {
			if (this.valid) {
				this.page.jsoncontent = JSON.stringify(this.list2);
				let newpage = new FormData();
				newpage.append("id", this.page.id);
				newpage.append("section_id", this.page.section_id);
				newpage.append("title", this.page.title);
				newpage.append("subtitle", this.page.subtitle);
				if (!this.page.slug) {
					console.log("Using computed slug");
					this.page.slug = this.computedslug;
				}
				newpage.append("slug", this.page.slug);

				newpage.append("htmlcontent", this.page.htmlcontent);
				newpage.append("jsoncontent", this.page.jsoncontent);
				newpage.append("state_id", this.page.state_id);
				axios
					.post("/post/savepage2", newpage)
					.then(res => {
						if (res.status == 200) {
							this.$router.push(this.page.slug).catch(() => {
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
		},
		onShowDeletePageConfirm() {
			this.showConfirmDelete = true;
		},
		deletePage() {
			if (this.valid) {
				var section = this.page.section.link;
				axios.delete("/delete/page/" + this.page.id).then(res => {
					if (res.status == 200) {
						this.$router.push(section).catch(() => {
							this.getContent();
						});
						this.onShowEditClick();
					}
				});
			}
		},
		onShowFileManager() {
			this.showFileManager = true;
		},
		getFolders() {
			// if (this.currentFolderName.length > 1) {
			let fdfolders = new FormData();
			fdfolders.append("folder", this.currentFolder);

			axios.post("/getFolders", fdfolders).then(res => {
				if (res.status == 200) {
					this.allFolders = res.data.allFolders;
					this.dirFiles = res.data.dirFiles;
					this.subFolders = res.data.subFolders;
				}
			});
			// }
		},
		showFolderName(folder) {
			return folder.replace("public/uploads/", "");
		},
		onFolderClick(folder) {
			this.currentFolder = folder.replace("public/uploads/", "uploads/");
			this.previousFolder = this.currentFolder.substr(
				0,
				this.currentFolder.lastIndexOf("/")
			);
			this.getFolders();
		},
		onFileClick(file) {
			// alert(file.name);
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
		fileInputClick(AcceptType) {
			if (AcceptType == this.fileImageAccept) {
				this.fileAccept = this.fileImageAccept;
			}
			if (AcceptType == this.fileDocAccept) {
				this.fileAccept = this.fileDocAccept;
			}
			setTimeout(() => {
				this.$refs.fileInputUpload.click();
			}, 250);
		},
		insertImage(file) {
			this.list2.push({
				name: file.type,
				id: this.randID(),
				content:
					'<div role="imageHolder"><a href="' +
					file.url +
					'" target="_blank" class="' +
					file.type +
					'"><img src="' +
					file.url +
					'" /></a>' +
					"</div>"
			});
		},
		insertFile(file) {
			this.list2.push({
				name: file.type,
				id: this.randID(),
				content:
					'<div class="row"><div class="text-left col-12"><a href="' +
					file.url +
					'" target="_blank"' +
					'"><div role="listitem" class="v-list-item v-list-item--link"><div class="v-avatar v-list-item__avatar rounded-0 v-avatar--tile" style="height: 40px; min-width: 40px; width: 40px;">' +
					this.getFileIcon(file.type) +
					"</div>" +
					file.name +
					"</div></a></div></div>"
			});
		},
		getFileIcon(type) {
			if (type == "application/pdf") {
				return '<i aria-hidden="true" class="v-icon notranslate white red--text far fa-file-pdf theme--light" ></i>';
			}
			if (
				type == "application/msword" ||
				type ==
					"application/vnd.openxmlformats-officedocument.wordprocessingml.document"
			) {
				return '<i aria-hidden="true" class="v-icon notranslate white blue--text far fa-file-word theme--light" ></i>';
			}
			if (
				type ==
				"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
			) {
				return '<i aria-hidden="true" class="v-icon notranslate white green--text far fa-file-excel theme--light" ></i>';
			}
			if (
				type ==
				"application/vnd.openxmlformats-officedocument.presentationml.presentation"
			) {
				return '<i aria-hidden="true" class="v-icon notranslate white green--text far fa-file-powerpoint theme--light" ></i>';
			}
			if (type == "application/x-zip-compressed") {
				return '<i aria-hidden="true" class="v-icon notranslate white green--text far fa-file-archive theme--light" ></i>';
			}
		},
		addHeading(item) {
			this.list2.push({
				name: item.name,
				id: this.randID(),
				content: item.content
			});
		},
		addTextBlock(item) {
			this.list2.push({
				name: item.name,
				id: this.randID(),
				content: item.content
			});
		},
		addDivider(item) {
			this.list2.push({
				name: item.name,
				id: this.randID(),
				content: item.content
			});
		},
		addGoolgeDriveFile(gFiles) {
			console.log("emit level 3");
			console.log(gFiles);
			length = gFiles.length;
			for (var i = 0; i < length; i++) {
				if (gFiles[i].type == "file") {
					this.list2.push({
						name: "Google Drive File",
						id: gFiles[i].id,
						content:
							'<div class="row"><div class="text-left col-12"><a href="' +
							gFiles[i].url +
							'" target="_blank"' +
							'"><div role="listitem" class="v-list-item v-list-item--link"><div class="v-avatar v-list-item__avatar rounded-0 v-avatar--tile" style="height: 16px; min-width: 16px; width: 16px;"><img src="' +
							gFiles[i].iconUrl +
							'"/></div>' +
							gFiles[i].name +
							"</div></a></div></div>"
					});
				}
				if (gFiles[i].type == "photo") {
					this.list2.push({
						name: "Google Drive Image",
						id: gFiles[i].id,
						content:
							'<div role="imageHolder"><a href="' +
							gFiles[i].url +
							'" target="_blank" class="' +
							gFiles[i].type +
							'"><img src="https://drive.google.com/uc?export=download&amp;id='
              + gFiles[i].id + '" /></a>' +
							"</div>"
					});
				}
				if (gFiles[i].type == "video") {
					this.list2.push({
						name: "Google Drive Video",
						id: gFiles[i].id,
						content:
              '<div role="imageHolder"><video width="600" controls><source src="https://drive.google.com/uc?export=download&amp;id='
              + gFiles[i].id + '" type="video/mp4" /></video>'
              + '</div>'
					});
				}
			}
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
			this.loading = true;
			this.page.htmlcontent = "";
			length = this.list2.length;
			for (var i = 0; i < length; i++) {
				this.page.htmlcontent += this.list2[i].content;
			}
			this.loading = false;
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
			this.fileAccept = "";
			this.currentFolder = "uploads";
			this.previousFolder = "";
		},
		onUpload() {
			this.selectedFileType = this.selectedFile.type;
			let fd = new FormData();
			fd.append("file", this.selectedFile, this.selectedFile.name);
			fd.append("name", this.selectedFileDetails.name);
			fd.append("type", this.selectedFileDetails.type);
			fd.append("folder", this.currentFolder);
			axios.post("/upload", fd).then(res => {
				if (res.status == 200) {
					this.showFileUploadDialog = false;
					this.uploadedFile.name = this.selectedFile.name;
					this.uploadedFile.type = this.selectedFile.type;
					this.uploadedFile.src = res.data.src;
					// this.endUpload();
					this.getFolders();
					this.onShowFileManager();
				}
			});
		},
		onMakeFolder() {
			let fd = new FormData();
			fd.append(
				"newFolder",
				"public/" + this.currentFolder + "/" + this.newFolderName
			);
			axios.post("/makeFolder", fd).then(res => {
				this.newFolderName = "";
				this.showNewFolderDialog = false;
				this.getFolders();
			});
		},
		scrollToTop() {
			window.scrollTo(0, 0);
		},
		sanitizeTitle(title) {
			var slug = "";
			// Change to lower case
			var titleLower = title.toLowerCase();
			// Letter "e"
			slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, "e");
			// Letter "a"
			slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, "a");
			// Letter "o"
			slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, "o");
			// Letter "u"
			slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, "u");
			// Letter "d"
			slug = slug.replace(/đ/gi, "d");
			// Trim the last whitespace
			slug = slug.replace(/\s*$/g, "");
			// Change whitespace to "-"
			slug = slug.replace(/\s+/g, "-");

			return slug;
		},
		sanitizeSlug(e) {
			console.log(e.keyCode);
			console.log(e.code);
			if (e.key != "-" && e.code != "Space" && /^\W$/.test(e.key)) {
				e.preventDefault();
			}
			if (e.code == "Space") {
				this.page.slug = this.page.slug + "-";
				e.preventDefault();
			}
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
		},
		previousFolderName() {
			return this.previousFolder.replace("uploads", "home");
		},
		currentFolderName() {
			return this.currentFolder.replace("uploads", "home");
		},
		computedslug() {
			return this.sanitizeTitle(this.page.title);
		},
		checkCustomSlug() {
			var check = true;
			length = this.sidemenuitems.length;
			for (var i = 0; i < length; i++) {
				if (this.page.slug == this.sidemenuitems[i].slug) {
					check = false;
				}
			}
			if (this.slug == this.page.slug) {
				check = true;
			}
			return check;
		},
		checkDefaultSlug() {
			var check = true;
			length = this.sidemenuitems.length;
			for (var i = 0; i < length; i++) {
				if (this.computedslug == this.sidemenuitems[i].slug) {
					check = false;
				}
			}
			if (this.slug == this.page.slug) {
				check = true;
			}
			return check;
		},
		checkTitle() {
			var check = true;
			length = this.sidemenuitems.length;
			for (var i = 0; i < length; i++) {
				if (this.page.title == this.sidemenuitems[i].title) {
					check = false;
				}
			}
			if (this.title == this.page.title) {
				check = true;
			}
			return check;
		}
	},
	watch: {
		slug(val) {
			this.page.slug = val.replace(/\W/g, "");
		}
	}
};
</script>
<style lang="scss" scoped>
#pageview {
	background-color: #cccccc;
	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
	background: url("/images/bady-qb-hxi_yRxODNc-unsplash.jpg");
}
.drag-area {
	// min-height: 200px;
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
.actions {
	max-width: 30rem;
	margin: 0 auto 2rem auto;
}
.export {
	max-width: 30rem;
	margin: 0 auto 2rem auto;
	pre {
		padding: 1rem;
		border-radius: 5px;
		font-size: 0.8rem;
		font-weight: bold;
		color: lightgray;
	}
	code {
		display: block;
		white-space: pre-wrap;
	}
}

.content-label {
	background-color: white;
	color: rgba(0, 0, 0, 0.6);
	font-size: 0.8rem;
	line-height: 11px;
	margin-bottom: -0.4rem;
	margin-left: 0.5rem;
	position: relative;
	width: fit-content;
}
</style>
