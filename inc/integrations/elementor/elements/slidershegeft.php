<?php
/**
 * 360 degree view map.
 */

use Elementor\Group_Control_Image_Size;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class slidershegeft extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'wd_Slider_Shegeft';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'اسلایدر شگفت انگیز', 'woodmart' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_icon() {
		return 'wd-icon-3d-view';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 */

	/**
	 * Register the widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		/**
		 * Content tab.
		 */

		/**
		 * General settings.
		 */
		 
		 
		 	$this->start_controls_section(
			'general_content_section',
			array(
				'label' => esc_html__( 'عمومی', 'woodmart' ),
			)
		);
			$this->add_control(
			'open_lightbox2',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
					'label'       => esc_html__( 'نوع پیشنهاد شگفت انگیز', 'woodmart' ),
				'description' => esc_html__( 'نحوه قرار دادن پیشنهاد شگفت انگیز در لینک مشخص شده است : http://dev-wp.ir/learning/special.mp4', 'woodmart'),
				'options' => [
					
					'yes' => esc_html__( 'وودمارت پلاس', 'plugin-name' ),
					'no' => esc_html__( 'دیجی کالا - بزودی', 'plugin-name' ),
				],
				'default' => 'yes',
			]
		);
		
	
		
			$this->add_control(
			'Count_Object',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'تعداد پیشنهاد', 'plugin-name' ),
				'options' => [
					'5' => esc_html__( '5', 'plugin-name' ),
					'6' => esc_html__( '6', 'plugin-name' ),
					'7' => esc_html__( '7', 'plugin-name' ),
					'8' => esc_html__( '8', 'plugin-name' ),
					'9' => esc_html__( '9', 'plugin-name' ),
					'10' => esc_html__( '10', 'plugin-name' ),
				],
				'default' => '10',
			]
		);
		
		
			$this->add_control(
			'Title_Pishnahad',
			[
				'label' => esc_html__( 'عنوان پیشنهاد', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'پیشنهاد ویژه', 'plugin-name' ),
				'placeholder' => esc_html__( 'اینجا عنوان پیشنهاد خود را وارد نمایید', 'plugin-name' ),
			]
		);
	

	

		$this->end_controls_section();
		
		
			$this->start_controls_section(
			'general_style_section',
			array(
				'label' => esc_html__( 'تنظیمات استایل', 'woodmart' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		
		
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'رنگ اولیه', 'woodmart' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
			)
		);
		
			$this->add_control(
			'custom_color',
			array(
				'label'     => esc_html__( 'رنگ ثانویه', 'woodmart' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'image_pishnahad',
			[
				'label' => esc_html__( 'تصویر پایان پیشنهاد', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		
		
			$this->end_controls_section();
		
		
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {


	$default_settings = array(
			// General.
			'title_color'                  => 'title_color',
			'custom_color'                  => 'custom_color',
		
		);
            $settings     = wp_parse_args( $this->get_settings_for_display(), $default_settings );
            
       
      
       ?>
       
     <style>
         h3.carousel-title
         {
                 border-bottom: 3px solid <?php  echo $settings['title_color'];  ?>;
         }
         #shop-carousel .swiper-slide:not(.swiper-slide--active):hover :  <?php  echo $settings['title_color'];  ?>  !imporatnt;
         {
             
         }
         :root
         
         {
             
             
             
                 --primary-color-400: <?php  echo $settings['title_color'];  ?> ;
                      #shop-carousel .swiper-slide:not(.swiper-slide--active):hover: <?php  echo $settings['title_color'];  ?>  !important;
    --secondary-color:<?php  echo $settings['title_color'];  ?> !important ;
    --secondary-color:<?php  echo $settings['title_color'];  ?> !important ;
    --gradient-bg: linear-gradient( -90deg,<?php  echo $settings['title_color'];  ?>, <?php echo $settings['custom_color'];  ?> ) !important;
    --gradient-bg-0: linear-gradient( 0deg, <?php  echo $settings['title_color'];  ?>, <?php echo $settings['custom_color'];  ?> ) !important;
         }
         #shop-carousel .carousel-off .price .item-sell-price
         {
             color: <?php  echo $settings['title_color'];  ?> ;
             
         }
     </style>
       
       <?php
$params = array(
    'post_type' => 'product',
	'meta_key' => 'include_amazingwrap_option',
	'meta_value' => 'yes',
    'posts_per_page' =>    $settings['Count_Object']

);
$querys =  wc_get_products($params);
$products = [];
$valuess = [];
        foreach ($querys as $tmp)
        {
            if ($tmp->is_type( 'variable' ))
            {
				$children_product = $tmp->get_children();
				if(count($children_product) >=1){

					$first_children_type = $children_product[0];

				}
				$variation = wc_get_product($first_children_type);
				
				$valuess = get_post_meta($variation->get_parent_id(), 'description_amazing_option');
				$products[] = $variation;
				
                
            }
            else
            {
                $products[] = $tmp;
            }
        }

?>



    
<section id="shop-carousel" class="main-carousel">
        <div class="backimgright"></div>
        <div class="backimgleft"></div>
       
        <div class='carousel-next'>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
        <div class='carousel-prev'>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </div>
        <?php
			$i=0;
		foreach($products as $product):
		$sale = round((1-$product->get_price()/$product->get_regular_price())*100);
		?>
       <div class="carousel-item <?php if($sale==0) { ?>no-sale<?php } ?>  <?php if($i==0) { ?>carousel-item--active<?php } ?>" data-slide-id="<?php echo $i;?>">
            <div class="carousel-item--data">
            <div class="no-sale-image">
                                           <img src="<?php  echo $settings['image_pishnahad']['url']; ?> " alt="ranout">
                    </div>
                    <div class="carousel-image">
                            <div class="carousel-special-offer-badge"><?php  echo $settings['Title_Pishnahad']; ?></div>
                            
                          
                            <?php echo $product->get_image('shop_catalog');?>
                            
                            <?php if ( $product->is_on_sale() ) { ?>
                            <div class="timemande" >
                            زمان باقی مانده تا اتمام تخفیف

                            
                            </div>
                            <?php
                            	$sale_date_end   = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
		$sale_date_start = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );

		if ( ( apply_filters( 'woodmart_sale_countdown_variable', false ) || woodmart_get_opt( 'sale_countdown_variable' ) ) && $product->get_type() == 'variable' ) {
			// Variations cache
			$cache                = apply_filters( 'woodmart_countdown_variable_cache', true );
			$transient_name       = 'woodmart_countdown_variable_cache_' . $product->get_id();
			$available_variations = array();

			if ( $cache ) {
				$available_variations = get_transient( $transient_name );
			}

			if ( ! $available_variations ) {
				$available_variations = $product->get_available_variations();
				if ( $cache ) {
					set_transient( $transient_name, $available_variations, apply_filters( 'woodmart_countdown_variable_cache_time', WEEK_IN_SECONDS ) );
				}
			}

			if ( $available_variations ) {
				$sale_date_end   = get_post_meta( $available_variations[0]['variation_id'], '_sale_price_dates_to', true );
				$sale_date_start = get_post_meta( $available_variations[0]['variation_id'], '_sale_price_dates_from', true );
			}
		}

		$curent_date = strtotime( date( 'Y-m-d H:i:s' ) );

		if ( $sale_date_end < $curent_date || $curent_date < $sale_date_start ) {
		echo "تاریخی تعریف نشده است";
		}else
		{
		    	$timezone = 'GMT';

		if ( apply_filters( 'woodmart_wp_timezone', false ) ) {
			$timezone = wc_timezone_string();
		}

		woodmart_enqueue_js_library( 'countdown-bundle' );
		woodmart_enqueue_js_script( 'countdown-element' );
		woodmart_enqueue_inline_style( 'countdown' );

		echo '<div class="wd-product-countdown wd-timer' . woodmart_get_old_classes( ' woodmart-product-countdown woodmart-timer' ) . '" data-end-date="' . esc_attr( date( 'Y-m-d H:i:s', $sale_date_end ) ) . '" data-timezone="' . $timezone . '"></div>';
            
		}

	                
                       }     ?>
                            
                            
                            
                            
                            
                        </div>
                        
                
                        <div class="carousel-title-container">
                            <h3 class="carousel-title">
                                <a href="<?= $product->get_permalink();?>"><?=$product->get_title()?></a>
                            </h3>
                        </div>
                
                     
                
                      
                
                        <div class='carousel-utilities'>
                            <?php
                                $parentData = $product->get_parent_id();
                                $variableProduct = new WC_Product_Variable($parentData);
                                $allVariations = $variableProduct->get_available_variations();
                                if(count($allVariations) >=1){
                                    foreach($valuess as $value){
                                        echo htmlspecialchars_decode(stripslashes($value));
                                    }
                                }

                                    $values = get_post_meta($product->get_id(), 'description_amazing_option');
                                    if(is_array($values)):
                                    foreach($values as $value):
                                    ?>
                                    <?= htmlspecialchars_decode(stripslashes($value)) ?>
                                    <?php endforeach;?>
                                <?php endif?>
                        </div>
                
                     
                        <div class="carousel-off">
                            <div>
                                <small>قیمت اصلی محصول : 
                                <?php if($allVariations):?>
                                <?php number_format($allVariations[0]['display_regular_price']);?>
                                <?php endif?>
                                    <span class="item-real-price"><?=  number_format($product->get_regular_price());?></span>
                                    <span class='currency'>تومان</span>
                    
                                </small>
                                <span class="pricee">قیمت با
                                    <span class='off-amount'><b><?= round((1-$product->get_price()/$product->get_regular_price())*100) ?>%</b></span>
                                    تخفیف محصول :
                                    <?php 
                                        if($product->get_sale_price() != 0):								
                                    ?>
                                    <span class="item-sell-price"><b><?php echo $product->get_sale_price();?></b></span>
                                    <?php  endif;?>
                                    <span class='currency'>تومان</span>
                                </span>
                            </div>
                        </div>
            </div>
            <div class="add-to-cart">
                    <a id="add-to-cart" href="<?= $product->get_permalink();?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <span>
                            مشاهده و خرید
                        </span>
                    </a>
                </div>
        
       </div>
    <?php $i++; endforeach;?> 
       
       
       
      

        <div class="carousel-swiper">
            <ul class="carousel-swiper-slides ">
            <?php 
			$i=0;
			foreach($products as $product):?>
                <li class="swiper-slide <?php if ( is_admin() ) {
    echo "adminpanel";
}elseif($i==0) {?>swiper-slide--active<?php } ?>" data-slide-id="<?php echo $i?>"><?=$product->get_title()?></li>
            <?php $i++; endforeach;?>
            </ul>
        </div>
        
        
    </section>
    



       
       
       
       
       
       
       <?php 
       
       
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new slidershegeft() );
