<?php
/**
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<?php
			// Subtitle metadata - text
			$term = rwmb_meta( 'subtitle' );
			if ( !empty( $term ) ) {
					$content = '<h2>';
					$content .= $term;
					$content .= '</h2>';
					echo $content;
			}
		 ?>

	</header><!-- .entry-header -->

     <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
			// Main image metabox - image
			$images = rwmb_meta( 'main-image', 'size=FULL' );
	    if ( !empty( $images ) ) {
	        foreach ( $images as $image ) {
	            echo "<img src='{$image['url']}' class='img-responsive' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
	        }
	    }
		 ?>

		<?php
			// Description metabox - text
			$description = rwmb_meta( 'description' );
	    if ( !empty( $description ) ) {
	            echo $description;
	        }
		 ?>

		 <?php
			 // Products metabox - taxonomy
			 $terms = rwmb_meta( 'products' );
	     if ( !empty( $terms ) ) {
	         $content = '<ul>';
	         foreach ( $terms as $term ) {
	             $content .= sprintf(
	                 '<li><a href="%s" title="%s">%s</a></li>',
	                 get_term_link( $term, 'tax_slug' ),
	                 $term->name,
	                 $term->name
	             );
	         }
	         $content .= '</ul>';
	         echo $content;
	     }
			?>

			<?php
				// Sales months metabox - text
				$sales_months = rwmb_meta( 'sales-months' );
				if ( !empty( $sales_months ) ) {
								echo $sales_months;
						}
			 ?>

			<?php
				// Timetable metabox - text
				$timetalbe = rwmb_meta( 'timetable' );
				if ( !empty( $timetalbe ) ) {
					echo $timetalbe;
						}
			 ?>

			 <?php
				 	// Telephone metabox - number
					$telephone = rwmb_meta( 'telephone-1' );
					if ( !empty( $telephone ) ) {
				    echo "<a href='tel:{$telephone}'>{$telephone}</a>";
					}
			  ?>

				<?php
					// URL metabox - text
					$url = rwmb_meta( 'url' );
				  if ( !empty( $url ) ) {
				  	echo "<a href='{$url}' target='_blanck'>{$url}</a>";
				  }
				 ?>

				 <?php
					 // Email metabox - text
					 $email = rwmb_meta( 'email' );
					 if ( !empty( $email ) ) {
									 echo $email;
							 }
					?>

					<?php
						// Map metabox - map
						$args = array(
				        'type'         => 'map',
				        'width'        => '100%',
				        'height'       => '300px',
				        'js_options'   => array(
				            // 'mapTypeId'   => 'HYBRID',
				            'zoomControl' => false,
				            'zoom'        => 10, // You can use 'zoom' inside 'js_options' or as a separated parameter
				        )
				    );
						echo rwmb_meta( 'map', $args );
					 ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
