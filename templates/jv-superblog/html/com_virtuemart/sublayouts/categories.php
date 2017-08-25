<?php
/**
*
* Shows the products/categories of a category
*
* @package  VirtueMart
* @subpackage
* @author Max Milbers
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
 * @version $Id: default.php 6104 2012-06-13 14:15:29Z alatak $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

$categories = $viewData['categories'];
$categories_per_row =  $viewData['categories_per_row'];
$class = isset($viewData['class'])? $viewData['class']: false;;


if ($categories) {

// Category and Columns Counter
$iCol = 1;
$iCategory = 1;

// Calculating Categories Per Row
$category_col = floor ( 12 / $categories_per_row );
$cols_destsmall = ($categories_per_row > 3)?($categories_per_row - 1):$categories_per_row;
$cols_tablet = ($cols_destsmall > 2)?($cols_destsmall - 1):$cols_destsmall;
$cols_mobile = ($cols_tablet > 1)?($cols_tablet - 1):$cols_tablet;

// Separator
$verticalseparator = " vertical-separator";
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
      foreach ( $categories as $category ) {
        // this is an indicator wether a row needs to be opened or not
        // Category Link
        $caturl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);
        // Show Category ?>
        <div class="category">
          <div class="cat-thumb-item cat-thumb-item-grid">
            <a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
            <?php 
              echo $category->images[0]->displayMediaThumb("",false);
            ?>
            <span class="cat-caption">
              <?php echo $category->category_name ?>
            </span>
            </a>
            
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
<?php  } ?>
