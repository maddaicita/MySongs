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
          <h3 class="ui huge header">Song: <?php echo $row['title']; ?></h3>
          <h2 class="ui header">Author: <?php echo $row['author']; ?></h2>
            <small>Year Released: <?php echo $row['year_released']; ?></small>
            <br>
            <br>
          <img src="<?php echo $row['photo_url']; ?>" class="ui fluid image">
          <br>
          <br>
          <p class="ui floating message">Comments: <?php echo $row['comments']; ?></p>
        </div>
        <br>
        <br>
            <a href="show_songs.php" class="ui teal basic large button">Back</a>
            <br>
            <br>
      </div>


    </div>
  </div>


  <?php endwhile; ?>

<?php include_once 'footer.php'; ?> 
