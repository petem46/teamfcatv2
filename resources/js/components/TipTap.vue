<template>
	<div>
		<v-row>
			<v-col cols="1" class="align-center py-0">
				<v-btn icon id="handle">
					<v-icon color="grey lighten-1">fa-bars</v-icon>
				</v-btn>
			</v-col>
			<v-col cols="10" class="py-0">
				<div v-if="!showEdit" v-html="this.item.content" fluid app class="py-2 px-3" :id="item.id"></div>
			</v-col>
			<v-col cols="1" class="py-0">
        <!-- Show Delete Icon for Divider Line -->
				<v-btn icon v-if="this.item.name == 'Divider Line'" @click="showConfirmDelete = true">
					<v-icon small color="red lighten-1">far fa-trash-alt</v-icon>
				</v-btn>
        <!-- Show Delete Icon for Google Drive Files -->
				<v-btn icon v-if="this.item.name == 'Google Drive File'" @click="showConfirmDelete = true">
					<v-icon small color="red lighten-1">far fa-trash-alt</v-icon>
				</v-btn>
				<v-btn
					icon
					v-if="this.item.name.indexOf('application/') >= 0"
					@click="showConfirmDelete = true"
				>
					<v-icon small color="red lighten-1">far fa-trash-alt</v-icon>
				</v-btn>
				<v-btn
					v-if="this.item.name == 'Text Block' || this.item.name == 'Heading' || this.item.name.indexOf('image/') >= 0"
					icon
					id="edit"
					@click="showEditMethod()"
				>
					<v-icon v-if="!showEdit" color="orange darken-1">fa-edit</v-icon>
					<v-icon v-if="showEdit" color="black">far fa-times-circle</v-icon>
				</v-btn>
			</v-col>
		</v-row>
		<div v-if="showEdit" fluid app>
			<v-col class="py-0">
				<div class="editor">
					<!-- <tip-tap-editor-bar v-if="item.name!=='Heading'" :editor="editor" v-slot="{ commands, isActive }"></tip-tap-editor-bar> -->
					<tip-tap-editor-bar-heading
						v-if="item.name=='Heading'"
						:editor="editor"
						v-slot="{ commands, isActive }"
					></tip-tap-editor-bar-heading>
					<tip-tap-editor-bar-textblock
						v-if="item.name=='Text Block'"
						:editor="editor"
						v-slot="{ commands, isActive }"
					></tip-tap-editor-bar-textblock>
					<tip-tap-editor-bar-image
						v-if="item.name.indexOf('image/') >= 0"
						:editor="editor"
						v-slot="{ commands, isActive }"
					></tip-tap-editor-bar-image>
					<editor-content class="elevation-8 editor__content" :editor="editor" />
					<v-card-actions>
						<v-btn text color="red" @click="showConfirmDelete = true">Delete Section</v-btn>
						<v-spacer></v-spacer>
						<v-btn outlined @click="scrollToTop(); showEditMethod();">Close Editor</v-btn>
						<!-- <v-btn text @click="updateItem()" dark color="green">Save</v-btn> -->
					</v-card-actions>
				</div>
			</v-col>
		</div>
		<!-- <pre><code v-html="json"></code></pre> -->
		<v-dialog v-model="showConfirmDelete" persistent min-width="300" max-width="30%">
			<!-- <template v-slot:activator="{ on, attrs }"> -->
			<!-- </template> -->
			<v-card>
				<v-card-title class="headline red darken-2 white--text">Confirm Delete {{ item.name }}</v-card-title>
				<v-card-text class="text-body-1 pt-3">Are you sure you want to delete this section?</v-card-text>
				<v-card-text class="text-body-1 red--text">This action cannot be undone!</v-card-text>
				<v-card-actions>
					<v-btn color="grey darken-1" outlined @click="showConfirmDelete = false">NO, Cancel</v-btn>
					<v-spacer></v-spacer>
					<v-btn
						color="red darken-1"
						text
						@click="showConfirmDelete = false; deleteItem(idx)"
					>YES, DELETE</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>
	</div>
</template>
<script>
// import Image from "../tiptap-ext/Image";
import ColorText from "../tiptap-ext/ColorText";
import TextH from "../tiptap-ext/TextH";
import ImageWidth from "../tiptap-ext/ImageWidth";
import Link from "../tiptap-ext/Link";
import { Editor, EditorContent, EditorMenuBar } from "tiptap";
import {
	Blockquote,
	CodeBlock,
	HardBreak,
	Heading,
	HorizontalRule,
	OrderedList,
	BulletList,
	ListItem,
	TodoItem,
	TodoList,
	Bold,
	Code,
	Italic,
	// Link,
	Strike,
	Underline,
	History,
	Image
} from "tiptap-extensions";

export default {
	components: {
		EditorContent
	},
	props: ["item", "idx"],
	data() {
		return {
			editor: new Editor({
				extensions: [
					new Blockquote(),
					new BulletList(),
					new CodeBlock(),
					new HardBreak(),
					new Heading({ levels: [1, 2, 3] }),
					new HorizontalRule(),
					new ListItem(),
					new OrderedList(),
					new TodoItem(),
					new TodoList(),
					new Link(),
					new Bold(),
					new Code(),
					new Italic(),
					new Strike(),
					new Underline(),
					new History(),
					new Image(),
					new ColorText(),
					new TextH(),
					new ImageWidth()
				],
				content: this.item.content,
				onInit: () => {},
				onUpdate: ({ getJSON, getHTML }) => {
					this.html = getHTML();
					// this.json = getJSON();
					this.item.content = this.html;
				}
			}),
			loading: true,
			showEdit: false,
			// json: "",
			html: "",
			newItem: {
				id: this.item.id,
				name: this.item.name,
				content: this.item.content,
				idx: this.idx
			},
			showConfirmDelete: false
		};
	},
	methods: {
		scrollToTop() {
			// window.scrollTo(500, 0);
		},
		showEditMethod() {
			if (this.showEdit == true) {
				this.showEdit = false;
			} else {
				this.showEdit = true;
			}
			this.$emit("updateItemContent");
			// this.editor.setContent(this.item.content);
		},
		deleteItem(idx) {
			this.$emit("deleteItem", idx);
		}
	},
	beforeDestroy() {
		this.editor.destroy();
	}
};
</script>
<style lang="scss" scoped>
img {
	max-width: 100% !important;
	border-radius: 4px !important;
}
.editor__content #handle {
	cursor: grab;
}
.editor__content:hover {
	border-top: thin solid red;
}

.editor .editor__content {
	cursor: auto !important;
	padding-bottom: 0 !important;
	padding-top: 0 !important;
}
.v-application p {
	margin-bottom: 0 !important;
}
</style>
