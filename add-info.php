<?php
/* 2023-09-27 23:35:11 */
require_once('connection/connectionConfig.php');

$redirect_phrase = "Redirecting you to previous page in 3 seconds...";

$username = $_POST["AInfoUsername"];
$gender = $_POST["AInfoGender"];
$email = $_POST["AInfoEmail"];

$cuq = $dbh->prepare("SELECT Username FROM Users WHERE Username = :username");
$cuq->bindParam(':username', $username);
$cuq->execute();

if ($cuq->rowCount() > 0) {
  echo "The User Exists... <br />";
  echo $redirect_phrase;

} else {
  echo "The user doesn't exists... <br />";
  echo "Adding user to database... <br />";

  $stmt = $dbh->prepare("INSERT INTO Users (Username, Gender, Email) VALUES (:username, :gender, :email);");

  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':gender', $gender);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  echo "The user is added to the database... <br />";
  echo $redirect_phrase;
}


echo '<script>
        setTimeout(function() {
          window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";
        }, 3000);
      </script>';

exit();
