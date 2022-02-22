<?php
    require_once('validate_session.php');
    require_once('validate_role.php');
    require_once('check-role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Funciones</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Horario</th>
                         <th>Día</th>
                         <th>Película</th>
                         <th>Entradas Restantes <th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($functionList as $function)
                              {
                                   $availabletickets=$this->AvailableTicketsAmount($id_room,$function->getDay(),$function->getTime());
                                   ?>
                                        <tr>
                                        
                                             <td><?php echo $function->getTime() ?></td>
                                             <td><?php echo $function->getDay() ?></td>
                                             <td><?php echo $function->getMovie()->getOriginal_title() ?></td>
                                             <td><?php echo $availabletickets ?></td>
                                             <form action="<?php echo FRONT_ROOT ?>Function/Delete" method="post" class="bg-light-alpha p-5">
                                             <input type="hidden" name="id_room" value="<?php echo $id_room?>"/>
                                             <td><button type="submit" name="name" value="<?php echo $function->getId()?>" class="btn btn-dark ml-auto d-block" >Eliminar</button></td>
                                             </form>
                                             <!-- <form action="<?php echo FRONT_ROOT ?>Function/Update" method="post" class="bg-light-alpha p-5">
                                             <input type="hidden" name="id_room" value="<?php echo $id_room?>"/>
                                             <td><button type="submit" name="name" value="<?php echo $function->getId()?>" class="btn btn-dark ml-auto d-block" >Modificar</button></td>
                                             </form> -->
                                        </tr>  
                         <?php } ?>
                         
                    </tbody>
               </table>
               <form action="<?php echo FRONT_ROOT ?>Function/NewFunction" method="post">
               <button type="submit" name="id" value="<?php echo $id_room?>" class="btn btn-dark ml-auto d-block" >Nueva Funcion</button></form>
               <form action="<?php echo FRONT_ROOT ?>Cinema/ShowListView" method="post">
               <button type="submit" name="id" value="<?php echo $id_room?>" class="btn btn-dark ml-auto d-block" >Volver</button></form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>