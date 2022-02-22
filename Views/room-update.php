<?php
    require_once('validate_session.php');
    require_once('validate_role.php');
    require_once('check-role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Datos Sala</h2>
               <form action="<?php echo FRONT_ROOT ?>Room/Modify" method="post" class="bg-light-alpha p-5">
               <input type="hidden" name="id_room" value="<?php echo $id_cinema?>"/>
                    <div class="row">    
                                   <input  type="hidden" name="id" value="<?php echo $room->getId() ?>" readonly class="form-control">               
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="<?php echo $room->getName() ?>" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Capacidad</label>
                                   <input type="text" name="capacity" value="<?php echo $room->getCapacity() ?>" required class="form-control">
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