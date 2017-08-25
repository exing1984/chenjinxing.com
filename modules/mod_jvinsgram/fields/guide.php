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

class JFormFieldGuide extends JFormField {
 
	protected $type = 'guide';
 	
	public function getLabel() {
		return '';	
	}
	public function getInput() {
		$guide = '<h4>1. Create Instagram Account if you haven\'t had one yet.</h4>';
		$guide .= 'Go to <a href="http://instagram.com/developer/" target="blank">http://instagram.com/developer/</a> and create a new account.</br>';
		$guide .= '<h4>2. Create Client ID if you haven\'t had one yet.</h4>';
		$guide .= 'a. Sign in using your account.</br>';
		$guide .= 'b. Click on "Manage Clients" menu on the top of the site.</br>';
		$guide .= 'c. Click on "Register a New Client" and complete the form.</br>';
		$guide .= '- Application Name : Choose an appropriate name for your application, for example My Instagram Gallery.</br>';
		$guide .= '- Description : Write a few words that describe your application, for example "Sharing Instagram Photos".</br>';
		$guide .= '- Website : The URL of your website, for example http://www.mywebsite.com</br>';
		$guide .= '- OAuth redirect_url : the root URL of your website, for example http://www.mywebsite.com</br>';
		$guide .= '  After registering you will get Client information, for example:</br>';
		$guide .= '<div style="overflow:hidden"><a class="modal" href="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-1.jpg"><img src="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-1.jpg" alt="guide-1" width="250px" height="200px"/></a></div>';
		$guide .= '<h4>3. Fill the parameter in "Instagram Basic Setting" in back-end module configuration.</h4>';
		$guide .= 'a. Enter Client ID and Redirect URI into the respective fields, for example:</br>';
		$guide .= '<div style="overflow:hidden"><a class="modal" href="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-2.jpg"><img src="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-2.jpg" alt="guide-2" width="200px" height="150px"/></a></div>';
		$guide .= 'b. Click on "Connect Instagram" link and click on "Authorize" button on popup window.</br>';
		$guide .= 'c. The popup window will be redirected to your website automatically. Please copy access_token in url of popup window and paste it into "Access token" textbox.</br>';
		$guide .= '  For example:</br>';
		$guide .= '<div style="overflow:hidden"><a class="modal" href="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-3.jpg"><img src="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-3.jpg" alt="guide-3" width="200px" height="150px"/></a></div>';
		$guide .= '<div style="overflow:hidden"><a class="modal" href="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-4.jpg"><img src="'.JURI::root().'/modules/mod_jvinsgram/assets/images/guide-4.jpg" alt="guide-4" width="200px" height="150px"/></a></div>';
		$guide .= '<h4>4. Configure the paramaters and Save changes.</h4>';
		$guide .= '<h4>Note: Lookup Instagram User ID: <a href="http://jelled.com/instagram/lookup-user-id" target="_blank">http://jelled.com/instagram/lookup-user-id</a></h4>';
		return $guide;
	}
}