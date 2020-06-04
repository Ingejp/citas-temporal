<?php

function scConvertSignBase30ToPng($data, $width, $height, $color, $rootDir, $tmpDir) {
	$split                  = '';
	list($type, $split)    = explode(';', $data);
	list($encType, $split) = explode(',', $split);

	$data      = str_replace('image/jsignature;base30,', '', $split);
	$converter = new jSignature_Tools_Base30();
	$raw       = $converter->Base64ToNative($data);

	$maxWidth  = 0;
	$maxHeight = 0;
	foreach($raw as $line) {
		if (max($line['x']) > $maxWidth)
			$maxWidth = max($line['x']);
		if (max($line['y']) > $maxHeight)
			$maxHeight = max($line['y']);
	}

	if (0 == $width || $maxWidth > $width) {
		$width = $maxWidth;
	}
	if (0 == $height || $maxHeight > $height) {
		$height = $maxHeight;
	}

	$im = imagecreatetruecolor($width + 20, $height + 20);

	list($r, $g, $b) = strlen($color) === 4 ? sscanf($color, "#%1x%1x%1x") : sscanf($color, "#%2x%2x%2x");

	imageantialias($im, true);

	imagesavealpha($im, true);
	$trans_colour = imagecolorallocatealpha($im, 255, 255, 255, 127);
	imagefill($im, 0, 0, $trans_colour);
	imagesetthickness($im, 5);
	$penColor = imagecolorallocate($im, $r, $g, $b);

	for ($i = 0; $i < count($raw); $i++) {
		for ($j = 0; $j < count($raw[$i]['x']); $j++) {
			if (!isset($raw[$i]['x'][$j]))
				break;

			if (!isset($raw[$i]['x'][$j + 1]))
				imagesetpixel($im, $raw[$i]['x'][$j], $raw[$i]['y'][$j], $penColor);
			else
				imageline($im, $raw[$i]['x'][$j], $raw[$i]['y'][$j], $raw[$i]['x'][$j + 1], $raw[$i]['y'][$j + 1], $penColor);
		}
	}

	$filename = $tmpDir . '/sc_sign_grid_condicion_' . substr(md5(microtime() . session_id() . "grid_condicion"), 8, 8) . '.png';

	$ifp = fopen($rootDir . $filename, 'wb');
	imagepng($im, $rootDir . $filename);
	fclose($ifp);
	imagedestroy($im);

	return $filename;
}

?>