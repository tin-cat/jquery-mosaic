<!DOCTYPE HTML>
<head>
	<title><?= $title ? $title : "jquery-mosaic plugin example" ?></title><!-- omitOnExampleSource -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery.mosaic.css?v=4"/>
	<script type="text/javascript" src="jquery.mosaic.js?v=4"></script>
	<link rel="stylesheet" type="text/css" href="res/css/main.css?v=4"/><!-- omitOnExampleSource -->
	<script type="text/javascript" src="res/js/main.js?v=4"></script><!-- omitOnExampleSource -->
</head>
<body>
<div id="exampleContent"><!-- omitOnExampleSource -->
	<div id="source"></div><!-- omitOnExampleSource -->
	<div id="bar"><!-- omitOnExampleSource -->
		<div class="buttons"><!-- omitOnExampleSource -->
			<a class="button" href="./">Home</a><!-- omitOnExampleSource -->
			<a class="button" onclick="showSource('http<?=  $_SERVER['HTTPS'] ? "s" : null ?>://<?= $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>');">View source</a><!-- omitOnExampleSource -->
		</div><!-- omitOnExampleSource -->
		<?= $title ? "<div class=\"title\">$title</div>" : null ?><!-- omitOnExampleSource -->
	</div> <!-- omitOnExampleSource -->

<?= $content ?>

</div><!-- omitOnExampleSource -->
</body>
</html>