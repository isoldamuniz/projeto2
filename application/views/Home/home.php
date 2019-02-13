<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>
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
  <?php $this->load->view('footer.php'); ?>
</html>