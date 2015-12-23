<?php
// app/database/seeds/CommentTableSeeder.php

class TarefaTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tarefas')->delete();

        Tarefa::create(array(
            'titulo' => 'Migração Fontes PHP',
            'descricao' => 'Efetuar a migração dos fontes dos sistemas em PHP'
        ));

        Tarefa::create(array(
            'titulo' => 'Migração Base PHP',
            'descricao' => 'Efetuar a migração da base dos sistemas PHP'
        ));

        Tarefa::create(array(
            'titulo' => 'Rotina de Testes',
            'descricao' => 'Efetuar a rotina de testes'
        ));
    }

}