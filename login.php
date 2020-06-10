<?php

include "style.php";

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is meow123

$failure = false;  

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            // Redirect the browser to game.php
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>d64991fa</title>
</head>
<body>
<div class="container">
<h2><b><i>Please Log In</i></b></h2>
<?php
if ( $failure !== false ) {
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<!--<form method="POST">
<label for="name">User Name</label>
<input type="text" name="who" id="name"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>-->

<form method="POST">
  <div class="form-group">
    <label for="name">UserName</label>
    <input type="text" class="form-control" name="who" id="name" aria-describedby="Userhelp">   
    <small id="Userhelp" class="form-text text-muted">Hint: Username must be human</small>
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" aria-describedby="PasswordHelp">
    <small id="PasswordHelp" class="form-text text-muted">Hint: Password Looking Like File Extension followed by--> 123</small>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>

</form>

</div>
</body>
