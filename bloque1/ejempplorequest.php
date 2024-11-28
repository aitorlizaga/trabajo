<!DOCTYPE html>
<html>
<head>
    <title>Adios</title>
</head>
<body>
    <?php
if(isset($_REQUEST["nombre"]) && isset($_REQUEST["edad"])) {
$nombre = $_REQUEST["nombre"];
$edad = $_REQUEST["edad"];
}
echo "<p>Te llamas $nombre y tienes $edad años </p>";

echo "<br>";

for($i=0;$i<strlen($_REQUEST["numero"]); $i++ ){
    $i = strtoupper($i);
    if($i == 'M,CM,D,CD,C,XC,L,XL,X,IX,V,IV,I'){
       $NUMERO = $_REQUEST["numero"];
    }

    
}






function romanToNumber($roman){
    $romans = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];
    $result = 0;
    foreach ($romans as $key => $value) {
        while (strpos($roman, $key) === 0) {
            $result += $value;
            $roman = substr($roman, strlen($key));
        }
    }
    return $result;
}

$numero=$_REQUEST["numero"];
echo "<br>";

echo romanToNumber($numero);


?>
</body>
</html>
