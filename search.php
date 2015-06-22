<?php get_header();?>
        <div class="page-content blog-content">
            <section class="blog-section page-section">
            <?php if ( have_posts() ) : ?>
                <h1 class="page-title"><?php printf( 'Resultado da busca por: "%s"', get_search_query() ); ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                <article class="secundary-featured">
                    
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                        <?php if (has_post_thumbnail()) {the_post_thumbnail('slider-thumb');} else {echo '<img src="'.catch_first_image().'" alt="'.get_the_title().'">';} ?></a>
                    
                    <div class="blog-secundary-infos <?php if($post->post_type != 'post') {echo 'page-search';}?>">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                        <p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_excerpt(), 18);?></a></p>
                        <?php if($post->post_type == 'post') :?>
                        <span class="date-author"><?php echo get_the_time('j').'.'.get_the_time('m').'.'.get_the_time('y').' | '.get_the_author(); ?></span>
                        <?php endif; ?>
                    </div>
                </article>
                <?php endwhile; ?>

                <div class="post-navig" style="display:none;">
                <?php
                    global $wp_query; 
                    echo '<input type="hidden" class="max-pages" value="'.$wp_query->max_num_pages.'"> <input type="hidden" class="current-page" value="1"><br>';
                    next_posts_link('proximo', $wp_query->max_num_pages);
                ?>
                </div>
            <?php else : ?>
                <h1 class="page-title">Não encontramos resultado para sua busca</h1>
                <h2>Tente novamente utilizando outro termo.</h2>
            <?php endif; ?>   
            </section>
            <?php get_sidebar();?>
       </div>    
<?php get_footer();?>
