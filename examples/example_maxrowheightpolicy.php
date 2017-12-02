<?

	include "res/common.php";

	$imagesDir = "res/images/assorted/lowres/";
	$imageFiles = getImageFiles($imagesDir);
	if ($_GET["randomSeed"])
		srand($_GET["randomSeed"]);
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
		"<div style=\"width: calc(100% - 60px); margin: 0 30px; text-align: center; float: left;\">\n".
			"<h3>Reload to try different scenarios</h3>\n".
			"<div id=\"mosaic1\" class=\"mosaic\" style=\"width: 250px; margin: 0 30px; display: inline-block; float: none;\">\n".
				"<h2 data-no-mosaic=true>skip</h2>\n".
				"$items".
			"</div>\n".
			"<div id=\"mosaic2\" class=\"mosaic\" style=\"width: 250px; margin: 0 30px; display: inline-block; float: none;\">\n".
				"<h2 data-no-mosaic=true>crop</h2>\n".
				"$items".
			"</div>\n".
			"<div id=\"mosaic3\" class=\"mosaic\" style=\"width: 250px; margin: 0 30px; display: inline-block; float: none;\">\n".
				"<h2 data-no-mosaic=true>oversize</h2>\n".
				"$items".
			"</div>\n".
			"<div id=\"mosaic4\" class=\"mosaic\" style=\"width: 250px; margin: 0 30px; display: inline-block; float: none;\">\n".
				"<h2 data-no-mosaic=true>tail</h2>\n".
				"$items".
			"</div>\n".
		"</div>\n".
		"\n".
		"<script>\n".
		"   $(function() {\n".
		"		$('#mosaic1').Mosaic({".
		"			maxRowHeight: 80,\n".
		"			maxRowHeightPolicy: 'skip'\n".
		"		});\n".
		"		$('#mosaic2').Mosaic({".
		"			maxRowHeight: 80,\n".
		"			maxRowHeightPolicy: 'crop'\n".
		"		});\n".
		"		$('#mosaic3').Mosaic({".
		"			maxRowHeight: 80,\n".
		"			maxRowHeightPolicy: 'oversize'\n".
		"		});\n".
		"		$('#mosaic4').Mosaic({".
		"			maxRowHeight: 80,\n".
		"			maxRowHeightPolicy: 'tail'\n".
		"		});\n".
		"   });\n".
		"</script>\n";

	pattern([
		"title" => "maxRowHeightPolicy modes",
		"content" => $content
	], "pattern_example.php");