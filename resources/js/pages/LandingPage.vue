<template>
	<div>
		<div v-if="loading" class="container pt-md-6rem">
			<v-progress-circular indeterminate teal></v-progress-circular>
		</div>
		<div v-if="!loading">
			<section>
				<div
					class="container pt-md-6rem"
					@mouseover="showEditHeaderButton = true"
					@mouseleave="showEditHeaderButton = false"
				>
					<v-row>
						<v-col
							data-aos="zoom-out-left"
							data-aos-duration="1200"
							cols="12"
							lg="6"
							class="d=flex align-center order-md-1 order-2"
							@dblclick="editTitle = true"
						>
							<h1 class="text-h3 py-0 align-center-md">
								{{ area.title }}
								<span class="teal--text">{{ area.tealTitle }}</span>
							</h1>
							<h2 class="text-h4 text-subtitle py-0 align-center-md">
								{{ area.subTitle }}
							</h2>
							<p
								v-if="!editWelcomeSubText"
								class="lead grey--text text-subtitle text-center text-md-left"
								style="white-space: pre-line !important"
							>
								{{ area.welcomeSubText }}
							</p>
							<v-row>
								<section
									cols="12"
									lg="4"
									v-for="button in area.buttons"
									:key="button.id"
								>
									<v-col v-if="button.show == 'show'">
										<a :href="button.link">
											<v-btn
												dark
												:class="button.color + ' v-size--' + getBtnSize"
												class="btn-block"
											>
												<v-icon class="mr-2">{{ button.icon }}</v-icon>
												{{ button.text }}
											</v-btn>
										</a>
									</v-col>
								</section>
							</v-row>
						</v-col>
						<v-col cols="12" lg="6" class="order-md-2 order-1">
							<v-btn
								dark
								fab
								absolute
								top
								right
								v-if="showEditHeaderButton && $canEdit()"
								@click="editTitle = true"
								>EDIT</v-btn
							>
							<v-img
								data-aos="zoom-in"
								data-aos-duration="1200"
								height="350"
								contain
								:src="area.landingImage"
							></v-img>
							<div class="text-right">
								<!-- <div v-html="area.landingImageCaption"></div> -->
							</div>
						</v-col>
					</v-row>
				</div>
				<covid-ticker v-if="area.name === 'covid'"></covid-ticker>

				<v-dialog v-model="editTitle">
					<v-card>
						<v-toolbar color="teal" dark>
							<v-toolbar-title>Edit Content</v-toolbar-title>
							<v-spacer></v-spacer>
							<v-btn text @click="editTitle = false">Close</v-btn>
						</v-toolbar>
						<v-container fluid pt-3>
							<v-row>
								<v-col cols="12" sm="6">
									<v-text-field
										class="pb-3"
										v-model="area.title"
										@keyup="save"
										outlined
										label="Title Text"
										color="teal"
										:hint="hint"
										placeholder="Text Entered Here Will be Black"
									></v-text-field>
								</v-col>
								<v-col cols="12" sm="6">
									<v-text-field
										class="pb-3"
										style="color: teal !important"
										v-model="area.tealTitle"
										@keyup="save"
										outlined
										label="Teal Text Title"
										color="teal"
										:hint="hint"
										placeholder="Text Entered Here Will be Teal"
									></v-text-field>
								</v-col>
							</v-row>
							<v-row>
								<v-col cols="12" sm="12">
									<v-text-field
										class="pb-3"
										v-model="area.subTitle"
										@keyup="save"
										outlined
										label="Sub Title Text"
										:hint="hint"
										placeholder="Enter Sub Title If Needed"
										color="teal"
									></v-text-field>
								</v-col>
							</v-row>
							<v-textarea
								class="pb-3"
								color="teal"
								v-model="area.welcomeSubText"
								@keyup="save"
								label="Welcome Text"
								outlined
								:hint="hint"
							></v-textarea>

							<v-row>
								<v-col cols="12">
									<v-text-field
										class="pb-3 mb-3"
										color="teal"
										@keyup="save"
										@click="save"
										label="Banner Image"
										value=" "
										outlined
										:hint="hint"
										hidden
									>
										<template v-slot:prepend-inner>
											<v-hover v-slot="{ hover }">
												<v-img
													contain
													:src="area.landingImage"
													@change="save"
													width="450"
													class="pb-3"
												>
													<v-expand-transition>
														<div
															@click="onShowFileManager('landingImage')"
															v-if="hover"
															class="d-flex transition-fast-in-fast-out teal lighten-2 v-card--reveal white--text"
															style="height: 100%"
														>
															CLICK TO CHANGE
														</div>
													</v-expand-transition>
												</v-img>
											</v-hover>
										</template>
										<template v-slot:default>
											<v-col cols="1"></v-col>
										</template>
									</v-text-field>
								</v-col>
							</v-row>
							<v-row>
								<v-col
									cols="12"
									lg="4"
									v-for="button in area.buttons"
									:key="button.id"
									:to="button.link"
								>
									<v-card>
										<v-toolbar dense :color="button.color" dark>
											<v-toolbar-title
												>Edit Button {{ button.id }}</v-toolbar-title
											>
										</v-toolbar>
										<v-container fluid pt-3>
											<v-card-actions>
												<v-row align="center" justify="center">
													<v-btn-toggle
														mandatory
														v-model="button.show"
														tile
														:color="button.color"
														group
														@change="save"
													>
														<v-btn value="hide">Hide Button</v-btn>
														<v-btn value="show">Show Button</v-btn>
													</v-btn-toggle>
												</v-row>
											</v-card-actions>
											<v-divider></v-divider>
											<v-select
												class="pb-3"
												:items="actioncardsColorsList"
												v-model="button.color"
												@keyup="save"
												@change="save"
												outlined
												label="Card Colour"
												:color="button.color"
											>
												<template slot="item" slot-scope="data">
													<v-icon class="mr-3" :color="data.item"
														>fa-square</v-icon
													>
													<span class="cb-item">{{ data.item }}</span>
												</template>
												<v-icon
													slot="prepend"
													class="mx-2"
													:color="button.color"
													>fa-square fa-fw</v-icon
												>
												<template v-slot:append-outer>
													<v-tooltip bottom>
														<template v-slot:activator="{ on }">
															<v-icon
																slot="append-outer"
																v-on="on"
																class="mx-2"
																color="grey lighten-2"
																>fa-info-circle fa-fw</v-icon
															> </template
														>This option sets the color for the button
													</v-tooltip>
												</template>
											</v-select>
											<v-text-field
												@keyup="save"
												:hint="hint"
												outlined
												color="teal"
												v-model="button.text"
												label="Button Text"
											>
												<v-icon
													slot="prepend"
													class="mx-2"
													:color="button.color"
													>fa-edit fa-fw</v-icon
												>
											</v-text-field>
											<v-select
												class="pb-3"
												:items="actioncardsIconsList"
												v-model="button.icon"
												@keyup="save"
												@change="save"
												outlined
												label="Card Icon"
												:color="button.color"
											>
												<template slot="item" slot-scope="data">
													<v-icon class="mr-3" :color="button.color"
														>{{ data.item }} fa-fw</v-icon
													>
													<span class="cb-item">{{ data.item }}</span>
												</template>
												<v-icon
													slot="prepend"
													class="mx-2"
													:color="button.color"
													>{{ button.icon }} fa-fw</v-icon
												>
												<template v-slot:append-outer>
													<v-tooltip bottom>
														<template v-slot:activator="{ on }">
															<v-icon
																slot="append-outer"
																v-on="on"
																class="mx-2"
																color="grey lighten-2"
																>fa-info-circle fa-fw</v-icon
															> </template
														>The selected icon will appear in the central of the
														card with a coloured circle background
													</v-tooltip>
												</template>
											</v-select>
											<v-text-field
												@keyup="save"
												@change="save"
												:hint="hint"
												outlined
												color="teal"
												v-model="button.link"
												label="Button Link"
											>
												<v-icon
													slot="prepend"
													class="mx-2"
													:color="button.color"
													>fa-link fa-fw</v-icon
												>
											</v-text-field>
											<v-select
												outlined
												color="teal"
												@change="save"
												v-model="button.link"
												:items="sections"
												item-text="title"
												item-value="idlink"
												label="Section Link"
											>
												<v-icon
													slot="prepend"
													class="mx-2"
													:color="button.color"
													>fas fa-layer-group fa-fw</v-icon
												>
											</v-select>
											<v-select
												outlined
												color="teal"
												@change="save"
												v-model="button.link"
												:items="pages"
												item-text="title"
												item-value="link"
												label="Page Link"
											>
												<v-icon
													slot="prepend"
													class="mx-2"
													:color="button.color"
													>fa-copy fa-fw</v-icon
												>
											</v-select>
										</v-container>
									</v-card>
								</v-col>
							</v-row>
						</v-container>
						<v-toolbar color="teal" dark>
							<v-toolbar-title></v-toolbar-title>
							<v-spacer></v-spacer>
							<v-btn text @click="editTitle = false">Close</v-btn>
						</v-toolbar>
					</v-card>
				</v-dialog>

				<file-manager
					:showFileManager="showFileManager"
					@showFileManager="onShowFileManager"
					@insertImage="insertImage"
					@hideFileManager="onHideFileManager"
				></file-manager>
			</section>
			<section class="grey lighten-2">
				<!-- <v-card flat tile class="grey lighten-2"> -->
				<!-- <v-parallax src="/images/grey.jpg" min-height="350" max-height="1200"> -->
				<v-container fluid>
					<v-row class="py-5">
						<v-col
							cols="12"
							lg="4"
							md="4"
							sm="6"
							:data-aos="cardtrans(card.id)"
							data-aos-duration="1200"
							v-for="(card, index) in area.actioncards"
							:key="card.id"
						>
							<v-card
								class="text-center"
								@mouseover="showEditCard(card.id)"
								@mouseleave="showEditCard(0)"
							>
								<v-btn
									small
									fab
									class="mt-2"
									absolute
									right
									v-if="showEditCardOneButton && card.id == 1 && $canEdit()"
									@click="onEditCard(index)"
								>
									<v-icon small :color="card.color">fa-edit</v-icon>
								</v-btn>
								<v-btn
									small
									fab
									class="mt-2"
									absolute
									right
									v-if="showEditCardTwoButton && card.id == 2 && $canEdit()"
									@click="onEditCard(index)"
								>
									<v-icon small :color="card.color">fa-edit</v-icon>
								</v-btn>
								<v-btn
									small
									fab
									class="mt-2"
									absolute
									right
									v-if="showEditCardThreeButton && card.id == 3 && $canEdit()"
									@click="onEditCard(index)"
								>
									<v-icon small :color="card.color">fa-edit</v-icon>
								</v-btn>
								<v-card-title class="p-1" :class="card.color"></v-card-title>
								<v-img
									v-if="card.image"
									contain
									height="250"
									:src="card.image"
								></v-img>
								<v-card-text>
									<div class="text-h4 pt-2 mb-5" v-text="card.title"></div>
									<v-avatar
										size="66"
										class="mb-5"
										v-if="card.icon != 'NO ICON'"
									>
										<v-icon
											v-text="card.icon"
											size="32"
											class="white--text"
											:class="card.color"
										/>
									</v-avatar>
									<p class="text-gray-700 mb-5" v-text="card.text"></p>
									<!-- EXTERNAL LINK -->
									<a
										:href="card.chipExternalLink"
										target="_blank"
										v-if="card.chipIsLink == 'external'"
										style="cursor: pointer"
									>
										<v-chip
											v-text="card.chip"
											:color="card.chipColor || card.color"
											:text-color="card.chipTextColor || 'white'"
										></v-chip>
									</a>
									<!-- EMAIL LINK -->
									<a
										:href="'mailto:' + card.chipEmailLink"
										target="_blank"
										v-if="card.chipIsLink == 'email'"
									>
										<v-chip
											v-text="card.chip"
											:color="card.chipColor || card.color"
											:text-color="card.chipTextColor || 'white'"
										></v-chip>
									</a>
									<!-- PAGE LINK -->
									<v-chip
										v-if="card.chipIsLink == 'page'"
										:color="card.chipColor || card.color"
										:text-color="card.chipTextColor || 'white'"
										:to="card.chipPageLink"
										>{{ card.chip }}</v-chip
									>
									<!-- NOMRAL CHIP - NO LINK -->
									<v-chip
										v-if="card.chipIsLink == 'nolink'"
										:color="card.chipColor || card.color"
										:text-color="card.chipTextColor || 'white'"
										>{{ card.chip }}</v-chip
									>
								</v-card-text>
								<!-- </v-img> -->
							</v-card>
						</v-col>
					</v-row>
				</v-container>
				<!-- </v-parallax> -->
				<!-- </v-card> -->
			</section>

			<v-dialog v-model="showEditCardDialog" min-width="80%">
				<v-row justify="center">
					<v-col cols="12" sm="10" md="8" lg="6">
						<v-card>
							<v-toolbar :color="editedCard.color" dark>
								<v-toolbar-title>Edit Tile</v-toolbar-title>
								<v-spacer></v-spacer>
								<v-btn text @click="showEditCardDialog = false">Close</v-btn>
							</v-toolbar>
							<v-container fluid pt-3>
								<v-select
									class="pb-3"
									:items="actioncardsColorsList"
									v-model="editedCard.color"
									@keyup="save"
									@change="save"
									outlined
									label="Card Colour"
									:color="editedCard.color"
								>
									<template slot="item" slot-scope="data">
										<v-icon class="mr-3" :color="data.item">fa-square</v-icon>
										<span class="cb-item">{{ data.item }}</span>
									</template>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color"
										>fa-square fa-fw</v-icon
									>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
													>fa-info-circle fa-fw</v-icon
												> </template
											>This option sets the color for the card and central icon
										</v-tooltip>
									</template>
								</v-select>
								<v-text-field
									class="pb-3"
									v-model="editedCard.title"
									@keyup="save"
									outlined
									label="Title Text"
									:color="editedCard.color"
								>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color"
										>fa-pencil-alt fa-fw</v-icon
									>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
													>fa-info-circle fa-fw</v-icon
												> </template
											>This text will appear above the central icon
										</v-tooltip>
									</template>
								</v-text-field>
								<v-row>
									<v-col cols="12" md="6">
										<v-text-field
											outlined
											:color="editedCard.color"
											v-model="editedCard.image"
											accept="image/png, image/jpeg, image/bmp"
											placeholder="Tile Image"
											label="Tile Image"
											@click="onShowFileManager('tileImage')"
											readonly
											clearable
										>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.color"
												>far fa-image fa-fw</v-icon
											>
										</v-text-field>
									</v-col>
									<v-col cols="12" md="5">
										<v-hover v-slot="{ hover }">
											<v-img
												:src="editedCard.image"
												@change="save"
												height="250"
												class="pb-3"
											>
												<v-expand-transition>
													<div
														@click="onShowFileManager('tileImage')"
														v-if="hover"
														class="d-flex transition-fast-in-fast-out teal lighten-2 v-card--reveal white--text"
														style="height: 100%"
													>
														CLICK TO CHANGE
													</div>
												</v-expand-transition>
											</v-img>
										</v-hover>
									</v-col>
								</v-row>
								<v-select
									class="pb-3"
									:items="actioncardsIconsList"
									v-model="editedCard.icon"
									@keyup="save"
									@change="save"
									outlined
									label="Card Icon"
									:color="editedCard.color"
								>
									<template slot="item" slot-scope="data">
										<v-icon class="mr-3" :color="editedCard.color"
											>{{ data.item }} fa-fw</v-icon
										>
										<span class="cb-item">{{ data.item }}</span>
									</template>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color"
										>{{ editedCard.icon }} fa-fw</v-icon
									>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
													>fa-info-circle fa-fw</v-icon
												> </template
											>The selected icon will appear in the central of the card
											with a coloured circle background
										</v-tooltip>
									</template>
								</v-select>
								<v-textarea
									class="pb-3"
									v-model="editedCard.text"
									@keyup="save"
									outlined
									label="Card Text"
									:color="editedCard.color"
									counter="200"
									:rules="[(v) => v.length <= 200 || 'Max 200 Characters']"
								>
									<v-icon slot="prepend" class="mx-2" :color="editedCard.color"
										>fa-pencil-alt fa-fw</v-icon
									>
									<template v-slot:append-outer>
										<v-tooltip bottom>
											<template v-slot:activator="{ on }">
												<v-icon
													slot="append-outer"
													v-on="on"
													class="mx-2"
													color="grey lighten-2"
													>fa-info-circle fa-fw</v-icon
												> </template
											>This text will appear below the central icon
										</v-tooltip>
									</template>
								</v-textarea>
								<v-row>
									<v-col cols="12" md="7">
										<v-text-field
											class="pb-3"
											v-model="editedCard.chip"
											@keyup="save"
											outlined
											label="Bottom Button Text"
											:color="editedCard.color"
											hide-details="auto"
										>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.color"
												>fa-comment-medical fa-fw</v-icon
											>
											<template v-slot:append-outer>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon
															slot="append-outer"
															v-on="on"
															class="mx-2"
															color="grey lighten-2"
															>fa-info-circle fa-fw</v-icon
														> </template
													>Text here will appear in the grey bar at the bottom
													of the card. Email addresses and phone numbers work
													best here.
												</v-tooltip>
											</template>
										</v-text-field>
									</v-col>
									<v-col cols="12" md="5">
										<v-select
											class="pb-3"
											:items="actioncardsColorsList"
											v-model="editedCard.chipColor"
											@keyup="save"
											@change="save"
											outlined
											label="Button Colour"
											:color="editedCard.chipColor"
											hide-details="auto"
										>
											<template slot="item" slot-scope="data">
												<v-icon class="mr-3" :color="data.item"
													>fa-square</v-icon
												>
												<span class="cb-item">{{ data.item }}</span>
											</template>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.chipColor"
												>fa-square fa-fw</v-icon
											>
											<template v-slot:append-outer>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon
															slot="append-outer"
															v-on="on"
															class="mx-2"
															color="grey lighten-2"
															>fa-info-circle fa-fw</v-icon
														> </template
													>This option sets the color for the button
												</v-tooltip>
											</template>
										</v-select>
									</v-col>
								</v-row>
								<v-row align="center" justify="center">
									<v-btn-toggle
										mandatory
										v-model="editedCard.chipIsLink"
										tile
										:color="editedCard.color"
										group
										@change="save"
									>
										<v-btn value="hide">Hide Button</v-btn>
										<v-btn value="nolink">Show Button</v-btn>
										<v-btn value="page">Add Page Link</v-btn>
										<v-btn value="email">Add Email Link</v-btn>
										<v-btn value="external">Add External Link</v-btn>
									</v-btn-toggle>
								</v-row>
								<v-row>
									<v-col
										cols="12"
										md="7"
										v-if="editedCard.chipIsLink == 'nolink'"
									>
										<v-text-field
											class="pb-3"
											outlined
											label
											placeholder="Link Removed"
											:color="editedCard.color"
											disabled
										>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.color"
												>fa-unlink fa-fw</v-icon
											>
											<template v-slot:append-outer>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon
															slot="append-outer"
															v-on="on"
															class="mx-2"
															color="grey lighten-2"
															>fa-info-circle fa-fw</v-icon
														> </template
													>Link Removed.
												</v-tooltip>
											</template>
										</v-text-field>
									</v-col>
									<v-col
										cols="12"
										md="7"
										v-if="editedCard.chipIsLink == 'external'"
									>
										<v-text-field
											class="pb-3"
											v-model="editedCard.chipExternalLink"
											@keyup="save"
											outlined
											label="Bottom Button Link"
											persistent-hint
											hint="Add External Link - must include http:// or https://"
											:color="editedCard.color"
										>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.color"
												>fa-link fa-fw</v-icon
											>
											<template v-slot:append-outer>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon
															slot="append-outer"
															v-on="on"
															class="mx-2"
															color="grey lighten-2"
															>fa-info-circle fa-fw</v-icon
														> </template
													>Add External Link - must include http:// or https://
												</v-tooltip>
											</template>
										</v-text-field>
									</v-col>
									<v-col
										cols="12"
										md="7"
										v-if="editedCard.chipIsLink == 'email'"
									>
										<v-text-field
											class="pb-3"
											v-model="editedCard.chipEmailLink"
											@keyup="save"
											outlined
											placeholder="Enter an email address"
											label="Bottom Button Link"
											persistent-hint
											hint="Enter an email address"
											:color="editedCard.color"
										>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.color"
												>fa-envelope fa-fw</v-icon
											>
											<template v-slot:append-outer>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon
															slot="append-outer"
															v-on="on"
															class="mx-2"
															color="grey lighten-2"
															>fa-info-circle fa-fw</v-icon
														> </template
													>Enter email address.
												</v-tooltip>
											</template>
										</v-text-field>
									</v-col>
									<v-col
										cols="12"
										md="7"
										v-if="editedCard.chipIsLink == 'page'"
									>
										<v-select
											class="pb-3"
											:items="pages"
											item-text="title"
											item-value="link"
											v-model="editedCard.chipPageLink"
											@keyup="save"
											@change="save"
											outlined
											label="Bottom Button Link"
											placeholder="Select a Page from the list"
											persistent-hint
											hint="Select a Page from the list"
											:color="editedCard.color"
										>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.color"
												>fa-copy fa-fw</v-icon
											>
											<template v-slot:append-outer>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon
															slot="append-outer"
															v-on="on"
															class="mx-2"
															color="grey lighten-2"
															>fa-info-circle fa-fw</v-icon
														> </template
													>Select a Page from the list.
												</v-tooltip>
											</template>
										</v-select>
									</v-col>
									<v-col
										cols="12"
										md="5"
										v-if="editedCard.chipIsLink != 'hide'"
									>
										<v-select
											class="pb-3"
											:items="actioncardsColorsList"
											v-model="editedCard.chipTextColor"
											@keyup="save"
											@change="save"
											outlined
											label="Button Text Colour"
											:color="editedCard.chipTextColor"
											hide-details="auto"
										>
											<template slot="item" slot-scope="data">
												<v-icon class="mr-3" :color="data.item"
													>fa-square</v-icon
												>
												<span class="cb-item">{{ data.item }}</span>
											</template>
											<v-icon
												slot="prepend"
												class="mx-2"
												:color="editedCard.chipTextColor"
												>fa-square fa-fw</v-icon
											>
											<template v-slot:append-outer>
												<v-tooltip bottom>
													<template v-slot:activator="{ on }">
														<v-icon
															slot="append-outer"
															v-on="on"
															class="mx-2"
															color="grey lighten-2"
															>fa-info-circle fa-fw</v-icon
														> </template
													>This option sets the color for the button text
												</v-tooltip>
											</template>
										</v-select>
									</v-col>
								</v-row>
								<v-divider inset></v-divider>
								<v-card-actions>
									<v-spacer></v-spacer>
									<v-btn dark @click="showEditCardDialog = false">Close</v-btn>
								</v-card-actions>
							</v-container>
						</v-card>
					</v-col>
				</v-row>
			</v-dialog>
			<section v-for="section in sections" :key="section.id" class="my-md-10">
				<pages-section
					v-if="section.sectiontype_id == 1 || !section.sectiontype_id"
					:section="section"
				></pages-section>
				<!-- <pages-section v-if="section.sectiontype_id == 2" :section="section"></pages-section> -->
				<!-- <pages-section v-if="section.sectiontype_id == 3" :section="section"></pages-section> -->
			</section>
			<!-- <div
				data-aos="fade-up"
				data-aod-delay="100"
				data-aos-duration="1200"
				class="position-relative mt-n16"
			>
				<div class="shape shape-bottom shape-fluid-x svg-shim teal--text text--darken-4">
					<svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
					</svg>
				</div>
			</div>-->
			<!-- <div class="teal darken-4">
				<v-card class="teal darken-4" min-height="400px"></v-card>
			</div>-->
		</div>
	</div>
</template>
<script>
import Axios from "axios";
import moment from "moment";
import AOS from "aos";

export default {
	props: ["id", "areaname", "seanslatestletter", "slTitle"],
	watch: {
		// $route: function() {
		// 	this.getContent();
		// }
	},
	data() {
		return {
			loading: true,
			insertImageType: "",
			showFileManager: false,
			area: {},
			sections: {},
			pages: {},
			showEditHeaderButton: false,
			showEditCardOneButton: false,
			showEditCardTwoButton: false,
			showEditCardThreeButton: false,
			showEditCardDialog: false,
			editedCard: "",
			actioncardsColorsList: [
				"black",
				"white",
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
				"grey",
			],
			actioncardsIconsList: [
				"NO ICON",
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
				"fa-cat",
			],
			editWelcomeSubText: false,
			editTitle: false,
			typing: false,
		};
	},
	created() {
		this.loading = true;
		AOS.init({
			debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
		});
	},
	mounted() {
		this.scrollToTop();
		this.getContent();
	},
	methods: {
		canEdit() {
			this.$canEdit();
		},
		getContent() {
			this.loading = true;
			this.scrollToTop();
			axios
				.get("/get/arealanding/" + this.$route.name)
				.then(({ data }) => {
					this.area = data;
				})
				.then(() => {
					this.getPages();
				})
				.then(() => {
					this.area.actioncards[2].title = this.seanslatestletter.title;
					this.area.actioncards[2].chipIsLink = "page";
					this.area.actioncards[2].chipPageLink = this.seanslatestletter.link;
					this.area.actioncards[2].text = this.seanslatestletter.subtitle;
					this.area.actioncards[2].chip = "Read Sean's Latest Letter";
				});
		},
		getPages() {
			this.loading = true;
			axios.get("/get/listpages/" + this.area.id).then(({ data }) => {
				this.sections = data.sections;
				this.pages = data.pages;
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
			this.showEditCardDialog = true;
			this.editedCard = this.area.actioncards[index];
			this.editedCard.index = index;
		},
		save(event) {
			if (!this.typing) {
				setTimeout(() => {
					this.typing = false;
					axios
						.put("/put/updateAreaLanding/" + this.area.id, this.area)
						.then((res) => {
							if (res.status == 200) {
								console.log(res.status);
							}
						});
				}, 1200);
			}
			this.typing = true;
			this.insertImageType = "";
		},
		onShowFileManager(type) {
			this.insertImageType = type;
			this.showFileManager = true;
		},
		onHideFileManager() {
			this.insertImageType = "";
			this.showFileManager = false;
		},
		insertImage(file) {
			if (this.insertImageType == "landingImage") {
				this.area.landingImage = file.url;
			}
			if (this.insertImageType == "tileImage") {
				this.editedCard.image = file.url;
			}
			this.save("POOK");
		},
		insertTileImage(file) {
			this.editedCard.image = file.url;
			this.save("CARD POOK");
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
				return "fade-right";
			}
			if (id == 2) {
				return "fade-left";
			}
			if (id == 3) {
				return "fade-right";
			}
		},
		showButton(state) {
			if (state == "show") {
				return "show";
			}
			if (state == "hidden") {
				return "hidden";
			}
		},
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

.v-input input {
	color: teal !important;
}
.v-card--reveal {
	align-items: center;
	bottom: 0;
	justify-content: center;
	opacity: 0.5;
	position: absolute;
	width: 100%;
	cursor: pointer;
}
a .v-chip:hover {
	cursor: pointer !important;
}
#cardImage {
	border-collapse: collapse;
	border: 1px solid;
	color: rgba(0, 0, 0, 0.38);
	border-radius: 4px;
	transition-duration: 0.3s;
	transition-property: color, border-width;
	transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
}
</style>
