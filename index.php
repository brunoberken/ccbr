<?php get_header();?>
        <section class="home-featured-row">
            <article>
                <div class="about-excerpt">
                    <h2>
                        Organização sem fins lucrativos, que permite o compartilhamento e o uso da criatividade e do conhecimento através de licenças jurídicas gratuitas.
                    </h2>
                    <a href="<?php echo get_permalink( get_page_by_path( 'sobre' ) ); ?>">saiba mais sobre o creative commons</a>
                </div>
                <div class="featured-icons">
                    <ul>
                        <li class="publish-content"><a href="http://creativecommons.org/choose/?lang=pt" target="_blank">publique seu conteúdo</a></li>
                        <li class="search-content"><a href="http://search.creativecommons.org/?lang=pt" target="_blank">busque conteúdo</a></li>
                        <li class="know-licenses"><a href="<?php echo get_permalink( get_page_by_path( 'licencas' ) ); ?>">conheça as licenças</a></li>
                        <li class="take-questions"><a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>">tire suas dúvidas</a></li>
                    </ul>
                </div>
            </article>
        </section>
        <div class="page-content">
            <section class="home-blog">
                <article class="home-blog-featured">
                    <h2 class="section-title">Destaques</h2>
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
                                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                                    <?php if (has_post_thumbnail()) {the_post_thumbnail('slider-thumb');} else {echo '<img src="'.catch_first_image().'" alt="'.get_the_title().'">';} ?></a>
                                <div class="blog-featured-infos">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                                    <span class="date-author"><em><?php echo get_the_time('j').'.'.get_the_time('m').'.'.get_the_time('y').' | '.get_the_author(); ?></em></span>
                                    <p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_excerpt(), 35);?></a></p>
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
                        'posts_per_page' => 4, 
                        'ignore_sticky_posts' => 1
                    );
                $custom_query = new WP_Query( $custom_query_args );
                if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
                ?>
                <article class="secundary-featured">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                        <?php if (has_post_thumbnail()) {the_post_thumbnail('thumbnail');} else {echo '<img src="'.catch_first_image().'" alt="'.get_the_title().'">';} ?>
                    </a>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                </article>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </section>
            <div class="home-social-row">
                <div class="home-social-item facebook-feed">
                   <div class="fb-page" data-href="https://www.facebook.com/creativecommonsbr?fref=ts" data-width="620" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/creativecommonsbr?fref=ts"><a href="https://www.facebook.com/creativecommonsbr?fref=ts">Creative Commons Brasil</a></blockquote></div></div>
                </div>
                <div class="home-social-item twitter-feed">
                    <a class="twitter-timeline" href="https://twitter.com/CC_BR" data-widget-id="587646917296857088" height="236" data-chrome="nofooter transparent" data-link-color="#27ad79">Tweets by @CC_BR</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
           
                </div>
                <!-- <div class="home-social-item newsletter">
                    <h3>Assine a nossa newsletter</h3>
                    <form action="" method="get" accept-charset="utf-8" id="searchform" role="search">
                        <input type="text" placeholder="nome" value="" required>
                        <input type="email" placeholder="email" value="" required>
                        <input type="submit" value="enviar">
                    </form>
                </div> -->
            </div>
        </div>    

<?php get_footer();?>

