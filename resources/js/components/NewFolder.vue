<template>
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
</template>
<script>
export default {

}
</script>
