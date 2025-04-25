<?php get_header(); ?>

<main class="archive-evenements">
  <div class="container">

    <!-- Header de la catégorie -->
    <header class="archive-header">
      <h1>Nos événements</h1>
      <p class="result-count">
        <?php
        $total_posts = $wp_query->found_posts;
        echo $total_posts . ' événement' . ($total_posts > 1 ? 's' : '');
        ?>
      </p>
    </header>

    <!-- Grille des événements -->
    <div class="evenements-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="evenement-item">
          <a href="<?php the_permalink(); ?>">
            <div class="evenement-img">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large'); ?>
              <?php endif; ?>
            </div>

            <div class="evenement-content">
              <h3><?php the_title(); ?></h3>
              <div class="evenement-date">
                <?php if (get_field('heure_evenement')) : ?>
                  <p><strong>Heure :</strong> <?php the_field('heure_evenement'); ?></p>
                <?php endif; ?>
                <p><strong>Publié le :</strong> <?php echo date_i18n('j F Y', strtotime(get_the_date())); ?></p>
              </div>
              <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            </div>
          </a>
        </article>
      <?php endwhile; else : ?>
        <p>Aucun événement disponible pour le moment.</p>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <?php the_posts_pagination([ 
        'mid_size'  => 2, 
        'prev_text' => __('&laquo; Précédent'), 
        'next_text' => __('Suivant &raquo;'),
      ]); ?>
    </div>

  </div>
</main>

<?php get_footer(); ?>