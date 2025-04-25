<?php get_header(); ?>

<main class="mes-demarches-page">
  <div class="container">

    <!-- Titre de la page -->
    <h1 class="mes-demarches-title"><?php the_title(); ?></h1>

    <!-- Section 1 : Pièces d'identité et citoyenneté -->
    <section class="demarches-section">
      <h2><?php the_field('titre_section_1'); ?></h2>
      <ul class="demarches-list">
        <?php
          $pages = [
            ['titre' => 'titre_page_1_1', 'url' => 'url_page_1_1'],
            ['titre' => 'titre_page_1_2', 'url' => 'url_page_1_2'],
            ['titre' => 'titre_page_1_3', 'url' => 'url_page_1_3'],
          ];

          foreach ($pages as $page) {
            $titre = get_field($page['titre']);
            $url = get_field($page['url']);

            if ($titre && $url) {
              echo '<li><a href="' . esc_url($url) . '">' . esc_html($titre) . '</a></li>';
            }
          }
        ?>
      </ul>
    </section>

<!-- Section 2 : Cadre de vie -->
<section class="demarches-section">
      <h2><?php the_field('titre_section_2'); ?></h2>
      <ul class="demarches-list">
        <?php
          $pages = [
            ['titre' => 'titre_page_2_1', 'url' => 'url_page_2_1'],
            ['titre' => 'titre_page_2_2', 'url' => 'url_page_2_2'],
            ['titre' => 'titre_page_2_3', 'url' => 'url_page_2_3'], // Optionnel, si tu ajoutes un 3ème lien
          ];

          foreach ($pages as $page) {
            $titre = get_field($page['titre']);
            $url = get_field($page['url']);

            if ($titre && $url) {
              echo '<li><a href="' . esc_url($url) . '">' . esc_html($titre) . '</a></li>';
            }
          }
        ?>
      </ul>
    </section>

    <!-- Section 3 : Autres démarches -->
    <section class="demarches-section">
      <h2><?php the_field('titre_section_3'); ?></h2>
      <ul class="demarches-list">
        <?php
          $pages = [
            ['titre' => 'titre_page_3_1', 'url' => 'url_page_3_1'],
            ['titre' => 'titre_page_3_2', 'url' => 'url_page_3_2'],
            ['titre' => 'titre_page_3_3', 'url' => 'url_page_3_3'],
          ];

          foreach ($pages as $page) {
            $titre = get_field($page['titre']);
            $url = get_field($page['url']);

            if ($titre && $url) {
              echo '<li><a href="' . esc_url($url) . '">' . esc_html($titre) . '</a></li>';
            }
          }
        ?>
      </ul>
    </section>

    <!-- Section 4 : Je signale -->
<section class="demarches-section">
  <h2><?php the_field('titre_section_4'); ?></h2>
  <ul class="demarches-list">
    <?php
      $titre = get_field('titre_page_4_1');
      $url = get_field('url_page_4_1');
      if ($titre && $url) {
        echo '<li><a href="' . esc_url($url) . '">' . esc_html($titre) . '</a></li>';
      }
    ?>
  </ul>
</section>

  </div>
</main>

<?php get_footer(); ?>