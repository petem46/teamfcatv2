<template>
	<v-container class="z2">
		<v-card class="z2" elevation="8" style="min-height: 400px;">
			<v-toolbar dark flat class="teal" src>
				<v-toolbar-title :id="section.id" class="text-uppercase text-h4 py-2">{{section.title}}</v-toolbar-title>
				<v-tooltip left>
					<template v-slot:activator="{ on, attrs }">
						<v-btn
							v-bind="attrs"
							v-on="on"
							small
							dark
							fab
							absolute
							bottom
							right
							color="green"
							:to="'/p2' + section.area.link + '/newpage'"
						>
							<v-icon small>fa fa-plus fa-fw</v-icon>
						</v-btn>
					</template>
					Add New Page
				</v-tooltip>
			</v-toolbar>
			<v-list two-line shaped class="grey lighten-5">
				<v-row>
					<v-col cols="12" md="6" v-for="page in section.page" :key="page.id">
						<v-list-item :to="'/p2' + section.area.link + '/' + page.slug">
							<v-list-item-avatar class="mr-3">
								<v-icon class="teal--text">fa-book-open</v-icon>
							</v-list-item-avatar>
							<v-list-item-content>
								<v-list-item-title v-html="page.title" class></v-list-item-title>
								<v-list-item-subtitle v-html="page.subtitle" class="text--secondary"></v-list-item-subtitle>
							</v-list-item-content>
							<v-list-item-action>
								<v-chip v-if="chipStatusShow(page)" small color="teal" dark>{{chipStatusText(page)}}</v-chip>
							</v-list-item-action>
						</v-list-item>
					</v-col>
				</v-row>
			</v-list>
		</v-card>
	</v-container>
</template>
<script>
import Axios from "axios";
import moment from "moment";
export default {
	props: ["section"],
	methods: {
		chipStatusShow(page) {
			var now = moment();
			var updatedAt = moment(page.updated_at);
			var createdAt = moment(page.created_at);
			if (moment(updatedAt).isAfter(moment(createdAt.add(5, "d")))) {
				return true;
			}
			if (moment(createdAt).isAfter(moment(now).subtract(7, "d"))) {
				return true;
			}
			return false;
		},
		chipStatusText(page) {
			var now = moment();
			var updatedAt = moment(page.updated_at);
			var createdAt = moment(page.created_at);
			if (moment(updatedAt).isAfter(moment(createdAt.add(5, "d")))) {
				return "Updated";
			}
			if (moment(createdAt).isAfter(moment(now).subtract(7, "d"))) {
				return "New";
			}
			return "";
		}
	}
};
</script>
