<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Element_Button extends Element_Base {

	static public $count;
    
    /**
	 * Get widget name.
	 *
	 * Retrieve button widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'button';
	}
    
	
	/**
	 * Render button widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	public function render() {
                                                
        $button = $this->get_fields( 'button' );
        
        // is this field grouped?
        if( ! empty( $button['link'] ) ) {
            $button = $button['link'];
        }
        
        $defaults = [ 
               'title' => '',
               'url' => '',
               'target' => ''
        ];   
                                                             
        $button = wp_parse_args( $button, $defaults );
                                
        if( $this->get_settings( 'url' ) ) {
            $this->add_render_attribute( 'anchor', 'href', $this->get_settings( 'url' ) );
        }
        else {
            $this->add_render_attribute( 'anchor', 'href', $button['url'] );
        }
                
        if( $this->get_settings( 'title' ) ) {
            $button['title'] = $this->get_settings( 'title' );
        }
        
        $button = array_filter( $button );
        
        if( empty( $button ) ) {
            return;
        }
                                                                          
        $this->add_render_attribute( 'wrapper', 'class', 'element-button' );
                                    
        return sprintf( '<div %s><p><a %s><span>%s</span></a></p></div>', 
                        $this->get_render_attribute_string( 'wrapper' ), 
                        $this->get_render_attribute_string( 'anchor' ), 
                        $button['title'] );
	}
    	
}
