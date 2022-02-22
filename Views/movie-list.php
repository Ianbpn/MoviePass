<?php
require_once('validate_session.php');
require_once('validate_role.php');
require_once('check-role.php');
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de peliculas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Imagen</th>
                         <th>Nombre</th>
                         <th>Valoracion</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php  
                              foreach($movieList as $movie)
                              {
                                   ?>
                                        <tr>
                                             <td><form action="<?php echo FRONT_ROOT ?>Purchase/PurchaseTicket" method="post">
                                             <button type="submit" name="id" value="<?php echo $movie->getId()?>" class="btn btn-dark ml-auto d-block" ><img src= "<?php echo IMG_API_URL.$movie->getBackdrop_path() ?>"/></button></td></form>
                                             <td><strong><?php echo $movie->getOriginal_title(); ?></strong></td>
                                             <td><?php echo $movie->getVote_average() ?></td>
                                             <td><?php echo $movie->getOverview() ?></td>
                                        </tr>  
                                        <?php
                              }?>
                                        
                                         
                    </tbody>
               </table>
               <form action="<?php echo FRONT_ROOT ?>Movie/Update" method="post" class="bg-light-alpha p-5">
               <td><button onclick type="submit" class="btn btn-dark ml-auto d-block" >Actualizar Listado</button></td>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>