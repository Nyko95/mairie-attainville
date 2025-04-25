<section class="agenda-section">
  <div class="container">

    <div class="section-header">
      <span class="sur-titre"><i class="fas fa-calendar-alt"></i> Agenda</span>
      <h2><span>Nos événements</span></h2>
      <p>Ne manquez aucun événement à venir.</p>
    </div>

    <?php
    $args = [
      'post_type'      => 'rendez-vous',
      'posts_per_page' => 4,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ];
    $query = new WP_Query($args);
    if ($query->have_posts()) : ?>
      <div class="events-grid">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <article class="event-item">
            <a href="<?php the_permalink(); ?>" class="event-link">
              <?php if (has_post_thumbnail()) : ?>
                <div class="event-thumb"><?php the_post_thumbnail('medium'); ?></div>
              <?php endif; ?>

              <h3><?php the_title(); ?></h3>
              <p>
                <?php if (get_field('heure_evenement')) : ?>
                  à <strong><?php the_field('heure_evenement'); ?></strong>
                <?php endif; ?>
                <br>
                📍 <?php the_field('lieu'); ?>
              </p>

              <?php
              $accroche = get_field('accroche');
              if ($accroche) {
                $accroche = wp_strip_all_tags($accroche); // Nettoyage HTML
                echo '<p>' . wp_trim_words($accroche, 20, '...') . '</p>'; // Limité à 20 mots
              }
              ?>

              <?php if (get_field('lien_infos')) : ?>
                <a href="<?php the_field('lien_infos'); ?>" class="btn">En savoir plus</a>
              <?php endif; ?>
            </a>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

      <div class="view-all-events">
      <a href="<?php echo get_post_type_archive_link('rendez-vous'); ?>" class="btn">
  Voir tous les événements
</a>
</div>

    <?php else : ?>
      <p>Aucun événement à venir pour le moment.</p>
    <?php endif; ?>
  </div>
</section>