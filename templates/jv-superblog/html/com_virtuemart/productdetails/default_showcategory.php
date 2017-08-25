<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen

 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2012 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_showcategory.php 8508 2014-10-22 18:57:14Z Milbo $
 */

// Check to ensure this file is included in Joomla!
defined ( '_JEXEC' ) or die ( 'Restricted access' );

	if ($this->category->haschildren) {
	    $iCol = 1;
	    $iCategory = 1;
	    $categories_per_row = VmConfig::get('categories_per_row', 3);
	    $category_col = floor ( 12 / $categories_per_row );
	    $verticalseparator = " vertical-separator";
	    $cols_destsmall = ($categories_per_row > 3)?($categories_per_row - 1):$categories_per_row;
		$cols_tablet = ($cols_destsmall > 2)?($cols_destsmall - 1):$cols_destsmall;
		$cols_mobile = ($cols_tablet > 1)?($cols_tablet - 1):$cols_tablet;
	    ?>
		<div class="category-view highlight-shop grid-pro<?php echo (!empty($class))?' '.$class:'';?>">
		    <div class="carouselOwl" 
		      data-items="<?php echo $categories_per_row; ?>" 
		      data-itemsdesktop="<?php echo $cols_destsmall; ?>" 
		      data-itemsdesktopsmall="<?php echo $cols_destsmall; ?>" 
		      data-itemstablet="<?php echo $cols_tablet; ?>"  
		      data-itemstabletsmall = "<?php echo $cols_tablet; ?>" 
		      data-itemsmobile = "<?php echo $cols_mobile; ?>" 
		      data-autoplay = "true" 
		      data-pagination="false" 
		      data-navigation="false">
		    <?php 
		// Start the Output
		if (!empty($this->category->children)) {
		    foreach ($this->category->children as $category) {


			// this is an indicator whether a row needs to be opened or not
			if ($iCol == 1) {
			    ?>
				<?php
			    }

			    // Show the vertical seperator
			    if ($iCategory == $categories_per_row or $iCategory % $categories_per_row == 0) {
				$show_vertical_separator = ' ';
			    } else {
				$show_vertical_separator = $verticalseparator;
			    }

			    // Category Link
			    $caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id, FALSE);

			    // Show Category
			    ?>
			    <div class="category">
					<div class="cat-thumb-item cat-thumb-item-grid">
						<a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
							<?php 
							echo $category->images[0]->displayMediaThumb("",false);
							?>
							<span class="cat-caption"><?php echo $category->category_name ?></span>
						</a>
					</div>
				</div>
			    <?php
			    $iCategory++;

			    // Do we need to close the current row now?
			    if ($iCol == $categories_per_row) {
				?>
			    <?php
			    $iCol = 1;
			} else {
			    $iCol++;
			}
		    }
		}
		// Do we need a final closing row tag?
		if ($iCol != 1) {
		    ?>
	    	
	<?php } ?>
		</div>
	</div>
    <?php }