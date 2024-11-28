<!DOCTYPE html>
<html>
<head>
    <title>Adios</title>
</head>
<body>
    <?php



session_start();

$_SESSION['logged_in_user_id'] = "id";
$_SESSION['logged_in_user_name'] = "nombre";

echo $_SESSION['logged_in_user_idn']."</br>";
echo $_SESSION['logged_in_user_name'];

    ?>
    </body>
    </html>
    