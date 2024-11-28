<!DOCTYPE html>
<html>
<head>
    <title>Adios</title>
</head>
<body>
    <?php
    
    $elementos = array(1 ,24 ,16 , 22, 17, 19, 3, 14, 9, 10 );
    
    print_r($elementos);

echo "</br>";
    $numeros = array();
    
//Generador de numeros aleatorios (siempre debajo del array)
for($i=0; $i<10; $i++){
    $numeros[]=rand(1,30);
}



print_r($numeros);

    echo "<h1>Restos de calculos</h1>";
        for($i=0; $i<count($numeros);$i++){
            echo $numeros[$i]."<br>";
        }

    function media($array) {
        return array_sum($array) / count($array);
    }

$average = media($numeros);



echo "<br>The avergae is: " . $average;


echo "<br>El valor maximo es: " .max($numeros);

echo "<br>El valor minimo es: " .min($numeros);

echo "</br>";

echo "</br>";

echo "<h1>Capital Paises</h1>";


$ciudad=array("Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");

foreach( $ciudad as $pais => $capital){
    $pai = strtoupper($pais);
    $capi = strtoupper($capital);
    echo "<br>" .$capi. " is the capital of " .$pai. "<br>";
}


echo "<br>";

$frase="Perdone que le pida para un cafe";

//letra por letra 

for($i=0 ; $i<strlen($frase) ;$i++){
echo $frase[$i]." ";

}

echo "<br>";

//al reves

for($i=strlen($frase)-1; $i>=0 ;$i--){
    echo $frase[$i]." ";
    
    }
    

 echo "<br>";

echo "la frase tiene ". strlen($frase) . " caracteres </br>";
echo "<br>";

echo "la frase en mayuscula: ". strtoupper($frase) . "</br>";
echo "<br>";
echo "la frase en minuscula: ". strtolower($frase) . "</br>";
echo "<br>";
echo "la primera letra en mayus: ". ucfirst($frase) . "</br>";


    ?>
</body>
</html>
