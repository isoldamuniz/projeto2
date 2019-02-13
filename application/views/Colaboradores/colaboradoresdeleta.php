<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>

    <!-- Painel principal -->
    <div class="unit-5 overlay" style="background-image: url(<?=base_url('assets/images/hero_bg_3.jpg')?>);">
      <div class="container text-center">
        <h2 class="mb-0">Excluir colaborador</h2>
        <p class="mb-0 unit-6"><a href="<?=base_url('')?>">Início</a> <span class="sep">></span> <a href="<?=base_url('Empresas/visualizar/' . $this->uri->segment(4))?>">Empresa</a> <span class="sep">></span> <a href="<?=base_url('Colaboradores/listar_colaboradores/' .$this->uri->segment(3) . '/'. $this->uri->segment(4))?>">Lista de colaboradores</a> <span class="sep">></span> <span>Excluir colaborador</span></p>
      </div>
    </div>

    <!-- Formulário para editar colaborador -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-12 mb-5">
          
            <form action="<?=base_url('Colaboradores/excluir/' . $this->uri->segment(3) . '/' . $colaboradorid['empresa_id'])?>" class="p-5 bg-white" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                    <p><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Nome</label>
                  <input type="text" id="fullname" name="nome" class="form-control" value="<?=$colaboradorid['nome']?>" disabled>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">CPF</label>
                  <input type="text" id="fullname" name="cpf" class="form-control" value="<?=$colaboradorid['CPF']?>" disabled>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Endereço de e-mail</label>
                  <input type="text" id="fullname" name="email" class="form-control" value="<?=$colaboradorid['email']?>" disabled>
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="fullname">Sexo</label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                    <label for="option-gender-1">
                        <input type="radio" id="option-gender-1" value="Feminino" <?php if($colaboradorid['sexo']=='Feminino'){ echo "checked='true'";} ?> name="sexo" disabled> Feminino
                    </label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                    <label for="option-gender-1">
                        <input type="radio" id="option-gender-1" value="Masculino" <?php if($colaboradorid['sexo']=='Masculino'){ echo "checked='true'";} ?> name="sexo" disabled> Masculino
                    </label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                    <label for="option-gender-1">
                        <input type="radio" id="option-gender-1" value="Outro" <?php if($colaboradorid['sexo']=='Outro'){ echo "checked='true'";} ?> name="sexo" disabled> Outro
                    </label>
                </div> 
                
            </div>

            <input type="hidden" name="empresa_id" value="<?=$colaboradorid['empresa_id']?>">
            <input type="hidden" name="id_colaborador" value="<?=$colaboradorid['Id_colaborador']?>">

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Apagar" class="btn btn-primary  py-2 px-5">
                  <a href="<?=base_url('Colaboradores/listar_colaboradores/'. $this->uri->segment(3) . '/' . $colaboradorid['empresa_id'])?>" class="btn btn-black  py-2 px-4">Cancelar</a></p>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  <?php $this->load->view('footer.php'); ?>
</html>