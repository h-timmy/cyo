<?php require_once('../../private/initialize.php'); ?>


<?php 
$event_id = $_GET['event_id'] ?? '1';

$event_select = "SELECT * FROM event WHERE event_id=" . $event_id .";";
$this_event = mysqli_fetch_assoc(mysqli_query($db, $event_select));

$sql = "SELECT * FROM relay_result WHERE event_id=" . $event_id . ";";
$result = mysqli_query($db, $sql)

if($result){
 	
  } else{
  	echo mysqli_error($db);
  	db_disconnect($db);
  	exit;
  }

?>



<?php $page_title = 'Relay Event'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<div id = "content">
	<div id = "event header">
		<h1>
				
		</h1>
		<h2></h2> #add meet date
	</div>

	<div>
		<h1>Results</h1>
		<div class="action">
      		#<a class="action" href="<?php echo url_for('/Results/new.php?event_id=' . $event_id); ?>">Add Results</a>
    	</div>
		<table class="relay_results">
			<tr>
				<td>Place</td>
				<td>Team Name</td>
				<td>Time</td>
			</tr>
			<?php while ($aresult = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo h($aresult['event_id']); ?></td>
					<td><?php echo h($aresult['team_name']); ?></td>
					<td><?php echo h($aresult['result']); ?></td>
				</tr>
			<?php } ?>
		</table>

	</div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>