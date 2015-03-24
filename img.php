<?php
	header("Content-type:image/png");
	$img=imagecreate(300,200);

	$belorange = imagecolorallocate($img, 255, 128, 0);
	$blancdezappy = imagecolorallocate($img, 255, 255, 254);
	imagestring($img, 5, 90, 100, "Salut !", $blancdezappy);

	imagepng($img);
?>
