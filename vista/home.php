<!DOCTYPE html>
<html lang="es">
<head>
    <title>Sesion</title>
</head>
<body>
    <h1>bienvenido</h1>
    <form action="" method="POST">
        <input type="submit" value="un boton">
    </form>
    <?php 
        echo $_SESSION['user'];
        if(isset($_SESSION['user'])){
            echo "hay sesion";
        }
    ?>
</body>
</html>