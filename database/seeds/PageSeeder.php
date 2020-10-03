<?php

use App\Page;

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $count = 30;
    $pages = factory(Page::class, $count)->create();
  }
}
