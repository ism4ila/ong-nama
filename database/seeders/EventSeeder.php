<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => [
                'fr' => 'Collecte de Fonds Annuelle',
                'ar' => 'حملة جمع التبرعات السنوية'
            ],
            'description_raw' => json_encode([
                'fr' => 'Rejoignez-nous pour notre événement annuel de collecte de fonds pour soutenir nos futurs projets.',
                'ar' => 'انضموا إلينا في حملتنا السنوية لجمع التبرعات لدعم مشاريعنا المستقبلية.'
            ]),
            'start_datetime' => now()->addMonth()->setHour(18)->setMinute(0),
            'end_datetime' => now()->addMonth()->setHour(22)->setMinute(0),
            'location' => [
                'fr' => 'Salle Communautaire Principale',
                'ar' => 'القاعة المجتمعية الرئيسية'
            ]
        ]);

        Event::create([
            'title' => [
                'fr' => 'Conférence sur l\'Eau et le Développement Durable',
                'ar' => 'مؤتمر حول المياه والتنمية المستدامة'
            ],
            'description_raw' => json_encode([
                'fr' => 'Une conférence éducative sur l\'importance de l\'accès à l\'eau potable et les solutions durables.',
                'ar' => 'مؤتمر تثقيفي حول أهمية الوصول إلى المياه النظيفة والحلول المستدامة.'
            ]),
            'start_datetime' => now()->addWeeks(2)->setHour(10)->setMinute(0),
            'end_datetime' => null,
            'location' => [
                'fr' => 'Université de la Ville',
                'ar' => 'جامعة المدينة'
            ]
        ]);
    }
}
