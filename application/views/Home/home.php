<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <head>
    <title>befind</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="'https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500')"> 
    <link rel="stylesheet" href="<?=base_url('assets/fonts/icomoon/style.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-datepicker.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/animate.css')?>">
    
    
    <link rel="stylesheet" href="<?=base_url('assets/fonts/flaticon/font/flaticon.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/fl-bigmug-line.css')?>">
  
    <link rel="stylesheet" href="<?=base_url('assets/css/aos.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    
  </head>
  <body>
  
  <div class="site-wrap">
    
  <!-- Menu -->
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="<?=base_url('')?>" class="text-black h2 mb-0">be<strong>find</strong></a></h1>
          </div>

          <div class="col-10 col-xl-10 d-none d-xl-block">
            <nav class="site-navigation text-right" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="<?=base_url('')?>">Início</a></li>
                <li><a href="<?=base_url('Empresas/listar_empresas')?>">Empresas</a></li>
                <li><a href="<?=base_url('Empresas/cadastrar')?>"><span class="rounded bg-primary py-2 px-3 text-white">Cadastre-se</span></a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right d-block">
            
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

    <!-- Painel principal -->

    <div class="site-blocks-cover" style="background-image: url(<?=base_url('assets/images/hero_bg_1.jpg')?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row row-custom align-items-center">
          <div class="col-md-10">
            <h1 class="mb-2 text-black w-75"><span class="font-weight-bold">Conexão</span> entre empresas e seus consultores</h1>
          </div>
          <div class="col-md-9">
            <h2 class="font-weight-bold text-black">Cadastre sua empresa e seus colaboradores gratuitamente</h2>
          </div>
          <div class="col-md-3" >
            <a href="<?=base_url('Empresas/cadastrar')?>" class="btn btn-primary py-3 btn-block"><span class="h5">Cadastre-se</span></a>
          </div>
        </div>
      </div>
    </div>  
    
    <!-- Quem somos -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-start text-left mb-5">
          <div class="col-md-9" data-aos="fade">
            <h2 class="font-weight-bold text-black">Quem somos</h2>
            <h2 class="h5">Incentivamos negócios entre empresas e seus consultores</h2>
          </div>
          <div class="col-md-8" data-aos="fade" class="unit-3-body">
            <p>Na nossa plataforma você encontrará empresas de diversos ramos e seus colaboradores. O objetivo é ativar negócios entre elas.</p>
          </div>
        </div>
      </div>
    </div>    

    <!-- Porque escolher a befind -->

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-6" data-aos="fade" >
            <h2 class="text-black">Porquê be<strong>find</strong> </h2>
          </div>
        </div>
        <div class="row hosting">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">

            <div class="unit-3 h-100 bg-white">
              
              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <div class="unit-3-icon-wrap mr-4">
                  <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                  </svg><span class="unit-3-icon icon fl-bigmug-line-portfolio23"></span>
                </div>
                <h2 class="h5">Milhões de empresas cadastradas</h2>
              </div>
              <div class="unit-3-body">
                <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>

    <!-- Rodapé -->

    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-lg-3">
            <h3 class="footer-heading mb-4">Contate-nos</h3>
            <ul class="list-unstyled">
              <li>
                <span class="d-block text-white">Endereço</span>
                Avenida Gandhi, 425
              </li>
              <li>
                <span class="d-block text-white">Telefone</span>
                84 99212-4452
              </li>
              <li>
                <span class="d-block text-white">Email</span>
                contato@befind.com
              </li>
            </ul>            
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="<?=base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery-migrate-3.0.1.min.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery-ui.js')?>"></script>
  <script src="<?=base_url('assets/js/popper.min.js')?>"></script>
  <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('assets/js/owl.carousel.min.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery.stellar.min.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery.countdown.min.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery.magnific-popup.min.js')?>"></script>
  <script src="<?=base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?=base_url('assets/js/aos.js')?>"></script>

  <script src="<?=base_url('assets/js/main.js')?>"></script>
    
  </body>
</html>