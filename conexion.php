<?php

//nosotros nos conectaremos asi: ocuparemos PDO.Aqui ocuparemos el host al que hace referencia en este caso es localhost
// y la base de datos a la que hace referencia que será la que hemos creado en MySQl.
// estos datos de usuario y contraseña los coge del panel de administracion de MySql.



$link = 'mysql:host=;dbname=';
$usuaio = '';
$contraseña='';

try{
    $pdo = new PDO($link,$usuaio,$contraseña);

    // echo ' estamos conectados <br>';
    //COPIAMOS EL FOREACH DE LA DOCUMENTACION
    // foreach($pdo->query('SELECT * FROM `colores`') as $fila) {
    //     print_r($fila);
    // }



    //copiamos este cath porque es propio del PDO.
}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
