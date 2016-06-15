<?php
defined('BASEPATH') OR exit('No direct script access allowed');

switch ($tela):
<<<<<<< HEAD

    case 'programador'; ?>

        <div class="row">
            <div class="columns medium-12">
                <button class="close-button" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Cadastro de Programador</h4>
                <hr/>
                <div id="erros"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vnome__programador" class="text-right middle">Nome do Programador</label>
            </div>
            <div class="small-9 columns">
                <?= form_input(array('id'=>'vnome__programador','name'=>'vnome__programador','placeholder'=>'Nome Programador'), set_value('vnome__programador'),'autofocus'); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vlogin_programador" class="text-right middle">Login</label>
            </div>
            <div class="small-9 columns">
                <?= form_input(array('name' => 'vlogin_programador', 'id'=>'vlogin_programador','placeholder'=>'Login'),set_value('vlogin_programador'));?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vsenha_programador" class="text-right middle">Senha</label>
            </div>
            <div class="small-9 columns">
                <?= form_password(array('name' => 'vsenha_programador', 'id'=>'vsenha_programador','placeholder'=>'Senha'),set_value('vsenha_programador'));?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vsenha_programador" class="text-right middle">Repita Senha</label>
            </div>
            <div class="small-9 columns">
                <?= form_password(array('name' => 'vsenha_programador1', 'id'=>'vsenha_programador1','placeholder'=>'Repita Senha'));?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns"></div>
            <div class="small-9 columns">
                <?= form_button(array('id'=>'saveprog','class'=> 'button left hollow','onclick'=>'salvaProgramador()'),'Cadastrar');?>
                <?= form_button(array('name'=>'exit','class'=> 'alert button hollow'),'Cancelar','data-close');?>
            </div>
        </div>

        <?php break;

    case 'programas': ?>

        <div class="row">
            <div class="columns medium-12">
                <button class="close-button" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Cadastro de Programas</h4>
                <hr/>
                <div id="errosa"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vnome__programador" class="text-right middle">Nome do Programa</label>
            </div>
            <div class="small-9 columns">
                <?= form_input(array('name'=>'vnome____programa', 'id' => 'vnome____programa', 'placeholder' => 'Nome Programa'), set_value('vnome____programa'), 'autofocus'); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns"></div>
            <div class="small-9 columns">
                <?= form_button(array('name' => 'logar', 'class' => 'button hollow', 'onclick' => 'salvaPrograma()'), 'Cadastrar'); ?>
                <?= form_button(array('name' => 'logar2', 'class' => 'alert button hollow'), 'Cancelar', 'data-close'); ?>
            </div>
        </div>

        <?php break;

    case 'status': ?>

        <div class="row">
            <div class="columns medium-12">
                <button class="close-button" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Cadastro de Status</h4>
                <hr/>
                <div id="errosa"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vdescristatus" class="text-right middle">Status</label>
            </div>
            <div class="small-9 columns">
                <?= form_input(array('name'=>'vdescristatus', 'id' => 'vdescristatus', 'placeholder' => 'Status'),set_value('status'),'autofocus'); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns"></div>
            <div class="small-9 columns">
                <?= form_button(array('name' => 'status', 'class' => 'button hollow', 'onclick' => 'salvaStatus()'), 'Cadastrar'); ?>
                <?= form_button(array('name' => 'logar1', 'class' => 'alert button hollow'), 'Cancelar', 'data-close'); ?>
            </div>
        </div>

        <?php break;

    case 'atividade': ?>

        <div class="row">
            <div class="columns medium-12">
                <button class="close-button" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Cadastro de Atividade</h4>
                <hr/>
                <div id="errossa"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="nid____programador" class="text-right middle">Programador</label>
            </div>
            <div class="small-9 columns">
                <?= form_dropdown('nid____programador', null, 01); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="nid____programa" class="text-right middle">Programa</label>
            </div>
            <div class="small-9 columns">
                <?= form_dropdown('nid____programa', null, 01); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="nstate_todolist" class="text-right middle">Situação</label>
            </div>
            <div class="small-9 columns">
                <?= form_dropdown('nstate_todolist', null, 01); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label class="text-right middle">Lançamento / Prazo</label>
            </div>
            <div class="small-9 columns">
                <div class="row">
                    <div class="columns medium-6">
                        <input type="date" id="dtlancamtodolist" name="bday" value="<?= date("Y-m-d") ?>" readonly>
                    </div>
                    <div class="columns medium-6">
                        <input type="date" id="dprazo_todolist" name="bday" value="<?= date("Y-m-d")?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vtitulotodolist" class="text-right middle">Título</label>
            </div>
            <div class="small-9 columns">
                <?= form_input(array('name' => 'vtitulotodolist', 'id' => 'vtitulotodolist', 'placeholder' => 'Título'), set_value('titulo')); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label for="vdescritodolist" class="text-right middle">Descrição</label>
            </div>
            <div class="small-9 columns">
                <?= form_textarea(array('name' => 'vdescritodolist', 'id' => 'vdescritodolist', 'placeholder' => 'Descrição', 'rows' => '10'), set_value('titulo')); ?>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns"></div>
            <div class="small-9 columns">
                <input type="hidden" id="idtarefa" value="">
                <?= form_button(array('name' => 'status', 'class' => 'button hollow', 'onclick' => 'salvaAtividade()'), 'Cadastrar'); ?>
                <?= form_button(array('name' => 'logar1', 'class' => 'alert button hollow'), 'Cancelar', 'data-close'); ?>
            </div>
        </div>

        <?php break;

    default: ?>
        <div class="row">
            <div class="medium-12 columns">
                <div class="Alert-box alert">
                    <p>A tela solicitada não existe</p>
                </div>
            </div>
        </div>

        <?php break;
=======
    case 'programador';
        echo '<div class="columns medium-12 medium-centered">';
        echo '<div class="columns medium-12 medium-centered" id="erros"></div>';
        //echo form_open('',array('name'=>'teste','class'=>'custom','onsubmit'=>'teste()'));
        echo form_fieldset('Cadastro Programador',array('class' => 'fieldset'));
        echo form_label('Nome Programador:');
        echo form_input(array('id'=>'vnome__programador','name'=>'vnome__programador','placeholder'=>'Nome Programador'),
            set_value('vnome__programador'),'autofocus');
        echo form_label('Login:');
        echo form_input(array('id'=>'vlogin_programador','placeholder'=>'Login'),set_value('vlogin_programador'));
        echo form_label('Senha:');
        echo form_password(array('id'=>'vsenha_programador','placeholder'=>'Senha'),set_value('vsenha_programador'));
        echo form_label('Repita Senha:');
        echo form_password(array('id'=>'vsenha_programador1','placeholder'=>'Repita Senha'));
        echo '<div class="expanded button-group">';
        echo form_button(array('id'=>'saveprog','class'=> 'button left','onclick'=>'salvaProgramador()'),'Cadastrar');
        echo form_button(array('name'=>'exit','class'=> 'alert button'),'Cancelar','data-close');
        echo '</div>';
        echo form_fieldset_close();
        echo '</div>';
        break;
    case 'programas':
        echo '<div class="columns medium-12 medium-centered">';
        echo '<div class="columns medium-12 medium-centered" id="errosa"></div>';
        echo form_fieldset('Cadastro Programas',array('class' => 'fieldset'));
        echo form_label('Nome Programa:');
        echo form_input(array('id'=>'vnome____programa','placeholder'=>'Nome Programa'),
            set_value('vnome____programa'),'autofocus');
        echo '<div class="expanded button-group">';
        echo form_button(array('name'=>'logar','class'=> 'button ','onclick'=>'salvaPrograma()'),'Cadastrar');
        echo form_button(array('name'=>'logar2','class'=> 'alert button'),'Cancelar','data-close');
        echo '</div>';
        echo form_fieldset_close();
        echo '</div>';
        break;
    case 'status':
        echo '<div class="columns medium-12 medium-centered">';
        echo '<div class="columns medium-12 medium-centered" id="erross"></div>';
        echo form_fieldset('Cadastro Status',array('class' => 'fieldset'));
        echo form_label('Status:');
        echo form_input(array('id'=>'vdescristatus','placeholder'=>'Status'),
            set_value('status'),'autofocus');
        echo '<div class="expanded button-group">';
        echo form_button(array('name'=>'status','class'=> 'button','onclick'=>'salvaStatus()'),'Cadastrar');
        echo form_button(array('name'=>'logar1','class'=> 'alert button'),'Cancelar','data-close');
        echo '</div>';
        echo form_fieldset_close();
        echo '</div>';
        break;
    case 'atividade':
        echo '<div class="columns medium-12 medium-centered">';
        echo '<div class="columns medium-12 medium-centered" id="errossa"></div>';
        echo form_fieldset('Cadastro Atividade',array('class' => 'fieldset'));
        echo '<div class="row expanded">';
        echo '<div class="columns medium-12 text-left">';
        echo '<div class="columns medium-2 text-left">';
        echo form_label('Programador:');
        echo  form_dropdown('nid____programador',null,01);
        echo '</div>';
        echo '<div class="columns medium-2 text-left">';
        echo form_label('Programa:');
        echo form_dropdown('nid____programa',null,01);
        echo '</div>';
        echo '<div class="columns medium-3 text-left">';
        echo form_label('Situação:');
        echo form_dropdown('nstate_todolist',null,01);
        echo '</div>';
        echo '<div class="columns medium-2 text-left">';
        echo form_label('Lançamento:');
        echo '<input type="date" id="dtlancamtodolist" name="bday" value="'.date("Y-m-d").'"readonly>';
        echo '</div>';
        echo '<div class="columns medium-3 text-left">';
        echo form_label('Prazo:');
        echo '<input type="date" id="dprazo_todolist" name="bday" value="'.date("Y-m-d").'">';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="columns medium-12 text-left">';
        echo form_label('Título:');
        echo form_input(array('id'=>'vtitulotodolist','placeholder'=>'Título'),set_value('titulo'));
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="columns medium-12 text-left">';
        echo form_label('Descrição:');
        echo form_textarea(array('id'=>'vdescritodolist','placeholder'=>'Descrição'),set_value('titulo'));
        echo '</div>';
        echo '</div>';
        echo '<div class="expanded button-group">';
        echo form_button(array('name'=>'status','class'=> 'button','onclick'=>'salvaAtividade()'),'Cadastrar');
        echo form_button(array('name'=>'logar1','class'=> 'alert button'),'Cancelar','data-close');
        echo '</div>';
        echo '<input type="hidden" id="idtarefa" value="">';
        echo form_fieldset_close();
        break;
    default:
        echo '<div class="Alert-box alert"><p>A tela solicitada não existe</p></div>';
        break;
>>>>>>> refs/remotes/origin/master
endswitch;


