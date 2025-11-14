<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'City Pop-Up Meetup',
            'description' => 'A vibrant networking meetup for creators and fans with live demos and Q&A.',
            'date' => now()->addWeek(),
            'location_name' => 'Downtown Hub',
            'lat' => 36.8065,
            'lng' => 10.1815,
            'influencer_name' => 'Catchy Influencer',
            'contact_email' => 'contact@example.com',
            'contact_phone' => '+1 555-000-1234',
            'reservation_url' => 'https://example.com/reserve',
            'tags' => ['fashion','meetup','city'],
        ]);
    }
}
