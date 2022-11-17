<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

class Helpers {

    /**
     * Retrives featured image.
     * 
     * @since  1.0.0
     * @param  int    $postId The current post id.
     * @return string         Image url.
     */
    public function getFeaturedImage( $postId ) {
        $thumbnailId = get_post_thumbnail_id( $postId );

        if ( $thumbnailId ) {
            $image = wp_get_attachment_image_src( $thumbnailId );
            return isset( $image[0] ) ? $image[0] : '';
        }
    }

    /**
     * Retrives option value.
     * 
     * @since  1.0.0
     * @param  string $option  The option name.
     * @param  string $section Options section name.
     * @return mixed           Retrived option value or the default value.
     */
    public function getOption( $option, $section, $default = '' ) {
		$options = get_option( $section );
		return isset( $options[ $option ] ) ? $options[$option] : $default;
	}

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    public function get_pages() {
        $pages = get_pages();
        $pages_options = [];
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

	public function isProActive() {
		return defined( 'GST_PRO_PLUGIN_DIR' );
	}

	public function get_string_between($string, $start, $end) {
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		return substr($string, $ini, $len);
	}

	public function remove_string_from_to( $string, $start, $end ) {
		$ini = strpos($string, $start);
		$ini_end = strpos($string, $end) + strlen($end);
		if ( $ini == -1 || $ini_end == -1 ) return $string;
		return substr_replace( $string, '', $ini, ($ini_end - $ini) );
	}

	public function display_remote_page( $url ) {
        $protocol = is_ssl() ? 'https' : 'http';
        $request = wp_remote_get( $protocol . $url );
		$content = wp_remote_retrieve_body( $request );
		$css = $this->get_string_between( $content, '<style type="text/css">', '</style>' );
		$content = $this->remove_string_from_to( $content, '<style type="text/css">', '</style>' );
		if ( !empty($content) ) echo wp_kses_post( $content );
        if ( !empty(trim($css)) ) printf( '<style>%s</style>', sanitize_text_field($css) );
	}

}