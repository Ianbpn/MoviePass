<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
     <a  href="<?php echo VIEWS_PATH."client-view.php" ?>"><strong>Movie Pass</strong></a>
     
     </span>
     <ul class="navbar-nav ml-auto" > 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Client/Logout">Salir</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Movie/showBillBoard">Peliculas</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Client/ShowProfile"><?php echo $_SESSION['loggedUser']->getUserName() ?></a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Purchase/ShowPurchases">Mis compras</a>
          </li>
     </ul>
</nav>