<?php  if ( count( get_included_files() ) == 1 ) die( basename(__FILE__) ); ?>
<!DOCTYPE html>
<!-- 
                                                                                         
    a88888b. dP                            dP oo                   
   d8'   `88 88                            88                      
   88        88 .d8888b. 88d888b. .d8888b. 88 dP 88d888b. .d8888b. 
   88        88 88'  `88 88'  `88 88'  `88 88 88 88'  `88 88ooood8 
   Y8.   .88 88 88.  .88 88       88.  .88 88 88 88    88 88.  ... 
    Y88888P' dP `88888P8 dP       `88888P' dP dP dP    dP `88888P' 

    >>>>>>>>>>> open source learning management system <<<<<<<<<<<

    $Id: header.tpl.php 14444 2013-05-14 13:20:16Z zefredz $

-->
<html>
<head>
<title><?php echo $this->pageTitle; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Type" content="text/HTML; charset=<?php echo get_locale('charset');?>"  />
<meta name="generator" content="Claroline <?php echo $this->version; ?> - http://claroline.net" />
    <link rel="stylesheet" href="../../../web/css/bootstrap.min.css">


<?php echo link_to_css( get_conf('claro_stylesheet') . '/main.css', 'screen, projection, tv' ) . "\n";?>
<?php
if ( get_locale('text_dir') == 'rtl' ):
    echo link_to_css( get_conf('claro_stylesheet') . '/rtl.css', 'screen, projection, tv' ) . "\n";
endif;
?>
<?php echo link_to_css( 'print.css', 'print' ) . "\n";?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="top" href="<?php get_path('url'); ?>/index.php" title="" />
<link href="http://www.claroline.net/documentation.htm" rel="Help" />
<link href="<?php echo get_path('url');?>/CREDITS.txt" rel="Author" />
<link href="http://www.claroline.net" rel="Copyright" />
<?php if (file_exists(get_path('rootSys').'favicon.ico')): ?>
<link href="<?php echo rtrim( get_path('clarolineRepositoryWeb'), '/' ).'/../favicon.ico'; ?>" rel="shortcut icon" />
<?php endif; ?>
<script type="text/javascript">
    document.cookie="javascriptEnabled=true; path=<?php echo get_path('url');?>";
    <?php echo $this->warnSessionLost;?>
</script>

<?php echo $this->htmlScriptDefinedHeaders . "\n";?>
    <script src="../../../web/js/bootstrap.min.js"></script>

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '4cc557224537d8ee85cd600753f736f3cc9e75a8';
        window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>

</head>
