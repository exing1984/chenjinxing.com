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
class plgContentJv_shortcode_contentInstallerScript
{
    public function postflight($type, $parent)
    {
        $db = JFactory::getDBO();        
        $query = "UPDATE #__extensions SET enabled=1 WHERE type='plugin' AND element=".$db->Quote('jv_shortcode_content')." AND folder=".$db->Quote('content');
        $db->setQuery($query);
        $db->query();       
    }

    
}        