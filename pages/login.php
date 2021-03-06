<div class="login ">
	<?php Context::getInstance()->pageService->sectionEditable("loginEdit") ?>
	<form action="?action=login" method="post" class="form-horizontal">
		<fieldset class="well">
			<div class="control-group">
				<div class="control-label"><label id="username-lbl" for="email" class="required"><?= Context::getInstance()->translator->translate("login.email") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="text" name="email" id="email" value="<?= $_REQUEST['PARAM_EMAIL'] ?>" class="validate-username" size="25" required aria-required="true" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="password-lbl" for="password" class=" required"><?= Context::getInstance()->translator->translate("login.password") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="password" name="password" id="password" value="" class="validate-password" size="25" maxlength="99" required aria-required="true" /></div>
			</div>
			<div class="controls"><button type="submit" class="btn btn-primary"><?= Context::getInstance()->translator->translate("login.enter") ?></button></div>
		</fieldset>
	</form>
	
	<?php if (Context::getInstance()->authenticationManager->isAdminUserLoggedIn() && Context::getInstance()->authenticationManager->isDefaultPassword()) { ?>
		<strong><?= Context::getInstance()->translator->translate("login.adviceChangePassword") ?></strong>
	<?php } ?>
</div>
