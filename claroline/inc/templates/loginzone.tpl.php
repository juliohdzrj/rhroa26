<!-- $Id: loginzone.tpl.php 13359 2011-07-25 16:07:29Z abourguignon $ -->

<?php if ( count( get_included_files() ) == 1 ) die( basename(__FILE__) ); ?>

<div id="loginBox">
<h2 class="blockHeader"><?php echo get_lang('Authentication'); ?></h2>

<?php if ( get_conf('claro_CasEnabled') ) : ?>
<!-- CAS login hyperlink -->
<div align="center">
<a href="<?php echo get_path('clarolineRepositoryWeb'); ?>auth/login.php?authModeReq=CAS">
<?php echo get_conf('claro_CasLoginString'); ?>
</a>
</div>
<?php endif; ?>


<?php if( get_conf('claro_displayLocalAuthForm') ) : ?>
<script type="text/javascript">
<!--
$(document).ready( function(){
    $("#login").focus();
});
//-->
</script>
<?php if( get_conf('claro_secureLogin', false) ) : ?>
 <!-- Authentication Form -->
<form class="claroLoginForm" action="<?php echo 'https://'.$_SERVER['HTTP_HOST'] . get_path('clarolineRepositoryWeb'); ?>auth/login.php" method="post">
<?php else: ?>
    <div class="form-group">
<form class="claroLoginForm" action="<?php echo get_path('clarolineRepositoryWeb'); ?>auth/login.php" method="post">
<?php endif; ?>
    <fieldset style="border: 0; margin: 10px 0 15px 0; padding: 5px;">
        <label for="login"><?php echo get_lang('Username'); ?></label>
        <input type="text" name="login" id="login" class="inputLogin form-control" size="12" tabindex="1" placeholder="Ingresa tu correo corporativo"/><br />
        <label for="password"><?php echo get_lang('Password'); ?></label>
        <input type="password" name="password" id="password" class="inputPassword form-control" size="12" tabindex="2" />
        <br />
        <button type="submit" tabindex="3" class="btn btn-primary" style="width: 100%"><?php echo get_lang('Enter'); ?></button>
    </fieldset>
</form>
    </div>

<p style="padding: 5px;">
<?php   if( get_conf('claro_displayLostPasswordLink', true) ) : ?>
<!-- "Lost Password" -->
<a href="<?php echo get_path('clarolineRepositoryWeb'); ?>auth/lostPassword.php"><?php echo get_lang('Lost password'); ?></a><br />
<?php   endif; ?>

<?php   if( get_conf('allowSelfReg') ) : ?>
<!-- "Create user Account" -->
<a href="<?php echo get_path('clarolineRepositoryWeb'); ?>auth/inscription.php"><?php echo get_lang('Create user account'); ?></a><br />
<?php   endif; ?>
</p>

<?php endif; ?>

</div>