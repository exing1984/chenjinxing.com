<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
// add javascript for price and cart, need even for quantity buttons, so we need it almost anywhere
vmJsApi::jPrice();


$col = 1;
$cols = floor (12 / $products_per_row);
$per_row_sm = ($products_per_row > 1)?($products_per_row - 1):$products_per_row;
$cols_sm = floor ( 12 / $per_row_sm );
?>
<div class="VmGroup <?php echo $params->get ('moduleclass_sfx') ?>">

	<?php if ($headerText) { ?>
	<p class="headerText"><?php echo $headerText ?></p>
	<?php
	}
	if ($display_style == "div") { //Slide
		?>
		<div class="row">
			<div class="multi-slides multi-slides-right carouselOwl" 
				data-items="<?php echo $products_per_row ?>" 
				data-itemsdesktop="<?php echo $products_per_row ?>" 
				data-itemsdesktopsmall="<?php echo ($products_per_row - 1) ?>" 
				data-itemstablet="3"  
				data-itemstabletsmall = "2" 
				data-itemsmobile = "1" 
				data-pagination="false" 
				data-navigation="true"
			>
				<?php foreach ($products as $product) : ?>
				<?php $url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .	$product->virtuemart_category_id); ?>
				<div class="vmProduct col-xs-12">
					<div class="thumb-item">
						<div class="thumb-item-img">
							<?php if ($product->prices['discountAmount']){ // Show Badge on Sale ?>
							<div class="badges badges-sale"><?php echo JText::_('TPL_SALE'); ?></div>
							<?php } ?>
							<?php if ($product->product_special){ ?>
								<div class="badges badges-feature"><i class="fa fa-star-o"></i></div>
							<?php } ?>
							<a title="<?php echo $product->product_name ?>" href="<?php echo $url; ?>">
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
													echo '<a href="'.$url.'" title="'.vmText::_( 'COM_VIRTUEMART_ADDTOCART_CHOOSE_VARIANT' ).'" ><i class="fa fa-bars"></i></a>';
												}
											}
										?>		
									<?php } ?>
								</div>
								<div class="btn-item btn-detail">
									<a href="<?php echo $url; ?>"><i class="fa fa-ellipsis-h"></i></a>
								</div>						
							</div>
						</div>
					</div>
					<div class="thumb-item-content">
						<h4><a href="<?php echo $url ?>" title="<?php echo $product->product_name ?>"><?php echo $product->product_name ?></a></h4>
						<?php
						if ($show_price and  isset($product->prices)) {
							echo "<div class='vm3pr-prices clearfix'><div class='product-price mini'>";
							if (!empty($product->prices['basePrice'] ) ) echo '<div class="PricebasePrice">'. $currency->createPriceDiv('basePrice','',$product->prices,true).'</div>';
							// 		echo $currency->priceDisplay($product->prices['salesPrice']);
							if (!empty($product->prices['salesPrice'] ) ) echo '<div class="PricesalesPrice">'. $currency->createPriceDiv('salesPrice','',$product->prices,true).'</div>';
							// 		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
							if (!empty($product->prices['salesPriceWithDiscount']) ) echo '<div class="PricesalesPrice">'.$currency->createPriceDiv('salesPriceWithDiscount','',$product->prices,true).'</div>';
							echo "</div></div>";
						}?>
						<div class="pt-10">
							<div class="rating-vmgird">
								<?php //echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>'true', 'product'=>$product)); ?>
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
							</div>
						</div>
						<?php if( !empty($product->product_s_desc)) {?>
						<div class="mt-10"><?php echo strip_tags(substr($product->product_s_desc, 0,90)." [...]"); ?></div>
						<?php } ?>
						<?php if ($show_addtocart) {
							echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product));
						}
						?>
					</div>
				</div>
				
			<?php endforeach; ?>
			</div>
		</div>
		<?php
	} else { // grid

		$last = count ($products) - 1;
		?>

		<ul class="row list-unstyled">
			<?php foreach ($products as $product) : ?>
			<?php $url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .	$product->virtuemart_category_id); ?>
			<li class="vmProduct col-xs-<?php echo $cols_sm?> col-md-<?php echo $cols?>">
				<div class="thumb-item">
					<div class="thumb-item-img">
						<?php if ($product->prices['discountAmount']){ // Show Badge on Sale ?>
						<div class="badges badges-sale"><?php echo JText::_('TPL_SALE'); ?></div>
						<?php } ?>
						<?php if ($product->product_special){ ?>
							<div class="badges badges-feature"><i class="fa fa-star-o"></i></div>
						<?php } ?>
						<a title="<?php echo $product->product_name ?>" href="<?php echo $url; ?>">
							<?php
							echo $product->images[0]->displayMediaThumb('class="browseProductImage"', false);
							?>
						</a>
						<span class="product-action">
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
												echo '<a href="'.$url.'" title="'.vmText::_( 'COM_VIRTUEMART_ADDTOCART_CHOOSE_VARIANT' ).'" ><i class="fa fa-bars"></i></a>';
											}
										}
									?>		
								<?php } ?>
							</div>
							<div class="btn-item btn-detail">
								<a href="<?php echo $url; ?>"><i class="fa fa-ellipsis-h"></i></a>
							</div>						
						</span>
					</div>
				</div>
				<div class="thumb-item-content">
					<h4><a href="<?php echo $url ?>" title="<?php echo $product->product_name ?>"><?php echo $product->product_name ?></a></h4>
					<?php
					if ($show_price and  isset($product->prices)) {
						echo "<div class='vm3pr-prices clearfix'><div class='product-price mini'>";
						if (!empty($product->prices['basePrice'] ) ) echo '<div class="PricebasePrice">'. $currency->createPriceDiv('basePrice','',$product->prices,true).'</div>';
						// 		echo $currency->priceDisplay($product->prices['salesPrice']);
						if (!empty($product->prices['salesPrice'] ) ) echo '<div class="PricesalesPrice">'. $currency->createPriceDiv('salesPrice','',$product->prices,true).'</div>';
						// 		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
						if (!empty($product->prices['salesPriceWithDiscount']) ) echo '<div class="PricesalesPrice">'.$currency->createPriceDiv('salesPriceWithDiscount','',$product->prices,true).'</div>';
						echo "</div></div>";
					}?>
					<div class="pt-10">
						<div class="rating-vmgird">
							<?php //echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>'true', 'product'=>$product)); ?>
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
						</div>
					</div>
					<?php if ($show_addtocart) {
						echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'position' => array('ontop', 'addtocart')));
					}
					?>
				</div>
			</li>
			<?php
			if ($col == $products_per_row && $products_per_row && $last) {
				echo '
					</ul>
					<ul  class="row list-unstyled">';
				$col = 1;
			} else {
				$col++;
			}
			$last--;
		endforeach; ?>
		</ul>
		<?php
	}
	if ($footerText) : ?>
	<p>
		<?php echo $footerText ?>
	</p>
	<?php endif; ?>
</div>