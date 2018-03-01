<v-flex xs12 sm12 md12>
    <img src="<?=baseurl().'/images/'?>head-winwin97.jpg" width="100%">
</v-flex>

<v-flex xs12 sm12 md12  flat height="200px" tile>
    <v-toolbar justify-center dense color="blue-grey darken-4">
        <v-toolbar-title class="white--text">ยินดีต้อนรับที่มาเล่นใน WinWin97 Lucky Draw</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn color="success">โปรไฟล์</v-btn>
        <v-btn color="info" @click="dialog2=true">แจ้งถอนเงิน</v-btn>
        <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">
            <v-btn color="warning">ออกจากระบบ</v-btn>
        </a>

    </v-toolbar>
</v-flex>
