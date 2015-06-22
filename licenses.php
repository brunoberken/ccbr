<?php 
/*
 * Template Name: Licenças 
 */
get_header();?>

        <div class="page-content licenses-content">
            <section class="licenses-section single-page-section page-section">
                <?php while ( have_posts() ) : the_post(); ?>
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header>
                <article>
                    <div class="intro-licenses">
                        <?php the_content(); ?>
                    </div>
                    <?php if (CFS()->get('conteudo-icones')) : ?>
                        <?php $iconCont = CFS()->get('conteudo-icones');
                        foreach ($iconCont as $content) : ?>
                        <div class="icons-content">
                            <?php if ($content['icone']) : ?>
                                <div class="license-icon">
                                    <img src="<?php echo $content['icone']; ?>">
                                </div>
                            <?php endif; ?>
                            <div class="license-text">
                                <?php if ($content['subtitulo']) : ?>
                                    <h3><?php echo $content['subtitulo']; ?></h3>
                                <?php endif; ?>
                                <?php echo $content['texto']; ?>
                            </div>

                        </div>                            
                        <?php endforeach; ?>
                        <div class="license-final-text">
                            <?php echo CFS()->get('texto-final'); ?>
                        </div>
                    <?php endif; ?>
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
