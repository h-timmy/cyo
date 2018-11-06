<?php require_once('../../private/initialize.php'); ?>

<?php 
$team_name = $_GET['team_name'] ?? '';
$sql_team_info = "SELECT * FROM team WHERE team_name = '" . $team_name . "';" ;
$result_team_info = mysqli_query($db, $sql_team_info);
$team = mysqli_fetch_assoc($result_team_info);

$sql_athletes = "SELECT * FROM athlete WHERE team_name = '" . $team_name . "' ";
$sql_athletes .= "ORDER BY yob DESC;";
$result_athletes = mysqli_query($db, $sql_athletes);

?>

<?php $page_title = $team_name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<div id = "content">
	<div id = "team_header">
		<h1><?php echo h($team[team_name]); ?></h1>
		<h2><?php echo "Region:" . h($team[region]); ?></h2>
		<h2><?php echo "Area:" . h($team[area]); ?></h2>
	</div>
	<div>
		<h1>Athletes</h1>
		<div class="action">
      		<a class="action" href="<?php echo url_for('/Athletes/new.php'); ?>">Add Athlete</a>
    	</div>
		<table class="athletes on team">
			<tr>
				<td>Athlete Name</td>
				<td>Year of Birth</td>
				<td>Gender</td>
			</tr>
			<?php while ($athlete = mysqli_fetch_assoc($result_athletes)) { ?>
				<tr>
					<td><?php echo h($athlete['athlete_name']); ?></td>
					<td><?php echo h($athlete['yob']); ?></td>
					<td><?php echo h($athlete['gender']); ?></td>
				</tr>
			<?php } ?>
		</table>

	</div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
