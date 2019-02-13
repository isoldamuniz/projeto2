<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>

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

        <div class="row justify-content-start text-left mb-5">
            <div class="col-md-9">
                <a href="<?=base_url('Empresas/cadastrar')?>"><span class="rounded bg-primary py-2 px-3 text-white">Cadastre-se</span></a>
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
  <?php $this->load->view('footer.php'); ?>
</html>