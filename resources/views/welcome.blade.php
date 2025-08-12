
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Star</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    @vite(['resources/css/welcom.css','resources/js/welcom.js'])
</head>

<body>

    <header>
    
        <div class="menu container"> <!--menu lo que abarca todo-->

            <img class="logo-1" src="{{asset('/imagenes/logo.png')}}">
            <input type="checkbox" id="menu"/>  
            <label for="menu">
              
            </label>
          
            <nav class="navbar">
                <img  class="logo-2" src="{{asset('/imagenes/logo.png')}}">
                <div class="menu-1">
                    <ul>
                      
                        <li><a href="#">Inicio</a></li>
                        <li><a href="pedidetalles">Productos</a></li>
                        <li><a href="categoris">Categorias</a></li>
                      
                     
                        @if (Route::has('login'))
                        
                            @auth
                            <li>
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                            </li>
                                @if (Route::has('register'))
                                <li>
                              <!--      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>-->
                                </li>
                                    @endif
                            @endif
                       
                    @endif
                    </ul>
                </div>
               
            </nav>
              
                
    
                <div class="menu-2">
    
                    <ul>
                      <!--  <li><a href="#">Horario</a></li>-->
                    </ul>
                   
                    <div class="socials">
                    <a href="https://www.facebook.com/">
    
                           <div class="social">
                            <img src="{{asset('/imagenes/s1.svg')}}">
           
                    </div>
                    </a>
    
                    <a href="https://twitter.com/">
    
                        <div class="social">
                         <img src="{{asset('/imagenes/s2.svg')}}">
        
                 </div>
                 </a>
    
                 <a href="https://www.instagram.com/">
    
                    <div class="social">
                     <img src="{{asset('/imagenes/s3.svg')}}">
    
             </div>
             </a>
    
                </div>
                </div>
    
            </nav>
    
          </div>
    </header>
     
      
      <!--aqui colocamos la otra parte de la pagina-->

      <div class="header-content" style="background-image: url({{asset('/imagenes/imagfond.png')}}) ">

        <div class="swiper mySwiper-1">
        <div class="swiper-wrapper">
                    <!--- texto-->
                <div class="swiper-slide">
                <div class="slider">
                    <div class="slider-txt">
                        <h1>Cafe</h1>
                        <P>
                    Toma una taza de café y siente el aroma y el sabor del campo. 
                    Inicia el día con el mejor café traído directamente de las fincas colombianas. 
                    Con Café Start, cada sorbo te transporta al corazón del campo colombiano, brindándote una 
                    experiencia sensorial única y auténtica.
                        </P>
                        <div class="botones">
                            <a href="#"class= "btn-1">Comprar</a>
                            <a href="#"class= "btn-1">Menu</a>
                        </div>
                    </div>
                    <div class=" slider-img">
                        <img src="{{asset('/imagenes/cafef.png')}}">

                    </div>
                </div>
                </div>
                    //
                    /////
                    <div class="swiper-slide">
                    <div class="slider">
                        <div class="slider-txt">
                            <h1>Torta</h1>
                            <P>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi quam fugit
                                neque necessitatibus nam explicabo reiciendis suscipit? Sed officiis excepturi
                                facilis, consectetur vel officia nemo perferendis et necessitatibus quae assumenda.
                            </P>
                            <div class="botones">
                                <a href="#"class= "btn-1">Comprar</a>
                                <a href="#"class= "btn-1">Menu</a>
                            </div>
                        </div>
                        <div class=" slider-img">
                           
                            <img src="{{asset('/imagenes/slider2.png')}}">
    
                        </div>
                    </div>
                    </div>
            
                    
                    <div class="swiper-slide">
                        
                    <div class="slider" >
                        <div class="slider-txt">
                            <h1>Hambuguesa2</h1>
                            <P>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi quam fugit
                                neque necessitatibus nam explicabo reiciendis suscipit? Sed officiis excepturi
                                facilis, consectetur vel officia nemo perferendis et necessitatibus quae assumenda.
                            </P>
                            <div class="botones">
                                <a href="#"class= "btn-1">Comprar</a>
                                <a href="#"class= "btn-1">Menu</a>
                            </div>
                        </div>
                        <div class=" slider-img">
                            
                            <img src="{{asset('/imagenes/slider3.png')}}">
    
                        </div>
                    </div>
                    </div>

        </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

            </div>
        </div>

    

    <!--</header>-->

    <!--Productos1-->

    <main class="products">
        <div class="tabs container">
    
            <input type="radio" name="tabs" id="tab1" checked="checked" class="tabInput" value="1">
            <label for="tab1">Cafeteria</label>
    
            <div class="tab">
                <div class="swiper mySwiper-1" id="swiper1">
    
                    <div class="swiper-wrapper">
    
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    
                                    <img src="{{asset('/imagenes/cafetera2.jpg')}} "width="980px" height="180px" >
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Cafe capuchino Con Café Start, cada sorbo de café te transporta al corazón del campo colombiano, 
                                    brindándote una experiencia sensorial única y auténtica.</p>
                                    <span class="price">40.000</span>
                                </div>
                            </div>
                        </div>
    
                        <!-- Aquí se pueden agregar más productos -->
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo1</h4>
                                  
                                    <img src="{{asset('/imagenes/food2.png')}}">  
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>calida premium</p>
                                    <span class="price">60.000</span>
                                </div>
                            </div>
                        </div>
    
                        <!-- De aquí hacia arriba se pueden agregar más productos -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
    
                </div>
            </div>
    
            <!-- Producto 2 -->
            <input type="radio" name="tabs" id="tab2" class="tabInput" value="2">
            <label for="tab2">Posteria</label>
    
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper2">
    
                    <div class="swiper-wrapper">
    
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    
                                    <img src="{{asset('/imagenes/MOSAICOS-PASTELERIA.png')}} "width="1000px" height="230px">  
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Pasteles con chispas de café Aroma del Campo. Disfruta de las diferentes variedades de postres y siente el campo y su aroma en tus manos.</p>
                                    <span class="price">25.000</span>
                                </div>
                            </div>
                        </div>
    
                        <!-- Aquí se pueden agregar más productos -->
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo1</h4>
                                
                                    <img src="{{asset('/imagenes/MOSAICOS-PASTELERIA.png')}}">  
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>calida premium</p>
                                    <span class="price">60.000</span>
                                </div>
                            </div>
                        </div>
    
                        <!-- De aquí hacia arriba se pueden agregar más productos -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
    
                </div>
            </div>
    
            <!-- Producto 3 -->
            <input type="radio" name="tabs" id="tab3" class="tabInput" value="3">
            <label for="tab3">Postre</label>
    
            <div class="tab">
                <div class="swiper mySwiper-3" id="swiper3">
    
                    <div class="swiper-wrapper">
    
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                   
                                    <img src="{{asset('/imagenes/maracuyposte.jpg')}}">  
                                </div>
                                <div class="product-txt">
                                    <h4>Posteria</h4>
                                    <p>Un postre hecho de frutas naturales proporciona una sensación de suavidad y frescura, resaltando los sabores auténticos de los ingredientes.</p>
                                    <span class="price">20.000</span>
                                </div>
                            </div>
                        </div>
    
                        <!-- Aquí se pueden agregar más productos -->
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo1</h4>
                             
                                    <img src="{{asset('/imagenes/food8.png')}}">  
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>calida premium</p>
                                    <span class="price">60.000</span>
                                </div>
                            </div>
                        </div>
    
                        <!-- De aquí hacia arriba se pueden agregar más productos -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
    
                </div>
            </div>
    
        </div>
    </main>
    
        <!--Es donde se agrega toda la informacion de la  parte de adebajo este el div de la tercera parte de la imagen-->
        <section class="info container" style="background-image: url({{asset('/imagenes/fondo2.jpg')}}) "width="1351px" height="505px" >
            
            <div  class="info-img">
                
               <!-- <img src="{{asset('/imagenes/pan.png')}}">  -->
                </div>

               

                <div class="info-txt">
                    <h2>Informacion</h2>
                    <p>
                    Nuestra empresa, Café Start, se ha unido con los agricultores de Colombia para realizar la compra 
                    directa de sus granos. Este enfoque nos permite garantizar la mejor calidad y aroma del café 
                    colombiano, al tiempo que apoyamos a las comunidades locales y fomentamos prácticas agrícolas 
                    sostenibles.
                   Además, queremos que nuestros clientes conozcan el proceso de preparación del café desde la semilla 
                   hasta la taza. Por ello, ofrecemos experiencias inmersivas que incluyen visitas virtuales a las fincas
                    cafeteras, talleres de cata y métodos de preparación. De esta manera, no solo disfrutarán de un café 
                    excepcional, sino que también se conectarán con el origen y la dedicación detrás de cada grano.
                    </p>
                    <a href="#" class="btn-2">Mas Informacion</a>

            </div>

        </section>

        <!--colocamos la informacion del Horario-->

        <section class="horario">
            <div class="horario-info container">
                <h2>Horario</h2>
                <div class="horario-txt">
                    <div class="txt">
                    <h4>Direccion</h4>
                    <p>
                       cl 45 # 6 retificar
                    </p>
                    <p>
                        Cali
                    </p>

                </div>

                <div class="txt">
                    <h4>Horario</h4>
                    <p>
                       LUNES A VIENES : 8:00 AM - 5:00 PM
                    </p>
                    <p>
                        SABADO A DOMINGO 8:00 AM - 12:00 PM
                    </p>

                </div>

                <div class="txt">
                    <h4>Telefono</h4>
                    <p>
                       3333333
                    </p>
                    <p>
                        3134568971
                    </p>

                </div>
       <!--SE COLOCA DE LAS REDES SOCIALES-->
       <div class="txt">
        <h4>Redes Sociales</h4>
        <div class="socials">
                
                 <div class="socials">
                    <a href="https://www.facebook.com/">  
                    <div class="social">
                    <img src="{{asset('/imagenes/s1.svg')}}">
            </div>
            </a>
            <a href="https://twitter.com/">
                <div class="social">
                 <img src="{{asset('/imagenes/s2.svg')}} ">
         </div>
         </a>
         <a href="https://www.instagram.com/">
         <div class="social">
             <img src="{{asset('/imagenes/s3.svg')}}">
     </div>
    </a>
        </div>     
    </div>
    </div>
</div>
 <section>
    <iframe  class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254900.13223339635!2d-76.69048248684798!3d3.3953931545523948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a6f0cc4bb3f1%3A0x1f0fb5e952ae6168!2sCali%2C%20Valle%20del%20Cauca!5e0!3m2!1ses!2sco!4v1713302262847!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</section>

</section>
<div class="container">

    <footer class="footer container" style="background-image: url({{asset('/imagenes/footer.jpg')}});">

    <div class="row">
        <div class="col-8">&nbsp;&nbsp;&nbsp;</div>
     </div>
    <div class="links">
        <h4>Menu</h4>
        <ul>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="http://127.0.0.1:8000/login">login</a></li>

        </ul>

    </div>

    <div class="links">
        <h4>Redes sociales</h4>
        <ul>
            <li><a href="https://www.facebook.com/">Facebook</a></li>
            <li><a href="https://twitter.com/">Twitter</a></li>
            <li><a href="https://www.instagram.com">Instagram</a></li>
            

        </ul>

    </div>
    <div class="links">
        <h4>Informacion de contacto</h4>
        <ul>
             <li><a href="#">Telefono </a></li>
             <li><a href="#">(601)5524768</a></li>
             <li><a href="#">Celular </a></li>
             <li><a href="#">3104567894 </a></li>
             <li><a href="http://127.0.0.1:8000/#">www.cafestart.com.co</a></li>

        </ul>

    </div>

    <div class="links">
        <h4>lorem</h4>

        <div class="">
            <a href="#">

                <div class="socials">
                    <a href="https://www.facebook.com/">

                        <div class="social">
                            <img src="{{asset('/imagenes/s1.svg')}}">
        
                    </div>
                    </a>

                    <a href="https://twitter.com/">

                        <div class="social">
                        <img src="{{asset('/imagenes/s2.svg')}} ">
        
                </div>
                </a>

                <a href="https://www.instagram.com/">

                    <div class="social">
                    <img src="{{asset('/imagenes/s3.svg')}}">

            </div>
            </a>

                </div>
                
            </div>
    </div>

    </footer>
</div>


</body>

</html>
