<?

	include "res/common.php";

	$imagesDir = "res/images/assorted/lowres/";
	$imageFiles = getImageFiles($imagesDir);
	shuffle($imageFiles);

	foreach ($imageFiles as $file)
		$items .=
			"\t".
			"<img".
				" src=\"".$imagesDir.$file["fileName"]."\"".
				" width=\"".$file["width"]."\"".
				" height=\"".$file["height"]."\"".
			" />".
			"\n";

	$content =
		"<div id=\"mosaic\" class=\"mosaic\">\n".
			"$items".
		"</div>\n".
		"\n".
		"<script>\n".
		"   $(function() {\n".
		"		$('#mosaic').Mosaic();\n".
		"   });\n".
		"</script>\n";

	pattern([
		"title" => "Basic example",
		"content" => $content
	], "pattern_example.php");