<?php
	function watermark_image($image1, $path, $image2, $X = 288, $Y = 216){

		/*X: Vị trí chèn hình 2 vào tính theo "left" hình 1 
		  Y: Vị trí chèn hình 2 vào tính theo "top" hình 1  */

		$watermark = imagecreatefrompng($image2);
		$source = getimagesize($image1);
		$source_mime = $source['mime'];
		if($source_mime == "image/png"){
			$image = imagecreatefrompng($image1);
		}
		else if($source_mime == "image/jpeg"){
			$image = imagecreatefromjpeg($image1);
		}
		else if($source_mime == "image/gif"){
			$image = imagecreatefromgif($image1);
		}
		$opacity = 50; //mờ 50%
		imagecopymerge($image, $watermark, $X, $Y, 0, 0, imagesx($watermark), imagesy($watermark), $opacity);
		imagepng($image, $path);
		return $path;
	}
?>
<img src="<?php echo watermark_image("superman.png", "test".".jpg", "logo.png"); ?>">

