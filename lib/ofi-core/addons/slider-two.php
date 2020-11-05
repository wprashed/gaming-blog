<?php


class maggie_slider_two extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-slider-two';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Projects', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-image';
	}

	//	Widget Categories

	public function get_categories() {
		return [ 'maggie_addons' ];
	}

	// Register Widget Control

	protected function _register_controls() {

		$this->register_content_controls();
		$this->register_style_controls();
	}

	// Widget Controls 

	function register_content_controls() {

		// Controls

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content Controls', 'maggie-core' ),
			]
		);

		// Title Normal

		$this->add_control(
			'title',
			[
				'label'     => __( 'Client', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'Samples of Individual Commissions', 'maggie-core' ),
			]
		);

		$this->end_controls_section();

	}

	// Style Control

	protected function register_style_controls() {

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style Controls', 'maggie-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Background

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'maggie-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .maggie_about',
			]
		);

		// Padding

		$this->add_control(
			'padding',
			[
				'label' => __( 'Padding', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .maggie_about' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin

		$this->add_control(
			'margin',
			[
				'label' => __( 'Margin', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .maggie_about' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Title

		$this->add_control(
			'normal_title_color',
			[
				'label'     => __( 'Title Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'normal_title_typography',
				'label'    => __( 'Title Typography', 'wend_core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title',
			]
		);

		// Subtitle

		$this->add_control(
			'description_color',
			[
				'label'     => __( 'Description Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#7a808d',
				'selectors' => [
					'{{WRAPPER}} .subtitle' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'    => __( 'Description Typography', 'wend_core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .subtitle',
			]
		);

		// Button

		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Skill Background Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f6f6f6',
				'selectors' => [
					'{{WRAPPER}} .maggie_skill .skill_wrapper .single_bar .progress' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => __( 'Skill Active Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#feb000',
				'selectors' => [
					'{{WRAPPER}} .maggie_skill .skill_wrapper .single_bar .progress .progress-bar' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
            
            <section id="work-samples" class="light-bg">
				<div class="container inner">
					
					<div class="row">
						<div class="col-lg-8 col-md-9 mx-auto text-center">
							<header>
								<h1><?php echo $settings['title'] ?></h1>
							</header>
						</div><!-- /.col -->
					</div><!-- /.row -->
					
					<div class="row inner-top-sm">
						<div class="col-md-12">
							<div id="owl-work-samples-big" class="owl-carousel owl-outer-nav owl-ui-lg">
                                <?php query_posts( array(
                                    'post_type' => 'portfolio',
                                    'post_per_page' => -1,
                                    )); 
                                ?> 
                                <?php 
                                    while (have_posts()) : the_post();
                                    $terms = get_the_terms ($the_query->ID, 'portfolio_category');
                                    if ( !is_wp_error($terms) && !empty($terms)) : 
                                    $slugs = wp_list_pluck($terms, 'slug');

                                    $slug = implode(" ", $slugs); 
                                ?>    
                                <?php else: ?>
                                <?php
                                    endif;
                                ?>
								<div class="item">
									<a href="maggie-parr-painting-portraits.html">
										<figure>
											<figcaption class="text-overlay">
												<div class="info big">
													<h2><?php the_title(); ?></h2>
													<p><?php echo esc_html($slug); ?></p>
												</div><!-- /.info -->
											</figcaption>
											<?php the_post_thumbnail(); ?>
										</figure>
									</a>
								</div><!-- /.item -->
                                <?php endwhile; ?>
                    		    <?php wp_reset_query(); ?>	
							</div><!-- /.owl-carousel -->
						</div><!-- /.col -->
					</div><!-- /.row -->
					
				</div><!-- /.container -->
				
			</section>
		<?php
	}
}