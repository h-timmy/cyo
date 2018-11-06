<?php require_once('../../private/initialize.php'); 

$athlete_name = '';
$yob = '';
$gender = '';
$team_name = '';

if(is_post_request()) {

  // Handle form values sent by new.php

  $athlete_name = $_POST['athlete_name'] ?? '';
  $yob = $_POST['yob'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $team_name = $_POST['team_name'] ?? '';

  $sql = "INSERT INTO athlete";
  $sql .="(athlete_name, yob, gender, team_name)";
  $sql .="VALUES (";
  $sql .="'" . $athlete_name . "',";
  $sql .="'" . $yob . "',";
  $sql .="'" . $gender . "',";
  $sql .="'" . $team_name . "'";
  $sql .=")";
  $result = mysqli_query($db, $sql);
  if($result){
 	redirect_to(url_for('/Athletes/index.php'));
  } else{
  	echo mysqli_error($db);
  	db_disconnect($db);
  	exit;
  }

 }

?>

<?php $page_title = 'New Athlete'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<dir id="content">

	<h1>Add Athlete</h1>

	<div id="add one">
		<form action="<?php echo url_for('/Athletes/new.php'); ?>" method="post" > 
			<dl>
				<dt>Athlete Name</dt>
				<dd><input type="text" name="athlete_name" value="<?php echo h($athlete_name); ?>"></dd>
			</dl>
			<dl>
				<dt>Year of Birth</dt>
				<dd><input type="Year" name="yob" value="<?php echo h($yob); ?>"></dd>
			</dl>
			<dl>
				<dt>Gender</dt>
				<dd><input type="radio" name="gender" value="m">Boy
					<input type="radio" name="gender" value="f">Girl
				</dd>
			</dl>
			<dl>
				<dt>Team Name</dt>
				<dd><input type="text" name="team_name" value="<?php echo h($team_name); ?>"></dd>
			</dl>
			<input type="submit" name="Add Athlete">
		</form>
	</div>

	<div id = "add multiple">
		<form action="<?php echo url_for('/Athletes/new.php'); ?>" method="post" >
			Load a .csv file: <input type="file" name="my_file"> <br>
			<input type="submit" name="Add Athletes">
		</form>
	</div>


</dir>

<?php include(SHARED_PATH . '/footer.php'); ?>