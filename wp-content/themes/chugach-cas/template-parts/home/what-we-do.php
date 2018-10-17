<?php
// Home - What We Do

if( ! class_exists( 'Home_What_We_Do_Section' ) ) {
    class Home_What_We_Do_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
                        
            $fields = get_field( 'what_we_do' );
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
                     $this->get_name() . '-what-we-do'
                ]
            );            
            
        }  
       
        
        // Add content
        public function render() {
            
            $fields = $this->get_fields();
                                                 
            $row = new Element_Row(); 
            $row->add_render_attribute( 'wrapper', 'class', 'large-unstack align-middle' );
                                        
            // Header
            $header = new Element_Header( [ 'fields' => $fields ] );
            $column = new Element_Column(); 
            $column->add_render_attribute( 'wrapper', 'class', 'shrink' );
            $column->add_child( $header );
            
            $row->add_child( $column );
            
            $grid = $this->grid();
            
            $html = new Element_Html( [ 'fields' => [ 'html' => $grid ] ] ); // set fields from Constructor
            $column = new Element_Column(); 
            $column->add_child( $html );
                        
            $row->add_child( $column );
            
            $this->add_child( $row );
                                                
            
        }
        
        private function grid() {
            
            $rows = $this->get_fields( 'grid' );
            
            $grid_items = '';
            
            if( ! empty( $rows ) ) {
                                
                foreach( $rows as $row ) {     
                                    
                    $thumbnail = sprintf( '<div class="thumbnail">%s</div>', _s_get_acf_image( $row['grid_image'], 'medium' ) );
                    $title = _s_format_string( $row['grid_title'], 'p' );                      
                    $button = $row['grid_button'];
                    $href = '';
                    $tag = 'div';
                    if( ! empty( $button['url'] ) ) {
                        $href = sprintf( 'href="%s"',$button['url'] );  
                        $tag = 'a';  
                    }
                    
                    $grid_items .= sprintf( '<div class="column column-block"><%1$s %2$s class="grid-item">%3$s%4$s</%1$s></div>', 
                                     $tag, $href, $thumbnail, $title );
                }
            }
            
            return sprintf( '<div class="grid"><div class="row small-up-1 large-up-3">%s</div></div>', $grid_items );   
        }
        
    }
}
   
new Home_What_We_Do_Section;
