<?php
 return array (
  'name' => 'landing',
  'label' => 'Landing',
  '_id' => 'landing',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'intro_logo',
      'label' => 'Image Logo ',
      'type' => 'image',
      'default' => '',
      'info' => '',
      'group' => '1.intro',
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
      'name' => 'intro_title',
      'label' => 'Titre',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '1.intro',
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
      'name' => 'intro_tagline',
      'label' => 'Singature',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '1.intro',
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
      'name' => 'introl_description_title',
      'label' => 'Titre description',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '1.intro',
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
      'name' => 'intro_cta_text',
      'label' => 'Première Action',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '1.intro',
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
      'name' => 'intro_cta_link',
      'label' => 'Première Action (mail ou téléphone)',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '1.intro',
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
      'name' => 'intro_image',
      'label' => 'Image principale',
      'type' => 'image',
      'default' => '',
      'info' => '',
      'group' => '2.Service',
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
      'name' => 'intro_description',
      'label' => '',
      'type' => 'textarea',
      'default' => '',
      'info' => '',
      'group' => '1.intro',
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
    8 => 
    array (
      'name' => 'ourwork_title',
      'label' => 'Titre de nos services',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '2.Service',
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
    9 => 
    array (
      'name' => 'ourwork',
      'label' => 'Notre offre',
      'type' => 'repeater',
      'default' => '',
      'info' => '',
      'group' => '2.Service',
      'localize' => false,
      'options' => 
      array (
        'field' => 
        array (
          'type' => 'set',
          'label' => ' ',
          'display' => '',
          'options' => 
          array (
            'fields' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'name' => 'title',
                'label' => 'titre',
                'options' => 
                array (
                  'required' => true,
                ),
              ),
              1 => 
              array (
                'name' => 'content',
                'label' => 'description',
                'type' => 'textarea',
                'options' => 
                array (
                  'required' => true,
                ),
              ),
              2 => 
              array (
                'name' => 'image',
                'label' => 'Photo',
                'type' => 'image',
                'options' => 
                array (
                  'required' => true,
                ),
              ),
              3 => 
              array (
                'name' => 'active',
                'label' => 'publié',
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
    10 => 
    array (
      'name' => 'ourwork_photos',
      'label' => '',
      'type' => 'gallery',
      'default' => '',
      'info' => '',
      'group' => '2.Service',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => false,
    ),
    11 => 
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
    12 => 
    array (
      'name' => 'info_planning_title',
      'label' => 'Titre',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '3.Infos pratiques',
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
    13 => 
    array (
      'name' => 'info_planning_trip',
      'label' => 'Info pratiques voyage',
      'type' => 'textarea',
      'default' => '',
      'info' => '',
      'group' => '3.Infos pratiques',
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
    14 => 
    array (
      'name' => 'info_planning_legal',
      'label' => 'infos pratique légal',
      'type' => 'textarea',
      'default' => '',
      'info' => '',
      'group' => '3.Infos pratiques',
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
    15 => 
    array (
      'name' => 'info_planning_contact',
      'label' => 'info pratiques prix',
      'type' => 'textarea',
      'default' => '',
      'info' => '',
      'group' => '3.Infos pratiques',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
      'required' => false,
    ),
  ),
  'data' => NULL,
  '_created' => 1679680130,
  '_modified' => 1680018809,
  'description' => '',
  'acl' => 
  array (
  ),
  'color' => '#48CFAD',
);