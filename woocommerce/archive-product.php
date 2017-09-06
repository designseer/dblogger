<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>





 <!-- banner Page
    ==========================================-->

<?php 
    $background_img   = esc_url( get_theme_mod( 'dblogger_custom_img' ) );   
    $background_img_static   = get_template_directory_uri()."/img/b-1.jpg";
    $image = $background_img ? "$background_img" : "$background_img_static"; 
?>
<Section id="page-banner" style="background-image: url(<?php echo $image; ?>);">
  <div class="overlay-banner">
    <div class="content">
      <div class="container ">
       <!--breadcrumb-->
          <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
          	do_action( 'woocommerce_before_main_content' );
	?><!--/breadcrumb-->
        <h1><?php woocommerce_page_title(); ?></h1>
        <header class="entry-header"><a href="#">
          
          </a> </header>
        
        </div>
    </div>
  </div>
</Section>





<!--woocommerce body-->

<section id="woocommerce-page">
<div class="container">
<div class="row">
<div id="content" role="main">
<nav class="woocommerce-breadcrumb">
    <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>
    
   
    <header class="woocommerce-products-header">
	<?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<!--<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>-->

		<?php //endif; ?>
				
		
    </header>


			<ul class="products">

				
    

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>
				
					
					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
                endif;
			?>
				
			</ul>

	
	</div>



</div>
</div>
</section>





<?php get_footer( 'shop' ); ?>