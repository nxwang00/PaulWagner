<?php

	if ( $gs_t_loop->have_posts() ) {

		$output .= gs_cycle_switcher($theme, $transition, $gs_t_slider_stop, $gs_t_responsive, $speed,$gs_t_slider_column);

			while ( $gs_t_loop->have_posts() ) {
				$gs_t_loop->the_post();
				$meta = get_post_meta( get_the_id() );
				$rating=get_post_meta( get_the_id(), 'gs_t_rating', true );
				$gs_testimonial_id = get_post_thumbnail_id();
				$gs_testimonial_url = wp_get_attachment_image_src($gs_testimonial_id, array(86,86),true);

				$gs_testimonial = $gs_testimonial_url[0];
				$gs_testimonial_alt = get_post_meta($gs_testimonial_id,'_wp_attachment_image_alt',true);
				
				$output .= '<div class="gs_testimonial_single">';
					$output .= '<div class="testimonial-box">';
						if(!empty($gs_testimonial_id) && $gs_t_image=='on' ){
							$output .= '<div class="box-image"><img  src="'. esc_url($gs_testimonial) .'" alt="'. esc_attr($gs_testimonial_alt) .'"></div>';
						}
						if(!empty(get_the_content())){
							$output .= '<div class="box-content"><p>'. get_the_content() .'</p></div>';
						}
						// if($gs_t_ratings=='on'  && !empty($rating)){
						// 	$args = array(
						//    'rating' =>''.$rating.'',
						//    'type' => 'rating',
						//    'number' => '',
						//    'echo'   => false,
						// );
						// $output .= wp_star_rating( $args ); 
						// }

						if(!empty(get_the_title())){
							$output .= '<h3 class="box-title">'. get_the_title() .'</h3>';
						}
						
						if($meta['gs_t_client_company'][0]){

							$output .= '<div class="box-companyinfo">';
							if($gs_t_comapny_lebel=='on'){

								$output .='<span class="box-label">Company Name : </span>';
							}

							$output .=' <span class="box-com-name">'. esc_html($meta['gs_t_client_company'][0]) .'</span></div>';
						}

						if($meta['gs_t_client_design'][0]){

							$output .= '<div class="box-desiginfo">';
								if($gs_t_comapny_lebel=='on'){
									$output .='<span class="box-label">Designation : </span>';
								}
							$output .= '<span class="box-design-name">'. esc_html($meta['gs_t_client_design'][0]) .'</span></div>';
						}
				$output .= '</div></div>';
			}
			$output .= '</div>';
			$output .= '<div class="center cycle-nav">
							<a id="prev"><i class="fa fa-angle-left"></i></a>
							<a id="next"><i class="fa fa-angle-right"></i></a>
						</div>';
			$output .= '<div class="cycle-pager" id="custom-pager"></div>';
		} else {
			$output .= "No Testimonial Added!";
		}
	wp_reset_postdata();
	wp_reset_query();
return $output;