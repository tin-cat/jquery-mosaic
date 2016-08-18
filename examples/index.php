<?

	include "res/common.php";

	// Build examples list
	$examples = [
		[
			"title" => "Basic example images mosaic",
			"description" => "The most simple implementation, just a few lines of code to see how it works.",
			"link" => "example_basic.php"
		],
		[
			"title" => "Creating a mosaic of divs instead of images",
			"description" => "You can create mosaic of anything that can be contained within a div. This is an example.",
			"link" => "example_divs.php"
		],
		[
			"title" => "A mosaic of linkable images with additional information when hovering",
			"description" => "A more useable example to create mosaics of images you can interact with.",
			"link" => "example_advanced.php"
		],
		[
			"title" => "High resolution images example",
			"description" => "jQuery Mosaic can switch to a higher resolution file when needed to keep images crisp.",
			"link" => "example_high_resolution.php"
		],
		[
			"title" => "See a real application",
			"description" => "See the plugin at work on Skinography.net <i>(NSFW)</i>",
			"link" => "https://skinography.net",
			"linkIsNewwWindow" => true
		]
	];

	$content = "<a name=\"examples\"></a><ul class=\"examples\">";
	foreach ($examples as $example)
		$content .=
			"<li>".
				"<a class=\"title\" href=\"".$example["link"]."\"".($example["linkIsNewwWindow"] ? " target=\"_newwindow\"" : null).">".$example["title"]."</a>".
				($example["description"] ? "<p>".$example["description"]."</p>" : null).
			"</li>";
	$content .= "</ul>";

	// Build mosaic
	$lowResImagesDir = "res/images/topdown/lowres/";
	$highResImagesDir = "res/images/topdown/";
	$imageFiles = getImageFiles($lowResImagesDir, 6);
	shuffle($imageFiles);

    foreach ($imageFiles as $file)
    	$items .=
    		"\t".
    		"<img".
    			" src=\"".$lowResImagesDir.$file["fileName"]."\"".
    			" data-high-res-image-src=\"".$highResImagesDir.$file["fileName"]."\"".
    			" width=\"".$file["width"]."\"".
    			" height=\"".$file["height"]."\"".
    		" />".
    		"\n";

	$mosaic =
		"<div id=\"mosaic\" class=\"mosaic\">\n".
			"$items".
		"</div>\n".
		"\n".
		"<script>\n".
		"	$('#mosaic').Mosaic({\n".
		"		maxRowHeight: 600,\n".
		"		highResImagesWidthThreshold: 640\n".
		"	});\n".
		"</script>\n";

	pattern([
		"title" => "jQuery Mosaic plugin",
		"header" => "jQuery Mosaic plugin",
		"headerSubtitle" => "with <div class=\"love\"></div> by <a href=\"http://tin.cat\">tin.cat</a> · download on <a href=\"https://github.com/tin-cat/jquery-mosaic\">Github</a> · see <a href=\"#examples\">examples</a>",
		"headerSubSubtitle" => "A free plugin for jQuery to build wonderful and responsive mosaics of images or anything else",
		"mosaic" => $mosaic,
		"content" => $content
	]);