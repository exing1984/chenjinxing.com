<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ( $moduleclass_sfx !='' ) { ?>
    <div class="custom<?php echo $moduleclass_sfx ?>" >
        <?php echo $module->content;?>
    </div>	
<?php
}
else
	echo $module->content;
?>


