<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <head>
    <title>befind</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
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

    <div class="unit-5 overlay" style="background-image: url(<?=base_url('assets/images/hero_bg_2.jpg')?>);">
      <div class="container text-center">
        <h2 class="mb-0">Lista de empresas</h2>
        <p class="mb-0 unit-6"><a href="<?=base_url('')?>">Início</a> <span class="sep">></span> <span>Lista de empresas</span></p>
      </div>
    </div>

    <!-- Lista de empresas -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-start text-left mb-5">
            <div class="col-md-9" data-aos="fade">
            <?php if (isset($success)): ?>
                <span class="text-gray-500"><?=$success?></span>
            <?php endif; ?>
                <h2 class="font-weight-bold text-black">Todas as empresas</h2>
            </div>
        </div>
        
        <?php if ($empresas == FALSE): ?>
            <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                    <h2 class="mr-3 text-black h4">Nenhuma empresa encontrada</h2>
               </div>
            </div>
        <?php else: ?>
            <?php foreach($empresas as $e): ?>
            <div class="row" data-aos="fade">
                <div class="col-md-12">

                    <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                        <div class="mb-4 mb-md-0 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4"><?= $e->nome; ?></h2>
                        </div>
                        </div>

                        <div class="ml-auto">
                            <a href="<?=base_url('Empresas/visualizar/' . $e->Id_empresa)?>" class="btn btn-primary py-2">Ver</a>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
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
  

  <<script src="<?=base_url('assets/js/main.js')?>"></script>
    
  </body>
</html>