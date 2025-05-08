<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Projet 1: Mosquée Al-Nour
        Project::create([
            'title' => json_encode([
                'fr' => 'Construction Mosquée Al-Nour',
                'ar' => 'بناء مسجد النور'
            ]),
            'slug' => json_encode([
                'fr' => 'construction-mosquee-al-nour',
                'ar' => 'بناء-مسجد-النور'
            ]),
            'description_short' => json_encode([
                'fr' => 'Une nouvelle mosquée pour la communauté de Ville X.',
                'ar' => 'مسجد جديد لمجتمع مدينة إكس.'
            ]),
            'content_full_raw' => 'La Mosquée Al-Nour sera un lieu de culte moderne pouvant accueillir jusqu\'à 500 fidèles, avec des salles de prière séparées pour les hommes et les femmes, une école coranique et une bibliothèque.',
            'status' => 'ongoing',
            'start_date' => Carbon::parse('2024-01-15'),
            'end_date' => Carbon::parse('2025-06-30'),
            'location_text' => json_encode([
                'fr' => 'Ville X, Quartier Y',
                'ar' => 'مدينة إكس، حي واي'
            ]),
            'latitude' => 11.5141,
            'longitude' => 14.3525,
            'featured_image' => '/images/projects/mosquee_al_nour.jpg',
            'is_featured' => true,
        ]);

        // Projet 2: Puits d'eau potable
        Project::create([
            'title' => json_encode([
                'fr' => 'Puits d\'eau potable à Garoua',
                'ar' => 'بئر مياه صالحة للشرب في غاروا'
            ]),
            'slug' => json_encode([
                'fr' => 'puits-eau-potable-garoua',
                'ar' => 'بئر-مياه-صالحة-للشرب-غاروا'
            ]),
            'description_short' => json_encode([
                'fr' => 'Construction de puits d\'eau potable pour les communautés rurales.',
                'ar' => 'بناء آبار للمياه العذبة للمجتمعات الريفية.'
            ]),
            'content_full_raw' => 'Ce projet vise à fournir de l\'eau potable à plus de 2000 personnes dans des villages ruraux. Les puits seront équipés de pompes manuelles durables et faciles à entretenir par la communauté locale.',
            'status' => 'completed',
            'start_date' => Carbon::parse('2023-05-10'),
            'end_date' => Carbon::parse('2023-12-20'),
            'location_text' => json_encode([
                'fr' => 'Garoua, Région du Nord',
                'ar' => 'غاروا، المنطقة الشمالية'
            ]),
            'latitude' => 9.3017,
            'longitude' => 13.3921,
            'featured_image' => '/images/projects/puits_eau.jpg',
            'is_featured' => true,
        ]);

        // Projet 3: Centre éducatif
        Project::create([
            'title' => json_encode([
                'fr' => 'Centre éducatif pour orphelins',
                'ar' => 'مركز تعليمي للأيتام'
            ]),
            'slug' => json_encode([
                'fr' => 'centre-educatif-orphelins',
                'ar' => 'مركز-تعليمي-للأيتام'
            ]),
            'description_short' => json_encode([
                'fr' => 'Un centre éducatif dédié aux enfants orphelins et défavorisés.',
                'ar' => 'مركز تعليمي مخصص للأطفال الأيتام والمحرومين.'
            ]),
            'content_full_raw' => 'Le centre éducatif accueillera 120 enfants orphelins et défavorisés pour leur offrir une éducation de qualité, des repas quotidiens, et un soutien psychosocial. Le centre comprendra 6 salles de classe, une bibliothèque, une cantine, et des espaces récréatifs.',
            'status' => 'planned',
            'start_date' => Carbon::parse('2025-03-01'),
            'location_text' => json_encode([
                'fr' => 'Yaoundé, Région du Centre',
                'ar' => 'ياوندي، المنطقة الوسطى'
            ]),
            'latitude' => 3.8480,
            'longitude' => 11.5021,
            'featured_image' => '/images/projects/centre_educatif.jpg',
            'is_featured' => false,
        ]);

        // Projet 4: Distribution alimentaire
        Project::create([
            'title' => json_encode([
                'fr' => 'Distribution alimentaire pendant le Ramadan',
                'ar' => 'توزيع الطعام خلال شهر رمضان'
            ]),
            'slug' => json_encode([
                'fr' => 'distribution-alimentaire-ramadan',
                'ar' => 'توزيع-الطعام-رمضان'
            ]),
            'description_short' => json_encode([
                'fr' => 'Distribution de colis alimentaires aux familles nécessiteuses pendant le mois sacré.',
                'ar' => 'توزيع سلال غذائية للعائلات المحتاجة خلال الشهر الكريم.'
            ]),
            'content_full_raw' => 'Chaque année pendant le Ramadan, notre association distribue des colis alimentaires contenant des denrées essentielles (riz, huile, dates, farine, etc.) à plus de 500 familles dans le besoin à travers le pays.',
            'status' => 'ongoing',
            'start_date' => Carbon::parse('2024-03-10'), // Date approximative du Ramadan 2024
            'end_date' => Carbon::parse('2024-04-09'),
            'location_text' => json_encode([
                'fr' => 'Plusieurs régions du Cameroun',
                'ar' => 'مناطق متعددة من الكاميرون'
            ]),
            'featured_image' => '/images/projects/distribution_ramadan.jpg',
            'is_featured' => true,
        ]);

        // Projet 5: Campagne médicale
        Project::create([
            'title' => json_encode([
                'fr' => 'Campagne médicale dans les zones rurales',
                'ar' => 'حملة طبية في المناطق الريفية'
            ]),
            'slug' => json_encode([
                'fr' => 'campagne-medicale-zones-rurales',
                'ar' => 'حملة-طبية-مناطق-ريفية'
            ]),
            'description_short' => json_encode([
                'fr' => 'Soins médicaux gratuits pour les populations isolées.',
                'ar' => 'رعاية طبية مجانية للسكان المعزولين.'
            ]),
            'content_full_raw' => 'Notre équipe médicale mobile composée de médecins bénévoles se déplace dans les villages isolés pour offrir des consultations gratuites, des médicaments essentiels et des campagnes de vaccination. Nous prévoyons de soigner plus de 3000 patients lors de cette campagne.',
            'status' => 'planned',
            'start_date' => Carbon::parse('2025-01-20'),
            'end_date' => Carbon::parse('2025-02-28'),
            'location_text' => json_encode([
                'fr' => 'Régions de l\'Extrême-Nord et du Nord',
                'ar' => 'مناطق أقصى الشمال والشمال'
            ]),
            'latitude' => 10.5924,
            'longitude' => 14.3287,
            'featured_image' => '/images/projects/campagne_medicale.jpg',
            'is_featured' => false,
        ]);
    }
}