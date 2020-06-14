<?php
 


    session_start();

        require_once 'database_credentials.php';
        require_once 'functions.php';

    $update = false;
    $id = 0;
    $title = '';
    $author = '';
    $year_released = '';
    $comments = '';
    $hit_position = '';
    $photo_url = '';
    $header = "Add a new Song";

    $errors = $_SESSION['errors'];
    $user_err = $_SESSION['username_error'];
    $error_pass = $_SESSION['pass_error'];
    $error_match_pass = $_SESSION['pass_match_error'];
    $success = $_SESSION['success'];

    if (isset($_POST['save'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_released = $_POST['year_released'];
    $comments = $_POST['comments'];
    $hit_position = $_POST['hit_position'];
    $photo_url = $_POST['photo_url'];

    if (empty($title) || empty($author) || empty($comments) || empty($hit_position) || empty($photo_url)) {
           $_SESSION['errors'] = 'Error. Please check required fields.';
            header('Location: add_song.php?errors=true');
            exit();
    } else if (!is_int($hit_position) || !is_int($year_released)) {
        $_SESSION['errors'] = 'Error. Year Released & Hit Position must be numbers. Please try again.';
        header('Location: add_song.php?errors=true');
        exit();
    }else {
        
    $mysqli->query("INSERT INTO my_songs (title, author, year_released, comments, hit_position, photo_url)
                    VALUES ('$title', '$author', '$year_released', '$comments', $hit_position, '$photo_url')")
                    or die($mysqli->error);
           $_SESSION['success'] = 'Success. Song added.';
            header('Location: show_songs.php?success=true');
            exit();
    }


    }

    if (isset($_GET['confirm_delete'])) {

    $id = $_GET['confirm_delete'];

    $mysqli->query("DELETE FROM my_songs WHERE id=$id")
                    or die($mysqli->error);
               $_SESSION['success'] = 'Success. Song deleted.';
            header('Location: show_songs.php?success=true');
            exit();
    }

    if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $result = $mysqli->query("SELECT * FROM my_songs WHERE id=$id")
                    or die($mysqli->error);
        if (count($result)==1){
            $row = $result->fetch_array();
            $title = $row['title'];
            $author = $row['author'];
            $year_released = $row['year_released'];
            $comments = $row['comments'];
            $hit_position = $row['hit_position'];
            $photo_url = $row['photo_url'];
        }
    $header = "Are you sure you want to delete song: $title";
    }

    if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $update = true;

    $result = $mysqli->query("SELECT * FROM my_songs WHERE id=$id")
                    or die($mysqli->error);
        if (count($result)==1){
            $row = $result->fetch_array();
            $title = $row['title'];
            $author = $row['author'];
            $year_released = $row['year_released'];
            $comments = $row['comments'];
            $hit_position = $row['hit_position'];
            $photo_url = $row['photo_url'];
        }
    $header = "Edit song: $title";
    }

    if (isset($_GET['id'])) {

    $id = $_GET['id'];

        }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year_released = $_POST['year_released'];
        $comments = $_POST['comments'];
        $hit_position = $_POST['hit_position'];
        $photo_url = $_POST['photo_url'];

        if (empty($title) || empty($author) || empty($comments) || empty($hit_position) || empty($photo_url)) {
            $_SESSION['errors'] = 'Error. Please check required fields. Please try again.';
             header('Location: show_songs.php?errors=true');
             exit();
     } else if (!is_int($hit_position) || !is_int($year_released)) {
         $_SESSION['errors'] = 'Error. Year Released & Hit Position must be numbers. Please try again.';
         header('Location: show_songs.php?errors=true');
         exit();
     }else {
    
        $mysqli->query("UPDATE my_songs SET title='$title', author='$author', year_released='$year_released',
                        comments='$comments', hit_position='$hit_position', photo_url='$photo_url' WHERE id='$id'")
                        or die($mysqli->error);
                        $_SESSION['success'] = 'Success.';
                        header('Location: show_songs.php?success=true');
                        exit();
    
        }
    }

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $user_password = $_POST['user_password'];

                $result = $mysqli->query("SELECT * FROM users WHERE username='$username'")
                        or die($mysqli->error);

        if (mysqli_num_rows($result) < 1) {

            $_SESSION['errors'] = 'No user found. Please try again or register';
            header('Location: index.php?errors=true');
        } else {
            $row = $result->fetch_array();

            $user = $row['username'];
            $saved_password = $row['user_password'];

            $pass_error = verify_password($user_password, $saved_password);
            // print_r($pass_error);

            if (!$pass_error) {
                    $_SESSION['user'] = $user;
                $_SESSION['success'] = 'Success. Welcome: '. $user;
            header('Location: show_songs.php?success=true');
            exit();
                    
            } else {
                $_SESSION['errors'] = $pass_error;
            header('Location: index.php?errors=true');
            exit();
            }
        }
    }

    if (isset($_POST['register'])) {

        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $password_confirm = $_POST['password_confirm'];

                $result = $mysqli->query("SELECT * FROM users WHERE username='$username'")
                        or die($mysqli->error);

                print_r(mysqli_num_rows($result));

        if (mysqli_num_rows($result) > 0) {

            $_SESSION['errors'] = 'Error. User already registred. Log in or pick a new username';
            header('location: register.php?errors=true');
            exit();
        } else {

            $username_error = verify_user($username);
            $pass_error = check_password($user_password);
            $pass_match_error = password_match($user_password, $password_confirm);

            if (!$username_error && !$pass_error && !$pass_match_error) {
                $user_password = password_hash($user_password, PASSWORD_DEFAULT);
                                $mysqli->query("INSERT INTO users (username, user_password)
                        VALUES ('$username', '$user_password')")
                        or die($mysqli->error);
                $_SESSION['success'] = 'Success. Welcome, please log in to continue.';
            header('location: index.php?success=true');
            exit();

            } else {
            $_SESSION['username_error'] = $username_error;
            $_SESSION['pass_error'] = $pass_error;
            $_SESSION['pass_match_error'] = $pass_match_error;
            header('location: register.php?errors=true');
            exit();
            }
        }
    }

    if (isset($_GET['isLoggedIn']) && $_GET['isLoggedIn'] == false ) {
            $_SESSION['errors'] = 'Error. You are not logged in.';
            header('location: index.php?errors=true');
            exit();
    }

    if (isset($_GET['logout']) && isset($_GET['logout']) == true) {

        if (isset($_SESSION['user'])) {
             unset($_SESSION['user']);
        $_SESSION['success'] = 'Success.';
            header('location: index.php?success=true');
            exit();
        }
    }