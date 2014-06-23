<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('us-cdbr-east-06.cleardb.net', 'bec25b10444148', '2642f6af')
    or die("Location: registrar.htm?error=No se pudo conectar: " . mysql_error());

mysql_select_db('heroku_b4fc411144abcd4') or die("Location: registrar.htm?error=No se pudo seleccionar la base de datos");

// Realizar una consulta MySQL
$query = 'INSERT INTO productos (id_producto, Nombre, Descripcion) values(\''.$_GET['textId'].'\',\''.$_GET['textName'].'\',\''.$_GET['textDesc'].'\')';
$result = mysql_query($query) or die("Location: registrar.htm?error=Consulta fallida: " . mysql_error()." ".$query);

// Imprimir los resultados en HTML

echo '<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1;url=http://example.com">
        <script type="text/javascript">
            window.location.href = "mostrar.php"
        </script>
        <title>Page Redirection</title>
    </head>
    <body>
        <!-- Note: don\'t tell people to `click` the link, just tell them that it is a link. -->
        If you are not redirected automatically,  follow the <a href=\'http://example.com\'>link to example</a>
    </body>
</html>
';

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
header( 'Location: mostrar.php' ) ;
?>