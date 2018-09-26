<!DOCTYPE HTML>
<head>
	<title><?= $title ? $title : "jquery-mosaic plugin example" ?></title>
	<link rel="stylesheet" type="text/css" href="res/css/main.css?v=5"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery.mosaic.css?v=5"/>
	<meta http-equiv="X-UA-Compatible" content="IE=9">
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