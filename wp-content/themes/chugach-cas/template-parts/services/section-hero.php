<?php
// Services - Hero

if( ! class_exists( 'Services_Hero_Section' ) ) {
    class Services_Hero_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
                        
            $fields = get_sub_field( 'hero' );
            $this->set_fields( $fields );
            
            $settings = get_sub_field( 'settings' );
            $this->set_settings( $settings );
                        
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
                     $this->get_name() . '-hero-background',
                     $this->get_name() . '-hero-background' . '-' . $this->get_id(),
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
       
        
        // Add content
        public function render() {
                                                
            $fields = $this->get_fields();
            
            // Photo
            $photo = new Element_Photo( [ 'fields' => $fields ]  );
            $photo->set_settings( 'size', 'thumbnail' );
            
            // Make sure we have a photo?         
            if( ! empty( $photo->get_element() ) ) {
                $row = new Element_Row(); 
                $column = new Element_Column(); 
                $column->add_child( $photo );
                $row->add_child( $column );
                $this->add_child( $row ); 
            }
            
            $row = new Element_Row(); 
            $column = new Element_Column(); 
            
            // Editor
            $editor = new Element_Editor( [ 'fields' => $fields ] );
            $column->add_child( $editor );            
            $row->add_child( $column );
                        
            $this->add_child( $row ); 
        }
        
    }
}
   
new Services_Hero_Section;
