<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::query()->delete(); // Nettoyer avant de semer

        Event::create([
            'title' => [
                'en' => 'Fundraising Gala Dinner',
                'fr' => 'Dîner de Gala pour la Collecte de Fonds',
                'ar' => 'حفل عشاء لجمع التبرعات'
            ],
            'description' => [
                'en' => 'Join us for an evening dedicated to supporting Nama\'s projects.',
                'fr' => 'Rejoignez-nous pour une soirée dédiée au soutien des projets de Nama.',
                'ar' => 'انضموا إلينا في أمسية مخصصة لدعم مشاريع نما.'
            ],
            'start_datetime' => Carbon::parse('2025-07-15 19:00:00'),
            'end_datetime' => Carbon::parse('2025-07-15 23:00:00'),
            'location_text' => [
                'en' => 'Hilton Hotel Ballroom, Yaoundé',
                'fr' => 'Salle de Bal Hôtel Hilton, Yaoundé',
                'ar' => 'قاعة فندق هيلتون، ياوندي'
            ],
            'featured_image_url' => '/images/events/gala2025.jpg', // Chemin exemple
        ]);

        Event::create([
            'title' => [
                'en' => 'Volunteer Day at the Orphanage',
                'fr' => 'Journée Bénévolat à l\'Orphelinat',
                'ar' => 'يوم التطوع في دار الأيتام'
            ],
            'description' => [
                'en' => 'Spend a day with the children, organizing activities and games.',
                'fr' => 'Passez une journée avec les enfants, organisez des activités et des jeux.',
                'ar' => 'اقضوا يوماً مع الأطفال، نظموا أنشطة وألعاب.'
            ],
            'start_datetime' => Carbon::parse('2025-09-10 09:00:00'),
            'end_datetime' => Carbon::parse('2025-09-10 17:00:00'),
            'location_text' => [
                'en' => 'Orphanage Center, Douala',
                'fr' => 'Centre Orphelinat, Douala',
                'ar' => 'مركز الأيتام، دوالا'
            ],
            'featured_image_url' => '/images/events/volunteer_day.jpg', // Chemin exemple
        ]);
    }
}