<?php 
/*
 * Template Name: FAQ 
 */
get_header();?>

        <div class="page-content faq-content">
            <section class="faq-section single-page-section page-section">
                <?php while ( have_posts() ) : the_post(); ?>
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header>
                <?php the_content(); ?>

                <?php if (CFS()->get('faq-grupo')) : ?>
                    <?php $gruposFAQ = CFS()->get('faq-grupo');
                    foreach ($gruposFAQ as $grupo) : ?>
                        <article class="question-type">
                            <h2><?php echo $grupo['faq-titulo-grupo']; ?></h2>                           
                            <?php foreach ($grupo['faq-questoes'] as $questao) : ?>
                                <div class="question">
                                    <h3><?php echo $questao['faq-pergunta']; ?></h3>
                                    <div class="answer">
                                        <?php echo $questao['faq-resposta']; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endwhile; ?>
                <footer class="post-footer">
                    <div class="share"><strong>compartilhe: </strong><a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">Facebook</a>, <a href="javascript: void(0);" onclick="window.open('https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&source=tweetbutton&text=<?php the_title(); ?>&url=<?php the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">Twitter</a>, <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">Google+</a></div>
                </footer>
            </section>
            <?php get_sidebar(); ?>
       </div>    

<?php get_footer(); ?>
