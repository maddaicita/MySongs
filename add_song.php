<?php include_once 'header.php';
      if (!$is_logged_in){
          $_SESSION['errors'] = 'Error. You are not logged in.';
            header('location: index.php?errors=true');
      }

?> 
            <br>
            <br>
            <br>
            <br>
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    <?php echo $header; ?>
                </div>
            </h2>
            <form class="ui large form" action="database.php" method="POST">

                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label style="padding-right: 10px;" for="name">Title (*)</label>
                            <input class="form-input" type="text" name="title" placeholder="Enter the title of the song"
                                value="<?php echo $title;?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <label style="padding-right: 10px;" for="visited_on">Author (*)</label>
                            <input class="form-input" type="text" name="author" placeholder="Ex. Celine Dion"
                                value="<?php echo $author;?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <label style="padding-right: 10px;" for="location">Year Released </label>
                            <input class="form-input" type="text" name="year_released" placeholder="Ex. 2017"
                                value="<?php echo $year_released;?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <label style="padding-right: 10px;" for="description">Comments (*)</label>
                            <textarea class="form-input" type="text" name="comments"
                                placeholder="Why is this your favorite song?"><?php echo $comments;?></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <label style="padding-right: 10px;" for="location">Bilboard Position (*)</label>
                            <input class="form-input" type="text" name="hit_position" placeholder="Ex. 1"
                                value="<?php echo $hit_position;?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <label style="padding-right: 10px;" for="photo_url">Photo URL (*)</label>
                            <input class="form-input" type="text" name="photo_url" placeholder="Enter a photo URL"
                                value="<?php echo $photo_url;?>">
                        </div>
                        <small><em>* Indicates Required.</em></small>

                    </div>
                    <?php 
                if ($update == true):
                    ?>
                <button class="ui teal button" type="submit" name="update">Update</button>
                <br>
          <br>
          <a class="ui secondary basic teal button" href="show_songs.php">Cancel</a>
            <?php else: ?>
          <button class="ui teal button" type="submit" name="save">Save</button>
          <br>
          <br>
          <a class="ui secondary basic teal button" href="show_songs.php">Cancel</a>
            <?php endif; ?>
            </form>


    <?php include_once 'footer.php'; ?> 
