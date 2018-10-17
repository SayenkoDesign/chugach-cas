<?php
// Footer - CTA

if( ! class_exists( 'Footer_CTA_Section' ) ) {
    class Footer_CTA_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
            
            $show_footer_cta = false;

            // default to TRUE for the blog
            if( is_page() ) {
                $show_footer_cta = get_field( 'page_settings_call_to_action' );
            }

            if( ! $show_footer_cta ) {
                return false;
            }
            
            $fields['footer_cta_background'] = get_field( 'footer_cta_background', 'option' );
            $fields['footer_cta_left'] = get_field( 'footer_cta_left', 'option' );
            $fields['footer_cta_right'] = get_field( 'footer_cta_right', 'option' );
            $fields['footer_cta_icon'] = get_field( 'footer_cta_icon', 'option' );
            
            if( empty( array_filter( $fields ) ) ) {
                return false;
            }
                        
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
                     $this->get_name() . '-footer-cta'
                ]
            );  
            
            $background_image = $this->get_fields( 'footer_cta_background', 'options' );
            
            if( ! empty( $background_image ) ) {
                $background_image = _s_get_acf_image( $background_image, 'hero', true );                
                $this->add_render_attribute( 'wrap', 'style', sprintf( 'background-image: url(%s);', $background_image ) );            }                 
        }  
        
        
        
        public function after_render() {
                            
            $this->add_render_attribute( 'wrap', 'class', 'wrap' );
            
            $icon = $this->get_fields( 'footer_cta_icon', 'options' );
            if( ! empty( $icon ) ) {
                $icon = sprintf('<div class="footer-icon">%s</div>', _s_get_acf_image( $icon ) );
            }
            
            return sprintf( '</div>%s</section>', $icon );
        }
       
        
        // Add content
        public function render() {
                
            $fields = $this->get_fields();
                                                 
            $row = new Element_Row(); 
            $row->add_render_attribute( 'wrapper', 'class', 'expanded large-unstack align-middle' );
                                        
            // Left 
            
            $html = new Element_Html( [ 'fields' => [ 'html' => $this->get_fields( 'footer_cta_left' ) ] ] );
            $column = new Element_Column(); 
            $column->add_render_attribute( 'wrapper', 'class', 'column-block' );
            $column->add_child( $html );
            
            $row->add_child( $column );
            
            $html = new Element_Html( [ 'fields' => [ 'html' => $this->get_fields( 'footer_cta_right' ) ] ] );
            $column = new Element_Column(); 
            $column->add_render_attribute( 'wrapper', 'class', 'column-block' );
            $column->add_child( $html );
                                    
            $row->add_child( $column );
            
            $this->add_child( $row );
        
        }
        
    }
}
   
new Footer_CTA_Section;
