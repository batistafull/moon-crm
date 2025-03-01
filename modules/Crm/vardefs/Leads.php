<?php

$vardefs['Leads']['create'] = [
    'title' => [
        'size' => 4,
        'required' => true,
        'label' => 'Title',
        'type' => 'text', // Tipo de campo
        'maxlength' => 255,
        'default' => ''
    ],
    'first_name' => [
        'size' => 4,
        'required' => true,
        'label' => 'First Name',
        'type' => 'text', // Tipo de campo
        'maxlength' => 255,
        'default' => ''
    ],
    'newsletter' => [
        'size' => 4,
        'required' => false,
        'label' => 'Suscribirse al newsletter',
        'type' => 'checkbox', // Tipo de campo
        'default' => false
    ],
    'country' => [
        'size' => 4,
        'required' => true,
        'label' => 'País',
        'type' => 'select', // Tipo de campo
        'options' => [ // Opciones para el select
            'MX' => 'México',
            'US' => 'Estados Unidos',
            'CA' => 'Canadá'
        ],
        'default' => 'MX'
    ],
    'comments' => [
        'size' => 12,
        'required' => false,
        'label' => 'Comentarios',
        'type' => 'textarea', // Tipo de campo
        'default' => ''
    ],
];