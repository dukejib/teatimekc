<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use App\Setting;
use App\Tag;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = User::create([
            'name' => 'Ali Jibran',
            'email' => 'dukejib@gmail.com',
            'password' => Hash::make('123456'),
            'slug' => str_slug('Ali Jibran'),
            'isAdmin' => 99  //99 is for Admin
        ]);
        //Add Profile
        Profile::create([
            'user_id' => $user->id,
            'jobtitle' => 'Owner Karacraft',
            'about' => 'Creator & Administrator of Tea Time with Kara ',
            'avatar' => 'uploads/avatars/default_avatar.png',
            'facebook' => 'https://www.facebook.com/alijibranraja',
            'gmail' => 'https://plus.google.com/u/1/+AliJibranRaja',
            'twitter' => 'https://twitter.com/dukejib'
        ]);

        // $this->call(UsersTableSeeder::class);
        $user2 = User::create([
            'name' => 'Seeme Gull',
            'email' => 'seemegull@gmail.com',
            'password' => Hash::make('aug1974born'),
            'slug' => str_slug('Seeme Gull'),
            'isAdmin' => 1 //1 is Owner
        ]);
        //Add Profile
        Profile::create([
            'user_id' => $user2->id,
            'jobtitle' => 'سیاسی غیر سیاسی ',
            'about' => 'ایک عام انسان جو اس دنیا کے پل پل بدلتے رنگوںکو دیکھتا اور محسوس کرتا ہے جو معاشرے میں آہستہ آہستہ سرایت کرتے مادیت پرستی اورانسانیت کی تڑپتی سِسکتی موت کا تماش بہین ہے۔ جو اگرچہ کے خود بھی اس معاشرے کا ہی حصہ ہے مگرپھربھی چاہتا ہے کہ گھٹا ٹوپ اندھیرے میں تھوڑی سے روشنی مل جائے' ,
            'avatar' => 'uploads/avatars/default_avatar.png',
            'facebook' => 'http://www.facebook.com',
            'gmail' => 'http://www.gmail.com',
            'twitter' => 'http://www.twitter.com/blueicedesert'
        ]);
        
        // $this->settings();
        $this->tags();
        $this->categories();
    }

    // public function settings()
    // {
    //     Setting::create([
    //         'site_name' => "Tea Time with Kara",
    //         'contact_no' => '1234556',
    //         'contact_email' => 'seeme@gmail.com',
    //         'twitter_handle' => 'seeme@twitter.com'
    //     ]);
    // }

    public function tags()
    {
        Tag::create(['tag' => 'Tourism']);
        Tag::create(['tag' => 'Chicken']);
        Tag::create(['tag' => 'Pakistan Tehreek-e-Insaf']);
        Tag::create(['tag' => 'Pakistan Army']);
        Tag::create(['tag' => 'KPK']);
        Tag::create(['tag' => 'Sindh']);
        Tag::create(['tag' => 'Balochistan']);
        Tag::create(['tag' => 'Punjab']);
        Tag::create(['tag' => 'Northern Areas']);
        Tag::create(['tag' => 'Fun']);
        Tag::create(['tag' => 'Drama']);
        Tag::create(['tag' => 'Novel']);
        Tag::create(['tag' => 'Book']);
        Tag::create(['tag' => 'Reading']);
        Tag::create(['tag' => 'Cartoons']);
        Tag::create(['tag' => 'Art']);
        Tag::create(['tag' => 'Writing']);
        Tag::create(['tag' => 'Gup Shup']);
        Tag::create(['tag' => 'Friendship']);
    }

    public function categories()
    {
        Category::create(['category' => 'Politics']);
        Category::create(['category' => 'Food']);
        Category::create(['category' => 'Traveling']);
        Category::create(['category' => 'Social']);
        Category::create(['category' => 'Random']);
        Category::create(['category' => 'Poetry']);
        Category::create(['category' => 'Creativity']);

    }
}
