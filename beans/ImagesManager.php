<?php

class ImagesManager {
	
	public static function resizeImage($imagePath, $maxWidth) {
		require_once ("lib/Zebra_Image.php");
		
		$image = new Zebra_Image();
		$image->source_path = $imagePath;
		$image->target_path = $imagePath;
		$image->jpeg_quality = 95;
		$image->preserve_aspect_ratio = true;
		$image->enlarge_smaller_images = true;
		$image->preserve_time = true;
		
		$image->resize ($maxWidth, 0, ZEBRA_IMAGE_CROP_CENTER);
	}
}
?>
