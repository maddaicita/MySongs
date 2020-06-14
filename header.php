<!doctype html>
<html lang="en">

<head>
    <title>Songs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
</head>

<body>
    <?php require_once 'database_credentials.php'; ?>
    <?php require_once 'database.php'; ?>
    <?php require_once 'functions.php'; ?>
    <?php $is_logged_in = is_logged_in(); ?>

 <div class="ui middle aligned center aligned grid">
    <div class="eight wide column">
        <div class="ui top fixed menu">
            <div class="item">
                <h2 class="ui header">
                            <i class="music teal icon"></i>
                            <div class="content">
                                Maday Songs
                                &nbsp;&nbsp;
                            </div>
                </h2>
            </div>
            <?php if ($is_logged_in) {
                $home_link = 'show_songs.php';
                $add_link = 'add_song.php';
                $logout_link = 'index.php?logout=true';
            } else {
                $home_link = 'index.php';
                $add_link = 'index.php?isLoggedIn=false';
                $logout_link = 'index.php?isLoggedIn=false';
                
                
            }
            ?>
                <a class="item" href=<?php echo $home_link; ?>>Home</a>
                <a class="item" href=<?php echo $add_link; ?>>Add New Song</a>
                <a class="item" href=<?php echo $logout_link; ?>>Log out</a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <?php 
                
       
                if (isset($_SESSION['errors'])) {
                echo '<div class="ui negative message">';
                echo    '<div class="header">';
                echo        $errors;
                echo    '</div>';
                echo  '</div>';
                unset($_SESSION['errors']);
                }

                if ($user_err) {
                echo '<div class="ui negative message">';
                echo    '<div class="header">';
                echo        $user_err;
                echo    '</div>';
                echo  '</div>';
                unset($_SESSION['username_error']);
                }
                if ($error_pass) {
                echo '<div class="ui negative message">';
                echo    '<div class="header">';
                echo        $error_pass;
                echo    '</div>';
                echo  '</div>';
                unset($_SESSION['pass_error']);
                }
                if ($error_match_pass) {
                echo '<div class="ui negative message">';
                echo    '<div class="header">';
                echo        $error_match_pass;
                echo    '</div>';
                echo  '</div>';
                unset($_SESSION['pass_match_error']);
                }
                if (isset($_SESSION['success']) && isset($_GET['success']) == true) {
                echo '<div class="ui positive teal message">';
                echo    '<div class="header">';
                echo        $success;
                echo    '</div>';
                echo  '</div>';
                unset($_SESSION['success']);
            }
        
        ?>