<?php
    require_once('navClient.php');
    require_once('validate_session.php');
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">
<main class="py-5">
<section id="listado" class="mb-5">

          <div class="container">
               <h2 class="mb-4">Funciones</h2>
               
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Cine</th>
                         <th>Sala</th>
                         <th>Fecha</th>
                         <th>Horario</th>
                         <th>Valor de Entrada</th>

                    </thead>
                    <tbody>
                         <?php  
                              foreach($list as $Option)
                              {
                                   ?>
                                   <form action="<?php echo FRONT_ROOT ?>Purchase/Process" method="post">
                                   <input type="hidden" name="id_movie" value="<?php echo $movie->getId() ?>"/>    
                                        <tr>
                                             <td><?php echo $Option->getName() ?></td>
                                             <td><?php echo $Option->getRoomlist()->getName() ?></td>
                                             <td><?php echo $Option->getRoomlist()->getFunctionlist()->getDay() ?></td>
                                             <td><?php echo $Option->getRoomlist()->getFunctionlist()->getTime() ?></td>
                                             <td><?php echo $Option->getEntrance_value() ?></td>
                                            
                                         
                                        <input type="hidden" name="cinema" value="<?php echo $Option->getId() ?>"/>
                                        <input type="hidden" name="room" value="<?php echo $Option->getRoomlist()->getId()?>"/>
                                        <input type="hidden" name="day" value="<?php echo $Option->getRoomlist()->getFunctionlist()->getDay()?>"/>
                                        <input type="hidden" name="time" value="<?php echo $Option->getRoomlist()->getFunctionlist()->getTime()?>"/>
                                        <input type="hidden" name="entranceValue" value="<?php echo $Option->getEntrance_value()?>"/>

                                        <td> <select name='ticketQuantity'>  
                                                  <option value="1">1</option>
                                                  <option value="2">2</option>
                                                  <option value="3">3</option>
                                                  <option value="4">4</option>
                                                  <option value="5">5</option>
                                                  <option value="6">6</option>
                                                  <option value="7">7</option>
                                                  <option value="8">8</option>
                                                  <option value="9">9</option>
                                                  <option value="10">10</option>
                                             </select> </td>
                                              
                                             <td><button type="submit" name="button" class="btn btn-dark ml-auto d-block">Comprar</button></td>
                                        </tr>  
                                   </form>   
                         <?php } ?>       
                         
                    </tbody>
               </table>
                    
          </div>
         
     </section>
</main>

<?php
    require_once('footer.php');
?>

