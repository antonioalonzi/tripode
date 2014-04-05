<form action="?action=homeEdit" method="post" class="form-vertical">
	<div class="control-group">
		<div class="control-label">
			<label id="text-lbl" for="text" class="required"><? echo Context::getInstance()->translator->translate("home.text") ?></label>
		</div>
		<div class="controls">
			<textarea rows="10" cols="50" name="text" id="text" required aria-required="true" style="width: 100%"><?php include "home.html" ?></textarea> 
		</div>
	</div>
	<div class="controls">
		<button type="submit" class="btn btn-primary"><? echo Context::getInstance()->translator->translate("action.save") ?></button>
	</div>
</form>
