<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Vue Component Path
  |--------------------------------------------------------------------------
  |
  | Here you may specify a custom js resource directory.
  |
  */

  'js_path' => resource_path() . '/assets/js',

  /*
  |--------------------------------------------------------------------------
  | Vue Component Path
  |--------------------------------------------------------------------------
  |
  | Here you may specify the base path where new Vue components are created.
  | Please not that this comes after js_path.
  |
  | Of course you may create files within sub-folders by using the artisan command.
  |
  | e.g "php artisan make:vue-component flights/flight-status"
  |     - Would create components/flights/flight-status.vue
  |
  */

  'component_dir' => 'components',



  /*
  |--------------------------------------------------------------------------
  | Create A Vue Components File?
  |--------------------------------------------------------------------------
  |
  | Here you may specify whether artisan-vue should create and keep updated
  | a "artisan-vue-components.js" file which can be required into your app.js
  | and will be automatically updated everytime you run the command
  | "php artisan make:vue-component".
  |
  | WARNING: If set to true it is YOUR responsibilty to remove components from
  |          the "artisan-vue-components.js" file if deleted.
  |
  */

  'components_file' => true,



  /*
  |--------------------------------------------------------------------------
  | Vue Components File Path
  |--------------------------------------------------------------------------
  |
  | Here you may specify the path for the Vue Components File where the file
  | will be placed if components_file is set to true.
  |
  */

  'components_file_path' => resource_path() . '/assets/js',



  /*
  |--------------------------------------------------------------------------
  | Vue Components File Relative to Component Path
  |--------------------------------------------------------------------------
  |
  | If your the js_path and components_file_path are different this should reflect,
  | this will need to be changed so the automated component paths are correct.
  |
  */

  'components_file_relative' => './',
];
