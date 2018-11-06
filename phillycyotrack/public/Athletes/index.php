<?php require_once('../../private/initialize.php'); ?>

<?php

  $sql = "SELECT * FROM athlete";
  $subject_set = mysqli_query($db, $sql);

  $athletes = [
    ['athlete_name' => 'timmy', 'yob' => '99', 'gender' => 'm', 'team_name' => 'st. andrews'],
    ['athlete_name' => 'ethan', 'yob' => '00', 'gender' => 'm', 'team_name' => 'st. andrews'],
    ['athlete_name' => 'kevin', 'yob' => '99', 'gender' => 'm', 'team_name' => 'st. andrews'],
    ['athlete_name' => 'cal', 'yob' => '99', 'gender' => 'm', 'team_name' => 'st. andrews'],
  ];
?>


<?php $page_title = 'Athletes'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id = "content">
	<h1>Athletes</h1>

	<div class="action">
      <a class="action" href="<?php echo url_for('/Athletes/new.php'); ?>">Add Athlete</a>
  </div>

    <table class="list">
  	  <tr>
        <th>athlete_name</th>
        <th>yob</th>
        <th>gender</th>
  	    <th>team_name</th>
  	  </tr>

  	  <?php while($athlete = mysqli_fetch_assoc($subject_set)) { ?>
        <tr>
          <td>
            <a href="<?php echo url_for('/Athletes/show_athlete.php?athlete_name=' .
             h(u($athlete[athlete_name])) . '&yob=' . h(u($athlete[yob])) .
             '&team_name=' . h(u($athlete[team_name])) ); ?>"><?php echo h($athlete[athlete_name]); ?>
               
            </a>
          </td>
          <td><?php echo h($athlete['yob']); ?></td>
          <td><?php echo h($athlete['gender']); ?></td>
          <td>
            <a href="<?php echo url_for('/Teams/show_team.php?team_name=' . h(u($athlete[team_name]))) ?>">
              <?php echo h($athlete['team_name']); ?>
            </a>
          </td>
    	</tr>
      <?php } ?>

     </table>

     <?php mysqli_free_result($subject_set);?>

</div>


<?php include(SHARED_PATH . '/footer.php'); ?>