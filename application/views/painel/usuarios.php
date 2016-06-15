<?php
defined('BASEPATH') OR exit('No direct script access allowed');

switch ($tela):
<<<<<<< HEAD
    case 'login': ?>
        <div class="row">
            <div class="columns medium-4 medium-centered">

                <div class="text-center">
                    <img src="<?= base_url('img/login-icon.png')?>" width="150px" />
                </div>

                <?= form_open('usuarios/valida',array('class'=>'custom loginform')); ?>
                <?php erros_validacao(); ?>

                <div class="input-group">
                    <span class="input-group-label"><i class="mdi mdi-account-circle"></i></span>
                    <?= form_input(array('name'=>'usuario', 'class' => 'input-group-field', 'placeholder' => 'Usuário'),set_value('usuario'),'autofocus'); ?>
                </div>

                <div class="input-group">
                    <span class="input-group-label"><i class="mdi mdi-key"></i></span>
                    <?= form_password(array('name'=>'senha', 'class' => 'input-group-field', 'placeholder' => 'Senha'),set_value('senha')); ?>
                </div>

                <?=  form_submit(array('name'=>'logar','class'=> 'button hollow expanded'),'Login'); ?>
            </div>
        </div>

        <script>
            $('body').css({
                "background-image": "url('<?= base_url('img/login-screen.jpg') ?>')",
                "background-size": "cover",
                "background-repeat": "none",
                "overflow": "hidden",
                "margin-top": "2em"
            });
        </script>


        <?php break;

    default: ?>
        <div class="Alert-box alert"><p>A tela solicitada não existe</p></div>
        <?php break;
=======
    case 'login':

        echo '<div class="row">';
        echo '<div class="columns medium-4 medium-centered">';
        echo form_open('usuarios/valida',array('class'=>'custom loginform'));
        echo form_fieldset('Identifique-se',array('class' => 'fieldset'));
        erros_validacao();
        echo form_label('Usuário');
        echo form_input(array('name'=>'usuario'),set_value('usuario'),'autofocus');
        echo form_label('Senha');
        echo form_password(array('name'=>'senha'),set_value('senha'));
        echo '<div class="row">';
        echo '<div class="columns medium-8">';
        echo '</div>';
        echo '<div class="columns medium-4 text-right">';
        echo form_submit(array('name'=>'logar','class'=> 'button radius right'),'Login');
        echo '</div>';
        echo '</div>';
        echo form_fieldset_close();
        echo '</div>';
        echo '</div>';
        break;
        break;
    default:
        echo '<div class="Alert-box alert"><p>A tela solicitada não existe</p></div>';
        break;
>>>>>>> refs/remotes/origin/master
endswitch;