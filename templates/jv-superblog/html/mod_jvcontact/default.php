<?php
/*
 # Module		JV Contact
 # @version		3.0.1
 # ------------------------------------------------------------------------
 # author    Open Source Code Solutions Co
 # copyright Copyright © 2008-2012 joomlavi.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL or later.
 # Websites: http://www.joomlavi.com
 # Technical Support:  http://www.joomlavi.com/my-tickets.html
-------------------------------------------------------------------------*/

// No direct access to this file
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
    
    

    <div class="contact-page <?php echo $myparams['moduleclass_sfx'] ?>">
        <?php if ($params->get('showmap')) {?>
            <div>
                <?php echo $myparams['map'];?>
            </div>
        <?php }?>
        <?php echo @$myparams['captcha'][1];?>
        <?php if($myparams['textheader'] || $myparams['moreinfo']){?>
        <div class="text-center pb-40">
            <?php if($myparams['textheader']){?>
            <h2><?php echo $myparams['textheader'];?></h2>
             <?php }?>

            <?php if($myparams['moreinfo']){?>
                <p><?php echo $myparams['moreinfo'];?></p>
            <?php }?>
        </div>
        <?php }?>
        <?php if($params->get('showsocial') != 0 || $params->get('showform') != 0 ){ ?>
        <div class="contact-form">
            <?php if($params->get('showsocial') != 0){
                echo '<div class="mb-50">'.$myparams['social'].'</div>';
            }?>
            <?php if($params->get('showform') != 0){ ?>
             <form id="jvcontact<?php echo $moduleid;?>" action="<?php echo JUri::getInstance()->toString();?>" method="post" class="form-type">
                <div class="row">
                    <?php if($myparams['showform']){?>                        
                        <div class="col-xs-12">
                            <div class="form-group">
                                <?php $i = 1; ?>
                                <?php if($fields) foreach($fields as $key => $field){ ?>
                                    <?php //if ( $i > 3) { ?>
                                    <?php echo ($params->get('textinfield'))?$field['title']:'';?> <?php echo $field['input'];?>
                                    </div>
                                    <div class="form-group">       
                                    <?php  ///}  
                                    $i++ ; ?>
                                <?php } ?>
                            </div>
                            <?php if($myparams['captcha']){?>
                                <div class="form-group">
                                    <?php echo $myparams['captcha'][0];?>
                                </div>
                            <?php }?>
                            
                            <?php if($myparams['mailcopy']){?>
                            <div class="mailcopy form-group">
                                <span style="float:left;width:100%">
                                    <input name="cbcopymail" type="checkbox" value=1 />
                                    <label for="cbcopymail"><?php echo $myparams['mailcopy'];?></label>
                                </span>
                            </div>
                            <?php }?>
                             
                            <div class="form-group">
                                <a href="javascript:void(0);" class="button btn btn-outline btn-dark " onclick="formsubmit('jvcontact<?php echo $moduleid;?>');"><?php echo $myparams['textsubmit'];?></a>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <div class="msgsendmailok" id="<?php echo $divmsgid?>">
                    <?php if($msgthankyou && @$post['jvcontact'][$moduleid]){
                        echo '<div class="msgthankyou">'.$msgthankyou.'</div>';
                    } ?>
                </div>
                <div class="msgfooter"><?php echo $myparams['textfooter'];?></div>
                <?php echo JHTML::_('form.token');?>
            </form>
            <?php }?>
        </div>
        <?php }?>
        <!-- end contact-form -->
    </div>
<!-- design -->