<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>
<v-content>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
                
            <v-flex xs12 sm9 md9>
            	<h1>
                    <span class="white--text" ><?= Yii::t('app', companyName()); ?></span>
                    <span class="white--text"><?= Yii::t('app','APP'); ?></span>
                </h1>
                <h4 class="white--text" id="id-company-text">&copy; <?= Yii::t('app',bizNameFirstUpper() . ' Solution'); ?>
                </h4>
                 
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array()); ?>

                <v-card class="elevation-12"  color="blue-grey darken-4" style="background-image: url(<?=baseurl().'/images/winwin97-login-bg.png'?>);background-size: 100% 421px; height: 421px; margin-top: 50px;">
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
                    <div style="position: absolute;bottom: 30px;display: block;width: 100%; text-align: center;" >
                    		<?php echo TbHtml::submitButton(Yii::t('app', 'Login'),array(
                                'color'=>'warning',
                                'style'=>'background-color: yellow;padding:1px 15px; border-radius: 3px;border: solid 1px #FFFFFF;float:right;height:27px;margin-top:0px;'
                            )); ?>
                            <?php echo $form->passwordField($model,'password',array('value'=>'','style'=>'padding:1px 5px;border-radius: 3px;border: solid 1px #FFFFFF;float:right;background-color:#FFFFFF;','maxlength'=>30,'placeholder'=>Yii::t('app','Password'),'autocomplete'=>'off')); ?>
                            <?php echo $form->textField($model,'username',array('style'=>'padding:1px 5px;border-radius: 3px;border: solid 1px #FFFFFF;float:right;margin-right:10px;background-color:#FFFFFF;','maxlength'=>30,'placeholder'=>Yii::t('app','User Name'),'autocomplete'=>'off')); ?>
                    </div>
                    <div style="position: absolute;bottom:7px; width: 100%; ">
	                    <div class="control-group error" style="width: 300px !important; color: #FFFFFF; float: right;margin-right: 10px;border-radius: 3px;">
			                <?php echo $form->error($model,'username'); ?>
			            </div>
			            <div class="control-group error" style="width: 300px !important; color: #FFFFFF; float: right;margin-right: 10px;border-radius: 3px;">
			                <?php echo $form->error($model,'password'); ?>
			            </div>
			        </div>
                    <!--end footer-->
                </v-card>
                <?php $this->endWidget(); ?>
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
<?php $this->renderPartial('//raffle/_js') ?>

<!-- Will check why register JS in Yii way not working here -->
<?php /*Yii::app()->clientScript->registerScriptFile(Yii::app()->basePath .'/views/raffle/_js.js', CClientScript::POS_END); */?>


