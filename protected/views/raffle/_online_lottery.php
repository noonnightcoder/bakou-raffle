<v-content>
    <v-container fluid>
        <v-layout justify-center>
            <v-flex xs12 sm9 md9>

                <v-card class="elevation-12"  color="blue-grey darken-4" >
                    <?php $this->renderPartial('_header') ?>
                </v-card>
                 <v-flex xs12 sm12 md12>
                    <?php $this->renderPartial('_carousel'); ?>
					<div class="tt_main">
						<div class="tt-l tt-full tt-ct pdh">
								<div class="tt-l tt_head_sec">
									<div class="tt-l tt-full tt_title_sc">
										<h1 class="tt-l">หวยออนไลน์</h1>
									</div>
								</div>
								<div class="tt-l tt-full tt_list_sb">
									<div class="thaitheme_table">
										<span class="tt_num_1">ประเภท</span>
										<span class="tt_num_2">จ่าย</span>
										<span class="tt_num_3">ลด%</span>
										<span class="tt_num_4">แทงขั้นต่ำ</span>
										  
										<div class="tt_td"> 
											<span class="tt_num1 ">3 ตัวบน</span>
											<span class="tt_num2 gr ">550</span>
											<span class="tt_num3 gr ">33%</span>
											<span class="tt_num4 ">10</span> 
										</div>      
								  
										<div class="tt_td"> 
											<span class="tt_num1 prr1">3 ตัวโต๊ด</span>
											<span class="tt_num2 gr prr2">105</span>
											<span class="tt_num3 gr prr3">33%</span>
											<span class="tt_num4 prr4">10</span> 
										</div>      
									  
										<div class="tt_td"> 
											<span class="tt_num1 ">2 ตัวบน</span>
											<span class="tt_num2 gr ">70</span>
											<span class="tt_num3 gr ">28%</span>
											<span class="tt_num4 ">10</span> 
										</div>      
										  
										<div class="tt_td"> 
											<span class="tt_num1 prr1">2 ตัวล่าง</span>
											<span class="tt_num2 gr prr2">70</span>
											<span class="tt_num3 gr prr3">28%</span>
											<span class="tt_num4 prr4">10</span> 
										</div>      
										  
										<div class="tt_td"> 
											<span class="tt_num1 ">3 ตัวล่าง</span>
											<span class="tt_num2 gr ">125</span>
											<span class="tt_num3 gr ">33%</span>
											<span class="tt_num4 ">10</span> 
										</div>      
										  
										<div class="tt_td"> 
											<span class="tt_num1 prr1">2 ตัวโต๊ด</span>
											<span class="tt_num2 gr prr2">12</span>
											<span class="tt_num3 gr prr3">28%</span>
											<span class="tt_num4 prr4">10</span> 
										</div>      
										  
										<div class="tt_td"> 
											<span class="tt_num1 ">วิ่งบน</span>
											<span class="tt_num2 gr ">3</span>
											<span class="tt_num3 gr ">12%</span>
											<span class="tt_num4 ">100</span> 
										</div>      
										  
										<div class="tt_td"> 
											<span class="tt_num1 prr1">วิ่งล่าง</span>
											<span class="tt_num2 gr prr2">4</span>
											<span class="tt_num3 gr prr3">12%</span>
											<span class="tt_num4 prr4">100</span> 
										</div>      
									</div>
								</div>
						</div>
					</div>
					<?php $this->renderPartial('_footer') ?>
				</v-flex>

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