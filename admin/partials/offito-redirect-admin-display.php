<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.offito.com
 * @since      1.0.0
 *
 * @package    Offito_Redirect
 * @subpackage Offito_Redirect/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" action="options.php">

        <?php
          settings_fields($this->plugin_name);
          do_settings_sections($this->plugin_name);
        ?>

        <p>If your wordpress site is hosted on <b>example.com</b> and your offito app on <b>http://app.example.com</b> then you have to input <b>http://app.example.com</b> as a <b>Subdomain url</b> </p>

        <fieldset>
            <legend class="screen-reader-text"><span>Subdomain name</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-subdomain">
                <input type="text" id="<?php echo $this->plugin_name; ?>-subdomain" name="<?php echo $this->plugin_name; ?>[subdomain]" value="<?php echo esc_attr( get_option($this->plugin_name)['subdomain'] ); ?>"/>
                <span><?php esc_attr_e('Subdomain URL', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <?php submit_button('Save all changes'); ?>

    </form>

</div>
