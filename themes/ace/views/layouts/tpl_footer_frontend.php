<v-footer height="auto" class="grey darken-3">
    <v-layout row wrap justify-center>
        <v-btn
            color="white"
            flat
            v-for="link in links"
            :key="link"
        >
            {{ link }}
        </v-btn>
        <v-flex xs12 py-3 text-xs-center white--text>
            &copy;2018 — <strong>WinWin97.com</strong>
        </v-flex>
    </v-layout>
</v-footer>