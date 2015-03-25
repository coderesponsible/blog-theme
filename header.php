<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<!-- iOS Specific -->
	<meta name="apple-mobile-web-app-capable" content="yes" /> 	
	<meta name="apple-mobile-web-app-status-bar-style" content="default" />
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>/images/cr-icon.png" />
	<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="icon" href="http://coderesponsible.com/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
	
	<!--[if IE]>
			<script src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script>
	<![endif]-->
	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-35062160-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head>
<body>
	<header class="row">
		<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search">
			<fieldset>
				<label for="search">Search:</label><input type="search"  name="s" id="search">
				<button>Search</button>
			</fieldset>
		</form>
		<a href="#main" class="main-content-link">Skip navigation</a>
		<nav id="main-nav">
			<ul>
				<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
				<li><a href="<?php bloginfo('url'); ?>/category/development">Development</a></li>
				<li><a href="<?php bloginfo('url'); ?>/category/accessibility">Accessibility</a></li>
				<li><a href="<?php bloginfo('url'); ?>/category/tips">Tips</a></li>
			</ul>
		</nav>
		<nav id="menu">
			<a href="#" id="search-link"><span>search</span></a>
			<a href="#" id="menu-link"><span>Menu</span></a>
		</nav>
	</header>
	<div class="row">
	        