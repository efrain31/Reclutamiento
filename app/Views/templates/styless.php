<style  {csp-style-nonce}>
     body, html {
    width: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Evita el desplazamiento horizontal */
    background-color: #BDBDBD;
}
img {
    max-width: 100%;
    height: auto;
}
.animate-img {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.animate-img.show {
    opacity: 1;
    transform: translateY(0);
}
 .certificado{
    margin: 0 0 15px 290px;
    max-width: 100%;
}
.menu-item.active a {
    color: #282977; /* Color del texto */
    font-weight: bold; /* Resalta el texto */
    border-radius: 5px;
    /*border: 1px solidrgba(40, 41, 119, 0.93);*/
}
.circle, .circle2, .circle4 {
    max-width: 90%; /* Para que no ocupen demasiado espacio */
    height: auto;
}
        .container h2, .container p {
            color: #282977;
        }
      .container {
        background-color: #BDBDBD;
      }
        .container-custom {
            display: flex;
            align-items: center;
            min-height: 100vh;
        }
        label {
    font-weight: bold;
        }
        .info-text {
            max-width: 400px;
        }
        .form-container {
            background: #BDBDBD;
            padding: 30px;
            /*border-radius: 10px;*/
        }
        .form-select {
        background-color:rgb(251, 250, 250);
        --bs-form-select-bg-img: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e);
        }
    .producto {
    border: 1px solid #26335D;
    /*border-radius: 10px;*/
    padding: 40px;
    background-color: #26335D;
    text-align: center;
    box-shadow: 3px 3px 10px rgba(0,0,0,0.1);
   
}
.producto h3 {
    font-size: 25px;
    color:rgb(255, 255, 255);
}
.politicas-container {
      display: flex;
      /*align-items: center; */ /* Alinea verticalmente */
      /*justify-content: center;
      padding: 120px 0 0;*/
      gap: 120px; /*para separar el texto del circulo con la imagen*/
      /*flex-wrap: wrap;*/ /* Evita desbordamientos en pantallas más pequeñas */
     /* max-width: 100%;*/ /* Antes no tenía ancho definido, ahora ocupa el 90% */
    padding: 40px;
    max-width: 100%;
    margin: auto;
    flex-direction: row-reverse;
    background-color: #26335D;
    }
    .linea {
    width: 50px;
    height: 4px;
    background-color: white;
    margin-bottom: 5px;
    text-align: center;
}
/*.politicas-container ul {
    list-style-type: disc; /* Agrega los puntos */
    /*padding-left: 20px;*/ /* Espacio para alinear con los puntos */
   /* color: white;
    padding: 0 0 10px 150px;
}*/

/*.politicas-container ul li {
    font-size: 1.2rem;
    margin-bottom: 10px;
}*/
.cotizacion {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    margin-top: 30px;
}
    .inicio-container {
      display: flex;
      align-items: center;  /* Alinea verticalmente */
      justify-content: center;
      padding: 120px 0 0;
      gap: 120px; /*para separar el texto del circulo con la imagen*/
      flex-wrap: wrap; /* Evita desbordamientos en pantallas más pequeñas */
      max-width: 100%; /* Antes no tenía ancho definido, ahora ocupa el 90% */
     /* margin: 0 auto;*/ /* Centra el contenedor */
     background-color:rgb(255, 255, 255);
    }
    .inicio-container2 {
      display: flex;
      align-items: center;  /* Alinea verticalmente */
      justify-content: center;
      padding: 120px 0 0;
      gap: 120px; /*para separar el texto del circulo con la imagen*/
      flex-wrap: wrap; /* Evita desbordamientos en pantallas más pequeñas */
      max-width: 100%; /* Antes no tenía ancho definido, ahora ocupa el 90% */
      flex-direction: row-reverse;
      background-color:rgb(255, 255, 255);
   
    }
    .inicio-container3 {
     text-align: center;
    /*padding: 50px 20px;
      background-color: #574F4A;*/
      color: #282977;
      background-color:rgb(255, 255, 255);
      padding: 55px 0 0 0;
    }
    .inicio-container3 h2 {
    font-size: 2.5rem;
    color: #282977;
    margin-bottom: 30px; 
   }
   .inicio-container3 p {
    font-size: 1.2rem;
    
    text-align: center;
    }
    .servicios {
    display: flex;
    justify-content: center;
    gap: 50px;
    flex-wrap: wrap;
    }
    .servicio {
    width: 350px;
    background: white;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    }
    .servicio img {
    width: 100px;
    height: 100px;
    margin-bottom: 15px;
   }
   .servicio h3 {
    font-size: 1.5rem;
    color: #282977;
    margin-bottom: 10px;
    }
    .servicio p {
    font-size: 1rem;
    color: #574F4A;
    margin-bottom: 20px;
    text-align: left;
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
    .btn2:hover, .btn2:focus {
    background-color: #1f225b;
     }
     .btn4 {
    display: inline-block;
    padding: 10px 20px;
    background-color: #282977;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    margin-bottom: 30px;
    }
    .btn4:hover, .btn4:focus {
    background-color: #1f225b;
     }
    .circle {
      width: 500px;
      height: 500px;
      border-radius: 50%;
     /* overflow: hidden; */ /*se recorta la imagen para que no salga de los límites del círculo.*/
      background-color: #26335D; /* Color de fondo en caso de que la imagen no cargue */
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;  
                      
    }
    .circle2 {
      width: 500px;
      height: 500px;
      border-radius: 50%;
     /* overflow: hidden; */ /*se recorta la imagen para que no salga de los límites del círculo.*/
      background-color: #26335D; /* Color de fondo en caso de que la imagen no cargue */
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;  
                      
    }
    .circle4 {
      width: 500px;
      height: 500px;
      border-radius: 50%;
     /* overflow: hidden; */ /*se recorta la imagen para que no salga de los límites del círculo.*/
      background-color:rgb(250, 251, 252); /* Color de fondo en caso de que la imagen no cargue */
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;  
                      
    }
    /* La imagen se ajusta al contenedor circular */
    .circle img {
      width: 100%;    
      height: 117%;   
      object-fit: cover;    
      position: relative;   
      top: -40px; /* Ajusta este valor según lo necesites */
    }
    .circle2 img {
      width: 100%;    
      height: 129%;   
      object-fit: contain;    
      position: relative;   
      top: -73px; /* Ajusta este valor según lo necesites */
      transform: translateX(68px);
    }
    .circle4 img {
      width: 100%;    
      height: 130%;   
      object-fit: contain;    
      position: relative;   
      top: -25px; /* Ajusta este valor según lo necesites */
    }
    .info {
    flex: 1;
    }
    .info2 {
    flex: 1;
   /* max-width: 600px;*/
    }
    .certifica {
    width: 30%;
    padding: 10px 0 0;
    margin-bottom: 30px;
    }
    .info h1, .info p {
    margin: 0 70px 15px; 
    text-align: left;
    color: #282977;
    max-width: 100%; /*650px */
    }
    .info h1 {
    font-size: 2.3rem;
    }
    .info p {
    line-height: 1.5;
    }
    .info2 h1,.info2 h2, .info2 p {
    margin: 0 170px 15px; 
    text-align: left;
    color: #282977;
    max-width: 100%; /*650px */
    }
    .faq-container {
        /*background-color: #2A2F66;
        padding: 40px;
        border-radius: 10px;*/
        max-width: 900px;
        margin: auto;
        /*text-align: center;*/
    }
    .faq-container h3 {
        color:rgb(206, 207, 208);
        text-transform: uppercase;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }
    .faq-container h1 {
        color: #ffffff;
        font-size: 28px;
        margin-bottom: 30px;
        text-align: center;
    }
    .faq-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .faq-item {
        display: flex;
        align-items: flex-start;
       /* background-color: rgba(255, 255, 255, 0.1);
       border-radius: 8px;*/
        padding: 15px;
       
    }
    .faq-icon {
        /*color: #5DADE2;
        font-size: 24px;*/
        margin-right: 15px;
    }

    .faq-item strong {
        color:rgb(255, 255, 255);
        font-size: 18px;
    }

    .faq-item p {
        color:rgb(206, 207, 208);
        font-size: 16px;
        margin-top: 5px;
        text-align: left;
    }
    .info2 h1 {
    font-size: 2.9rem;
    margin-bottom: 30px;
    }
    .info2 h2 {
    font-size: 2rem;
    margin-bottom: 10px;
    }
    .info2 p {
    line-height: 1.5;
    }
   
     /* Contenedor de los botones */
 .botones {
      display: flex;
      flex-direction: row;
      gap: 90px;
      margin-top: 15px;
      padding: 25px 80px 0;
      justify-content: center;
    }
    .btnn, .btn1, .btn3 {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    min-width: 150px;
}

.btnn:hover, .btn1:hover, .btn3:hover{
    opacity: 0.8;
}
.btnn:focus{
    background-color: #26335D;
}
.btn1:focus{
    background-color: #EE771C;
}
.btn1 {
    background-color: #EE771C;
}
.btnn, .btn3{
    background-color: #26335D;
}
.registro {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x)* .5);
    padding-left: calc(var(--bs-gutter-x)* .5);
    margin-right: auto;
    margin-left: auto;
    max-width: 1320px;
        background-color:rgb(255, 255, 255);
      }
      .registro h2, .registro p{
        color: #282977;
      }
      .form-registro {
            background:rgb(254, 254, 254);
            padding: 30px;
            /*border-radius: 10px;*/
        }
    /* Responsividad */
    @media (max-width: 768px) {

   .info2 h2, .info h1 {
    text-align: left;
    color: #282977;
    max-width: 100%; /*650px */
    font-size: 1.4rem;
    margin: 0;
    margin-bottom: 20px;
    }
    .info2 h1 {
    text-align: center;
    color: #282977;
    max-width: 100%; /*650px */
    font-size: 2rem;
    margin: 0;
    margin-bottom: 20px;
    }
    .info2 p, .info p {
    text-align: left;
    color: #282977;
    max-width: 100%;
    font-size: 1rem;
    margin: 0;
    margin-bottom: 20px;
    }
    .faq-container h1 {
    text-align: center;
    color:rgb(254, 254, 255);
    max-width: 100%; 
    font-size: 28px;
    margin: 0;
    margin-bottom: 20px; 
    }
    .faq-container h3 {
    text-align: center;
    color:rgb(206, 207, 208);
    max-width: 100%;
    font-size: 16px;
    margin: 0;
    margin-bottom: 20px; 
    }
    .faq-container p {
    text-align: left;
    color:rgb(206, 207, 208);
    max-width: 100%; 
    font-size: 16px;
    margin: 0;
    margin-bottom: 20px;
    }
    .certifica {
    width: 50%;
    padding: 10px 0 0;
    margin-bottom: 30px;
    }
    .certificado{
    margin: 0 0 15px 0;
    max-width: 100%;
}
    .circle2 img {
      width: 100%;    
      height: 129%;   
      object-fit: contain;    
      position: relative;   
      top: -43px; /* Ajusta este valor según lo necesites */
      transform: translateX(0px);
    }
    .circle img {
    width: 100%;
    height: 117%;
    object-fit: cover;
    position: relative;
    top: -0px;
    }
    .circle4 img {
      width: 100%;    
      height: 130%;   
      object-fit: contain;    
      position: relative;   
      top: -43px; /* Ajusta este valor según lo necesites */
    }
    .politicas-container {
        flex-direction: column;
        gap: 40px; /* Reduce la separación */
        /*padding: 50px 20px; /* Ajusta el padding para evitar desbordamientos */
    }
    
    /*.politicas-container ul {
        padding: 20px;
    }
    .politicas-container h1, .politicas-container p {
        padding: 20px;
    }*/
    .inicio-container, 
    .inicio-container2, 
    .inicio-container3 {
        flex-direction: column;
        gap: 40px;
        /*padding: 50px 20px;*/
    }
    .inicio-container, .inicio-container2, .inicio-container3, 
     .container, .registro {
    width: 100%;
    max-width: 100%;
    padding: 20px;
}
   .inicio-container3 h2 {
    font-size: 2rem;
    text-align: center;
    color: #282977;
    max-width: 100%; /*650px */
    margin: 0;
    margin-bottom: 20px;
}
   .inicio-container3 p {
    font-size: 1rem;
    text-align: left;
    color: #282977;
    max-width: 100%; /*650px */
    margin: 0;
    margin-bottom: 20px;
}
    .circle, .circle2, .circle4 {
        height: 300px;
        width: 100%;
        max-width: 300px;
    }

    .circle img, .circle2 img, .circle4 img, {
        height: 140%;
        width: 100%;
        top: 0; /* Eliminar el desplazamiento */  
        position: relative; 
    }
    .info, .info2 {
        text-align: center;
        margin: 0 auto;
        max-width: 90%;
    }
    .botones {
        flex-direction: row;
        align-items: center;
        gap: 20px;
        /*padding: 20px 0;*/
    }
    .btnn, .btn1, .btn3 {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 5px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    min-width: 150px;
}
.container, .registro {
        flex-direction: column;
        align-items: center;
    }

    .left {
        padding-right: 0;
        text-align: center;
        margin-bottom: 20px;
    }
.registro {
    max-width: 720px;
}
.faq-grid {
            grid-template-columns: 1fr;
        }
}
@media screen and (max-width: 480px) {
    input, select, textarea, button {
        font-size: 14px;
        padding: 10px;
    }
}
  </style>