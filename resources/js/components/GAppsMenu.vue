<template>
	<div>
		<v-menu nudge-width="200" offset-y min-width="300px" bottom left close-on-content-click>
			<template v-slot:activator="{ on }">
				<v-btn icon v-on="on">
					<v-icon>mdi-apps</v-icon>
				</v-btn>
			</template>
			<v-card>
				<v-card-text>
					<v-row justify="space-around" class="text-center">
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white" @click.prevent="showCheckDetailsDialog">
								<v-avatar size="42">
									<v-img contain eager :src="avatar" alt="Account"></v-img>
								</v-avatar>
							</v-btn>
							<p class="pt-2 black--text">Account</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://mail.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img
											contain
											src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Gmail_Icon.svg"
											alt="GMail"
										></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">GMail</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://drive.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Drive_logo.svg" alt="Drive"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Drive</p>
						</v-col>
					</v-row>
					<v-row justify="space-around" class="text-center">
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://classroom.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google-Classroom_logo.svg" alt="Classroom"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Classroom</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://docs.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Docs_logo.svg" alt="Docs"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Docs</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://meet.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Sheets_logo.svg" alt="Sheets"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Sheets</p>
						</v-col>
					</v-row>
					<v-row justify="space-around" class="text-center">
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://slides.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Slides_logo.svg" alt="Slides"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Slides</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://calendar.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Calendar_icon.svg" alt="Calendar"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Calendar</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://chat.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Hangouts_Chat_icon.png" alt="Chat"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Chat</p>
						</v-col>
					</v-row>
					<v-row justify="space-around" class="text-center">
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://meet.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Hangouts_Meet_icon.png" alt="Meet"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Meet</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://forms.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Forms_logo.svg" alt="Forms"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Forms</p>
						</v-col>
						<v-col class="py-1">
							<v-btn elevation="0" fab small tile color="white">
								<a href="http://contacts.google.com" target="_blank">
									<v-avatar size="42" tile>
										<v-img contain eager src="/images/icons/Google_Contacts_icon.svg" alt="Contacts"></v-img>
									</v-avatar>
								</a>
							</v-btn>
							<p class="pt-2 black--text">Contacts</p>
						</v-col>
					</v-row>
				</v-card-text>
				<v-divider></v-divider>
				<v-card-actions>
					<v-spacer></v-spacer>
					<v-btn small text @click.prevent="logout">
						<v-icon class="mr-2">fa-sign-out-alt</v-icon>Log Out
					</v-btn>
				</v-card-actions>
			</v-card>
		</v-menu>
	</div>
</template>
<script>
export default {
	props: ["avatar"],
	methods: {
		showCheckDetailsDialog() {
			this.$emit("showCheckDetailsDialog");
		},
		logout() {
			this.$emit("logout");
		}
	}
};
</script>
