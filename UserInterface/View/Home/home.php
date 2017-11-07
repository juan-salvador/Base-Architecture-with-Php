<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Hola este es un render de vista!!! Y los nombres de categorias son:</p>
<?php foreach ($categories as $value){ ?>
    <p><?php echo $value->getName(); ?></p>
<?php } ?>
</body>
</html>