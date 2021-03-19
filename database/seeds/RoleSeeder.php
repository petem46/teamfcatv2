<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('roles')->insert(array(
      array(
        'name' => 'Site Admin',
      ),
      array(
        'name' => 'Standard User',
      ),
      array(
        'name' => 'Site Editor',
      ),
      array(
        'name' => 'COVID Content Editor',
      ),
      array(
        'name' => 'RTL Content Editor',
      ),
      array(
        'name' => 'Key Info Content Editor',
      ),
      array(
        'name' => 'HR Content Editor',
      ),
      array(
        'name' => 'HR Lead',
      ),
      array(
        'name' => 'Finance Content Editor',
      ),
      array(
        'name' => 'Finance Team Member',
      ),
      array(
        'name' => 'ICT Content Editor',
      ),
      array(
        'name' => 'ICT Support',
      ),
      array(
        'name' => 'Media Content Editor',
      ),
      array(
        'name' => 'Data Protection Content Editor',
      ),
      array(
        'name' => 'Data and Exams Content Editor',
      ),
      array(
        'name' => 'Data and Exams Team',
      ),
      array(
        'name' => 'Health and Safety Content Editor',
      ),
      array(
        'name' => 'FCAT Exec',
      ),
      array(
        'name' => 'Headteacher',
      ),
    ));
  }
}
