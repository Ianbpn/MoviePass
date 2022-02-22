<?php
    require_once('validate_session.php');
    require_once('validate-role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Datos Perfil</h2>
               <form action="<?php echo FRONT_ROOT ?>Client/Modify" method="post" class="bg-light-alpha p-5">
                    <div class="row">    
                         
                        <input hidden type="text" name="id" value="<?php echo $actual->getIdProfile() ?>">
                                           
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="<?php echo $actual->getFirstname() ?>" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Apellido</label>
                                   <input type="text" name="address" value="<?php echo $actual->getSurname() ?>" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">DNI</label>
                                   <input type="text" name="capacity" value="<?php echo $actual->getDni() ?>" required class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Modificar</button>
               </form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>