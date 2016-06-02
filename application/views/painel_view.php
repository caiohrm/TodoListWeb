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
<?php
if(esta_logado(false)):;?>
    <div class="tiny reveal" id="programador" data-reveal></div>
    <div class="tiny reveal" id="programas" data-reveal></div>
    <div class="tiny reveal" id="status" data-reveal></div>
    <div class="large reveal" id="atividade" data-reveal></div>

    <div class="row">
        <div class="columns medium-6 text-right">
            <a href="<?php echo base_url('painel'); ?>" class="teste"><h1>Tarefas</h1></a>
        </div>
        <div class="columns medium-6 text-right">
            Logado como <strong><?php echo $this->session->userdata('user_nome')?></strong> <a href="<?php echo base_url('usuarios/deslogar');?>">sair</a>
        </div>
    </div>
    <div class="row medium-uncollapse large-collapse">
        <div class="columns medium-1 text-center">
            <?php
            $data= array();
            foreach ($users as $row){
                $data = array_merge($data,array($row->nid____programador=>$row->vnome__programador));
            }
            echo form_button(array('name'=>'logar','class'=> 'button radius float-left',
                'data-open'=>'programador'),'+');
            ?>
        </div>
        <div class="columns medium-2 text-left">
            <?php echo  form_dropdown('programador',$data,01); ?>
        </div>
        <div class="columns medium-1 text-center">
            <?php
            $data= array();
            foreach ($programas as $row)
            {
                $data = array_merge($data,array($row->nid____programa=>$row->vnome____programa));
            }
            echo form_button(array('name'=>'logar','class'=> 'button radius right','data-open'=>'programas'),'+');
            ?>
        </div>
        <div class="columns medium-2 text-left">
            <?php echo form_dropdown('programas',$data,01); ?>
        </div>
        <div class="columns medium-1 text-center">
            <?php
            $data= array();
            foreach ($situacao as $row):$data = array_merge($data,array($row->nid____status =>$row->vdescristatus));endforeach;
            echo form_button(array('name'=>'logar','class'=> 'button radius right','data-open'=>'status'),'+');
            ?>
        </div>
        <div class="columns medium-2 text-center">
            <?php echo form_dropdown('situacao',$data,01,'onChange=CarregaDatabase()'); ?>
        </div>
        <div class="columns medium-2 text-right">
            <?php echo form_button(array('name'=>'logar','class'=> 'button radius right','onclick'=>'CarregaAtividade()'),'Criar Atividade');?>
        </div>
    </div>
    </div>
    <div class="row">
        <?php
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable" id="myTable">'
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
{footerinc}
<script scr="js/foundation.min.js"></script>
<div class="row rodape">
    <div ="columns medium-6 medium-centered">
    {rodape}
</div>
</body>

</html>