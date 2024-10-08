<?php
/*
Template Name: Home
*/

wp_enqueue_script('velorution-metz-script', get_template_directory_uri() . '/js/showcase.js', array(), wp_get_theme()->get('Version'), true);
wp_enqueue_script('velorution-metz-script-email', get_template_directory_uri() . '/js/email.js', array(), wp_get_theme()->get('Version'), true);
wp_enqueue_style('velorution-metz-style', get_template_directory_uri() . '/css/showcase.css', array(), wp_get_theme()->get('Version'));


$timestamp = strtotime('last fri of this month -7 days');
get_header();

get_template_part('template-parts/site/header');
?>

<?php if (get_field('calculer_automatiquement', 'option')) { ?>
  <a href="#dates" onclick="$(this).fadeOut()" class="notification is-success" style="background:rgba(254, 225, 0, 0.8);color:#333;position:fixed;bottom:1em;left:1em;z-index:10;margin:0;margin-right:1em">
    La prochaine vélorution aura lieu le
    <strong><?php
            $timestamp = strtotime('last fri of this month');
            echo str_replace(date('Y'), '', utf8_encode(strftime("%A %d %B %Y", $timestamp)));
            ?> à 19h</strong>&nbsp;!
            <?php /*<br><b>Peur d'oublier ? <u>Inscrivez-vous ici</u></b> et vous préviendra !*/?>
  </a>
<?php } ?>


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
?>


<a id="dates" name="dates"></a>
<div class="section-dark">
  <div class="container">
    <div class="columns is-multiline" data-aos="fade-in" data-aos-easing="linear">
      <div class="column is-12 about-me">
        <h1 class="title has-text-centered section-title">
          Prochaines vélorutions
        </h1>
      </div>
      <div class="column is-10 has-text-centered is-offset-1">

        <?php if (get_field('calculer_automatiquement', 'option')) { ?>
          <p>La vélorution Metz a lieu tous les derniers vendredis du mois sur. Départ prévu depuis le parvis de la gare de Metz à 19h.</p>
          <h2 class="subtitle mt-5">
            La prochaine vélorution aura lieu le <?php
                                                  $timestamp = strtotime('last fri of this month');
                                                  echo utf8_encode(strftime("%A %d %B %Y", $timestamp));
                                                  ?> à 19h !

          </h2>
          <p> La suivante aura lieu le
            <?php
            $timestamp = strtotime('last fri of next month');
            echo utf8_encode(strftime("%A %d %B %Y", $timestamp));
            ?>.
          </p><br><br>
          <p><i><small>Ces dates sont calculées automatiquement sur la base du "dernier vendredi de chaque mois". Il ne s'agit pas d'un rendez-vous en tant que tel. </small></i></p>
        <?php } else { ?>
          <?php echo get_field('texte_prochaines_dates', 'option'); ?>
        <?php } ?>



      </div>
    </div>
  </div>
</div>
<?php /*
<a id="newsletter" name="newsletter"></a>
<div class="pt-5 pb-5" style="background:rgb(254, 225, 0)">
  <div class="container">
    <div class="columns is-multiline" data-aos="fade-in" data-aos-easing="linear">
      <div class="column is-6 has-text-centered is-offset-3">
        <form id="email">
          <h4 class="title is-5">Vous avez peur de rater la date ?</h4>
          <h5 class="subtitle is-6">Entrez votre adresse mail ci-dessous et vous tiendrons informé des prochaines vélorutions</h5>
          <div class="field">
            <label class="label">Adresse e-mail</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input" type="email" placeholder="Votre adresse e-mail" value="">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
            <p class="help">Cette adresse ne sera partagée avec personne.</p>
          </div>
          <button class="button is-link">Valider l'inscription</button>
          <br>
          <a href="./wp-admin/profile.php" class="button is-small is-text">Déjà inscrit ? Cliquez ici pour gérer vos préférences</a>
        </form>


      </div>
    </div>
  </div>
</div>


<?php 

*/

if ($faq = get_post_by_name('questions-frequentes', 'page')) { ?>
  <!-- Begin About Me Section -->
  <div class="section-light about-me" id="questions-frequentes" style="max-width:800px;margin:0 auto">
    <div class="container">
      <div class="column is-12 about-me">
        <h1 class="title has-text-centered section-title"><?php echo $faq->post_title; ?></h1>
      </div>
      <div class="columns is-multiline">
        <?php if ($faq->post_excerpt) { ?>
          <p class="is-larger">
            <strong><?php echo $faq->post_excerpt; ?></strong>
          </p>
          <br />
        <?php } ?>
        <p><?php echo apply_filters("the_content", $faq->post_content); ?></p>

      </div>
    </div>
  </div>
  <!-- End About Me Content -->
<?php } ?>
<?php /*
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


<?php */
/*
if (get_field('afficher_actus', 'option') && have_posts()) { ?>

  <div id="actus" class="section-dark">
    <div class="container">
      <div class="columns is-multiline">
        <div class="column is-12">
          <h1 class="title has-text-centered section-title">Actualités</h1>
        </div>
        <div class="column is-three-fifths is-offset-one-fifth about-me aos-init aos-animate" data-aos="fade-in" data-aos-easing="linear">
          <?php
          while (have_posts()) {
            the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <header class="entry-header alignwide">
                <?php the_title('<h2 class="title">', '</h2>'); ?>
                Le <?php the_date('d/m/Y'); ?>
              </header><!-- .entry-header -->
              <br>
              <div class="content"><?php the_content(); ?></div>

            </article>
            <br>
            <hr><br>
          <?php
          } ?>
        </div>
      </div>
    </div>
  </div>
<?php
}*/ ?>


<?php if ($banniere = get_field('banniere', 'option')) { ?>
  <br>
  <img src="<?php echo $banniere ?>" style="width:100%;">
  <br>
  <br>
<?php } ?>

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
<?php } /*?>
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
        Pour plus d'informations, <a href="https://www.facebook.com/velorutionmetz/">consultez notre page Facebook</a> ou <a href="https://twitter.com/VelorutionMetz">notre compte Twitter</a> ou envoyez un mail à <a href="mailto:contact@velorution-metz.fr">contact@velorution-metz.fr</a>.
      </div>
    </div>
  </div>
</div>
<!-- End Contact Content -->

<?php
*/
get_template_part('template-parts/site/footer');
get_footer();
