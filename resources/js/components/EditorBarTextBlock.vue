<template>
	<editor-menu-bar :editor="editor" v-slot="{ commands, getMarkAttrs, isActive }">
		<v-toolbar flat color="grey lighten-3">
			<v-row>
				<v-col cols="12">
					<v-btn icon text small @click="commands.undo">
						<v-icon>mdi-undo</v-icon>
					</v-btn>
					<v-btn icon text small @click="commands.redo">
						<v-icon>mdi-redo</v-icon>
					</v-btn>
					<v-divider class="mx-2" inset vertical></v-divider>
					<v-btn icon text small :class="{ 'is-active': isActive.bold() }" @click="commands.bold">
						<v-icon>mdi-format-bold</v-icon>
					</v-btn>
					<v-btn icon text small :class="{ 'is-active': isActive.italic() }" @click="commands.italic">
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
					<v-divider class="mx-2" inset vertical></v-divider>
					<v-btn
						icon
						text
						small
						class="teal--text px-0"
						:class="{'is-active':getMarkAttrs('colortext').class == 'teal--text'}"
						@click="setTealText(commands.colortext, getMarkAttrs('colortext').class)"
					>
						<v-icon>mdi-format-color-text</v-icon>
					</v-btn>
					<v-btn
						icon
						text
						small
						class="red--text px-0"
						:class="{'is-active':getMarkAttrs('colortext').class == 'red--text'}"
						@click="setRedText(commands.colortext, getMarkAttrs('colortext').class)"
					>
						<v-icon>mdi-format-color-text</v-icon>
					</v-btn>
					<v-btn
						icon
						text
						small
						class="orange--text text-darken-2 px-0"
						:class="{
          'is-active':getMarkAttrs('colortext').class == 'orange--text text--darken2',
          }"
						@click="setOrangeText(commands.colortext, getMarkAttrs('colortext').class)"
					>
						<v-icon class>mdi-format-color-text</v-icon>
					</v-btn>
					<v-btn
						icon
						text
						small
						class="grey--text text-darken-2 px-0"
						:class="{
          'is-active':getMarkAttrs('colortext').class == 'grey--text text--darken2',
          }"
						@click="setGreyText(commands.colortext, getMarkAttrs('colortext').class)"
					>
						<v-icon class>mdi-format-color-text</v-icon>
					</v-btn>
					<v-divider class="mx-2" inset vertical></v-divider>
					<v-btn
						icon
						text
						small
						class="px-0"
						:class="{ 'is-active': isActive.textH({class: 'text-h5'}) }"
						@click="commands.textH({ class: 'text-h5'})"
					>
						<v-icon v-if="!isActive.textH({class: 'text-h5'})">mdi-format-font-size-increase</v-icon>
						<v-icon v-if="isActive.textH({class: 'text-h5'})">mdi-format-font-size-decrease</v-icon>
					</v-btn>

					<v-btn
						text
						small
						class="px-0"
						:class="{ 'is-active': isActive.heading({ level: 3 }) }"
						@click="commands.heading({ level: 3 })"
					>Heading</v-btn>
					<!-- <v-btn
						text
						small
						class="px-0"
						:class="{ 'is-active': isActive.heading({ level: 2 }) }"
						@click="commands.heading({ level: 2 })"
					>Heading 2</v-btn>-->

					<v-divider class="mx-2" inset vertical></v-divider>
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
					<v-spacer></v-spacer>
					<!-- <v-btn icon text small @click="commands.link({ href: 'www.google.com'})">
						<v-icon class>mdi-link-plus</v-icon>
					</v-btn>-->

					<v-spacer></v-spacer>

					<v-btn
						tile
						text
						small
						:class="{'is-active':getMarkAttrs('imageWidth').class == 'w100',
          }"
						@click="commands.imageWidth({ class: 'w100'})"
					>
						<v-icon class>mdi-image</v-icon>100%
					</v-btn>

					<v-btn
						tile
						text
						small
						:class="{
          'is-active':getMarkAttrs('imageWidth').class == 'w50',
          }"
						@click="commands.imageWidth({ class: 'w50'})"
					>
						<v-icon class>mdi-image</v-icon>50%
					</v-btn>

					<v-btn
						tile
						text
						small
						:class="{
          'is-active':getMarkAttrs('imageWidth').class == 'w200px',
          }"
						@click="commands.imageWidth({ class: 'w200px'})"
					>
						<v-icon class>mdi-image</v-icon>Small
					</v-btn>

					<v-btn
						tile
						text
						small
						:class="{
          'is-active':getMarkAttrs('imageWidth').class == 'w400px',
          }"
						@click="commands.imageWidth({ class: 'w400px'})"
					>
						<v-icon class>mdi-image</v-icon>Medium
					</v-btn>
				</v-col>
			</v-row>
		</v-toolbar>
	</editor-menu-bar>
</template>
<script>
import { Editor, EditorContent, EditorMenuBar } from "tiptap";

export default {
	components: {
		EditorContent,
		EditorMenuBar
	},

	props: ["editor"],
	methods: {
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
		}
	}
};
</script>
<style lang="scss" scoped>
.is-active {
	background-color: darkgrey !important;
}
</style>
