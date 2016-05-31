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

    public function createUser(){
        set_tema('template','reveal');
        set_tema('tela','programador');
        load_template();
    }

    public function salvaProgramador()
    {
        $data = array();
        $login = $_POST["vlogin_programador"];
        $this->form_validation->set_rules('vnome__programador','NOME','trim|required|min_length[4]|strtolower');
        $this->form_validation->set_message('is_unique', 'Error Message');
        $this->form_validation->set_rules('vlogin_programador','LOGIN','trim|required|min_length[4]|strtolower|'+
        'is_unique[programador.vlogin_programador]');
        $this->form_validation->set_rules('vsenha_programador','SENHA','trim|required|min_length[4]|strtolower');
        $this->form_validation->set_rules('vsenha_programador1','REPITA A SENHA','trim|required|strtolower|matches[vsenha_programador]');
        if($this->form_validation->run()) {
            $dados = elements(array('vnome__programador', 'vlogin_programador', 'vsenha_programador'), $this->input->post());
            $dados['vsenha_programador'] = md5($dados['vsenha_programador']);
            $this->usuarios->insert_user($dados);
            $data['success'] = true;
            $row =$this->usuarios->get_bylogin($login)->row();
            $data['message'] = array($row->nid____programador,$row->vnome__programador);
        }else
        {
            $this->output->enable_profiler(false);
            $data['success'] = false;
            $data['message'] = validation_errors();
        }
        echo json_encode($data);
    }

    public function salvaPrograma()
    {
        $data = array();
        $this->form_validation->set_rules('vnome____programa','Nome Programa','trim|required|min_length[4]|strtolower');
        if($this->form_validation->run()) {
            $dados = elements(array('vnome____programa'), $this->input->post());
            $this->usuarios->insert_program($dados);
            $data['success'] = true;
            $valores =$this->usuarios->get_programas()->result();
            $dados = array();
            foreach ($valores as $row) {
                $dados = array_merge($dados,array($row->nid____programa=>$row->vnome____programa));
            }
            $data['message'] = $dados;
        }else
        {
            $this->output->enable_profiler(false);
            $data['success'] = false;
            $data['message'] = validation_errors();
        }
        echo json_encode($data);
    }

    public function salvaStatus()
    {
        $data = array();
        $this->form_validation->set_rules('vdescristatus','Status','trim|required|min_length[4]|strtolower');
        if($this->form_validation->run()) {
            $dados = elements(array('vdescristatus'), $this->input->post());
            $this->usuarios->insert_status($dados);
            $data['success'] = true;
            $valores =$this->usuarios->get_situac()->result();
            $dados = array();
            foreach ($valores as $row) {
                $dados = array_merge($dados,array($row->nid____status=>$row->vdescristatus));
            }
            $data['message'] = $dados;
        }else
        {
            $this->output->enable_profiler(false);
            $data['success'] = false;
            $data['message'] = validation_errors();
        }
        echo json_encode($data);
    }

    public function createProgramas(){
        set_tema('template','reveal');
        set_tema('tela','programas');
        load_template();
    }
    public function createStatus(){
        set_tema('template','reveal');
        set_tema('tela','status');
        load_template();
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