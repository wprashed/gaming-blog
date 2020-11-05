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
        <!-- Header / End -->
        <main class="site-content" id="wrapper">
			<div class="site-content__inner">
				<div class="site-content__holder">
					<!-- Post -->
					<article class="post post--single">
						<figure class="post__thumbnail">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="">
						</figure>
						<ul class="post__sharing">
							<li class="post__sharing-item post__sharing-item--menu"><a href="home.html"><i>&nbsp;</i></a></li>
							<li class="post__sharing-item"><a href="https://www.facebook.com/danfisher.dev/"></a></li>
							<li class="post__sharing-item"><a href="https://twitter.com/danfisher_dev"></a></li>
							<li class="post__sharing-item post__sharing-item--comments">
								<a href="#comments">
									<span>4</span>
									<svg role="img" class="df-icon df-icon--comments-small">
										<use xlink:href="assets/img/necromancers.svg#comments-small"/>
									</svg>
								</a>
							</li>
						</ul>
						<div class="post__header">
							<div class="post__cats h6">
								<span class="color-warning"><?php the_category( " " ); ?></span>
							</div>
							<h2 class="post__title h3"><?php the_title(); ?></h2>
							<div class="post__meta">
								<span class="meta-item meta-item--date"><?php 
                                    $archive_year  = get_the_time('y'); 
                                    $archive_month = get_the_time('m'); 
                                    $archive_day   = get_the_time('d'); 
                                ?>
                                <?php echo esc_html( get_the_date() ); ?></span>
							</div>
						</div>
						<div class="post__body">
                            <?php the_content(); wpb_set_post_views(get_the_ID()); ?>
						</div>
					</article>
					<!-- Post / End -->
					<!-- Post Comments -->
					<?php
                        if(!post_password_required()){
                            comments_template();
                        }
                    ?>
				</div>
			</div>
		</main>
<?php get_footer(); ?>