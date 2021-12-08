@extends('layouts.vue')

@section('content')
@if(session('url.intended'))
  @php $intended = session('url.intended'); @endphp
@endif


  <template>
    <v-app id="inspire">
      <v-app-bar app clipped-left elevate-on-scroll white class="top-border--teal">
        <v-toolbar-title class="pb-md-2">
          <v-avatar tile class="mr-3 teal--text">
            <img src="/images/hexagon-icon.png" />
          </v-avatar>
          <span class>Team FCAT</span>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-responsive max-width="360" v-if="this.$vuetify.breakpoint.smAndUp">
        <a href="http://www.google.co.uk" class="text-decoration-none">
          <v-text-field
            dense
            flat
            hide-details
            rounded
            solo-inverted
            placeholder="Search Google"
            prepend-inner-icon="mdi-magnify"
            clearable
            v-on:keyup.enter=""
          ></v-text-field>
        </a>
        </v-responsive>
        <v-spacer></v-spacer>
        <a href="http://mail.google.com" class="text-decoration-none">
          <v-btn text class="mr-2 blue--text lighten-1" v-if="this.$vuetify.breakpoint.smAndUp">
            <v-icon class="mr-2 red--text lighten-1 ">far fa-envelope</v-icon>GMAIL
          </v-btn>
        </a>
      </v-app-bar>
      <v-main>
        <v-container fluid>
          {{-- <v-row class="justify-center">
            <v-col cols="6" sm="4" md="2">
              <v-img src="/images/teamfcat-hexagon.png"></v-img>
            </v-col>
          </v-row> --}}
          <v-row align="center" justify="center">
            <v-col cols="12" sm="8" md="6">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <v-card class="elevation-12">
                  <v-toolbar color="teal darken-2" dark flat>
                    <v-toolbar-title class="text-uppercase">
                      <v-icon class="mr-2">mdi-lock-outline</v-icon>
                      TeamFCAT Sign In
                    </v-toolbar-title>
                  </v-toolbar>
                  <v-card-text>
                    <v-row>
                      <v-col cols="12">
                        <v-btn width="100%" href="{{ url('/gredirect/') }}" tile dark color="green">
                          <v-icon class="mr-3">mdi-google</v-icon>Sign In With FCAT Google
                        </v-btn>
                      </v-col>
                      <v-col>
                        <v-btn width="100%" href="{{ url('/redirect') }}" tile dark color="blue darken-2">
                          <v-icon class="mr-3">mdi-microsoft</v-icon>Sign In With Microsoft
                        </v-btn>
                      </v-col>
                    </v-row>
                    {{-- <v-divider></v-divider> --}}
                  </v-card-text>
                  <v-expansion-panels>
                    <v-expansion-panel>
                      <v-expansion-panel-header class="overline" expand-icon="mdi-menu-down">
                        <template v-slot:default="{ open }">
                          Sign In with Username
                        </template>
                      </v-expansion-panel-header>
                      <v-expansion-panel-content>
                        <v-text-field id="email" label="Email" name="email" prepend-icon="mdi-account" type="email">
                        </v-text-field>
                        <v-text-field id="password" label="Password" name="password" prepend-icon="mdi-lock"
                          type="password">
                        </v-text-field>
                        <v-row>
                          <v-col>
                            <v-btn width="100%" type="submit" class="mr-5" tile outlined>Sign In With Username</v-btn>
                          </v-col>
                        </v-row>
                      </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-card>
              </form>
            </v-col>
          </v-row>

        </v-container>
      </v-main>
    </v-app>
  </template>

@endsection
