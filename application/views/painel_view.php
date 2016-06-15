<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html class="no-js" lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <title><?php if (isset($titulo)): ?> {titulo} |  <?php endif; ?>{titulo_padrao}</title>
    {loadcss}
    {loadjquery}


</head>
<body>
<?php
if (esta_logado(false)):; ?>
    <div class="large reveal"  id="programador"  data-reveal data-animation-in="fade-in" data-animation-out="fade-out"></div>
    <div class="large reveal"  id="programas"    data-reveal data-animation-in="fade-in" data-animation-out="fade-out"></div>
    <div class="large reveal"  id="status"       data-reveal data-animation-in="fade-in" data-animation-out="fade-out"></div>
    <div class="large reveal"  id="atividade"    data-reveal data-animation-in="fade-in" data-animation-out="fade-out"></div>

    <header>
        <div class="title-bar" data-responsive-toggle="menu-principal" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Menu</div>
        </div>

        <div class="top-bar" id="menu-principal">
            <div class="row">
                <div class="columns medium-12">
                    <div class="top-bar-left">
                        <ul class="menu">
                            <li class="menu-text">
                                Logado como <strong><?= $this->session->userdata('user_nome') ?></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="top-bar-right">
                        <ul class="menu">
                            <li><?= form_button(array('name' => 'logar', 'class' => 'button secondary', 'onclick' => 'CarregaAtividade()'), '<i class="mdi mdi-lead-pencil mdi-1x"></i> Nova Tarefa'); ?></li>
                            <li>
                                <?= anchor(base_url('usuarios/deslogar'), '<i class="mdi mdi-logout mdi-1x"></i>Sair') ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section style="margin-top: 2em;">
        <div class="row">
            <div class="columns medium-4">
                <div class="input-group">
                    <span title="Programador" class="input-group-label"><i class="mdi mdi-account-plus mdi-1x"></i></span>
                    <?= form_dropdown(array('name' => 'programador', 'class' => 'input-group-field'), null, 01, 'onChange=CarregaDatabase()'); ?>
                    <div class="input-group-button">
                        <?= form_button(array('name' => 'logar', 'class' => 'button', 'data-open' => 'programador'), '+'); ?>
                    </div>
                </div>
            </div>
            <div class="columns medium-4">
                <div class="input-group">
                    <span title="Aplicação" class="input-group-label"><i class="mdi mdi-application mdi-1x"></i></span>
                    <?= form_dropdown(array('name' => 'programas', 'class' => 'input-group-field'), null, 01, 'onChange=CarregaDatabase()'); ?>
                    <div class="input-group-button">
                        <?= form_button(array('name' => 'logar', 'class' => 'button', 'data-open' => 'programas'), '+'); ?>
                    </div>
                </div>
            </div>
            <div class="columns medium-4">
                <div class="input-group">
                    <span title="Situação" class="input-group-label"><i class="mdi mdi-alert-outline mdi-1x"></i></span>
                    <?= form_dropdown(array('name' => 'situacao', 'class' => 'input-group-field'), null, 01, 'onChange=CarregaDatabase()'); ?>
                    <div class="input-group-button">
                        <?= form_button(array('name'=>'logar','class' => 'button','data-open'=>'status'),'+'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: 2em;">
        <div class="row">
            <div class="columns medium-12">
                <?php
                $template = array(
                    'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable responsive" id="myTable">'
                );
                $this->table->set_template($template);
                $this->table->set_heading('Programador', 'Programa', 'Descrição', 'Status', 'Prazo');
                echo $this->table->generate();
                ?>
            </div>
        </div>
    </section>

<?php endif ?>

<div class="row paineladm">
    <div class="columns medium-12">
        {conteudo}
    </div>
</div>

<footer>
    <div class="row">
        <div class="columns medium-12 text-center">
            {rodape}
        </div>
    </div>
</footer>

{loadjs}
<script src="<?= base_url('js/foundation.min.js') ?>"></script>
</body>

</html>