<!-- $Id: footer.tpl.php 12676 2010-10-20 14:59:33Z abourguignon $ -->

<?php  if ( count( get_included_files() ) == 1 ) die( basename(__FILE__) ); ?>

<div id="campusFooter" class="row">
    <hr />
    <div id="campusFooterLeft" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <?php include_dock('campusFooterLeft'); ?>
        <?php echo $this->courseManager;?>
    </div>

    <div id="campusFooterCenter" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <?php include_dock('campusFooterCenter'); ?>
        <?php echo $this->poweredBy;?>
    </div>

    <div id="campusFooterRight" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<?php include_dock('campusFooterRight'); ?>
		<?php echo $this->platformManager;?>
    </div>

</div>
<!-- end of claroPage -->
</div>