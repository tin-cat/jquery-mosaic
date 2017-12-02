<?

	include "res/common.php";

	// Build mosaic
	$lowResImagesDir = "res/images/topdown/lowres/";
	$highResImagesDir = "res/images/topdown/";
	$imageFiles = getImageFiles($lowResImagesDir, 12);
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
			"<div class=\"ribbon\" data-no-mosaic=\"true\"><div class=\"curl\"></div>now with tails!</div>\n".
			"$items".
		"</div>\n".
		"\n".
		"<script>\n".
		"   $(function() {\n".
		"		$('#mosaic').Mosaic({\n".
		"			maxRowHeight: 400,\n".
		"			highResImagesWidthThreshold: 640,\n".
		"			maxRowHeightPolicy: 'skip',\n".
		"		});\n".
		"	});\n".
		"</script>\n";

	// Build how to use
	$content .= "
		<div class=\"content\">
			<a name=\"basicUsage\"></a>
			<h1>Key features</h1>
			<ul class=\"fancy\">
				<li>Pixel perfect seamless mosaics</li>
				<li>Obviously responsive</li>
				<li>Create mosaics of images or divs containing whatever your want</li>
				<li>Automatically loads high resolution images for retina glory</li>
			</ul>
		</div>

		<hr>

		<div class=\"content\">
			<a name=\"basicUsage\"></a>
			<h1>Version history</h1>
			<ul class=\"fancy\">
				<li>
					<b>v0.14</b><br>
					New maxRowHeightPolicy 'tail' that renders items respecting their aspect ratio without surpassing the specified maxRowHeight, resulting in a last row that might not completely fit the screen horizontally, suggested by <a href=\"https://github.com/borekl\" target=\"credit\">@borekl</a> and <a href=\"https://github.com/nzjrs\" target=\"credit\">@nzjrs</a>
				</li>
				<li>
					<b>v0.13</b><br>
					New outerMargin and innerGap parameters.
				</li>
			</ul>
		</div>

		<hr>

		<div class=\"content\">
			<a name=\"basicUsage\"></a>
			<h1>Basic usage</h1>
			<ul class=\"fancy\">
				<li>
					Download the <a href=\"https://github.com/tin-cat/jquery-mosaic\">jQuery Mosaic plugin</a>
				</li>
				<li>
					Include the jQuery library and the <i>jquery.mosaic.js</i> + <i>jquery.mosaic.css</i> files from the jQuery Mosaic download in your head section.
					<blockquote class=\"code html\">".formatHtml("
<html>
<head>
	...
	<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
	<script type=\"text/javascript\" src=\"jquery.mosaic.js\"></script>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"jquery.mosaic.css\" />
	...
</head>
<body>
	...
					")."</blockquote>
				</li>
				<li>
					Create a DIV with an id and place your contents inside. Each DIV, A or IMG you place there will be considered as a piece of the mosaic.
					<blockquote class=\"code html\">".formatHtml("
<div id=\"myMosaic\">
	<img src=\"image1.jpg\" width=\"400\" height=\"350\" />
	<img src=\"image2.jpg\" width=\"320\" height=\"200\" />
	<img src=\"image3.jpg\" width=\"870\" height=\"420\" />
	<img src=\"image4.jpg\" width=\"442\" height=\"922\" />
	...
</div>
					")."</blockquote>
				</li>
				<li>
					Build the mosaic by running the plugin in your div
					<blockquote class=\"code html\">".formatHtml("
<script>
	$('#myMosaic').Mosaic();
</script>
					")."</blockquote>
				</li>
				<li>
					That's it! See the <a href=\"#examples\">examples</a> and their source code to learn more.
				</li>
			</ul>
		</div>

		<hr>

		<div class=\"content\">
			<a name=\"options\"></a>
			<h1>Options</h1>
			<p>You can optionally specify the following options when calling the plugin to customize the mosaic:</p>
			<ul class=\"options\">
				<li>
					<div class=\"name\">maxRowHeight</div>
					<div class=\"description\">The maximum desired height of rows</div>
					<div class=\"default\">400</div>
				</li>
				<li>
					<div class=\"name\">refitOnResize</div>
					<div class=\"description\">Whether to rebuild the mosaic when the window is resized or not</div>
					<div class=\"default\">true</div>
				</li>
				<li>
					<div class=\"name\">refitOnResizeDelay</div>
					<div class=\"description\">Milliseconds to wait after a resize event to refit the mosaic. Useful when creating huge mosaics that can take some CPU time on the user's browser. Leave it to false to refit the mosaic in realtime</div>
					<div class=\"default\">false</div>
				</li>
				<li>
					<div class=\"name\">defaultAspectRatio</div>
					<div class=\"description\">The aspect ratio to use when none has been specified, or can't be calculated</div>
					<div class=\"default\">1</div>
				</li>
				<li>
					<div class=\"name\">maxRowHeightPolicy</div>
					<div class=\"description\">Sometimes some of the remaining items cannot be fitted on a row without surpassing the maxRowHeight. For those cases, choose one of the available settings for maxRowHeightPolicy:
						<ul>
							<li><b>skip</b> Does not renders the unfitting items.</li>
							<li><b>crop</b> Caps the desired height to the specified maxRowHeight, resulting in those items not keeping their aspect ratios.</li>
							<li><b>oversize</b> Renders items respecting their aspect ratio but surpassing the specified maxRowHeight.</li>
							<li><b>tail</b> Renders items respecting their aspect ratio without surpassing the specified maxRowHeight, resulting in a last row that might not completely fit the screen horizontally.</li>
						</ul>
					</div>
					<div class=\"default\">skip</div>
				</li>
				<li>
					<div class=\"name\">highResImagesWidthThreshold</div>
					<div class=\"description\">The item width on which to start using the the provided high resolution image instead of the normal one. High resolution images are specified via the \"data-high-res-image-src\" or \"data-high-res-background-image-url\" html element properties of each item.</div>
					<div class=\"default\">350</div>
				</li>
				<li>
					<div class=\"name\">outerMargin</div>
					<div class=\"description\">A margin size in pixels for the outher edge of the whole mosaic.</div>
					<div class=\"default\">0</div>
				</li>
				<li>
					<div class=\"name\">innerGap</div>
					<div class=\"description\">A gap size in pixels to leave a space between elements.</div>
					<div class=\"default\">0</div>
				</li>
				<li>
					<div class=\"name\">responsiveWidthThreshold</div>
					<div class=\"description\">The minimum width for which to keep building the mosaic. If specified, when the width is less than this, the mosaic building logic is not applied, and one item per row is always shown. This might help you avoid resulting item sizes that are too small and might break complex html/css inside them, specially when aiming for great responsive mosaics. When using this, you can also specify a \"data-only-force-height-when-necessary\" html item property with value \"1\" in the specific items you don't want to apply forced aspect ratios when this minimum width threshold is reached.</div>
					<div class=\"default\">false</div>
				</li>
			</ul>
			<p>For example:</p>
			<blockquote class=\"code javascript\">".formatHtml("
$('#myMosaic').Mosaic({
	maxRowHeight: 800,
	refitOnResize: true,
	refitOnResizeDelay: false,
	defaultAspectRatio: 0.5,
	maxRowHeightPolicy: 'crop',
	highResImagesWidthThreshold: 850,
	responsiveWidthThreshold: 500
});
			")."</blockquote>
		</div>

		<hr>

		<div class=\"content\">
			<a name=\"advancedUsage\"></a>
			<h1>Advanced usage</h1>
			<ul class=\"fancy\">
				<li>
					You can specify the aspect ratio of each mosaic piece by adding the <i>data-aspect-ratio</i> property on each element instead of the <i>height</i> and <i>width</i>
					<blockquote class=\"code html\">".formatHtml("
<div id=\"myMosaic\">
	<img src=\"image1.jpg\" data-aspect-ratio=\"1.432\" />
	<img src=\"image2.jpg\" data-aspect-ratio=\"0.3\" />
	<img src=\"image3.jpg\" data-aspect-ratio=\"1.4842\" />
	<img src=\"image4.jpg\" data-aspect-ratio=\"0.883\" />
	...
</div>
					")."</blockquote>
				</li>
				<li>
					You can specify a high resolution version of the image by adding the <i>data-high-res-image-src</i> property on each element. It will only be loaded and used when needed
					<blockquote class=\"code html\">".formatHtml("
<div id=\"myMosaic\">
	<img src=\"image1.jpg\" data-aspect-ratio=\"1.432\" data-high-res-image-src=\"image1_highres.jpg\"/>
	<img src=\"image2.jpg\" data-aspect-ratio=\"0.3\" data-high-res-image-src=\"image2_highres.jpg\" />
	<img src=\"image3.jpg\" data-aspect-ratio=\"1.4842\" data-high-res-image-src=\"image3_highres.jpg\" />
	<img src=\"image4.jpg\" data-aspect-ratio=\"0.883\" data-high-res-image-src=\"image4_highres.jpg\" />
	...
</div>
					")."</blockquote>
				</li>
				<li>
					You can use DIVs instead of IMGs for the mosaic. They will be resized to the proper width and height, and their contents will be left untouched, like in <a href=\"example_divs.php\">this example</a>
					<blockquote class=\"code html\">".formatHtml("
<div id=\"myMosaic\">
	<div data-aspect-ratio=\"1.32\">My content</div>
	<div data-aspect-ratio=\"1.02\">My content</div>
	<div data-aspect-ratio=\"0.8\">My content</div>
	<div data-aspect-ratio=\"1.02\">My content</div>
	...
</div>
					")."</blockquote>
				</li>
				<li>
					You can set background images to DIVs for more interesting creative options, add the provided <i>item</i> CSS class to each mosaic element to do so, or use your own CSS
					<blockquote class=\"code html\">".formatHtml("
<div id=\"myMosaic\">
	<div class=\"item withImage\" data-aspect-ratio=\"1.32\" style=\"background-image: url('image1.jpg');\">My content</div>
	<div class=\"item withImage\" data-aspect-ratio=\"1.02\" style=\"background-image: url('image2.jpg');\">My content</div>
	<div class=\"item withImage\" data-aspect-ratio=\"0.8\" style=\"background-image: url('image3.jpg');\">My content</div>
	<div class=\"item withImage\" data-aspect-ratio=\"1.02\" style=\"background-image: url('image4.jpg');\">My content</div>
	...
</div>
					")."</blockquote>
				</li>
				<li>
					When using background images on DIVs, you can still specify a high resolution background image by adding the <i>high-res-background-image-url</i> property
					<blockquote class=\"code html\">".formatHtml("
<div id=\"myMosaic\">
	<div class=\"item withImage\" data-aspect-ratio=\"1.32\" style=\"background-image: url('image1.jpg');\" data-high-res-background-image-url=\"image1_highres.jpg\">My content</div>
	<div class=\"item withImage\" data-aspect-ratio=\"1.02\" style=\"background-image: url('image2.jpg');\" data-high-res-background-image-url=\"image2_highres.jpg\">My content</div>
	<div class=\"item withImage\" data-aspect-ratio=\"0.8\" style=\"background-image: url('image3.jpg');\" data-high-res-background-image-url=\"image3_highres.jpg\">My content</div>
	<div class=\"item withImage\" data-aspect-ratio=\"1.02\" style=\"background-image: url('image4.jpg');\" data-high-res-background-image-url=\"image4_highres.jpg\">My content</div>
	...
</div>
					")."</blockquote>
				</li>
				<li>
					Using Anchors instead of DIVs, background images, and an overlay you can create <a href=\"example_high_resolution.php\">a neat interactive mosaic</a>.
					<blockquote class=\"code html\">".formatHtml("
<div id=\"myMosaic\">
	<div class=\"item withImage\" data-aspect-ratio=\"1.32\" style=\"background-image: url('image1.jpg');\" data-high-res-background-image-url=\"image1_highres.jpg\">
		<div class=\"overlay\"><div class=\"texts\">
				<h1>Title</h1>
				<h1>Subtitle</h1>
		</div></div>
	</div>
	<div class=\"item withImage\" data-aspect-ratio=\"1.02\" style=\"background-image: url('image2.jpg');\" data-high-res-background-image-url=\"image2_highres.jpg\">
		<div class=\"overlay\"><div class=\"texts\">
				<h1>Title</h1>
				<h1>Subtitle</h1>
		</div></div>
	</div>
	<div class=\"item withImage\" data-aspect-ratio=\"0.8\" style=\"background-image: url('image3.jpg');\" data-high-res-background-image-url=\"image3_highres.jpg\">
		<div class=\"overlay\"><div class=\"texts\">
				<h1>Title</h1>
				<h1>Subtitle</h1>
		</div></div>
	</div>
	..
</div>
					")."</blockquote>
				</li>
			</ul>
		</div>

		<hr>
	";

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
			"title" => "Example with margins",
			"description" => "You can specify an outer margin for the whole mosaic and an inner gap to leave an empty space between mosaic items independently.",
			"link" => "example_margins.php"
		],
		[
			"title" => "maxRowHeightPolicy demo",
			"description" => "See the differences between the maxRowHeightPolicy modes",
			"link" => "example_maxrowheightpolicy.php"
		],
		[
			"title" => "See a real application",
			"description" => "See the plugin at work at Litmind.com",
			"link" => "https://litmind.com",
			"linkIsNewwWindow" => true
		]
	];

	$content .= "<div class=\"content\"><a name=\"examples\"></a><ul class=\"fancy\">";
	foreach ($examples as $example)
		$content .=
			"<li>".
				"<a class=\"title\" href=\"".$example["link"]."\"".($example["linkIsNewwWindow"] ? " target=\"_newwindow\"" : null).">".$example["title"]."</a>".
				($example["description"] ? $example["description"] : null).
			"</li>";
	$content .= "</ul></div>";

	pattern([
		"title" => "jQuery Mosaic plugin",
		"header" => "jQuery Mosaic plugin",
		"headerSubtitle" => "with <div class=\"love\"></div> by <a href=\"http://tin.cat\">tin.cat</a> · download on <a href=\"https://github.com/tin-cat/jquery-mosaic\">Github</a> · see <a href=\"#examples\">examples</a>",
		"headerSubSubtitle" => "Builds responsive mosaics of images or any other content fitted to match heights in multiple rows while maintaining aspect ratios",
		"footer" => "with <div class=\"love\"></div> by <a href=\"http://tin.cat\">tin.cat</a>",
		"mosaic" => $mosaic,
		"content" => $content
	]);
