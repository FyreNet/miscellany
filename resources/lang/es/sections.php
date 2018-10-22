<?php

return [
    'create'        => [
        'description'   => 'Crear nueva categoría',
        'success'       => 'Categoría \':name\' creada.',
        'title'         => 'Nueva Categoría',
    ],
    'destroy'       => [
        'success'   => 'Categoría \':name\' eliminada.',
    ],
    'edit'          => [
        'success'   => 'Categoría \':name\' actualizada.',
        'title'     => 'Editar categoría \':name',
    ],
    'fields'        => [
        'characters'    => 'Personajes',
        'children'      => 'Entidades anidadas',
        'name'          => 'Nombre',
        'section'       => 'Categoría',
        'sections'      => 'Subcategorías',
        'type'          => 'Tipo',
    ],
    'helpers'       => [
        'nested'    => 'En la Vista de Exploración puedes ver tus categorías de forma anidada. Las categorías que no tengan ninguna superior se mostrarán aquí por defecto. Las que tengan subcategorías anidadas se pueden ir clicando para mostrarlas. Puedes seguir haciendo click hasta que no haya más categorías anidadas que ver.',
    ],
    'hints'         => [
        'children'  => 'Esta lista contiene todas las entidades que pertenecen directamente a esta categoría y a todas las categorías anidadas.',
        'section'   => 'A continuación se muestran todas las categorías que están directamente bajo esta categoría.',
    ],
    'index'         => [
        'actions'       => [
            'explore_view'  => 'Vista de exploración',
        ],
        'add'           => 'Nueva Categoría',
        'description'   => 'Administrar categoría de :name.',
        'header'        => 'Categorías en :name',
        'title'         => 'Categorías',
    ],
    'placeholders'  => [
        'name'      => 'Nombre de la categoría',
        'section'   => 'Elige una categoría superior',
        'type'      => 'Tradiciones, Guerras, Historia, Religión...',
    ],
    'show'          => [
        'description'   => 'Vista detallada de la categoría',
        'tabs'          => [
            'children'      => 'Entidades anidadas',
            'information'   => 'Información',
            'sections'      => 'Categorías',
        ],
        'title'         => 'Categoría :name',
    ],
];
