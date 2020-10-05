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
				class="orange--text text-darken-2"
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
				class="orange--text text-darken-2"
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
				class="orange--text text-darken-2"
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
				class="orange--text text-darken-2"
				:class="{
          'is-active':getMarkAttrs('imageWidth').class == 'w400px',
          }"
				@click="commands.imageWidth({ class: 'w400px'})"
			>
				<v-icon class>mdi-image</v-icon>Medium
			</v-btn>

			<!-- <v-divider class="mx-4" inset vertical></v-divider> -->
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
	methods: {}
};
</script>
<style lang="scss" scoped>
.is-active {
	background-color: darkgrey !important;
}
</style>
