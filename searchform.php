<?php
/**
 * The search form for our theme
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package The_Standards
 */

?>
<form role="search" method="get" class="usa-search usa-search-small js-search-form" action="<?php echo home_url( '/' ); ?>">
  <div role="search">
    <label class="usa-sr-only" for="search-field-small"><?php echo _x( 'Search for:', 'label' ) ?></label>
    <input id="search-field-small" type="search" name="s" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
      <span class="usa-sr-only">Search</span>
    </button>
  </div>
</form>
