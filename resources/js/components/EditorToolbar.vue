<template>
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
</template>
<script>
import Image from "../Image";
import { Editor, EditorContent, EditorMenuBar } from "tiptap";
export default {
  props: ['editor'],
}
</script>
