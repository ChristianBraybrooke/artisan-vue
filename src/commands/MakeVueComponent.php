<?php

namespace ChrisBraybrooke\ArtisanVue\Commands;

use Illuminate\Filesystem\Filesystem;


/**
 *
 */
class MakeVueComponent extends Create
{

  /** The name and signature of the console command.
  *
  * @var string
  */
 protected $signature = 'make:vue-component {name}';

 /**
  * The console command description.
  *
  * @var string
  */
 protected $description = 'Create a new Vue component';

 protected $filesystem;


 /**
  * Create a new command instance.
  *
  * @param  DripEmailer  $drip
  * @return void
  */
 public function __construct()
 {

     parent::__construct();

     $this->filesystem = new Filesystem();

 }

 /**
  * Execute the console command.
  *
  * @return mixed
  */
 public function handle()
 {

   $this->info("Creating Vue component '{$this->fileName()}' in {$this->createPath($this->filesystem, 'component')}");

   $this->create();

 }

 /**
 *
 * Copy the Vue component stub and create / paste it in the desired location.
 * @return bool | whether or not the compoent creation was successfull
 */
 public function create()
 {

   $fullPath = "{$this->createPath($this->filesystem,'component')}/{$this->fileName()}";

   $this->checkFileExists($this->filesystem, $fullPath, $this->fileName());

   $stub = $this->getStub($this->filesystem, 'component');

   $this->filesystem->put($fullPath, $stub);

   $this->info("Vue Component {$this->fileName()} succesfully created.");

   if(config("artisan-vue.components_file")) {

     $this->writeToComponentsFile($this->filesystem, 'component');

     $this->info("artisan-vue-components.js succesfully updated.");

   }

 }



}
