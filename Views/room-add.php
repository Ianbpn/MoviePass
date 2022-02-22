<?php
    require_once('validate_session.php');
    require_once('validate_role.php');
    require_once('check-role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Nueva sala</h2>
               <form action="<?php echo FRONT_ROOT ?>Room/addRoom" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" placeholder="nombre" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Capacidad</label>
                                   <input type="text" name="capacity" placeholder="capacidad" required class="form-control">
                              </div>
                         </div>
                    </div>
                    <input type="hidden" name="id_cinema" value="<?php echo $id_cinema ?>" required class="form-control">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>