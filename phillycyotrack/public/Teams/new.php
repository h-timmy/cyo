<?php require_once('../../private/initialize.php'); 

$team_name = '';
$region = '';
$area = '';


if(is_post_request()) {

  // Handle form values sent by new.php

  $team_name = $_POST['team_name'] ?? '';
  $region = $_POST['region'] ?? '';
  $area = $_POST['area'] ?? '';

$sql = "INSERT INTO team";
  $sql .="(team_name, region, area)";
  $sql .="VALUES (";
  $sql .="'" . $team_name . "',";
  $sql .="'" . $region . "',";
  $sql .="'" . $area . "'";
  $sql .=")";
  $result = mysqli_query($db, $sql);
  if($result){
    redirect_to(url_for('/Teams/index.php'));
  } else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

?>

<?php $page_title = 'New Team'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content"> 
    <h1>Add Team</h1>

    <div id="add one">
        <form action="<?php echo url_for('/Teams/new.php'); ?>" method = "post">
            <dl>
                <dt>Team Name</dt>
                <dd><input type="text" name="team_name" value="<?php echo h($team_name) ?>"></dd>
            </dl>
            <dl>
                <dt>Region</dt>
                <dd>
                    <select name="region" value = "<?php echo h($region); ?>">
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="32">32</option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Area</dt>
                <dd>
                    <select name="area" value= "<?php echo h($area); ?>">
                        <option value="A">A</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </dd>
            </dl>
            <input type="submit" name="Add Team">
        </form>
    </div>

    <div id = "add multiple">
        <form action="<?php echo url_for('/Meets/new.php'); ?>" method="post" >
            Load a .csv file: <input type="file" name="my_file"> <br>
            <input type="submit" name="Add Meets">
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>