<?php
   /**
    * @version     1.0.0
    * @package     com_portfolio
    * @copyright   Copyright (C) 2014. All rights reserved.
    * @license     GNU General Public License version 2 or later; see LICENSE.txt
    * @author      joomlavi <info@joomlavi.com> - http://www.joomlavi.com
    */
   // no direct access
   defined('_JEXEC') or die;
?>
<div class="portfolioSort hidden-xs">
    <?php echo JvportfolioFrontendHelper::getCtrlSort($params->get('sort',array()))?> 
</div>