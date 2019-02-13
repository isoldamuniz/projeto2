<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>

    <!-- Painel principal -->

    <div class="unit-5 overlay" style="background-image: url(<?=base_url('assets/images/hero_bg_4.jpg')?>);">
      <div class="container text-center">
        <h2 class="mb-0">Relatórios</h2>
        <p class="mb-0 unit-6"><a href="<?=base_url('')?>">Início</a> <span class="sep">></span> <span>Relatórios</span></p>
      </div>
    </div>

    <!-- Opções de relatórios -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-start text-left mb-5">
            <div class="col-md-9" data-aos="fade">
                <h2 class="font-weight-bold text-black">Gerar relatórios</h2>
            </div>
        </div>

        <div class="row" data-aos="fade">
            <div class="col-md-12">

                <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                    <div class="mb-4 mb-md-0 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">Todas as empresas cadastradas</h2>
                        </div>
                    </div>

                    <div class="ml-auto">
                        <a href="<?=base_url('Relatorios/listar_empresas')?>" target="_blank" class="btn btn-primary py-2">Ver</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row" data-aos="fade">
            <div class="col-md-12">

                <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                    <div class="mb-4 mb-md-0 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">Todas as colaboradoras cadastradas</h2>
                        </div>
                    </div>

                    <div class="ml-auto">
                        <a href="<?=base_url('Relatorios/listar_colaboradoras/')?>" target="_blank" class="btn btn-primary py-2">Ver</a>
                    </div>
                </div>

            </div>
        </div>
      </div>
    </div>    
  <?php $this->load->view('footer.php'); ?>
</html>