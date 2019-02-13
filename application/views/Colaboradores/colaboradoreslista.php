<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
  <?php $this->load->view('header.php'); ?>
    
    <!-- Painel principal -->

    <div class="unit-5 overlay" style="background-image: url(<?=base_url('assets/images/hero_bg_3.jpg')?>);">
      <div class="container text-center">
        <h2 class="mb-0">Lista de colaboradores</h2>
        <p class="mb-0 unit-6"><a href="<?=base_url('')?>">Início</a> <span class="sep">></span> <a href="<?=base_url('Empresas/visualizar/' . $this->uri->segment(4))?>">Empresa</a> <span class="sep">></span><span>Lista de colaboradores</span></p>
      </div>
    </div>

    <!-- Lista de colaboradores -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-start text-left mb-5">
            <div class="col-md-9" data-aos="fade">
            <?php if (isset($success)): ?>
                <span class="text-gray-500"><?=$success?></span>
            <?php endif; ?>
            <?php if (isset($insuccess)): ?>
                <span class="text-gray-500"><?=$insuccess?></span>
            <?php endif; ?>
                <h2 class="font-weight-bold text-black"><?= urldecode($this->uri->segment(3))?></h2>
            </div>
        </div>

        <div>
        <p class="mt-5"><a href="<?=base_url('Colaboradores/cadastrar_colaboradores/' . $this->uri->segment(3) . '/' . $this->uri->segment(4))?>" class="btn btn-primary  py-2 px-4">Cadastrar</a>
        </div>
        
        <?php if ($colaboradores == FALSE): ?>
            <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                    <h2 class="mr-3 text-black h4">Nenhum colaborador encontrado</h2>
               </div>
            </div>
        <?php else: ?>
            
            <div class="row" data-aos="fade">
            <div class="col-md-12">
            <section class="panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Sexo</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($colaboradores as $c): ?>
                  <tr>
                    <td><?= $c->nome; ?></td>
                    <td><?= $c->CPF; ?></td>
                    <td><?= $c->email; ?></td>
                    <td><?= $c->sexo; ?></td>
                    <td align="center">
                        <a href="<?=base_url('Colaboradores/editar/' . $this->uri->segment(3)  . '/' . $this->uri->segment(4) .  '/' . $c->Id_colaborador)?>" class="btn btn-secondary  py-2 px-4">Editar</a>
                        <a href="<?=base_url('Colaboradores/apagar/' . $this->uri->segment(3)  . '/' . $this->uri->segment(4) . '/' . $c->Id_colaborador)?>" class="btn btn-black  py-2 px-4">Excluir</a></p>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </section>
            </div>
            </div>

        <?php endif; ?>
      </div>
    </div>    
  <?php $this->load->view('footer.php'); ?>
</html>