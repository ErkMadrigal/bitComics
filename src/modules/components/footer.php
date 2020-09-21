 <!-- Footer -->
 <footer class="page-footer font-small bg-footer pt-4 mt-5">

     <!-- Footer Links -->
     <div class="container-fluid text-center text-md-left">

         <!-- Grid row -->
         <div class="row">

             <!-- Grid column -->
             <div class="col-md-6 mt-md-0 mt-3">

                 <!-- Content -->
                 <h3 class="text-center text-white">Bit<strong>Comics</strong></h3> 
                 <p class="text-white">proyecto desarrollado usando la api de marvel, con cada rol respectivo para su uso teniendo en cuanta 
                     4 roles y un borrado logico. la base de datos es relacional con 3 tablas y realizada en MySQL, programas usados son <br>
                    <b>apache, visual Studio Code, phpMyAdmin, y la API de Marvel</b></p>    


             </div>
             <!-- Grid column -->

             <hr class="clearfix w-100 d-md-none pb-3">

             <!-- Grid column -->
             <div class="col-md-3 mb-md-0 mb-3">

                 <!-- Links -->
                 <h5 class="text-uppercase text-white">Tecnologias FrondEnd</h5>

                 <ul class="list-unstyled">
                     <li>
                         <a href="#!" class="nav-link text-white">html5</a>
                     </li>
                     <li>
                         <a href="#!" class="nav-link text-white">Css3</a>
                     </li>
                     <li>
                         <a href="#!" class="nav-link text-white">JavaScript ECMAScript 6</a>
                     </li> 
                     <li>
                         <a href="#!" class="nav-link text-white">JavaScript JQuery</a>
                     </li>
                     <li>
                         <a href="#!" class="nav-link text-white">Bootstrap</a>
                     </li>
                 </ul>

             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col-md-3 mb-md-0 mb-3">

                 <!-- Links -->
                 <h5 class="text-uppercase text-white">Tecnologias BackEnd</h5>

                 <ul class="list-unstyled">
                     <li>
                         <a href="#!" class="nav-link text-white">php</a>
                     </li>
                     <li>
                         <a href="#!" class="nav-link text-white">dataBase <b>MySQL</b></a>
                     </li>
                     <li>
                         <a href="#!" class="nav-link text-white">JavaScript</a>
                     </li>
                     <li>
                         <a href="#!" class="nav-link text-white">Heroku</a>
                     </li>
                     <li>
                         <a href="#!" class="nav-link text-white">Clever Cloud</a>
                     </li>
                 </ul>

             </div>
             <!-- Grid column -->

         </div>
         <!-- Grid row -->

     </div>
     <!-- Footer Links -->

     <!-- Copyright -->
     <div class="footer-copyright text-center py-3 text-primary">&copy; Copyright: Erick Madrigal Flores
        <script> 
            let anio = new Date().getFullYear();
            document.write(anio);
        </script> 
    </div>
     <!-- Copyright -->

 </footer>
 <!-- Footer -->

 <script>var root = "<?= $backEnd;?>";</script>

<?php if($footer):?><script>var idUsr = "<?=$idUsr;?>";</script><?php endif;?>
 
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
 <script src="<?=$root;?>js/fetchAPI.js"></script>
 <?php if( isset( $scripts ) ) : ?>
    <?php foreach( $scripts as $script ) : ?>
        <script src="<?=  $script; ?>"></script>
    <?php endforeach;?>
 <?php endif;?>
 </body>

 </html>