<!-- $Id: user_profilebox.tpl.php 14448 2013-05-15 08:47:35Z zefredz $ -->
<div id="userProfileBox" >
    <h3 class="blockHeader">
        <span class="userName">

            <?php //print_r($this->userData); ?>

            <?php if ($this->condensedMode && $this->userData['user_id'] == claro_get_current_user_id()) : ?>
	            <a href="<?php echo get_path('clarolineRepositoryWeb'); ?>desktop/index.php">
                    <?php echo $this->userFullName; ?>
                </a>
            <?php else : ?>
                <span style="color:#369">MI PERFIL</span>
                <?php //echo $this->userFullName; ?>
            
            <?php endif; ?>
        </span>
    </h3>
    <div id="userProfile">
        <?php if ( get_conf('allow_profile_picture') ) : ?>
        <div id="userPicture">
            <img class="userPicture" src="<?php echo $this->pictureUrl; ?>" alt="<?php echo get_lang('User picture'); ?>" />
        </div>
        
        <?php endif; ?>
        
        <div id="userDetails">
            <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td><span> Nombre de usuario<?php //echo get_lang('Email'); ?></span></td>
                    <td><?php echo (!empty($this->userData['username']) ? claro_htmlspecialchars($this->userData['username']) : '-' ); ?></td>
                </tr>
                <tr>
                    <td><span> Puesto<?php //echo get_lang('Email'); ?></span></td>
                    <td><?php echo (!empty($this->userData['puesto']) ? claro_htmlspecialchars($this->userData['puesto']) : '-' ); ?></td>
                </tr>
                <tr>
                    <td><span> Área<?php //echo get_lang('Email'); ?></span></td>
                    <td><?php echo (!empty($this->userData['area']) ? claro_htmlspecialchars($this->userData['area']) : '-' ); ?></td>
                </tr>
                <tr>
                    <td><span><?php echo get_lang('Email'); ?></span></td>
                    <td><?php echo (!empty($this->userData['email']) ? claro_htmlspecialchars($this->userData['email']) : '-' ); ?></td>
                </tr>
                <?php
                if (!$this->condensedMode) :
                ?>
                <tr>
                    <td><span><?php echo get_lang('Phone'); ?></span></td>
                    <td><?php echo (!empty($this->userData['phone']) ? claro_htmlspecialchars($this->userData['phone']) : '-' ); ?></td>
                </tr>
                <tr>
                    <td><span>Ext.</span></td>
                    <td><?php echo (!empty($this->userData['ext']) ? claro_htmlspecialchars($this->userData['ext']) : '-' ); ?></td>
                </tr>
                <tr>
                    <td><span>Ubicación</span></td>
                    <td><?php echo (!empty($this->userData['ubicacion']) ? claro_htmlspecialchars($this->userData['ubicacion']) : '-' ); ?></td>
                </tr>
                <tr>
                    <td><span>Aniversario</span></td>
                    <td><?php echo (!empty($this->userData['aniversario']) ? claro_htmlspecialchars($this->userData['aniversario']) : '-' ); ?></td>
                </tr>
                <tr>
                    <td><span>Cumpleaños</span></td>
                    <td><?php echo (!empty($this->userData['cumple']) ? claro_htmlspecialchars($this->userData['cumple']) : '-' ); ?></td>
                </tr>

                <!--tr>
                    <td><span><?php echo get_lang('Administrative code'); ?></span></td>
                    <td><?php echo (!empty($this->userData['officialCode']) ? claro_htmlspecialchars($this->userData['officialCode']) : '-' ); ?></td>
                </tr-->

                </tbody>
            </table>
            </div>
	        <?php if( $this->userId == claro_get_current_user_id() || claro_is_platform_admin () ): ?>
                <p>

			        <?php if( $this->userId == claro_get_current_user_id() ): ?>

                        <a class="claroCmd" href="<?php  echo get_path('clarolineRepositoryWeb'); ?>auth/profile.php">
                            <img src="<?php echo get_icon_url('edit'); ?>" alt="<?php echo get_lang('Manage my account'); ?>" />
					        <?php echo get_lang('Manage my account'); ?>
                        </a>

			        <?php else: ?>

                        <a class="claroCmd" href="<?php  echo get_path('clarolineRepositoryWeb'); ?>admin/admin_profile.php?uidToEdit=<?php echo $this->userId; ?>">
                            <img src="<?php echo get_icon_url('edit'); ?>" alt="<?php echo get_lang('User settings'); ?>" />
					        <?php echo get_lang('User settings'); ?>
                        </a>

			        <?php endif; ?>

                </p>

	        <?php endif; ?>
	        <?php if (get_conf('is_trackingEnabled')&&claro_is_platform_admin ()): ?>
                <p>
                    <a class="claroCmd" href="<?php echo Url::Contextualize(get_path('clarolineRepositoryWeb')
		                                                                    .'tracking/userReport.php?userId='.claro_get_current_user_id()); ?>">
                    <img src="<?php echo get_icon_url('statistics'); ?>" alt="<?php echo get_lang('Statistics'); ?>" />
                    <?php echo get_lang('View my statistics'); ?>
                    </a>
                </p>

	        <?php endif; ?>

	        <?php endif;?>
            
        </div>
    </div>

    <?php if (!$this->condensedMode) : ?>
    <div id="userProfileBoxDock"><?php echo $this->dock->render(); ?></div>
    
    <?php endif; ?>
</div>
