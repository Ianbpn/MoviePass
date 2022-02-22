<?php
    require_once('validate_session.php');
    require_once('validate_role.php');
    require_once('check-role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Salas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Capacidad</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($roomList as $room)
                              {
                                   ?>
                                        <tr>
                                        
                                             <td><?php echo $room->getName() ?></td>
                                             <td><?php echo $room->getCapacity() ?></td>
                                             <form action="<?php echo FRONT_ROOT ?>Function/FunctionList" method="post" class="bg-light-alpha p-5">
                                             <td><button type="submit" name="name" value="<?php echo $room->getId()?>" class="btn danger" >Funciones</button></td>
                                             </form>
                                             <form action="<?php echo FRONT_ROOT ?>Room/Delete" method="post" class="bg-light-alpha p-5">
                                             <input type="hidden" name="id_room" value="<?php echo $id_cinema?>"/>
                                             <td><button type="submit" name="name" value="<?php echo $room->getId()?>" class="btn danger" >Eliminar</button></td>
                                             </form>
                                             <form action="<?php echo FRONT_ROOT ?>Room/Update" method="post" class="bg-light-alpha p-5">
                                             <input type="hidden" name="id_room" value="<?php echo $id_cinema?>"/>
                                             <td><button type="submit" name="name" value="<?php echo $room->getId()?>" class="btn danger" >Modificar</button></td>
                                             </form>
                                        </tr>  
                         <?php  }  ?>
                         
                    </tbody>
               </table>
               <form action="<?php echo FRONT_ROOT ?>Room/NewRoom" method="post">
               <button type="submit" name="id" value="<?php echo $id_cinema?>" class="btn btn-dark ml-auto d-block" >Nueva Sala</button></form>
               <form action="<?php echo FRONT_ROOT ?>Cinema/ShowListView" method="post">
               <button type="submit" name="id" value="<?php echo $id_cinema?>" class="btn btn-dark ml-auto d-block" >Volver</button></form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>