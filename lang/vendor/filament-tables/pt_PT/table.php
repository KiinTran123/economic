<?php

return [

    'columns' => [

        'text' => [
            'more_list_items' => 'e :count mais',
        ],

    ],

    'fields' => [

        'search' => [
            'label'       => 'Procurar',
            'placeholder' => 'Procurar',
        ],

    ],

    'actions' => [

        'disable_reordering' => [
            'label' => 'Concluir a reordenação de registos',
        ],

        'enable_reordering' => [
            'label' => 'Reordenar registos',
        ],

        'filter' => [
            'label' => 'Filtrar',
        ],

        'open_bulk_actions' => [
            'label' => 'Ações abertas',
        ],

        'toggle_columns' => [
            'label' => 'Alternar colunas',
        ],

    ],

    'empty' => [
        'heading' => 'Sem registos',
    ],

    'filters' => [

        'actions' => [

            'remove' => [
                'label' => 'Remover filtro',
            ],

            'remove_all' => [
                'label'   => 'Remover todos os filtros',
                'tooltip' => 'Remover todos os filtros',
            ],

            'reset' => [
                'label' => 'Limpar filtros',
            ],

            'close' => [
                'label' => 'Fechar',
            ],

        ],

        'indicator' => 'Filtros ativos',

        'multi_select' => [
            'placeholder' => 'Todos',
        ],

        'select' => [
            'placeholder' => 'Todos',
        ],

        'trashed' => [

            'label' => 'Registos excluídos',

            'only_trashed' => 'Somente registos excluídos',

            'with_trashed' => 'Mostrar registos excluídos',

            'without_trashed' => 'Não mostrar registos excluídos',

        ],

    ],

    'reorder_indicator' => 'Arraste e solte os registos na ordem.',

    'selection_indicator' => [

        'selected_count' => '1 registo selecionado|:count registos selecionados',

        'actions' => [

            'select_all' => [
                'label' => 'Selecionar todos :count',
            ],

            'deselect_all' => [
                'label' => 'Desmarcar todos',
            ],

        ],

    ],

];
