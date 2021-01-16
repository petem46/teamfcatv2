<template>
	<div>
		<section class="edtech">
			<v-container v-if="!loading">
				<v-row class="align-items-top">
					<v-col lg="6" data-aos="zoom-out-left" data-aos-duration="1500">
						<div class="p-lg-5">
							<img
								class="img-fluid rounded-circle"
								src="/images/rtl-support-image.jpg"
								alt
							/>
						</div>
					</v-col>
					<div
						class="col-lg-6"
						data-aos="zoom-out-left"
						data-aos-duration="1500"
					>
						<div
							class="p-lg-5"
							v-if="!editing"
							@mouseover="showEditHeaderButton = true"
							@mouseleave="showEditHeaderButton = false"
						>
							<span v-html="this.currentcontent.htmlcontent"></span>
							<v-btn
								dark
								fab
								absolute
								top
								right
								v-if="showEditHeaderButton && !editing && $canEdit()"
								@click="editing = true"
								>EDIT</v-btn
							>
						</div>
						<div class="p-lg-5" v-if="editing" v-click-outside="onClickOutside">
							<editor-menu-bubble
								class="menububble"
								:editor="editor"
								@hide="hideLinkMenu"
								v-slot="{ commands, isActive, getMarkAttrs, menu }"
							>
								<div
									class="menububble"
									:class="{ 'is-active': menu.isActive }"
									:style="`left: ${menu.left}px; bottom: ${menu.bottom}px;`"
								>
									<v-btn
										icon
										dark
										text
										small
										class="white--text"
										:class="{ 'is-active yellow--text': isActive.bold() }"
										@click="commands.bold"
									>
										<v-icon>mdi-format-bold</v-icon>
									</v-btn>
									<v-btn
										icon
										dark
										text
										small
										class="white--text"
										:class="{ 'is-active yellow--text': isActive.italic() }"
										@click="commands.italic"
									>
										<v-icon>mdi-format-italic</v-icon>
									</v-btn>
									<v-btn
										icon
										dark
										text
										small
										class="menububble__button"
										:class="{ 'is-active yellow--text': isActive.underline() }"
										@click="commands.underline"
									>
										<v-icon>mdi-format-underline</v-icon>
									</v-btn>
									<v-divider
										class="mx-2 white--text"
										inset
										vertical
									></v-divider>
									<form
										class="menububble__form"
										v-if="linkMenuIsActive"
										@submit.prevent="setLinkUrl(commands.link, linkUrl)"
									>
										<input
											class="menububble__input"
											type="text"
											v-model="linkUrl"
											placeholder="https://"
											ref="linkInput"
											@keydown.esc="hideLinkMenu"
										/>
										<v-btn
											dark
											text
											small
											class="menububble__button"
											@click="setLinkUrl(commands.link, null)"
										>
											<v-icon>mdi-link-off</v-icon>
										</v-btn>
									</form>

									<template v-else>
										<v-btn
											dark
											text
											small
											class="menububble__button"
											:class="{ 'is-active': isActive.link() }"
											@click="showLinkMenu(getMarkAttrs('link'))"
										>
											<span>{{
												isActive.link() ? "Update Link" : "Add Link"
											}}</span>
											<v-icon>mdi-link-plus</v-icon>
										</v-btn>
									</template>
									<v-divider
										class="mx-2 white--text"
										inset
										vertical
									></v-divider>
									<v-btn
										icon
										text
										small
										class="teal--text px-0"
										:class="{
											'is-active':
												getMarkAttrs('colortext').class == 'teal--text',
										}"
										@click="
											setTealText(
												commands.colortext,
												getMarkAttrs('colortext').class
											)
										"
									>
										<v-icon>mdi-format-color-text</v-icon>
									</v-btn>
									<v-btn
										icon
										text
										small
										class="red--text px-0"
										:class="{
											'is-active':
												getMarkAttrs('colortext').class == 'red--text',
										}"
										@click="
											setRedText(
												commands.colortext,
												getMarkAttrs('colortext').class
											)
										"
									>
										<v-icon>mdi-format-color-text</v-icon>
									</v-btn>
									<v-btn
										icon
										text
										small
										class="orange--text text-darken-2 px-0"
										:class="{
											'is-active':
												getMarkAttrs('colortext').class ==
												'orange--text text--darken2',
										}"
										@click="
											setOrangeText(
												commands.colortext,
												getMarkAttrs('colortext').class
											)
										"
									>
										<v-icon class>mdi-format-color-text</v-icon>
									</v-btn>
									<v-btn
										icon
										text
										small
										class="grey--text text-darken-2 px-0"
										:class="{
											'is-active':
												getMarkAttrs('colortext').class ==
												'grey--text text--darken2',
										}"
										@click="
											setGreyText(
												commands.colortext,
												getMarkAttrs('colortext').class
											)
										"
									>
										<v-icon class>mdi-format-color-text</v-icon>
									</v-btn>
									<v-divider
										class="mx-2 white--text"
										inset
										vertical
									></v-divider>
									<v-btn
										text
										small
										class="white--text"
										:class="{
											'is-active yellow--text':
												getMarkAttrs('textH').class == 'text-h2',
										}"
										@click="
											commands.textH({ class: 'text-h2' });
											commands.heading({ level: 1 });
										"
										>Heading 1
									</v-btn>

									<v-btn
										text
										small
										class="white--text"
										:class="{
											'is-active yellow--text':
												getMarkAttrs('textH').class == 'text-h6',
										}"
										@click="commands.textH({ class: 'text-h6' })"
										>Subtext
									</v-btn>
									<v-divider
										class="mx-2 white--text"
										inset
										vertical
									></v-divider>
									<v-btn
										icon
										text
										small
										class="white--text"
										:class="{
											'yellow--text is-active': isActive.bullet_list(),
										}"
										@click="commands.bullet_list"
									>
										<v-icon>mdi-format-list-bulleted</v-icon>
									</v-btn>
									<v-btn
										icon
										text
										small
										class="white--text"
										:class="{
											'yellow--text is-active': isActive.ordered_list(),
										}"
										@click="commands.ordered_list"
									>
										<v-icon>mdi-format-list-numbered</v-icon>
									</v-btn>
								</div>
							</editor-menu-bubble>

							<editor-content
								v-if="!loading"
								class="editor__content"
								:editor="editor"
							/>
						</div>
					</div>
				</v-row>
			</v-container>
		</section>
	</div>
</template>
<script>
// Import the tiptap editor
import ColorText from "../tiptap-ext/ColorText";
import TextH from "../tiptap-ext/TextH";
import ImageWidth from "../tiptap-ext/ImageWidth";
// import Link from "../tiptap-ext/Link";
import Icon from "../components/TipTapIcon";

import { Editor, EditorContent, EditorMenuBar, EditorMenuBubble } from "tiptap";
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
	History,
	Image,
} from "tiptap-extensions";

import Axios from "axios";
import moment from "moment";
import AOS from "aos";

export default {
	components: {
		EditorContent,
		EditorMenuBubble,
		Icon,
	},
	watch: {
		// $route: function() {
		// 	this.getContent();
		// 	alert("ALERT");
		// }
	},
	props: ["updates"],
	data() {
		return {
      loading: true,
      currentcontent: this.updates,
			editing: true,
			showEditHeaderButton: false,
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
					new ImageWidth(),
				],
				content: this.updates.htmlcontent,
				onInit: () => {},
				onUpdate: ({ getJSON, getHTML }) => {
					this.currentcontent.htmlcontent = getHTML();
					this.currentcontent.jsoncontent = getJSON();
					this.editor.content = this.currentcontent.html;
				},
			}),
			linkUrl: null,
			linkMenuIsActive: false,
			// html: this.updates.htmlcontent,
			// json: this.updates.jsoncontent,
		};
	},
	created() {
		this.loading = false;
		AOS.init({
			debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
		});
	},
	mounted() {},
	methods: {
		savePage() {
			console.log("SAVING...");
			console.log(this.currentcontent);
      axios.post("/post/saveRTLUpdates", this.currentcontent).then(() => {})
      // .then(function (res) {
			// 	if (res.status == 200) {
			// 		console.log(res.status);
			// 	}
			// });
		},
		setRedText(command, currentClass) {
			if (currentClass == "red--text") {
				command({ class: "" });
			} else {
				command({ class: "red--text" });
			}
		},
		setTealText(command, currentClass) {
			if (currentClass == "teal--text") {
				command({ class: "" });
			} else {
				command({ class: "teal--text" });
			}
		},
		setOrangeText(command, currentClass) {
			if (currentClass == "orange--text") {
				command({ class: "" });
			} else {
				command({ class: "orange--text" });
			}
		},
		setGreyText(command, currentClass) {
			if (currentClass == "grey--text") {
				command({ class: "" });
			} else {
				command({ class: "grey--text" });
			}
		},
		showLinkMenu(attrs) {
			this.linkUrl = attrs.href;
			this.linkMenuIsActive = true;
			this.$nextTick(() => {
				this.$refs.linkInput.focus();
			});
		},
		hideLinkMenu() {
			this.linkUrl = null;
			this.linkMenuIsActive = false;
		},
		setLinkUrl(command, url) {
			command({ href: url });
			this.hideLinkMenu();
		},
		onClickOutside() {
			this.editing = false;
			this.savePage();
		},
		save(event) {
			if (!this.typing) {
				setTimeout(() => {
					this.typing = false;
					axios
						.put("/put/updateSectionLanding/" + this.section.id, this.section)
						.then((res) => {
							if (res.status == 200) {
								console.log(res.status);
							}
						});
				}, 1750);
			}
			this.typing = true;
		},
	},
	beforeDestroy() {
		this.editor.destroy();
	},
	computed: {
		getBtnSize() {
			if (this.$vuetify.breakpoint.lgAndUp) {
				return "x-large";
			}
			if (this.$vuetify.breakpoint.mdAndUp) {
				return "large";
			}
			if (this.$vuetify.breakpoint.smAndDown) {
				return "small";
			}
		},
		hint() {
			if (this.typing == true) {
				return "Typing...";
			}
			if (this.typing == false) {
				return "Saved";
			}
		},
	},
};
</script>
<style lang="scss" scoped>
.z1 {
	z-index: 1;
}
.z2 {
	z-index: 2;
}
.mt-n16,
.my-n16 {
	margin-top: -25rem !important;
}
.position-relative {
	position: relative !important;
}

.shape:not([class*="shape-blur"]) {
	overflow: hidden;
}
.shape-bottom {
	right: 0;
	bottom: 0;
	left: 0;
}
.shape {
	position: absolute;
	pointer-events: none;
}
.text-dark {
	color: #009688 !important;
}

.shape:not([class*="shape-blur"]) > * {
	-webkit-transform: scale(2);
	transform: scale(2);
}
.shape-fluid-x > * {
	width: 100%;
	height: auto;
}
.shape-bottom > * {
	-webkit-transform-origin: top center;
	transform-origin: top center;
}
.shape > * {
	display: block;
}
svg {
	overflow: hidden;
	vertical-align: middle;
}
.p-lg-5 >>> h1 {
	box-sizing: border-box;
	font-weight: 300;
	font-family: Roboto, sans-serif !important;
	font-size: 3.75rem !important;
	letter-spacing: -0.0083333333em !important;
	line-height: 4.6rem;
}
</style>
