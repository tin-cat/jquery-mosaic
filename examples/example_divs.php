<?

	include "res/common.php";

	for ($i = 0; $i < 20; $i ++)
		$items .=
			"\t".
			"<div".
				" class=\"example_div stripe\"".
				" width=\"".rand(300, 500)."\"".
				" height=\"".rand(150, 500)."\"".
				" style=\"".
					"background-color: ".sprintf("#%06X", mt_rand(0x000000, 0xFFFFFF)).";".
				"\"".
			">".
				"<div class=\"number\">".($i+1)."</div>".
			"</div>".
			"\n";

	$content =
		"<div id=\"mosaic\" class=\"mosaic\">\n".
			"$items".
		"</div>\n".
		"\n".
		"<script>\n".
		"   $(function() {\n".
		"	    $('#mosaic').Mosaic();\n".
		"   });\n".
		"</script>\n";

	pattern([
		"title" => "Divs mosaic",
		"content" => $content
	], "pattern_example.php");