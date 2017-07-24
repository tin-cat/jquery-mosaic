<?

function pattern($setup, $name = "pattern.php") {
	while (list($key, $value) = each($setup))
		$$key = $value;
	if (isset($_GET["view_source"])) {
		ob_start();
		include $name;
		$source = ob_get_clean();
		foreach (explode("\n", $source) as $line)
			if (!strstr($line, "omitOnExampleSource"))
				$filteredSource .= $line."\n";
		echo highlight_string($filteredSource, true);
	}
	else
		include $name;
}

function getImageFiles($dir, $limit = false) {
	$handle = opendir($dir) or die("Can't open directory $dir");
	while ($fileName = readdir($handle)) {
		if ($fileName == "." || $fileName == ".." || (strtolower(substr($fileName, -3)) != "jpg" && strtolower(substr($fileName, -3)) != "gif" && strtolower(substr($fileName, -3)) != "png") || substr($fileName, 0, 1) == ".")
			continue;
		$fileNames[] = $fileName;
	}
	closedir($handle);

	if (!is_array($fileNames))
		die("No suitable images on ".$dir);

	$count = 0;
	foreach ($fileNames as $fileName) {
		is_readable($dir.$fileName) or die("Can't read file $dir$fileName");
		list($width, $height, $type) = getimagesize($dir.$fileName) or dir("Couldn't get image size of file $dir$fileName");
		in_array($type, [IMG_GIF, IMG_JPG, IMG_JPEG, IMG_PNG]) or die("File $dir$fileName is not in one of the allowed image file formats GIF, PNG or JPG");
		$width && $height or die("Error when getting image size of file $dir$fileName");
		$images[] = [
			"fileName" => $fileName,
			"type" => $type,
			"width" => $width,
			"height" => $height,
			"aspectRatio" => $width / $height
		];

		if ($limit && ++$count >= $limit)
			break;
	}

	if (!is_array($images))
		die("No suitable images on ".$dir);

	return $images;
}

function formatHtml($code) {
	$code = trim($code);
	$code = str_replace("\t", "    ", $code);
	$code = htmlspecialchars($code);
	$code = str_replace("...", "<span class=\"ellipsis\">...</span>", $code);
	return $code;
}