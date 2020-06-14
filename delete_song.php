<?php include_once 'header.php';

      if (!$is_logged_in){
          $_SESSION['errors'] = 'Error. You are not logged in.';
            header('location: index.php?errors=true');
      }
?> 

<?php 
  $result = $mysqli->query("SELECT * FROM my_songs WHERE id=$id") or die($mysqli->error);
?>
  <?php 
  while ($row = $result->fetch_assoc()): ?>
            <br>
            <br>
            <br>
            <br>
  <div class="ui middle aligned center aligned grid">
    <div class="eight wide column">
      <div class="ui raised segments">
        <div class="ui segment">
          <h2 class="title"><?php echo $header; ?>?</h2>
          <h2 class="ui header">Author: <?php echo $row['author']; ?></h2>
          <p class="ui floating message">Comments: <?php echo $row['comments']; ?></p>
          <p class="song-text"><small>Year Released: <?php echo $row['year_released']; ?></small></p>
          <br>
          <br>
          <a href="show_songs.php" class="ui teal large button">Cancel</a>
          <a href="database.php?confirm_delete=<?php echo $row['id']; ?>" class="ui red button">Delete</a>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>

<?php include_once 'footer.php'; ?> 


