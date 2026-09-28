<?php
/**
 * Template Name: Page Accueil CT Architecte
 * Description: Modèle personnalisé pour la page d'accueil
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CT Architecte d'Intérieur - Conception et optimisation d'espaces sur le Beaujolais et l'Ouest lyonnais">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #382A25;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header fixe */
        .ct-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(56, 42, 37, 0.08);
            padding: 1rem 5%;
        }

        .ct-header-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ct-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }

        .ct-logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #E7E1DC, #A8B2A1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #843A45;
            font-size: 1.3rem;
        }

        .ct-logo-text {
            font-size: 1rem;
            font-weight: 700;
            color: #382A25;
            line-height: 1.3;
        }

        .ct-nav {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .ct-nav a {
            text-decoration: none;
            color: #382A25;
            font-weight: 500;
            font-size: 0.95rem;
            padding-bottom: 0.3rem;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .ct-nav a:hover,
        .ct-nav a.active {
            color: #843A45;
            border-bottom-color: #843A45;
        }

        /* Menu burger mobile */
        .ct-burger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 5px;
        }

        .ct-burger span {
            width: 28px;
            height: 3px;
            background: #382A25;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        /* Hero Section */
        main {
            margin-top: 100px;
        }

        .ct-hero {
            background: linear-gradient(135deg, #E7E1DC 0%, #f5f0eb 100%);
            padding: 5rem 5%;
            position: relative;
            overflow: hidden;
        }

        .ct-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(132, 58, 69, 0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .ct-hero-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .ct-hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #843A45;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .ct-hero-text h2 {
            font-size: 1.5rem;
            font-weight: 500;
            color: #382A25;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .ct-hero-text h3 {
            font-size: 1.8rem;
            font-style: italic;
            color: #843A45;
            margin-bottom: 2rem;
            line-height: 1.3;
        }

        .ct-hero-text p {
            font-size: 1.05rem;
            color: #382A25;
            margin-bottom: 1rem;
            line-height: 1.8;
        }

        .ct-hero-cta {
            display: flex;
            gap: 1.5rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .ct-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .ct-btn-primary {
            background: #843A45;
            color: white;
        }

        .ct-btn-primary:hover {
            background: #6e2f38;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(132, 58, 69, 0.3);
        }

        .ct-btn-secondary {
            background: transparent;
            color: #843A45;
            border: 2px solid #843A45;
        }

        .ct-btn-secondary:hover {
            background: #843A45;
            color: white;
        }

        .ct-hero-image {
            position: relative;
        }

        .ct-hero-image-placeholder {
            width: 100%;
            aspect-ratio: 4/3;
            background: linear-gradient(135deg, #A8B2A1 0%, #c5d1bb 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(56, 42, 37, 0.15);
        }

        /* Footer */
        .ct-footer {
            background: #A8B2A1;
            color: #382A25;
            text-align: center;
            padding: 2.5rem 5%;
            margin: 0 auto;
        }

        .ct-footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .ct-footer p {
            margin: 0.5rem 0;
            font-size: 1rem;
        }

        .ct-footer-subtitle {
            opacity: 0.8;
            font-size: 0.95rem;
        }

        .ct-footer-copyright {
            margin-top: 1.5rem;
            opacity: 0.6;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .ct-nav {
                position: fixed;
                top: 80px;
                right: -100%;
                width: 80%;
                max-width: 300px;
                height: calc(100vh - 80px);
                background: white;
                flex-direction: column;
                padding: 2rem;
                box-shadow: -5px 0 20px rgba(0,0,0,0.1);
                transition: right 0.3s ease;
                gap: 1.5rem;
            }

            .ct-nav.active {
                right: 0;
            }

            .ct-burger {
                display: flex;
            }

            .ct-burger.active span:nth-child(1) {
                transform: rotate(45deg) translate(8px, 8px);
            }

            .ct-burger.active span:nth-child(2) {
                opacity: 0;
            }

            .ct-burger.active span:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -7px);
            }

            .ct-hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .ct-hero-text h1 {
                font-size: 2rem;
            }

            .ct-hero-text h2 {
                font-size: 1.2rem;
            }

            .ct-hero-text h3 {
                font-size: 1.4rem;
            }

            .ct-hero-cta {
                flex-direction: column;
            }

            .ct-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
    
    <!-- Header fixe -->
    <header class="ct-header">
        <div class="ct-header-container">
            <a href="<?php echo home_url(); ?>" class="ct-logo">
                <div class="ct-logo-icon">CT</div>
                <div class="ct-logo-text">
                    CT ARCHITECTE<br>D'INTÉRIEUR
                </div>
            </a>
            
            <nav>
                <ul class="ct-nav" id="ctNav">
                    <li><a href="<?php echo home_url(); ?>" class="active">Accueil</a></li>
                    <li><a href="<?php echo home_url('/prestations'); ?>">Prestations</a></li>
                    <li><a href="<?php echo home_url('/missions'); ?>">Missions</a></li>
                    <li><a href="<?php echo home_url('/realisations'); ?>">Réalisations</a></li>
                    <li><a href="<?php echo home_url('/a-propos'); ?>">À propos</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                </ul>
            </nav>

            <div class="ct-burger" id="ctBurger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="ct-hero">
            <div class="ct-hero-container">
                <div class="ct-hero-text">
                    <h1>CT ARCHITECTE D'INTÉRIEUR</h1>
                    <h2><strong>Architecte d'intérieur diplômée</strong> de l'ESAIL et <strong>qualifiée CFAI</strong></h2>
                    <h3>Votre projet mérite mieux qu'une simple décoration</h3>
                    
                    <p>Spécialisée dans l'accompagnement de <strong>particuliers et professionnels</strong>, je vous aide à transformer vos espaces en lieux qui vous ressemblent : fonctionnels, esthétiques et parfaitement adaptés à votre vie.</p>
                    
                    <p>Basée dans le Beaujolais, j'interviens sur le secteur de Villefranche-sur-Saône, l'Ouest lyonnais, Lyon et sa périphérie pour vos projets de <strong>rénovation et d'optimisation d'espaces</strong>.</p>
                    
                    <p style="margin-top: 1.5rem;">Mon <strong>approche</strong> : une double dimension <strong>esthétique et fonctionnelle</strong>. Je ne me contente pas de créer de beaux espaces : je m'assure qu'ils répondent à vos besoins, respectent votre budget et se concrétisent sans stress.</p>
                    
                    <p style="margin-top: 1rem;"><strong>Disponible en semaine et le samedi</strong>, je m'engage à vous répondre rapidement et à vous offrir un accompagnement sur-mesure du premier rendez-vous jusqu'à la réception des travaux.</p>
                    
                    <div class="ct-hero-cta">
                        <a href="<?php echo home_url('/prestations'); ?>" class="ct-btn ct-btn-primary">Découvrir les prestations</a>
                        <a href="<?php echo home_url('/contact'); ?>" class="ct-btn ct-btn-secondary">Me contacter</a>
                    </div>
                </div>
                
                <div class="ct-hero-image">
                    <div class="ct-hero-image-placeholder">
                        [Remplacez cette div par votre image principale]
                        <!-- Pour ajouter votre image, uploadez-la dans Médias puis remplacez cette div par :
                        <img src="URL_DE_VOTRE_IMAGE" alt="Projet d'architecture d'intérieur" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;"> -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="ct-footer">
        <div class="ct-footer-container">
            <p><strong>Architecte d'intérieur – Beaujolais & Ouest lyonnais</strong></p>
            <p class="ct-footer-subtitle">Intervention : Villefranche-sur-Saône, Gleizé, Lyon Ouest et alentours</p>
            <p class="ct-footer-copyright">&copy; <?php echo date('Y'); ?> CT Architecte d'Intérieur - Tous droits réservés</p>
        </div>
    </footer>

    <script>
        // Menu burger mobile
        const burger = document.getElementById('ctBurger');
        const nav = document.getElementById('ctNav');

        if (burger && nav) {
            burger.addEventListener('click', () => {
                nav.classList.toggle('active');
                burger.classList.toggle('active');
            });

            // Fermer le menu lors du clic sur un lien
            document.querySelectorAll('.ct-nav a').forEach(link => {
                link.addEventListener('click', () => {
                    nav.classList.remove('active');
                    burger.classList.remove('active');
                });
            });

            // Fermer le menu lors du clic en dehors
            document.addEventListener('click', (e) => {
                if (!burger.contains(e.target) && !nav.contains(e.target)) {
                    nav.classList.remove('active');
                    burger.classList.remove('active');
                }
            });
        }
    </script>

    <?php wp_footer(); ?>
</body>
</html>
