<template>
	<div>
		<div v-if="loading" class="container pt-md-6rem">
			<v-progress-circular indeterminate teal></v-progress-circular>
		</div>
		<div v-if="!loading">
			<v-app-bar
				absolute
				elevate-on-scroll
				color="grey lighten-3"
				style="position: sticky; top: 64px;"
			>
				<v-toolbar-title>Remote Teaching &amp; Learning</v-toolbar-title>

				<v-spacer></v-spacer>
				<a href="#support">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp">Support</v-btn>
				</a>
				<a href="#safeguarding">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp">Safeguarding</v-btn>
				</a>
				<a href="#google">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp">Google</v-btn>
				</a>
				<a href="#microsoft">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp">Microsoft</v-btn>
				</a>
				<a href="#tutorials">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp">Webinars</v-btn>
				</a>
				<a href="#research">
					<v-btn text class="mr-2" v-if="this.$vuetify.breakpoint.mdAndUp">Research</v-btn>
				</a>
			</v-app-bar>

			<section class="rtl-banner pb-lg-10">
				<v-container class="pb-lg-10">
					<v-col cols="12" class="rtl-card elevation-10 p-5 rounded-xl">
						<h1 class="display-3">Remote Teaching &amp; Learning</h1>
						<p class="subtitle-1">
							Across the Trust there is constantly growing expertise in supporting young people with their learning
							through the use of technology. This expertise ranges from the Demonstrator School consortium
							which Hambleton leads on, to individuals within schools who have a wealth of expertise and
							experience to draw upon. Within this section of the intranet, there are some key contacts,
							supporting resources and documentation to aid effective remote teaching and learning.
						</p>
					</v-col>
				</v-container>
			</section>

			<section id="support" class="coreleads vh-rtl-100 pt-lg-5">
				<v-container>
					<v-row class="align-items-centerx">
						<v-col cols="12">
							<h1 class="text-h2">Core Leads - School Improvement Team</h1>
							<p class="text-body-1">
								Our Core Leads are there to support staff across the Trust with remote learning.
								They are available to share their subject and curriculum expertise with colleagues
								and assisting with remote learning is one of their priorities. Feel free to email them to
								access their support.
							</p>
						</v-col>
						<v-col cols="12" md="4" data-aos="flip-left" data-aos-duration="1500">
							<v-card class>
								<v-toolbar dark color="teal darken-4">
									<v-toolbar-title>
										<v-icon class="mr-2">fas fa-flask fa-fw</v-icon>Russ Bradshaw
									</v-toolbar-title>
								</v-toolbar>
								<v-card-title class="justify-center">
									<v-avatar size="150">
										<v-img src="/images/headshots/russ.png"></v-img>
									</v-avatar>
								</v-card-title>
								<v-card-title class="justify-center">Core Team Leader/Science</v-card-title>
								<v-card-text>
									<v-expansion-panels>
										<v-expansion-panel>
											<v-expansion-panel-header>About Russ</v-expansion-panel-header>
											<v-expansion-panel-content>
												Hi there, I oversee the core subjects English, maths and science. I have over 19
												years experience of teaching all three sciences and have degrees in biology and
												physics. I have written the entire KS2 science content for Seneca Learning and I’m
												an examiner for the AQA exam board. I am also an adviser for Ofqual. Please email
												me if you have any concerns or questions regarding Google applications and remote
												Seneca learning.
											</v-expansion-panel-content>
										</v-expansion-panel>
									</v-expansion-panels>
								</v-card-text>
								<v-card-actions>
									<v-spacer></v-spacer>
									<a href="mailto:russ.bradshaw@fcat.org.uk" target="_blank">
										<v-btn dark outlined color="teal darken-4">CONTACT RUSS</v-btn>
									</a>
								</v-card-actions>
							</v-card>
						</v-col>
						<v-col cols="12" md="4" data-aos="flip-left" data-aos-duration="2000">
							<v-card class>
								<v-toolbar dark color="grey darken-3">
									<v-toolbar-title>
										<v-icon class="mr-2">fas fa-book-reader fa-fw</v-icon>Estelle Bellamy
									</v-toolbar-title>
								</v-toolbar>
								<v-card-title class="justify-center">
									<v-avatar size="150">
										<v-img src="/images/headshots/estelle.png"></v-img>
									</v-avatar>
								</v-card-title>
								<v-card-title class="justify-center">English and Literacy</v-card-title>
								<v-card-text>
									<v-expansion-panels>
										<v-expansion-panel>
											<v-expansion-panel-header>About Estelle</v-expansion-panel-header>
											<v-expansion-panel-content>
												I have been a teacher in Blackpool for 24 years and have taught a range of A Levels
												and GCSEs: English Literature and English Language A Level, English GCSE,
												Media Studies A Level and GCSE, Film Studies A Level, General Studies A Level
												and Key Skills Communication Level 2 and 3 and have been an examiner and
												consultant for WJEC and EDEXCEL. I have also supported schools and colleagues
												as an SLE and worked closely with the Fylde Coast Teaching school to deliver
												leadership and literacy training. I am passionate about reading and literacy and have
												supported schools in their development of both. Please email me if you think I can
												help you with teaching English and Literacy remotely.
											</v-expansion-panel-content>
										</v-expansion-panel>
									</v-expansion-panels>
								</v-card-text>
								<v-card-actions>
									<v-spacer></v-spacer>
									<a href="mailto:estelle.bellamy@fcat.org.uk" target="_blank">
										<v-btn dark outlined color="grey darken-3">CONTACT ESTELLE</v-btn>
									</a>
								</v-card-actions>
							</v-card>
						</v-col>
						<v-col cols="12" md="4" data-aos="flip-left" data-aos-duration="2500">
							<v-card class>
								<v-toolbar dark color="grey darken-3">
									<v-toolbar-title>
										<v-icon class="mr-2">fas fa-square-root-alt fa-fw</v-icon>Catherine Farmar
									</v-toolbar-title>
								</v-toolbar>
								<v-card-title class="justify-center">
									<v-avatar size="150">
										<v-img src="/images/headshots/catherine.png"></v-img>
									</v-avatar>
								</v-card-title>
								<v-card-title class="justify-center">Mathematics</v-card-title>
								<v-card-text>
									<v-expansion-panels>
										<v-expansion-panel>
											<v-expansion-panel-header>About Catherine</v-expansion-panel-header>
											<v-expansion-panel-content>
												Hello! I am a mathematics teacher with over 20 years experience teaching KS3,
												GCSE, A-level Maths and Further Maths, and six years as Deputy Head of an all
												through (4-19) Free School. I have been a member of the Mathematical Association
												Council and hold the NCETM accreditation as a Professional Development Lead. I
												passionately believe that all pupils can do and enjoy mathematics, and I have used
												many different tools to make this happen. Please email me if you require any
												assistance or advice with developing your pupils’ remote learning in mathematics.
											</v-expansion-panel-content>
										</v-expansion-panel>
									</v-expansion-panels>
								</v-card-text>

								<v-card-actions>
									<v-spacer></v-spacer>
									<a href="mailto:catherine.farmar@fcat.org.uk" target="_blank">
										<v-btn dark outlined color="grey darken-3">CONTACT CATHERINE</v-btn>
									</a>
								</v-card-actions>
							</v-card>
						</v-col>
					</v-row>
				</v-container>
			</section>

			<section class="edtech">
				<v-container>
					<v-row class="align-items-center">
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h2">Demonstrator School</h1>
								<p class="text-body-1">
									Hambleton Primary, Ribblesdale High and Highfurlong schools are members of a
									consortium providing EdTech support across the Northwest. They have
									additional resources to support other schools and a myriad of useful tools,
									expertise and resources. Please contact them either direct of through the links
									below.
								</p>
								<a
									href="https://www.edtech.ribblesdale.org/demonstrator/edtech-demonstrator-events/"
									target="_blank"
								>
									<v-btn class="mb-5">Events</v-btn>
								</a>
								<a
									href="https://www.edtech.ribblesdale.org/demonstrator/edtech-pre-recorded-webinars/"
									target="_blank"
								>
									<v-btn class="mb-5">Webinars</v-btn>
								</a>
								<a href="https://www.edtech.ribblesdale.org/demonstrator/" target="_blank">
									<v-btn class="mb-5">About</v-btn>
								</a>
								<a href="https://edtech-demonstrator.lgfl.net/register-your-interest" target="_blank">
									<v-btn class="mb-5">Register your Interest in Receiving Support</v-btn>
								</a>
							</div>
						</div>
						<v-col lg="6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<img class="img-fluid rounded-circle" src="/images/rtl-support-image.jpg" alt />
							</div>
						</v-col>
					</v-row>
				</v-container>
			</section>

			<section id="safeguarding" class="grey lighten-4 vh-rtl-100">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<img class="img-fluid rounded-circle white" src="/images/rtl-safeguarding-1.jpg" alt />
							</div>
						</div>
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h1 teal--text">Safeguarding</h1>
								<p
									class="text-h6"
								>Safeguarding and child protection remains as important as ever, especially as the usual child protection systems are under increased pressure. And whether you’re teaching face-to-face or in a virtual classroom, it’s important that you take steps to ensure children are protected.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1
									class="text-h4"
								>FCAT Guidance: Live-streaming and video-conferencing: safeguarding principles and practice.</h1>
								<p class="text-body-1">
									Whether students are at home or in the classroom, safeguarding and welfare of students is
									paramount and takes precedence over all other considerations.
								</p>
								<a
									href="https://www.teamfcat.co.uk/storage/uploads/generaldocs/remotetl/Live%20lessons%20and%20video%20conferencing%20guidelines.pdf"
									target="_blank"
								>
									<v-btn large dark class="btn-block">Read the guidance here</v-btn>
								</a>
							</div>
						</div>
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1
									class="text-h4"
								>DfE Guidance: Safeguarding and remote education during coronavirus (COVID-19)</h1>
								<p
									class="text-body-1"
								>Understand how to follow safeguarding procedures when planning remote education strategies and teaching remotely during the coronavirus (COVID-19) outbreak.</p>
								<a
									href="https://www.gov.uk/guidance/safeguarding-and-remote-education-during-coronavirus-covid-19"
									target="_blank"
								>
									<v-btn large dark class="btn-block">Read the guidance here</v-btn>
								</a>
							</div>
						</div>
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h4">SWGfL Safe Remote Learning</h1>
								<p
									class="text-body-1"
								>Whether your school is closed or not, schools may be considering moving learning online. Here's the lowdown on organising classes online so that safeguards are adequately considered and are trouble-free.</p>
								<a href="https://swgfl.org.uk/resources/safe-remote-learning/" target="_blank">
									<v-btn large dark class="btn-block">Access the SWGfL resources here</v-btn>
								</a>
							</div>
						</div>
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h4">NSPCC Learning: Undertaking remote teaching safely</h1>
								<p
									class="text-body-1"
								>Understand how to follow safeguarding procedures when planning remote education strategies and teaching remotely during the coronavirus (COVID-19) outbreak.</p>
								<a
									href="https://learning.nspcc.org.uk/news/2020/march/undertaking-remote-teaching-safely"
									target="_blank"
								>
									<v-btn large dark class="btn-block">Read the guidance here</v-btn>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="google" dark class="green darken-2 white--text">
				<div class="container" data-aos="zoom-out-left" data-aos-duration="1500">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left">
							<div class="p-lg-5">
								<img
									class="img-fluid rounded-circle"
									src="images/google-training-img.jpg"
									alt="Google Teacher Centre Image"
								/>
							</div>
						</div>
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h1">Google Education</h1>
								<h1 class="text-h4 black--text">Google Teacher Centre</h1>
								<p class="text-body-1">
									Explore free technology training and resources for educators.
									<br />Learn basic and advanced skills across Google tools with free online training courses designed for educators of all levels.
								</p>
								<a href="https://edu.google.com/teacher-center" target="_blank">
									<v-btn large class="mt-5">Visit Google Teacher Centre</v-btn>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="microsoft" class="grey lighten-2 vh-rtl-100">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<img class="img-fluid rounded-circle" src="/images/rtl-microsoft-center.jpg" alt />
							</div>
						</div>
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h1">Microsoft Education</h1>
								<h1 class="blue--text text--darken-1">Making the transition to remote learning</h1>
								<p
									class="text-body-1"
								>As schools around the world respond to COVID-19, the need for remote learning tools is urgent. To make the transition to distance learning easier, we’ve created resources, training, and how-to guides that we hope will help schools, educators, students, and their families as they navigate remote learning.</p>
								<a href="https://www.microsoft.com/en-gb/education/remote-learning" target="_blank">
									<v-btn large class="mt-5 blue darken-1" dark>Visit Microsoft Education Remote Learning</v-btn>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="tutorials" class="grey darken-2 vh-rtl-100">
				<div class="container white--text">
					<div class="row align-items-center">
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<img class="img-fluid rounded-circle" src="/images/rtl-podcasts-yellow.jpg" alt />
							</div>
						</div>
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h1">Podcasts, Webinars &amp; YouTube Tutorials</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="container white--text">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<!-- <h1 class="text-h1">Loom</h1> -->
								<h1 class="text-h4">How to use Loom and record your lesson for Remote and Online learning</h1>
								<p
									class="text-body-1"
								>As more and more teachers are looking into remote learning and teaching. Here's a tutorial on using Loom to record your own lessons, screen-casts and presentations. It's easy to install, use and once you've recorded your first video, you will love the responses your students give you.</p>
							</div>
						</div>
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<iframe
									width="560"
									height="315"
									src="https://www.youtube-nocookie.com/embed/11pfvBNsXkA"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="container white--text">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<!-- <h1 class="text-h1">Loom</h1> -->
								<h1 class="text-h4">Remote teaching webinar: an introduction to the EEF planning framework</h1>
								<p
									class="text-body-1"
								>Roger Higgins (Director of Norwich Research School) and Dr Niki Kaiser (Network Research Lead, Norwich Research School; Science Content Specialist, EEF) present a webinar on remote teaching. Originally delivered to Suffolk and Norfolk SCITT ITT trainees, June 2020.</p>
							</div>
						</div>
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<iframe
									width="560"
									height="315"
									src="https://www.youtube-nocookie.com/embed/r-r02r3Lkxw"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="container white--text">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<!-- <h1 class="text-h1">Loom</h1> -->
								<h1 class="text-h4">How to Use Google Classroom 2020 - Tutorial for Beginners</h1>
								<p
									class="text-body-1"
								>This video tutorial will show you how to use Google Classroom for Beginners 2020. Google Classroom for Teachers is a fantastic way to help with remote or online learning. I will also show how Google Classroom for students works.</p>
							</div>
						</div>
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<iframe
									width="560"
									height="315"
									src="https://www.youtube-nocookie.com/embed/pl-tBjAM9g4"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="container white--text">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<!-- <h1 class="text-h1">Loom</h1> -->
								<h1 class="text-h4">Remote Learning with ClassDojo - Webinar 19/09/2020</h1>
								<p
									class="text-body-1"
								>Join Caitlin, a former teacher now on the ClassDojo team, as she shares how to transition your in-person community to a remote learning community where you can continue to foster relationships with students and families.</p>
							</div>
						</div>
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<iframe
									width="560"
									height="315"
									src="https://www.youtube-nocookie.com/embed/OAEkfrwtAOI"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="container white--text">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-1" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<!-- <h1 class="text-h1">Loom</h1> -->
								<h1 class="text-h4">What is Nearpod?</h1>
								<p
									class="text-body-1"
								>Get an overview of Nearpod, the platform that combines engaging media and formative assessments to make every lesson interactive.</p>
							</div>
						</div>
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<iframe
									width="560"
									height="315"
									src="https://www.youtube-nocookie.com/embed/cYVHSAqEeMM"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="research" app class="top-border--teal grey lighten-4 rtl-vh-100">
				<div class="container" data-aos="fade-in" data-aos-duration="1500">
					<div class="row align-items-center">
						<div class="col-lg-6 order-lg-2" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<img class="img-fluid rounded-circle" src="/images/rtl-research-1.jpg" alt />
							</div>
						</div>
						<div class="col-lg-6 order-lg-1" data-aos="zoom-in-down" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1 class="text-h1 teal--text">Research</h1>
								<p class="text-h4">EEF Remote Learning: Rapid Evidence Assessment</p>
								<p
									class="text-body-1"
								>This rapid evidence assessment aimed to investigate methods that schools could use to support remote learning during school closures caused by the 2020 coronavirus pandemic (Covid-19). The review sought to find the best evidence behind the wide array of approaches that schools might choose to use during the crisis.</p>
								<a
									href="https://educationendowmentfoundation.org.uk/public/files/Remote_Learning_Rapid_Evidence_Assessment.pdf"
									target="_blank"
								>
									<v-btn dark large>Read more about this research</v-btn>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<img class="img-fluid rounded-circle" src="/images/rtl-research-2.jpg" alt />
							</div>
						</div>
						<div class="col-lg-6" data-aos="zoom-out-left" data-aos-duration="1500">
							<div class="p-lg-5">
								<h1
									class="text-h4"
								>NFER: Schools' responses to Covid-19: pupil engagement in remote learning</h1>
								<p
									class="text-body-1"
								>On 20th March 2020, the British Government ordered schools to close to the majority of pupils. This was a pivotal moment as the majority of pupils transitioned to learning remotely from home and schools had to adapt rapidly to this new way of teaching. With the majority of pupils not expected to return to the classroom until the autumn, remote learning remains at the heart of how schools will need to continue to support pupils’ learning in the coming months.</p>
								<p
									class="text-body-1"
								>Given the potential impact of this extended period of remote learning, NFER undertook an independent assessment to see how engaged pupils are, and the factors that might be driving this, as well as how schools are providing remote learning support for pupils. The report is based on findings from a national survey of 1,233 senior leaders and 1,821 teachers in publicly-funded, mainstream primary and secondary schools in England. Responses between 7th and 17th May have been weighted by phase and free school meal (FSM) eligibility to provide a nationally representative picture.</p>
								<a
									href="https://www.nfer.ac.uk/schools-responses-to-covid-19-pupil-engagement-in-remote-learning/"
									target="_blank"
								>
									<v-btn dark large>Read more about this research</v-btn>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</template>
<script>
import Axios from "axios";
import moment from "moment";
import AOS from "aos";

export default {
	props: ["id", "sectionname"],
	watch: {
		// $route: function() {
		// 	this.getContent();
		// 	alert("ALERT");
		// }
	},
	data() {
		return {
			loading: true,
			section: {},
			pages: {},
			showEditHeaderButton: false,
			showEditCardOneButton: false,
			showEditCardTwoButton: false,
			showEditCardThreeButton: false,
			showEditCardDialog: false,
			editedCard: "",
			actioncardsColorsList: [
				"deep-purple",
				"purple",
				"pink",
				"indigo",
				"blue darken-4",
				"blue",
				"light-blue",
				"teal",
				"green",
				// "light-green accent-3",
				"yellow darken-2",
				"orange darken-2",
				"red",
				"grey"
			],
			actioncardsIconsList: [
				"fa-at",
				"fa-envelope-open-text",
				"fa-voicemail",
				"fa-phone",
				"far fa-address-book",
				"fa-award",
				"fa-balance-scale",
				"fa-balance-scale-left",
				"fa-balance-scale-right",
				"fa-ban",
				"fa-bell",
				"fa-book",
				"fa-bookmark",
				"fa-bug",
				"fa-building",
				"fa-calculator",
				"far fa-calendar-alt",
				"fa-car",
				"fa-cat",
				"far fa-chart-bar",
				"fa-chart-pie",
				"fa-check",
				"fa-chalkboard-teacher",
				"fa-child",
				"fa-clipboard-list",
				"far fa-comment",
				"fa-directions",
				"fa-exclamation",
				"fa-file-alt",
				"fa-cat",
				"fa-cat",
				"fa-cat",
				"fa-cat"
			],
			editWelcomeSubText: false,
			editTitle: false,
			typing: false
		};
	},
	created() {
		this.loading = true;
		AOS.init({
			debounceDelay: 50 // the delay on debounce used while resizing window (advanced)
		});
	},
	mounted() {
		this.scrollToTop();
		this.getContent();
	},
	methods: {
		getContent() {
			this.loading = true;
			this.scrollToTop();
			axios
				.get("/get/sectionlanding/" + this.$route.name)
				.then(({ data }) => {
					this.section = data;
				})
				.then(() => {
					this.getPages();
				});
		},
		getPages() {
			this.loading = true;
			axios.get("/get/listpages/" + this.section.id).then(({ data }) => {
				this.pages = data;
				setTimeout(() => {
					this.loading = false;
				}, 550);
			});
		},
		scrollToTop() {
			window.scrollTo(0, 0);
		},
		hideEditWelcomeSubText() {
			this.editWelcomeSubText = false;
		},
		hideEditTitle() {
			this.editTitle = false;
		},
		showEditCard(id) {
			console.log("BOOM! - " + id);
			if (id == 1) {
				this.showEditCardOneButton = true;
				this.showEditCardTwoButton = false;
				this.showEditCardThreeButton = false;
			}
			if (id == 2) {
				this.showEditCardOneButton = false;
				this.showEditCardTwoButton = true;
				this.showEditCardThreeButton = false;
			}
			if (id == 3) {
				this.showEditCardOneButton = false;
				this.showEditCardTwoButton = false;
				this.showEditCardThreeButton = true;
			}
			if (id == 0) {
				this.showEditCardOneButton = false;
				this.showEditCardTwoButton = false;
				this.showEditCardThreeButton = false;
			}
		},
		onEditCard(index) {
			console.log(this.section.actioncards[index]);
			this.showEditCardDialog = true;
			this.editedCard = this.section.actioncards[index];
			this.editedCard.index = index;
		},
		save(event) {
			if (!this.typing) {
				setTimeout(() => {
					console.log(event.key);
					this.typing = false;
					axios
						.put("/put/updateSectionLanding/" + this.section.id, this.section)
						.then(res => {
							if (res.status == 200) {
								console.log(res.status);
							}
						});
				}, 1750);
			}
			this.typing = true;
		},
		newPage() {
			console.log("NEW PAGE CLICK");
		},
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
		},
		cardtrans(id) {
			if (id == 1) {
				return "zoom-out-right";
			}
			if (id == 2) {
				return "zoom-in";
			}
			if (id == 3) {
				return "zoom-in-left";
			}
		}
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
		}
	}
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

.v-input input {
	color: teal !important;
}
.vh-rtl-100 {
	min-height: calc(100vh - 128px);
}
section:before {
	content: "";
	display: block;
	height: 100px;
}
section:after {
	content: "";
	display: block;
	height: 100px;
}
.rtl-banner {
	background-image: url("/images/rtl-banner-bg.png");
	background-repeat: repeat;
}
.rtl-card {
	background-image: radial-gradient(
		circle 827px at 47.3% 48%,
		rgba(255, 255, 255, 0.9) 0%,
		rgb(255, 255, 255, 0.8) 90%
	);
}
.coreleads {
	background-image: linear-gradient(
		109.6deg,
		rgba(5, 85, 84, 1) 11.2%,
		rgba(64, 224, 208, 1) 91.1%
	);
	color: whitesmoke;
}
.edtech {
	background-image: linear-gradient(
		89.9deg,
		rgba(255, 90, 109, 1) 2.6%,
		rgba(119, 76, 231, 1) 97.9%
	);
	color: black;
}
</style>
