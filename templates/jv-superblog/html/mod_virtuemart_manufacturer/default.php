<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$classCol= ' col-sm-'.floor ( 12 / $manufacturers_per_row );
$col= 1 ;
?>
<div class="vmgroup<?php echo $params->get( 'moduleclass_sfx' ) ?> blk-thmbs-pro">

<?php if ($headerText) : ?>
	<div class="vmheader"><?php echo $headerText ?></div>
<?php endif;
if ($display_style =="div") { ?>
	<div class="row">
		<div class="multi-slides multi-slides-right vmmanufacturer<?php echo $params->get('moduleclass_sfx'); ?> carouselOwl" 
					data-items="<?php echo $manufacturers_per_row ?>" 
					data-itemsdesktop="<?php echo $manufacturers_per_row ?>" 
					data-itemsdesktopsmall="<?php echo (($manufacturers_per_row - 2)>0)?($manufacturers_per_row - 1):$manufacturers_per_row ?>" 
					data-itemstablet="<?php echo (($manufacturers_per_row - 2)>0)?($manufacturers_per_row - 2):$manufacturers_per_row ?>" 
					data-itemstabletsmall = "<?php echo (($manufacturers_per_row - 3)>0)?($manufacturers_per_row - 3):$manufacturers_per_row ?>"
					data-itemsmobile = "<?php echo (($manufacturers_per_row - 3)>0)?($manufacturers_per_row - 3):$manufacturers_per_row ?>" 
					data-pagination="false" 
					data-navigation="false"
				>
		<?php
		foreach ($manufacturers as $manufacturer) {
			$link = JROUTE::_('index.php?option=com_virtuemart&view=manufacturer&virtuemart_manufacturer_id=' . $manufacturer->virtuemart_manufacturer_id);
			?>
			<div class="vmManufacturerItem col-sm-12">
				<a href="<?php echo $link; ?>">
				<?php
				if ($manufacturer->images && ($show == 'image' or $show == 'all' )) { ?>
					<?php echo $manufacturer->images[0]->displayMediaThumb('',false);?>
				<?php
				}
				if ($show == 'text' or $show == 'all' ) { ?>
				 <h5><?php echo $manufacturer->mf_name; ?></h5>
				<?php
				}
				?>
				</a>
			</div>
			<?php
		} ?>
		</div>
	</div>
<?php
} else {
?>
	<div class="vmmanufacturer<?php echo $params->get('moduleclass_sfx'); ?> grid-pro">
		<div class="row">
		<?php foreach ($manufacturers as $manufacturer) {
			$link = JROUTE::_('index.php?option=com_virtuemart&view=manufacturer&virtuemart_manufacturer_id=' . $manufacturer->virtuemart_manufacturer_id);

			?>
			<div class="<?php echo $classCol;?>">
				<?php
				if ($manufacturer->images && ($show == 'image' or $show == 'all' )) { ?>
					<a href="<?php echo $link; ?>">
					<?php echo $manufacturer->images[0]->displayMediaThumb('',false);?>
					</a>
				<?php
				}
				if ($show == 'text' or $show == 'all' ) { ?>
				 <h5><a href="<?php echo $link; ?>"><?php echo $manufacturer->mf_name; ?></a></h5>
				<?php
				} ?>				
			</div>
			<?php
			if ($col == $manufacturers_per_row) {
				echo "</div><div class='row'>";
				$col= 1 ;
			} else {
				$col++;
			}
		} ?>
		</div>
	</div>
	<?php }
	if ($footerText) : ?>
	<div class="vmfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
	</div>
	<?php endif; ?>
</div>

