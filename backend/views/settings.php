<?php
/*
 * Retrieve these settings on front end in either of these ways:
 * phpcs:ignore $my_setting = cmb2_get_option( SW_TEXTDOMAIN . '-settings', 'some_setting', 'default' );
 * phpcs:ignore  $my_settings = get_option( SW_TEXTDOMAIN . '-settings', 'default too' );
 * CMB2 Snippet: https://github.com/CMB2/CMB2-Snippet-Library/blob/master/options-and-settings-pages/theme-options-cmb.php
 */

 $parsed_url = parse_url(site_url());
 $initialized = \get_option( SW_TEXTDOMAIN . '-init' );
 $gsc_connected = get_option( SW_TEXTDOMAIN . '-gsc-connected' );
?>
<div id="tabs-1" class="wrap">
			<?php
			$cmb = new_cmb2_box(
				array(
					'id'           => SW_TEXTDOMAIN . '_options',
					'hookup'       => false,
					'show_on'      => array( 'key' => 'options-page', 'value' => array( SW_TEXTDOMAIN ) ),
					'show_names'   => true,
					'object_types' => array( 'options-page' ),
					'option_key'   => SW_TEXTDOMAIN . '_options',
				)
			);
			$cmb->add_field(
				array(
					'name'    => __( 'API endpoint', SW_TEXTDOMAIN ),
					'id'      => 'endpoint',
					'type'    => 'text',
					'default' => 'https://api.somecaptions.dk/',
				)
			);
			$cmb->add_field(
				array(
					'name'    => __( 'API key', SW_TEXTDOMAIN ),
					// phpcs:ignore 'desc'    => __( 'SomeCaptions API key', SW_TEXTDOMAIN ),
					'id'      => 'api_key',
					'type'    => 'text',
					'default' => '',
				)
			);

			cmb2_metabox_form( SW_TEXTDOMAIN . '_options', SW_TEXTDOMAIN . '-settings' );
			?>
			<?php if( $initialized ):?>
				<br />
				<button 
				class="button-primary"
				onClick="open_app_gw('<?php echo SW_SIGNIN_HOST . '/' . $parsed_url['host']; ?>')"
				>Connect Google Search Console</button>
			<?php endif;?>
			<br />
			<p>
				<?php if( !$gsc_connected && $initialized ):?>
						GSC is not connected.
				<?php elseif( $gsc_connected && $initialized ):?>
						GSC is connected.
				<?php endif;?>
			</p>
		</div>