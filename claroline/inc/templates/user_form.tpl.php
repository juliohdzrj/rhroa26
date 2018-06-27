<!-- $Id: user_form.tpl.php 14314 2012-11-07 09:09:19Z zefredz $ -->

<form id="userSettings" method="post" action="<?php echo $this->formAction; ?>" enctype="multipart/form-data">
	<?php echo $this->relayContext ?>
    <input type="hidden" id="cmd" name="cmd" value="registration" />
    <input type="hidden" name="claroFormId" value="<?php echo uniqid(''); ?>" />

	<?php if (claro_is_user_authenticated()) : ?>
        <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
	<?php endif; ?>

	<?php if (isset($this->data['confirmUserCreate'])) : ?>
        <input type="hidden" id="confirmUserCreate" name="confirmUserCreate" value="<?php echo ($this->data['confirmUserCreate'] ? 1 : 0); ?>" />
	<?php endif; ?>

	<?php if (!empty($this->data['user_id'])) : ?>
        <input type="hidden" id="uidToEdit" name="uidToEdit" value="<?php echo $this->data['user_id']; ?>" />
	<?php endif; ?>



    <!-- FIRST SECTION: personal informations -->
    <fieldset>
        <legend>
			<?php echo get_lang('Personal informations'); ?>
        </legend>

        <dl>

            <dt style="display: none">
                <label for="updatereg">
                    Fecha
			        <?php//echo get_lang('Last name'); ?>
                    <!--span class="required">*</span-->
                </label>
            </dt>

            <dd style="display: none">

                <input type="text" id="updatereg" name="updatereg" value="<?php echo date("Y-m-d h:i:s"); ?>"/>

            </dd>


            <dt>
                <label for="lastname">
					<?php echo get_lang('Last name'); ?>
                    <span class="required">*</span>
                </label>
            </dt>
            <dd>
				<?php if (in_array('name', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $this->data['lastname']; ?>" />

				<?php else : ?>

					<?php echo $this->data['lastname']; ?>
                    <input type="hidden" class="form-control" id="lastname" name="lastname" value="<?php echo $this->data['lastname']; ?>" />

				<?php endif; ?>
            </dd>
            <dt>
                <label for="firstname">
					<?php echo get_lang('First name'); ?>
                    <span class="required">*</span>
                </label>
            </dt>
            <dd>
				<?php if (in_array('name', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $this->data['firstname']; ?>" />

				<?php else : ?>

					<?php echo $this->data['firstname']; ?>
                    <input type="hidden" class="form-control" id="firstname" name="firstname" value="<?php echo $this->data['firstname']; ?>" />

				<?php endif; ?>
            </dd>

<!--CAMPOS NO EDITABLES ULTIMA MODIFICACIÓN-->
            <dt>
                <label for="puesto">
			        <?php echo('Puesto'); //echo get_lang('First name'); ?>
                    <!--span class="required">*</span-->
                </label>
            </dt>
            <dd>
		        <?php if (in_array('puesto', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $this->data['puesto']; ?>" />

		        <?php else : ?>

			        <?php echo $this->data['puesto']; ?>
                    <input type="hidden" id="puesto" name="puesto" value="<?php echo $this->data['puesto']; ?>" />

		        <?php endif; ?>
            </dd>
            <dt>
                <label for="area">
			        <?php echo('Área'); //echo get_lang('First name'); ?>
                    <!--span class="required">*</span-->
                </label>
            </dt>
            <dd>
		        <?php if (in_array('area', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="area" name="area" value="<?php echo $this->data['area']; ?>" />

		        <?php else : ?>

			        <?php echo $this->data['area']; ?>
                    <input type="hidden" id="area" name="area" value="<?php echo $this->data['area']; ?>" />

		        <?php endif; ?>
            </dd>


            <dt>
                <label for="aniversario">
			        <?php echo('Aniversario'); //echo get_lang('First name'); ?>
                    <!--span class="required">*</span-->
                </label>
            </dt>

            <dd>
		        <?php if (in_array('aniversario', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="aniversario" name="aniversario" value="<?php echo $this->data['aniversario']; ?>" />

		        <?php else : ?>

			        <?php echo $this->data['aniversario']; ?>
                    <input type="hidden" id="aniversario" name="aniversario" value="<?php echo $this->data['aniversario']; ?>" />

		        <?php endif; ?>
            </dd>

            <dt>
                <label for="cumple">
			        <?php echo('Cumpleaños'); //echo get_lang('First name'); ?>
                    <!--span class="required">*</span-->
                </label>
            </dt>

            <dd>
		        <?php if (in_array('cumple', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="cumple" name="cumple" value="<?php echo $this->data['cumple']; ?>" />

		        <?php else : ?>

			        <?php echo $this->data['cumple']; ?>
                    <input type="hidden" id="cumple" name="cumple" value="<?php echo $this->data['cumple']; ?>" />

		        <?php endif; ?>
            </dd>





            <dt>
                <label for="ubicacion">
			        <?php echo('Ubicación'); //echo get_lang('First name'); ?>
                    <!--span class="required">*</span-->
                </label>
            </dt>
            <dd>
		        <?php if (in_array('ubicacion', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo $this->data['ubicacion']; ?>" />

		        <?php else : ?>

			        <?php echo $this->data['ubicacion']; ?>
                    <input type="hidden" id="ubicacion" name="ubicacion" value="<?php echo $this->data['ubicacion']; ?>" />

		        <?php endif; ?>
            </dd>








            <!--TERMINA CAMPOS NO EDITABLES ULTIMA MODIFICACIÓN-->




			<?php if (get_conf('ask_for_official_code')&&claro_is_platform_admin()): ?>

                <dt>
                    <label for="officialCode">
						<?php echo get_lang('Administrative code'); ?>

						<?php if (!get_conf('userOfficialCodeCanBeEmpty')) : ?>

                            <span class="required">*</span>

						<?php endif; ?>
                    </label>
                </dt>

				<?php if (in_array('official_code', $this->editableFields)) : ?>

                    <dd>
                        <input type="text" class="form-control" id="officialCode" name="officialCode" value="<?php echo $this->data['officialCode']; ?>" />
                    </dd>

				<?php else : ?>

                    <dd>
						<?php echo $this->data['officialCode']; ?>
                        <input type="hidden" class="form-control" id="officialCode" name="officialCode" value="<?php echo $this->data['officialCode']; ?>" />
                    </dd>

				<?php endif; ?>

			<?php endif;?>

			<?php if ( in_array('language', $this->editableFields)
			           && !empty($this->languages)
			           && count($this->languages) > 1) : ?>

                <dt>
                    <label for="language">
						<?php echo get_lang('Language'); ?>
                    </label>
                </dt>
                <dd>
                    <select id="language" name="language">

						<?php foreach ($this->languages as $key => $elmt) : ?>

                            <option value="<?php echo $elmt; ?>"<?php if ($elmt == $this->currentLanguage) : ?> selected="selected"<?php endif; ?>>
								<?php echo $key; ?>
                            </option>

						<?php endforeach; ?>

                    </select>
                </dd>

			<?php endif; ?>

			<?php if (get_conf('allow_profile_picture')
			          && in_array('picture', $this->editableFields) && !empty($this->data['user_id'])) : ?>

                <dt>
                    <label for="picture">
						<?php echo get_lang('User picture'); ?>
                    </label>
                </dt>

				<?php if (!empty($this->pictureUrl)) : ?>

                    <dd>
                        <img class="userPicture" src="<?php echo $this->pictureUrl; ?>" alt="<?php echo get_lang('User picture'); ?>" />
                        <br />
                        <input type="checkbox" name="delPicture" id="delPicture" value="true" />
                        <label for="delPicture"><?php echo get_lang('Delete picture'); ?></label>
						<?php if (!empty($this->data['picture'])) : ?>
                            <input type="hidden" name="userPicture" id="userPicture" value="<?php echo $this->data['picture']; ?>" />
						<?php endif; ?>
                    </dd>

				<?php else : ?>

                    <dd>
                        <input type="file" class="form-control" name="picture" id="picture" /><br />
                        <span class="notice">
                        <?php echo get_lang("max size %width%x%height%, %size% bytes", array(
	                        '%width%' => get_conf('maxUserPictureWidth', 150),
	                        '%height%' => get_conf('maxUserPictureHeight', 200),
	                        '%size%' => get_conf('maxUserPictureHeight', 100*1024)));
                        ?>
                    </span>
                    </dd>

				<?php endif; ?>

			<?php endif; ?>

        </dl>

    </fieldset>



    <!-- SECOND SECTION: platform's account -->
    <fieldset>
        <legend>
			<?php echo get_lang('User account'); ?>
        </legend>

        <dl>

			<?php if (empty($this->data['user_id'])) : ?>

                <dt></dt>
                <dd>
                    <p class="notice">
						<?php echo get_lang('Choose now a username and a password for the user account'); ?><br />
						<?php echo get_lang('Memorize them, you will use them the next time you will enter to this site.'); ?>
                    </p>
                </dd>

			<?php endif; ?>

			<?php if (!empty($this->data['user_id']) && claro_is_platform_admin()) : ?>

                <dt>
					<?php echo get_lang('User id'); ?>
                </dt>
                <dd>
					<?php echo $this->data['user_id']; ?>
                </dd>

			<?php endif; ?>

			<?php if ( !empty($this->data['username'])
			           && !in_array( 'login', $this->editableFields ) ) : ?>

                <dt>
					<?php echo get_lang('Username'); ?>
                    <span class="required">*</span>
                </dt>
                <dd>
					<?php echo claro_htmlspecialchars($this->data['username']); ?>
                    <input type="hidden" class="form-control" name="username" id="username" value="<?php echo claro_htmlspecialchars($this->data['username']); ?>" />
                </dd>

			<?php else : ?>

                <dt>
                    <label for="username">
						<?php echo get_lang('Username'); ?>
                        <span class="required">*</span>
                    </label>
                </dt>
                <dd>
					<?php if (in_array('login', $this->editableFields)) : ?>

                        <input type="text" class="form-control" name="username" id="username" value="<?php echo claro_htmlspecialchars($this->data['username']); ?>" />

					<?php else : ?>

						<?php echo claro_htmlspecialchars($this->data['username']); ?>
                        <input type="hidden" class="form-control" name="username" id="username" value="<?php echo claro_htmlspecialchars($this->data['username']); ?>" />

					<?php endif; ?>
                </dd>

			<?php endif; ?>

			<?php if (in_array('password', $this->editableFields)) : ?>

				<?php if (!empty($this->data['user_id']) && $this->data['user_id'] == claro_get_current_user_id()) : ?>

                    <dt>&nbsp;</dt>
                    <dd>
                        <p class="notice"><?php echo get_lang('Enter new password twice to change, leave empty to keep it'); ?></p>
                    </dd>

                    <dt>
                        <label for="old_password">
							<?php echo get_lang('Old password'); ?>
                        </label>
                    </dt>
                    <dd>
                        <input type="password" class="form-control" autocomplete="off" name="old_password" id="old_password" />
                    </dd>

				<?php endif; ?>

                <dt>
                    <label for="password">

						<?php

						if (!empty($this->data['user_id'])) :

							echo get_lang('New password');

						else :

							echo get_lang('Password');

						endif;

						?>

                        <span class="required">*</span>
                    </label>
                </dt>
                <dd>
                    <input type="password" class="form-control" autocomplete="off" name="password" id="password" />
                </dd>

                <dt>
                    <label for="password_conf">

						<?php

						if (!empty($this->data['user_id'])) :

							echo get_lang('New password');

						else :

							echo get_lang('Password');

						endif;

						?>

                        (<?php echo get_lang('Confirmation'); ?>)
                        <span class="required">*</span>
                    </label>
                </dt>
                <dd>
                    <input type="password" class="form-control" autocomplete="off" name="password_conf" id="password_conf" />
                </dd>

			<?php endif; ?>

			<?php if (claro_is_platform_admin() ): ?>
                <dt>
                    <label for="authSource">
						<?php echo get_lang('Authentication source'); ?>
                    </label>
                </dt>
                <dd>

					<?php if (in_array('authSource', $this->editableFields)) : ?>

                        <select id="authSourceSelector" name="authSource">

							<?php $authSourceInOptions = false; ?>

							<?php foreach( AuthDriverManager::getRegisteredDrivers() as $authDriver ) : ?>

								<?php if( $authDriver->getAuthSource() == $this->data['authSource'] ) : ?>

                                    <option value="<?php echo $authDriver->getAuthSource(); ?>" selected="selected">
										<?php echo $authDriver->getAuthSource(); ?>
                                    </option>

									<?php $authSourceInOptions = true; ?>

								<?php else: ?>

                                    <option value="<?php echo $authDriver->getAuthSource(); ?>">
										<?php echo $authDriver->getAuthSource(); ?>
                                    </option>

								<?php endif; ?>

							<?php endforeach; ?>

							<?php if( !$authSourceInOptions && !empty($this->data['authSource']) ) : ?>

                                <option style="font-style: italic;" value="<?php echo $this->data['authSource']; ?>" selected="selected">
									<?php echo $this->data['authSource']; ?>
                                </option>

								<?php $authSourceInOptions = true; ?>

							<?php endif; ?>

                        </select>
					<?php endif; ?>
                </dd>
			<?php endif; ?>

        </dl>
    </fieldset>



    <!-- THIRD SECTION: others informations -->
    <fieldset>
        <legend>
			<?php echo get_lang('Other informations'); ?>
        </legend>






        <dl>

            <dt>
                <label for="phone">
			        <?php echo get_lang('Phone'); ?>
                </label>
            </dt>
            <dd>
		        <?php if (in_array('phone', $this->editableFields)) : ?>

                    <input type="text" class="form-control" value="<?php echo $this->data['phone']; ?>" name="phone" id="phone" />

		        <?php else : ?>

			        <?php echo $this->data['phone']; ?>
                    <input type="hidden" class="form-control" value="<?php echo $this->data['phone']; ?>" name="phone" id="phone" />

		        <?php endif; ?>
            </dd>




            <dt>
                <label for="ext">
			        <?php echo('Ext'); //echo get_lang('First name'); ?>
                    <!--span class="required">*</span-->
                </label>
            </dt>
            <dd>
		        <?php if (in_array('ext', $this->editableFields)) : ?>

                    <input type="text" class="form-control" id="ext" name="ext" value="<?php echo $this->data['ext']; ?>" />

		        <?php else : ?>

			        <?php echo $this->data['ext']; ?>
                    <input type="hidden" id="ext" name="ext" value="<?php echo $this->data['ext']; ?>" />

		        <?php endif; ?>
            </dd>














            <dt>
                <label for="email">
					<?php echo get_lang('Email'); ?>
                </label>

				<?php if ( !get_conf('userMailCanBeEmpty',true) ): ?>

                    <span class="required">*</span>

				<?php endif; ?>

            </dt>
            <dd>
				<?php if (in_array('email', $this->editableFields)) : ?>

                    <input type="text" class="form-control" name="email" id="email" value="<?php echo claro_htmlspecialchars($this->data['email']); ?>" />

				<?php else : ?>

					<?php echo claro_htmlspecialchars($this->data['email']); ?>
                    <input type="hidden" class="form-control" name="email" id="email" value="<?php echo claro_htmlspecialchars($this->data['email']); ?>" />

				<?php endif; ?>
            </dd>

	        <?php if (in_array('skype', $this->editableFields) && claro_is_platform_admin()) : ?>
            <dt>
                <label for="skype">
					<?php echo get_lang('Skype account'); ?>
                </label>
            </dt>
            <dd>
				<?php //if (in_array('skype', $this->editableFields) && claro_is_platform_admin()) : ?>

                    <input type="text" class="form-control" value="<?php echo $this->data['skype']; ?>" name="skype" id="skype" />

				<?php else : ?>

					<?php echo $this->data['skype']; ?>

                    <input type="hidden" class="form-control" value="<?php echo $this->data['skype']; ?>" name="skype" id="skype" />

				<?php endif; ?>
            </dd>

        </dl>
    </fieldset>



    <!-- FOURTH SECTION: permissions -->
	<?php if (get_conf('allowSelfRegProf') || claro_is_platform_admin()) : ?>
        <fieldset>
            <legend>
				<?php echo get_lang('Permissions'); ?>
            </legend>

            <dl>
                <dt>
					<?php echo get_lang('Platform role'); ?>
                </dt>
                <dd>
                    <input type="radio" name="platformRole" id="student" value="student"<?php if (!$this->data['isCourseCreator'] && !$this->data['isPlatformAdmin']) : ?> checked="checked"<?php elseif (!empty($this->data['user_id']) && $this->data['user_id'] == claro_get_current_user_id() && !claro_is_platform_admin()) : ?> disabled="disabled"<?php endif; ?> /><label for="student"><?php echo get_lang('Follow courses'); ?> (<?php echo get_lang('student'); ?>)</label><br />
                    <input type="radio" name="platformRole" id="courseManager" value="courseManager"<?php if ($this->data['isCourseCreator']) : ?> checked="checked"<?php elseif (!empty($this->data['user_id']) && $this->data['user_id'] == claro_get_current_user_id() && !claro_is_platform_admin()) : ?> disabled="disabled"<?php endif; ?> /><label for="courseManager"><?php echo get_lang('Create courses'); ?> (<?php echo get_lang('teacher'); ?>)</label><br />

					<?php if (claro_is_platform_admin()) : ?>
                        <span class="adminControl"><input type="radio" name="platformRole" id="platformAdmin" value="platformAdmin"<?php if ($this->data['isPlatformAdmin']) : ?> checked="checked"<?php elseif (!empty($this->data['user_id']) && $this->data['user_id'] == claro_get_current_user_id()) : ?> disabled="disabled"<?php endif; ?> /><label for="platformAdmin"><?php echo get_lang('Manage platform'); ?> (<?php echo get_lang('administrator'); ?>)</label></span>
					<?php endif; ?>
                </dd>

				<?php if (claro_is_in_a_course()) : ?>

                    <dt>
						<?php echo get_lang('Role in this course'); ?>
                    </dt>
                    <dd>
                        <input type="checkbox" name="courseTutor" value="1" id="courseTutorYes"<?php if ($this->data['courseTutor']) : ?> checked="checked"<?php endif; ?> /><label for="courseTutorYes"><?php echo get_lang('Course tutor'); ?></label><br />
                        <input type="checkbox" name="courseAdmin" value="1" id="courseAdminYes"<?php if ($this->data['courseAdmin']) : ?> checked="checked"<?php endif; ?> /><label for="courseAdminYes"><?php echo get_lang('Course manager'); ?></label>
                    </dd>

				<?php endif; ?>
            </dl>
        </fieldset>
	<?php endif; ?>
    <dl>
        <dt>
            <input type="submit" name="applyChange" id="applyChange" value="<?php echo get_lang('Ok'); ?>" />

			<?php if (claro_is_in_a_course()) : ?>

                <input type="submit" name="applySearch" id="applySearch" value="<?php echo get_lang('Search'); ?>" />

			<?php endif; ?>

			<?php echo claro_html_button($this->cancelUrl, get_lang('Cancel')); ?>
        </dt>
        <dd></dd>
    </dl>
</form>

<p class="notice">
	<?php echo get_lang('<span class="required">*</span> denotes required field'); ?>
</p>