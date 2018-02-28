<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main_frontend'); ?>

  <div class="row-fluid">
        <div class="span9">
            <!-- Include content pages -->
            <?php echo $content; ?>

        </div><!--/span-->
  </div><!--/row-->

<?php $this->endContent(); ?>