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
    ?>

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">


    <?php
        $cs->registerScriptFile('https://unpkg.com/vue/dist/vue.js',CClientScript::POS_BEGIN);
        $cs->registerScriptFile('https://unpkg.com/vuetify/dist/vuetify.js',CClientScript::POS_BEGIN);
    ?>

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
         <v-app id="aspire" xs12 style="background-image:url('<?=baseurl().'/images/'?>bd_bg.png') !important;background-repeat:repeat !important; ">
             <!-- Include content pages -->
             <?= $content ?>
             <?php include('tpl_footer_frontend.php') ?>
         </v-app>
    </div>
</body>
</html>