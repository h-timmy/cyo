<?php
  if(!isset($page_title)) { $page_title = ''; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>'PCYOTF' - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/reset.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/stylesheet.css'); ?>" />
    <style>
      
    </style>
  </head>

  <body>

    <header>
    	<h1>Philly CYO Track and Field</h1>
      <div id = "navbar">
        <h2><a href="<?php echo url_for('/');?>">Home</a></h2>
        <h2><a href="<?php echo 'Meets/index.php'; ?>">Meets</a></h2>
        <h2><a href="<?php echo url_for('/Athletes/index.php'); ?>">Athletes</a></h2>
        <h2><a href="<?php echo url_for('/Teams/index.php'); ?>">Teams</a></h2>
    </div>
    </header>

    

