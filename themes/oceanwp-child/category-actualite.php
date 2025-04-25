<!-- Disposition de la page de TOUTES les actus -->
<?php get_header(); ?>

<main class="archive-actualites">
  <div class="container">

    <!-- Header de la catégorie -->
    <header class="archive-header">
      <h1>Actualités</h1>
      <p class="result-count">
        <?php
        $total_posts = $wp_query->found_posts;
        echo $total_posts . ' résultat' . ($total_posts > 1 ? 's' : '');
        ?>
      </p>
    </header>

    <!-- Grille des actualités -->
    <div class="actus-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="actu-item">
          <a href="<?php the_permalink(); ?>">
            <div class="actu-img">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large'); ?>
              <?php endif; ?>
            </div>

            <div class="actu-content">
              <h3><?php the_title(); ?></h3>
              <div class="actu-date">
                <p><strong>Publié le :</strong> <?php echo date_i18n('j F Y', strtotime(get_the_date())); ?></p>
              </div>
              <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            </div>
          </a>
        </article>
      <?php endwhile; else : ?>
        <p>Aucune actualité disponible pour le moment.</p>
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