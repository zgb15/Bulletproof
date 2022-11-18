<div id="img-linux-tux" class="container hidden-lg hidden-md hidden-sm">
    <center><img src="img/slide-header.jpg" class="img-responsive img-rounded" alt="Image"></center>
</div>

<!--************************************Carousel******************************-->
<div class="container hidden-xs">
    <div class="col-xs-12">
<div id="carousel-example-generic" class="carousel slide">

  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>
    <div class="carousel-inner">
       <div class="item active">
           <img src="img/slider1.png" alt="">
          <div class="carousel-caption">
              Avatar
          </div>
       </div>
       <div class="item">
          <img src="img/slider2.png" alt="">
          <div class="carousel-caption">
              Star Wars
          </div>
       </div>
       <div class="item ">
          <img src="img/slider3.png" alt="">
          <div class="carousel-caption">
              Wandavision
          </div>
        </div>
        <div class="item ">
          <img src="img/slider4.png" alt="">
          <div class="carousel-caption">
              The Smurfs
          </div>
        </div>
   </div>
   <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
       <span class="icon-prev"></span>
   </a>
   <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
     <span class="icon-next"></span>
   </a>
</div>
        </div>
     <div class="col-sm-2">&nbsp;</div>
</div>
<!--************************************ Fin Carousel******************************-->

 <hr class="hidden-xs">

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="text-center text-info">Información de interés</h1>
    </div>
  </div>
</div>
<br>
<div class="container">
    <div class="row">
        <h3 class="text-center text-info">¿Quiénes somos?</h3>
        <h4 class="text-center text-dark"> 
            Bulletproof Production es una de las principales compañías de servicios audiovisuales de España, productora y distribuidora de cine. Venimos trabajando de forma habitual con las principales productoras y plataformas internacionales de streaming VOD como Netflix, HBO, Amazon, Disney+, Movistar+, Atresmedia, Mediaset, TVE, etc.
            <br>Dispone de una estructura única en España que reúne distribución, producción, los 
            mayores estudios de rodaje privados de España, y un laboratorio digital de 
            postproducción y estudio de VFX de primer nivel. 
        </h4>
    </div>
    <br><br><br><br>
</div>
<script>
    $(document).ready(function(){
        $("#carousel-example-generic").carousel({
            interval: 4000,
        });
    });
</script>