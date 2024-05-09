<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../bd.php");
if($_POST){

    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
    $precio=(isset($_POST["precio"]))?$_POST["precio"]:"";
    
    /* CATEGORIA*/
    $category =(isset($_POST["category"]))?$_POST["category"]:"";

    $sentencia=$conexion->prepare("INSERT INTO `tbl_menu` (`ID`, `nombre`, `descripcion`, `foto`, `precio`, `category`) 
    VALUES (NULL,:nombre,:descripcion,:foto,:precio,:category);");

    $foto=(isset($_FILES["foto"]["name"]))?$_FILES["foto"]["name"]:"";
    $fecha_foto= new DateTime();
    $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
    $tmp_foto= $_FILES["foto"]["tmp_name"];

    if($tmp_foto!=""){
        move_uploaded_file($tmp_foto,"../../../imagenes/menu/".$nombre_foto);
    }

    $sentencia->bindParam(":foto",$nombre_foto);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":precio",$precio);
    $sentencia->bindParam(":category",$category); /*CATEGORIA*/

    $sentencia->execute();
    header("Location:index.php");


}

include("../../templates/header.php"); 
?>

<br/>
<div class="card">
    <div class="card-header">
        Menú de Comida
    </div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data" >

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text"
            class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre"/>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion (separado por comas):</label>
        <input type="text"
            class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion"/>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto:</label>
        <input type="file"
            class="form-control" name="foto" id="foto" placeholder="" aria-describedby="fileHelpId"/>
    </div>
    

    <div class="mb-3">
        <label for="precio" class="form-label">Precio:</label>
        <input type="text"
            class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio"/>
    </div>
    <!---- COMBOBOX PARA HACER LA CATEGORIA---->
    <div class="mb-3">
        <label for="category" class="form-label">Categoría:</label>
        <select class="form-select" name="category" id="category">
            <option value="tacos">Tacos</option>
            <option value="especialidades">Especialidades</option>
            <option value="a_la_parrilla">A la parrilla</option>
            <option value="mariscos">Mariscos</option>
            <option value="sandwich">Sandwich</option>
            <option value="ensaladas">Ensaladas</option>
            <option value="cocteles">Cocteles Especiales</option>
            <option value="botanas">Botanas</option>
            <option value="fuente_de_sodas">Fuente de Sodas</option>
            <option value="cervezas">Cervezas</option>
            <option value="brandys">Brandys</option>
            <option value="rones">Rones</option>
            <option value="whisky">Whisky</option>
            <option value="tequilas">Tequilas</option>
            <option value="vodka">Vodka</option>
            <option value="cognac">Cogñac</option>
            <option value="botella">Botella</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Crear comida</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    

    </form>
    
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../templates/footer.php"); ?>