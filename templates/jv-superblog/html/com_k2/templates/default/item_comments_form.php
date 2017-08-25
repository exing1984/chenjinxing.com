<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;
?>

<div class="post-block post-leave-comment">
	<h3 class="mb-20 mt-0"><?php echo JText::_('TPL_POST_A_COMMENT') ?></h3>
	<?php if($this->params->get('commentsFormNotes')): ?>
	<p class="itemCommentsFormNotes">
			<?php if($this->params->get('commentsFormNotesText')): ?>
			<?php echo nl2br($this->params->get('commentsFormNotesText')); ?>
			<?php else: ?>
			<?php echo JText::_('K2_COMMENT_FORM_NOTES') ?>
			<?php endif; ?>
	</p>
	<?php endif; ?>
	<form action="<?php echo JURI::root(true); ?>/index.php" method="post" id="comment-form" class="form-validate">
		
		<div class="row mb-10">
			<div class="col-md-4 col-sm-5">
				<div class="form-group">
					<input class="form-control" type="text" name="userName" id="userName" value="<?php echo JText::_('TPL_FULL_NAME'); ?>" onblur="if(this.value=='') this.value='<?php echo JText::_('TPL_FULL_NAME'); ?>';" onfocus="if(this.value=='<?php echo JText::_('TPL_FULL_NAME'); ?>') this.value='';" />
				</div>
				<div class="form-group ">
					<input class="form-control" type="text" name="commentEmail" id="commentEmail" value="<?php echo JText::_('TPL_EMAIL_ADDRESS'); ?>" onblur="if(this.value=='') this.value='<?php echo JText::_('TPL_EMAIL_ADDRESS'); ?>';" onfocus="if(this.value=='<?php echo JText::_('TPL_EMAIL_ADDRESS'); ?>') this.value='';" />
				</div>
				<div class="form-group ">
					<input class="form-control" type="text" name="commentURL" id="commentURL" value="<?php echo JText::_('TPL_YOUR_WEBSITE'); ?>"  onblur="if(this.value=='') this.value='<?php echo JText::_('TPL_YOUR_WEBSITE'); ?>';" onfocus="if(this.value=='<?php echo JText::_('TPL_YOUR_WEBSITE'); ?>') this.value='';" />
				</div>
			</div>
			<div class="col-md-8 col-sm-7">
				<textarea rows="6" cols="10" class="form-control" onblur="if(this.value=='') this.value='<?php echo JText::_('TPL_TYPE_HERE_MESSAGE'); ?>';" onfocus="if(this.value=='<?php echo JText::_('TPL_TYPE_HERE_MESSAGE'); ?>') this.value='';" name="commentText" id="commentText"><?php echo JText::_('TPL_TYPE_HERE_MESSAGE'); ?></textarea>
			</div>
		</div>
		<?php if($this->params->get('recaptcha') && ($this->user->guest || $this->params->get('recaptchaForRegistered', 1))): ?>
		<div class="form-group mb-30">
			<div class="row">
				<div class="col-sm-12">
					<label class="formRecaptcha"><?php echo JText::_('K2_ENTER_THE_TWO_WORDS_YOU_SEE_BELOW'); ?></label>
					<div id="recaptcha"></div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12 clearfix">
				<input type="submit" class="btn btn-default btn-sm pull-right" id="submitCommentButton" value="<?php echo JText::_('TPL_POST_COMMENT'); ?>" />
				<span id="formLog"></span>
			</div>
		</div>

		<input type="hidden" name="option" value="com_k2" />
		<input type="hidden" name="view" value="item" />
		<input type="hidden" name="task" value="comment" />
		<input type="hidden" name="itemID" value="<?php echo JRequest::getInt('id'); ?>" />
		<?php echo JHTML::_('form.token'); ?>
	</form>

</div>