
<!-- Popup for $popupName -->
<div id="popup-<?= $popupName ?>" class="editPopup" style="display: none">
	<a href="#popup-<?= $popupName ?>" class="closePopup"><img src="img/icons/close.png" class="pull-right" /></a>
	<div class="editPopupContainer">
		<?php include "$popupName.php"?>
	</div>
</div>

