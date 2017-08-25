<?php
/**
 * sublayout products
 *
 * @package	VirtueMart
 * @author Max Milbers
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
 * @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
 */

defined('_JEXEC') or die('Restricted access');
$products_per_row = $viewData['products_per_row'];
$currency = $viewData['currency'];
$showRating = $viewData['showRating'];
$verticalseparator = " vertical-separator";
echo shopFunctionsF::renderVmSubLayout('askrecomjs');

$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
	$ItemidStr = '&Itemid='.$Itemid;
}
?>
<ul class="nav nav-tabs nav-justified pro-tabs mason-tabs text-center" role="tablist">
<?php 
$i = 1;
foreach ($viewData['products'] as $type => $products ) { ?>
	<?php 
	if(!empty($type) and count($products)>0){
	$productTitle = vmText::_('COM_VIRTUEMART_'.strtoupper($type).'_PRODUCT'); ?>
		<li class="nav-icon <?php echo ($i==1)?'active':'';?>"><a href="#tab<?php echo $type;?>" role="tab" data-toggle="tab">
			<i class="fa fa-<?php 
				switch ($type) {
				    case 'featured':
				        echo 'star';
				        break;
				    case 'latest':
				        echo "flash";
				        break;
				    case 'topten':
				        echo "flag";
				        break;
				    case 'recent':
				        echo "history";
				        break;
				}
			?>"></i> 
			<?php echo $productTitle?>
		</a></li>
	<?php // Start the Output
	$i++;
    }
	?>
<?php } ?>
</ul>
<div class="tab-content">
<?php
$j = 1;
foreach ($viewData['products'] as $type => $products ) {

	$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);

	if(!empty($type) and count($products)>0){
	$productTitle = vmText::_('COM_VIRTUEMART_'.strtoupper($type).'_PRODUCT'); ?>
	<div class="tab-pane <?php echo ($j==1)?'active':'';?>" id="tab<?php echo $type ?>">
	<?php // Start the Output
    }

	// Calculating Products Per Row
	$cols = floor ( 12 / $products_per_row );
	$per_row_sm = ($products_per_row > 1)?($products_per_row - 1):$products_per_row;
	$cols_sm = floor ( 12 / $per_row_sm );
	$per_row_xs = ($per_row_sm > 1)?($per_row_sm - 1):$per_row_sm;
	$cols_xs = floor ( 12 / $per_row_xs );

	$BrowseTotalProducts = count($products);
	$col = 1;
	$nb = 1;
	$row = 1;
	?>
	<div class="row">
	<?php
	foreach ( $products as $product ) {
		// this is an indicator wether a row needs to be opened or not
		if ($col == 1) { ?>
		<?php }
		// Show Products ?>
		<div class="vmProduct<?php echo ' col-xxs-12 col-xs-'. $cols_xs.' col-sm-'.$cols_sm.' col-md-' . $cols;?>"> 
			<div class="thumb-item">
				<div class="thumb-item-img">
					<?php if ($product->prices['discountAmount']){ // Show Badge on Sale ?>
						<div class="badges badges-sale"><?php echo JText::_('TPL_SALE'); ?></div>
					<?php } ?>
					<?php if ($product->product_special){ ?>
						<div class="badges badges-feature"><i class="fa fa-star-o"></i></div>
					<?php } ?>
					<a title="<?php echo $product->product_name ?>" href="<?php echo $product->link.$ItemidStr; ?>">
						<?php
						echo $product->images[0]->displayMediaThumb('class="browseProductImage"', false);
						?>
					</a>
					<div class="product-action">
						<?php if(class_exists('PlgSystemPopup')){ ?>
							<div class="btn-item btn-view">
								<a href="javascript:void(0);" class="btn-popup" title="<?php echo vmText::_( 'TPL_QUICKVIEW' );?>" data-id="<?php echo $product->virtuemart_product_id ?>"><i class="fa fa-search"></i></a>
							</div>
						<?php  } ?>
						
						<div class="btn-item btn-cart">
							<?php if ($product->prices['salesPrice']<=0 and VmConfig::get ('askprice', 1) and isset($product->images[0]) and !$product->images[0]->file_is_downloadable) { 
								$askquestion_url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id . '&tmpl=component', FALSE);
							?>
							<a href="javascript:void(0);" class="btn-call"><i class="fa fa-phone"></i></a>
							<?php } else { ?>
								<?php 
									$addtoCartButton = '';
									if(!VmConfig::get('use_as_catalog', 0)){
										if($product->orderable) {
											echo '<a href="javascript:void(0);" class="btn-addcart" title="'.vmText::_( 'COM_VIRTUEMART_CART_ADD_TO' ).'"><i class="fa fa-shopping-cart"></i></a>';
										} else {
											echo '<a href="'.$product->link.$ItemidStr.'" title="'.vmText::_( 'COM_VIRTUEMART_ADDTOCART_CHOOSE_VARIANT' ).'" ><i class="fa fa-bars"></i></a>';
										}
									}
								?>		
							<?php } ?>
						</div>
						<div class="btn-item btn-detail">
							<a href="<?php echo JRoute::_($product->link.$ItemidStr); ?>"><i class="fa fa-ellipsis-h"></i></a>
						</div>						
					</div>
				</div>
				<div class="thumb-item-content">					
					<h4><?php echo JHtml::link ($product->link.$ItemidStr, $product->product_name); ?></h4>
					
					<div class="vm3pr-prices clearfix"> <?php
						echo shopFunctionsF::renderVmSubLayout('prices_mini',array('product'=>$product,'currency'=>$currency)); ?>
					</div>
					<div class="pt-10">
						<?php if ( VmConfig::get ('display_stock', 1)) { ?>
						<span class="vmStock pull-right vm2-<?php echo $product->stock->stock_level ?>" title="<?php echo $product->stock->stock_tip ?>"></span>
						<?php }?>
						<div class="rating-vmgird">
							<?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>$showRating, 'product'=>$product)); ?>
						</div>
					</div>					
					<?php echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'rowHeights'=>$rowsHeight[$row], 'position' => array('ontop', 'addtocart'))); ?>
				</div>
			</div>
		</div>

		<?php
	}
	?>
	</div>
	<?php

    if(!empty($type)and count($products)>0){
	        // Do we need a final closing row tag?
	        //if ($col != 1) {
	      ?>
	</div>
	    <?php
	    // }
    }
    $j++;
}
?>
</div>