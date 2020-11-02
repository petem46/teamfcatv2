<template>
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
</template>
<script>
export default {};
</script>
