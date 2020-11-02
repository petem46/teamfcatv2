<template>
	<div>
		<v-dialog id="fileManager" v-model="showFileManager" persistent>
			<v-row>
				<v-col cols="12" sm="12">
					<v-card>
						<v-toolbar color="teal" dark>
							<v-toolbar-title class="white--text">File Manager | {{ currentFolderName }}</v-toolbar-title>
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
									<v-list-item @click="fileInputClick(fileVideoAccept)">
										<v-list-item-title>
											<v-icon large color="red" class="mr-3">mdi-video</v-icon>Upload Video
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
							<v-list-item v-for="folder in subFolders" :key="folder" link @click="onFolderClick(folder)">
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
						<v-card-actions>
							<v-spacer></v-spacer>
							<v-btn text @click="$emit('hideFileManager')">Close File Manager</v-btn>
						</v-card-actions>
					</v-card>
				</v-col>
			</v-row>
		</v-dialog>
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
	</div>
</template>
<script>
export default {
	props: ["showFileManager"],
	data() {
		return {
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
			fileVideoAccept: ".mp4, video/mp4",
			showNewFolderDialog: false,
			newFolderName: "",
			imageData: "",
			currentFolder: "uploads",
			previousFolder: "uploads",
			allFolders: {},
			dirFiles: {},
			subFolders: {}
		};
	},
	mounted() {
		this.getFolders();
	},
	methods: {
		getFolders() {
			let fdfolders = new FormData();
			fdfolders.append("folder", this.currentFolder);

			axios.post("/getFolders", fdfolders).then(res => {
				if (res.status == 200) {
					this.allFolders = res.data.allFolders;
					this.dirFiles = res.data.dirFiles;
					this.subFolders = res.data.subFolders;
				}
			});
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
      console.log(file);
      if (file.type.indexOf("video/") >= 0) {
        this.$emit("insertVideo", file);
      }
			if (file.type.indexOf("image/") >= 0) {
				this.$emit("insertImage", file);
			}
			if (file.type.indexOf("application/") >= 0) {
				this.$emit("insertFile", file);
			}
			this.$emit("hideFileManager");
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
		fileInputClick(AcceptType) {
			if (AcceptType == this.fileImageAccept) {
				this.fileAccept = this.fileImageAccept;
			}
			if (AcceptType == this.fileDocAccept) {
				this.fileAccept = this.fileDocAccept;
			}
			if (AcceptType == this.fileVideoAccept) {
				this.fileAccept = this.fileVideoAccept;
			}
			setTimeout(() => {
				this.$refs.fileInputUpload.click();
			}, 250);
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
					this.$emit("showFileManager");
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
		}
	},
	computed: {
		previousFolderName() {
			return this.previousFolder.replace("uploads", "home");
		},
		currentFolderName() {
			return this.currentFolder.replace("uploads", "home");
		}
	}
};
</script>
