<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>

    <!-- Painel principal -->

    <div class="unit-5 overlay" style="background-image: url(<?=base_url('assets/images/hero_bg_2.jpg')?>);">
      <div class="container text-center">
        <h2 class="mb-0">Cadastre-se</h2>
        <p class="mb-0 unit-6"><a href="<?=base_url('')?>">Início</a> <span class="sep">></span> <a href="<?=base_url('Empresas/listar_empresas')?>">Empresas</a> <span class="sep">></span> <span>Cadastre-se</span></p>
      </div>
    </div>

    <!-- Formulário para gravar empresas -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-12 mb-5">
          
            <form action="<?=base_url('Empresas/salvar')?>" class="p-5 bg-white" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                    <p><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Nome da empresa</label>
                  <input type="text" id="fullname" name="nome" class="form-control" value="<?=set_value('nome')?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">CNPJ</label>
                  <input type="text" id="fullname" name="cnpj" class="form-control" value="<?=set_value('CNPJ')?>">
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Endereço de e-mail</label>
                  <input type="text" id="fullname" name="email" class="form-control" value="<?=set_value('email')?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Salvar" class="btn btn-primary  py-2 px-5">
                  <a href="<?=base_url('Empresas/')?>" class="btn btn-black  py-2 px-4">Voltar</a></p>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  <?php $this->load->view('footer.php'); ?>
</html>