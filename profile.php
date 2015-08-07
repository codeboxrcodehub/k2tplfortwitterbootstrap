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

<!-- K2 user profile form -->
<form action="<?php echo JURI::root(true); ?>/index.php" enctype="multipart/form-data" method="post" name="userform" autocomplete="off" class="form-validate form-horizontal well">
    <fieldset>
        <?php if($this->params->def('show_page_title',1)): ?>
            <div class="control-group">
                <div class="control-label">
                    <div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
                        <?php echo $this->escape($this->params->get('page_title')); ?>
                    </div>
                </div>
            </div><!--//control-group-->
        <?php endif; ?>

        <div id="k2Container" class="k2AccountPage">

            <div class="control-group">
                <div class="control-label">
                    <?php echo JText::_('K2_ACCOUNT_DETAILS'); ?>
                </div>
            </div><!--//control-group-->

            <div class="control-group">
                <div class="control-label">
                    <label for="username"><?php echo JText::_('K2_USER_NAME'); ?></label>
                </div>
                <div class="controls">
                    <span class="cbx-admin"><b><?php echo $this->user->get('username'); ?></b></span>
                </div>
            </div><!--//control-group-->

            <div class="control-group">
                <div class="control-label">
                    <label id="namemsg" for="name"><?php echo JText::_('K2_NAME'); ?></label>
                </div>
                <div class="controls">
                    <input type="text" name="<?php echo $this->nameFieldName; ?>" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' )); ?>" class="inputbox required" maxlength="50" />
                </div>
            </div><!--//control-group-->

            <div class="control-group">
                <div class="control-label">
                    <label id="emailmsg" for="email"><?php echo JText::_('K2_EMAIL'); ?></label>
                </div>
                <div class="controls">
                    <input type="text" id="email" name="<?php echo $this->emailFieldName; ?>" size="40" value="<?php echo $this->escape($this->user->get( 'email' )); ?>" class="inputbox required validate-email" maxlength="100" />
                </div>
            </div><!--//control-group-->
            <?php if(version_compare(JVERSION, '2.5', 'ge')): ?>
                <div class="control-group">
                    <div class="control-label">
                        <label id="email2msg" for="email2"><?php echo JText::_('K2_CONFIRM_EMAIL'); ?></label>
                    </div>
                    <div class="controls">
                        <input type="text" id="email2" name="jform[email2]" size="40" value="<?php echo $this->escape($this->user->get( 'email' )); ?>" class="inputbox required validate-email" maxlength="100" />
                        *
                    </div>
                </div><!--//control-group-->
            <?php endif; ?>

            <div class="control-group">
                <div class="control-label">
                    <label id="pwmsg" for="password"><?php echo JText::_('K2_PASSWORD'); ?></label>
                </div>
                <div class="controls">
                    <input class="inputbox validate-password" type="password" id="password" name="<?php echo $this->passwordFieldName; ?>" size="40" value="" />
                </div>
            </div><!--//control-group-->

            <div class="control-group">
                <div class="control-label">
                    <label id="pw2msg" for="password2"><?php echo JText::_('K2_VERIFY_PASSWORD'); ?></label>
                </div>
                <div class="controls">
                    <input class="inputbox validate-passverify" type="password" id="password2" name="<?php echo $this->passwordVerifyFieldName; ?>" size="40" value="" />
                </div>
            </div><!--//control-group-->
    </fieldset>

    <fieldset>
        <div class="control-group">
            <div class="control-label">
                <?php echo JText::_('K2_PERSONAL_DETAILS'); ?>
            </div>
            <div class="controls">
            </div>
        </div><!--//control-group-->

        <div class="control-group">
            <div class="control-label">
                <label id="gendermsg" for="gender"><?php echo JText::_('K2_GENDER'); ?></label>
            </div>
            <div class="controls">
                <?php echo $this->lists['gender']; ?>
            </div>
        </div><!--//control-group-->

        <div class="control-group">
            <div class="control-label">
                <label id="descriptionmsg" for="description"><?php echo JText::_('K2_DESCRIPTION'); ?></label>
            </div>
            <div class="controls">
                <?php echo $this->editor; ?>
            </div>
        </div><!--//control-group-->

        <div class="control-group">
            <div class="control-label">
                <label id="imagemsg" for="image"><?php echo JText::_( 'K2_USER_IMAGE_AVATAR' ); ?></label>
            </div>
            <div class="controls">
                <input type="file" id="image" name="image"/>
                <?php if ($this->K2User->image): ?>
                    <img class="k2AccountPageImage" src="<?php echo JURI::root(true).'/media/k2/users/'.$this->K2User->image; ?>" alt="<?php echo $this->user->name; ?>" />
                    <input type="checkbox" name="del_image" id="del_image" />
                    <label for="del_image"><?php echo JText::_('K2_CHECK_THIS_BOX_TO_DELETE_CURRENT_IMAGE_OR_JUST_UPLOAD_A_NEW_IMAGE_TO_REPLACE_THE_EXISTING_ONE'); ?></label>
                <?php endif; ?>
            </div>
        </div><!--//control-group-->

        <div class="control-group">
            <div class="control-label">
                <label id="urlmsg" for="url"><?php echo JText::_('K2_URL'); ?></label>
            </div>
            <div class="controls">
                <input type="text" size="50" value="<?php echo $this->K2User->url; ?>" name="url" id="url"/>
            </div>
        </div><!--//control-group-->

        <?php if(count(array_filter($this->K2Plugins))): ?>
            <!-- K2 Plugin attached fields -->
            <div class="control-group">
                <div class="control-label">
                    <div class="k2ProfileHeading">
                        <?php echo JText::_('K2_ADDITIONAL_DETAILS'); ?>
                    </div>
                </div>
                <div class="controls">
                </div>
            </div><!--//control-group-->

            <?php foreach($this->K2Plugins as $K2Plugin): ?>
                <?php if(!is_null($K2Plugin)): ?>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $K2Plugin->fields; ?>
                        </div>
                        <div class="controls">
                        </div>
                    </div><!--//control-group-->
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if(isset($this->params) && version_compare(JVERSION, '1.6', 'lt')): ?>

            <div class="control-group">
                <div class="control-label">
                    <div class="k2ProfileHeading">
                        <?php echo JText::_('K2_ADMINISTRATIVE_DETAILS'); ?>
                    </div>
                </div>
                <div class="controls">
                    <div class="userAdminParams">
                        <?php echo $this->params->render('params'); ?>
                    </div>
                </div>
            </div><!--//control-group-->
        <?php endif; ?>
    </fieldset>
    <div class="control-group">
        <div class="controls">
            <div class="k2AccountPageUpdate ">
                <button class="button validate button validate btn btn-warning" type="submit" onclick="submitbutton( this.form );return false;">
                    <?php echo JText::_('K2_SAVE'); ?>
                </button>
            </div>
        </div>

    </div>
    <input type="hidden" name="<?php echo $this->usernameFieldName; ?>" value="<?php echo $this->user->get('username'); ?>" />
    <input type="hidden" name="<?php echo $this->idFieldName; ?>" value="<?php echo $this->user->get('id'); ?>" />
    <input type="hidden" name="gid" value="<?php echo $this->user->get('gid'); ?>" />
    <input type="hidden" name="option" value="<?php echo $this->optionValue; ?>" />
    <input type="hidden" name="task" value="<?php echo $this->taskValue; ?>" />
    <input type="hidden" name="K2UserForm" value="1" />
    <?php echo JHTML::_( 'form.token' ); ?>
</form>
