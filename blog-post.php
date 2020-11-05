<article class="post has-post-thumbnail ">
    <div class="post__thumbnail">

        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url('maggie-blog') ?>" alt="">
        </a>


    </div>
    <div class="post__body">
        <div class="post__header">
            <ul class="post__cats list-unstyled">
                <li class="post__cats-item color-warning">
                    <?php the_category( " " ); ?>
                </li>
            </ul>
            <h2 class="post__title h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
        <div class="post__excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>