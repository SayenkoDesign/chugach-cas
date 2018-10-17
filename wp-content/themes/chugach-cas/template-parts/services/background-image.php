<?php
// Services

if( ! class_exists( 'Services_Background_Image_Section' ) ) {
    class Services_Background_Image_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
                        
            $fields = get_field( 'hero' );
            $this->set_fields( $fields );
            
            // Render the section
            $this->render();
            
            // print the section
            $this->print_element();        
        }
              
        // Add default attributes to section        
        protected function _add_render_attributes() {
            
            // use parent attributes
            parent::_add_render_attributes();
    
            $this->add_render_attribute(
                'wrapper', 'class', [
                     $this->get_name() . '-background-image',
                ]
            ); 
            
            if( ! empty( $this->get_settings( 'id' ) ) ) {
                $this->add_render_attribute(
                'wrapper', 'id', $this->get_name() . '-' . $this->get_settings( 'id' ), true );            
            }
            
            $background_image       = $this->get_fields( 'background_image' );
            $background_position_x  = strtolower( $this->get_fields( 'background_position_x' ) );
            $background_position_y  = strtolower( $this->get_fields( 'background_position_y' ) );
            $background_overlay     = $this->get_fields( 'background_overlay' );
            
            if( ! empty( $background_image ) ) {
                $background_image = _s_get_acf_image( $background_image, 'hero', true );
                $this->add_render_attribute( 'wrapper', 'class', 'hero-background' );
                                
                $this->add_render_attribute( 'wrap', 'style', sprintf( 'background-image: url(%s);', $background_image ) );
                $this->add_render_attribute( 'wrap', 'style', sprintf( 'background-position: %s %s;', 
                                                                          $background_position_x, $background_position_y ) );
                
                if( true == $background_overlay ) {
                     $this->add_render_attribute( 'wrap', 'class', 'background-overlay' ); 
                }
                                                                          
            }             
            
        }  
               
    }
}
   
new Services_Background_Image_Section;
