<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo</title>
</head>
<body>
    <p>Contenido escrito en HTML</p>
    <?php 
        echo "<p>Desde PHP</p>" . PHP_EOL . "<p> ¡Hola </p>" ;
        echo "<p>¡Hola ";
        echo "mundo!</p>";
        // esto es un comentario
        # otro coemntario
        /* otro comentario */
        $nombre = "Alfonso";
    // Ejemplo de una constante numérica de tipo real
    define("PI", 3.141592);

    // Ejemplo de una constante de tipo string
    define("CONSTANTE", "Hola mundo");
    /*
        $edad = "20";
        
        var_dump($nombre);
        var_dump($edad);

        
        $lista = array("pepe", "maria", "juan");
        print_r($lista);

        echo  "nombre 1 = ".$lista [1] ; */

        $var = "cadena de texto";
        echo $var[0];
        //Iniciacion   comparacion para seguir    final 
        for ($i = 0; $i < strlen($var); $i++ ) {
            echo $var[$i] . "\n" ;
        }

        $a = 10;
        $b = 5;
        if ($a > $b) {
            echo "<br>a es mayor que b <br>";
        }

        // "=" es algo es igual a algo "==" es que compare si dos cosas distintas valen lo mismo
        $a = 5;
        $b = 5;
        if ($a == $b) {
            echo "a es igual que b";
        }

                //hola que tal
    echo "<p> hola que tal </p>" . PHP_EOL . "<p>yo bien ytu</p>"; 
    
    $a = 7;
    $b = 2;

    echo "suma: ".$a + $b."<br>";

    echo "resta. ".$a - $b."<br>";

    echo "multi: " .$a * $b."<br>"; 

    echo "modulo: " .$a % $b."<br>"; 
    echo "modulo: " .$a % $b."<br>"; 
    echo "division: " .$a / $b."<br>"; 
   
    define("HOLA", " que tal");

    print "<p>Cuando te dicen hola <br>". HOLA . "</p>\n";
 


   /* echo $_SERVER['SERVER_ADDR'];
    echo $_SERVER['SERVER_NAME'];
    echo $_SERVER['SERVER_SOFTWARE'];
    echo $_SERVER['HTTP_USER_AGENT'];
    echo $_SERVER['REMOTE_ADDR']; */
    

    session_start();
    echo "SESSION <br>";
    var_dump($_SESSION);
    echo "<br> FILES <br>" ;
    var_dump($_FILES);
    echo "<br> ";
        $moneda = rand(0,1); //Funcion random es aleatorio

        if($moneda == 1)
            echo "<br> Ha salido cara <br>";
        else    
            echo "<br> Ha salido cruz <br>";

        $examen = rand(0,10); //Funcion random es aleatorio

        if($examen >= 0 && $examen < 5  )
             echo "<br> Insuficiente : $examen <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Red_X.svg/2048px-Red_X.svg.png' width=10 > ";
        else if($examen >= 5 && $examen < 6  )
                echo "<br> Suficiente : $examen <img src=' https://w7.pngwing.com/pngs/855/394/png-transparent-dash-hyphen-at-sign-plus-and-minus-signs-minus-angle-text-rectangle-thumbnail.png ' width=10  ";
        else if ($examen >= 6 && $examen < 9  )
                echo "<br> Notable : $examen <img src='https://static.vecteezy.com/system/resources/previews/022/056/316/non_2x/grunge-style-check-mark-free-png.png' width=14 >";
        else
                echo "<br> Sobresaliente : $examen  <img src= ' https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Estrella_amarilla.png/2048px-Estrella_amarilla.png ' width=14px   ";
        ?>
</body>
</html>