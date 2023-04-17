<style>
.hero.is-medium {
  background: linear-gradient(rgba(254,225,0, 0.65), rgba(254,225,0, 0.65)), rgba(0, 0, 0, 0.55) url(<?php the_field('photo_dillustration', 'option'); ?>) no-repeat;
  /* background-attachment: fixed; */
  background-size: cover;
  color: white;
  box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  font-family: 'Poppins', sans-serif;
  background-position: center bottom;
}

</style>

<!-- Begin Preloader -->
    <div class="preloader-wrapper">
      <div class="preloader">
        <img src="img/preloader.gif" alt="" />
      </div>
    </div>
    <!-- End Preloader-->
    <!-- Begin Scroll Up Button -->

    <!--<form action="#home">
      <button id="toTop" title="Go to top">
        <i class="fas fa-angle-up"></i>
      </button>
    </form>-->
    <!-- End Scroll Up Button -->

    <!-- Begin Header -->
    <div class="header-wrapper" id="home">
      <!-- Begin Hero -->
      <section class="hero is-medium">
        <!-- Begin Mobile Nav -->
        <nav class="navbar is-transparent is-hidden-desktop">
          <!-- Begin Burger Menu -->
          <div class="navbar-brand">
            <div class="navbar-burger burger" data-target="mobile-nav">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <!-- End Burger Menu -->
          <div id="mobile-nav" class="navbar-menu">
          <div class="navbar-end">
          <?php foreach(wp_get_nav_menu_items('menu') as $menu){?>
            <div class="navbar-item">
              <a class="navbar-item" href="<?php echo $menu->url;?>"><?php echo $menu->title;?></a>
            </div>
            <?php }?>
          </div>
        </div>
        </nav>
        <!-- End Mobile Nav -->
        <!-- Begin Hero Content-->
        <div class="hero-body">
          <div class="container has-text-centered">
          <img src="<?php the_field('logo', 'option'); ?>" style="width:100%;max-width:300px">
          </div>
        </div>
        <!-- End Hero Content-->
        <!-- Begin Hero Menu -->
        <div class="hero-foot ">
          <div class="hero-foot--wrapper">
            <div class="columns">
              <div class="column is-12 hero-menu-desktop has-text-centered">
                <ul>
                <?php foreach(wp_get_nav_menu_items('menu') as $menu){?>
                  <li class="is-active">
                    <a href="<?php echo $menu->url;?>"><?php echo $menu->title;?></a>
                  </li>
                  <?php }?>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End Hero Menu -->
      </section>
      <!-- End Hero -->
    </div>
    <!-- End Header -->

    <!-- Begin Main Content -->
    <div class="main-content">