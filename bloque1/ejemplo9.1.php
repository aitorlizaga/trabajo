
<?php
// en vez de un if == podemos usar if isset
if($_REQUEST["usu"] == "alu" && $_REQUEST["contra"] == "123") {
    session_start();
        $_SESSION["usu"]=$_REQUEST['usu'];
        $_SESSION["contra"]=$_REQUEST['contra'];
    header("Location:secreto.php");
    echo"muy bien";
}else{
    header("location:ejemplo9.php");
    session_start();
    $_SESSION["error"]="error";
   
}

?>
