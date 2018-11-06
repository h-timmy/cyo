<?php require_once('../../private/initialize.php'); ?>

<?php 
$athlete_name = $_GET['athlete_name'] ?? '';
$yob = $_GET['yob'] ?? '';
$team_name = $_GET['team_name'] ?? '';
?>

<?php $page_title = $athlete_name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<div id ="content">
	Athlete Name: <?php echo h($athlete_name); ?><br>
	Year of Birth: <?php echo h($yob); ?><br>
	Team Name: <?php echo h($team_name); ?><br>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>