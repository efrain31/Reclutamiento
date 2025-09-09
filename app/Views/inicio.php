<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | ESCARH</title>
    <?= $this->include('templates/styless') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?= $this->include('templates/header') ?> <!-- Llama al header -->
    <!-- Primera seccion -->
    <div class="inicio-container"> <!-- Sección izquierda: círculo con imagen -->
        <div class="circle">
            <img src="<?= base_url('img/3.png') ?>" alt="Imagen de la info" class="animate-img">
        </div>
        <div class="info"> <!-- Sección derecha: información -->
            <h1>Garantizamos talento en tiempo récord para que tu empresa nunca se detenga.</h1>
            <p>
                Somos la agencia de reclutamiento más rápida y eficiente, con más de 29 años de experiencia conectando empresas con el
                mejor talento. Nuestro proceso está garantizado, asegurando candidatos calificados en menos de 72 horas.
            </p>
            <div class="botones">
                <a href="<?= base_url('bolsa_empleo') ?>" class="btnn">¿Buscas Trabajo?</a>
                <a href="javascript:void(0)" onclick="scrollToFormulario()" class="btn1">Quiero Contratar</a>
            </div>
        </div>
    </div>

    <!-- Cuadro de informacion-->
    <div class="producto">
        <h3>Más de 20,000 profesionales han encontrado empleo gracias a nuestros servicios...</h3>
    </div>

    <!-- Segunda seccion-->
    <div id="nosotros" class="inicio-container2"> <!-- Sección derecha: círculo con imagen -->
        <div class="circle2">
            <img src="<?= base_url('img/4.png') ?>" alt="Imagen de la prenda" class="animate-img">
        </div>
        <div class="info2"> <!-- Sección derecha: información -->
            <h1>¿Quiénes somos?</h1>
            <p>
                En ESCARH conectamos a las empresas con el mejor talento, optimizando tiempos y garantizando calidad en cada contratación.</p>
            <p>Nos especializamos en procesos eficientes, personalizados y con tecnología avanzada para ofrecer soluciones rápidas y efectivas.
            </p>
            <p>Más que un servicio, somos tu socio estratégico en la gestión del capital humano.</p>
            <h1>Nuestros Valores</h1>
            <p><b>Compromiso:</b> Nos entregamos al 100% en cada proyecto, buscando siempre la excelencia.</p>
            <p><b>Honestidad:</b> Actuamos con transparencia, generando confianza en todas nuestras relaciones.</p>
            <p><b>Responsabilidad:</b> Cumplimos con nuestros compromisos, garantizando resultados de calidad.</p>
            <h2>¡Además estamos certificados!</h2>
            <div class="certificado">
                <img src="<?= base_url('img/6.png') ?>" alt="Imagen de certificado" class="certifica animate-img">
            </div>
        </div>
    </div>

    <!-- Tercera seccion-->
    <div id="bolsas" class="inicio-container3">
        <h2>Nuestros Servicios</h2>
        <p> Deja que nos ocupemos de lo complicado y usa tu tiempo en lo que realmente importa.</p>
        <p><strong>Conoce nuestros servicios con alcance nacional.</strong></p>

        <div class="servicios">
            <div class="servicio">
                <img src="<?= base_url('img/reclutamiento.png') ?>" alt="Reclutamiento Masivo" class="animate-img">
                <h3>Reclutamiento Masivo</h3>
                <p>
                    Garantizamos candidatos en 72 horas, utilizando estrategias diseñadas específicamente para cada perfil.
                    Publicamos en diversas fuentes de reclutamiento, participamos en ferias de empleo y contamos con módulos
                    de atracción de talento para encontrar al mejor candidato. La cotización se ajusta al volumen de vacantes,
                    y la factura se genera una vez cumplida la garantía de 15 o 21 días, según lo establecido en la cotización.
                </p>
                <a href="javascript:void(0)" onclick="scrollToFormulario()" class="btn2">Cotizar</a>
            </div>

            <div class="servicio">
                <img src="<?= base_url('img/reclutamiento2.png') ?>" alt="Reclutamiento Especializado" class="animate-img">
                <h3>Reclutamiento Especializado</h3>
                <p>
                    Garantizamos candidatos en 72 horas, asignando un reclutador especializado. Utilizamos diversas estrategias
                    de atracción como headhunting, publicaciones en portales, ferias de empleo y alianzas con universidades.
                    Somos expertos en perfiles operativos, técnicos, administrativos, altos mandos y TI. Realizamos psicometrías,
                    verificaciones de referencias y ofrecemos garantía de 30 a 60 días según la posición.
                </p>
                <a href="javascript:void(0)" onclick="scrollToFormulario()" class="btn2">Cotizar</a>
            </div>
        </div>

        <div class="servicios">
            <div class="servicio">
                <img src="<?= base_url('img/psicometria.png') ?>" alt="Psicometria" class="animate-img">
                <h3>Psicometrías</h3>
                <p>
                    Ofrecemos un amplio portafolio de opciones para cubrir todas tus necesidades de talento humano.
                    Contamos con personal administrativo, operativo, mandos medios y gerenciales, asegurando siempre
                    el mejor perfil para tu empresa.
                </p>
                <a href="javascript:void(0)" onclick="scrollToFormulario()" class="btn2">Cotizar</a>
            </div>

            <div class="servicio">
                <img src="<?= base_url('img/socioeconomicos.png') ?>" alt="Socioeconómicos" class="animate-img">
                <h3>Socioeconómicos</h3>
                <p>
                    Realizamos una visita domiciliaria para validar la información del candidato, asegurando
                    transparencia y confianza en el proceso de selección. Además, verificamos sus últimos empleos,
                    registros patronales y antecedentes en procesos legales, garantizando así una contratación
                    segura y confiable.
                </p>
                <a href="javascript:void(0)" onclick="scrollToFormulario()" class="btn2">Cotizar</a>
            </div>
        </div>

        <div class="servicios">
            <div class="servicio">
                <img src="<?= base_url('img/perifoneo.png') ?>" alt="Perifoneo" class="animate-img">
                <h3>Perifoneo</h3>
                <p>
                    Nuestro servicio de perifoneo garantiza una comunicación efectiva y dirigida a los candidatos. Incluye la
                    creación de audios personalizados, diseño de volantes atractivos, recorridos estratégicos
                    en zonas especifícas y volanteo para maximizar el impacto de tu mensaje y llegar a tu
                    audencia ideal.
                </p>
                <a href="javascript:void(0)" onclick="scrollToFormulario()" class="btn2">Cotizar</a>
            </div>
        </div>
    </div>

    <!-- Cuarta seccion-->
    <div class="politicas-container"> <!-- Sección derecha: círculo con imagen -->
        <div class="circle4">
            <img src="<?= base_url('img/5.png') ?>" alt="Imagen de la prenda" class="animate-img">
        </div>
        <div class="faq-container"> <!-- Sección derecha: información -->
            <!--<div class="linea"></div>-->
            <h3>PREGUNTAS Y RESPUESTAS</h3>
            <h1>Preguntas Frecuentes</h1>
            <div class="faq-grid">
                <div class="faq-item">
                    <img src="<?= base_url('img/icon-signo.gif') ?>" alt="Icon" class="faq-icon">
                    <!-- <span class="faq-icon">●</span>-->
                    <div>
                        <strong>¿Cómo puedo postularme a una vacante?</strong><br>
                        <p>Puedes revisar nuestras ofertas de empleo en la sección de Bolsa de Trabajo y postularte directamente llenando el formulario o enviando tu CV a nuestro correo de contacto.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <img src="<?= base_url('img/icon-signo.gif') ?>" alt="Icon" class="faq-icon">
                    <!--<span class="faq-icon">●</span>-->
                    <div>
                        <strong>¿Qué diferencia a ESCARH de otras agencias de reclutamiento?</strong><br>
                        <p>Nos enfocamos en procesos personalizados, atención cercana y uso de tecnología para atraer y filtrar candidatos de forma efectiva. Nuestro compromiso es entregar resultados rápidos sin descuidar la calidad del perfil.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <img src="<?= base_url('img/icon-signo.gif') ?>" alt="Icon" class="faq-icon">
                    <!--<span class="faq-icon">●</span>-->
                    <div>
                        <strong>¿Cómo puedo contratar sus servicios?</strong><br>
                        <p>Para solicitar nuestros servicios, puedes ponerte en contacto con nosotros a través del formulario en nuestra página web, llamarnos o enviarnos un correo con tus necesidades específicas.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <img src="<?= base_url('img/icon-signo.gif') ?>" alt="Icon" class="faq-icon">
                    <!--<span class="faq-icon">●</span>-->
                    <div>
                        <strong>¿Cuánto tiempo toma cubrir una vacante con ESCARH?</strong><br>
                        <p>El tiempo puede variar según el perfil solicitado, pero al especializarnos en reclutamiento masivo, contamos con bases de datos activas y estrategias digitales que agilizan la captación de talento en el menor tiempo posible.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quinta sección -->
    <div class="container">
        <div class="row container-custom">
            <div class="col-md-5 text-md-start text-center mb-4">
                <h2 class="fw-bold">¡Comienza ya tu reclutamiento!</h2>
                <p>Si desea acceder a nuestros servicios de reclutamiento, complete el formulario a continuación para dar inicio a su proyecto. En ESCARH, nos especializamos en la búsqueda y selección de talento.</p>
            </div>

            <div class="col-md-7">
                <div class="form-container" id="formulario">
                    <form action="/inicio/store" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombre<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="nombre" placeholder="Escriba nombre completo" value="<?= old('nombre') ?>" required id="nombre">
                                <small id="errorNombre" style="color:red; display:none;">Solo se permiten letras.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Correo<span style="color:red">*</span></label>
                                <input type="email" class="form-control" name="correo" placeholder="Ej. contacto@empresa.com" value="<?= old('correo') ?>" required id="correo">
                                <small id="errorCorreo" style="color:red; display:none;">Correo no válido. Debe contener @ y un dominio válido (ej: .com, .mx).</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Empresa<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="empresa" placeholder="Ej. empresa" value="<?= old('empresa') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Municipio/Delegación<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="municipio" placeholder="Escribe Municipio/Delegación" value="<?= old('municipio') ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono<span style="color:red">*</span></label>
                            <input type="tel" class="form-control" name="celular" placeholder="10 dígitos" value="<?= old('celular') ?>" required id="celular">
                            <small id="errorCelular" style="color:red; display:none;">Ingrese solo 10 números.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Servicios<span style="color:red">*</span></label>
                            <select class="form-select" name="servicio" required>
                                <option value="Selecciona" <?= old('servicio') == 'Selecciona' ? 'selected' : '' ?> disabled>Selecciona</option>
                                <option <?= old('servicio') == 'Reclutamiento Masivo' ? 'selected' : '' ?>>Reclutamiento Masivo</option>
                                <option <?= old('servicio') == 'Reclutamiento Especializado (Head Hunting)' ? 'selected' : '' ?>>Reclutamiento Especializado (Head Hunting)</option>
                                <option <?= old('servicio') == 'Psicometrías' ? 'selected' : '' ?>>Psicometrías</option>
                                <option <?= old('servicio') == 'Socioeconómicos' ? 'selected' : '' ?>>Socioeconómicos</option>
                                <option <?= old('servicio') == 'Perifoneo' ? 'selected' : '' ?>>Perifoneo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Información adicional</label>
                            <textarea class="form-control" rows="4" name="adicional" placeholder="Describe tu solicitud"><?= old('adicional') ?></textarea>
                        </div>

                        <div class="g-recaptcha mb-3" data-sitekey="6Leo_BQrAAAAAMQKs5ukj9Fa_4AUYXJF0OBltts7"></div>

                        <button type="submit" class="btn3">Enviar Solicitud</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Script para hacer scroll automático si hay mensaje -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');

            form.addEventListener('submit', function(e) {
                const celularInput = form.querySelector('input[name="celular"]');
                const celular = celularInput.value.trim();
                const phoneRegex = /^[0-9]{10}$/;

                if (!phoneRegex.test(celular)) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Teléfono inválido',
                        text: 'El número debe tener exactamente 10 dígitos numéricos.',
                        confirmButtonText: 'Entendido',
                        confirmButtonColor: '#d33'
                    });
                    celularInput.focus();
                    return false;
                }
                // Mostrar loader
                submitBtn.disabled = true;
                submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Enviando...`;
            });

            <?php if (session()->getFlashdata('success')): ?>
                Swal.fire({
                    icon: 'success',
                    title: '¡Correo enviado con éxito!',
                    text: '<?= session()->getFlashdata('success') ?>',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    // Redirigir al formulario si hace falta
                    window.location.hash = '/';
                });
            <?php elseif (session()->getFlashdata('error')): ?>
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: '<?= session()->getFlashdata('error') ?>',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Intentar de nuevo'
                }).then(() => {
                    document.getElementById('formulario').scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            <?php elseif (session()->getFlashdata('errors')): ?>
                Swal.fire({
                    icon: 'warning',
                    title: 'Hay errores en el formulario',
                    html: `<ul style="text-align: left;"><?php foreach (session()->getFlashdata('errors') as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?></ul>`,
                    confirmButtonColor: '#f0ad4e',
                    confirmButtonText: 'Corregir'
                }).then(() => {
                    const el = document.getElementById('formulario');
                    if (el) el.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            <?php endif; ?>
        });

        function scrollToFormulario() {
            const el = document.getElementById('formulario');
            if (el) el.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuNosotros = document.querySelector("a[href='<?= base_url('nosotros') ?>']");
            const inicioContainer2 = document.querySelector(".inicio-container2");

            menuNosotros.addEventListener("click", function(event) {
                event.preventDefault(); // Evita la navegación a otra página
                inicioContainer2.scrollIntoView({
                    behavior: "smooth"
                }); // Hace scroll suave hacia la sección
            });

            /*const menuBolsa = document.querySelector("a[href='<.?= base_url('bolsat') ?>']");
            const bolsaContainer = document.querySelector(".inicio-container3");

            menuBolsa.addEventListener("click", function (event) {
                event.preventDefault(); // Evita la navegación a otra página
                bolsaContainer.scrollIntoView({ behavior: "smooth" }); // Hace scroll suave hacia la sección
            });*/

            const menuInicio = document.querySelector("a[href='<?= base_url('/') ?>']");
            const inicioContainer = document.querySelector(".inicio-container");

            menuInicio.addEventListener("click", function(event) {
                event.preventDefault(); // Evita la navegación a otra página
                inicioContainer.scrollIntoView({
                    behavior: "smooth"
                }); // Hace scroll suave hacia la sección
            });

            const cotizarButtons = document.querySelectorAll(".btn2"); // Selecciona todos los botones "Cotizar"
            const containerSection = document.querySelector(".container"); // Selecciona la sección destino

            cotizarButtons.forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault(); // Evita la navegación si el href no es necesario
                    containerSection.scrollIntoView({
                        behavior: "smooth"
                    }); // Desplazamiento suave
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll(".animate-img");

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show"); // Activa la animación cuando entra en pantalla
                    } else {
                        entry.target.classList.remove("show"); // Reinicia la animación cuando sale
                    }
                });
            }, {
                threshold: 0.2
            });

            images.forEach(img => observer.observe(img));
        });
    </script>
</body>

</html>
<?= $this->include('templates/footer') ?> <!-- Llama al footer -->

<style {csp-style-nonce}>
    body {
        background-color: #BDBDBD;
        padding-top: 70px;
    }

    .form-select {
        background-color: white;
        --bs-form-select-bg-img: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e);
    }

    .btn2 {
        display: inline-block;
        padding: 10px 20px;
        background-color: #282977;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .btn2:hover,
    .btn2:focus {
        background-color: #1f225b;
    }
</style>



<script>
    const nombreInput = document.getElementById('nombre');
    const errorNombre = document.getElementById('errorNombre');

    nombreInput.addEventListener('input', function() {
        // Solo letras y espacios permitidos
        const regex = /^[a-zA-Z\s]*$/;
        if (!regex.test(this.value)) {
            errorNombre.style.display = 'inline';
            // Elimina caracteres inválidos automáticamente
            this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
        } else {
            errorNombre.style.display = 'none';
        }
    });
</script>

<script>
    const celularInput = document.getElementById('celular');
    const errorCelular = document.getElementById('errorCelular');

    celularInput.addEventListener('input', function() {
        // Elimina caracteres que no sean números
        this.value = this.value.replace(/\D/g, '');

        // Limita a 10 dígitos
        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }

        // Muestra error si no tiene 10 dígitos
        if (this.value.length < 10) {
            errorCelular.style.display = 'inline';
        } else {
            errorCelular.style.display = 'none';
        }
    });
</script>

<script>
const correoInput = document.getElementById('correo');
const errorCorreo = document.getElementById('errorCorreo');

correoInput.addEventListener('input', function() {
    // Permitir solo letras, números, @ y puntos
    this.value = this.value.replace(/[^a-zA-Z0-9@._]/g, '');

    // Validar formato básico: algo@dominio.com
    const regex = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/;

    if(!regex.test(this.value)) {
        errorCorreo.style.display = 'inline';
    } else {
        errorCorreo.style.display = 'none';
    }
});
</script>