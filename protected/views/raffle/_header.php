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
<v-flex xs12 sm12 md12  flat height="200px" tile>
	<v-toolbar dense style="height: 30px; background-image: url('<?=baseurl().'/images/menu-bar-bg.png'?>');background-repeat: repeat-x;">
	    <v-toolbar-items v-for="(menu,i) in menus" :key="i">
	        <a :href="menu.link" style="font-size: 13px;text-decoration: none;color:#FFF; padding: 5px 10px 0px 10px;">
	            {{menu.text}}
	        </a>
	    </v-toolbar-items>
        <v-spacer></v-spacer>
        
    </v-toolbar>
    <!-- <v-toolbar justify-center dense color="blue-grey darken-4">
        <v-toolbar-title class="white--text">ยินดีต้อนรับที่มาเล่นใน WinWin97 Lucky Draw</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn color="success">โปรไฟล์</v-btn>
        <v-btn color="info" @click="dialog2=true">แจ้งฝากเงิน</v-btn>
        <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">
            <v-btn color="warning">ออกจากระบบ</v-btn>
=======
<v-flex xs12 sm12 md12 flat height="100px" tile>
    <v-toolbar justify-center dense color="blue-grey darken-4">
        <!--<v-toolbar-title class="white--text">ยินดีต้อนรับที่มาเล่นใน WinWin97 Lucky Draw</v-toolbar-title>-->
        <a href="#" style="font-size: 13px;text-decoration: none;color:#333; padding: 5px 10px 0px 10px;">
            Register
        <!-- Stashed changes -->
        </a>

    </v-toolbar>
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
</style>
