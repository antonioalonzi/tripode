<form action="?action=gallery" method="post" class="form-vertical">
	<input type="hidden" name="galleryAction" value="categoryTextEdit" />
	<input type="hidden" name="category" value="<?= $_REQUEST['category'] ?>" />
	<div class="control-group">
		<div class="control-label">
			<label id="text-lbl" for="text" class="required"><?= Context::getInstance()->translator->translate("gallery.defaultIndexMessage") ?></label>
		</div>
		<div class="controls">
			<textarea rows="10" cols="50" name="text" id="text" required aria-required="true" style="width: 100%"><?php include "gallery/".$_REQUEST['category']."/index.html" ?></textarea> 
		</div>
	</div>
	<div class="controls">
		<button type="submit" class="btn btn-primary"><? echo Context::getInstance()->translator->translate("action.save") ?></button>
	</div>
</form>
