<template>
	<div>
		<v-list-item @click="driveIconClicked">
			<v-list-item-content>
				<v-list-item-title>
					<v-icon small class="mr-3">fab fa-google-drive fa-fw</v-icon>Add
					Google Drive File
				</v-list-item-title>
			</v-list-item-content>
		</v-list-item>
		<!-- <v-btn @click="driveIconClicked" dark class="teal" x-large>
			<v-icon class="mr-2">fa fa-arrow-right</v-icon>PICKER
		</v-btn>-->
	</div>
</template>
<script>
import Axios from 'axios';
export default {
	data() {
		return {
			pickerApiLoaded: false,
			developerKey: "",
			clientId: "",
			scope: "https://www.googleapis.com/auth/drive.readonly",
			oauthToken: null,
			pickedFiles: [],
		};
	},
	mounted() {
		let gDrive = document.createElement("script");
		gDrive.setAttribute("type", "text/javascript");
		gDrive.setAttribute("src", "https://apis.google.com/js/api.js");
		document.head.appendChild(gDrive);
	},
	created() {
    this.getGoogleKeys();
	},
	methods: {
    getGoogleKeys() {
      Axios
        .get("/googlekeys/picker")
				.then(({ data }) => {
          this.developerKey = data.developerKey;
          this.clientId = data.clientId;
        })
    },
		// The function which handles Google Auth and Loads the Picker
		async driveIconClicked() {
			console.log("Clicked");
			if (this.pickerApiLoaded && this.oauthToken) {
				this.createPicker();
			} else {
				await gapi.load("auth2", () => {
					// console.log("Auth2 Loaded");
					gapi.auth2.authorize(
						{
							client_id: this.clientId,
							scope: this.scope,
							immediate: false,
						},
						this.handleAuthResult
					);
				});
				gapi.load("picker", () => {
					// console.log("Picker Loaded");
					this.pickerApiLoaded = true;
					this.createPicker();
				});
			}
		},
		// The function which handles Google Auth Result
		handleAuthResult(authResult) {
			// console.log("Handle Auth result", authResult);
			if (authResult && !authResult.error) {
				this.oauthToken = authResult.access_token;
				this.createPicker();
			}
		},
		// The function which creates the Picker
		createPicker() {
			// console.log("Create Picker", google.picker);
			if (this.pickerApiLoaded && this.oauthToken) {
				const googleViewId = google.picker.ViewId.DOCS;
				const docsView = new google.picker.DocsView(googleViewId)
					.setIncludeFolders(true)
					.setSelectFolderEnabled(true)
					.setOwnedByMe(true);

				const folderView = new google.picker.DocsView(googleViewId)
					.setIncludeFolders(true)
					.setEnableDrives(true)
					.setSelectFolderEnabled(true);

				var picker = new google.picker.PickerBuilder()
					.enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
					.addView(docsView)
					.addView(folderView)
					// .addView(google.picker.ViewId.FOLDERS)
					// .addView(google.picker.ViewId.DOCS)
					.setOAuthToken(this.oauthToken)
					.setDeveloperKey(this.developerKey)
					.setCallback(this.pickerCallback)
					.build();
				picker.setVisible(true);
			}
		},
		// The callback function for Picker
		async pickerCallback(data) {
			// console.log("PickerCallback", data);
			var url = "nothing";
			var name = "nothing";
			if (data[google.picker.Response.ACTION] === google.picker.Action.PICKED) {
				// Array of Picked Files
				// console.log(data.docs);
				length = data.docs.length;
				this.pickedFiles = data.docs;
				for (var i = 0; i < length; i++) {
					// alert(data.docs[i].name);
				}
				console.log("emit level 1");
				this.$emit("addGoolgeDriveFile", this.pickedFiles);
			}
			// this.oauthToken = '';
		},
	},
};
</script>
