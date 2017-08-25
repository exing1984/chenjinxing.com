<?php
/*
 # mod_jvinsgram - JV INSGRAM
 # @version        3.2
 # ------------------------------------------------------------------------
 # author    Open Source Code Solutions Co
 # copyright Copyright (C) 2011 joomlavi.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL or later.
 # Websites: http://www.joomlavi.com
 # Technical Support:  http://www.joomlavi.com/my-tickets.html
 -------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once dirname(__FILE__).'/helper.php';
$modJVInsgram = new modJVInsgram();
$script = $modJVInsgram->getScript($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$module_id=$module->id;
$description= $params->get('description');
require JModuleHelper::getLayoutPath('mod_jvinsgram', $params->get('layout', 'default'));

