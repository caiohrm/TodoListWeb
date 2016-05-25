<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 27/04/2016
 * Time: 16:53
 */

class Painel extends  CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('sistema');
        init_painel();
    }

    public function index(){
        $this->inicio();
    }   
    public function inicio(){
        if(esta_logado(false)):
            $usuario = $this->usuarios->get_users()->result();
            $programa = $this->usuarios->get_programas()->result();
            $situacao = $this->usuarios->get_situac()->result();
            $tarefas = $this->usuarios->get_tarefas()->result();
            set_tema('tarefas',$tarefas);
            set_tema('users',$usuario);
            set_tema('programas',$programa);
            set_tema('situacao',$situacao);
            set_tema('titulo','Inicio');
            set_tema('rodape','<p>&copy; 2016 | todos os direitos reservados para Caio Martins</p>');
            set_tema('conteudo','');
            load_template();
        else:
        redirect('login');
        endif;
    }
}