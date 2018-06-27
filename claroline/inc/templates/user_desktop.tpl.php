<!-- $Id: user_desktop.tpl.php 14225 2012-07-30 06:38:39Z zefredz $ -->

<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo claro_html_tool_title(get_lang(get_lang('My desktop'))); ?></div></div>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="rightSidebar">
		<?php echo $this->userProfileBox->render(); ?>
		<?php echo $this->mycourselist; ?>
		<?php include_textzone('textzone_right.inc.html'); ?>
    </div>
    <!--div id="leftContent"-->
            <!--div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="dekstopLeftSidebar">
	            <?php
                /*$es_administrador=$_SESSION["_user"];
                echo $es_administrador["isPlatformAdmin"];

                if($es_administrador["isPlatformAdmin"]==1){
	              echo $this->mycourselist;
                }*/
                ?>
        <?php /*echo $this->mycourselist;*/ ?>
    </div-->
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" id="desktopRightContent">

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <a href="https://aula.gruporo.com.mx/claroline/course/index.php?cid=PT1"><img width="100%" src="https://aula.gruporo.com.mx/web/img/integrate.svg" alt="Integrate"></a>
                    </div>
                    <!--div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div-->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><img width="100%" src="https://aula.gruporo.com.mx/web/img/activate.svg" alt="Actívate"></div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <br><br> <br><br>
                        <img width="100%" src="https://aula.gruporo.com.mx/web/img/impulsate.svg" alt="Impúlsate">
                        <br><br> <br><br>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <!--div style="text-align: center">
                            <a href="https://aula.gruporo.com.mx/claroline/messaging/messagebox.php?box=inbox"><button type="button" class="btn btn-primary">Mensajes</button>
                            </a>
                        </div-->
                    </div>
                </div>


        <?php echo $this->dialogBox->render(); ?>
        
        <!--div class="portlet collapsible<?php echo get_conf('userDesktopMessageCollapsedByDefault', true) ? '  collapsed' : ''; ?>">
            <h1>
                <?php echo get_lang('Presentation'); ?>
                <span class="separator">|</span>
                <a href="#" class="doCollapse"><?php echo 
                    get_conf('userDesktopMessageCollapsedByDefault', true) 
                        ? get_lang('Show/Hide') 
                        : get_lang('Hide/Show'); ?></a>
            </h1>
            <div class="content collapsible-wrapper">
                <?php include_textzone('textzone_top.authenticated.inc.html'); ?>
            </div>
        </div-->

        <?php echo $this->outPortlet; ?>
    </div>
    <!--/div-->

</div>