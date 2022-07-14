<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Socialmedia;
use App\Models\Brakingnews;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Contact::create([
            'contact_phone_one' => '+012 345 67890 ',
            'contact_phone_two' => '+91 123 456 788 0 ',
            'contact_email_one' => 'info@beps.com',
            'contact_email_two' => 'beps@gmail.com',
            'contact_address_one' => '123 Street, New York, USA',
            'contact_address_two' => '',
            'contact_status' => 1,
        ]);

        Brakingnews::create([
            'brakingnews_one' => 'চরমপন্থা ঠেকাতে বাংলাদেশে স্থানীয় বিশেষজ্ঞ নিয়োগ দিয়েছে ফেসবুক',
            'brakingnews_two' => 'পুরো টুইটার কিনে নেওয়ার প্রস্তাব দিলেন এলন মাস্ক',
            'brakingnews_three' => 'বন্ধ হয়ে গেল ‘অ্যালেক্সা ডটকম’',
            'brakingnews_four' => '',
            'brakingnews_status' => 1,
        ]);

        Socialmedia::create([
            'sm_facebook' => 'facebook',
            'sm_twitter' => 'twitter',
            'sm_linkedin' => 'linkdin',
            'sm_dribbble' => 'dribble',
            'sm_youtube' => 'youtube',
            'sm_slack' => '',
            'sm_instagram' => '',
            'sm_behance' => '',
            'sm_google' => '',
            'sm_reddit' => '',
            'sm_status' => 1,
        ]);
    }
}
