<?php require_once('../../private/initialize.php');

$meet_date = '';
$meet_location = '';
$meet_name = '';

if(is_post_request()) {

  // Handle form values sent by new.php


  $meet_date = $_POST['meet_date'] ?? '';
  $meet_location = $_POST['meet_location'] ?? '';
  $meet_name = $_POST['meet_name'] ?? '';

  $sql = "INSERT INTO meet ";
  $sql .= "(meet_date, meet_location, meet_name) ";
  $sql .= "VALUES (";
  $sql .= "'" . $meet_date . "',";
  $sql .= "'" . $meet_location . "',";
  $sql .= "'" . $meet_name . "')";
  $result = mysqli_query($db, $sql);
  if($result){
 	redirect_to(url_for('/Meets/index.php'));
  } else{
  	echo mysqli_error($db);
  	db_disconnect($db);
  	exit;
  }

}

 ?>

<?php $page_title = 'New Meet'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id = "content">
	<a class="back-link" href="<?php echo url_for('/meets/index.php'); ?>">&laquo; Back to Meets</a>

	<h1>Add Meet</h1>

	<div id = "add one">
		<form action="<?php echo url_for('/Meets/new.php'); ?>"  method="post">
			<dl>
				<dt>Meet Date</dt>
				<dd>
					<input type="Date" name="meet_date" value="<?php echo h($meet_date); ?>">
				</dd>
			</dl>
			<dl>
				<dt>Meet Location</dt>
				<dd><input type="text" name="meet_location" value="<?php echo h($meet_location); ?>"></dd>
			</dl>
			<dl>
				<dt>Meet Name</dt>
				<dd><input type="text" name="meet_name" value="<?php echo h($meet_name); ?>"></dd>
			</dl>
			<input type="submit" name="Add Meet">
		</form>
	</div>

</div>


<?php include(SHARED_PATH . '/footer.php'); ?>