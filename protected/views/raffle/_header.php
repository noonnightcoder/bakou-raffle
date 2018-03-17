<v-flex xs12 sm12 md12>
	<v-toolbar dense style="height: 30px;">
        <v-toolbar-items>
        <a href="<?= Yii::app()->createUrl('site/logout'); ?>" style="font-size: 13px;text-decoration: none;color:#333; padding: 5px 10px 0px 10px;">
            ออกจากระบบ
        </a>
            <a style="font-size: 13px;text-decoration: none;color:#333; padding: 5px 10px 0px 10px;"><?=date('Y-m-d H:i:s');?></a>
      </v-toolbar>
</v-flex>
<v-flex xs12 sm12 md12>
    <img src="<?=baseurl().'/images/'?>head-winwin97.jpg" width="100%">
</v-flex>

<!-- Updated upstream  -->
<v-flex xs12 sm12 md12  flat tile>
    <nav style="height: 30px !important;z-index: 1 !important;margin-top: -10px; color: #FFF">
    <v-toolbar class="hidden-sm-and-down text-sm-left" style="height: 30px !important; background-image: url('<?=baseurl().'/images/menu-bar-bg.png'?>');background-repeat: repeat-x;">

        <v-toolbar-items>
            <?= l(t('Home','app'),url('raffle/index'), array(
                    'style' => 'font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;'
            )); ?>

            <?= l(t('Online Casino','app'),url('raffle/casino'), array(
                'style' => 'font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;'
            )); ?>

            <?= l(t('Online Sport','app'),url('raffle/sport'), array(
                'style' => 'font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;'
            )); ?>

            <?= l(t('Online Lottery','app'),url('raffle/lottery'), array(
                'style' => 'font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;'
            )); ?>

            <?= l(t('Online Raffle','app'),url('raffle/index'), array(
                'style' => 'font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;'
            )); ?>

            <?= l(t('Promotion','app'),url('raffle/promotion'), array(
                'style' => 'font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;'
            )); ?>

            <?= l(t('Raffle Result','app'),url('raffle/result'), array(
                'style' => 'font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;'
            )); ?>

        </v-toolbar-items>

        <!-- I change to Yii way for time being, it's a bit hard to add URL text link address with translation in _js.js file -->
        <!--<v-toolbar-items>
               <a href="#" style="font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;">
                    Home
                </a>
          </v-toolbar-items>
          <v-toolbar-items v-for="(menu,i) in menus" :key="i" >
              <a :href="menu.link" style="font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;">
                    {{menu.text}}
              </a>
          </v-toolbar-items>-->
    </v-toolbar>

        <!-- What is this block for in the page - Lux -->
        <!--this is menu responsive when user use website via mobile-->

    <div class="hidden-md-and-up">
      <v-expansion-panel >
        <v-expansion-panel-content style="background-color: #660607; color: #FFF" >
          <div slot="header" style="margin-top: -5px;">
            <a href='#' style="font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px; margin-left: -20px;">Home</a>
          </div>
            <div scrollable style="max-height:350px;overflow-y:scroll;backface-visibility:hidden;z-index: 1000;position: relative;">
              <v-card v-for="(menu,i) in menus" :key="i" style="background-color: #660607;margin-top: -20px;">
                <a :href="menu.link" style="font-size: 13px;text-decoration: none;color:#FFFFFF; padding: 5px 10px 0px 10px;">
                    <v-card-text>{{menu.text}}</v-card-text>
                </a>
              </v-card>
          </div>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </div>
        
  </nav>
	
</v-flex>

<style type="text/css">
	a.a-link1{
		font-size: 11px;
		color: #333 !important;
		text-decoration: none !important;
	}

    .header-menu {
        font-size: 13px;
        text-decoration: none;
        color:#00aa00;
        padding: 3px 10px 0px 10px;
    }
    .expansion-panel__container .header__icon{
        margin-top: -20px !important;
    }
</style>
<script type="text/javascript">
    document.getElementsByClassName('header__icon').style.margin-top=-20px;
</script>
