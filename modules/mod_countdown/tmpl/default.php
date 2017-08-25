<?php // no direct access
    error_reporting('E_ALL');
    defined('_JEXEC') or die('Restricted access');

    $data = explode('-', $countdown_times);
    
    $day = $data[0];
	$month = $data[1];
	$year = $data[2];

	$document->addScriptDeclaration('
		(function($){
			$(function(){
			   	var austDay = new Date();
				austDay = new Date("'.$month.', '.$day.', '.$year.'");
				$("#CountSmall-'.$module->id.'").countdown({
					until: austDay,
					labels: [\'Years\', \'Months\', \'Weeks\', \''.$countdown_label_days.'\', \''.$countdown_label_hours.'\', \''.$countdown_label_minutes.'\', \''.$countdown_label_seconds.'\'],
				 	labels1:[\'Years\', \'Months\', \'Weeks\', \''.$countdown_label_days.'\', \''.$countdown_label_hours.'\', \''.$countdown_label_minutes.'\', \''.$countdown_label_seconds.'\'],
					padZeroes: true,
					expiryText : "'.$countdown_expiry_text.'"
				});
			});
		})(jQuery);
	');
?>
   
<div class="countdown-inner">
<?php if ($countdowns_style == '9') {?>
	<p class="text-semi-bold text-primary text-uppercase text-left"><i class="fa fa-clock-o"></i><?php echo JText::_('TPL_OFFLINE_TIME_LEFT')?></p>
<?php }?>
<div id="CountSmall-<?php echo $module->id;?>"></div>
</div>