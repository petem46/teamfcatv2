<template>
	<div
		id="pageview"
		style="
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
background: url('/images/bady-qb-hxi_yRxODNc-unsplash.jpg') ;"
	>
		<v-container class="xtop-border--teal grey lighten-5" id="top">
			<page-header
				v-if="!loading"
				:title="page.title"
				:subtitle="page.subtitle"
				:section="this.page.section"
			/>
			<!-- Content Row -->
			<div class="row">
				<!-- Sidebar Column -->
				<div v-if="!loading" class="col-lg-3 mb-4 order-md-2 order-2">
					<page-side-bar :sidemenuitems="sidemenuitems" :showEdit="showEdit" @showEdit="showEditMethod" />
				</div>
				<!-- Content Column -->
				<div v-if="!loading" class="col-lg-9 mb-4 order-md-1 order-1">
					<page-content v-if="!showEdit" :page="page"></page-content>

					<div v-if="showEdit" fluid app class="container px-10">
						<v-card>
							<v-toolbar dark color="teal">
								<v-toolbar-title class="teal white--text">EDIT CONTENT</v-toolbar-title>
								<v-spacer></v-spacer>
								<v-toolbar-items>
									<v-btn dark v-if="showEdit" text @click="submit">Save</v-btn>
								</v-toolbar-items>
							</v-toolbar>
							<v-form @submit.prevent="submit" enctype="multipart/form-data">
								<v-col>
									<v-text-field
										hide-details="auto"
										outlined
										v-model="page.title"
										label="Page Title"
										required
									></v-text-field>
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
								<v-card-actions>
									<v-spacer></v-spacer>
									<v-btn @click="scrollToTop(); showEditMethod();" dark color="grey">Close</v-btn>
									<v-btn type="submit" dark color="green">Save</v-btn>
								</v-card-actions>
							</v-form>
						</v-card>
						<hr class="py-5" />
						<div class="export">
							<h1>HTML</h1>
							<pre><code>{{ html }}</code></pre>
							<h1>JSON</h1>
							<pre><code v-html="json"></code></pre>
						</div>
					</div>
					<v-btn color="pink" class="mb-5" absolute dark bottom right fab>
						<v-icon>mdi-plus</v-icon>
					</v-btn>
				</div>
			</div>
			<!-- /.row -->
		</v-container>

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
async function chum() {
}
async function upload(file) {
  section = this.page.section.name;
	let formData = new FormData();
	formData.append("file", file);
	formData.append("section", section);
	const headers = { "Content-Type": "multipart/form-data" };
	const response = await axios.post("/upload", formData, { headers: headers });
	return response.data.src;
}
export default {
	props: ["slug"],
	watch: {
		$route: function() {
			this.getContent();
		},
		page: function() {
			console.log("Page Edited");
		}
	},
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
					// this.json = getJSON();
					// this.html = getHTML();
					// this.page.htmlcontent = this.html;
				}
			}),
			loading: true,
			showEdit: false,
			json: "",
			html: "",
			page: {},
			sections: {},
			sidemenuitems: {},
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
	},
	methods: {
		getContent() {
			this.loading = true;
			axios.get("/get/page/content/" + this.slug).then(({ data }) => {
				this.page = data.pagecontent;
				this.sections = data.sections;
				this.sidemenuitems = data.sidemenuitems;
				this.editor.htmlcontent = data.pagecontent.htmlcontent;
				this.editor.setContent(this.editor.htmlcontent);
				this.html = this.editor.getHTML();
				this.json = this.editor.getJSON();
				this.page.htmlcontent = this.html;
				this.page.jsoncontent = this.json;
				this.scrollToTop();
				setTimeout(() => {
					this.loading = false;
				}, 500);
			});
		},
		submit() {
			axios.post("/post/savepage", this.page).then(response => {
				// console.log(response);
				this.showEditMethod();
				this.scrollToTop();
				this.snackbar.color = "green";
				this.snackbar.text = response.data;
				this.snackbar.show = true;
				this.getContent(response.headers.page_id);
			});
		},
		showEditMethod() {
			if (this.showEdit == true) {
				this.showEdit = false;
			} else {
				this.showEdit = true;
			}
		},
		showImagePrompt(command) {
			const src = prompt("Enter the url of your image here");
			if (src !== null) {
				command({ src });
			}
		},
		boom() {
			console.log("BOOM!");
		},
		gotoPage(id) {
			this.$router.push("/viewpage/" + this.page_id);
		},
		scrollToTop() {
			window.scrollTo(0, 0);
		}
	},
	setLinkUrl(command, url) {
		command({ href: url });
		// this.hideLinkMenu();
	},
	beforeDestroy() {
		// Always destroy your editor instance when it's no longer needed
		this.editor.destroy();
	},
	beforeRouteLeave(to, from, next) {
		console.log("beforeRouteLeave");
		next();
	},
	beforeRouteUpdate(to, from, next) {
		console.log("beforeRouteUpdate");
		next();
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
