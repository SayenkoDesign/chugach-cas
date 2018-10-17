<?php

/*
About Intro
		
*/


if( ! class_exists( 'About_Mission_Section' ) ) {
    class About_Mission_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
                        
            $fields = get_field( 'mission' );            
            $this->set_fields( $fields );
            
            $settings = [];
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
                     $this->get_name() . '-mission'
                ]
            );
        }
        
        
        // Add content
        public function render() {
            
            $fields = $this->get_fields(); 
            
            $fields = $this->get_fields();
                                                 
            $row = new Element_Row(); 
            $row->add_render_attribute( 'wrapper', 'class', 'large-unstack' );
                                        
            // Left 
            $html = new Element_Html( [ 'fields' => [ 'html' => $this->get_fields( 'column_left' ) ] ] );
            $html->add_render_attribute( 'wrapper', 'class', 'mission-statement' );
            $column = new Element_Column(); 
            $column->add_render_attribute( 'wrapper', 'class', 'column-block' );
            $column->add_child( $html );
            $row->add_child( $column );
            
            // Right
            $html = new Element_Html( [ 'fields' => [ 'html' => $this->get_fields( 'column_right' ) ] ] );
            $column = new Element_Column(); 
            $column->add_render_attribute( 'wrapper', 'class', 'column-block' );
            $column->add_child( $html );
            $row->add_child( $column );
            
            $this->add_child( $row );
                
           
        }
    }
}
   
new About_Mission_Section; 