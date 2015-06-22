<?php 
/*
 * Template Name: Blog 
 */
get_header();?>
        <div class="page-content blog-content">
            <section class="blog-section page-section">
                <article class="blog-featured">
                    <ul class="blog-slider">
                    <?php
                    
                        $args = array(
                            'post__in' => get_option('sticky_posts'),
                            'posts_per_page' => 4,
                            'ignore_sticky_posts' => 1
                        );

                        $blog_posts = get_posts($args); 

                        foreach ($blog_posts as $post) : setup_postdata($post); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php if (has_post_thumbnail()) {the_post_thumbnail();} else {echo '<img src="'.catch_first_image().'" alt="'.get_the_title().'">';} ?></a>
                            <div class="blog-featured-infos">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            </div>
                        </li>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </ul>
                    <div class="controls">
                        <div class="controls-direction prev"></div>
                        <div class="pager"></div>
                        <div class="controls-direction next"></div>
                    </div>
                </article>
                <?php $custom_query_args = array(
                        'posts_per_page' => 10, 
                        'ignore_sticky_posts' => 1
                    );

                // Get current page and append to custom query parameters array
                $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                // Instantiate custom query
                $custom_query = new WP_Query( $custom_query_args );

                // Pagination fix
                $temp_query = $wp_query;
                $wp_query   = NULL;
                $wp_query   = $custom_query;

                if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                <article class="secundary-featured">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php if (has_post_thumbnail()) {the_post_thumbnail('thumbnail');} else {echo '<img src="'.catch_first_image().'" alt="'.get_the_title().'">';} ?></a>
                    <div class="blog-secundary-infos">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                        <p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_excerpt(), 18);?></a></p>
                        <span class="date-author"><?php echo get_the_time('j').'.'.get_the_time('m').'.'.get_the_time('y').' | '.get_the_author(); ?></span>
                    </div>
                </article>
                <?php endwhile; endif; wp_reset_postdata(); ?>

                <div class="post-navig" style="display:none;">
                <?php
                    global $wp_query; 
                    echo '<input type="hidden" class="max-pages" value="'.$custom_query->max_num_pages.'"> <input type="hidden" class="current-page" value="1"><br>';
                    next_posts_link('proximo', $custom_query->max_num_pages);
                    $wp_query = NULL;
                    $wp_query = $temp_query;
                ?>
                </div>
            </section>
            <?php get_sidebar();?>
       </div>    
<?php get_footer();?>
