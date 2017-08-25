<?php
/**
 * @package 	JV Shortcode
 * @version		1.0.0
 * @created		June 2015
 * @author		Joomlavi
 * @email		support@joomlavi.com
 * @website		http://joomlavi.com
 * @support		Forum - http://joomlavi.com/forum/
 * @copyright	Copyright (C) 2015 Joomlavi. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;
jimport('joomla.installer.installer');

class plgEditorsxtdJv_shortcodeInstallerScript
{

    public function postflight($type, $parent)
    { 
        $db = JFactory::getDBO();        
        $query = "UPDATE #__extensions SET enabled=1 WHERE type='plugin' AND element=".$db->Quote('jv_shortcode')." AND folder=".$db->Quote('editors-xtd');
        $db->setQuery($query);
        $db->query(); 
    }

    
}        