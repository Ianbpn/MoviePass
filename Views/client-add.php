
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Nuevo Usuario</h2>
               <form action="<?php echo FRONT_ROOT ?>Client/AddClient" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Username</label>
                                   <input type="text" name="username" placeholder="Nombre de Usuario" required class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Password</label>
                                   <input type="password" name="password" placeholder="Ingresar contraseña" required class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Crear</button>
               </form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>