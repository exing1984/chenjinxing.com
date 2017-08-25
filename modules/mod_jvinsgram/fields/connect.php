<?php
/**
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
 
jimport('joomla.form.formfield');

$doc = JFactory::getDocument();
if(version_compare(JVERSION, '3.0', '<')){
    $doc->addScript(JURI::root(true).'/modules/mod_jvinsgram/assets/js/jquery.min.js');
}else{
    JHtml::_('jquery.framework');
}
$doc->addScript(JURI::root(true).'/modules/mod_jvinsgram/assets/js/jquery.noconflict.js');
$doc->addScript(JURI::root(true).'/modules/mod_jvinsgram/assets/js/jvinsgram.admin.js');
$doc->addStyleDeclaration('ul.adminformlist, ul.adminformlist li{overflow:hidden}', 'text/css');

class JFormFieldConnect extends JFormField {
 
	protected $type = 'connect';
 
	public function getInput() {
		return '<a id="connectbutton" href="javascript:void(0)"><span style="font-weight:bold; font-size:120%">Connect Instagram</span></a>';
	}
}