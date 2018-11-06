<?php require_once('../../private/initialize.php'); ?>





<?php
  $sql = "SELECT * FROM meet;";
  $result = mysqli_query($db, $sql);
  $meets = [
    ['meet_id' => '1', 'meet_date' => '2017-03-07', 'meet_location' => 'Bensalem'],
    ['meet_id' => '2', 'meet_date' => '2017-03-14', 'meet_location' => 'CR South'],
    ['meet_id' => '3', 'meet_date' => '2017-04-18', 'meet_location' => 'Neshaminey'],
    ['meet_id' => '4', 'meet_date' => '2017-05-21', 'meet_location' => 'Bensalem', 'meet_name' => 'Region 19'],
  ];
?>


<?php $page_title = 'Meets'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id = "content">
	<h1>Meets</h1>

	<div class="action">
      <a class="action" href="<?php echo url_for('/Meets/new.php'); ?>">Add Meets</a>
    </div>

    <table class="list">
  	  <tr>
        <th>meet_id</th>
        <th>meet_date</th>
        <th>meet_location</th>
  	    <th>meet_name</th>
  	  </tr>

  	  <?php while($meet = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td>
            <a href="<?php echo url_for('/Meets/show_meet.php?meet_id=' . h(u($meet['meet_id']))); ?>">
              <?php echo h($meet['meet_id']); ?>
            </a>
          </td>
          <td><?php echo h($meet['meet_date']); ?></td>
          <td><?php echo h($meet['meet_location']); ?></td>
    	  <td><?php echo h($meet['meet_name']); ?></td>
    	</tr>
      <?php } ?>

     </table>

</div>


<?php include(SHARED_PATH . '/footer.php'); ?>