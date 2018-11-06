<?php require_once('../../private/initialize.php'); ?>
<?php

$meet_id = $_GET['meet_id'] ?? '';
$age_group = '';
$gender = '';
$event_type = '';
$event_name = ''; 

if(is_post_request()) {

  // Handle form values sent by new.php

  $age_group = $_POST['age_group'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $event_type = $_POST['event_type'] ?? '';
  $event_name = $_POST['event_name'] ?? '';

  $sql = "INSERT INTO event";
  $sql .="(meet_id, age_group, gender, event_name, event_type)";
  $sql .="VALUES (";
  $sql .="'" . $meet_id . "',";
  $sql .="'" . $age_group . "',";
  $sql .="'" . $gender . "',";
  $sql .="'" . $event_name . "',";
  $sql .="'" . $event_type . "'";
  $sql .=")";
  $result = mysqli_query($db, $sql);
  if($result){
 	redirect_to(url_for('/Meets/show_meet.php?meet_id=' . h(u($meet_id))));
  } else{
  	echo mysqli_error($db);
  	db_disconnect($db);
  	exit;
  }

 }
?>

<?php $page_title = 'New Event'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id = "content">
	<h1>Add Event</h1>

	<div id="add one">
		<form action="<?php echo url_for('/Events/new.php?meet_id=' . $meet_id); ?>" method="post" > 
			<dl>
				<dt>Age Group</dt>
				<dd>
					<select name="age_group" value = "<?php echo h($age_group); ?>">
						<option value="novice">novice</option>
						<option value="minor">minor</option>
						<option value="cadet">cadet</option>
						<option value="mixed">mixed</option>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>Gender</dt>
				<dd>
					<select name="gender" value = "<?php echo h($gender); ?>">
						<option value="m">M</option>
						<option value="f">F</option>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>Event Type</dt>
				<dd>
					<select name="event_type" value = "<?php echo h($event_type); ?>">
						<option value="relay">relay</option>
						<option value="field">field</option>
						<option value="individual track">individual track</option>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>Event Name</dt>
				<dd>
					<select name="event_name" value = "<?php echo h($event_name); ?>">
						<option value="100m">100m</option>
						<option value="200m">200m</option>
						<option value="400m">400m</option>
						<option value="800m">800m</option>
						<option value="1600m">1600m</option>
						<option value="4x100m">4x100m</option>
						<option value="4x200m">4x200m</option>
						<option value="4x400m">4x400m</option>
						<option value="4x800m">4x800m</option>
						<option value="High Jump">High Jump</option>
						<option value="Long Jump">Long Jump</option>
						<option value="Triple Jump">Triple Jump</option>
						<option value="Shot Put">Shot Put</option>
					</select>
				</dd>
			</dl>
			<input type="submit" name="Add Event">
		</form>
	</div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>