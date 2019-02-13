<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>

    <!-- Painel principal -->

    <div class="unit-5 overlay" style="background-image: url(<?=base_url('assets/images/hero_bg_2.jpg')?>);">
      <div class="container text-center">
        <h2 class="mb-0">Excluir empresa</h2>
        <p class="mb-0 unit-6"><a href="<?=base_url('')?>">Início</a> <span class="sep">></span> <a href="<?=base_url('Empresas/visualizar/' . $this->uri->segment(3))?>">Empresa</a> <span class="sep">></span> <span>Excluir empresa</span></p>
      </div>
    </div>

    <!-- Formulário para apagar empresa -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-12 mb-5">
          
            <form action="<?=base_url('Empresas/excluir/')?>" class="p-5 bg-white" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                    <p><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Nome da empresa</label>
                  <input type="text" id="fullname" name="nome" class="form-control" value="<?=$empresaid['nome']?>" disabled>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">CNPJ</label>
                  <input type="text" id="fullname" name="cnpj" class="form-control" value="<?=$empresaid['CNPJ']?>" disabled>
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Endereço de e-mail</label>
                  <input type="text" id="fullname" name="email" class="form-control" value="<?=$empresaid['email']?>" disabled>
                </div>
              </div>

              <input type="hidden" name="id_empresa" value="<?=$empresaid['Id_empresa']?>">
              <p>Esta ação exclui todas as informações da empresa, inclusive seus colaboradores.</p>

              <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Apagar" class="btn btn-primary  py-2 px-5">
                    <a href="<?=base_url('Empresas/visualizar/' . $empresaid['Id_empresa'])?>" class="btn btn-black  py-2 px-4">Cancelar</a></p>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  <?php $this->load->view('footer.php'); ?>
</html>