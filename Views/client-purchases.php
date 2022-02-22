<?php
    require_once('validate_session.php');
    require('validate_role.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Historial de Compras</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Fecha de Compra</th>
                         <th>Cantidad de Tickets</th>
                         <th>Precio Total</th>

                    </thead>
                    <tbody>
                         
                                
                    <?php  
                              foreach($list as $purchase)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $purchase->getPurchaseDate() ?></td>
                                             <td><?php echo $purchase->getTicketQuantity() ?></td>
                                             <td><?php echo $purchase->getTotalPrice() ?></td>
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