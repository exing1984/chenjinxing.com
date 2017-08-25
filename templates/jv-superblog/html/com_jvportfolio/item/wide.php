<?php
  /**
    * @version     1.0.0
    * @package     com_jvportfolio
    * @copyright   Copyright (C) 2014. All rights reserved.
    * @license     GNU General Public License version 2 or later; see LICENSE.txt
    * @author      joomlavi <info@joomlavi.com> - http://www.joomlavi.com
    */
  // no direct access
  defined('_JEXEC') or die;   
  jimport( 'joomla.plugin.helper' );
  jimport( 'joomla.html.html' );
  
  if( !class_exists( 'ModJvPortfolioHelper' ) )
  {
    require_once JPATH_SITE.'/modules/mod_jvportfolio/helper.php';
  }
  $show_title   = $this->params->get( 'show_title', '1' );
  $show_desc    = $this->params->get( 'show_desc', '1' );
  $show_date    = $this->params->get( 'show_date', '1' );
  $show_cat     = $this->params->get( 'show_cat', '1' );
  $show_client  = $this->params->get( 'show_client', '1' );
  $show_tag     = $this->params->get( 'show_tag', '1' );
  $show_link    = $this->params->get( 'show_link', '0' );
  $show_vote    = $this->params->get( 'show_vote', '1' );
  $show_related = $this->params->get( 'show_related', '0' );
?>
<?php if ($this->item) : ?>
<div class="portfolio-detail-default portfolio-detail-wide clearfix">
  <div class="row">
    <?php if ($this->item->pfo_v) { ?>
      <div class="col-sm-12">
        <div class="pfo-detail-video mb-30">
          <?php echo $this->item->pfo_v;?>
        </div>
      </div>
    <?php } else { ?>
      <?php if ($this->item->gallery) { ?>
        <div class="col-sm-12">
            <?php foreach($this->item->gallery as $i=>$path):?>
              <div class="pfo-detail-image mb-30">
                <img src="<?php echo $path?>" alt="<?php echo $this->item->name?>"> 
              </div>
            <?php endforeach;?>
        </div>
        <!-- end col -->
        <?php } ?>
    <?php } ?>
    <div class="col-sm-12">
      <div class="pfo-detail-body">
        <div class="row">
          <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
              <?php if ($show_title) : ?>
              <h2 class="pfo-detail-title mt-0 pull-left"><?php echo $this->item->name?></h2>
              <?php endif; ?>
              <?php if ($show_vote || (!empty($this->params->get( 'btnsocial', '' ))) ) : ?>
              <div class="pfo-detail-info pull-right">
                <?php if ($show_vote) : ?>
                <div class="pfo-detail-like" data-href="<?php echo JUri::root()."?option=com_jvportfolio&amp;task=items.toggleVote&amp;pfid={$this->item->id}"?>" data-pfvote="<?php echo $this->item->id?>" data-pfview="> h5">
                  <i class="fa fa-heart"></i>
                  <h5><?php echo $this->item->cliked?></h5>
                </div>
                <?php endif; ?>
                <?php if (!empty($this->params->get( 'btnsocial', '' ))) : ?>
                <div class="pfo-detail-share"><?php echo $this->params->get( 'btnsocial', '' ); ?></div>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            </div>          
            <?php if ($show_desc && !empty($this->item->desc)) : ?>  
            <div class="pfo-detail-desc pt-20 mb-40"><?php echo $this->item->desc?></div>
            <?php endif; ?>
          </div> 
          <div class="col-xs-12 col-sm-3">
            <?php if(  $extrafields = JvportfolioFrontendHelper::getExtraField( $this->item ) ) : ?>
              <?php foreach( $extrafields as $gid => $controls ) : ?>
                <?php foreach( $controls as $label => $value ) : ?>
                  <div class="pfo-detail-info mb-30">
                    <h6 class="mt-0"><?php echo $label; ?></h6>
                    <div><?php echo $value; ?></div>
                  </div>
                <?php endforeach;?>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($show_client && !empty($this->item->created_by_name)) : ?>
            <div class="pfo-detail-info mb-30">
              <h6 class="mt-0"><?php echo JText::_('TPL_PORTFOLIO_CLIENT')?></h6>
              <div><?php echo $this->item->created_by_name?></div>
            </div>
            <?php endif; ?>
            <?php if ($show_date) : ?>
            <div class="pfo-detail-info mb-30">
              <h6 class="mt-0"><?php echo JText::_('TPL_PORTFOLIO_DATE')?></h6>
              <div><?php echo date(JText::_('TPL_PORTFOLIO_DATE_FORMAT_2'), strtotime($this->item->date_created))?></div>
            </div>
            <?php endif; ?>
            <?php if ($show_cat && !empty($this->item->cate)) : ?>
            <div class="pfo-detail-info mb-30">
              <h6 class="mt-0"><?php echo JText::_('TPL_PORTFOLIO_CATEGORIES')?></h6>
              <div><?php echo $this->item->cate; ?></div>
            </div>
            <?php endif; ?>
            <?php if ($show_tag && !empty($this->item->tag)) : ?>
            <div class="pfo-detail-info mb-30">
              <h6 class="mt-0"><?php echo JText::_('TPL_PORTFOLIO_TAGS')?></h6>
              <div><?php echo $this->item->tag; ?></div>
            </div>
            <?php endif; ?>
            <?php if ($show_link && !empty($this->item->link)) : ?>
              <div class="pfo-detail-info mb-30">
                <h6 class="mt-0"><?php echo JText::_('COM_JVPORTFOLIO_EXTEND_LINK')?></h6>
                <div><?php echo $this->item->link; ?></div>
              </div>
            <?php endif; ?>
          </div>
        </div>  
      </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
   
   <?php 
    JPluginHelper::importPlugin('portfolio');
    $dispatcher = JDispatcher::getInstance();
    ?>
    <?php if( ( $citems = $dispatcher->trigger('onNav', array( $this->item->id ) ) ) && is_array( $citems ) && count( $citems ) ) : ?>
    <?php $citems = array_shift($citems); ?>
    <div class="pfo-detail-navigation mt-20 pt-30 clearfix">
          <?php if( $citems->prev ) : ?>
            <a href="<?php echo JRoute::_("index.php?option=com_jvportfolio&view=item&id={$citems->prev}")?>" class="pull-left">
              <i class="fa fa-angle-left"></i>
            </a>
          <?php endif; ?>
          <?php if( $citems->next ) : ?>
            <a href="<?php echo JRoute::_("index.php?option=com_jvportfolio&view=item&id={$citems->next}")?>" class="pull-right">
              <i class="fa fa-angle-right"></i>
            </a>
          <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if( 
      property_exists( $this->item, 'tags_id')
      && $show_related 
      && ( $tags_id = $this->item->tags_id ) 
      && ( $tags_id = explode( ',', $tags_id ) ) 
      && ( $rItems = ModJvPortfolioHelper::getItems( 0 , $tags_id, 0, 10 ) )
      && property_exists( $rItems, 'items' )
    ) : ?>
    <div class="pfo-related pt-50 portfolio-default"> 
      <h4 class="title-module mb-50 text-uppercar">
        <?php echo  JText::_('TPL_PORTFOLIO_RELATED_WORKS');?>
      </h4>
      <div class="pfo-related-items box-portfolio row">
        <div class="carouselOwl" 
            data-items="4" 
            data-itemsdesktop="4" 
            data-itemsdesktopsmall="3" 
            data-itemstablet="3" 
            data-itemstabletsmall="2" 
            data-itemsmobile="1" 
        >
          <?php $cid = $this->item->id; ?>
          <?php $rlen = 0; ?>
          <?php foreach( $rItems->items as $ri => $ritem ) : ?>
             <!--  -->
            <?php if( $ritem->id != $cid ) :?>
              <div class="col-xs-12">
                <div class="pfo-item">
                  <div class="pfo-body">
                    <div class="pfo-image">
                      <div class="img" style="background-image:url(<?php echo JURI::root().$ritem->image; ?>);"><img class="hidden" src="<?php echo JURI::root().$ritem->image; ?>" title="<?php echo $ritem->name; ?>"></div>
                    </div>
                    <div class="pfo-content">
                      <div class="pfo-content-top">
                        <div class="pfo-content-top-inner">
                          <a class="pfo-title h4" href="<?php echo JRoute::_("index.php?option=com_jvportfolio&view=item&id={$ritem->id}")?>"> 
                            <?php echo $ritem->name; ?>
                          </a>  
                           <span class="pfo-hasTag"><?php echo $ritem->tag; ?></span>  
                        </div>
                      </div>
                      <div class="pfo-content-bottom">
                        <?php if($ritem->gallery):?> 
                          <a class="link-quick btn btn-sm btn-white btn-outline" href="javascript:void(0)" data-imgs='<?php echo json_encode($ritem->gallery)?>' data-qview="lightbox" title="<?php echo JText::_("TPL_PORTFOLIO_ZOOM"); ?>"><i class="fa fa-search"></i><span><?php echo JText::_("TPL_PORTFOLIO_ZOOM"); ?></span></a>
                        <?php endif?>
                        <a class="link-detail btn btn-sm btn-white btn-outline" href="<?php echo JRoute::_("index.php?option=com_jvportfolio&view=item&id={$item->id}")?>" title="<?php echo JText::_("TPL_PORTFOLIO_DETAIL"); ?>"><i class="fa fa-ellipsis-h"></i><span><?php echo JText::_("TPL_PORTFOLIO_DETAIL"); ?></span></a> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
              <?php $rlen ++; ?>
            <?php endif; ?>
          <?php endforeach; ?>        
        </div>
      </div>      
      <!-- end list -->
    </div>
    <?php endif; ?>
</div>
<?php
else:
   echo JText::_('COM_JVPORTFOLIO_ITEM_NOT_LOADED');
endif;
?>


