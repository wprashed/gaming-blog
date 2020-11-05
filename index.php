<?php get_header(); ?>

<body>
<div class="site-wrapper site-layout--classic">
<!-- Header
================================================== -->
<header id="header" class="site-header site-header--top">

    <!-- Logo - Image Based -->
    <div class="header-logo header-logo--img">
        <a href="<?php echo esc_url(home_url()); ?>">
        <?php $logo = get_theme_mod( 'langona_header_logo', '' ); ?>
            <img src="<?php echo esc_url( $logo ); ?>" srcset="assets/img/logo@2x.png 2x" alt="Necromancers">
        </a>
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
    <!-- Header Actions / End -->
</header>
<!-- Header / End -->

<!-- Site Heading
================================================== -->
<div class="page-header page-header--has-overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header__title"><?php bloginfo( 'name' ); ?></h1>
            </div>
        </div>
    </div>
</div>
<main class="site-content blog-layout--classic" id="wrapper">
		
    <div class="site-content__inner">
        <div class="site-content__holder">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <?php
                            while ( have_posts() ) :
                            the_post();
                        ?>
                        <?php get_template_part("/blog-post"); ?>
                        <?php
                            endwhile;
                        ?>

                        <nav class="navigation pagination" role="navigation" aria-label="Posts">
                            <div class="nav-links">
                                <?php
                                    the_posts_pagination(array(
                                        "screen_reader_text"=>' ',
                                        "prev_text" => "<span><i class='fa fa-chevron-left'></i></span>",
                                        "next_text" => "<span><i class='fa fa-chevron-right'></i></span>"
                                    ));
                                ?>
                            </div>
                        </nav>


                    </div>


                    <div class="col-lg-4">

                        <!-- Popular Posts -->
                        <div class="widget widget--sidebar ncr-popular-posts">
                            <div class="widget-content">
                                <h3 class="widget-title">Popular News</h3>
                                <ul class="ncr-posts-list list-unstyled">
                                <?php 
                                    $popularpost = new WP_Query( array( 'posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                                    while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>

                                    <li class="ncr-posts-list__item has-post-thumbnail post">
                                        <div class="post__thumbnail">
                                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('maggie-blog-related') ?>" alt=""></a>
                                        </div>
                                        <div class="post__body">
                                            <div class="post__header">
                                                <ul class="post__cats list-unstyled">
                                                    <li class="post__cats-item color-success">
                                                    <?php the_category( " " ); ?>
                                                    </li>
                                                </ul>
                                                <h2 class="post__title h6"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                <ul class="post__meta list-unstyled">
                                                    <li class="post__meta-item post__meta-item--date">
                                                    <?php 
                                                        $archive_year  = get_the_time('y'); 
                                                        $archive_month = get_the_time('m'); 
                                                        $archive_day   = get_the_time('d'); 
                                                    ?>
                                                    <?php echo esc_html( get_the_date() ); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Popular Posts / End -->

                        <!-- Latest Posts -->
                        <div class="widget widget--sidebar ncr-popular-posts">
                            <div class="widget-content">
                                <h3 class="widget__title">Latest Posts</h3>
                                <ul class="ncr-posts-list ncr-posts-list--thumb-on-bg list-unstyled">
                                    <?php
                                        while ( have_posts() ) :
                                        the_post();
                                    ?>
                                    <li class="ncr-posts-list__item has-post-thumbnail post">
                                        <div class="post__thumbnail">
                                            <img src="<?php the_post_thumbnail_url() ?>" alt="">
                                        </div>
                                        <div class="post__body">
                                            <div class="post__header">
                                                <ul class="post__cats list-unstyled">
                                                    <li class="post__cats-item color-success">
                                                        <?php the_category( " " ); ?>
                                                    </li>
                                                </ul>
                                                <h2 class="post__title h6"><a href="<?php the_permalink(); ?>" class="stretched-link"><?php the_title(); ?></a></h2>
                                                <ul class="post__meta list-unstyled">
                                                    <li class="post__meta-item post__meta-item--date">
                                                        <?php 
                                                        $archive_year  = get_the_time('y'); 
                                                        $archive_month = get_the_time('m'); 
                                                        $archive_day   = get_the_time('d'); 
                                                    ?>
                                                    <?php echo esc_html( get_the_date() ); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                        endwhile;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Latest Posts / End -->

                        <!-- Comment List -->
                        <?php
                            if ( is_active_sidebar( "sidebar" ) ) {
                                dynamic_sidebar( "sidebar" );
                            }
                        ?>
                        <!-- Comment List / End -->

                    </div>

                </div>
            </div>

        </div>

    </div>
</main>
<footer class="footer footer--classic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <?php echo esc_html(get_theme_mod('langona_copyright')); ?>
                    </div>
                </div>
            </div>
        </footer>
<?php get_footer(); ?>
