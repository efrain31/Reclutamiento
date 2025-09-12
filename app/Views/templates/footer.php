<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<footer>

    <div class="footer-container">

        <div class="footer-section"><!-- Sección Izquierda - Redes Sociales -->

            <h3>¿Tienes dudas?</h3>
            <h3>¡Contáctanos! </h3>
            <div class="social-media">
                <p>
                    <a href="https://www.facebook.com/share/1CC1nPSZAL/" target="_blank" rel="noopener noreferrer">
                        <img src="<?= base_url('img/facebook-icon.png') ?>" alt="Facebook" width="30">
                    </a>
                    <a href="https://www.linkedin.com/company/106988075" target="_blank">
                        <img src="<?= base_url('img/linkedin-icon.png') ?>" alt="Linkedin" width="30">
                    </a>
                    <a href="https://www.instagram.com/escarhmx" target="_blank">
                        <img src="<?= base_url('img/instagram-icon.png') ?>" alt="Instagram" width="30">
                    </a>
                </p>
            </div>
            <button onclick="scrollToTop()" id="scrollBtn" title="Ir arriba">↑</button>
        </div>

        <div class="footer-section"> <!-- Sección Central - Información -->
            <h3>Contacto</h3>
            <p><i class="fas fa-envelope"></i><a href="mailto:recepcion@escarh-busmen.com"> correo@pruerba-EMPRESA.com</a></p>
            <p><i class="fas fa-phone"></i> <a href="tel:+523312949160">33 1294 9160</a>-<a href="tel:+523338822200">33 3882 2200</a></p>
            <!--<p>&copy; </?= date('Y') ?> Escarh</p>-->
        </div>

        <div class="footer-section"> <!-- Sección Derecha - Ubicaciones -->
            <h3>Ubicacione</h3>
            <!-- <p><i class="fas fa-map-marker-alt"></i> De las Américas 155, Hacienda Santa Fe, 45655 Hacienda Santa Fe.</p>
            <p><i class="fas fa-map-marker-alt"></i> El Verde Numero 35-local 3, 45685 San José del Castillo, Jal.</p>
            <p><i class="fas fa-map-marker-alt"></i> Camino al Cerrito Colorado, 45645 San Agustín, Jal.</p>
            <p><i class="fas fa-map-marker-alt"></i> Av. Pino Suárez 352, Centro, 64000 Monterrey, N.L.</p> -->
            <!-- Footer con Google Maps interactivo -->
            <footer style="width: 100%; height: 300px; padding: 0; margin: 0;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086418385466!2d-122.41941508468282!3d37.77492977975973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085818c2a8d3c1f%3A0xa0c0c0c0c0c0c0c0!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1694265600000!5m2!1sen!2sus"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
            </footer>

        </div>
    </div>
    <div class="version">
        &copy; Desarrollo LAPLACE <span id="anio"></span> <span class="d-none d-sm-inline-block"> - V.1.0.0 </span>
    </div>
</footer>
<script>
    document.getElementById("anio").textContent = new Date().getFullYear();
</script>
<style {csp-style-nonce}>
    * {
        transition: background-color 300ms ease, color 300ms ease;
    }

    *:focus {
        background-color: rgba(221, 72, 20, .2);
        outline: none;
    }

    .version {
        color: white;
        font-size: 12px;
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
        color: rgba(221, 72, 20, 1);
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

    footer {
        background-color: #26335D;
        text-align: center;
    }

    footer .copyrights {
        text-align: center;
        background-color: rgba(62, 62, 62, 1);
        color: rgba(200, 200, 200, 1);
        padding: 0.5rem;
        margin-top: 1rem;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        max-width: 100%;
        margin: 0 auto;
        text-align: left;
        color: white;
        padding: 2rem 1.75rem;
    }

    .footer-section {
        flex: 1;
        padding: 0 20px;
    }

    .footer-section h3 {
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .social-media a {
        margin-right: 10px;
    }

    .footer-section p {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .footer-section i {
        color: rgb(255, 255, 255);
        /* Color dorado para destacar los iconos #FFD700 */
        font-size: 1.2rem;
    }

    .footer-section a {
        color: white;
        text-decoration: none;
    }

    .footer-section a:hover {
        text-decoration: underline;
    }

    /* 🔹 RESPONSIVE - Ajustes para pantallas pequeñas */
    @media (max-width: 768px) {
        footer {
            background-color: #26335D;
            text-align: center;
            /* width: 162%;*/
        }

        .footer-container {
            flex-direction: column;
            /*align-items: center;*/
            text-align: center;
        }

        .footer-section {
            width: 100%;
            padding: 15px 0;
        }

        .footer-section p {
            justify-content: center;
            /* Centra textos */
        }

        .social-media {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 20px 0 0 0;
        }

        .social-media a {
            margin: 0;
        }
    }
</style>

<!-- buton -->
 <style>
  #scrollBtn {
   position: fixed;
    bottom: 20px; /* distancia desde abajo */
    left: 30px;   /* distancia desde la izquierda */
    z-index: 99;
    font-size: 28px;
    border: none;
    outline: none;
    background-color: #605c5cff;
    color: white;
    cursor: pointer;
    padding: 20px 20px;
    /* border-radius: 50%; */
    box-shadow: 0 4px 6px rgba(0,0,0,0.3);
    display: none; /* Oculto por defecto */
    transition: background-color 0.3s;
  }

  #scrollBtn:hover {
    background-color: #0056b3;
  }
</style>

<script>
  // Mostrar el botón cuando el usuario baja 100px
  window.onscroll = function() {toggleScrollButton()};

  function toggleScrollButton() {
    const btn = document.getElementById("scrollBtn");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  }

  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
</script>
