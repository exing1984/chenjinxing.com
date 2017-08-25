<?php // no direct access
defined('_JEXEC') or die('Restricted access');
vmJsApi::jPrice();

$col = 1;
$cols = 1;
?>
<?php /// Ul li ?>
<div class="VmGroupSingle <?php echo $params->get( 'moduleclass_sfx' ) ?>">
	<?php if ($headerText) { ?>
	<p class="vmheader"><?php echo $headerText ?></p>
	<?php } ?>
	<?php if ($display_style == "div") { //Slide ?>
		<div class="multi-slides multi-slides-right carouselOwl" data-items="1" data-singleitem="true" data-pagination="false" data-navigation="false" data-autoplay="true">
			<ul class="list-product">
				<?php foreach ($products as $product) { ?>
					<li class="product">
						<div class="product-item">
							<div class="product-item-img">
								<?php
								if (!empty($product->images[0]) )
								$image = $product->images[0]->displayMediaThumb('class="featuredProductImage" ',false) ;
								else $image = '';
								echo JHTML::_('link', JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id),$image,array('title' => $product->product_name) );
								$url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.
								$product->virtuemart_category_id); ?>
								
							</div>
							<div class="product-item-content">
								<h3><a href="<?php echo $url ?>"><?php echo $product->product_name ?></a></h3>
								<?php //echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>true,'product'=>$product)); ?>
								<?php
			                    $ratingModel = VmModel::getModel('ratings');
			                    $showRating = $ratingModel->showRating($product->virtuemart_product_id);
			                    if ($showRating=='true'){
			                        $rating = $ratingModel->getRatingByProduct($product->virtuemart_product_id);
			                        if( !empty($rating)) {
			                          $r = $rating->rating;
			                        } else {
			                          $r = 0;
			                        }
			                        $maxrating = VmConfig::get('vm_maximum_rating_scale',5);
			                        $ratingwidth = ( $r * 100 ) / $maxrating; ?>
			                        <?php  if( !empty($rating)) {  ?>                        
			                              <div title=" <?php echo (vmText::_("COM_VIRTUEMART_RATING_TITLE") . round($rating->rating) . '/' . $maxrating) ?>" class="ratingbox" >
			                                  <div class="stars-orange" style="width:<?php echo $ratingwidth.'%'; ?>"></div>
			                                </div>
			                         <?php } else { ?>
			                            <div class="ratingbox dummy" title="<?php echo vmText::_('COM_VIRTUEMART_UNRATED'); ?>" ></div>
			                        <?php } 
			                    } ?>
								<?php // $product->prices is not set when show_prices in config is unchecked
								if ($show_price and  isset($product->prices)) {
									echo "<div class='product-price mini'>";
									if (!empty($product->prices['basePrice'] ) ) echo '<div class="PricebasePrice">'. $currency->createPriceDiv('basePrice','',$product->prices,true).'</div>';
									// 		echo $currency->priceDisplay($product->prices['salesPrice']);
									if (!empty($product->prices['salesPrice'] ) ) echo '<div class="PricesalesPrice">'. $currency->createPriceDiv('salesPrice','',$product->prices,true).'</div>';
									// 		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
									if (!empty($product->prices['salesPriceWithDiscount']) ) echo '<div class="PricesalesPrice">'.$currency->createPriceDiv('salesPriceWithDiscount','',$product->prices,true).'</div>';
									echo "</div>";
								}	
								?>
								<?php if ($show_addtocart) echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'position' => array('ontop', 'addtocart')));	?>
							</div>
							
						</div>
					</li>
					<!-- end product-->
					<?php
					if ($col == $products_per_row && $products_per_row && $col < $totalProd) {
						if ($cols < $totalProd) {
							echo "	</ul><ul class=\"list-product\">";
						}
						$col = 1;
					} else {
						$col++;
					} 
					$cols++;
					?>
				<?php } ?>
			</ul>
			<!-- end list-product -->
		</div> 
		<!-- end slides -->
	<?php } else { ?>
	<ul class="list-product <?php echo $params->get('moduleclass_sfx'); ?>">
		<?php foreach ($products as $product) { ?>
			<li class="product">
				<div class="product-item">
					<div class="product-item-img">
						<?php
						if (!empty($product->images[0]) )
						$image = $product->images[0]->displayMediaThumb('class="featuredProductImage" ',false) ;
						else $image = '';
						echo JHTML::_('link', JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id),$image,array('title' => $product->product_name) );
						$url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.
						$product->virtuemart_category_id); ?>
						
					</div>
					<div class="product-item-content">
						<h3 class="pb-5"><a href="<?php echo $url ?>"><?php echo $product->product_name ?></a></h3>
						<?php //echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>true,'product'=>$product)); ?>
						<?php
	                    $ratingModel = VmModel::getModel('ratings');
	                    $showRating = $ratingModel->showRating($product->virtuemart_product_id);
	                    if ($showRating=='true'){
	                        $rating = $ratingModel->getRatingByProduct($product->virtuemart_product_id);
	                        if( !empty($rating)) {
	                          $r = $rating->rating;
	                        } else {
	                          $r = 0;
	                        }
	                        $maxrating = VmConfig::get('vm_maximum_rating_scale',5);
	                        $ratingwidth = ( $r * 100 ) / $maxrating; ?>
	                        <?php  if( !empty($rating)) {  ?>                        
	                              <div title=" <?php echo (vmText::_("COM_VIRTUEMART_RATING_TITLE") . round($rating->rating) . '/' . $maxrating) ?>" class="ratingbox" >
	                                  <div class="stars-orange" style="width:<?php echo $ratingwidth.'%'; ?>"></div>
	                                </div>
	                         <?php } else { ?>
	                            <div class="ratingbox dummy" title="<?php echo vmText::_('COM_VIRTUEMART_UNRATED'); ?>" ></div>
	                        <?php } 
	                    } ?>
						<?php // $product->prices is not set when show_prices in config is unchecked
						if ($show_price and  isset($product->prices)) {
							echo "<div class='product-price mini'>";
							if (!empty($product->prices['basePrice'] ) ) echo '<div class="PricebasePrice">'. $currency->createPriceDiv('basePrice','',$product->prices,true).'</div>';
							// 		echo $currency->priceDisplay($product->prices['salesPrice']);
							if (!empty($product->prices['salesPrice'] ) ) echo '<div class="PricesalesPrice">'. $currency->createPriceDiv('salesPrice','',$product->prices,true).'</div>';
							// 		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
							if (!empty($product->prices['salesPriceWithDiscount']) ) echo '<div class="PricesalesPrice">'.$currency->createPriceDiv('salesPriceWithDiscount','',$product->prices,true).'</div>';
							echo "</div>";
						}	
						?>
						<?php if ($show_addtocart) echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'position' => array('ontop', 'addtocart')));	?>			
					</div>					
				</div>
			</li>
		<?php } ?>
	</ul>
	<?php } ?>
	<?php if ($footerText) { ?>
		<p class="vmheader"><?php echo $footerText ?></p>
	<?php } ?>
</div>