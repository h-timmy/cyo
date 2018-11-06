<?php require_once('../../private/initialize.php'); ?>

<?php
  $sql = "SELECT * FROM team";
  $subject_set = mysqli_query($db, $sql);
  $teams = [
    ['team_name' => 'st. andrews', 'region' => '19', 'area' => 'C'],
    ['team_name' => 'st. bedes', 'region' => '19', 'area' => 'C'],
    ['team_name' => 'st. ignatious', 'region' => '19', 'area' => 'C'],
    ['team_name' => 'st. andrews dh', 'region' => '19', 'area' => 'C'],
  ];
?>


<?php $page_title = 'Teams'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id = "content">
	<h1>Teams</h1>

	<div class="action">
      <a class="action" href="<?php echo url_for('/Teams/new.php'); ?>">Add Team</a>
    </div>

    <table class="list">
  	  <tr>
        <th>team_name</th>
        <th>region</th>
        <th>area</th>
  	  </tr>

  	  <?php while($team = mysqli_fetch_assoc($subject_set)) { ?>
        <tr>
          <td><a href="<?php echo url_for('/Teams/show_team.php?team_name=' . h(u($team[team_name]))); ?>">
            <?php echo h($team[team_name]) ?>
          </a>
          </td>
          <td><?php echo h($team['region']); ?></td>
          <td><?php echo h($team['area']); ?></td>
    	</tr>
      <?php } ?>

     </table>

     <?php mysqli_free_result($subject_set); ?>

</div>


<?php include(SHARED_PATH . '/footer.php'); ?>