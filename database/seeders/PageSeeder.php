<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page; // Importer le modèle Page
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::truncate(); // Optionnel: vider la table avant de la peupler

        // Page "À Propos"
        Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => [
                    'en' => 'About Us - ONG NAMA',
                    'fr' => 'À Propos de Nous - ONG NAMA',
                    'ar' => 'من نحن - منظمة نماء',
                ],
                'content' => [
                    'en' => '<p>ONG NAMA is a dedicated non-governmental organization committed to fostering positive change and sustainable development within communities. Established with a vision to create a world where every individual has the opportunity to thrive, we focus on key areas such as education, healthcare, economic empowerment, and environmental sustainability.</p><h3>Our Mission</h3><p>Our core mission is to empower vulnerable individuals and communities by implementing impactful projects that address their most pressing needs and promote self-sufficiency. We strive to build local capacities and create lasting solutions through collaborative efforts and community participation.</p><h3>Our Vision</h3><p>We envision a just and equitable world where all people have access to the resources and opportunities needed to live with dignity, achieve their full potential, and contribute meaningfully to society.</p><h3>Our Values</h3><ul><li><strong>Integrity:</strong> We uphold the highest standards of honesty and transparency in all our endeavors.</li><li><strong>Compassion:</strong> We approach our work with empathy, respect, and a deep understanding of the challenges faced by the communities we serve.</li><li><strong>Collaboration:</strong> We believe in the power of partnerships with local communities, governments, and other organizations to maximize our impact.</li><li><strong>Sustainability:</strong> We are committed to designing and implementing projects that are environmentally, socially, and economically sustainable.</li><li><strong>Empowerment:</strong> We focus on empowering individuals and communities to become agents of their own change.</li></ul><p>Thank you for your interest in ONG NAMA. Together, we can make a difference.</p>',
                    'fr' => '<p>L\'ONG NAMA est une organisation non gouvernementale dévouée à la promotion du changement positif et du développement durable au sein des communautés. Établie avec la vision de créer un monde où chaque individu a la possibilité de s\'épanouir, nous nous concentrons sur des domaines clés tels que l\'éducation, la santé, l\'autonomisation économique et la durabilité environnementale.</p><h3>Notre Mission</h3><p>Notre mission principale est d\'autonomiser les individus et les communautés vulnérables en mettant en œuvre des projets percutants qui répondent à leurs besoins les plus pressants et favorisent l\'autosuffisance. Nous nous efforçons de renforcer les capacités locales et de créer des solutions durables grâce à des efforts collaboratifs et à la participation communautaire.</p><h3>Notre Vision</h3><p>Nous envisageons un monde juste et équitable où toutes les personnes ont accès aux ressources et aux opportunités nécessaires pour vivre dans la dignité, réaliser leur plein potentiel et contribuer de manière significative à la société.</p><h3>Nos Valeurs</h3><ul><li><strong>Intégrité :</strong> Nous respectons les normes les plus élevées d\'honnêteté et de transparence dans toutes nos entreprises.</li><li><strong>Compassion :</strong> Nous abordons notre travail avec empathie, respect et une profonde compréhension des défis rencontrés par les communautés que nous servons.</li><li><strong>Collaboration :</strong> Nous croyons au pouvoir des partenariats avec les communautés locales, les gouvernements et d\'autres organisations pour maximiser notre impact.</li><li><strong>Durabilité :</strong> Nous nous engageons à concevoir et à mettre en œuvre des projets durables sur les plans environnemental, social et économique.</li><li><strong>Autonomisation :</strong> Nous nous concentrons sur l\'autonomisation des individus et des communautés pour qu\'ils deviennent les acteurs de leur propre changement.</li></ul><p>Merci de votre intérêt pour l\'ONG NAMA. Ensemble, nous pouvons faire la différence.</p>',
                    'ar' => '<p>منظمة نماء هي منظمة غير حكومية متخصصة تلتزم بتعزيز التغيير الإيجابي والتنمية المستدامة داخل المجتمعات. تأسست برؤية لخلق عالم تتاح فيه لكل فرد فرصة الازدهار، ونركز على مجالات رئيسية مثل التعليم والرعاية الصحية والتمكين الاقتصادي والاستدامة البيئية.</p><h3>مهمتنا</h3><p>مهمتنا الأساسية هي تمكين الأفراد والمجتمعات الضعيفة من خلال تنفيذ مشاريع مؤثرة تلبي احتياجاتهم الأكثر إلحاحًا وتعزز الاكتفاء الذاتي. نسعى جاهدين لبناء القدرات المحلية وإيجاد حلول دائمة من خلال الجهود التعاونية ومشاركة المجتمع.</p><h3>رؤيتنا</h3><p>نتصور عالمًا عادلًا ومنصفًا يتمتع فيه جميع الناس بإمكانية الوصول إلى الموارد والفرص اللازمة للعيش بكرامة وتحقيق كامل إمكاناتهم والمساهمة بشكل هادف في المجتمع.</p><h3>قيمنا</h3><ul><li><strong>النزاهة:</strong> نلتزم بأعلى معايير الصدق والشفافية في جميع مساعينا.</li><li><strong>الرحمة:</strong> نتعامل مع عملنا بتعاطف واحترام وفهم عميق للتحديات التي تواجهها المجتمعات التي نخدمها.</li><li><strong>التعاون:</strong> نؤمن بقوة الشراكات مع المجتمعات المحلية والحكومات والمنظمات الأخرى لتعظيم تأثيرنا.</li><li><strong>الاستدامة:</strong> نحن ملتزمون بتصميم وتنفيذ مشاريع مستدامة بيئيًا واجتماعيًا واقتصاديًا.</li><li><strong>التمكين:</strong> نركز على تمكين الأفراد والمجتمعات ليصبحوا عوامل تغيير خاصة بهم.</li></ul><p>نشكركم على اهتمامكم بمنظمة نماء. معًا، يمكننا أن نحدث فرقًا.</p>',
                ],
                'meta_title' => [
                    'en' => 'About ONG NAMA | Our Mission, Vision, and Values',
                    'fr' => 'À Propos de ONG NAMA | Notre Mission, Vision et Valeurs',
                    'ar' => 'عن منظمة نماء | مهمتنا، رؤيتنا وقيمنا',
                ],
                'meta_description' => [
                    'en' => 'Learn more about ONG NAMA, our dedicated team, our mission to empower communities, and our vision for a better future. Join us in making a difference.',
                    'fr' => 'Apprenez-en plus sur l\'ONG NAMA, notre équipe dévouée, notre mission d\'autonomisation des communautés et notre vision d\'un avenir meilleur. Rejoignez-nous pour faire la différence.',
                    'ar' => 'تعرف على المزيد حول منظمة نماء، فريقنا المتفاني، مهمتنا لتمكين المجتمعات، ورؤيتنا لمستقبل أفضل. انضم إلينا في إحداث فرق.',
                ],
                'is_published' => true,
            ]
        );

        // Bloc "Résumé À propos" pour la page d'accueil
        Page::updateOrCreate(
            ['slug' => 'home-about-summary'],
            [
                'title' => [
                    'en' => 'Who We Are & What We Stand For',
                    'fr' => 'Qui Sommes-Nous & Ce Que Nous Défendons',
                    'ar' => 'من نحن وماذا نمثل',
                ],
                'content' => [
                    'en' => '<p>Founded on the principles of compassion and action, ONG NAMA has been a steadfast partner in community development since [Year]. We are dedicated to creating sustainable solutions that empower individuals and uplift entire communities.</p><p>Our work is driven by the belief that everyone deserves a chance to live a life of dignity and purpose. We invite you to explore our initiatives and see how we are turning this belief into reality, one project at a time.</p>',
                    'fr' => '<p>Fondée sur les principes de compassion et d\'action, l\'ONG NAMA est un partenaire fidèle du développement communautaire depuis [Année]. Nous nous consacrons à la création de solutions durables qui autonomisent les individus et élèvent des communautés entières.</p><p>Notre travail est motivé par la conviction que chacun mérite une chance de vivre une vie de dignité et de sens. Nous vous invitons à explorer nos initiatives et à voir comment nous transformons cette conviction en réalité, un projet à la fois.</p>',
                    'ar' => '<p>تأسست منظمة نماء على مبادئ الرحمة والعمل، وهي شريك ثابت في تنمية المجتمع منذ [السنة]. نحن ملتزمون بإيجاد حلول مستدامة تمكن الأفراد وترتقي بالمجتمعات بأكملها.</p><p>عملنا مدفوع بالإيمان بأن كل شخص يستحق فرصة لعيش حياة كريمة وهادفة. ندعوكم لاستكشاف مبادراتنا ورؤية كيف نحول هذا الإيمان إلى حقيقة، مشروعًا تلو الآخر.</p>',
                ],
                'is_published' => true,
            ]
        );

        // Bloc "Ce que nous faisons" pour la page d'accueil
        Page::updateOrCreate(
            ['slug' => 'home-what-we-do'],
            [
                'title' => [
                    'en' => 'Our Key Areas of Intervention',
                    'fr' => 'Nos Domaines Clés d\'Intervention',
                    'ar' => 'مجالات تدخلنا الرئيسية',
                ],
                'content' => [
                    'en' => '<div class="row g-4">
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-graduation-cap fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">Education for All</h4>
                                        </div>
                                        <p class="mb-4">Providing access to quality education and learning resources for children and adults in underserved communities.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-heartbeat fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">Health & Wellness</h4>
                                        </div>
                                        <p class="mb-4">Improving community health through medical support, awareness programs, and access to essential health services.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-female fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">Women Empowerment</h4>
                                        </div>
                                        <p class="mb-4">Supporting women with skills training, micro-finance, and opportunities for economic independence and leadership.</p>
                                    </div>
                                </div>
                            </div>',
                    'fr' => '<div class="row g-4">
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-graduation-cap fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">Éducation pour Tous</h4>
                                        </div>
                                        <p class="mb-4">Fournir l\'accès à une éducation de qualité et à des ressources d\'apprentissage pour les enfants et les adultes des communautés défavorisées.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-heartbeat fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">Santé & Bien-être</h4>
                                        </div>
                                        <p class="mb-4">Améliorer la santé communautaire grâce à un soutien médical, des programmes de sensibilisation et l\'accès aux services de santé essentiels.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-female fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">Autonomisation des Femmes</h4>
                                        </div>
                                        <p class="mb-4">Soutenir les femmes par la formation professionnelle, la microfinance et les opportunités d\'indépendance économique et de leadership.</p>
                                    </div>
                                </div>
                            </div>',
                    'ar' => '<div class="row g-4">
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-graduation-cap fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">التعليم للجميع</h4>
                                        </div>
                                        <p class="mb-4">توفير الوصول إلى التعليم الجيد والموارد التعليمية للأطفال والكبار في المجتمعات المحرومة.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-heartbeat fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">الصحة والعافية</h4>
                                        </div>
                                        <p class="mb-4">تحسين صحة المجتمع من خلال الدعم الطبي وبرامج التوعية والحصول على الخدمات الصحية الأساسية.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="service-item rounded h-100 p-4">
                                        <div class="d-flex align-items-center ms-n5 mb-4">
                                            <div class="service-icon flex-shrink-0 bg-primary rounded-end mt-n1 p-3"><i class="fa fa-female fa-2x text-white"></i></div>
                                            <h4 class="mb-0 ms-4">تمكين المرأة</h4>
                                        </div>
                                        <p class="mb-4">دعم النساء من خلال التدريب على المهارات والتمويل الأصغر وفرص الاستقلال الاقتصادي والقيادة.</p>
                                    </div>
                                </div>
                            </div>',
                ],
                'is_published' => true,
            ]
        );

        // Bloc "Appel à l'Action" pour la page d'accueil - CORRIGÉ
        Page::updateOrCreate(
            ['slug' => 'home-cta'],
            [
                'title' => [
                    'en' => 'Be a Part of the Change',
                    'fr' => 'Faites Partie du Changement',
                    'ar' => 'كن جزءًا من التغيير',
                ],
                'content' => [
                    // Utilisez des chemins relatifs ici au lieu de la fonction route()
                    'en' => '<p>Every contribution, big or small, makes a significant impact on the lives we touch. Your generosity enables us to continue our vital work and reach more communities in need. Join our mission today and help us build a world where everyone has the opportunity to succeed.</p><p><a href="/en/contact#donate-section" class="btn btn-primary_alt rounded-pill py-3 px-5 mt-3 animated slideInLeft">Donate Now</a> <a href="/en/contact" class="btn btn-outline-primary rounded-pill py-3 px-5 mt-3 animated slideInRight ms-2">Volunteer With Us</a></p>',
                    'fr' => '<p>Chaque contribution, grande ou petite, a un impact significatif sur les vies que nous touchons. Votre générosité nous permet de poursuivre notre travail vital et d\'atteindre plus de communautés dans le besoin. Rejoignez notre mission aujourd\'hui et aidez-nous à construire un monde où chacun a la possibilité de réussir.</p><p><a href="/fr/contact#donate-section" class="btn btn-primary_alt rounded-pill py-3 px-5 mt-3 animated slideInLeft">Faire un Don</a> <a href="/fr/contact" class="btn btn-outline-primary rounded-pill py-3 px-5 mt-3 animated slideInRight ms-2">Devenir Bénévole</a></p>',
                    'ar' => '<p>كل مساهمة، كبيرة كانت أم صغيرة، تحدث تأثيرًا كبيرًا في حياة من نلمسهم. كرمك يمكننا من مواصلة عملنا الحيوي والوصول إلى المزيد من المجتمعات المحتاجة. انضم إلى مهمتنا اليوم وساعدنا في بناء عالم تتاح فيه لكل فرد فرصة للنجاح.</p><p><a href="/ar/contact#donate-section" class="btn btn-primary_alt rounded-pill py-3 px-5 mt-3 animated slideInLeft">تبرع الآن</a> <a href="/ar/contact" class="btn btn-outline-primary rounded-pill py-3 px-5 mt-3 animated slideInRight ms-2">تطوع معنا</a></p>',
                ],
                'is_published' => true,
            ]
        );

        $this->command->info('PageSeeder: Static pages seeded successfully.');
    }
}