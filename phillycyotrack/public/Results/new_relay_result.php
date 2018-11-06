<?php require_once('../../private/initialize.php'); ?>

<?php 
$event_id = $_GET['event_id'];
$team_name =  '';
$result = '';

if(is_post_request()) {

  // Handle form values sent by new.php

	$team_name = $_POST['team_name'] ?? '';
	$result = $_POST['result'] ?? '';

  $sql = "INSERT INTO relay_result";
  $sql .="(event_id, team_name, result)";
  $sql .="VALUES (";
  $sql .="'" . $event_id . "',";
  $sql .="'" . $team_name . "',";
  $sql .="'" . $result . "'";
  $sql .=")";
  $added = mysqli_query($db, $sql);
  if($added){
 	redirect_to(url_for('/Events/show_relay_event.php?event_id=' . $event_id));
  } else{
  	echo mysqli_error($db);
  	db_disconnect($db);
  	exit;
  }

 }

?>

<?php $page_title = 'New Result'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id = "content">
	<h1>Add Result</h1>

	<div id="add one">
		<form action="<?php echo url_for('/Results/new_relay_result.php?event_id=' . $event_id); ?>" method="post" > 
			<dl>
				<dt>Team Name</dt>
				<dd>
					<input type="text" name="team_name" value="<?php echo h($team_name); ?>">
				</dd>
			</dl>
			<dl>
				<dt>Time</dt>
				<dd>
					<input type="text" name="result" value="<?php echo h($result); ?>">
				</dd>
			</dl>
			<input type="submit" name="Add Result">
		</form>
	</div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>