<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Model Mapping
    |--------------------------------------------------------------------------
    |
    | If is enabled, model mapping will map the columns defined in the model
    | to use on different database with column names
    |
    */
    'model_mapping' => [
        'enabled' =>  env('MODEL_MAPPING', false),
        'uppercase' => env('MODEL_MAPPING_UPPERCASE', true),
        'file' => env('MODEL_MAPPING_FILE', null)
    ]
];
