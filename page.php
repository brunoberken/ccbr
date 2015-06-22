<?php get_header(); ?>

        <div class="page-content">
            <section class="page-section">
                <?php while ( have_posts() ) : the_post(); ?>
                <article class="page-container">
                    <header class="page-header">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if(has_excerpt()) : ?>
                        <h2 class="excerpt"><?php the_excerpt(); ?> </h2>
                    <?php endif; ?>
                    </header>
                    <?php if (has_post_thumbnail()) :?>
                    <figure class="featured-img">
                        <?php the_post_thumbnail(); ?>
                        <?php the_post_thumbnail_caption(); ?>
                    </figure>
                    <?php endif; ?>
                    <?php the_content(); ?>

                    <footer class="post-footer">
                        <div class="share"><strong>compartilhe: </strong><a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">Facebook</a>, <a href="javascript: void(0);" onclick="window.open('https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&source=tweetbutton&text=<?php the_title(); ?>&url=<?php the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">Twitter</a>, <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">Google+</a></div>
                    </footer>
                    
                </article>
                <?php endwhile; ?>
            </section>
            <?php get_sidebar(); ?>

       </div>    
<?php get_footer(); ?>

