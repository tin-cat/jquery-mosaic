<!DOCTYPE HTML>
<head>
	<title><?= $title ? $title : "jQuery Mosaic" ?></title>
	<meta name="description" content="<?= $description ? $description : "A jQuery plugin for building responsive mosaics of images or any other content fitted to match heights in multiple rows while maintaining aspect ratios." ?>" />
	<meta name="keywords" content="<?= $keywords ? $keywords : "jquery,mosaic,plugin,javascript,gallery,photos,masonry" ?>" />
	<meta name="distribution" CONTENT="global" />
	<link rel="canonical" href="https://jquery-mosaic.tin.cat" />
	<link rel="stylesheet" type="text/css" href="res/css/main.css?v=5"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery.mosaic.css?v=5"/>
	<script type="text/javascript" src="jquery.mosaic.js?v=4"></script>
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
</head>
<body>

<?= $header ? "<header><h1>$header</h1>".($headerSubtitle ? "<h2>$headerSubtitle</h2>" : null)."".($headerSubSubtitle ? "<h3>$headerSubSubtitle</h3>" : null)."</header>" : null ?>

<?= $mosaic ? $mosaic : null ?>

<?= $content ? $content : null ?>

<?= $footer ? "<div class=\"footer\">$footer</div>" : null ?>

<?php if (file_exists("res/additional_footer.php")) include "res/additional_footer.php"; ?>

</body>
</html>