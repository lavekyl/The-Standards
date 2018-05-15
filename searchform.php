<?php
/**
 * The template for displaying the search form
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package The_Standards
 */


?>

<form role="search" method="get" class="usa-search usa-search-small js-search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <div role="search">
    <label class="usa-sr-only" for="search-field-small">
      <?php echo esc_attr_x('Search for:', 'search lable', 'the-standards'); ?>
    </label>
    <input id="search-field-small" type="search" name="s" placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'the-standards'); ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'title', 'the-standards') ?>" />
    <button type="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'the-standards'); ?>">
      <span class="usa-sr-only">
        <?php echo __('Search', 'the-standards'); // WPCS: xss ok. ?>
      </span>
    </button>
  </div>
</form>
