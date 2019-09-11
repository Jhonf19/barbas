 <div class="container">
   <br><br>
   <div class="card">
     <div class="card-body">
       <h4 class="card-title">Cambiar contraseña</h4>

       <form action="?b=newPass" method="post">

       <div class="form-group">
         <input type="text" class="form-control" name="actual" placeholder="Contraseña Actual" required>
       </div>
       <div class="form-group">
         <input type="text" class="form-control" name="nueva" placeholder="Contraseña Nueva" required>
       </div>
       <button class="btn btn-primary" type="submit" name="button">Guardar cambios</button>
     </form>
   </div>
 </div>
 <br><br>
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Fotos A/D</h4>
     <hr>
     <?php if (isset($res) && !empty($res)){ ?>
       <div class="row ">
       <div class="col-md-6 offset-md-3 col-sm-12" id="card_pub">
         <div class="d-flex justify-content-around">
           <h6>Antes</h6>
           <h6>Despúes</h6>
         </div>
         <div class="card">
           <div id="carouselAD" class="carousel slide" data-ride="carousel">
             <div id="carouselView" class="carousel-inner">

               <div class="carousel-item active" style="height: auto; width:100%;">
                   <div class="d-flex" onclick="zAD('app/imgs_ad/<?php echo $res[0]->img_a1; ?>',' app/imgs_ad/<?php echo $res[0]->img_d1; ?>')">
                     <img class="d-block w-50"   src="<?php echo 'app/imgs_ad/'.$res[0]->img_a1; ?>" alt="Antes1">
                     <img class="d-block w-50"  src="<?php echo 'app/imgs_ad/'.$res[0]->img_d1; ?>" alt="Despúes1">
                   </div>
               </div>

               <div class="carousel-item " onclick="zAD('app/imgs_ad/<?php echo $res[0]->img_a2; ?>',' app/imgs_ad/<?php echo $res[0]->img_d2; ?>')" style="height: auto; width:100%;">
                 <div class="d-flex">
                   <img class="d-block w-50"   src="<?php echo 'app/imgs_ad/'.$res[0]->img_a2; ?>" alt="Antes2">
                   <img class="d-block w-50"  src="<?php echo 'app/imgs_ad/'.$res[0]->img_d2; ?>" alt="Despúes2">
                 </div>
               </div>

               <div class="carousel-item " onclick="zAD('app/imgs_ad/<?php echo $res[0]->img_a3; ?>',' app/imgs_ad/<?php echo $res[0]->img_d3; ?>')" style="height: auto; width:100%;">
                 <div class="d-flex">
                   <img class="d-block w-50"   src="<?php echo 'app/imgs_ad/'.$res[0]->img_a3; ?>" alt="Antes3">
                   <img class="d-block w-50"  src="<?php echo 'app/imgs_ad/'.$res[0]->img_d3; ?>" alt="Despúes3">
                 </div>
               </div>

             </div>

             <a class="carousel-control-prev" href="#carouselAD" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>

             <a class="carousel-control-next" href="#carouselAD" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>

           </div>

         </div>
         <br><br>
     </div>
   </div>
     <?php } else {
       echo "<h2 class='text-center'>Ningún A/D creado</h2>";
     } ?>

 </div>
 </div>
 </div>
 <br><br>

 <!-- Modal -->
 <div class="modal fade" id="zoomModalAD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content modal-lg">
       <!-- d-flex for display inline -->
       <div class="d-flex">
         <img class="d-block w-50" id="imgA" src="" >
         <img class="d-block w-50" id="imgD" src="" >
       </div>


     </div>

   </div>
 </div>
 <!-- fin Modal -->
