<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug->en' => 'about-us'], // Condition de recherche
            [ // Valeurs à créer ou mettre à jour
                'title' => ['en' => 'About Us', 'fr' => 'À Propos de Nous', 'ar' => 'من نحن'],
                'slug' => ['en' => 'about-us', 'fr' => 'a-propos-de-nous', 'ar' => 'من-نحن'],
                'body' => [
                    'en' => 'Content for about us page.', 
                    'fr' => 'Contenu pour la page à propos.', 
                    'ar' => 'محتوى صفحة من نحن.'
                ],
                'is_published' => true,
                'show_in_navbar' => true,
                'navbar_order' => 1,
                'meta_title' => ['en' => 'About NAMA', 'fr' => 'À Propos de NAMA', 'ar' => 'عن نما'],
            ]
        );

        Page::updateOrCreate(
            ['slug->en' => 'contact'],
            [
                'title' => ['en' => 'Contact Us', 'fr' => 'Contactez-Nous', 'ar' => 'اتصل بنا'],
                'slug' => ['en' => 'contact', 'fr' => 'contactez-nous', 'ar' => 'اتصل-بنا'],
                'body' => ['en' => 'Contact page content.', 'fr' => 'Contenu de la page contact.', 'ar' => 'محتوى صفحة اتصل بنا.'],
                'is_published' => true,
                'show_in_navbar' => true,
                'navbar_order' => 5, // Exemple d'ordre
                'show_in_footer_navigation' => true,
                'footer_navigation_order' => 5,
            ]
        );
        // Ajoutez d'autres pages si nécessaire (Projets, Actualités, Événements si ce sont des "pages" et non des archives)
        // Si Projets, Actualités, Événements sont des listes d'archives, leurs liens de navbar
        // sont généralement gérés par des routes nommées directement dans le layout ou partiel de navbar.
    }
}