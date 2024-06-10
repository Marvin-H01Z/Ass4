<?php
// get the data from the form
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');
$wants_updates = filter_input(INPUT_POST, 'wants_updates', FILTER_VALIDATE_BOOL)? "Yes" : "No";


//Passord processing
if (strlen($password) < 4) {
    die("Password must be at least 4 characters long.");
}
$hashed_password = password_hash($password, PASSWORD_DEFAULT);      //Hash password




$heard_from = filter_input(INPUT_POST, 'heard_from');
if ($heard_from === NULL) {
   $heard_from = "Unknown";
}




$contact_via = filter_input(INPUT_POST, 'contact_via');

$comments =  nl2br(htmlspecialchars(filter_input(INPUT_POST, 'comments', FILTER_DEFAULT)));

?>
<!DOCTYPE html>
<html>

<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password); ?></span><br>
        <!--
        <label>Password Hash:</label>
        <span><?php echo htmlspecialchars($hashed_password); ?></span><br>
        -->
        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br>

        <label>Heard From:</label>
        <span><?php echo htmlspecialchars($heard_from); ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo $wants_updates; ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo htmlspecialchars($contact_via); ?></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo $comments; ?></span><br>

        <p>&nbsp;</p>
    </main>
</body>

</html>