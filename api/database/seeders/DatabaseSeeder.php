<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        //DB::table('users')->insert([
        //    'name' => Str::random(10),
        //    'email' => Str::random(10).'@gmail.com',
        //    'password' => Hash::make('password'),
        //]);
//
        ////declaring variables to use on database seeding
        //$localSeed = '';
//
        //for($i = 0; $i <= 5; $i++){
        //    $localSeed .= Str::random(10)."/";
        //}
//
        //$localSeed = substr($localSeed, 0, -1);
//
        //$significadosSeed = '';
//
        //for($i = 1; $i <= 3; $i++){
        //    $significadosSeed .= Str::random(40).';*';
        //}
        //$significadosSeed = substr($significadosSeed, 0, -1);
//
        //for($i = 0; $i <= 300; $i++){
//
        //    DB::table('girias')->insert([
        //    'nome' => Str::random(30),
        //    'criadoPor' => User::inRandomOrder()->pluck('id')->first(),
        //    'local' => $localSeed,
        //    'significados' => $significadosSeed,
        //    'etimologia' => Str::random(200),
        //    'imagem' => 'https://static.wikia.nocookie.net/kirby/images/7/71/Kirby_KSA_Arte.png/revision/latest?cb=20200704132348&path-prefix=pt-br',
        //    'videoId'=> 'flv9HSnllEg'
        //    ]);
//
        //}
//
        //for($i = 0; $i < 300; $i++){
        //    DB::table('idiom')->insert([
        //        'criadoPor' => User::inRandomOrder()->pluck('id')->first(),
        //        'expressao_pt' => Str::random(30),
        //        'expressao_en' => Str::random(30),
        //    ]);
        //}
    }
}
