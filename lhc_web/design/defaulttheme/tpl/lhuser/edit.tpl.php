<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Edit user');?> - <?php echo htmlspecialchars($user->name_support)?></h1>

<?php if (isset($errors)) : ?>
		<?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
<?php endif; ?>

<?php if (isset($updated)) : $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Account updated'); ?>
	<?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
<?php endif; ?>

<ul class="nav nav-pills" role="tablist">
	<li role="presentation" <?php if ($tab == '') : ?> class="active" <?php endif;?>><a href="#account" aria-controls="account" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Account data');?></a></li>
	<li role="presentation" <?php if ($tab == 'tab_departments') : ?>class="active"<?php endif;?>><a href="#departments" aria-controls="departments" role="tab" data-toggle="tab" ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Assigned departments');?></a></li>
	<li role="presentation" <?php if ($tab == 'tab_pending') : ?>class="active"<?php endif;?>><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Pending chats');?></a></li>
	<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhpermission','see_permissions_users')) : ?>
	<li role="presentation" <?php if ($tab == 'tab_permission') : ?>class="active"<?php endif;?>><a href="#permission" aria-controls="permission" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Permissions');?></a></li>
	<?php endif;?>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane <?php if ($tab == '') : ?>active<?php endif;?>" id="account">
	   <div class="explain"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Do not enter a password unless you want to change it');?></div>
	   <br />

	   <form action="<?php echo erLhcoreClassDesign::baseurl('user/edit')?>/<?php echo $user->id?>#account" method="post" autocomplete="off" enctype="multipart/form-data">
	        <div class="form-group">
    		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Username');?></label>
    		  <input class="form-control" type="text" name="Username" value="<?php echo htmlspecialchars($user->username);?>" />
    		</div>
    		
    		<div class="form-group">
        		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Password');?></label>
        		<input type="password" class="form-control" name="Password" value=""/>
    		</div>
    		
    		<div class="form-group">
        		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Repeat the new password');?></label>
        		<input type="password" class="form-control" name="Password1" value=""/>
    		</div>
    		
    		<div class="form-group">
        		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','E-mail');?></label>
        		<input type="text" class="form-control" name="Email" value="<?php echo $user->email;?>"/>
    		</div>
    		
    		<div class="form-group">
    		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Name');?></label>
    		  <input type="text" class="form-control" name="Name" value="<?php echo htmlspecialchars($user->name);?>"/>
    		</div>
    		
    		<div class="form-group">
    		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Surname');?></label>
    		  <input type="text" class="form-control" name="Surname" value="<?php echo htmlspecialchars($user->surname);?>"/>
    		</div>
    		
    		<div class="form-group">
    		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Job title');?></label>
    		  <input type="text" class="form-control" name="JobTitle" value="<?php echo htmlspecialchars($user->job_title);?>"/>
    		</div>
    			    
    		<?php include(erLhcoreClassDesign::designtpl('lhuser/parts/time_zone.tpl.php'));?>
    		
    		<div class="row">
    		  <div class="col-xs-6">
    		      <div class="form-group">
        		      <label title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Chat status will not change upon pending chat opening');?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Invisible mode')?>&nbsp;<input type="checkbox" value="on" name="UserInvisible" <?php echo $user->invisible_mode == 1 ? 'checked="checked"' : '' ?> /></label>
        		  </div>
    		  </div>
    		  <div class="col-xs-6">
        		  <div class="form-group">
        		      <label title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','User receives other operators permissions request');?>"><input type="checkbox" value="on" name="ReceivePermissionRequest" <?php echo $user->rec_per_req == 1 ? 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','User receives other operators permissions request')?></label>
        		  </div>
    		  </div>
    		</div>
    		
    		<div class="row form-group">
    			<div class="col-md-6">
    				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Skype');?></label>
    				<input type="text" class="form-control" name="Skype" value="<?php echo htmlspecialchars($user->skype);?>"/>
    			</div>
    			<div class="col-md-6">
    				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','XMPP username');?></label>
    				<input type="text" class="form-control" name="XMPPUsername" value="<?php echo htmlspecialchars($user->xmpp_username);?>"/>
    			</div>
    		</div>
    		
    		<div class="form-group">
    		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Photo');?>, (jpg,png)</label>
    		  <input type="file" name="UserPhoto" value="" />
    		</div>
    		
    		<?php if ($user->has_photo) : ?>
    		<div class="form-group">
    			<img src="<?php echo $user->photo_path?>" alt="" width="50" /><br />
    			<label><input type="checkbox" name="DeletePhoto" value="1" /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Delete')?></label>
    		</div>
    		<?php endif;?>
    		
    		<div class="form-group">
        		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','User group')?></label>
        		<?php echo erLhcoreClassRenderHelper::renderCombobox( array (
                        'input_name'     => 'DefaultGroup[]',
                        'selected_id'    => $user->user_groups_id,
    					'multiple' 		 => true,
        		        'css_class'       => 'form-control',
                        'list_function'  => 'erLhcoreClassModelGroup::getList'
                )); ?>
    		</div>
    		
    		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Disabled')?>&nbsp;<input type="checkbox" value="on" name="UserDisabled" <?php echo $user->disabled == 1 ? 'checked="checked"' : '' ?> /></label><br>
    		
    		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Do not show user status as online')?>&nbsp;<input type="checkbox" value="on" name="HideMyStatus" <?php echo $user->hide_online == 1 ? 'checked="checked"' : '' ?> /></label><br>
    		
    		<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>
    		
    		<div class="btn-group" role="group" aria-label="...">
        		<input type="submit" class="btn btn-default" name="Save_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Save');?>"/>
    		    <input type="submit" class="btn btn-default" name="Update_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Update');?>"/>
    		    <input type="submit" class="btn btn-default" name="Cancel_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Cancel');?>"/>
        	</div>	
	
	   </form>
	</div>
	
	<div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_departments') : ?>active<?php endif;?>" id="departments">
		<h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Assigned departments');?></h5>
	
		<?php if (isset($account_updated_departaments) && $account_updated_departaments == 'done') : $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Account updated'); ?>
			<?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
		<?php endif; ?>
		
		<?php $userDepartaments = erLhcoreClassUserDep::getUserDepartaments($user->id); ?>
		
		<form action="<?php echo erLhcoreClassDesign::baseurl('user/edit')?>/<?php echo $user->id?>#departments" method="post">
		
			<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>
		
		    <label><input type="checkbox" value="on" name="all_departments" <?php echo $user->all_departments == 1 ? 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','All departments')?></label><br>
		
		    <?php foreach (erLhcoreClassDepartament::getDepartaments() as $departament) : ?>
		        <label><input type="checkbox" name="UserDepartament[]" value="<?php echo $departament['id']?>"<?php in_array($departament['id'],$userDepartaments) ? print 'checked="checked"' : '';?>/><?php echo htmlspecialchars($departament['name'])?></label><br>
		    <?php endforeach; ?>
		    
		    <input type="submit" class="btn btn-default" name="UpdateDepartaments_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/edit','Update');?>"/>
		</form> 
    </div>
	
	<div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_pending') : ?>active<?php endif;?>" id="pending">
	   <form action="<?php echo erLhcoreClassDesign::baseurl('user/edit')?>/<?php echo $user->id?>#pending" method="post">

	  	<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>

		<label><input type="checkbox" name="showAllPendingEnabled" value="1" <?php erLhcoreClassModelUserSetting::getSetting('show_all_pending',1,$user->id) == 1 ? print 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','User can see all pending chats, not only assigned to him');?></label><br>
		
		<input type="submit" class="btn btn-default" name="UpdatePending_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Update');?>"/>
	   </form>
    </div>
    <?php if (erLhcoreClassUser::instance()->hasAccessTo('lhpermission','see_permissions_users')) : ?>
    <div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_permission') : ?>active<?php endif;?>" id="permission">
        <input type="button" class="btn btn-default" name="UpdateSpeech_account" onclick="lhinst.showMyPermissions('<?php echo $user->id?>')" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Show permissions');?>" />
		<div id="permissions-summary"></div>		
    </div>
	<?php endif;?>
</div>
