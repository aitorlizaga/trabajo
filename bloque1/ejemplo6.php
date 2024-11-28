<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivinar el número</title>
</head>
<body>
    <h1>Adivinar el número</h1>

    <form name=formulario method="get" >
        Introduzca el número para jugar: 
        <input type="int" name="numero" placeholder="Número" required> &ensp;
        <input type="submit" value="Enviar"/>
    </form>

    <?php
$aleatorio = rand(1, 100);
$numero = $_REQUEST['numero'];

    session_start();

  



if (isset($_SESSION['random'])){
    if ($numero == $_SESSION['random']) {
                echo "Enhorabuena, ha acertado: ".$numero." es igual a " . $_SESSION['random'];
                unset($_SESSION['random']);
                echo "<br>";
                session_destroy();
                echo "intentos :".$_SESSION['recarga'];
            } else {
                if ($numero != $_SESSION['random']) {
                   //saber intentos
                    if (!isset($_SESSION['recarga']))
                    {
                        $_SESSION['recarga'] = 0;
                    }
                    else{
                    ++$_SESSION['recarga'];
                    }
                    if ($numero > $_SESSION['random']) {
                        echo "El número es menor.<br>";
                        echo "intentos :".$_SESSION['recarga'];
                    }
                    else{
                        echo "El número es mayor.";
                        echo "intentos :".$_SESSION['recarga'];
                    }
                }
        }
    }
    else {$_SESSION['random'] = $aleatorio;
    
    }
    

    // Mostrar el número aleatorio para depuración

    ?>
    
</body>
</html>
