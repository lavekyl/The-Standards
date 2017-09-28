<?php
/**
 * The USA Graphic List component
 *
 * @package The_Standards
 */

// WP_Query arguments
$feature_args = array(
	'post_type'              => array( 'feature' ),
	'nopaging'               => true,
	'posts_per_page'         => '4',
);

// The Query
$feature_query = new WP_Query( $feature_args );

// The Loop
if ( $feature_query->have_posts() ) { ?>
  <section class="usa-section usa-section-dark usa-graphic_list">
    <div class="usa-grid usa-graphic_list-row">
      <?php $i = 0;
	    while ( $feature_query->have_posts() ) {
		    $feature_query->the_post();
        if ($i == 2) {
          $i = 0; ?>
          </div>
          <div class="usa-grid usa-graphic_list-row">
        <?php } ?>
        <div class="usa-width-one-half usa-media_block">
          <img class="usa-media_block-img" src="<?php the_post_thumbnail_url(); ?>" alt="Alt text">
          <div class="usa-media_block-body">
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
	    <?php $i++; } ?>
    </div>
  </section>
<?php } else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>
