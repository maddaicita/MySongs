

<?php include_once 'header.php'; 
         

               if ($is_logged_in){
          $_SESSION['errors'] = 'Error. You are already logged in.';
            header('Location: show_songs.php?errors=true');
      }
?> 
            <br>
            <br>
            <br>
            <br>
    <h1 class="ui center aligned icon header">
        Please register.
    </h1>
    <br>
<div class="ui placeholder segment">
  <div class="ui one column very relaxed stackable grid">
    <div class="column">
      <form method="POST" action="database.php">
            <div class="ui form">
                <div class="field">
                    <label>Username <small>(*)</small></label>
                        <div class="ui left icon input">
                        <input type="text" name="username" placeholder="Username">
                        <i class="user icon"></i>
                        </div>
                </div>
                <div class="field">
                    <label>Password <small>(*)</small></label>
                    <div class="ui left icon input">
                        <input type="password" name="user_password" placeholder="Password">
                        <i class="lock icon"></i>
                    </div>
                </div>
                <div class="field">
                    <label>Confirm Password <small>(*)</small></label>
                    <div class="ui left icon input">
                        <input type="password" name="password_confirm" placeholder="Confirm Password">
                        <i class="lock icon"></i>
                    </div>
                </div>
                <small><em>* Indicates Required.</em></small>
                <button class="ui teal submit button" name="register" type="submit">Sign up</button>
            </div>
      </form>
    </div>
  </div>
  <div class="ui horizontal divider">
    Or
  </div>
    <a href="index.php">
    <div class="ui teal big button">
    Log in  &nbsp;
    <i class="sign-in icon"></i>
  </div>
    </a>
</div>

<?php include_once 'footer.php' ?> 
  