<v-container >
    
    <v-layout row wrap>
        <v-flex xs12 sm3 md3 style="z-index: 1">
            <v-card style="height: 350px; z-index: 1">
                
                 <div class="my-grid-table text-lg-center" style="background-color:#ffe8a0;font-size: 15px;font-weight: bold;">
                    <h3>เครดิตของคุณ</h3>
                </div>

                <h3 style="font-size: 40px; text-align: center;">
                    {{credit}} บาท
                </h3>

                <v-container v-if="hide">
                    <v-text-field :label="'Input Amount'" type="number" v-model="price" @keyup="betAmount>0 & betAmount<=credit & credit>0?dialog=false:dialog=true" class="white--text"></v-text-field>
                </v-container>

                <div class="text-lg-right">
                    <v-btn xs12 sm12 md12 style="background-color:#ffe8a0;"
                           @click="insertLuckyNumber"
                           :disabled="betAmount>0 & betAmount<=credit & credit>0?false:true">
                        Lucky Draw
                    </v-btn>
                </div>
                <!-- <v-divider></v-divider> -->
                <!-- <h4 style="font-size: 20px; text-align: center;"><?= Yii::app()->session['emp_fullname'] ?>
                </h4> -->
                 <div class="my-grid-table text-lg-center" style="background-color:#ffe8a0;font-size: 15px;font-weight: bold;margin-top: 15px;">
                    <h3>ติดต่อเรา</h3>
                </div>
                <v-container>
                    <strong>DTAC: </strong>xxx xxx-xxx-xx<br>
                    <strong>AIS: </strong>xxx xxx-xxx-xxx
                </v-container>
            </v-card>
        </v-flex>
        <v-flex xs12 sm6 md6>
            <v-layout align-center row wrap justify-center>
                <v-flex xs12 sm10 md10>
                    <v-card>
                        <h1 style="font-size: 650%; text-align: center;">{{spinNumber}}</h1>
                    </v-card>
                </v-flex>
                <v-flex xs12 sm10 md10>
                    <!-- <p></p>
                    <p>
                        ซื่อมากจะมีโอการชนะมากด้วย พนันมากชนะมาก ขอให้โชคดีและชนะกับ วินวิน๙๗นะ ขอบคุณมาก
                    </p>
                    <p>
                        Buy the lucky draw number to have chance to win BIG PRIZE. The more you BET the more you win. Wish you good luck and win with WinWin97 Lucky Draw. THANK YOU!
                    </p> -->
                    <v-container grid-list-md>
                        <v-flex xs12 sm12 md12>
                            <div class="my-grid-table text-lg-center" style="background-color:#ffe8a0;font-size: 15px;font-weight: bold;">
                                <h3>Lottery Prize</h3>
                            </div>
                        </v-flex>
                        <v-layout row wrap v-for="i in ['First','Second','Third','Fourth','Fiveth']" :key="i">
                            <v-flex xs6 sm6 md6>
                                <div class="my-grid-table">
                                    {{i}} Prize
                                </div>
                            </v-flex>
                            <v-flex xs6 sm6 md6>
                                <div class="my-grid-table text-lg-center">
                                    XXX
                                </div>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-flex>
            </v-layout>
        </v-flex>
        <v-flex xs12 sm3 md3>
            <v-card color="grey lighten-4" flat  tile scrollable style="height: auto;max-height: 350px; z-index: 1">
                 <div class="my-grid-table text-lg-center" style="background-color:#ffe8a0;font-size: 15px;font-weight: bold;">

                    บัญชีของคุณ 	<v-btn icon style="position: absolute;right: 0px;top:-7px;">
                            {{luckyDraw.length}}
                        </v-btn>
                    </div>
                <v-content style="height:320px;max-height: 320px;border:solid 1px #ccc; overflow: hidden; background-color: #FFF;">
                    <div style="height:300px;max-height:300px;overflow-y:scroll;backface-visibility:hidden;">
                        <v-list v-if="luckyDraw.length>0">
                            <v-list-tile v-for="(ld,index) in luckyDraw" :key="index">
                                <v-list-tile-content>
                                    <v-list-tile-title v-text="ld.luckyNum"></v-list-tile-title>
                                </v-list-tile-content>
                                {{ld.price}} บาท
                            </v-list-tile>
                        </v-list>
                        <!-- <h1 v-else style="text-align: center;font-size: 30px !important;">
                            ยังไม่มีบัญชี
                        </h1> -->
                        <v-layout row wrap v-else>
                            <v-flex xs12 sm12 md12>
                                <div class="my-grid-table text-lg-center">
                                    ประวัติหวยของคุณ
                                </div>
                            </v-flex>
                            <v-flex xs6 sm6 md6 v-for="(m,mi) in 20">
                                <div class="my-grid-table text-lg-center">
                                    xxx
                                </div>
                            </v-flex>
                        </v-layout>
                    </div>
                </v-content>
            </v-card>
        </v-flex>
        <v-flex xs12 sm12 md12>
            <div class="my-grid-table text-lg-center" style="background-color:#ffe8a0;font-size: 20px;font-weight: bold;margin-top: 15px;">
                <h2>
                    Last 7 Days Result
                </h2>
            </div>
        </v-flex>
        <v-flex xs2 sm2 md2>
            <div class="my-grid-table" style="background-color:##fff2d6;font-size: 20px;font-weight: bold;margin-top: 15px;">
                Big Prize
            </div>
        </v-flex>
        <v-flex xs2 sm2 md2 v-for="j in 5">
            <div class="my-grid-table text-lg-center" style="background-color:##fff2d6;font-size: 20px;font-weight: bold;margin-top: 15px;">
                XXX
            </div>
        </v-flex>
        <v-flex xs12 sm12 md12 v-for="(k,ki) in lotteries" :key="ki">
            <div class="my-grid-table" style="background-color:#ffe8a0;font-weight: bold;margin-top: 15px;">
                Raffle Result on {{k.date}}
            </div>
            <v-layout row wrap v-for="(n,ni) in k.priceNo">
                <v-flex xs2 sm2 md2>
                    <div class="my-grid-table" style="font-weight: bold;">
                        {{n.text}}
                    </div>
                </v-flex>
                <v-flex xs2 sm2 md2 row wrap v-for="(l,li) in n.result" :key="li">
                    <div class="my-grid-table text-lg-center">
                        {{l}}
                    </div>
                </v-flex>
            </v-layout>
        </v-flex>
    </v-layout>
</v-container>