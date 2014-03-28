<div class="login ">
	<p><?= Context::getInstance()->translationService->translate("login.changeEmailAndPassword") ?></p>
	<form action="?action=login" method="post" class="form-horizontal">
		<fieldset class="well">
			<div class="control-group">
				<div class="control-label"><label id="username-lbl" for="email" class="required"><? echo Context::getInstance()->translationService->translate("login.email") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="text" name="email" id="email" value="" class="validate-username" size="25" required aria-required="true" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="password-lbl" for="password" class=" required"><? echo Context::getInstance()->translationService->translate("login.newPassword") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="password" name="password" id="password" value="" class="validate-password" size="25" maxlength="99" required aria-required="true" /></div>
			</div>
			<div class="control-group">
				<div class="control-label"><label id="confirm-password-lbl" for="confirmPassword" class=" required"><? echo Context::getInstance()->translationService->translate("login.confirmPassword") ?><span class="star">&#160;*</span></label></div>
				<div class="controls"><input type="password" name="confirmPassword" id="confirm-password" value="" class="validate-password" size="25" maxlength="99" required aria-required="true" /></div>
			</div>
			<div class="controls"><button type="submit" class="btn btn-primary"><? echo Context::getInstance()->translationService->translate("login.enter") ?></button></div>
		</fieldset>
	</form>
</div>
