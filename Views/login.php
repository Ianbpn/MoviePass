<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>login.css">
     <main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center" > <style>header {color:rgba(247,197,61,1); margin-right: 30%;}</style>
                    <h2>Inicia sesión</h2>
               </header>
               <form action="<?php echo FRONT_ROOT ?>Client/Login" method="post" class="login-form bg-dark-alpha p-5 text-white height:50%">
                    <div class="form-group">
                         <input type="text" name="username" class="button" placeholder="Ingresar usuario" required>
                    </div>
                    <div class="form-group">
                         <input type="password" name="password" class="button" placeholder="Ingresar constraseña" required>
                    </div>
                    <button class="enjoy-css" type="submit">Iniciar Sesión</button>
                    <button onClick="location.href='<?php echo FRONT_ROOT.'Client/Register'?>'" class="enjoy-css" >Cuenta Nueva</button>
               </form>
               
               
               </form>
          </div>
     </main>

