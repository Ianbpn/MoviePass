<?php
    require_once('validate_session.php');
    require_once('validate_role.php');
    require_once('check-role.php');
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Datos Cine</h2>
               <form action="<?php echo FRONT_ROOT ?>Cinema/addCinema" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   
                                   <input type="text" name="name" placeholder="Nombre" required class="button">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   
                                   <input type="text" name="address" placeholder="Dirección" required class="button">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   
                                   <input type="text" name="entrance_value" placeholder="Valor de Entrada" required class="button">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>