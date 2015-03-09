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

<!-- K2 user register form -->
<?php if(isset($this->message)) $this->display('message'); ?>

<div class="registration">
    <form action="<?php echo JURI::root(true); ?>/index.php" enctype="multipart/form-data" method="post" id="josForm" name="josForm" class="form-validate form-horizontal well">
        <?php if($this->params->def('show_page_title',1)): ?>
            <div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
                <?php echo $this->escape($this->params->get('page_title')); ?>
            </div>
        <?php endif; ?>
        <fieldset>
            <legend>User Registration</legend>
            <div class="control-group">
                <div class="control-label">
                    <span class="spacer"><span class="before"></span><span class="text"><label id="jform_spacer-lbl" class=""><strong class="red">*</strong> Required field</label></span><span class="after"></span></span>														</div>
                <div class="controls">
                </div>
            </div> <!--//control-group-->

           <div class="control-group">
                <div class="control-label">
                    <label id="namemsg" for="name"><?php echo JText::_('K2_NAME'); ?><span class="star">&nbsp;*</span></label>
                </div>
                <div class="controls">
                    <input type="text" name="<?php echo $this->nameFieldName; ?>" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' )); ?>" class="inputbox required" maxlength="50" />

                </div>
            </div><!--//control-group-->

            <div class="control-group">
                <div class="control-label">
                    <label id="usernamemsg" for="username"><?php echo JText::_('K2_USER_NAME'); ?><span class="star">&nbsp;*</span></label>
                </div>
                <div class="controls">
                    <input type="text" id="username" name="<?php echo $this->usernameFieldName; ?>" size="40" value="<?php echo $this->escape($this->user->get( 'username' )); ?>" class="inputbox required validate-username" maxlength="25" />
                </div>
            </div><!--//control-group-->
            <div class="control-group">
                <div class="control-label">
                    <label id="emailmsg" for="email"><?php echo JText::_('K2_EMAIL'); ?><span class="star">&nbsp;*</span></label>
                </div>
                <div class="controls">
                    <input type="text" id="email" name="<?php echo $this->emailFieldName; ?>" size="40" value="<?php echo $this->escape($this->user->get( 'email' )); ?>" class="inputbox required validate-email" maxlength="100" />
                </div>
            </div><!--//control-group-->
            <?php if(version_compare(JVERSION, '1.6', 'ge')): ?>
            <div class="control-group">
                <div class="control-label">
                    <label id="email2msg" for="email2"><?php echo JText::_('K2_CONFIRM_EMAIL'); ?><span class="star">&nbsp;*</span></label>
                </div>
                <div class="controls">
                    <input type="text" id="email2" name="jform[email2]" size="40" value="" class="inputbox required validate-email" maxlength="100" />
                </div>
            </div><!--//control-group-->
            <?php endif; ?>

            <div class="control-group">
                <div class="control-label">
                    <label id="pwmsg" for="password"><?php echo JText::_('K2_PASSWORD'); ?><span class="star">&nbsp;*</span></label>
                </div>
                <div class="controls">
                    <input class="inputbox required validate-password" type="password" id="password" name="<?php echo $this->passwordFieldName; ?>" size="40" value="" />
                </div>
            </div><!--//control-group-->
            <div class="control-group">
                <div class="control-label">
                    <label id="pw2msg" for="password2"><?php echo JText::_('K2_VERIFY_PASSWORD'); ?><span class="star">&nbsp;*</span></label>
                </div>
                <div class="controls">
                    <input class="inputbox required validate-passverify" type="password" id="password2" name="<?php echo $this->passwordVerifyFieldName; ?>" size="40" value="" />
                </div>
            </div><!--//control-group-->

            <div class="control-group">
                <div class="control-label">
                    <label id="gendermsg" for="gender"><?php echo JText::_('K2_GENDER'); ?><span class="star">&nbsp;*</span></label>
                </div>
                <div class="controls">
                    <?php echo $this->lists['gender']; ?>
                </div>
            </div>
            <!--//control-group-->
                  <div class="control-group">
                <div class="control-label">
                    <label id="descriptionmsg" for="description"><?php echo JText::_('K2_DESCRIPTION'); ?></label>
                </div>
                <div class="controls">
                    <?php echo $this->editor; ?>
                </div>
            </div><!--//control-group-->

        </fieldset>

        <div class="control-group">
            <div class="controls">
                <button class="button validate btn btn-warning" type="submit">
                    <?php echo JText::_('K2_REGISTER'); ?>
                </button>
            </div>
        </div>
        <input type="hidden" name="4f73f8b78108d0d9324af2be7718b56f" value="1">
        <input type="hidden" name="option" value="<?php echo $this->optionValue; ?>" />
        <input type="hidden" name="task" value="<?php echo $this->taskValue; ?>" />
        <input type="hidden" name="id" value="0" />
        <input type="hidden" name="gid" value="0" />
        <input type="hidden" name="K2UserForm" value="1" />
        <?php echo JHTML::_( 'form.token' ); ?>

    </form>
</div>