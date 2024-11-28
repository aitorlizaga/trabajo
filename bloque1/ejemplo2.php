<!DOCTYPE html>
<html>
    <head>
        <title> Hola </title>
    </head>
    
    <body>
            <?php 


   /*
   echo "Empieza el bucle <br>";

    for($i=5; $i<=15;$i++){

        echo "Line $i <br>";
    }
    
        echo "Fin del bucle<br>";
    
    for($i=1; $i<=100;$i++){
         
        if(($i % 3 == 0) && ($i %5 != 0 ) )
            echo "<br>Fizz";
        else if(($i % 5 == 0) && ($i %3 != 0 )) 
            echo "<br>Buzz";
        else if(($i % 3  == 0) && ($i % 5 == 0))
            echo "<br>FizzBuzz";
        else 
            echo "<br> $i";
    }
    ; 
    $nivel = 6;
    for($i=1; $i<=$nivel;$i++){
        echo "<br>";
    //echo "<br>$i:";
        for($j=1;$j<=$i;$j++){
            echo "*";}
    }
*/
    $filas = 4;
    
    //$negro=' ';
    $negro="bgcolor='black'";
    
    //$blanco=' ';
    $blanco="bgcolor='white'";

    echo '<table border =1 width=300 height=00>';
    for($g=1; $g<=$filas ;$g++ ){
        echo "<tr>";
              for($i=1; $i<=4 ;$i++){
                    echo "<td $blanco>";
                    echo "<td $negro>";
                }
         echo "</tr>";

         echo "<tr>";
                for($i=1; $i<=4 ;$i++){
                    echo "<td $negro>";
                    echo "<td $blanco>";
                }
         echo "</tr>";
    }
    echo "</table>";
    
    ?>
    </body>
</html>