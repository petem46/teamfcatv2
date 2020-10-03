<template>
	<editor-menu-bar :editor="editor" v-slot="{ commands, getMarkAttrs, isActive }">
		<v-toolbar dense flat color="grey lighten-3">
			<v-btn icon text small @click="commands.undo">
				<v-icon>mdi-undo</v-icon>
			</v-btn>

			<v-btn icon text small @click="commands.redo">
				<v-icon>mdi-redo</v-icon>
			</v-btn>

			<v-divider class="mx-4" inset vertical></v-divider>

			<v-btn
				tile
        text
        small
        class="teal--text"
				:class='{"is-active":getMarkAttrs("colortext").class == "teal--text"}'
				@click="commands.colortext({ class: 'teal--text'})"
			>
				<v-icon>mdi-format-color-text</v-icon>
			</v-btn>

			<v-btn
				tile
        text
        small
        class="red--text"
				:class='{"is-active":getMarkAttrs("colortext").class == "red--text"}'
        @click="commands.colortext({ class: 'red--text'})"
			>
				<v-icon>mdi-format-color-text</v-icon>
			</v-btn>

			<v-btn
				tile
        text
        small
        class="orange--text text-darken-2"
				:class='{
          "is-active":getMarkAttrs("colortext").class == "orange--text text--darken2",
          }'
				@click="commands.colortext({ class: 'orange--text text--darken2'})"
			>
				<v-icon class="">mdi-format-color-text</v-icon>
			</v-btn>


			<v-divider class="mx-4" inset vertical></v-divider>

			<!-- <v-btn
				text
				small
				:class="{ 'is-active': isActive.heading({ level: 1 }) }"
				@click="commands.heading({ level: 1 })"
			>Heading 1</v-btn> -->

			<v-btn
				text
				small
				:class="{ 'is-active': isActive.heading({ level: 2 }) }"
				@click="commands.heading({ level: 2 })"
			>Heading 2</v-btn>

			<v-btn
				text
				small
				:class="{ 'is-active': isActive.heading({ level: 3 }) }"
				@click="commands.heading({ level: 3 })"
			>Heading 3</v-btn>
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

	props: ["editor"]
};
</script>
<style lang="scss" scoped>
.is-active {
	background-color: grey !important;
	color: white !important;
}
</style>
