<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>
<v-content>
        <v-layout align-center justify-center>
                
            <v-flex xs12 sm12 md12>
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array()); ?>

                <v-card class="elevation-12"  color="blue-grey darken-4" style="background-image: url(<?=baseurl().'/images/login-bg-mb.png'?>);background-size: 100% 100%; height: 645px; ">
                    <v-layout style="position: absolute; top: 5px;">
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
                    <div style="position: absolute;bottom: 5px;display: block;width: 100%;">
                        <v-layout justify-center>
                            <v-layout row wrap>
                                <v-container>
                                <v-flex xs12>
                                        <?= $form->textField($model,'username',
                                            array('style'=>'padding:5px 5px;border-radius: 1px;border: solid 1px #FFFFFF;background-color:#FFFFFF;width:100%;',
                                                  'maxlength'=>30,
                                                  'placeholder'=>Yii::t('app','User Name'),
                                                  'autocomplete'=>'off',
                                                  'tabindex' => 1
                                            ));
                                        ?>
                                </v-flex>
                                <v-flex xs12>
                                    <?php if($form->error($model,'username')):?>
                                        <div class="control-group error" style="max-width: 100% !important; color: #FFFFFF;border-radius: 3px; padding:10px 20px;margin:10px auto;">
                                            <?= $form->error($model,'username'); ?>
                                        </div>
                                    <?php endif;?>
                                </v-flex>
                        		<v-flex xs12>
                                        <?= $form->passwordField($model,'password',
                                            array('value'=>'',
                                                'style'=>'padding:5px 5px;border-radius: 1px;border: solid 1px #FFFFFF;background-color:#FFFFFF;width:100%;',
                                                'maxlength'=>30,
                                                'placeholder'=>Yii::t('app','Password'),
                                                'autocomplete'=>'off',
                                                'tabindex' => 2
                                            ));
                                        ?>
                                </v-flex>
                                <v-flex xs12>
                                        <?php if($form->error($model,'password')):?>
                                        <div class="control-group error" style="max-width: 100% !important; color: #FFFFFF;border-radius: 3px; padding:10px 20px;margin:10px auto;">
                                            <?= $form->error($model,'password'); ?>
                                        </div>
                                    <?php endif;?>
                                </v-flex>
                            </v-container>
                                <v-flex xs12>
                                        <?= TbHtml::submitButton(Yii::t('app', 'Login'),array(
                                            'color'=>'warning',
                                            'style'=>'background-color: yellow;padding:5px 0px 5px 0px; border-radius: 1px;border: solid 1px #FFFFFF;width:90%;margin:10px 0px 10px 21px;',
                                            'tabindex'=>3
                                        )); ?>
                                </v-flex>
                            </v-layout>
                        </v-layout>
                    </div>
                    <!--end footer-->
                </v-card>
                <?php $this->endWidget(); ?>
            </v-flex>
        </v-layout>
</v-content>




<!--Vuejs and Vuetify javascript-->

<!-- You can delete this comments after you could find where the file is -->
<!-- I have move this Global JS (use everywhere I project) to the place where it suppose to theme/ace/views/layouts/main_front_end.php -->

<!--<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>-->


<!-- Specific Javascript code keep in separate page) -->
<?php $this->renderPartial('//raffle/_js') ?>

<!-- Will check why register JS in Yii way not working here -->
<?php /*Yii::app()->clientScript->registerScriptFile(Yii::app()->basePath .'/views/raffle/_js.js', CClientScript::POS_END); */?>


