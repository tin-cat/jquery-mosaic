<?

	include "res/common.php";

	$imagesDir = "res/images/assorted/lowres/";
	$imageFiles = getImageFiles($imagesDir);
	shuffle($imageFiles);

	$count = 0;
	foreach ($imageFiles as $file)
		$items .=
			"\t".
			"<a".
				" class=\"item withImage\"".
				" href=\"\"".
				" width=\"".$file["width"]."\"".
				" height=\"".$file["height"]."\"".
				" style=\"".
					"background-color: ".sprintf("#%06X", mt_rand(0x000000, 0xFFFFFF)).";".
					"background-image: url('".$imagesDir.$file["fileName"]."');".
				"\"".
			">".
				"<div class=\"overlay\">".
					"<div class=\"texts\">".
						"<h1>Image number ".(++$count)."</h1>".
						"<h2>From unsplash.com</h2>".
					"</div>".
				"</div>".
			"</a>".
			"\n";

	$content =
		"<div id=\"mosaic\" class=\"mosaic\">\n".
			"$items".
		"</div>\n".
		"\n".
		"<script>\n".
		"   $(function() {\n".
		"	    $('#mosaic').Mosaic({\n".
		"		   maxRowHeight: 800\n".
		"	    });\n".
		"   });\n".
		"</script>\n";

	pattern([
		"title" => "Linkable images with overlay",
		"content" => $content
	], "pattern_example.php");