<?php require_once('../../private/initialize.php'); ?>

<?php 
$event_id = $_GET['event_id'] ?? '1';

$sql = "SELECT * FROM event WHERE event_id=" . $event_id . ";";
$this_event = mysqli_fetch_assoc(mysqli_query($db, $sql));
$event_type = $this_event['event_type'];

if ($event_type = 'relay') {
	redirect_to(url_for('/Results/new_relay_result.php?event_id=' . h(u($event_id))));
}
else if ($event_type = 'field') {
	redirect_to(url_for('/Results/new_field_result.php?event_id=' . h(u($event_id))));
}
else if ($event_type = 'individual track') {
	redirect_to(url_for('/Results/new_individual_track_result.php?event_id=' . h(u($event_id))));
}
else {
	redirect_to(url_for('/Meets'));
}

?>
