<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PageContent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('page_contents')->truncate();

        DB::table('page_contents')->insert([
            [
                'page' => 'home',
                'key' => 'trailer',
                'value' => '{"title":"Vietnam Young Lions","description":"Vietnam Young Lions is the largest competition of the Marketing & Communication industry to search for young talents under 30 years of age who will represent Vietnam to fight on the global stages of the 2 most prestigious competitions of the world, namely Young Lions (Cannes Lions) and Young Spikes (Spikes Asia). ","link":"https://vietnamyounglions.net/","trailer":"https:\/\/www.youtube.com\/embed\/IsNYctPeZNg"}',
            ],
            [
                'page' => 'livestream',
                'key' => 'more_contest',
                'value' => '[{"title":"AIM Academy","image":"\/storage\/image\/tVSrZQ0TpgJh8TJoSqpQFMbafbBRoTCZWyvPiurL.jpg","link":"https:\/\/aimacademy.vn\/vi"},{"title":"Vietnam Young Lions","image":"\/storage\/image\/qOe7fAA8pI6a4qZ4Xnriy30rOyG7ZuV7ENEPYats.jpg","link":"https:\/\/vietnamyounglions.net\/"},{"title":"Vietnam Young Spikes","image":"\/storage\/image\/30nF3xUDK7knzUetG7n5fQlyZhxGi6Bpe4JzKFfC.jpg","link":"https:\/\/vietnamyounglions.net\/about\/9\/vietnam-young-spikes.html"}]',
            ],
            [
                'page' => 'livestream',
                'key' => 'welcome',
                'value' => 'WELCOME TO GRAND FINALE',
            ],
            [
                'page' => 'home',
                'key' => 'banner',
                'value' => '/storage/image/banner.jpg',
            ],

            [
                'page' => 'footer',
                'key' => 'footer',
                'value' => '{"phone":"+84 91 450 8448","column1":{"title":"Vietnam Young Lions 2022","content":[{"text":"Eligible","link":"https:\/\/vietnamyounglions.net\/#registra"},{"text":"How To Register","link":"https:\/\/vietnamyounglions.net\/register.html"},{"text":"Categories","link":"https:\/\/vietnamyounglions.net\/#categories"},{"text":"Jury Panel","link":"https:\/\/vietnamyounglions.net\/jury.html"}]},"column2":{"title":"About","content":[{"text":"AIM Academy","link":"https:\/\/aimacademy.vn\/"},{"text":"Cannes Lions","link":"https:\/\/www.canneslions.com\/"},{"text":"Spikes Asia","link":"https:\/\/www.spikes.asia\/"},{"text":"Vietnam Young Spikes","link":"https:\/\/vietnamyounglions.net\/about\/9\/vietnam-young-spikes.html"}]},"column3":{"title":"The Awards","content":[{"text":"Vietnam Young Lions","link":"https:\/\/vietnamyounglions.net\/#aim-intro"},{"text":"The Most Winning Agency","link":"https:\/\/vietnamyounglions.net\/#winners"},{"text":"The Most Winning Client","link":"https:\/\/vietnamyounglions.net\/#winners"},{"text":"The Most Winning University","link":"https:\/\/vietnamyounglions.net\/#winners"}]}}',
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
