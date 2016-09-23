<html>
<head>
	<title><?= $title ? $title : "jquery-mosaic plugin example" ?></title>
	<link rel="stylesheet" type="text/css" href="res/css/main.css?v=2"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery.mosaic.css?v=2"/>
	<script type="text/javascript" src="jquery.mosaic.js?v=2"></script>
</head>
<body>

<?= $header ? "<header>$header".($headerSubtitle ? "<h2>$headerSubtitle</h2>" : null)."".($headerSubSubtitle ? "<h3>$headerSubSubtitle</h3>" : null)."</header>" : null ?>

<?= $mosaic ? $mosaic : null ?>

<?= $content ? $content : null ?>

<?= $footer ? "<div class=\"footer\">$footer</div>" : null ?>

</body>
</html>