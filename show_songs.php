
<?php include_once 'header.php' ?> 
    <?php 
      $result = $mysqli->query("SELECT * FROM my_songs ORDER BY created_at DESC") or die($mysqli->error);

      if (!$is_logged_in){
          $_SESSION['errors'] = 'Error. You are not logged in.';
            header('location: index.php?errors=true');
      }
    ?>
   
            <br>
            <br>
            <h1>My Favorite Songs</h1>
            <a href="add_song.php" class="large ui teal button">Add New</a>
            <br>
            <br>
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Song Id</th>
                        <th>Song Title</th>
                        <th>Author</th>
                        <th>Bilboard Hit Number</th>
                        <th>Year Released</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                  while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['hit_position']; ?></td>
                        <td><?php echo $row['year_released']; ?></td>
                        <td>
                            <a href="add_song.php?edit=<?php echo $row['id']; ?>"
                                class="ui teal button">Edit</a>
                            <br>
                            <br>
                            <a href="delete_song.php?delete=<?php echo $row['id']; ?>"
                                class="ui teal button">Delete</a>
                            <br>
                            <br>
                            <a href="song.php?id=<?php echo $row['id']; ?>"
                                class="ui teal button">ViewDetails</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

    <br>
    <br>

<?php include_once 'footer.php' ?>
    
