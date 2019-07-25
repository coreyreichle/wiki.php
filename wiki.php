<?php
/*
This code is Copyright(c) 2019 by ubergeek under the AGPL 3 or later.
Parsedown is licensed under the MIT license.
ParsedownExtra is licensed under the MIT license.
*/

include('config.php');
include('parsedown/Parsedown.php');
include('parsedownextra/ParsedownExtra.phgp');

$page = $_GET['page'];
$style = $_GET['style'];
$Parsedown = new Parsedown();
$Parsedown->setSafeMode(true);

if ( $page == "") {
	$page = "main";
	}

if ( $style == "") {
	if ( $site_style == "") {
		$site_style="site";
	}
}
else {
	$site_style=$style;
}

$header  = file_get_contents("$doc_root/includes/header.md");
$sidebar = file_get_contents("$doc_root/includes/sidebar.md");
$content = file_get_contents("$doc_root/articles/$page.md");
$footer  = file_get_contents("$doc_root/includes/footer.md");
 
print "<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>$site_name - $page</title>
		<link rel='stylesheet' type='text/css' href='$site_root/includes/$site_style.css'>
	</head>
	<body>
<!-- Begin Header -->

	<div id='header'>";

print $Parsedown->text($header);

print "
		</div>
<!-- End Header -->
";

print "<hr>
	<div id='body'>

<!-- Begin Sidebar  -->
		<div id='sidebar'>
";

echo $Parsedown->text($sidebar);

print "		</div>
<!-- End Sidebar -->

<!-- Begin Body -->
		<div id='content'>";

echo $Parsedown->text($content);

print "		</div>
<!-- End Body -->

	</div>

<!-- Begin Footer -->
	<div id='footer'>
	<hr>
";

echo $Parsedown->text($footer);

print "	</div>
<!-- End Footer -->

	</body>
</html>";
?>
