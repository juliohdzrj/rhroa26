<!-- $Id: auth_form.tpl.php 14314 2012-11-07 09:09:19Z zefredz $ -->

<?php echo $this->dialogBox->render(); ?>

<!--style="width: 180px; margin: 0 auto;"-->

<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">&ensp;</div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <form class="claroLoginForm" action ="<?php echo $this->formAction; ?>" method="post">
        <fieldset>
          <legend><?php echo get_lang('Authentication Required'); ?></legend>
            <input type="hidden" name="sourceUrl" value="<?php echo $this->sourceUrl; ?>" />
            <input type="hidden" name="sourceCid" value="<?php echo $this->sourceCid; ?>" />
            <input type="hidden" name="sourceGid" value="<?php echo $this->sourceGid; ?>" />
            
            <?php if ($this->cidRequired) : ?>
            <input type="hidden" name="cidRequired" value="true" />
            <?php endif; ?>
            
            <label for="login"><?php echo get_lang('Username'); ?></label><br />
            <input type="text" class="form-control" name="login" id="login" size="15" tabindex="1" placeholder="Ingresa tu correo corporativo" value="<?php echo claro_htmlspecialchars($this->defaultLoginValue); ?>"/>
            <!--p>Ingresa tu correo corporativo</p-->
            <br />

            <label for="password"><?php echo get_lang('Password'); ?></label><br />
            <input type="password" class="form-control" name="password" id="password" size="15" tabindex="2" autocomplete="off"  /><br />
            <br />
            <input type="submit" class="btn btn-primary" value="<?php echo get_lang('Enter'); ?>" />&nbsp;
            <?php echo claro_html_button(get_path('clarolineRepositoryWeb'), get_lang('Cancel')); ?>
        </fieldset>
    </form>
    </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">&ensp;</div>
    <?php if (get_conf('claro_CasEnabled', false)) : ?>
    <a href="login.php?<?php echo ($this->sourceUrl ? 'sourceUrl='.urlencode($this->sourceUrl) : ''); ?>&authModeReq=CAS">
        <?php echo ('' != trim(get_conf('claro_CasLoginString', '')) ? get_conf('claro_CasLoginString') : get_lang('Login')); ?>
    </a>
    <?php endif; ?>
</div>