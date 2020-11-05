<?php

class maggie_studio extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-studio';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Studio Visit', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-video';
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
				'label'     => __( 'Title', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'Welcome to the Studio! ', 'maggie-core' ),
			]
		);

		// Subtitle

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( 'Welcome to a virtual studio visit! Here you can peek inside Maggie Parrs space. Also check out other artist videos below.', 'maggie-core' ),
			]
        );
        
        $this->add_control(
			'video',
			[
				'label'     => __( 'Video Link', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'https://player.vimeo.com/video/455963403', 'maggie-core' ),
			]
		);

		$this->end_controls_section();

		// Pricing Tabel

		$this->start_controls_section(
			'experiences_control',
			[
				'label' => __( 'Experience', 'maggie-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'field_name',
			[
				'label'     => __( 'Artist Name', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'For Individuals', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'client_name',
			[
				'label'     => __( 'Artist Type', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Link', 'maggie-core' ),
				'default'     => __( 'Studio Visit', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'client_image',
			[
				'label' => __( 'Artists', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Services', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
				'selector' => '{{WRAPPER}} .maggie_experience',
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
					'{{WRAPPER}} .maggie_experience' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .maggie_experience' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Title

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'maggie-core' ),
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
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title',
			]
		);

		// Subtitle

		$this->add_control(
			'subtitle_color',
			[
				'label'     => __( 'Subtitle Color', 'maggie-core' ),
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
				'name'     => 'subtitle_typography',
				'label'    => __( 'Subtitle Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .subtitle',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'testimonial_style_section',
			[
				'label' => __( 'Textimonial Style Controls', 'maggie-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Name

		$this->add_control(
			'client_price_color',
			[
				'label'     => __( 'Field Name Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .field' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'client_price_typography',
				'label'    => __( 'Field Name Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .field',
			]
		);

		// Feature

		$this->add_control(
			'client_features_color',
			[
				'label'     => __( 'Client Name Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#7a808d',
				'selectors' => [
					'{{WRAPPER}} .client' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'client_features_typography',
				'label'    => __( 'Client Name Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .client',
			]
		);

		// Designation

		$this->add_control(
			'client_duration_color',
			[
				'label'     => __( 'Duration Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#feb000',
				'selectors' => [
					'{{WRAPPER}} .duration' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'client_duration_typography',
				'label'    => __( 'Duration Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .duration',
			]
		);


		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
			<section id="work-samples" class="dark-bg">
				<div class="container inner">
					
					<div class="row">
						<div class="col-lg-8 col-md-9 mx-auto text-center">
							<header>
								<h1><?php echo $settings['title'] ?></h1>
								<p><?php echo $settings['subtitle'] ?></p>
							</header>
						</div><!-- /.col -->
					</div><!-- /.row -->
					
					<div class="row">
						<div class="col-md-12 mx-auto inner-top-sm">
							<div class="video-container">
								<iframe title="vimeo-player" src="<?php echo $settings['video'] ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" allowfullscreen></iframe>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
					
					<div class="row inner-top-xs">
						<div class="col-md-12">
							<div id="accordion" class="panel-group blank">
								<div class="panel panel-default">			  
									
									<div class="panel-heading text-center">
										<h4 class="panel-title">
											<a class="panel-toggle collapsed" href="#content" data-toggle="collapse">
												<span>More Studio Visits</span>
											</a>
										</h4>
									</div><!-- /.panel-heading -->
									
									<div id="content" class="panel-collapse collapse" data-parent="#accordion">
										<div class="panel-body">
											<div id="owl-videos" class="owl-carousel owl-item-gap-sm">
                                            <?php if ( $settings['list'] ) {
                                                foreach (  $settings['list'] as $item ) {
                                            ?>
												<div class="item">
													<a href="studiovisit-moms-dolls.html">
														<figure>
															<figcaption class="text-overlay">
																<div class="info">
																	<h4><?php echo $item['field_name'] ?></h4>
																	<p><?php echo $item['client_name'] ?></p>
																</div><!-- /.info -->
															</figcaption>
															<img src="<?php echo $item['client_image']['url'] ?>" alt="">
														</figure>
													</a>
												</div><!-- /.item -->
												<?php } } ?>
												
											</div><!-- /.owl-carousel -->
										</div><!-- /.panel-body -->
									</div><!-- /.content -->
									
								</div><!-- /.panel -->
							</div><!-- /.accordion -->
						</div><!-- /.col -->
					</div><!-- /.row -->
					
				</div><!-- /.container -->
				
			</section>
			<!-- ============================================================= SECTION – LATEST WORKS : END ============================================================= -->
		<?php
	}
}