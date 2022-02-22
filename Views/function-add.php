<?php
    require_once('validate_session.php');
    require_once('validate_role.php');
    require_once('check-role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Nueva función</h2>
               <form action="<?php echo FRONT_ROOT ?>Function/AddFunction" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Horario</label>
                                   <select name="id_schedule" class="form-control">
                                        <?php foreach($scheduleList as $schedule) {?>
                                             <option  value="<?php echo $schedule->getF_time();?>"><?php echo $schedule->getF_time();?></option>
                                        <?php } ?>
                                   </select>   
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Dia</label>
                                   <input type="date" name="day" min="<?php echo date("Y-m-d")?>" max="2019-12-31" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Pelicula</label>
                                   <select name="id_movie" class="form-control">
                                        <?php foreach($movielist as $movie) {?>
                                             <option  value="<?php echo $movie->getId();?>"><?php echo $movie->getOriginal_title(); ?></option>
                                        <?php } ?>
                                   </select>   
                              </div>
                         </div>
                    </div>
                    <input type="hidden" name="id_room" value="<?php echo $id_room ?>" required class="form-control">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>