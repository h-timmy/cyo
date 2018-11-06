<?php require_once('../../private/initialize.php'); ?>

<?php 
$event_id = $_GET['event_id'] ?? '1';
$sql = "SELECT * FROM event WHERE event_id=" . $event_id . ";";
$this_event = mysqli_fetch_assoc(mysqli_query($db, $sql));
$event_type = $this_event['event_type'];
if ($event_type == 'relay') {
	redirect_to(url_for('/Events/show_relay_event.php?event_id=' . h(u($event_id))));
} elseif ($event_type == 'field') {
	redirect_to(url_for('/Events/show_field_event.php?event_id=' . h(u($event_id))));
} elseif ($event_type == 'individual track') {
	redirect_to(url_for('/Events/show_individual_track_event.php?event_id=' . h(u($event_id))));
} else {
	echo mysqli_error($db);
  	db_disconnect($db);
	exit;
}



?>

