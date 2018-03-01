<v-content>
    <v-container fluid>
        <v-layout justify-center>
            <v-flex xs12 sm9 md9>
                <v-card class="elevation-12"  color="blue-grey darken-4">

                    <?php $this->renderPartial('_header') ?>

                    <v-divider></v-divider>

                    <v-container>
                        <v-layout row wrap>
                            <v-flex xs12 sm3 md3>
                                <v-card color="grey lighten-4" flat  tile>
                                    <v-toolbar class="text-lg-center" dense color="blue-grey darken-2">
                                        <v-toolbar-title class="white--text">เครดิตของคุณ</v-toolbar-title>
                                    </v-toolbar>
                                    <v-divider></v-divider>
                                    <h4 style="font-size: 25px; text-align: center;"><?= Yii::app()->session['emp_fullname'] ?></h4>
                                    <h3 style="font-size: 40px; text-align: center;">
                                        {{credit}} บาท
                                    </h3>

                                    <v-container v-if="hide">
                                        <v-text-field :label="'Input Amount'" type="number" v-model="price" @keyup="betAmount>0 & betAmount<=credit & credit>0?dialog=false:dialog=true" class="white--text"/>
                                    </v-container>

                                    <div class="text-lg-right">
                                        <v-btn xs12 sm12 md12 class="white--text" color="blue-grey darken-3"
                                            @click="insertLuckyNumber"
                                            :disabled="betAmount>0 & betAmount<=credit & credit>0?false:true">
                                                Lucky Draw
                                        </v-btn>
                                    </div>

                                </v-card>
                                <v-card color="grey lighten-4" flat  tile>
                                    <v-toolbar class="text-lg-center" dense color="blue-grey darken-2">
                                        <v-toolbar-title class="white--text">ของบริษัท</v-toolbar-title>
                                    </v-toolbar>
                                    <v-divider></v-divider>
                                    <v-container>
                                        <p>
                                            <b>DTAC:</b> 091-996-9183-6
                                        </p>
                                        <p>
                                            <b>AIS:</b> 092 616-6912-5
                                        </p>
                                    </v-container>
                                </v-card>
                                <div>
                                        <img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
                                    </div>
                                    <div>
                                        <img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
                                    </div>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-layout align-center row wrap justify-center>
                                    <v-flex xs12 sm10 md10>
                                        <v-card>
                                            <h1 style="font-size: 100px; text-align: center;">{{spinNumber}}</h1>
                                        </v-card>
                                    </v-flex>
                                    <v-flex xs12 sm10 md10>
                                        <p></p>
                                        <p class="white--text">
                                            ซื่อมากจะมีโอการชนะมากด้วย พนันมากชนะมาก ขอให้โชคดีและชนะกับ วินวิน๙๗นะ ขอบคุณมาก
                                        </p>
                                        <p  class="white--text">
                                            Buy the lucky draw number to have chance to win BIG PRIZE. The more you BET the more you win. Wish you good luck and win with WinWin97 Lucky Draw. THANK YOU!
                                        </p>
                                    </v-flex>
                                    <v-flex xs12 sm10 md10>
                                        <img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
                                    </v-flex>
                                </v-layout>
                            </v-flex>
                            <v-flex xs12 sm3 md3>
                                <v-card color="grey lighten-4" flat  tile>
                                    <v-toolbar class="text-lg-center" dense color="blue-grey darken-2">
                                        <v-toolbar-title class="white--text">บัญชีของคุณ</v-toolbar-title>
                                    </v-toolbar>
                                    <v-divider></v-divider>
                                    <v-list v-if="luckyDraw.length>0">
                                        <v-list-tile v-for="(ld,index) in luckyDraw" :key="index">
                                            <v-list-tile-content>
                                                <v-list-tile-title v-text="ld.luckyNum"></v-list-tile-title>
                                            </v-list-tile-content>
                                                {{ld.price}} บาท
                                        </v-list-tile>
                                    </v-list>
                                    <h1 v-else style="text-align: center;">
                                        ยังไม่มีบัญชี
                                    </h1>
                                    
                                </v-card>
                                <div>
                                    <img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
                                </div>
                                <div>
                                    <img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
                                </div>
                            </v-flex>
                        </v-layout>
                    </v-container>

                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</v-content>

<!-- The footer suppose to include in theme/ace/views/layouts/tpl_footer_frontend.php but not work so put here :) to fix later -->
<?php $this->renderPartial('_footer') ?>

<?php $this->renderPartial('_contact') ?>



<!--Vuejs and Vuetify javascript-->

<!-- You can delete this comments after you could find where the file is -->
<!-- I have move this Global JS (use everywhere I project) to the place where it suppose to theme/ace/views/layouts/main_front_end.php -->

<!--<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>-->


<!-- Specific Javascript code keep in separate page) -->
<?php $this->renderPartial('_js') ?>

<!-- Will check why register JS in Yii way not working here -->
<?php /*Yii::app()->clientScript->registerScriptFile(Yii::app()->basePath .'/views/raffle/_js.js', CClientScript::POS_END); */?>



