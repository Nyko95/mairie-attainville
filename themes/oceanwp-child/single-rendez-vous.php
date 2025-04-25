<?php get_header(); ?>

<main class="single-evenement">
  <!-- Fil d'Ariane -->
  <nav class="breadcrumb">
    <a href="<?php echo home_url(); ?>">Accueil</a> &raquo;
    <a href="<?php echo get_post_type_archive_link('evenement'); ?>">Événements</a> &raquo;
    <span><?php the_title(); ?></span>
  </nav>

  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article class="event-details" itemscope itemtype="https://schema.org/Event">

        <!-- Titre -->
        <h1 class="event-title" itemprop="name"><?php the_title(); ?></h1>

        <!-- Date et heure -->
        <?php if (get_field('heure_debut')) : ?>
          <p class="event-date">
            <i class="fas fa-calendar-alt"></i>
            <time datetime="<?php echo esc_attr(get_field('heure_debut')); ?>" itemprop="startDate">
              <?php
                $datetime = get_field('heure_debut');
                echo date_i18n('j F Y \à H:i', strtotime($datetime));
              ?>
            </time>
          </p>
        <?php endif; ?>

        <!-- Image -->
        <?php if (has_post_thumbnail()) : ?>
          <figure class="event-image" itemprop="image">
            <?php the_post_thumbnail('large'); ?>
          </figure>
        <?php endif; ?>

        <!-- Métadonnées -->
        <div class="event-meta">
          <?php if (get_field('lieu')) : ?>
            <p itemprop="location" itemscope itemtype="https://schema.org/Place">
              <i class="fas fa-map-marker-alt"></i>
              <strong>Lieu :</strong>
              <span itemprop="name"><?php the_field('lieu'); ?></span>
            </p>
          <?php endif; ?>

          <?php if (get_field('adresse_evenement')) : ?>
            <p>
              <i class="fas fa-location-dot"></i>
              <strong>Adresse :</strong>
              <span itemprop="address"><?php the_field('adresse_evenement'); ?></span>
            </p>
          <?php endif; ?>
        </div>

        <!-- Accroche complète -->
        <div class="event-description" itemprop="description">
          <?php
            $accroche = get_field('accroche');
            if ($accroche) {
              echo wp_kses_post($accroche); // Affiche l'accroche avec les balises autorisées
            } else {
              echo "<em>Aucune accroche définie.</em>";
            }
          ?>
        </div>

        <!-- Lien d'infos -->
        <?php if (get_field('lien_infos')) : ?>
          <p>
            <a href="<?php the_field('lien_infos'); ?>" class="btn" itemprop="url">S'inscrire / En savoir plus</a>
          </p>
        <?php endif; ?>

      </article>

    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>