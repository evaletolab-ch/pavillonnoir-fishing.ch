<?php
 return array (
  'name' => 'landing',
  'label' => 'Landing',
  '_id' => 'landing',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'intro_title',
      'label' => 'Titre',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => 'intro',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    1 => 
    array (
      'name' => 'intro_tagline',
      'label' => 'Singature',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => 'intro',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    2 => 
    array (
      'name' => 'intro_cta_text',
      'label' => 'Première Action',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => 'intro',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'intro_cta_link',
      'label' => 'Première Action (mail ou téléphone)',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => 'intro',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    4 => 
    array (
      'name' => 'intro_image',
      'label' => 'Image principale',
      'type' => 'image',
      'default' => '',
      'info' => '',
      'group' => 'intro',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    5 => 
    array (
      'name' => 'intro_logo',
      'label' => 'Image Logo ',
      'type' => 'image',
      'default' => '',
      'info' => '',
      'group' => 'intro',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    6 => 
    array (
      'name' => 'footer_title',
      'label' => 'Titre du pied de page',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => 'footer',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => true,
    ),
    7 => 
    array (
      'name' => 'when',
      'label' => '',
      'type' => 'repeater',
      'default' => '',
      'info' => '',
      'group' => 'When/Artists',
      'localize' => false,
      'options' => 
      array (
        'field' => 
        array (
          'type' => 'set',
          'label' => ' ',
          'display' => 'startDate',
          'options' => 
          array (
            'fields' => 
            array (
              0 => 
              array (
                'type' => 'collectionlink',
                'name' => 'localisation',
                'options' => 
                array (
                  'link' => 'localisations',
                  'display' => 'name',
                  'multiple' => true,
                  'limit' => false,
                  'required' => true,
                ),
              ),
              1 => 
              array (
                'name' => 'startDate',
                'label' => 'Start Date',
                'type' => 'date',
                'options' => 
                array (
                  'required' => true,
                ),
              ),
              2 => 
              array (
                'name' => 'startHour',
                'label' => 'Start Hour',
                'type' => 'time',
                'options' => 
                array (
                  'required' => true,
                ),
              ),
              3 => 
              array (
                'name' => 'endDate',
                'label' => 'End Date',
                'type' => 'date',
                'options' => 
                array (
                  'required' => true,
                ),
              ),
              4 => 
              array (
                'name' => 'endHour',
                'label' => 'End Hour',
                'type' => 'time',
                'options' => 
                array (
                  'required' => true,
                ),
              ),
              5 => 
              array (
                'name' => 'duration',
                'type' => 'text',
                'label' => 'Duration',
                'options' => 
                array (
                  'type' => 'number',
                ),
              ),
              6 => 
              array (
                'name' => 'cancel',
                'type' => 'boolean',
              ),
            ),
          ),
        ),
      ),
      'width' => '1-1',
      'lst' => false,
      'acl' => 
      array (
      ),
      'required' => true,
    ),    
  ),
  'data' => NULL,
  '_created' => 1679680130,
  '_modified' => 1679753325,
  'description' => '',
  'acl' => 
  array (
  ),
  'color' => '#48CFAD',
);