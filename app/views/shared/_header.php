<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Dowling’s Wheel: Tables for Learning Latin by the Dowling Method</title>
<link href="public/stylesheets/styles.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
<div id="header">
	<div id="logo">
		<h1><a href="index.php">Dowling’s Wheel</a></h1>
		<p>Tables for Learning Latin by the Dowling Method</p>
	</div>
</div>
<div id="menu">
	<ul>
        <li <?php if (ifsetor($this->page) === 'home') { echo 'class="current_page_item"'; } ?>><a href="index.php">Home</a></li>
		<li <?php if (ifsetor($this->page) === 'demo') { echo 'class="current_page_item"'; } ?>><a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::NOUNS) ?>&demo=1">Demo</a></li>
		<li <?php if (ifsetor($this->page) === 'blog') { echo 'class="current_page_item"'; } ?>><a href="http://jonaquino.blogspot.com/2009/12/dowlings-wheel-webapp-i-wrote-to-assist.html">Blog</a></li>
		<li <?php if (ifsetor($this->page) === 'goodies') { echo 'class="current_page_item"'; } ?>><a href="index.php?controller=help&action=show&id=goodies">Goodies</a></li>
		<li <?php if (ifsetor($this->page) === 'about') { echo 'class="current_page_item"'; } ?>><a href="index.php?controller=help&action=show&id=about">About</a></li>
		<li <?php if (ifsetor($this->page) === 'contact') { echo 'class="current_page_item"'; } ?>><a href="index.php?controller=help&action=show&id=contact">Contact</a></li>
	</ul>
</div>
<div id="page">
	<div id="content">
