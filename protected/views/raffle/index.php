
<v-content>
    <v-container fluid>
        <v-layout justify-center>
            <v-flex xs12 sm9 md9>

                <v-card class="elevation-12"  >

                    <?php $this->renderPartial('_header') ?>

                    <?php $this->renderPartial('_raffle_container') ?>
                    <img width="100%" src="http://www.winwin97.com/wp-content/uploads/2017/03/banking-bg.jpg?v=1.0"/>
                    <?php $this->renderPartial('_footer') ?>
                </v-card>



            </v-flex>

        </v-layout>
    </v-container>
</v-content>

<!-- The footer suppose to include in theme/ace/views/layouts/tpl_footer_frontend.php but not work so put here :) to fix later -->

<?php $this->renderPartial('_contact') ?>



<!--Vuejs and Vuetify javascript-->

<!-- You can delete this comments after you could find where the file is -->
<!-- I have move this Global JS (use everywhere in project) to the place where it suppose to theme/ace/views/layouts/main_front_end.php -->

<!--<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>-->


<!-- Specific Javascript code keep in separate page) -->


<!-- Will check why register JS in Yii way not working here -->
<?php /*Yii::app()->clientScript->registerScriptFile(Yii::app()->basePath .'/views/raffle/_js.js', CClientScript::POS_END); */?>
<?php $this->renderPartial('_js')?>
