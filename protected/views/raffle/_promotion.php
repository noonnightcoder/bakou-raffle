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
						<h1 class="tt-l">โปรโมชั่น</h1>
					</div>
					</div>
					 <div class="tt_l tt_full thaitheme_read">
					<p><img class="alignnone size-full wp-image-448" src="http://www.winwin97.com/wp-content/uploads/2017/03/slide02.jpg" alt="" width="1000" height="300" srcset="http://www.winwin97.com/wp-content/uploads/2017/03/slide02.jpg 1000w, http://www.winwin97.com/wp-content/uploads/2017/03/slide02-300x90.jpg 300w, http://www.winwin97.com/wp-content/uploads/2017/03/slide02-768x230.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></p>
					<h3 style="text-align: center;">สมัครสมาชิกใหม่15%</h3>
					<p>สมัครเปิดยูเซอร์ใหม่รับครดิตทันที15%? ( เริ่มต้น100บาทถึงสูงสุด5000บาท) ตัวอย่างถ้าฝาก 1000บาท จะได้รับ 150บาท ร่วมกับยอดฝากเดิม  ท่านจำเป็นต้องมียอดร่วมจำนวน4เท่าถึงจะสามารถถอนเงินได้</p>
					<hr />
					<p><img class="alignnone size-full wp-image-446" src="http://www.winwin97.com/wp-content/uploads/2017/03/slide04.jpg" alt="" width="1000" height="300" srcset="http://www.winwin97.com/wp-content/uploads/2017/03/slide04.jpg 1000w, http://www.winwin97.com/wp-content/uploads/2017/03/slide04-300x90.jpg 300w, http://www.winwin97.com/wp-content/uploads/2017/03/slide04-768x230.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></p>
					<h3 style="text-align: center;">ค่าคอม 1% ทุกคาสิโน</h3>
					<p style="text-align: center;">ค่าคอม1% ได้รับทุกคาสิโน ( ออกทุกวันจันทร์ ไม่เกินเวลสองทุ่ม )</p>
					<hr />
					<p><img class="alignnone size-full wp-image-449" src="http://www.winwin97.com/wp-content/uploads/2017/03/slide03.jpg" alt="" width="1000" height="300" srcset="http://www.winwin97.com/wp-content/uploads/2017/03/slide03.jpg 1000w, http://www.winwin97.com/wp-content/uploads/2017/03/slide03-300x90.jpg 300w, http://www.winwin97.com/wp-content/uploads/2017/03/slide03-768x230.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></p>
					<p style="text-align: center;"><strong>คืนยอดเสีย5% คืนให้ทุกสิ้นเดือน</strong></p>
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