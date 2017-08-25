<?php 
/*
 # mod_jvinsgram - JV INSGRAM
 # @version        3.2
 # ------------------------------------------------------------------------
 # author    Open Source Code Solutions Co
 # copyright Copyright (C) 2011 joomlavi.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL or later.
 # Websites: http://www.joomlavi.com
 # Technical Support:  http://www.joomlavi.com/my-tickets.html
 -------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
echo $script;
?>

<div class="jvinsgram <?php echo $moduleclass_sfx;?>" id="jvinsgram<?php echo $module_id;?>">        
    <?php if(isset($description)){ ?>
        <p class="module-description">
            <?php echo $description; ?>
        </p>
    <?php } ?>
    <div class="jvinsgram_list_items">
        <div id="jvinsgram_list_items" style="overflow: hidden"></div>
        <div id="jvinsgram_error" style="text-align: center"></div>
        <div id="jvinsgram_loading" class="jvloading" style="text-align: center">
            <img src="<?php echo JURI::base(true)."/modules/mod_jvinsgram/assets/images/loading_transparent.gif";?>" alt="" style="width: 46px; height: 46px;"/>
        </div>
    </div>
</div>






