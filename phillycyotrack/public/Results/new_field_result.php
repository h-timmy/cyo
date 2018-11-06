<?php require_once('../../private/initialize.php'); ?>


<?php 
$event_id = $_GET['event_id'];
$athlete_name = '';
$yob = '';
$team_name =  '';
$result = '';

if(is_post_request()) {

  // Handle form values sent by new.php
	$athlete_name = $_POST['athlete_name'] ?? '';
	$yob = $_POST['yob'] ?? '';
	$team_name = $_POST['team_name'] ?? '';
	$result = $_POST['result'] ?? '';

  $sql = "INSERT INTO individual_result";
  $sql .="(event_id, athlete_name, yob, team_name, result)";
  $sql .="VALUES (";
  $sql .="'" . $event_id . "',";
  $sql .="'" . $athlete_name . "',";
  $sql .="'" . $yob . "',";
  $sql .="'" . $team_name . "',";
  $sql .="'" . $result . "'";
  $sql .=")";
  $added = mysqli_query($db, $sql);
  if($added){
 	redirect_to(url_for('/Events/show_field_event.php?event_id=' . $event_id));
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
		<form action="<?php echo url_for('/Results/new_individual_track_result.php?event_id=' . $event_id); ?>" method="post" > 
			<dl>
				<dt>Athlete Name</dt>
				<dd>
					<input type="text" name="athlete_name" value="<?php echo h($athlete_name); ?>">
				</dd>
			</dl>
			<dl>
				<dt>Year of Birth</dt>
				<dd>
					<input type="Year" name="yob" value="<?php echo h($yob); ?>">
				</dd>
			</dl>
			<dl>
				<dt>Team Name</dt>
				<dd>
					<input type="text" name="team_name" value="<?php echo h($team_name); ?>">
				</dd>
			</dl>
			<dl>
				<dt>Distance/Height</dt>
				<dd>
					<input type="text" name="result" value="<?php echo h($result); ?>">
				</dd>
			</dl>
			<input type="submit" name="Add Result">
		</form>
	</div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>