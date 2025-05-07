<header>
<div class="menu">
    <nav>
            <li class="logo">
                <a href="" target="_blank">
                    <img src="<?= base_url('img/1.png') ?>" style="mix-blend-mode: multiply;"> 
                </a>
            </li>

            <div class="bri-menu">
              <nav>

            <li class="menu-toggle">
                <button id="menuToggle">&#9776;</button>
            </li>
            <li class="menu-item hidden <?= (uri_string() == 'inicio') ? 'active' : '' ?>">
                <a href="<?= base_url('inicio') ?>" >Inicio</a>
            </li>
            <li class="menu-item hidden <?= (uri_string() == 'nosotros') ? 'active' : '' ?>">
                <a href="<?= base_url('nosotros') ?>" id="btnNosotros">Nosotros</a>
            </li>
            <li class="menu-item hidden <?= (uri_string() == 'bolsa_empleo') ? 'active' : '' ?>">
                <a href="<?= base_url('bolsa_empleo') ?>" id="btnBolsa">Bolsa de Empleo</a>
            </li>

            <?php if (!session()->get('isLoggedIn')): ?>  <!-- Mostrar si el usuario NO ha iniciado sesión -->
            <li class="menu-item hidden <?= (uri_string() == 'registro') ? 'active' : '' ?>">
                <a href="<?= base_url('registro') ?>" class="button-item">Registrate</a>
            </li>
            <li class="menu-item hidden <?= (uri_string() == 'iniciar_session') ? 'active' : '' ?>">
                <a href="#" class="button-item-bri">Iniciar Sesión</a>
            </li> <!--<.?= base_url('iniciar_session') ?>-->

            <?php else: ?><!-- Mostrar si el usuario SÍ ha iniciado sesión -->

            <li class="menu-item hidden">   <!-- Icono de usuario -->
                <img src="<?= base_url('img/user-icon.png') ?>" alt="Usuario" style="width: 32px; height: 32px; border-radius: 50%; margin-right: 10px;">
            </li>
            <li class="menu-item hidden">
                <a href="<?= base_url('perfil') ?>" class="button-item">Mi perfil</a>
            </li>
            <li class="menu-item hidden">
                <a href="<?= base_url('logout') ?>" class="button-item-briz">
                <img src="<?= base_url('img/logout1.gif') ?>" alt="Usuario" style="width: 32px; height: 32px;"> 
                Cerrar Sesión</a>
            </li>
            <?php endif; ?>
             </nav>  
            </div>
    </nav>
</div>  
</header>

<script {csp-script-nonce}>
    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (let i = 0; i < menuItems.length; i++) {
            menuItems[i].classList.toggle("hidden");
        }
    }
    const links = document.querySelectorAll('.menu-item a');
    links.forEach(link => {
        link.addEventListener('click', () => {
            const menuItems = document.getElementsByClassName('menu-item');
            for (let i = 0; i < menuItems.length; i++) {
                if (!menuItems[i].classList.contains('hidden')) {
                    menuItems[i].classList.add("hidden");
                }
            }
        });
    });
</script>

<style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }
        *:focus {
            background-color: rgba(221, 20, 184, 0.2);
            outline: none;
        }
    .bri-menu {
    display: flex;
    align-items: center;
    justify-content: flex-end;   
}
     /* Estilo de los boton de "Regístrate" */
    .button-item {
    background-color: #282977 !important;
    color: white !important;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    /*font-weight: bold;*/
    transition: background-color 0.3s ease;
    }
    .button-item:hover {
    background-color: #1a1a66;
    }
      /* Estilo de los boton de "Iniciar Sesión" */
    .button-item-bri {
    background-color: #EE771C !important;
    color: white !important;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    /*font-weight: bold;*/
    transition: background-color 0.3s ease;
     }
    .button-item-bri:hover,
    .button-item-bri:focus {
    background-color:rgba(243, 141, 64, 0.93) !important;
    }
    .button-item-briz {
    background-color:rgba(238, 119, 28, 0) !important;
    color: #282977 !important;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    /*font-weight: bold;*/
    transition: background-color 0.3s ease;
    font-size: 10px;
     }
    .button-item-briz:hover,
    .button-item-briz:focus {
    background-color:rgba(254, 254, 254, 0) !important;
    }
    header {
            background-color: rgb(255, 255, 255);
            padding: .6rem 0 0;
        }
        header {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000; /* asegúrate de que esté por encima del resto */
   /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* sombra opcional para destacar */
}
    .menu {
            padding: .4rem 2rem;
        }
    header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }
    header li {
            display: inline-block;
        }
    header li a {
            border-radius: 5px;
            color: #282977;
            display: block;
            height: 44px;
            text-decoration: none;
        }
    header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
           /* line-height: 36px;*/
            padding: .4rem .65rem;
            text-align: center;
        }
    header li.menu-item a:hover,
    header li.menu-item a:focus {
            background-color: white;
            color: #282977; /* Color del texto */
            font-weight: bold; /* Resalta el texto */
            border-radius: 5px;
            /*border: 1px solid #282977;;*/
        }
    header .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }
    .logo img {
        max-width: 100%; /* Se ajusta automáticamente al ancho del contenedor */
        height: auto; /* Mantiene la proporción */
        display: block; /* Evita espacios en blanco innecesarios */
        text-align: center;
        }
        /* Asegurar que el contenedor del logo tenga un ancho flexible */
    .logo {
            position: relative;
            top: -19px; /* Mueve el logo hacia arriba */
            left: 10px; /* Opcional: Mueve el logo un poco a la izquierda */
        max-width: 180px; /* Define un tamaño máximo */
        width: 100%; /* Permite que se reduzca en pantallas pequeñas */
        text-align: center;
}
    header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }
    header .menu-toggle button {
            background-color: #282977;
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }
    header .menu-toggle button:hover,
    header .menu-toggle button:focus {
            background-color: #282977;
            color: rgba(255, 255, 255, 0.97);
        }
    header .heroe {
            margin: 0 auto;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
        }
    header .heroe h1 {
            font-size: 2.5rem;
            font-weight: 500;
        }
    header .heroe h2 {
            font-size: 1.5rem;
            font-weight: 300;
        }
    section {
            margin: 0 auto;
            max-width: 1100px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }
    section h1 {
            margin-bottom: 2.5rem;
        }
    section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }
    section pre {
            background-color: rgba(243 189 242 / 40%);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }
    section code {
            display: block;
        }
    section a {
            color: rgb(221, 20, 211);
        }
    section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }
    .further {
            background-color: rgba(247, 248, 249, 1);
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
        }
    .further h2:first-of-type {
            padding-top: 0;
        }
    .svg-stroke {
            fill: none;
            stroke: #000;
            stroke-width: 32px;
        }
    @media (max-width: 768px) {
       
    /* Estilo de los botones de "Regístrate" y "Iniciar Sesión" */
     .button-item {
    background-color: #282977 !important;
    color:white !important;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.button-item:hover {
    background-color: #1a1a66;
}
 /* Estilo de los boton de "Iniciar Sesión" */
 .button-item-bri {
    background-color: #EE771C !important;
    color: white !important;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}
.button-item-bri:hover {
    background-color: #EE771C;
}
         .logo { 
        max-width: 150px; /* Reduce el tamaño máximo */
        margin: 0 auto; /* Centra el logo */
        margin-bottom: 10px; /* Espacio debajo del logo */  
        text-align: center;
    }
            header ul {
                padding: 0;
            }
            header .menu-toggle {
                padding: 0 1rem;
            }
            header .menu-item {
                background-color: rgba(244, 245, 246, 1);
                border-top: 1px solid rgba(242, 242, 242, 1);
                /*margin: 0 15px;*/
                width: calc(100% - 30px);
                transform: translateX(-20%);
                min-width: 150px;
            }
            header .menu-toggle {
                display: block;
            }
            header .hidden {
                display: none;
            }
            header li.menu-item a {
                background-color: rgba(154, 155, 249, 0.36);;
            }
            header li.menu-item a:hover,
            header li.menu-item a:focus {
                background-color: rgba(154, 155, 249, 0.36);
                color: rgba(255, 255, 255, .8);
            }
        }
    </style>