<?php

/*
About Story
		
*/    
    
if( ! class_exists( 'About_Story_Section' ) ) {
    class About_Story_Section extends Element_Section {
        
        public function __construct() {
            parent::__construct();
            
            $fields = get_field( 'our_story' );
            $this->set_fields( $fields );
            
            if( empty( $fields['events'] ) ) {
                return;
            }

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
                     $this->get_name() . '-our-story'
                ]
            );
            
            $this->add_render_attribute(
                'wrapper', 'id', $this->get_name() . '-our-story', true );
        }
        
        // Add content
        public function render() {
            
            $fields = $this->get_fields();
            
            $start = $fields['start'];
            $end   = $fields['end'];
            
            // get last event year
            $last_year = $fields['events'];
            end($last_year);
            $key = key($last_year);
            $last_year = $last_year[$key]['year'];
            
            if( ( $end <= date( 'Y' ) ) || ( $last_year <= date( 'Y' ) ) ) {
                $end = date( 'Y' ) + 2;
            }
            
            $start_date = sprintf( '<span class="start"><b></b>%s</span>', $start );
            $end_date   = sprintf( '<span class="end"><b></b>%s</span>', $end );
                        
            $slides = '';
            
            $events = $fields['events'];
            
            foreach( $events as $event ) {
                
                $year = $photo = $description = '';
                
                $year = $event['year'];
                
                $position = ( ( $year - $start ) / ( $end - $start ) ) * 100 . '%';
                
                $photo = _s_get_acf_image( $event['photo'], 'large', true ); 
                
                $description = $event['description'];
                                                        
                $slides .= sprintf( '<div><div class="event" style="background-image:url(%s)" data-year="%s" data-position="%s">
                                    <div class="caption">
                                            <span class="caption-arrow">%s</span>
                                            <div class="caption-lower">
                                                <h5>%s</h5>%s
                                            </div>
									</div>
                                   </div></div>', 
                                       $photo,
                                       $year,
                                       $position, 
                                       get_svg( 'chevron' ),
                                       $year,
                                       $description
                                   );
                
            } 
            
            $heading = _s_format_string( $fields['heading'], 'h2' );
               
            return sprintf( '<header class="column row text-center">%s</header><div class="row align-middle"><div class="column"><div class="timeline-cnt">%s%s</div>
                             <div class="timeline-slider slick">%s</div></div></div>', 
                                $heading,
                                $start_date,
                                $end_date,
                                $slides
                              );
        }
    }
}
   
new About_Story_Section;

    