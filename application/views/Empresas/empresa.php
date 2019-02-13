<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>
    
    <!-- Painel principal -->

    <div class="unit-5 overlay" style="background-image: url(<?=base_url('assets/images/hero_bg_2.jpg')?>);">
      <div class="container text-center">
        <h2 class="mb-0">Empresa</h2>
        <p class="mb-0 unit-6"><a href="<?=base_url('')?>">Início</a> <span class="sep">></span> <a href="<?=base_url('Empresas/listar_empresas')?>">Lista de empresas</a> <span class="sep">></span> <span>Empresa</span></p>
      </div>
    </div>

    <!-- Detalhes da empresa -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
            <div class="col-md-12 col-lg-12 mb-5">
                <div class="p-5 bg-white">
                    <?php if ($empresaid == FALSE): ?>

                    <div class="mb-4 mb-md-5 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h4">Nenhuma empresa foi encontrada</h2>
                        </div>
                    </div>

                    <?php else: ?>

                    <div class="mb-4 mb-md-5 mr-5">
                        <?php if (isset($success)): ?>
                          <span class="text-gray-500"><?=$success?></span>
                        <?php endif; ?>
                        <?php if (isset($insuccess)): ?>
                          <span class="text-gray-500"><?=$insuccess?></span>
                        <?php endif; ?>
                        <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h4"><?= $empresaid['nome'] ?></h2>
                        </div>
                    </div>

                    <p>CNPJ: <?= $empresaid['CNPJ'] ?></p>
                    <p>E-mail: <?= $empresaid['email'] ?></p>

                    <p class="mt-5"><a href="<?=base_url('Colaboradores/listar_colaboradores/' . urlencode($empresaid['nome']) . '/' . $empresaid['Id_empresa'])?>" class="btn btn-primary  py-2 px-4">Ver colaboradores</a>
                    <a href="<?=base_url('Empresas/editar/' . $empresaid['Id_empresa'])?>" class="btn btn-secondary  py-2 px-4">Editar</a>
                    <a href="<?=base_url('Empresas/apagar/' . $empresaid['Id_empresa'])?>" class="btn btn-black  py-2 px-4">Excluir</a></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
      </div>
    </div>
  <?php $this->load->view('footer.php'); ?>
</html>