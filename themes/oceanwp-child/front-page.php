<?php get_header(); ?>

<main class="hero" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/attainville-paysage.jpg');">
    <div class="hero-content">
        <!-- Titre principal de la page -->
        <h1>Bienvenue sur le site de la mairie d’Attainville</h1>
        
        <!-- Formulaire de recherche -->
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" class="search-field" placeholder="Que recherchez-vous ?" name="s" />
            <button type="submit" class="search-submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</main>

<!-- Section carrousel de services -->
<section class="services-carousel">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- Carte 1 -->
            <a href="/demarches/carte-identite" class="swiper-slide service-card">
                <i class="fa fa-id-card icon"></i>
                <h3>Cartes d'identité & Passeport</h3>
                <p>Effectuez vos démarches administratives en ligne.</p>
            </a>

            <!-- Carte 2 -->
            <a href="/signaler-probleme" class="swiper-slide service-card">
                <i class="fa fa-exclamation-triangle icon"></i>
                <h3>Signaler un problème</h3>
                <p>Informez la mairie d’un souci dans votre quartier.</p>
            </a>

            <!-- Carte 3 -->
            <a href="/annuaire" class="swiper-slide service-card">
                <i class="fa fa-address-book icon"></i>
                <h3>Annuaire</h3>
                <p>Consultez les contacts utiles de la commune.</p>
            </a>
        </div>
    </div>
</section>

<!-- Section Actualités -->
<section class="actualites-section">
  <div class="section-title">
    <span class="sur-titre"><i class="fa fa-info-circle"></i> Actualités</span>
    <h2>À LA <span>UNE</span></h2>
  </div>

  <div class="actus-grid">
    <?php
    $actus = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'category_name'  => 'actualite',
    ]);

    if ($actus->have_posts()) :
      while ($actus->have_posts()) : $actus->the_post(); ?>
        <article class="actu-item">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <div class="actu-img">
                <?php the_post_thumbnail('medium_large'); ?>
              </div>
            <?php endif; ?>
            <div class="actu-content">
              <h3><?php the_title(); ?></h3>
              <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            </div>
          </a>
        </article>
      <?php endwhile;
      wp_reset_postdata();
    else : ?>
      <p>Aucune actualité disponible pour le moment.</p>
    <?php endif; ?>
  </div>

  <div class="voir-tout">
    <a href="<?php echo get_category_link(get_category_by_slug('actualite')->term_id); ?>" class="btn-voir-tout">
      Voir toutes les actualités <i class="fa fa-arrow-right"></i>
    </a>
  </div>
</section>


<?php get_footer(); ?>