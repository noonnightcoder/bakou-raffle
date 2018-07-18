<v-container >

    <v-layout row wrap>
        <v-flex xs12 sm12 md12 style="z-index: 1">
            <v-card style="min-height: 350px; z-index: 1">

                <v-card-title>
                  <h3>Choose Date</h3>
                </v-card-title>
                <v-divider></v-divider>
                  <v-container>
                    <v-layout row wrap>
                    <v-flex xs12 sm3>
                      <v-menu
                        ref="menu1"
                        :close-on-content-click="false"
                        v-model="menu1"
                        :nudge-right="40"
                        :return-value.sync="start_date"
                        lazy
                        transition="scale-transition"
                        offset-y
                        full-width
                        min-width="290px"
                      >
                        <v-text-field
                          slot="activator"
                          v-model="start_date"
                          label="Start Date"
                          prepend-icon="event"
                          readonly
                        ></v-text-field>
                        <v-date-picker v-model="start_date" @input="$refs.menu1.save(start_date)"></v-date-picker>

                      </v-menu>
                    </v-flex>
                    <v-flex xs12 sm3>
                      <v-menu
                        ref="menu2"
                        :close-on-content-click="false"
                        v-model="menu2"
                        :nudge-right="40"
                        :return-value.sync="end_date"
                        lazy
                        transition="scale-transition"
                        offset-y
                        full-width
                        min-width="290px"
                      >
                        <v-text-field
                          slot="activator"
                          v-model="end_date"
                          label="End Date"
                          prepend-icon="event"
                          readonly
                        ></v-text-field>
                        <v-date-picker v-model="end_date" @input="$refs.menu2.save(end_date)"></v-date-picker>
                      </v-menu>
                  </v-flex>
                  <v-flex xs12 sm2 md2>
                    <v-btn @click="getRaffleResult">Search</v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
                <v-divider></v-divider>
              <v-layout row wrap>
              <v-flex xs12 sm12 md12>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th align="left">Purchase Date</th><th align="left">Name</th><th align="left">Purchase Number</th><th align="left">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(result, i) in raffle_results" :key="i">
                            <td>{{ result.purchasted_date }}</td><td>{{ result.client_name }}</td><td>{{ result.ticket_number }}</td><td>{{ result.ticket_number }}</td>
                        </tr>
                    </tbody>
                </table>
              </v-flex>
            </v-layout>

            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
