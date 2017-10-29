<?php

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'first_name' => 'Joshua',
            'last_name' => 'Gallagher',
            'email' => 'hello@joshuagallagher.io',
        ]);
        factory(Article::class, 28)->create();
    }
}
