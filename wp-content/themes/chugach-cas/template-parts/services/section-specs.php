<?php
// Services - Specs

if( ! class_exists( 'Services_Specs_Section' ) ) {
    class Services_Specs_Section extends Element_Section {
        
        static public $section_count;
        
        public function __construct() {
            parent::__construct();
                                    
            $fields = get_sub_field( 'specs' );
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
            
            self::$section_count ++;
    
            $this->add_render_attribute(
                'wrapper', 'class', [
                     $this->get_name() . '-specs',
                     $this->get_name() . '-specs' . '-' . self::$section_count,
                ]
            );
            
            if( ! empty( $this->get_settings( 'id' ) ) ) {
                $this->add_render_attribute(
                'wrapper', 'id', $this->get_name() . '-' . $this->get_settings( 'id' ), true );            
            }
            
            $background_image       = $this->get_fields( 'background_photo' );
            
            if( ! empty( $background_image ) ) {
                $background_image = _s_get_acf_image( $background_image, 'hero', true );
                $this->add_render_attribute( 'wrap', 'style', sprintf( 'background-image: url(%s);', $background_image ) );
                                                                          
            }                    
            
        }  
       
        
        // Add content
        public function render() {
                        
            $fields = $this->get_fields();
                                                                        
            $row = new Element_Row(); 
            $row->add_render_attribute( 'wrapper', 'class', 'align-middle large-unstack' );
                                                        
            // Editor
            $editor = new Element_Editor( [ 'fields' => $fields ] ); // set fields from Constructor
            $column = new Element_Column(); 
            $column->add_render_attribute( 'wrapper', 'class', 'column-block' );
            $column->add_child( $editor );            
            
            $button = new Element_Button( [ 'fields' => $fields ]  ); // set fields from Constructor
            $button->add_render_attribute( 'anchor', 'class', [ 'button', 'blue' ] ); 
            $column->add_child( $button );
            
            $row->add_child( $column );
            
            // Details
            $specs = $this->get_specs();
            if( ! empty( $specs ) ) {
                $html = new Element_Html( [ 'fields' => [ 'html' => $specs ] ] );
                $column = new Element_Column(); 
                $column->add_render_attribute( 'wrapper', 'class', 'column-block' );
                $column->add_child( $html );            
                $row->add_child( $column );
            }
            
            $this->add_child( $row ); 
        }
        
        
        private function get_specs() {
               
            $rows = $this->get_fields( 'details' );
            
            if( empty( $rows ) ) {
                return false;
            }
            
            $table = new CI_Table();
						
			foreach( $rows as $row ) {
                $cell = array();
                $cell[] = array( 'data' => sprintf( '%s:', $row['name'] ) );
				$cell[] = array( 'data' => $row['description'] );
                $table->add_row( $cell );
            }
							
            $template = array(
                    'table_open' => '<table>'
            );
            
            $table->set_template($template);
            
            return $table->generate();
            
        }
        
    }
}
   
new Services_Specs_Section;
