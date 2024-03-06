<?php
/**
 * Template for displaying search forms
 */

?>
<form class="searchForm" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <input type="search" class="w-100" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search ....', 'placeholder', 'logisfare' ); ?>">
        <button type="submit"><i class="logisfare-search"></i></button>
    </div>
</form>