<?php
// Home - Investing Hero

if( ! class_exists( 'Hero_Investing_Section' ) ) {
    class Hero_Investing_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
                        
            $fields = get_field( 'investing' );
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
                     $this->get_name() . '-background-hero'
                ]
            ); 
            
            $background_image       = $this->get_fields( 'background_image' );
            $background_position_x  = $this->get_fields( 'background_position_x' );
            $background_position_y  = strtolower( $this->get_fields( 'background_position_y' ) );
            $background_overlay     = strtolower( $this->get_fields( 'background_overlay' ) );
            
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
            
            // BB Charcoal styles
            $subheading   = empty( $fields['subheading'] ) ? '' : _s_format_string( sprintf( '<span>%s</span>', $fields['subheading'] ), 'h2' );            
            $heading = empty( $fields['heading'] ) ? '' : _s_format_string( $fields['heading'], 'h1' );
                                                            
            if( empty( $heading  ) ) {
                return;     
            }
            
            $html = sprintf( '<div class="caption">%s%s</div>', $subheading, $heading );
                                                                        
            $row = new Element_Row(); 
            $row->add_render_attribute( 'wrapper', 'class', 'align-bottom' );
            
            $column = new Element_Column(); 

            $html = new Element_Html( [ 'fields' => array( 'html' => $html ) ]  ); // set fields from Constructor
            $column->add_child( $html );
                        
            $row->add_child( $column );
                        
            $this->add_child( $row );
        }
        
    }
}
   
new Hero_Investing_Section;
