

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
        <i class="music teal icon"></i>
        Welcome to my favorite songs website.
    </h1>
    <h2 class="ui header">Please log in or sign up to continue.</h2>
    <br>
<div class="ui placeholder segment">
  <div class="ui two column very relaxed stackable grid">
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
                    <small><em>* Indicates Required.</em></small>
                </div>
                <button class="ui teal submit button" name="login" type="submit">Login</button>
            </div>
      </form>
    </div>
    <div class="middle aligned column">
        <a href="register.php">
      <div class="ui big button">
        <i class="signup icon"></i>
        Sign Up
      </div>
    </div>
    </a>
  </div>
  <div class="ui vertical divider">
    Or
  </div>
</div>

<?php include_once 'footer.php'; ?> 
