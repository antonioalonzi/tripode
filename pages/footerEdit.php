<div>
	<p><?= Context::getInstance()->translator->translate("footer.title") ?></p>
	
	<form action="?action=footer" method="post" class="form-vertical">
		<div class="control-group">
			<div class="controls">
				<label id="text-lbl" for="linkToTripode" class="required"><?= Context::getInstance()->translator->translate("footer.displayLinkToTripode") ?></label>
				<select name="linkToTripode">
					<option value="Yes"><?= Context::getInstance()->translator->translate("general.yes") ?></option>
					<option value="No"><?= Context::getInstance()->translator->translate("general.no") ?></option>
				</select>
			</div>
		</div>
		<div class="controls">
			<button type="submit" class="btn btn-primary"><?= Context::getInstance()->translator->translate("action.save") ?></button>
		</div>
	</form>
	
</div>
