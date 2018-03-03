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

    <link href="<?=baseurl().'/css/materailize-icon.css'?>" rel="stylesheet">
    <link href="<?=baseurl().'/css/vuetify.min.css'?>" rel="stylesheet">

   

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
             
         </v-app>
    </div>
    <?php
        $cs->registerScriptFile(baseurl().'/js/vue.js',CClientScript::POS_END);
        $cs->registerScriptFile(baseurl().'/js/vuetify.js',CClientScript::POS_END);
        $cs->registerScriptFile(baseurl().'/js/_js.js',CClientScript::POS_END);
    ?>
</body>
</html>