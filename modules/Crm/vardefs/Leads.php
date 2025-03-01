<?php

$vardefs['Leads']['fields'] = [
    'id' => [
        'type' => 'varchar',
        'size' => 255,
        'nullable' => false,
        'default' => null,
        'indices' => ['PRIMARY'],
        'comment' => '',
        'autoincrement' => false,
    ],
    'first_name' => [
        'type' => 'varchar',
        'size' => 255,
        'nullable' => false,
        'default' => null,
        'indices' => [],
        'comment' => '',
        'autoincrement' => false,
    ],
    'last_name' => [
        'type' => 'varchar',
        'size' => 255,
        'nullable' => false,
        'default' => null,
        'indices' => [],
        'comment' => '',
        'autoincrement' => false,
    ],
    'email' => [
        'type' => 'varchar',
        'size' => 255,
        'nullable' => false,
        'default' => null,
        'indices' => [],
        'comment' => '',
        'autoincrement' => false,
    ],
    'country' => [
        'type' => 'varchar',
        'size' => 255,
        'nullable' => false,
        'default' => null,
        'indices' => [],
        'comment' => '',
        'autoincrement' => false,
    ],
    'newsletter' => [
        'type' => 'boolean',
        'size' => 255,
        'nullable' => false,
        'default' => null,
        'indices' => [],
        'comment' => '',
        'autoincrement' => false,
    ],
    'comments' => [
        'type' => 'text',
        'size' => 255,
        'nullable' => false,
        'default' => null,
        'indices' => [],
        'comment' => '',
        'autoincrement' => false,
    ],
];

$vardefs['Leads']['create'] = [
    'first_name' => [
        'size' => 4,
        'required' => true,
        'label' => 'First Name',
        'type' => 'text',
        'maxlength' => 255,
        'default' => ''
    ],
    'last_name' => [
        'size' => 4,
        'required' => true,
        'label' => 'Last Name',
        'type' => 'text',
        'maxlength' => 255,
        'default' => ''
    ],
    'newsletter' => [
        'size' => 4,
        'required' => false,
        'label' => 'Subscribe to newsletter',
        'type' => 'checkbox',
        'default' => false
    ],
    'country' => [
        'size' => 4,
        'required' => true,
        'label' => 'Country',
        'type' => 'select',
        'options' => [
            'MX' => 'México',
            'US' => 'Estados Unidos',
            'CA' => 'Canadá'
        ],
        'default' => 'MX'
    ],
    'email' => [
        'size' => 12,
        'required' => true,
        'label' => 'Email',
        'type' => 'text',
        'default' => ''
    ],
    'comments' => [
        'size' => 12,
        'required' => false,
        'label' => 'Comentarios',
        'type' => 'textarea',
        'default' => ''
    ],
];

$vardefs['Leads']['edit'] = [
    'first_name' => [
        'size' => 4,
        'required' => true,
        'label' => 'First Name',
        'type' => 'text',
        'maxlength' => 255,
    ],
    'last_name' => [
        'size' => 4,
        'required' => true,
        'label' => 'Last Name',
        'type' => 'text',
        'maxlength' => 255,
    ],
    'email' => [
        'size' => 4,
        'required' => true,
        'label' => 'Email',
        'type' => 'text',
        'maxlength' => 255,
    ],
    'country' => [
        'size' => 4,
        'required' => true,
        'label' => 'Country',
        'type' => 'select',
        'options' => [
            'MX' => 'México',
            'US' => 'Estados Unidos',
            'CA' => 'Canadá',
        ],
    ],
    'newsletter' => [
        'size' => 4,
        'required' => false,
        'label' => 'Subscribe to newsletter',
        'type' => 'checkbox',
    ],
    'comments' => [
        'size' => 12,
        'required' => false,
        'label' => 'Comments',
        'type' => 'textarea',
    ],
];

$vardefs['Leads']['detail'] = [
    'first_name' => [
        'label' => 'First Name',
        'format' => 'text',
    ],
    'last_name' => [
        'label' => 'Last Name',
        'format' => 'text',
    ],
    'email' => [
        'label' => 'Email',
        'format' => 'email',
    ],
    'country' => [
        'label' => 'Country',
        'format' => 'text',
    ],
    'newsletter' => [
        'label' => 'Subscribe to newsletter',
        'format' => 'boolean',
    ],
    'comments' => [
        'label' => 'Comments',
        'format' => 'text',
    ],
];

$vardefs['Leads']['list'] = [
    'first_name' => [
        'label' => 'First Name',
        'sortable' => true,
    ],
    'last_name' => [
        'label' => 'Last Name',
        'sortable' => true,
    ],
    'email' => [
        'label' => 'Email',
        'sortable' => false,
    ],
    'country' => [
        'label' => 'País',
        'sortable' => true,
    ],
    'actions' => [
        'label' => 'Actions',
        'sortable' => false,
    ],
];