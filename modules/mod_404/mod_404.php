<?php
/**
* @version		$Id: mod_countdown.php 2011-06-04 14:10:00Cecil Gupta $
* @package		Joomla
* @copyright	Copyright (C) 2011 Cecil Gupta. All rights reserved
* @license		GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

	$error_style 		= $params->get( 'error_style', "1" );

	$error_image		= $params->get( 'error_image');
	$error_title 		= $params->get( 'error_title');
	$error_sub_title 	= $params->get( 'error_sub_title');
	$error_content 		= $params->get( 'error_content');

	$error_background 	= $params->get( 'error_background');

	$modulesuffix 		= $params->get('moduleclass_sfx');

?>
<?php 
require JModuleHelper::getLayoutPath('mod_404','default');
?>