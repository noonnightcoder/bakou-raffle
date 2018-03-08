<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
   <meta charset="utf-8" />
   <title><?= CHtml::encode($this->pageTitle); ?></title>
   <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <?php
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile(baseurl().'/js/jquery.min.js',CClientScript::POS_BEGIN);
    ?>


    <link href="<?=baseurl().'/css/materailize-icon.css'?>" rel="stylesheet">
    <link href="<?=baseurl().'/css/vuetify.min.css'?>" rel="stylesheet">
    <link href="http://www.winwin97.com/wp-content/themes/ThaiTheme-SBO/favicon.ico?v=3.2.7" rel="shortcut icon" />
    <link href="http://www.winwin97.com/wp-content/themes/ThaiTheme-SBO/css/pc-thaitheme.css?v=1.2.7" rel="stylesheet" type="text/css" />
    <link href="http://www.winwin97.com/wp-content/themes/ThaiTheme-SBO/css/animate.css?v=2.1" rel="stylesheet" type="text/css" /><link rel='dns-prefetch' href='//s.w.org' />
    <link rel='stylesheet' id='contact-form-7-css'  href='http://www.winwin97.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.7' type='text/css' media='all' />
    <script type='text/javascript' src='http://www.winwin97.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='http://www.winwin97.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <link rel='https://api.w.org/' href='http://www.winwin97.com/wp-json/' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.winwin97.com/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.winwin97.com/wp-includes/wlwmanifest.xml" /> 
    <meta name="generator" content="WordPress 4.7.9" />
    <style type="text/css">body{background-color:#0c0d0f;background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:center top;background-image:url('http://www.winwin97.com/wp-content/uploads/2017/03/wallpaper.jpg');}</style> 

    <?php
        if (Yii::app()->components['user']->loginRequiredAjaxResponse){
            Yii::app()->clientScript->registerScript('ajaxLoginRequired', '
                    jQuery("body").ajaxComplete(
                        function(event, request, options) {
                            if (request.responseText == "'.Yii::app()->components['user']->loginRequiredAjaxResponse.'") {
                                window.location.href = options.url;
                            }
                        }
                    );
                ');
        }
    ?>
</head>

<body>
    
     <div id="app">
         <v-app id="aspire" style="background-image:url('<?=baseurl().'/images/'?>bd_bg.png') !important;background-repeat:repeat !important; ">
             <!-- Include content pages -->
             <?= $content ?>
             
         </v-app>
    </div>
    <?php
        $cs->registerScriptFile(baseurl().'/js/vue.js',CClientScript::POS_END);
        $cs->registerScriptFile(baseurl().'/js/vuetify.js',CClientScript::POS_END);
        $cs->registerScriptFile(baseurl().'/js/_js.js',CClientScript::POS_END);
    ?>
</body>
</html>