<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrlsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urls')->insert([
            ['url' => 'https://www.google.fr', 'description' => 'Moteur de recherche Google en français.'],
            ['url' => 'https://www.bing.fr', 'description' => 'Moteur de recherche Bing en français.'],
            ['url' => 'https://laravel.com/docs/8.x/installation', 'description' => 'Installation de Lavavel 8.X.'],
            ['url' => 'https://laravel.io/forum/09-05-2014-php-artisan-serve-on-another-adress', 'description' => 'Lancer le serveur web interne de laravel avec un domaine fictif'],
            ['url' => 'https://stackoverflow.com/questions/24782960/composer-update-laravel', 'description' => 'Composer Update Laravel.'],
            ['url' => 'https://laravel.com/docs/8.x/eloquent#defining-models', 'description' => 'Defining models in laravel.'],
            ['url' => 'https://laravel.com/docs/8.x/migrations#generating-migrations', 'description' => 'Generating migrations with Laravel.'],
            ['url' => 'https://laravel.com/docs/8.x/migrations#running-migrations', 'description' => 'Running migrations in Laravel.'],
            ['url' => 'https://laravel.com/docs/8.x/migrations#rolling-back-migrations', 'description' => 'Rolling back migrations in Laravel.'],
            ['url' => 'https://stackoverflow.com/questions/31263637/how-to-convert-laravel-migrations-to-raw-sql-scripts', 'description' => 'How to convert Laravel migrations to raw SQL scripts?'],
            ['url' => 'https://laravel.com/docs/8.x/controllers', 'description' => 'Laravels contollers.'],
            ['url' => 'https://laravel.com/docs/8.x/seeding#writing-seeders', 'description' => 'Writing seeders in Laravel.'],
            ['url' => 'https://stillat.com/blog/2016/12/07/laravel-artisan-route-command-the-routelist-command', 'description' => 'Laravel Artisan Route Command.'],
            ['url' => 'https://tecadmin.net/clear-cache-laravel-5/', 'description' => 'How to Clear Cache in Laravel.'],
            ['url' => 'https://laravel.com/docs/8.x/passport', 'description' => 'How to login via API in Laravel?'],
            ['url' => 'https://summerblue.github.io/laravel5-cheatsheet/', 'description' => 'Laravel Cheat Sheet.'],
            ['url' => 'https://github.com/LaravelDaily/laravel-tips', 'description' => 'Laravel Tips.'],
            ['url' => 'https://voyager-docs.devdojo.com/', 'description' => 'Laravel Voyager documentation.'],
            ['url' => 'http://ctsfla.com/vendor/tcg/voyager/assets/fonts/voyager/icons-reference.html', 'description' => 'Laravel voyager icons.'],
            ['url' => 'https://laravel.com/docs/8.x/releases', 'description' => 'Laravel 8, what\'s new?'],
            ['url' => 'https://simplecheatsheet.com/tag/laravel-cheat-sheet/', 'description' => 'Laravel Simple Cheat Sheet.']
        ]);
    }
}
