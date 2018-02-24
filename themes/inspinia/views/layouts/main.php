<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= CHtml::encode($this->pageTitle); ?></title>

    <link href="<?= baseurl() ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= baseurl() ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= baseurl() ?>/css/animate.css" rel="stylesheet">
    <link href="<?= baseurl() ?>/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php require_once('tpl_sidebar.php')?>

        <div id="page-wrapper" class="gray-bg">

            <?php require_once('tpl_navtop.php')?>

            <div class="breadcrumbs" id="breadcrumbs">
                <?php if(isset($this->breadcrumbs)):?>
                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>Data Tables</h2>
                            <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                                'links' => $this->breadcrumbs,
                            )); ?>
                        </div>
                    </div>
                <?php endif?>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <?= $content; ?>
                </div>
            </div>

            <?php require_once('tpl_footer.php')?>

        </div>


    </div>


    <!--<script src="<?/*= baseurl() */?>/js/jquery-3.1.1.min.js"></script>-->
    <script src="<?= baseurl() ?>/js/bootstrap.min.js"></script>
    <script src="<?= baseurl() ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= baseurl() ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="<?= baseurl() ?>/js/inspinia.js"></script>
    <script src="<?= baseurl() ?>/js/plugins/pace/pace.min.js"></script>

</body>
</html>