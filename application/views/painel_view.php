<!doctype html>
<html class="no-js" lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($titulo)): ?> {titulo} |  <?php endif;?>{titulo_padrao}</title>
    {headerinc}
  </head>
  <body>
  <div class="tiny reveal" id="programador" data-reveal>
              <?php
              echo '<div class="columns medium-12 medium-centered">';
              echo form_open('usuarios/valida',array('class'=>'custom loginform'));
              echo form_fieldset('Cadastro Programador',array('class' => 'fieldset'));
              erros_validacao();
              echo form_label('Nome Programador:');
              echo form_input(array('name'=>'vnome____programador','placeholder'=>'Nome Programador'),
                  set_value('vnome____programador'),'autofocus');
              echo form_label('Login:');
              echo form_input(array('name'=>'vlogin_programador','placeholder'=>'Login'),set_value('vlogin_programador'));
              echo form_label('Senha:');
              echo form_password(array('name'=>'vsenha_programador','placeholder'=>'Senha'),set_value('vsenha_programador'));
              echo '<div class="row">';
              echo '<div class="columns medium-5 text-justify">';
              echo form_submit(array('name'=>'logar','class'=> 'button radius right'),'Cadastrar');
              echo '</div>';
              echo '<div class="columns medium-7 text-right">';
              echo form_button(array('name'=>'logar','class'=> 'button radius right'),'Cancelar','data-close');
              echo '</div>';
              echo '</div>';
              echo form_fieldset_close();
              echo '</div>';
          ?>
  </div>
  <div class="tiny reveal" id="programas" data-reveal>
      <?php
      echo '<div class="columns medium-12 medium-centered">';
      echo form_open('usuarios/valida',array('class'=>'custom loginform'));
      echo form_fieldset('Cadastro Programas',array('class' => 'fieldset'));
      erros_validacao();
      echo form_label('Nome Programa:');
      echo form_input(array('name'=>'vnome____programa','placeholder'=>'Nome Programa'),
          set_value('vnome____programador'),'autofocus');
      echo '<div class="row">';
      echo '<div class="columns medium-5 text-left">';
      echo form_submit(array('name'=>'logar','class'=> 'button radius right'),'Cadastrar');
      echo '</div>';
      echo '<div class="columns medium-7 text-right">';
      echo form_button(array('name'=>'logar','class'=> 'button radius right'),'Cancelar','data-close');
      echo '</div>';
      echo '</div>';
      echo form_fieldset_close();
      echo '</div>';
      ?>
  </div>
  <div class="tiny reveal" id="status" data-reveal>
      <?php
      echo '<div class="columns medium-12 medium-centered">';
      echo form_open('usuarios/valida',array('class'=>'custom loginform'));
      echo form_fieldset('Cadastro Status',array('class' => 'fieldset'));
      erros_validacao();
      echo form_label('Status:');
      echo form_input(array('name'=>'vnome____programa','placeholder'=>'Status'),
          set_value('vnome____programador'),'autofocus');
      echo '<div class="row">';
      echo '<div class="columns medium-5 text-left">';
      echo form_submit(array('name'=>'logar','class'=> 'button radius right'),'Cadastrar');
      echo '</div>';
      echo '<div class="columns medium-7 text-right">';
      echo form_button(array('name'=>'logar','class'=> 'button radius right'),'Cancelar','data-close');
      echo '</div>';
      echo '</div>';
      echo form_fieldset_close();
      echo '</div>';
      ?>
  </div>
      <button class="close-button" data-close aria-label="Close modal" type="button">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <?php
        if(esta_logado(false)):;?>
      <div class="row">
        <div class="columns medium-6 text-center">
          <a href="<?php echo base_url('painel'); ?>" class="teste"><h1>Tarefas</h1></a>
        </div>
          <div class="columns medium-6 text-right">
              Logado como <strong><?php echo $this->session->userdata('user_nome')?></strong> <a href="<?php echo base_url('usuarios/deslogar');?>">sair</a>
          </div>
      </div>
      <div class="row">
          <div class="columns medium-12 text-left">
              <div class="columns medium-4 text-left">

                  <?php
                      $data= array();
                      foreach ($users as $row):$data = array_merge($data,array($row->nid____programador=>$row->vnome__programador));endforeach;
                      echo form_button(array('name'=>'logar','class'=> 'button radius right','data-open'=>'programador'),'+');
                  ?>
                  <div class="columns medium-10 text-left">
                      <?php echo  form_dropdown('usuario',$data,01); ?>
                  </div>
              </div>
              <div class="columns medium-4 text-left">
                  <?php
                      $data= array();
                      foreach ($programas as $row):$data = array_merge($data,array($row->nid____programa=>$row->vnome____programa));endforeach;
                      echo form_button(array('name'=>'logar','class'=> 'button radius right','data-open'=>'programas'),'+');
                  ?>
                  <div class="columns medium-10 text-left">
                      <?php echo form_dropdown('programas',$data,01); ?>
                  </div>
              </div>
              <div class="columns medium-4 text-left">
                  <?php
                  $data= array();
                  foreach ($situacao as $row):$data = array_merge($data,array($row->nid____status =>$row->vdescristatus));endforeach;
                  echo form_button(array('name'=>'logar','class'=> 'button radius right','data-open'=>'status'),'+');
                  ?>
                  <div class="columns medium-10 text-left">
                      <?php echo form_dropdown('situacao',$data,01);; ?>
                  </div>
              </div>
          </div>
      </div>
            <div class="row">
                <?php
                $template = array(
                    'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
                );
                $this->table->set_template($template);
                $this->table->set_heading('Programador','Programa','Descrição','Status','Prazo');
                foreach ($tarefas as $linha):
                    $this->table->add_row($linha->vnome__programador,
                                         $linha->vnome____programa,
                                         $linha->vtitulotodolist,
                                         $linha->vdescristatus,
                                         $linha->dprazo_todolist);
                endforeach;
                echo $this->table->generate();

                ?>
            </div>
  <?php endif ?>
  <div class="row paineladm">

  {conteudo}
  </div>
  <script scr="js/foundation.min.js"></script>
  <div class="row rodape">
    <div ="columns medium-6 medium-centered">
      {rodape}
    </div>
  </div>
  {footerinc}
  </body>
</html>