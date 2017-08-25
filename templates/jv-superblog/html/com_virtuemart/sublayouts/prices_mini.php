<?php
/**
 *
 * Show the product mini prices
 *
 * @package    VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_showprices.php 8024 2014-06-12 15:08:59Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
$product = $viewData['product'];
$currency = $viewData['currency'];
?>
<div class="product-price mini">
	<?php
	if (!empty($product->prices['salesPrice'])) {
		//echo '<div class="vm-cart-price">' . vmText::_ ('COM_VIRTUEMART_CART_PRICE') . '</div>';
	}

	if ($product->prices['salesPrice']<=0 and VmConfig::get ('askprice', 1) and isset($product->images[0]) and !$product->images[0]->file_is_downloadable) {
		$askquestion_url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id . '&tmpl=component', FALSE);
		?>
		<a class="link-modal" href="<?php echo $askquestion_url ?>" rel="nofollow" ><?php echo vmText::_ ('COM_VIRTUEMART_PRODUCT_ASKPRICE') ?></a>
		<?php
	} else {
		echo $currency->createPriceDiv ('basePrice', '', $product->prices);
		echo $currency->createPriceDiv ('basePriceVariant', '', $product->prices);
		echo $currency->createPriceDiv ('variantModification', '', $product->prices);
		if (round($product->prices['basePriceWithTax'],$currency->_priceConfig['salesPrice'][1]) != $product->prices['salesPrice']) {
			echo $currency->createPriceDiv ('basePriceWithTax', '', $product->prices) ;
		}
		if (round($product->prices['salesPriceWithDiscount'],$currency->_priceConfig['salesPrice'][1]) != $product->prices['salesPrice']) {
			echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices);
		}
		echo $currency->createPriceDiv ('salesPrice', '', $product->prices);
		if ($product->prices['discountedPriceWithoutTax'] != $product->prices['priceWithoutTax']) {
			echo $currency->createPriceDiv ('discountedPriceWithoutTax', '', $product->prices);
		} else {
			echo $currency->createPriceDiv ('priceWithoutTax', '', $product->prices);
		}
		echo $currency->createPriceDiv ('discountAmount', '', $product->prices);
		echo $currency->createPriceDiv ('taxAmount', '', $product->prices);
		$unitPriceDescription = vmText::sprintf ('', vmText::_('COM_VIRTUEMART_UNIT_SYMBOL_'.$product->product_unit));
		echo $currency->createPriceDiv ('unitPrice', $unitPriceDescription, $product->prices);
		
	}
	?>
</div>