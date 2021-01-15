<!DOCTYPE html>
<html>
    <head>
        <title>Libro</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="jquery-3.4.1.min.js"></script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Course CSS -->
        <link rel="stylesheet" type="text/css" href="css/css_general.css" media="screen" />
        <script>
            $(document).ready(function () {
                $('#myModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                });
            });
        </script>
    </head>
    <body>

        <?php
        require_once './clase/Usuario.php';
        require_once './clase/Conexion.php';
        session_start();
        if (isset($_SESSION['u'])) {
            $u = $_SESSION['u'];
        }
        $_SESSION['totalLibro'] = Conexion::obtenerLibro();

        include './vista/encuadres/cabeceraIndex.php';
        ?>

        <div class="container inde">
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <h1>Tsundoku</h1><br>                    
                    <p>Es un concepto japonés que describe la sesación de tener un hogar con libros apilados por el simple placer de verlos.</p><br>
                    <p>Viene de estas dos palabras:</p><br>
                    <p>     Tsunde-oky: apilar cosas para luego marcharse.</p><br>
                    <p>     Dokusho: leer libros.</p><br>
                    <p>Este es el porque de que la página se llame así.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <audio src="musica/Sidecars_-_Fan_de_Ti_(Videoclip).mp3" controls="controls" type="audio/mpeg" preload="preload"></audio>
                </div>
                <div class="col-sm col-md col-lg">
                    <img src="img/iconos/1.gif" alt="gif"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <h1 class="text-center">Bibliotecas más impresionantes</h1>
                    <!-- CARRUSEL -->
                    <section class="row justify-content-center mt-5 mb-5">
                        <div class="col-md-11 col-sm-11 col-lg-11 mt-4">
                            <div class="carousel slide" id="carrusel" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca George Peabody (Baltimore, Estados Unidos) .jpg"  alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca George Peabody</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Baltimore, Estados Unidos</h2>
                                                        <p>Catedral de libros”. Así describió el primer rector del Instituto Peabody, Nathaniel H. Morison, esta biblioteca construida en el siglo XIX en la ciudad de Baltimore (Maryland) por iniciativa del banquero, empresario, escritor y filántropo George Peabody, y que actualmente forma parte de la Universidad Johns Hopkins. Esta asidua a las listas de bibliotecas más bellas del mundo, con sus seis amplios pisos acabados en mármol blanco y su inmenso atrio de entrada, atrae no solo a estudiosos (sus 300.000 volúmenes forman un tesoro de libros antiguos) y amantes del estilo arquitectónico neo-griego, también a parejas de novios que la utilizan como salón de bodas.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Central de Seattle (Washington, Estados Unidos) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Central de Seattle</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Washington, Estados Unidos</h2>
                                                        <p>El proyecto del arquitecto holandés Rem Koolhaas (estudio OMA) había despertado tal expectación que, al año de su inauguración en 2004, la Biblioteca Central de Seattle (Washington) había recibido unos dos millones de visitas. A partir de 2005 comenzó a organizar visitas guiadas por sus cinco plataformas superpuestas y desplazadas, y su fachada de vidrio y acero (en la foto) cerrando un conjunto que redefine la biblioteca como un espacio que guarda, ordena y hace accesible al público no solo libros, sino cualquier tipo de información, da igual el medio en el que ésta venga encapsulada. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Pública de Stuttgart (Alemania).jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Pública de Stuttgart</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Alemania</h2>
                                                        <p>Turistas y fotógrafos de todo el mundo se quedan maravillados por el continente, un impresionante edificio diseñado por el arquitecto coreano Eun Young Yi, con 11 plantas (dos de ellas subterráneas), fachada de hormigón, paneles que por la noche se iluminan de diferentes colores y lo asemejan a un enorme cubo de Rubik, e interiores de blanco riguroso. Otros suben a la terraza de la azotea a disfrutar de las vistas. Y otros más exploran el contenido, se meten en el estudio de sonido o se apuntan a la oferta de talleres y actividades que han convertido a la Biblioteca Pública de Sttutgart en epicentro cultural de la ciudad alemana. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca del Trinity College (Dublín, Irlanda) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca del Trinity College </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Dublín, Irlanda</h2>
                                                        <p>The Old Library, la vieja biblioteca del Trinity College, y su famoso libro de Kells (un manuscrito del siglo IX que recoge los cuatro evangelios con ornamentada caligrafía, y en latín) son parada obligada para quien visite Dublín. El edificio, construido en el siglo XVIII, tiene una sala principal, Long Room (Habitación Larga, en la imagen), donde reposan las obras más antiguas en recias estanterías que forran las paredes. En una vitrina se expone el arpa más antigua que se conserva en Irlanda, realizada en roble y sauce, con cuerdas de bronce. La biblioteca posee la mayor colección de manuscritos y libros impresos del país. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Nacional Marciana (Venecia, Italia) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Nacional Marciana</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Venecia, Italia</h2>
                                                        <p>La práctica totalidad de los 40.000 visitantes que Venecia recibe cada día llegan a la plaza de San Marcos, pero, una vez allí, pocos se aventuran a entrar a la Biblioteca Nacional Marciana, una de las más antiguas de Italia, llamada también Sansoviana en honor a Jacopo Sansovino, arquitecto autor de su diseño. Globos terráqueos antiguos, manuscritos del siglo XV, 'tintorettos' y 'veroneses' en las paredes de un palacio renacentista que cumple el sueño del poeta Petrarca, que en 1362 donó sus libros a la República para engrosar una futura biblioteca pública abierta a estudiosos, eruditos y amantes de la literatura. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Pública de Nueva York (Estados Unidos) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Pública de Nueva York </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Nueva York, Estados Unidos</h2>
                                                        <p>Dos leones de mármol, Paciencia y Fortaleza, bautizados así por Fiorello La Guardia, alcalde de Nueva York durante la Gran Depresión, dan la bienvenida al magnífico edificio neoclásico que alberga la Biblioteca Pública de la ciudad neoyorquina, inaugurada a comienzos del siglo XX en Manhattan, en la Quinta Avenida con la calle 42. Desde el impresionante Astor Hall, de mármol blanco, el visitante puede dirigirse a la Rose Main Reading Room (en la imagen), la sala de lectura principal, que ha aparecido mucho en el cine. Toda la biblioteca, en realidad, ha sido escenario de películas como 'Desayuno con diamantes', 'Cazafantasmas', 'El Día de Mañana', y series como 'Sexo en Nueva York'. Su catálogo incluye varios manuscritos de Shakespeare y una carta de Cristóbal Colón. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Real Gabinete Portugués de Lectura, (Rio de Janeiro, Brasil) .jpg " alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Real Gabinete Portugués de Lectura</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Rio de Janeiro, Brasil</h2>
                                                        <p>Quienes visitaron Río de Janeiro en 2016 con motivo de la celebración de los Juegos Olímpicos, no pudieron entrar en el Real Gabinete Portugués de Lectura, en pleno centro de la ciudad brasileña, porque estaba siendo restaurado. Abierto de nuevo, luce en todo el esplendor de su arquitectura neo-manuelina y sus interiores de madera profusamente tallada. Nació como biblioteca privada, de la mano de inmigrantes portugueses, en un edificio que concluyó en 1887 y se inspiró en el Monasterio de los Jerónimos de Lisboa. Su fastuoso Salón de Lectura (en la foto) recibe la luz natural a través de una enorme claraboya trabajada en hierro y vidrio pintado.<p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Real Danesa (Copenhague) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Real Danesa</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Copenhague, Dinamarca</h2>
                                                        <p>El edificio construido en 1999 como ampliación del bonito complejo original de la Biblioteca Real Danesa (que data de 1906) en el canal de Christianshavn, junto al puerto de Copenhague, se conoce como el 'Diamante negro'. Su llamativa estructura de acero, vidrio y granito negro alberga una sala de conciertos, un café, distintos espacios expositivos e invita al visitante a disfrutar de unas vistas impresionantes hacia mar. Tres puentes lo conectan con la antigua biblioteca; el techo del más grande luce una pintura del artista danés Per Kirkeby. El conjunto atesora los primeros libros impresos en el país en 1482, y todos los trabajos que han sido depositados en Dinamarca desde el siglo XVII. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca del Congreso de los Estados Unidos (Washington) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca del Congreso de los Estados Unidos </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Washington, Estados Unidos</h2>
                                                        <p>Visitas guiadas y exposiciones, conciertos, talleres, una tienda (online), bares, cafés y 29 salas de lectura organizadas por temáticas, lengua y formato. La Biblioteca del Congreso de los Estados Unidos, ubicada en Washington y repartida en tres edificios (el Thomas Jefferson, el John Adams y el James Madison), es la más grande del mundo, con 1.348 kilómetros de estanterías y más de 167 millones de artículos, entre ellos, 5,5 millones de mapas, 8,1 millones de partituras y 72 millones de manuscritos. Es depositaria de una de las pocas copias que se conservan de la biblia de Gutenberg y del borrador de la Declaración de Independencia de Estados Unidos.<p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Sede de Beitou de la Biblioteca Pública de Taipéi (Taiwán) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Sede de Beitou de la Biblioteca Pública de Taipéi </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Taipéi, Taiwán</h2>
                                                        <p>Rodeada de parque, con jardines en la azotea, un sistema de recuperación de aguas grises y pluviales y un interior iluminado mediante paneles solares y ventilado naturalmente por las corrientes de aire, la sede de Beitou de la Biblioteca Pública de Taipéi es un respiro verde, un oasis en mitad de los rascacielos, el cemento y el hormigón de la ciudad de Taiwán. Construida en madera, con sus características balconadas hechas en el mismo material, fue inaugurada en 2006 y, desde entonces, ha ganado varios premios internacionales por su vocación medioambiental.<p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Vasconcelos (Ciudad de México) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Vasconcelos</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Ciudad de México, México</h2>
                                                        <p>La Biblioteca Vasconcelos, diseñada por el arquitecto mexicano Alberto Kalach en la zona norte de Ciudad de México e inaugurada en 2006, es uno de los 10 recintos bibliotecarios modernos más reconocidos del mundo, y uno de los más visitados de América Latina. Amplitud, luminosidad y más de 600.000 obras (libros, CD y DVD, revistas y periódicos) ordenadas en estantes colgantes, entre techos y paredes de cristal. Todo en mitad de un jardín botánico de 26.000 metros cuadrados con casi 60.000 plantas de 168 especies del país. Desde el vestíbulo principal 8en la foto) saluda su icono, Mátrix Móvil, la estructura ósea de una enorme ballena gris (al fondo, abajo) transformada en obra de arte por el artista plástico Gabriel Orozco. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Clementina (Praga, República Checa) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Clementina </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Praga, República Checa</h2>
                                                        <p>Dicen que en el órgano de la Capilla de los Espejos tocó Mozart en su visita a Praga, en el siglo XVIII; desde su Torre Astronómica, con vistas al casco histórico y al castillo de la capital checa, realizó sus investigaciones astronómicas el danés Tycho Brahe antes de que existiera el telescopio; incluso que en la Sala de los Meridianos se guarda uno de los registros meteorológicos más antiguos de Europa. La Biblioteca Clementina es un tesoro barroco, abigarrado y con siglos de historia, que solo se puede conocer mediante una visita guiada, aunque debido a una disputa legal con la Biblioteca Nacional, actualmente no se garantiza que el 'tour' cubra todos los lugares de interés del complejo. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Nacional de Sejong (Corea del Sur) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Nacional de Sejong </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Sejong, Corea del Sur</h2>
                                                        <p>La primera sucursal de la Biblioteca Nacional de Corea del Sur fue construida en la ciudad de Sejong en 2013, y proyectada por Samoo Architects & Engineers. Se la conoce también como E-Brary, acrónimo de las palabras emotion y library (emoción y biblioteca en inglés), porque la pretensión de este estudio de arquitectura era crear un espacio “emocionante” donde los formatos de información analógica y digital convergieran y fueran cómodamente accesibles al público. Líneas sencillas, un techo inclinado evocando la página de un libro que está siendo pasada, salas de lectura y de conferencias. Y unas bonitas vistas desde la azotea. </p> 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Nacional de Austria (Viena) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Nacional de Austria </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Austria, Viena</h2>
                                                        <p>Abrió en 1723 como biblioteca imperial y hoy es la mayor y, probablemente, la más espectacular de Austria. Mármol y madera, esculturas, columnas y cúpulas cubiertas de frescos. La Biblioteca Nacional, en Viena, celebra durante 2018 su 650º aniversario, mostrando diversos tesoros que solo expone en las ocasiones especiales, como el manuscrito original del Réquiem de Mozart, de 1791; la biblia de Gutemberg de 1.286 páginas, de 1454 o el evangeliario de Juan de Troppau. Las exhibiciones tienen lugar en la Sala de Gala, una joya barroca del XVIII que alberga más de 200.000 tomos y cuatro globos terráqueos venecianos de más de un metro de diámetro.<p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Bodleiana de la Universidad de Oxford (Inglaterra) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Bodleiana de la Universidad de Oxford </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Oxford, Inglaterra</h2>
                                                        <p>The Bod, la Biblioteca Bodleiana de la Universidad de Oxford, debe su nombre al diplomático y profesor inglés Thomas Bodley, quien la fundó a principios del siglo XVII. Uno de los espacios bibliotecarios más antiguos de Europa, transitado, entre otros, por J. R. R. Tolkien (primero como alumno y después como docente) ha necesitado dos ampliaciones debido al rapidísimo incremento de los volúmenes almacenados. Parte de los fondos se encuentran bajo tierra, en la Cámara Radcliffe (en la foto); otros están en la Torre de las Cinco Órdenes, llamada así por estar decorada con columnas de los cinco órdenes de la arquitectura clásica. La biblioteca original se conecta con la nueva mediante un túnel. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Central de Vancouver (Canadá) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Central de Vancouver </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Vancouver, Canadá</h2>
                                                        <p>La creación del arquitecto Moshe Safdie se asemeja a un Coliseo moderno: un edificio rectangular rodeado de una planta circular con una fachada cuajada de arcos y, rematando, una azotea vegetal a modo de jardín colgante diseñado por la paisajista Cornelia Oberlander. Desde su inauguración, en 1995, la Biblioteca Central de Vancouver se ha convertido no solo en un espacio dedicado a los libros, las revistas, la música y los videos, sino en un auténtico lugar de encuentro y reunión social de la ciudad, para vecinos y visitantes de todas las edades. Es una de las 22 bibliotecas del sistema público de la ciudad canadiense, considerado uno de los mejores del mundo. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Bibliotheca Alexandrina (Alejandría, Egipto) .jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Bibliotheca Alexandrina </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Alejandría, Egipto</h2>
                                                        <p>La versión siglo XXI de la legendaria Biblioteca de Alejandría, de la que apenas han quedado vestigios, es una mole de 11 niveles (cuatro de ellos subterráneos) y con cubierta circular en homenaje a Ra, dios del Sol; vidrio y aluminio mezclado con el cemento para reflejar la luz mediterránea, en recuerdo del legendario faro de Alejandría. Unos 6.400 paneles de granito muestran caracteres de todos los alfabetos conocidos del planeta en su fachada (en la foto). Fue oficialmente inaugurada en 2002, milenio y medio después de su antecesora, cerca del lugar que presumiblemente ocupaba aquella en el malecón de la ciudad egipcia para recuperar su “espíritu de apertura y erudición”, en palabras de sus responsables. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item objetfitcover">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                            <img class="tamCa w-30 d-block" src="img/biblioteca/Biblioteca Estatal de Nueva Gales del Sur (Australia).jpg" alt="Error al mostar">
                                        </button>                                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Biblioteca Estatal de Nueva Gales del Sur </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Nueva Gales del Sur, Australia</h2>
                                                        <p>Esta biblioteca estatal, la más antigua de Australia, abierta desde 1826 en Nueva Gales del Sur, cerca de los Reales Jardines Botánicos, tiene una cara neoclásica con el edificio Mitchell y una fachada más moderna, la de la calle Macquarie (en la imagen), fruto de una ampliación inaugurada en 1988 y remodelada en 2012 para dotarla de un nuevo espacio de aprendizaje para programas educativos. Un lugar para conocer historia australiana y ver, por ejemplo, un mapa de Tasmania dibujado en 1640 por el explorador Abel Tasman. Su animada programación incluye charlas, exposiciones o películas y documentales proyectados en el Auditorio Metcalfe. <p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carrusel" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carrusel" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                        <span class="sr-only">Posterior</span>
                                    </a>
                                    <ol class="carousel-indicators">
                                        <?php
                                        for ($i = 0; $i < 17; $i++) {
                                            if ($i == 0) {
                                                ?>
                                                <li data-target="#carrusel" data-slide-to="<?php echo $i; ?>" class="active"></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                <li data-target="#carrusel" data-slide-to="<?php echo $i; ?>"></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ol>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
        <?php
        include './vista/encuadres/pieIndex.php';
        ?>
    </body>
</html>