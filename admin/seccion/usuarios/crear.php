<?php 
include("../../bd.php");

print_r($_POST);
include("../../templates/header.php"); 
?>

<br/>
<div class="card">
    <div class="card-header">Usuarios</div>
    <div class="card-body">

    <form action="" method="post">

        <div class="mb-3">
            <label for="usuario" class="form-label">Nombre de Usuario</label>
            <input type="text"
                class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="usuario"/>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password: </label>
            <input type="password"
                class="form-control" name="password" id="password" placeholder=""/>
        </div>
        
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email"
                class="form-control" name="correo" id="correo" aria-describedby="emailHelpId" placeholder="correo"/>
        </div>

        <button type="submit" class="btn btn-success">Agregar usuario</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        

    </form>
        
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php");?>