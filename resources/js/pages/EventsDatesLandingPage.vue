  <template>
	<div>
		<v-container v-if="loading">
			<h1>LOADING...</h1>
		</v-container>
		<v-container v-if="!loading">
			<h1 class="display-3 py-5">FCAT Calendar</h1>
			<!-- <v-btn @click="changeView()">changeView</v-btn> -->
			<FullCalendar :options="calendarOptions" />
			<v-dialog v-model="showEventInfo">
				<v-card>{{ this.eventInfo }}</v-card>
			</v-dialog>
		</v-container>
	</div>
</template>
<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import listPlugin from "@fullcalendar/list";
import googleCalendarPlugin from "@fullcalendar/google-calendar";
import interactionPlugin from "@fullcalendar/interaction";
import Axios from "axios";

export default {
	components: {
		FullCalendar, // make the <FullCalendar> tag available
	},
	data() {
		return {
			loading: true,
			eventInfo: "",
			showEventInfo: false,
			// googleCalendarApiKey: "empty",
			calendarOptions: {
				plugins: [
					dayGridPlugin,
					listPlugin,
					googleCalendarPlugin,
					interactionPlugin,
				],
				initialView: "listMonth",
				googleCalendarApiKey: "",
				eventSources: [
					{
						googleCalendarId:
							"c_2p3r9nfi70vb1iadb9ptbu13bc@group.calendar.google.com",
						color: "green", // an option!
						textColor: "white", // an option!
					},
					{
						googleCalendarId:
							"c_r3o3ucgkb81vhns43uco3mool0@group.calendar.google.com",
					},
				],
				views: {
					// listWeek: { buttonText: "list week" },
					today: { buttonText: "Show Today" },
					dayGridMonth: { buttonText: "Show Month" },
					listMonth: { buttonText: "List Month" },
					listYear: { buttonText: "List Year" },
				},
				headerToolbar: {
					left: "prev,next today",
					center: "title",
					right: "dayGridMonth,listMonth,listYear",
				},
				eventClick: function (info) {
					info.jsEvent.preventDefault(); // don't let the browser navigate
					alert("Event: " + info.event.title);
					var title = info.event.title;
					// console.log(title);
				},
				eventClick: function (pete) {
					pete.jsEvent.preventDefault(); // don't let the browser navigate
					// console.log(pete);
				},
			},
		};
	},
	created() {
		this.getGoogleKeys();
	},
	methods: {
		getGoogleKeys() {
			Axios.get("/googlekeys/calendar").then(({ data }) => {
        this.calendarOptions.googleCalendarApiKey = data.googleCalendarApiKey;
        this.loading = false;
			});
		},
		hello: function (arg) {
			console.log(arg);
		},
	},
};
</script>
<style scoped>
.fc .gcal-event .fc-list-event-dot {
	border: 5px solid #d837cb !important;
	background-color: aqua;
}
</style>
