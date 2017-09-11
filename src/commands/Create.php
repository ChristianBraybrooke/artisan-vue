<?php

namespace ChrisBraybrooke\ArtisanVue\Commands;

use Illuminate\Console\Command;
use ChrisBraybrooke\ArtisanVue\Exceptions\FileAlreadyExists;
use ChrisBraybrooke\ArtisanVue\Exceptions\CannotAddToComponentsFile;
use Illuminate\Filesystem\Filesystem;


/**
 *
 */
class Create extends Command
{

  /**
   * Create path for file.
   *
   * @param string | $type | File type.
   * @return string
   */
  protected function createPath(Filesystem $filesystem, $type, $full = true)
  {

      $defaultPath = $full ? config("artisan-vue.js_path") . '/' . config("artisan-vue.{$type}_dir") : config("artisan-vue.{$type}_dir");

      $extra = substr($this->argument('name'), 0,strrpos($this->argument('name'), '/'));

      $path = !empty($extra) ? $defaultPath . '/' . $extra : $defaultPath;

      // If the directory doesn't exsist then create it
      if(!$filesystem->isDirectory($path) && $full) {

        $filesystem->makeDirectory($path, 0755, true, true);

      }


      return $path;

  }

  /**
   * Create name for file.
   *
   * @param bool | $append
   * @return string
   */
  protected function fileName($append = true) {

    $pos = strrpos($this->argument('name'), '/');

    $name = $pos === false ? $this->argument('name') : substr($this->argument('name'), $pos + 1);

    if($append) {
      return "{$name}.vue";
    }

    return $name;

  }

  /**
   * Ensure we aren't overwriting anthing.
   *
   * @param Filesystem | $filesystem
   * @param String | $path
   * @param String | $name
   *
   * @return string
   */
  protected function checkFileExists(Filesystem $filesystem, $path, $name)
  {
    if ($filesystem->exists($path)) {
        throw FileAlreadyExists::fileExists($name);
    }
  }

  /**
   * Get and return stub.
   *
   * @param Filesystem | $filesystem
   * @param String | $type
   *
   * @return string
   */
  protected function getStub(Filesystem $filesystem, $type)
  {

      return $filesystem->get(__DIR__.'/../stubs/'.$type.'.vue');

  }

  /**
   * Create a new entry in the components file.
   *
   * @param Filesystem | $filesystem
   * @param String | $type
   *
   * @return string
   */
  public function writeToComponentsFile(Filesystem $filesystem, $type)
  {

    try {

      $file = config("artisan-vue.components_file_path") . '/artisan-vue-components.js';
      // The new content to add to the file
      $content = "/**\n*\n* ";
      $content .= "Auto Generated Vue Component '{$this->fileName(false)}'\n";
      $content .= "*/\n";
      $content .= "Vue.component(\n  '{$this->fileName(false)}',\n  require('" . config("artisan-vue.components_file_relative") . $this->createPath($filesystem, $type, false) . "/" . $this->fileName() . "')\n); \n\n";

      // Write the contents to the file,
      file_put_contents($file, $content, FILE_APPEND | LOCK_EX);


    } catch (Exception $e) {

      throw FileAlreadyExists::fileExists($name);

    }

  }

}
