<?php



defined( 'ABSPATH' ) || die;


if ( ! class_exists( 'devwp_Slider_Shegeft' ) ){
	
	
	class devwp_Slider_Shegeft
	{
		public function __construct()
		{
			add_filter( 'woocommerce_product_data_tabs', array( $this, 'create_amazingwrap_tab' ) );
			add_action( 'woocommerce_product_data_panels', array( $this, 'display_amazingwrap_fields' ) );
			// Save the custom fields
            add_action( 'woocommerce_process_product_meta', array( $this, 'save_fields' ) );

		}

		/**
         * Add the new tab to the $tabs array
         * @see     https://github.com/woocommerce/woocommerce/blob/e1a82a412773c932e76b855a97bd5ce9dedf9c44/includes/admin/meta-boxes/class-wc-meta-box-product-data.php
         * @param   $tabs
         * @since   1.0.0
         */
        public function create_amazingwrap_tab( $tabs ) {

            $tabs['giftwrap'] = array(
                'label'         => 'محصول شگفت انگیز', // The name of your panel
                'target'        => 'amazingwrap_panel', // Will be used to create an anchor link so needs to be unique
                'class'         => array( 'giftwrap_tab', 'show_if_simple', 'show_if_variable' ), // Class for your panel tab - helps hide/show depending on product type
                'priority'      => 80, // Where your panel will appear. By default, 70 is last item
            );
            return $tabs;
        }


		public function display_amazingwrap_fields() { 
		global $thepostid;
			
			?>
				
            <div id='amazingwrap_panel' class='panel woocommerce_options_panel'>
                <div class="options_group">
				
                    <?php
                    woocommerce_wp_checkbox(
                        array(
                            'id'        => 'include_amazingwrap_option',
                            'label'     => 'ایا محصول شگفت انگیز است ؟',
                            'desc_tip'  => __( 'Select this option to show giftwrapping options for this product', 'tpwcp' )
                        )
                    );
					
					/*woocommerce_wp_textarea_input(
					array(
						'id' => 'description_amazing_option',
						'placeholder' => 'ویژگی های مورد نظر برای نمایش بر اسلایدر را در این قسمت بنویسید',
						'label' => 'قسمت ویژگی ها'
					)*/
					/*$settings    = array(
							'textarea_name' => 'description_amazing_option',
							'quicktags'     => array( 'buttons' => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,undo,redo' ),
							'media_buttons' => true,

						);*/
						?>
						<div style="margin: 11px;">
						<span style="margin-bottom:10px;display: inline-block;">محتوای ویژگی ها</span>
						<?php
					$tab_content = get_post_meta( $thepostid, 'description_amazing_option', true );
					
					wp_editor( wp_specialchars_decode($tab_content ,ENT_QUOTES ),'description_amazing_option') ;
					?>
					</div>
					<?php
                ?>
            </div>
        </div>
 
        <?php 
		}

		public function save_fields( $post_id ) {
 

            $include_giftwrap_option = isset( $_POST['include_amazingwrap_option'] ) ? 'yes' : 'no';
			update_post_meta( $post_id, 'include_amazingwrap_option', $include_giftwrap_option );
			
			$description_amazing_option = isset ( $_POST['description_amazing_option']) ? $_POST['description_amazing_option']  : false ;
			update_post_meta( $post_id, 'description_amazing_option', $description_amazing_option );
			

			
            
 
        }
	
	}	
	
	
}

new devwp_Slider_Shegeft();

