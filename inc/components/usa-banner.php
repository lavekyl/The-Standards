<?php
/**
 * The USA Banner component
 *
 * @package The_Standards
 */
?>
<!-- Gov banner BEGIN -->
<div class="usa-banner">
  <div class="usa-accordion">
    <header class="usa-banner-header">
      <div class="usa-grid usa-banner-inner">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/favicons/favicon-57.png'; ?>" alt="U.S. flag">
        <p><?php _e( 'An official website of the United States government', 'the-standards' ); ?></p>
        <button class="usa-accordion-button usa-banner-button" aria-expanded="false" aria-controls="gov-banner">
          <span class="usa-banner-button-text"><?php _e( 'Here’s how you know', 'the-standards' ); ?></span>
        </button>
      </div>
    </header>
    <div class="usa-banner-content usa-grid usa-accordion-content" id="gov-banner">
      <div class="usa-banner-guidance-gov usa-width-one-half">
        <img class="usa-banner-icon usa-media_block-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-dot-gov.svg" alt="Dot gov">
        <div class="usa-media_block-body">
          <p>
            <strong><?php _e( 'The .gov means it’s official.', 'the-standards' ); ?></strong>
            <br>
            <?php _e( 'Federal government websites often end in .gov or .mil. Before sharing sensitive information, make sure you’re on a federal government site.', 'the-standards' ); ?>
          </p>
        </div>
      </div>
      <div class="usa-banner-guidance-ssl usa-width-one-half">
        <img class="usa-banner-icon usa-media_block-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-https.svg" alt="Https">
        <div class="usa-media_block-body">
          <p>
            <strong><?php _e( 'The site is secure.', 'the-standards' ); ?></strong>
            <br>
            <?php _e( 'The <strong>https://</strong> ensures that you are connecting to the official website and that any information you provide is encrypted and transmitted securely.', 'the-standards' ); ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Gov banner END -->
