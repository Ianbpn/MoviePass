<?php
    require_once('validate_session.php');
    require_once('validate_role.php');
    require_once('check-role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Cines</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Direccion</th>
                         <th>Valor de Entrada</th>
                    </thead>
                    <tbody>
                         <?php  
                              foreach($cinemaList as $cinema)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $cinema->getId() ?></td>
                                             <td><?php echo $cinema->getName() ?></td>
                                             <td><?php echo $cinema->getAddress() ?></td>
                                             <td><?php echo $cinema->getEntrance_value() ?></td>
                                             <form action="<?php echo FRONT_ROOT ?>Room/RoomList" method="post" class="bg-light-alpha p-5">
                                             <td><button type="submit" name="id" value="<?php echo $cinema->getId()?>" class="btn btn-dark ml-auto d-block" >Salas</button></td>
                                             </form>
                                             <form action="<?php echo FRONT_ROOT ?>Cinema/Update" method="post" class="bg-light-alpha p-5">
                                             <td><button type="submit" name="id" value="<?php echo $cinema->getId()?>" class="btn btn-dark ml-auto d-block" >Modificar</button></td>
                                             </form>
                                             <form action="<?php echo FRONT_ROOT ?>Cinema/Delete" method="post" class="bg-light-alpha p-5">
                                             <td><button type="submit" name="id" value="<?php echo $cinema->getId()?>" class="btn btn-dark ml-auto d-block" >Eliminar</button></td>
                                             </form>
                                        </tr> 
                                        
                                        <?php
                              }?>
                              
                                        
                                         
                    </tbody>
               </table>
               <a class="btn btn-dark ml-auto d-block" href="<?php echo FRONT_ROOT ?>Cinema/ShowAddView">Agregar cine</a>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>