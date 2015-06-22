<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" accept-charset="utf-8" id="searchform" role="search">
    <input type="text" name="s" id="s" placeholder="busca" value="<?php the_search_query(); ?>" required>
    <input type="submit" id="searchsubmit">
</form>