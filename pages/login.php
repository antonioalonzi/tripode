<div class="login ">
	<form action="?action=login" method="post" class="form-horizontal">
		<fieldset class="well">
			<?php Context::getInstance()->pageService->sectionEditable("loginEdit") ?>
			<div class="control-group">
				<div class="control-label"><label id="username-lbl" for="email" class="required"><?= Context::getInstance()->translationService->translate("login.email") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="text" name="email" id="email" value="<?= $_REQUEST['PARAM_EMAIL'] ?>" class="validate-username" size="25" required aria-required="true" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="password-lbl" for="password" class=" required"><?= Context::getInstance()->translationService->translate("login.password") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="password" name="password" id="password" value="" class="validate-password" size="25" maxlength="99" required aria-required="true" /></div>
			</div>
			<div class="controls"><button type="submit" class="btn btn-primary"><?= Context::getInstance()->translationService->translate("login.enter") ?></button></div>
		</fieldset>
	</form>
	
	<?php if (Context::getInstance()->authenticationService->isAdminUserLoggedIn() && Context::getInstance()->authenticationService->isDefaultPassword()) { ?>
		<strong><?= Context::getInstance()->translationService->translate("login.adviceChangePassword") ?></strong>
	<?php } ?>
	
	<?php Context::getInstance()->pageService->includePopup("loginEdit"); ?>
</div>
