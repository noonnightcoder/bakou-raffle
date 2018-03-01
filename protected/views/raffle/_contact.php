<!--Dialog-->
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="400">
        <v-card>
            <v-toolbar justify-center dense color="blue-grey darken-4">
                <v-toolbar-title class="white--text">ข่าวสาร</v-toolbar-title>
            </v-toolbar>
            <v-card-title class="headline">ขอโทสคุณไม่มีพอเงิน!!!</v-card-title>
            <v-card-text>ติดต่อเราเพื่อฝากเงิน</v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green darken-1" flat @click="resetAmount">ปิด</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-layout>

<v-layout row justify-center>
    <v-dialog v-model="dialog2" persistent max-width="400">
        <v-card>
            <v-toolbar justify-center dense color="blue-grey darken-4">
                <v-toolbar-title class="white--text">ข่าวสาร</v-toolbar-title>
            </v-toolbar>
            <v-card-title class="headline">ติดต่อเราตาม</v-card-title>
            <v-card-text>
                <strong>
                    โทรมาศัพท์:
                </strong>
                <p>
                    091-996-9183,
                    091-996-9184,
                    091-996-9185,
                    091-996-9186,
                    092 616-6912,
                    092 616-6913,
                    092 616-6914,
                    092 616-6915
                </p>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green darken-1" flat @click.native="dialog2=false">ปิด</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-layout>
<!--End Dialog-->