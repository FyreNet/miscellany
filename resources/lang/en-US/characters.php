<?php

return [
    'attributes'    => [
        'create'        => [
            'description'   => 'Add an attribute to a character',
        ],
        'placeholders'  => [
            'attribute' => 'Number of battles won, date of wedding, Initiative',
        ],
    ],
    'fields'        => [
        'eye'   => 'Eye color',
    ],
    'organisations' => [
        'actions'       => [
            'add'   => 'Add organization',
        ],
        'create'        => [
            'description'   => 'Associate an organization to a character',
            'success'       => 'Character added to organization.',
        ],
        'destroy'       => [
            'success'   => 'Character organization removed.',
        ],
        'edit'          => [
            'success'   => 'Character organization updated.',
            'title'     => 'Update Organization for :name',
        ],
        'fields'        => [
            'organisation'  => 'Organization',
        ],
        'placeholders'  => [
            'organisation'  => 'Choose an organization...',
        ],
    ],
    'placeholders'  => [
        'eye'   => 'Eye color',
    ],
    'show'          => [
        'tabs'  => [
            'organisations' => 'Organizations',
        ],
    ],
];
