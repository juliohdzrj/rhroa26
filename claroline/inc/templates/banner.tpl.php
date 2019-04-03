<!-- $Id: banner.tpl.php 13151 2011-05-11 12:09:47Z abourguignon $ -->

<!-- claroPage -->

<div id="chat-circle" class="btn btn-raised">
    <div id="chat-overlay"></div>
    <i class="material-icons">chat</i>
</div>

<div class="chat-box">
    <div class="chat-box-header">
        <div style="float:left;margin-top:7px;margin-left:7px;"><button type="button" class="btn btn-primary" id="chat-close">Cerrar</button></div>
        <div style="float:right;padding-top:10px;padding-right:10px;"><span class="chat-box-toggle"><i class="material-icons">close</i></span></div>
    </div>
    <div class="chat-box-body">
        <div class="chat-box-overlay">
        </div>
        <div class="chat-logs">

        </div><!--chat-log -->
    </div>
    <div class="chat-input">
        <form>
            <input type="text" id="chat-input" placeholder="Mensaje..."/>
            <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">send</i></button>
        </form>
    </div>
</div>



<div id="claroPage" class="container">





<!-- Banner -->
<div id="topBanner">
    <!-- Smartsupp Live Chat script -->
    <!--script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '66649493d5daa55e24113ba1477c932db7b85a62';
        window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script-->
<!-- Platform Banner -->
<div id="platformBanner" class="row">
    <div id="campusBannerLeft" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
	    <div class="logoaula">

		    <?php
		    //$valueChat1=$_SESSION["_user"]["username"]."-".$_SESSION["_user"]["firstName"]."-".$_SESSION["_user"]["lastName"]."-".$_SESSION["_user"]["mail"]."-".$_SESSION["_user"]["phone"];
            $valueChat=base64_encode($_SESSION["_user"]["username"]."-".$_SESSION["_user"]["firstName"]."-".$_SESSION["_user"]["lastName"]."-".$_SESSION["_user"]["mail"]."-".$_SESSION["_user"]["phone"]);
            setcookie("iu", $valueChat);
            //echo $valueChat1;
		    if (isset($_SESSION["_user"]["userId"])) : ?>
        <span id="siteName">
            <a href="<?php echo get_path('url'); ?>/index.php" target="_top">
            <?php if (get_conf('siteLogo') != '') : ?>
            <img width="100%" src="<?php echo get_conf('siteLogo'); ?>" alt="<?php echo get_conf('siteName'); ?>" />
            <?php else : ?>
            <?php echo get_conf('siteName'); ?>
            <?php endif; ?>
            </a>
        </span>
		    <?php endif; ?>
        <?php include_dock('campusBannerLeft'); ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
    <div id="campusBannerRight" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="logorh">
        <span id="institution">
            <?php if (get_conf('institution_url') != '') : ?>
            <a href="<?php echo get_conf('institution_url'); ?>" target="_top">
            <?php endif; ?>

            <?php if (get_conf('institutionLogo') != '') : ?>
            <img width="100%" src="<?php echo get_conf('institutionLogo'); ?>" alt="<?php echo get_conf('institution_name'); ?>" />
            <?php else : ?>
            <?php echo get_conf('institution_name'); ?>
            <?php endif; ?>

            <?php if (get_conf('institution_url') != '') : ?>
            </a>
            <?php endif; ?>
        </span>
        <?php include_dock('campusBannerRight'); ?>
</div>
    </div>
    <!--div class="fracerh">+ Recursos + Humanos</div-->
    <!--div class="spacer"></div-->
</div>
<!-- End of Platform Banner -->

<?php if ( $this->userBanner && property_exists($this, 'user') ): ?>

<!--div-->
<!-- User Banner -->
<div id="userBanner" class="row">
    <div id="userBannerLeft" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <ul class="menu">
            <?php foreach($this->userToolListLeft as $menuItem) : ?>
            <li><span><?php echo $menuItem; ?></span></li>
            <?php endforeach; ?>
            <?php include_dock('userBannerLeft', true); ?>
        </ul>
        
    </div>
    
    <div id="userBannerRight" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <ul class="menu">
            <li class="userName">
                <?php
                echo get_lang('%firstName %lastName', array(
                    '%firstName' => $this->user['firstName'],
                    '%lastName' => $this->user['lastName']));
                ?>
            </li>
            <?php foreach($this->userToolListRight as $menuItem) : ?>
            <li><span><?php echo $menuItem; ?></span></li>
            <?php endforeach; ?>
            <?php include_dock('userBannerRight', true); ?>
        </ul>
        
    </div>
    
    <div class="spacer"></div>
</div>
<!--/div-->





<?php else : ?>

<div class="row">
<div id="userBanner" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div id="userBannerRight">


        <ul class="menu">
            <li><span><?php echo $this->viewmode->render(); ?></span></li>
        </ul>


    </div>
    
    <div class="spacer"></div>
</div>
</div>
<!-- End of User Banner -->
<?php endif; ?>

<?php if ( $this->breadcrumbLine ): ?>
<!-- BreadcrumbLine  -->
<div id="breadcrumbLine" class="row">
    <!--hr /-->
    <div class="breadcrumbTrails" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php echo $this->breadcrumbs->render(); ?>
    </div>
    
    <div id="toolViewOption" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php if (claro_is_user_authenticated()) : ?>
        <?php echo $this->viewmode->render(); ?>
        <?php endif; ?>
    </div>
    
    <div class="spacer"></div>
    <!--hr /-->
</div>
<!-- End of BreadcrumbLine  -->
<?php endif; ?>

</div>
<!-- End of topBanner -->

