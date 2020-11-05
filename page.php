<?php 
the_post(); 
get_header(); ?>

<body>
<div class="site-wrapper site-layout--default">
<header id="header" class="site-header site-header--bottom">
		
			<!-- Logo - Image Based -->
			<div class="header-logo header-logo--img">
				<a href="<?php echo esc_url(home_url()); ?>">
				<?php $logo = get_theme_mod( 'langona_header_logo', '' ); ?>
            <img src="<?php echo esc_url( $logo ); ?>" srcset="assets/img/logo@2x.png 2x" alt="Necromancers"></a>
			</div>
			<!-- Logo - Image Based / End -->
		
		
			<!-- Main Navigation -->
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
		</header>
        <?php the_content(); ?>
<?php get_footer(); ?>