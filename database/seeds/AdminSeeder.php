<?php

use App\GroupAdmin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new GroupAdmin();
        $table->id = 1;
        $table->name = 'Admin';
        $table->email = 'admin@admin.com';
        $table->users_id = 1;
        $table->save();
    }
}
