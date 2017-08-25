<?php // no direct access
    error_reporting('E_ALL');
    defined('_JEXEC') or die('Restricted access');
    $image = ($error_image != "")?'<a href="'.JURI::base(true).'" class="error-image"><img src="'.JURI::base(true).'/'.$error_image.'" alt="'.$error_title.'"/></a>':'';
    $title = ($error_title != "")?'<h1 class="error-title">'.$error_title.'</h1>':'';
    $sub_title = ($error_sub_title != "")?'<h2 class="error-sub-title">'.$error_sub_title.'</h2>':'';

    $error_contents =$error_content;
    $error_contents = ($error_contents != "")?('<div class="error-content">'.$error_contents.'</div>'):'';
?>
<div class="error-mod error-<?php echo $error_style;?>" data-style="<?php echo $error_style;?>" data-background="<?php echo $error_background;?>">
    <?php 
        echo $image.$title.$sub_title.$error_contents;
    ?>
    <?php if ($error_style == "1") { ?>
    <form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline search-404">        
        <input name="searchword" id="mod-search-searchword" maxlength=""  class="form-control search-query" type="search" placeholder="<?php echo JText::_('TPL_404_SEARCH_AGAIN')?>" />
        
        <button class="button btn" onclick="this.form.searchword.focus();"><i class="fa fa-search"></i></button>
        <input type="hidden" name="task" value="search" />
        <input type="hidden" name="option" value="com_search" />
        <input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
    </form>
    <div class="error-button"><a href="<?php echo JURI::base(true); ?>" class="btn btn-primary text-normal "><?php echo JText::_('TPL_404_BUTTON_2')?></a></div>
    <?php }?>
</div>
