<aside class="sidebar">
    <div class="sidebar-featured-icons sidebar-nav">
        <ul>
            <li class="publish-content"><a href="http://creativecommons.org/choose/?lang=pt" target="_blank">publique seu conteúdo</a></li>
            <li class="search-content"><a href="http://search.creativecommons.org/?lang=pt" target="_blank">busque conteúdo</a></li>
            <li class="know-licenses"><a href="<?php echo get_permalink( get_page_by_path( 'licencas' ) ); ?>">conheça as licenças</a></li>
            <li class="take-questions"><a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>">tire suas dúvidas</a></li>
        </ul>
    </div>
    <?php 
    if( is_single() || is_page('blog') || is_category() || is_tag() || is_archive()) {
        dynamic_sidebar('side-blog');
    }?>
    <div class="facebook-sidebar sidebar-nav">
        <h3>facebook</h3>
        <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/creativecommonsbr?fref=ts&amp;width=240&amp;height=300&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=1631125383788420" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:270px;" allowTransparency="true"></iframe>

    </div>
    <div class="twitter-sidebar sidebar-nav">
        <h3>twitter</h3>
        <a class="twitter-timeline" href="https://twitter.com/CC_BR" data-widget-id="587646917296857088" data-chrome="nofooter transparent" data-link-color="#27ad79" height="270">Tweets by @CC_BR</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <div class="sidebar-nav scroll-top">
        voltar ao topo
    </div>
   <!--  <div class="sidebar-nav newsletter">
        <h3>newsletter</h3>
        <form action="" method="get" accept-charset="utf-8" id="searchform" role="search">
            <input type="text" placeholder="nome" value="" required>
            <input type="email" placeholder="email" value="" required>
            <input type="submit" value="enviar">
        </form>
    </div> -->
</aside>