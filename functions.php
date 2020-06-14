
<?php

function is_logged_in() {
    if (!empty($_SESSION['user']))  {
        return true;
    } else {
        return false;
    }
}

function verify_password($password, $user_password) {
    if (password_verify($password, $user_password)) {
        return false;
    } else {
        return "Invalid password, please try again";
    }
}

function verify_user($user_name) {
    if ($user_name == '') {
        return 'Error. Username is required.';
    } else if (strlen($user_name) < 4 || strlen($user_input) > 12) {
        return 'Error. Username must be between 4 and 12 characters.  ';
    } else {
        return false;
    }
}
function check_password($user_password) {
    if ($user_password == '') {
        return 'Error. Password id required.';
    } else if (strlen($user_password) < 4) {
        return 'Error. Password must be at least 4 characters long';
    } else {
        return false;
    }
}

function password_match($user_password, $password_confirm) {
    if ($password_confirm == '') {
        return 'Error. Please confirm password';
    } else if ($user_password != $password_confirm) {
        return 'Error. Passwords do not match';
    } else {
        return false;
    }
    
}

function validate_input($user_input) {
    if ($user_input == '') {
        return '* Please, fill out required field and try again  ';
    } else {
        return false;
    }
}