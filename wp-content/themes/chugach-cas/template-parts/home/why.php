<?php
// Home - Why

if( ! class_exists( 'Home_Why_Section' ) ) {
    class Home_Why_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
                        
            $fields = get_field( 'why' );
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
                     $this->get_name() . '-why'
                ]
            );            
            
        }  
       
        
        // Add content
        public function render() {
            
            $fields = $this->get_fields();
                                                 
            $row = new Element_Row(); 
                                        
            // Header
            $header = new Element_Header( [ 'fields' => $fields ] );
            $column = new Element_Column(); 
            $column->add_render_attribute( 'wrapper', 'class', 'text-center' );
            $column->add_child( $header );
            
            $row->add_child( $column );
            $this->add_child( $row );
            
            $row = new Element_Row(); 
            
            $html = $this->grid();
            
            $button = $this->get_fields( 'button' );
            if( ! empty( $button ) ) {
                $button = new Element_Button( [ 'fields' => $fields ] );
                $button->add_render_attribute( 'wrapper', 'class', 'text-center' );
                $button->add_render_attribute( 'anchor', 'class', 'button blue' );
                $html .= $button->get_element();
            }
            
            $html = new Element_Html( [ 'fields' => [ 'html' => $html ] ] ); // set fields from Constructor
            $column = new Element_Column(); 
            $column->add_child( $html );
                        
            $row->add_child( $column );
            
            $this->add_child( $row );
                                         
            
        }
        
        private function grid() {
            
            $rows = $this->get_fields( 'grid' );
            
            $grid_items = '';
            
            $tag = 'div';
            
            $row_count = count( $rows );
            
            if( 0 == $row_count % 2 ) {
                $column_classes = 'medium-up-2';
            }
            else {
                $column_classes = 'large-up-3';
            }
            
            
            if( ! empty( $rows ) ) {
                                
                foreach( $rows as $row ) {     
                                    
                    $thumbnail = sprintf( '<div class="thumbnail">%s</div>', _s_get_acf_image( $row['grid_image'], 'medium' ) );
                    $title = _s_format_string( $row['grid_title'], 'h3' );        
                    $description = _s_format_string( $row['grid_description'], 'p' );                      
                   
                    $grid_items .= sprintf( '<div class="column column-block"><%1$s class="grid-item">%2$s%3$s%4$s</%1$s></div>', 
                                     $tag, $thumbnail, $title, $description );
                }
            }
            
            return sprintf( '<div class="grid"><div class="row small-up-1 %s align-center">%s</div></div>', $column_classes, $grid_items );   
        }
        
    }
}
   
new Home_Why_Section;
