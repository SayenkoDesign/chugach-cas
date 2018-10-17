<?php
// Contact - Background Images

if( ! class_exists( 'Contact_Background_Image_Section' ) ) {
    class Contact_Background_Image_Section extends Element_Section {
        
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
                        
        }  
        
        // Add content
        public function render() {
                                                
            $fields = $this->get_fields();
                                                                                    
            $row = new Element_Row(); 
            $row->add_render_attribute( 'wrapper', 'class', 'expanded small-collapse' );
                     
            // Make sure we have a map?         
            if( ! empty( $fields['map'] ) ) {
                $html = new Element_Html( [ 'fields' => [ 'html' => $fields['map'] ] ] ); 
                $column = new Element_Column(); 
                $column->add_render_attribute( 'wrapper', 'class', 'small-12 large-4' );
                $column->add_child( $html );
                $row->add_child( $column );
            }
            
            if( ! empty( $fields['photos'] ) ) {
                foreach( $fields['photos'] as $photo ) {
                    $column = new Element_Column(); 
                    $column->add_render_attribute( 'wrapper', 'class', 'large-4 show-for-large' );
                    $background_image = _s_get_acf_image( $photo['ID'], 'large', true );
                    $column->add_render_attribute( 'wrapper', 'style', sprintf( 'background-image: url(%s);', $background_image ) );
                    $row->add_child( $column );
                }
            }
            
            $this->add_child( $row ); 
        }
               
    }
}
   
new Contact_Background_Image_Section;
