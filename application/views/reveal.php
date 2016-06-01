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
        echo '<div class="row">';
        echo '<div class="columns medium-12 text-left">';
        echo '<div class="columns medium-3 text-left">';
        $data= array();
        foreach ($users as $row){
            $data = array_merge($data,array($row->nid____programador=>$row->vnome__programador));
        }
        echo form_label('Programador:');
        echo  form_dropdown('nid____programador',$data,01);
        echo '</div>';
        echo '<div class="columns medium-3 text-left">';
        $data= array();
        foreach ($programas as $row){
            $data = array_merge($data,array($row->nid____programa=>$row->vnome____programa));
        }
        echo form_label('Programa:');
        echo form_dropdown('nid____programa',$data,01);
        echo '</div>';
        echo '<div class="columns medium-3 text-left">';
        $data= array();
        foreach ($situacao as $row) {
            $data = array_merge($data, array($row->nid____status => $row->vdescristatus));
        }
        echo form_label('Situação:');
        echo form_dropdown('nstate_todolist',$data,01);
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
        echo form_fieldset_close();
        break;
    default:
        echo '<div class="Alert-box alert"><p>A tela solicitada não existe</p></div>';
        break;
endswitch;


