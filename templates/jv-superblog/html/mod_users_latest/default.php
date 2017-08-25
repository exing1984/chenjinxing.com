<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_users_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($names)) : ?>
	<ul class="latestusers<?php echo $moduleclass_sfx ?> list-unstyled list-categories" >
	<?php foreach ($names as $name) : ?>
		<li>
			<?php echo $name->username; ?>
		</li>
	<?php endforeach;  ?>
	</ul>
<?php endif; ?>
