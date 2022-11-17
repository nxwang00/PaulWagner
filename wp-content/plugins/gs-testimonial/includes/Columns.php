<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Customize necenssary plugin post columns.
 * 
 * @since 1.0.0
 */
class Columns {

    /**
	 * Class constructor.
	 * 
	 * @since 1.0.0
	 */
    public function __construct() {
        add_filter( 'manage_edit-gs_testimonial_columns', [ $this, 'gs_testimonial_screen_columns' ] );
        add_action( 'manage_posts_custom_column', [ $this, 'showFeaturedImage' ], 10, 2 );
        add_action( 'manage_posts_custom_column', [ $this, 'gs_t_populate_columns' ] );
        add_filter( 'manage_edit-gs_testimonial_sortable_columns', [ $this, 'gs_testimonial_sort' ] );
    }

    /**
     * Customize testimonial screen columns.
     * 
     * @since 1.0.0
     * 
     * @param  array $columns Screen columns.
     * @return array          Modified screen columns.
     */
    public function gs_testimonial_screen_columns( $columns ) {
        unset( $columns['date'] );

        $columns['title']               = __( 'Author Name', 'gst' );
        $columns['featured_image']      = __( 'Author Image', 'gst' );
        $columns['gs_t_client_company'] = __( 'Company', 'gst' );
        $columns['gs_t_client_design']  = __( 'Designation', 'gst' );
        $columns['date']                = __( 'Date', 'gst' );

        return $columns;
    }

    /**
     * Show featured image inside the customized column.
     * 
     * @since 1.0.0
     * 
     * @param  array $columnName Screen column name.
     * @param  array $postId     Current post id.
     * @return void
     */
    public function showFeaturedImage( $columnName, $postId ) {
        if ( 'featured_image' === $columnName ) {
            $image = gstm()->helpers->getFeaturedImage( $postId );

            if ( $image ) {
                echo '<img src="' . esc_url($image) . '" width="34"/>';
            }
        }
    }

    /**
     * Populating the columns.
     * 
     * @since 1.0.0
     * 
     * @param  array $columns Screen column.
     * @return void
     */
    public function gs_t_populate_columns( $column ) {
        if ( 'gs_t_client_company' === $column ) {
            $client_company = get_post_meta( get_the_ID(), 'gs_t_client_company', true );
            echo esc_html( $client_company );
        }
    
        if ( 'gs_t_client_design' === $column ) {
            $client_desig = get_post_meta( get_the_ID(), 'gs_t_client_design', true );
            echo esc_html( $client_desig );
        }
    }

    /**
     * Make the columns sortable.
     * 
     * @since 1.0.0
     * 
     * @param  array $columns Screen column.
     * @return array $columns
     */
    public function gs_testimonial_sort( $columns ) {
        $columns['gs_t_client_company'] = 'gs_t_client_company';
        return $columns;
    }
}