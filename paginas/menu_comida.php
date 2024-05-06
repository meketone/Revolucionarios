<?php
require("../admin/bd.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Los Revolucionarios</title>
    <link rel="stylesheet" href="../css/menu_comida.css">

    <?php require('../layouts/header.php') ?>
</head>

<body>

    <div class="tarjetas-container">
        <?php
        try {
            $miConsulta = "SELECT * FROM tbl_menu";
            $sql = $conexion->prepare($miConsulta);
            $sql->execute();

            if ($sql->rowCount() == 0) {
                echo "NO HAY DATOS";
            } else {
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                    // Aquí se imprime cada registro de la tabla
                    echo "<div class='tarjeta'>";
                    echo '<img src="../imagenes/menu/' . $row['foto'] . '" width="300" height="300" />';
                    echo "<h2>" . $row['nombre'] . "</h2>";
                    echo "<p>" . $row['descripcion'] . "</p>";
                    echo "<p>Precio: " .  $row['precio'] . "</p>";
                    echo "</div>";
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>

    <!-- <?php require('../layouts/footer.php') ?> AQUI ESTA LA RELACION HACIA EL FOOTER -->

</body>

</html>