<?php require_once('../../private/initialize.php'); ?>
<?php 
$event_id = $_GET['event_id'] ?? '1';

$sql = "SELECT * FROM individual_result WHERE event_id='" . $event_id . "' ORDER BY result;";
$result = mysqli_query($db, $sql);

$sql_event = "SELECT * FROM event WHERE event_id = '" . $event_id . "';";
$this_event = mysqli_fetch_assoc(mysqli_query($db, $sql_event));
if($result){
 	
  } else{
  	echo mysqli_error($db);
  	db_disconnect($db);
  	exit;
  }
?>



<?php $page_title = 'Individual Track Event'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<div id = "content">
	<div id = "event header">
		<h1>
			<?php echo h($this_event[age_group]) . " " . h($this_event[gender]) . " " . h($this_event[event_name]);?>	
		</h1>
		<h2></h2> #add meet date
	</div>

	<div>
		<h1>Results</h1>
		<div class="action">
      		<a class="action" href="<?php echo url_for('/Results/new.php?event_id=' . $event_id); ?>">Add Results</a>
    	</div>
		<table class="relay_results">
			<tr>
				<td>Place</td>
				<td>Athlete Name</td>
				<td>Year of Birth</td>
				<td>Team Name</td>
				<td>Time</td>
			</tr>
			<?php while ($r = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo h($r[ROW_NUMBER()]); ?></td>
					<td><?php echo h($r['athlete_name']); ?></td>
					<td><?php echo h($r['yob']); ?></td>
					<td><?php echo h($r['team_name']); ?></td>
					<td><?php echo h($r['result']); ?></td>
				</tr>
			<?php } ?>
		</table>

	</div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>