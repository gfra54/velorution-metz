<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>


<?php if ($apropos = get_post_by_name('a-propos', 'page')) { ?>
  <!-- Begin About Me Section -->
  <div class="section-light about-me" id="a-propos">
    <div class="container">
      <div class="column is-12 about-me">
        <h1 class="title has-text-centered section-title"><?php echo $apropos->post_title; ?></h1>
      </div>
      <div class="columns is-multiline">
        <div class="column is-6 has-vertically-aligned-content" data-aos="fade-right">
          <?php if ($apropos->post_excerpt) { ?>
            <p class="is-larger">
              <strong><?php echo $apropos->post_excerpt; ?></strong>
            </p>
            <br />
          <?php } ?>
          <p><?php echo $apropos->post_content; ?></p>

        </div>
        <div class="column is-6 right-image " data-aos="fade-left">
          <img class="is-rounded" src="<?php echo get_the_post_thumbnail_url($apropos); ?>" alt="" />
        </div>
      </div>
    </div>
  </div>
  <!-- End About Me Content -->
<?php } ?>


<?php
$timestamp = strtotime('last fri of this month -7 days'); ?>
<a id="dates" name="dates"></a>
<div class="section-dark resume">
  <div class="container">
    <div class="columns is-multiline" data-aos="fade-in" data-aos-easing="linear">
      <div class="column is-12 about-me">
        <h1 class="title has-text-centered section-title">
          Prochaines vélorutions
        </h1>
      </div>
      <div class="column is-10 has-text-centered is-offset-1">
        <?php if (get_field('calculer_automatiquement', 'option')) { ?>
          <p>La vélorution Metz a lieu tous les derniers vendredis du mois sur parvis de la gare de Metz à 19h.</p>
          <h2 class="subtitle mt-5">
            La prochaine vélorution aura lieu le <?php
                                                  $timestamp = strtotime('last fri of this month');
                                                  echo strftime("%d %B %Y", $timestamp);
                                                  ?> à 19h !

          </h2>
          <p> La suivante aura lieu le
            <?php
            $timestamp = strtotime('last fri of next month');
            echo strftime("%d %B %Y", $timestamp);
            ?>.
          </p>
        <?php } else { ?>
          <?php echo get_field('texte_prochaines_dates', 'option'); ?>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php if($banniere = get_field('banniere', 'option')) {?>
<br>
<img src="<?php echo $banniere ?>" style="width:100%;">
<br>
<br>
<?php }?>


<div id="objectifs" class="section-color services" id="services">
  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-12 about-me" data-aos="fade-in" data-aos-easing="linear">
        <h1 class="title has-text-centered section-title">Les objectifs</h1>

        <h2 class="subtitle">
          Les objectifs de la vélorution sont nombreux et non définis strictement, de par sa constitution. Chaque collectif décide des valeurs et des objectifs à faire passer par ces manifestations. La plupart des groupes de vélorution reprennent des revendications communes avec le cyclisme urbain:
        </h2>
        <br />
      </div>
      <div class="columns is-12">
        <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
          <i class="fad fa-road fa-3x"></i>
          <hr />
          <big>Le code de la rue</big>
          <h2>
            L'ensemble des règlements de circulation urbaine destinés à une circulation apaisée.
          </h2>
        </div>
        <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
          <i class="fas fa-city fa-3x"></i>
          <hr />
          <big>Aménagement de l'espace</big>
          <h2>
            Il joue un rôle fondamental dans le développement de la marche et du vélo.
          </h2>
        </div>
        <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
          <i class="fas fa-bicycle fa-3x"></i>
          <hr />
          <big>Prise en compte du vélo</big>
          <h2>
            A tous les niveaux, local, régional et national, en tant que solution de transport.
          </h2>
        </div>
      </div>
      <hr />
    </div>
  </div>
</div>
<!-- End Services Content -->

<?php if ($gallerie = get_post_by_name('gallerie', 'page')) { ?>
  <?php


  // Parse blocks in the content.
  $block = current(parse_blocks($gallerie->post_content));
  ?>
  <!-- Begin Work Content -->
  <div id="galerie" class="section-dark my-work" id="my-work">
    <div class="container">
      <div class="columns is-multiline" data-aos="fade-in" data-aos-easing="linear">
        <div class="column is-12">
          <h1 class="title has-text-centered section-title">Gallerie</h1>
        </div>
        <div class="column is-12">
          <?php echo render_block($block); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Work Content -->
<?php } ?>
<!-- Begin Contact Content -->
<div class="section-light contact" id="contact">
  <div class="container">
    <div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
      <div class="column is-12 about-me">
        <h1 class="title has-text-centered section-title">
          Contact
        </h1>
      </div>
      <div class="column is-8 is-offset-2">
        Pour plus d'informations, <a href="https://www.facebook.com/velorutionmetz/">consultez la page Facebook de la vélorution</a> ou envoyez un mail à <a href="mailto:contact@velorution-metz.fr">contact@velorution-metz.fr</a>.
      </div>
    </div>
  </div>
</div>
<!-- End Contact Content -->

<?php
get_footer();
