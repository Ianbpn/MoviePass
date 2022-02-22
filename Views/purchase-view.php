<?php
require_once('validate_session.php');
require_once('validate_role.php');
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
          
               <h2 class="mb-4"><?php $movie->getOriginal_title(); ?></h2>
               <table class="table bg-light-alpha">
                    <thead>
                        <th><strong><?php echo $movie->getOriginal_title(); ?></strong></th>
                        <th></th>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <div onclick class="container" ><?php echo $movie->getYt_path() ?></td>
                            <td><?php echo $movie->getOverview()  ?><br>
                            <?php 
                            echo "Géneros: ";
                            foreach($movie->getGenre_movie() as $genre ){
                                echo $genre->getGenreType();
                                echo " ";
                            };?>
                            </td>

                        
                        </tr>                                         
                    </tbody>
               </table>
               <form action="<?php echo FRONT_ROOT ?>Purchase/BuyTickets" method="post" class="bg-light-alpha p-5">
               <td><button onclick type="submit" name="id" value="<?php echo $movie->getId()?>" class="btn btn-dark ml-auto d-block" >Comprar tickets</button></td>
          </div>
          
     </section>
</main>
<?php
    require_once('footer.php');
?>