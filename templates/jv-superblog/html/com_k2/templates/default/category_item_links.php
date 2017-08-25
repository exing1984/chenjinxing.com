<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout (links) -->
<div class="catItemView group<?php echo ucfirst($this->item->itemGroup); ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?> clearfix">
	  <?php if($this->item->params->get('catItemTitle')): ?>
	  	<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		<!-- Item Image -->
		<div class="catItemImageBlock pull-left" style="background-image: url(<?php echo $this->item->image; ?>);">
		    <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
		    	<img src="templates/jv-huge/images/transparent.png" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" />
		    </a>
		</div>
		<?php endif; ?>
		<!-- Item title -->
		<h5 class="catItemTitle post-title">
			<?php if ($this->item->params->get('catItemTitleLinked')): ?>
			<a href="<?php echo $this->item->link; ?>">
				<?php echo $this->item->title; ?>
			</a>
			<?php else: ?>
			<?php echo $this->item->title; ?>
			<?php endif; ?>
		</h5>
	  <?php endif; ?>
</div>
<!-- End K2 Item Layout (links) -->
