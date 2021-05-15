<?php 

namespace Elementor;

class Hero_services extends Widget_Base {

    // Get widget name.
	public function get_name() { 
        return 'hero-services'; 
    }	

    //  Get widget title.
	public function get_title() { 
        return 'Hero Services';
    }	

    // Get widget icon.
	public function get_icon() {
        return 'fa fa-columns'; 
    }

    // Get widget categories.
	public function get_categories() { 
        return [ 'basic' ]; 
    }

    //Controls widget
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
		$this->add_control(
			'important_note',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'Para gestionar los servicios ingrese en el panel de control <a target="_blank" href="' . admin_url() . 'edit.php?post_type=servicios"> Servicios. </a>' ),
			]
		);
		$this->end_controls_section();
	}

    // Render widget output on the frontend.
	protected function render() { 
  
        $args =[
            'post_type'         => 'servicios',
            'post_status'       => 'published',
            'posts_per_page'    => -1
        ];
     
        $loop = new \WP_Query($args); ?>

        <div class="MLC-hero-services">
            <?php if($loop->have_posts()) :
                while($loop->have_posts()) : $loop->the_post(); ?>                
                    <div class="MLC-hero-services__box">
                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($loop->ID) ); ?>
                        <div class="MLC-hero-services__box-wrap" style="background-image: url(' <?php echo $url; ?>')">                            
                            <div class="MLC-hero-services__col-icon">
                                <h3 class="MLC-hero-services__title MLC-hero-services__title--vertical"> <?php the_title(); ?> </h3>
                                <?php if( get_field('icono') ): ?>
                                    <img class="MLC-hero-services__icon" src="<?php the_field('icono'); ?>" />
                                <?php else: ?> 
                                    <img class="MLC-hero-services__icon" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/ico_placehold.png'; ?>" />
                                <?php endif; ?>
                            </div>                            
                            <div class="MLC-hero-services__col-info">
                                <h3 class="MLC-hero-services__title"> <?php the_title(); ?> </h3>
                                <?php if( get_field('extracto') ): ?>
                                    <p class="MLC-hero-services__extracto"><?php the_field('extracto'); ?></p>
                                <?php endif; ?>                            
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;                
                \wp_reset_postdata();
            else: 
                echo '<p class="MLC_not-found"> Sorry, post not available </p>';
            endif; 
            ?>
        </div>
        <?php
	}	
}