<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder {

  public function run(): void {
    $user = [
      [
        'name'        => 'Administrator',
        'email'       => 'admin@exilednoname.com',
        'password'    => bcrypt('1234'),
        'created_at'  => Carbon::now(),
      ],
    ];
    User::insert($user);
  }
}
