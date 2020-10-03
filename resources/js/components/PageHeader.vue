<template>
	<div>
		<div id="pageheader">
			<!-- Page Heading/Breadcrumbs -->
			<v-breadcrumbs class="grey lighten-4" v-if="section">
				<v-breadcrumbs-item to="/">Home</v-breadcrumbs-item>
				<v-breadcrumbs-divider>
					<v-icon>mdi-chevron-right</v-icon>
				</v-breadcrumbs-divider>
				<v-breadcrumbs-item :to="section.link">{{section.tealTitle}}</v-breadcrumbs-item>
				<v-breadcrumbs-divider>
					<v-icon>mdi-chevron-right</v-icon>
				</v-breadcrumbs-divider>
				<v-breadcrumbs-item>{{title }}</v-breadcrumbs-item>
			</v-breadcrumbs>
		</div>
	</div>
</template>
<script>
export default {
  props: ["title", "subtitle", "section"],
};
</script>
