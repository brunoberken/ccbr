<?php get_header(); ?>

        <div class="page-content single-content">
            <section class="blog-section page-section">
                <?php while ( have_posts() ) : the_post(); ?>
                <article class="post-container">
                    <header class="post-header">
                        <h1><?php the_title(); ?></h1>
                        <?php if(has_excerpt()) : ?>
                        <h2 class="excerpt"><?php the_excerpt(); ?> </h2>
                    <?php endif; ?>
                        <span class="date-author"><?php echo get_the_time('j').'.'.get_the_time('m').'.'.get_the_time('y').' | '.get_the_author(); ?></span>
                    </header>
                    <?php if (has_post_thumbnail()) :?>
                    <!-- <figure class="featured-img">
                        <?php the_post_thumbnail(); ?>
                        <?php the_post_thumbnail_caption(); ?>
                    </figure> -->
                    <?php endif; ?>
                    <?php the_content(); ?>

                    <footer class="post-footer">
                        <div class="tags"><strong> <?php the_tags( 'tags: ', ', '); ?></div>
                        
                        <?php 
                        $categories =  get_the_category_list();
                        if('' != $categories) : ?>
                        <div class="categories"><strong>categorias: </strong><?php echo get_the_category_list(', '); ?></div>
                        <?php endif; ?>
                        
                        <div class="share"><strong>compartilhe: </strong><a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">Facebook</a>, <a href="javascript: void(0);" onclick="window.open('https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&source=tweetbutton&text=<?php the_title(); ?>&url=<?php the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">Twitter</a>, <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">Google+</a></div>
                    </footer>
                <?php
                    global $post;
                    $category = get_the_category($post->ID);
                    $category = $category[0]->cat_ID;
                    $myposts = get_posts(array('numberposts' => 2, 'offset' => 0, 'category__in' => array($category), 'post__not_in' => array($post->ID),'post_status'=>'publish'));
                if($myposts) : ?>      
                    <aside class="related-posts">
                        <h2>relacionados</h2>
                        <?php
                          
                          foreach($myposts as $post) :
                          setup_postdata($post);
                        ?>
                        <article class="secundary-featured">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php if (has_post_thumbnail()) {the_post_thumbnail('thumbnail');} else {echo '<img src="'.catch_first_image().'" alt="'.get_the_title().'">';} ?></a>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                        </article>
                        <?php endforeach; wp_reset_query(); ?>
                    </aside>   
                <?php endif; ?>
                    
                </article>
                <?php endwhile; ?>
            </section>
            <?php get_sidebar(); ?>

       </div>    
<?php get_footer(); ?>

