<?php get_header(); ?>
<main class="single-actualite">
  <!-- Fil d'ariane -->
  <nav class="breadcrumb">
    <a href="<?php echo home_url(); ?>">Accueil</a> &raquo;
    <a href="<?php echo get_category_link(get_cat_ID('actualité')); ?>">Actualités</a> &raquo;
    <span><?php the_title(); ?></span>
  </nav>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="actu-full">
      <h1 class="actu-title"><?php the_title(); ?></h1>
      <p class="actu-date">Publié le <?php echo get_the_date(); ?></p>

      <?php if (has_post_thumbnail()) : ?>
        <div class="actu-thumbnail">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <div class="actu-texte">
        <?php the_content(); ?>
      </div>

      <div class="actu-share">
        <span>Partager sur :</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener" title="Partager sur Facebook">
          <i class="fab fa-facebook"></i>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" rel="noopener" title="Partager sur LinkedIn">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" title="Partager par email">
          <i class="fas fa-envelope"></i>
        </a>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>