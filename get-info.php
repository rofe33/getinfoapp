<?php
/* 2023-09-28 11:34:14 */
require_once("connection/connectionConfig.php");

$qstmt = $dbh->prepare("SELECT * FROM Users WHERE Username = ?;");

$qstmt->execute([$_GET['formUsername']]);

if ($qstmt->rowCount() <= 0) {
  echo "The User doesn't exists...<br />";
  echo "Redirecting You to the previous page in 3 seconds...<br />";

  echo '<script>
          setTimeout(function() {
            window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";
          }, 3000);
        </script>';
  exit();
}

$info = $qstmt->fetch(PDO::FETCH_ASSOC);
$userID = $info['ID'];
$userUsername = $info['Username'];
$userGender = $info['Gender'];
$userEmail = $info['Email'];

if ($userGender == 'M') {
  $userGender = 'Male';
} else {
  $userGender = 'Female';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width;" />
    <title><?= $userUsername ?>'s Info (2023-09-28 11:43:28)</title>

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <h1><?= $userUsername ?>'s Info</h1>

    <div class="center-table">
      <table>
        <thead>
          <th scope="col" colspan="2">Info</th>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Id</th>
            <td><?= $userID ?></td>
          </tr>
          <tr>
            <th scope="row">Username</th>
            <td><?= $userUsername ?></td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td><?= $userEmail ?></td>
          </tr>
          <tr>
            <th scope="row">Gender</th>
            <td><?= $userGender ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <footer>
      <a href="index.html">Go Back</a>
    </footer>
  </body>
</html>
