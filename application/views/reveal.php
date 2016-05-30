<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 27/05/2016
 * Time: 10:56
 */
switch ($tela):
    case 'programador';
        echo '<div class="columns medium-12 medium-centered">';
        echo '<div class="columns medium-12 medium-centered" id="erros"></div>';
        //echo form_open('',array('name'=>'teste','class'=>'custom','onsubmit'=>'teste()'));
        echo form_fieldset('Cadastro Programador',array('class' => 'fieldset'));
        echo validation_errors('<p>','</p>');
        echo form_label('Nome Programador:');
        echo form_input(array('id'=>'vnome__programador','name'=>'vnome__programador','placeholder'=>'Nome Programador'),
            set_value('vnome__programador'),'autofocus');
        echo form_label('Login:');
        echo form_input(array('id'=>'vlogin_programador','placeholder'=>'Login'),set_value('vlogin_programador'));
        echo form_label('Senha:');
        echo form_password(array('id'=>'vsenha_programador','placeholder'=>'Senha'),set_value('vsenha_programador'));
        echo form_label('Repita Senha:');
        echo form_password(array('id'=>'vsenha_programador1','placeholder'=>'Repita Senha'));
        echo '<div class="row">';
        echo '<div class="columns medium-5 text-justify">';
        echo form_button(array('id'=>'saveprog','class'=> 'button radius right','onclick'=>'salvaProgramador()'),'Cadastrar');
        echo '</div>';
        echo '<div class="columns medium-7 text-right">';
        echo form_button(array('name'=>'exit','class'=> 'button radius right'),'Cancelar','data-close');
        echo '</div>';
        echo '</div>';
        echo form_fieldset_close();
        echo '</div>';
        break;
    case 'programas':
        echo '<div class="columns medium-12 medium-centered">';
        echo '<div class="columns medium-12 medium-centered" id="errosa"></div>';
        echo form_fieldset('Cadastro Programas',array('class' => 'fieldset'));
        erros_validacao();
        echo form_label('Nome Programa:');
        echo form_input(array('name'=>'nomeprograma','placeholder'=>'Nome Programa'),
            set_value('vnome____programa'),'autofocus');
        echo '<div class="row">';
        echo '<div class="columns medium-5 text-left">';
        echo form_button(array('name'=>'logar','class'=> 'button radius right','onclick'=>'salvaPrograma()'),'Cadastrar');
        echo '</div>';
        echo '<div class="columns medium-7 text-right">';
        echo form_button(array('name'=>'logar2','class'=> 'button radius right'),'Cancelar','data-close');
        echo '</div>';
        echo '</div>';
        echo form_fieldset_close();
        echo '</div>';
        break;
    case 'status':
        echo '<div class="columns medium-12 medium-centered">';
        echo form_fieldset('Cadastro Status',array('class' => 'fieldset'));
        erros_validacao();
        echo form_label('Status:');
        echo form_input(array('name'=>'vnome____programa','placeholder'=>'Status'),
            set_value('status'),'autofocus');
        echo '<div class="row">';
        echo '<div class="columns medium-5 text-left">';
        echo form_button(array('name'=>'logar','class'=> 'button radius right'),'Cadastrar');
        echo '</div>';
        echo '<div class="columns medium-7 text-right">';
        echo form_button(array('name'=>'logar1','class'=> 'button radius right'),'Cancelar','data-close');
        echo '</div>';
        echo '</div>';
        echo form_fieldset_close();
        echo '</div>';
        break;
    default:
        echo '<div class="Alert-box alert"><p>A tela solicitada não existe</p></div>';
        break;
endswitch;


