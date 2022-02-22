<?php
require_once('validate_session.php');
require_once('validate_role.php');
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de peliculas</h2>
               <h3 class="btn btn-dark ml-auto d-block">Buscar Por Fecha
               <form action="<?php echo FRONT_ROOT ?>Movie/showBillBoardByDate" method="post" >
               <input type="date" name="day" min="<?php echo date("Y-m-d")?>" max="2019-12-31" >
               <button type="submit" name="name" class="btn btn-dark ml-auto d-block"> Buscar </button>
               </form> 
               Buscar Por Genero
               <form action="<?php echo FRONT_ROOT ?>Movie/showBillBoardByGenre" method="post" >
               <select name="id_schedule" class="form-control">
               <?php foreach($genreList as $genre) {?>
                         <option  value="<?php echo $genre->getGenreId();?>"><?php echo $genre->getGenreType();?></option>
                    <?php } ?>
               </select>   
               <button type="submit" name="name" class="btn btn-dark ml-auto d-block"> Buscar </button>
               </form> </h3>
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
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>