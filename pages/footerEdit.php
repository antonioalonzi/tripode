<div>
	<p><?= Context::getInstance()->translator->translate("footer.title") ?></p>
	
	<form action="?action=footer" method="post">
		<fieldset class="well">
			<?= Context::getInstance()->translator->translate("footer.displayLinkToTripode") ?>
			<select name="linkToTripode">
				<option value="Yes"><?= Context::getInstance()->translator->translate("general.yes") ?></option>
				<option value="No"><?= Context::getInstance()->translator->translate("general.no") ?></option>
			</select>
			
			<div class="controls">
				<button type="submit" class="btn btn-primary"><?= Context::getInstance()->translator->translate("action.save") ?></button>
			</div>
		</fieldset>
	</form>
	
</div>
