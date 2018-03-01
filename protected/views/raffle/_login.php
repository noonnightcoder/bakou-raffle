
<v-content>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm9 md9>
                <v-card class="elevation-12"  color="blue-grey darken-4" style="background-image: url(<?=baseurl().'/images/winwin97-login-bg.png'?>);background-size: 100% 421px; height: 421px; margin-top: 100px;">
                    <v-layout>
                        <v-btn color="info">
                            Thai
                        </v-btn>
                        <v-btn color="success">
                            English
                        </v-btn>
                        <v-btn color="error" >
                            Chinese
                        </v-btn>
                    </v-layout>
                    <!--fotter-->
                    <div style="position: absolute;bottom: 39px;display: block;width: 100%; text-align: center;" >
                            <input type="text" placeholder="Account" style="padding:1px 5px;border-radius: 3px;border: solid 1px #FFFFFF;">
                            <input type="password" placeholder="Password"  style="padding:1px 5px;border-radius: 3px;border: solid 1px #FFFFFF;">
                            <button color="warning" style="background-color: yellow;padding:1px 15px; border-radius: 3px;border: solid 1px #FFFFFF;">Login</button>
                    </div>
                    <!--end footer-->
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</v-content>




<!--Vuejs and Vuetify javascript-->

<!-- You can delete this comments after you could find where the file is -->
<!-- I have move this Global JS (use everywhere I project) to the place where it suppose to theme/ace/views/layouts/main_front_end.php -->

<!--<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>-->


<!-- Specific Javascript code keep in separate page) -->
<?php $this->renderPartial('_js') ?>

<!-- Will check why register JS in Yii way not working here -->
<?php /*Yii::app()->clientScript->registerScriptFile(Yii::app()->basePath .'/views/raffle/_js.js', CClientScript::POS_END); */?>


