<?php get_header();?>
        <div class="page-content blog-content">
            <section class="blog-section page-section">

                <?php if ( have_posts() ) : ?>          
                <?php the_post(); 
                $post = $posts[0];
                ?>  
                
                <?php if ( is_day() ) : ?>
                    <h1 class="page-title"><?php printf('Arquivo Diário: <span>%s</span>', get_the_time(get_option('date_format')) ) ?></h1>
                <?php elseif ( is_month() ) : ?>
                    <h1 class="page-title"><?php printf('Arquivo Mensal: <span>%s</span>', get_the_time('F Y') ) ?></h1>
                <?php elseif ( is_year() ) : ?>
                    <h1 class="page-title"><?php printf('Arquivo Anual: <span>%s</span>', get_the_time('Y') ) ?></h1>
                <?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
                    <h1 class="page-title"><?php 'Arquivos do Blog' ?></h1>
                <?php endif; ?>
                 
                <?php rewind_posts(); ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <article class="secundary-featured">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                    <div class="blog-secundary-infos">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                        <p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_excerpt(), 18);?></a></p>
                        <span class="date-author"><?php echo get_the_time('j').'.'.get_the_time('m').'.'.get_the_time('y').' | '.get_the_author(); ?></span>
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
            </section>
            <?php get_sidebar();?>
       </div>    
<?php get_footer();?>
