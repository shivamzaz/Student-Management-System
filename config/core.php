<?php

return [

  'version' =>  [
    'api' =>  'v1'
  ],


  'default_per_page' => 25,

  'type'  =>  [

    'status'  =>  [
      'verified'  =>  [
        'id'  =>  1,
        'text'  =>  'Verified'
      ],
      'not_verified'  =>  [
        'id'  =>  0,
        'text'  =>  'Not Verified'
      ],
      'suspended'  =>  [
        'id'  =>  2,
        'text'  =>  'Suspended'
      ]
    ],

  ]

];