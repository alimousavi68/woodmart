<?php
$params = array(
    'post_type' => 'product',
	'meta_key' => 'include_amazingwrap_option',
	'meta_value' => 'yes',
    'posts_per_page' => 10 

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




<head>
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <title>Carousel</title>
</head>
<body>
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
                     فروشی وجود ندارد
                    </div>
                    <div class="carousel-image">
                            <div class="carousel-special-offer-badge">پیشنهاد ویژه</div>
                            
                          
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
			return;
		}

		$timezone = 'GMT';

		if ( apply_filters( 'woodmart_wp_timezone', false ) ) {
			$timezone = wc_timezone_string();
		}

		woodmart_enqueue_js_library( 'countdown-bundle' );
		woodmart_enqueue_js_script( 'countdown-element' );
		woodmart_enqueue_inline_style( 'countdown' );

		echo '<div class="wd-product-countdown wd-timer' . woodmart_get_old_classes( ' woodmart-product-countdown woodmart-timer' ) . '" data-end-date="' . esc_attr( date( 'Y-m-d H:i:s', $sale_date_end ) ) . '" data-timezone="' . $timezone . '"></div>';
                            
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
                                <span class="price">قیمت با
                                    <span class='off-amount'><b><?= round((1-$product->get_price()/$product->get_regular_price())*100) ?>%</b></span>
                                    تخفیف محصول :
                                    <?php 
                                        if($product->get_sale_price() != 0):								
                                    ?>
                                    <span class="item-sell-price"><b><?=number_format($product->get_sale_price())?></b></span>
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
                <li class="swiper-slide <?php if($i==0) { ?>swiper-slide--active<?php } ?>" data-slide-id="<?php echo $i?>"><?=$product->get_title()?></li>
            <?php $i++; endforeach;?>
            </ul>
        </div>
        
        
    </section>
    
</body>



