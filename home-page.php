<?php 

/*
* Template Name: Home
*/
the_post();
get_header(); ?>

<body class="site-layout--landing preloader-is--active bg-image bg-fixed bg--texture-05">
<div class="site-wrapper">

<!-- Header
================================================== -->
<header id="header" class="site-header site-header--landing">

    <!-- Main Navigation Left -->
    <nav class="main-nav">
    <?php
            $langona_menu = wp_nav_menu( array(
                'theme_location' => 'mainmenu',
                'menu_id'        => 'nav',
                'menu_class'     => 'main-nav__list',
                'depth'          => 4,
                'echo'           => false
            ) );
            $langona_menu = str_replace("menu-item-has-children","menu-item-has-children dropdown",$langona_menu);
            echo wp_kses_post($langona_menu);
        ?>
    </nav>
    <!-- Main Navigation Left / End -->

    <!-- Logo - Image Based -->
    <div class="header-logo header-logo--img">
        
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php $logo = get_theme_mod( 'langona_header_logo', '' ); ?>
            <img src="<?php echo esc_url( $logo ); ?>" srcset="assets/img/logo@2x.png 2x" alt="Necromancers">
        </a>
    </div>
    <!-- Logo - Image Based / End -->

    <!-- Main Navigation Right -->
    <nav class="main-nav">
    <?php
            $langona_menu = wp_nav_menu( array(
                'theme_location' => 'secondary',
                'menu_id'        => 'nav',
                'menu_class'     => 'main-nav__list',
                'depth'          => 4,
                'echo'           => false
            ) );
            $langona_menu = str_replace("menu-item-has-children","menu-item-has-children dropdown",$langona_menu);
            echo wp_kses_post($langona_menu);
        ?>
    </nav>
    <!-- Main Navigation Right / End -->
</header>
<!-- Header / End -->
<?php the_content(); ?>
<!-- Content
================================================== -->

<div class="landing-detail landing-detail--left">
			<span>&nbsp;</span>
			<span>&nbsp;</span>
			<span>&nbsp;</span>
		</div>
		<div class="landing-detail-cover landing-detail-cover--left">
			<span>&nbsp;</span>
			<span>&nbsp;</span>
			<span>&nbsp;</span>
		</div>
		<div class="landing-detail landing-detail--right">
			<span>&nbsp;</span>
			<span>&nbsp;</span>
			<span>&nbsp;</span>
		</div>
		<div class="landing-detail-cover landing-detail-cover--right">
			<span>&nbsp;</span>
			<span>&nbsp;</span>
			<span>&nbsp;</span>
		</div>
<?php get_footer(); ?>