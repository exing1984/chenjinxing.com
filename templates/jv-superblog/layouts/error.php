<?php
/*
 # com_jvframwork - JV Framework
 # @version		3.3.x
 # ------------------------------------------------------------------------
 # author    Open Source Code Solutions Co
 # copyright Copyright (C) 2011 joomlavi.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL or later.
 # Websites: http://www.joomlavi.com
 # Technical Support:  http://www.joomlavi.com/my-tickets.html
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');
$dthemecolor = $this ['option']->get ( 'styles.themecolor' );
// Get document error 
$doc = JDocument::getInstance('error');?>
<!DOCTYPE html>
<html dir="<?php if($this['option']->isRTL()) echo 'rtl'; else echo 'ltr'; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.5, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="handheldfriendly" content="true" />

	<title><?php echo $doc->error->getCode(); ?> - <?php echo $doc->title; ?></title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:700,regular" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:300,700,regular&subset=latin-ext,latin" type="text/css">
    <link rel="stylesheet" href="<?php echo $this['path']->url('theme::css/template.css'); ?>" type="text/css" />
    <?php
    if($this['option']->isRTL()){ ?>
    	<link rel="stylesheet" href="<?php echo $this['path']->url('theme::css/template.style.rtl.css'); ?>" type="text/css" />
    <?php 
    }?>
    <?php
    if($this['option']->isRTL()){ ?>
        <link rel="stylesheet" href="<?php echo $this['path']->url('theme::css/responsive-margin-rtl.css'); ?>" type="text/css" />
    <?php 
    } else { ?>
        <link rel="stylesheet" href="<?php echo $this['path']->url('theme::css/responsive-margin.css'); ?>" type="text/css" />
    <?php 
    }?>
	<link rel="stylesheet" href="<?php echo $this['path']->url('theme::colors/' . $dthemecolor . '/style.css'); ?>" type="text/css" /> 

    <style type="text/css">
    .font-montserrat,.h1,h1{font-family: 'Montserrat',  serif;}
    .font-oswald,.h2,h2,.h3,h3,.h4,h4,.h5,h5,.h6,h6,.post-gallery .item-caption{font-family: 'Oswald',  serif;}
    </style>
    <script src="<?php echo JURI::base(true); ?>/media/jui/js/jquery.min.js"></script>

    <script type="text/javascript">
        jQuery(function($){
            var mod = $('.error-mod'),
                body = $('.error404');
            if (mod.length > 0) {
                var background = mod.data('background');
                var style = mod.data('style');
                if (background != "") {
                    body.attr("style", "background-image: url(<?php echo JURI::base(true); ?>/" + background + ")");
                };
                body.addClass('error404-' + style);           
            };
        });
    </script>

</head>
<body id="error404" class="error404">
    <div id="error404-inner">
        <div class="container">
            <?php if ($this->countModules('404')) { ?>
                <div class="error-style">
                    <jdoc:include type="position" name="404" style="none"/>
                </div>
            <?php } else { ?>
                <div class="row error-default pt-150 pt-sm-100 pb-150 pb-sm-100">
                    <div class="col-md-4">
                        <div class="error-image"><img src="<?php echo $this['path']->url('theme::images/icon-404.png'); ?>" alt="Page Not Found"/></div>
                    </div>
                    <div class="col-md-6">
                        <div class="error-content">
                            <?php if( $this['position']->count('logo') ):?>
                            <div class="error-logo mb-60">
                                <a id="logo" class="logo-<?php if($this['option']->get('extension.logo.image')) { echo 'image';} else echo 'bg';?>"  href="<?php echo JURI::base(true); ?>" title="<?php echo $this['option']->get('sitename'); ?>">                
                                <?php if($this['option']->get('extension.logo.image')) :?>
                                    <img src="<?php echo JURI::base(true).'/'.$this['option']->get('extension.logo.image'); ?>" alt="<?php echo $this['option']->get('sitename'); ?>"/>
                                <?php endif;?>
                                </a>
                            </div>
                            <?php endif;?>   
                            <div class="error-message mb-50"><?php echo JText::_('TPL_404_MESSAGE')?></div>
                            <?php if ($doc->debug) :
                                echo '<div class="error-debug">'.$doc->renderBacktrace().'</div>';
                            endif; ?>
                            <div class="error-button"><a href="<?php echo JURI::base(true); ?>" class="btn btn-primary text-normal "><?php echo JText::_('TPL_404_BUTTON')?></a></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>