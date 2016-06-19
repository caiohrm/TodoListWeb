<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{

public function do_login($usuario=NULL,$senha=NULL){

    if($usuario != null && $senha!=null):
        $this->db->where('vlogin_programador',$usuario);
        $this->db->where('vsenha_programador',$senha);
        $query = $this->db->get('programador');
        return $query->num_rows()>=1;
    else:
       return false;
    endif;
}

    public function get_bylogin($login=NULL){
        if($login != null):
            $this->db->where('vlogin_programador',$login);
            $this->db->limit(1);
            return $this->db->get('programador');
        else:
            return false;
         endif;
    }

    public function get_users()
    {
        return $this->db->get('programador');
    }

    public function get_programas()
    {
        return $this->db->get('programa');
    }

    public function get_situac()
    {
        return $this->db->get('status');
    }

    public function insert_user($dados=NULL)
    {
        if($dados!= NULL):
            $this->db->insert('programador',$dados);
            $this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
        endif;
    }

    public function insert_program($dados=NULL)
    {
        if($dados!= NULL):
            $this->db->insert('programa',$dados);
            $this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
        endif;
    }

    public function insert_atividade($dados=NULL,$nid____todolist=NULL)
    {
        if($dados!= NULL) {
            if($nid____todolist ==NULL) {
                $this->db->insert('todolist', $dados);
                $this->session->set_flashdata('cadastrook', 'Cadastro efetuado com sucesso');
            }else{
                $this->db->where('nid____todolist',$nid____todolist);
                $this->db->update('todolist' ,$dados);
            }
        }
    }

    public function insert_status($dados=NULL){
        if($dados!= NULL):
            $this->db->insert('status',$dados);
            $this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
        endif;

    }

    public function get_tarefaById($idTarefa=NULL)
    {
        if($idTarefa != null):
            $this->db->where('nid____todolist',$idTarefa);
            $this->db->limit(1);
            return $this->db->get('todolist');
        else:
            return false;
        endif;


    }


    public function get_tarefas($programador=0,$projetos=0,$status=0)
    {

        return $this->db->query('SELECT nid____todolist,'.
                                        'todo.nid____programador,'.
                                        'todo.nid____programa, '.
                                        'vtitulotodolist,'.
                                        'vdescritodolist, '.
                                        'vnome____programa, '.
                                        'vnome__programador,'.
                                       'DATE_FORMAT(dprazo_todolist,\' %d/%m/%Y\') as dprazo_todolist, '.
                                       //'to_char(dprazo_todolist, \'DD/MM/YYYY\') as dprazo_todolist,'.
                                        'stu.vdescristatus,'.
                                        'nstate_todolist '.
                                'FROM todolist AS todo, '.
                                        'programador AS pro, '.
                                        'programa AS grama,'.
                                        'status AS stu '.
                                'WHERE '.
                                        '(0='.$programador.' or todo.nid____programador = '.$programador.') AND  '.
                                        '(0='.$projetos.' or todo.nid____programa = '.$projetos.') AND'.
                                        '((0='.$status.' and todo.nstate_todolist !=3)   or todo.nstate_todolist = '.$status.') AND '.
                                        'pro.nid____programador = todo.nid____programador AND '.
                                        'todo.nid____programa=grama.nid____programa AND '.
                                        'todo.nstate_todolist=stu.nid____status '.
                                        'order by nid____programador,dprazo_todolist');
    }


}
