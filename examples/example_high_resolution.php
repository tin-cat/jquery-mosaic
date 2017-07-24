<?

	include "res/common.php";

	$lowResImagesDir = "res/images/topdown/lowres/";
	$highResImagesDir = "res/images/topdown/";
	$imageFiles = getImageFiles($lowResImagesDir);
	shuffle($imageFiles);

	foreach ($imageFiles as $file)
		$items .=
			"\t".
			"<div".
				" class=\"item withImage\"".
				" width=\"".$file["width"]."\"".
				" height=\"".$file["height"]."\"".
				" style=\"".
					"background-color: ".sprintf("#%06X", mt_rand(0x000000, 0xFFFFFF)).";".
					"background-image: url('".$highResImagesDir.$file["fileName"]."');".
				"\"".
				" data-high-res-background-image-url=\"".$highResImagesDir.$file["fileName"]."\"".
			">".
				"<div class=\"overlay\">".
					"<div class=\"texts\">".
						"<h1>Image number ".(++$count)."</h1>".
						"<h2>From unsplash.com</h2>".
					"</div>".
				"</div>".
			"</div>".
			"\n";

	$content =
		"<div id=\"mosaic\" class=\"mosaic\">\n".
			"$items".
		"</div>\n".
		"\n".
		"<script>\n".
		"   $(function() {\n".
		"	    $('#mosaic').Mosaic({\n".
		"		   maxRowHeight: 800,\n".
		"		   highResImagesWidthThreshold: 800\n".
		"	    });\n".
		"   });\n".
		"</script>\n";

	pattern([
		"title" => "High resolution images when needed example",
		"content" => $content
	], "pattern_example.php");