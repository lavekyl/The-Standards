<?php

function usa_default_menu(){
    ?>
    <div class="menu-new-container">
        <ul id="primary-menu" class="usa-nav-primary usa-accordion">
            <li id="menu-item-default-1" class="menu-item">
                <a href="<?php echo home_url(); ?>" class="usa-nav-link">Home</a>
            </li>
            <?php
                if(is_user_logged_in() ):
            ?>
            <li id="menu-item-default-2" class="menu-item">
                <a href="<?php echo admin_url('nav-menus.php'); ?>" class="usa-nav-link">
                Menu Settings
                </a>
            </li>
            <?php
                else:
            ?>
            <li id="menu-item-default-2" class="menu-item">
                <a href="<?php echo wp_login_url(); ?>" class="usa-nav-link">Login</a>
            </li>
            <?php
                endif;
            ?>
        </ul>
    </div>
    <?php
}
