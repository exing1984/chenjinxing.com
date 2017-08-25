<?php
/**
* @version		$Id: mod_countdown.php 2011-06-04 14:10:00Cecil Gupta $
* @package		Joomla
* @copyright	Copyright (C) 2011 Cecil Gupta. All rights reserved
* @license		GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

	$countdowns_style = 		$params->get( 'countdowns_style', "1" );
	$countdown_times = 			$params->get( 'times', "10-8-2015" );

	$countdown_label_days = 	$params->get( 'label_days', "Days" );
	$countdown_label_hours = 	$params->get( 'label_hours', "Hours" );
	$countdown_label_minutes = 	$params->get( 'label_minutes', "Minutes" );
	$countdown_label_seconds = 	$params->get( 'label_seconds', "Seconds" );

	$countdown_expiry_text = 	$params->get( 'expiry_text', "Countdown is complete!" );

	$offline_background = 		$params->get( 'offline_background');

	$modulesuffix = 			$params->get('moduleclass_sfx');


	$document 	= JFactory::getDocument();
	$document->addScript( JUri::root(true).'/modules/mod_countdown/assets/jquery.plugin.min.js');
	$document->addScript( JUri::root(true).'/modules/mod_countdown/assets/jquery.countdown.min.js');

	$offlineJS = '(function($){
			$(function(){
				var offline = $(".offline-page");
			   	if (offline.length > 0) {
			   		offline.addClass("offline-'.$countdowns_style.'");
			   	';
	if ($offline_background != '') {
		$offlineJS .= 'offline.attr("style", "background-image: url('.JURI::base(true).'/'.$offline_background.')");';
	}
	$offlineJS .= '}
		});
		})(jQuery);';

	$document->addScriptDeclaration($offlineJS);

?>

<div class="countdown countdown-<?php echo $countdowns_style;?>" id="countdown-<?php echo $module->id;?>">
<?php 
require JModuleHelper::getLayoutPath('mod_countdown','default');
?>
</div>