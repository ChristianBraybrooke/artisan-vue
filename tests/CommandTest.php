<?php

namespace ChrisBraybrooke\ArtisanVue\Test;

use Artisan;

class CommandTest extends TestCase
{

  /**
   * @test
   */
  public function it_saves_component_file_with_specified_name()
  {
      $file = resource_path('assets/js/components/NewComponent.vue');
      $this->assertFileNotExists($file);
      Artisan::call('make:vue-component', [
          'name'    => 'NewComponent'
      ]);
      $this->assertFileExists($file);
  }

}
