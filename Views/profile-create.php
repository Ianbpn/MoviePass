<?php
    require_once('validate_session.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
          
               <h2 class="mb-4">Creacion de Perfil del usuario</h2>
               
               <form action="<?php echo FRONT_ROOT ?>Client/CreateProfile" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Apellido</label>
                                   <input type="text" name="surname" placeholder="Ingresar primer nombre" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="lastname" placeholder="Ingresar apellido" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">DNI</label>
                                   <input type="number" name="dni" placeholder="Ingrese numero de Documento" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                                   <input type="hidden" name="id_client" value="<?php echo $client->getIdClient() ?>" readonly class="form-control">
                              </div>
                         </div>
                    </div>
                    
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Guardar</button>
               </form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>