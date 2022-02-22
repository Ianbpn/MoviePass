<?php
    require_once('navClient.php');
    require_once('validate_session.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Datos Personales</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>Dni</th>

                    </thead>
                    <tbody>
                         
                                
                                        <tr>
                                             <td><?php echo $actual->getFirstname() ?></td>
                                             <td><?php echo $actual->getSurname() ?></td>
                                             <td><?php echo $actual->getDni() ?></td>
                                             
                                             
                                             <form action="<?php echo FRONT_ROOT ?>Client/Update" method="post" class="bg-light-alpha p-5">
                                             <td><button type="submit" name="id" value="<?php echo $actual->getIdProfile()?>" class="btn btn-dark ml-auto d-block" >Modificar</button></td>
                                        </tr>
                              
                                        
                                         
                    </tbody>
               </table>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>