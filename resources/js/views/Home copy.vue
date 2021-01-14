<template>
	<div>
		<header class="masthead teal text-white text-center">
			<div class="container d-flex align-items-center flex-column">
					<v-img src="/images/teamfcat-hexagon.png" width="400px"></v-img>

				<div class="text-h1"></div>
			</div>
		</header>
		<!-- <v-carousel cycle height="350" hide-delimiter-background show-arrows-on-hover>
			<v-carousel-item v-for="(item,i) in items" :key="i" :src="item.src" cycle>
				<v-row class="fill-height" align="center" justify="center">
					<div class="display-3">{{ item.text }}</div>
				</v-row>
			</v-carousel-item>
		</v-carousel>-->
		<div v-if="!loading" class="relative">
			<!-- <div class="absolute pin-t pin-r p-24 translate-r-full">
				<v-icon size="150" color="grey lighten-2">mdi-hexagon-multiple-outline</v-icon>
			</div>
			<div class="absolute top-25 pin-l p-24 translate-r-full">
				<v-icon size="150" color="grey lighten-2">mdi-hexagon-multiple-outline</v-icon>
			</div>
			<div class="absolute top-50 pin-r p-24 translate-r-full">
				<v-icon size="150" color="grey lighten-2">mdi-hexagon-multiple-outline</v-icon>
			</div>
			<div class="absolute top-75 pin-l p-24 translate-r-full">
				<v-icon size="150" color="grey lighten-2">mdi-hexagon-multiple-outline</v-icon>
			</div> -->
			<div fluid app class="container px-10 white">
				<div id="page-title" class="grey--text">{{page.section['name']}}</div>
				<div id="page-title" class="text-h3 pt-3 pb-1">{{page.title}}</div>
				<div id="page-title" class="text-subtitle pb-3">{{page.subtitle}}</div>
				<div id="page-content" class="text-body-1 py-3">
					<div class="white" v-html="page.htmlcontent"></div>
				</div>
			</div>
			<div hidden fluid app class="container px-10 white">
				<v-form @submit.prevent="submit" enctype="multipart/form-data">
					<v-card>
						<v-card-title class="teal white--text">EDIT CONTENT</v-card-title>
						<v-col>
							<v-text-field hide-details="auto" outlined v-model="page.title" label="Page Title" required></v-text-field>
						</v-col>
						<v-col>
							<v-text-field
								hide-details="auto"
								outlined
								v-model="page.subtitle"
								label="Page Subtitle"
								required
							></v-text-field>
						</v-col>
						<v-col>
							<div class="editor">
								<editor-menu-bar :editor="editor" v-slot="{ commands, isActive }">
									<v-toolbar dense flat color="grey lighten-3">
										<v-btn icon text small @click="commands.undo">
											<v-icon>mdi-undo</v-icon>
										</v-btn>

										<v-btn icon text small @click="commands.redo">
											<v-icon>mdi-redo</v-icon>
										</v-btn>

										<v-btn icon text small :class="{ 'is-active': isActive.bold() }" @click="commands.bold">
											<v-icon>mdi-format-bold</v-icon>
										</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.italic() }"
											@click="commands.italic"
										>
											<v-icon>mdi-format-italic</v-icon>
										</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.underline() }"
											@click="commands.underline"
										>
											<v-icon>mdi-format-underline</v-icon>
										</v-btn>

										<v-btn icon text small :class="{ 'is-active': isActive.code() }" @click="commands.code">
											<v-icon>mdi-code-tags</v-icon>
										</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.paragraph() }"
											@click="commands.paragraph"
										>
											<v-icon>mdi-format-paragraph</v-icon>
										</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.heading({ level: 1 }) }"
											@click="commands.heading({ level: 1 })"
										>H1</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.heading({ level: 2 }) }"
											@click="commands.heading({ level: 2 })"
										>H2</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.heading({ level: 3 }) }"
											@click="commands.heading({ level: 3 })"
										>H3</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.bullet_list() }"
											@click="commands.bullet_list"
										>
											<v-icon>mdi-format-list-bulleted</v-icon>
										</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.ordered_list() }"
											@click="commands.ordered_list"
										>
											<v-icon>mdi-format-list-numbered</v-icon>
										</v-btn>

										<v-btn
											icon
											text
											small
											:class="{ 'is-active': isActive.blockquote() }"
											@click="commands.blockquote"
										>
											<v-icon>mdi-format-quote-open</v-icon>
										</v-btn>

										<v-btn icon text small @click="showImagePrompt(commands.image)">
											<v-icon>mdi-image</v-icon>
										</v-btn>
										<v-btn icon text small @click="commands.horizontal_rule">
											<v-icon>mdi-border-bottom-variant</v-icon>
										</v-btn>
									</v-toolbar>
								</editor-menu-bar>

								<editor-content class="editor__content" :editor="editor" />
							</div>
						</v-col>
						<v-card-actions>
							<v-spacer></v-spacer>
							<v-btn type="submit" dark color="green">Save</v-btn>
						</v-card-actions>
					</v-card>
				</v-form>
				<hr class="py-5" />
				<div class="export">
					<h1>HTML</h1>
					<pre><code>{{ html }}</code></pre>
					<h1>JSON</h1>
					<pre><code v-html="json"></code></pre>
				</div>
			</div>
		</div>

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
import Axios from "axios";
import Image from "../Image";
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
	Link,
	Strike,
	Underline,
	History
	// Image
} from "tiptap-extensions";
async function upload(file) {
	let formData = new FormData();
	formData.append("file", file);
	const headers = { "Content-Type": "multipart/form-data" };
	const response = await axios.post("/upload", formData, { headers: headers });
	return response.data.src;
}
export default {
	components: {
		EditorContent,
		EditorMenuBar
		// Icon
	},
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
					new Image(null, null, upload, chum)
				],
				content: ``,
				onInit: () => {},
				onUpdate: ({ getJSON, getHTML }) => {
					this.json = getJSON();
					this.html = getHTML();
					this.page.htmlcontent = this.html;
				}
      }),
      loading: true,
			json: "",
			html: "",
      page: {},
      sections: {},
			items: [
				{
					src: "/images/slide1.jpg",
					text: "TEAM FCAT"
				},
				{
					src: "/images/slide2.jpg",
					text: "Slide Text"
				},
				{
					src: "/images/slide3.jpg",
					text: "Slide Text"
				},
				{
					src: "/images/slide4.jpg",
					text: "Slide Text"
				}
			],
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
		this.getContent(1);
	},
	methods: {
		getContent(id) {
			axios.get("/get/page/content/" + id).then(({ data }) => {
				this.page = data.pagecontent;
				this.sections = data.sections;
				this.editor.htmlcontent = data.pagecontent.htmlcontent;
				this.editor.setContent(this.editor.htmlcontent);
				this.html = this.editor.getHTML();
				this.json = this.editor.getJSON();
				this.page.htmlcontent = this.html;
        this.page.jsoncontent = this.json;
        this.loading = false;
			});
		},
		submit() {
			axios.post("/post/savepage", this.page).then(response => {
				this.snackbar.color = "green";
				this.snackbar.text = response.data;
				this.snackbar.show = true;
				this.getContent(response.headers.page_id);
			});
		},
		showImagePrompt(command) {
			const src = prompt("Enter the url of your image here");
			if (src !== null) {
				command({ src });
			}
		},
	},
	setLinkUrl(command, url) {
		command({ href: url });
		// this.hideLinkMenu();
	},
	beforeDestroy() {
		// Always destroy your editor instance when it's no longer needed
		this.editor.destroy();
	}
};
</script>

<style lang="scss" scoped>
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
</style>
