<?php require_once('../../private/initialize.php'); ?>

<?php 
$meet_id = $_GET['meet_id'] ?? '1';

$sql = "SELECT * FROM meet WHERE meet_id='" . $meet_id . "';";
$result = mysqli_query($db, $sql);
$this_meet = mysqli_fetch_assoc($result);
$date = strtotime($this_meet['meet_date']);
$new_date = date("m/d/Y", $date);

$sql_events = "SELECT * FROM event WHERE meet_id = '" . $meet_id . "';";
$events = mysqli_query($db, $sql_events);
if($result){
 	
  } else{
  	echo mysqli_error($db);
  	db_disconnect($db);
  	exit;
  }
?>


<?php include(SHARED_PATH . '/header.php'); ?>
<div id = "content">
	<div id = "meet header">
		<h1>
			<?php echo h($this_meet[meet_name]) . "  @" . h($this_meet[meet_location]);?>	
		</h1>
		<h2><?php echo h($new_date); ?></h2>
	</div>

	<div>
		<h1>Events</h1>
		<div class="action">
      		<a class="action" href="<?php echo url_for('/Events/new.php?meet_id=' . $meet_id); ?>">Add Event</a>
    	</div>
		<table class="events_in_meet">
			<tr>
				<td>Event ID</td>
				<td>Gender</td>
				<td>Age Group</td>
				<td>Event Type</td>
				<td>Event Name</td>
			</tr>
			<?php while ($event = mysqli_fetch_assoc($events)) { ?>
				<tr>
					<td>
						<a href="<?php echo url_for('/Events/show_event.php?event_id=' . h(u($event[event_id]))); ?>" > 
						<?php echo h($event[event_id]); ?>
               			</a>
					</td>
					<td><?php echo h($event['gender']); ?></td>
					<td><?php echo h($event['age_group']); ?></td>
					<td><?php echo h($event['event_type']); ?></td>
					<td><?php echo h($event['event_name']); ?></td>
				</tr>
			<?php } ?>
		</table>

	</div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>