<?php


class maggie_Work_Flow extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-work-flow';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Work Flow', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-code-fork';
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
				'default'     => __( 'Our Work Flow', 'maggie-core' ),
			]
		);

		// Subtitle

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( 'When unknow printer took a of type and scramblted it to make a type specimen book', 'maggie-core' ),
			]
		);

		$this->end_controls_section();

		// Pricing Tabel

		$this->start_controls_section(
			'experiences_control',
			[
				'label' => __( 'Work Flow', 'maggie-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'work_flow_title',
			[
				'label'     => __( 'Title', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'Analysis', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'work_flow_details',
			[
				'label'     => __( 'Details', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Details', 'maggie-core' ),
				'default'     => __( 'Morbi vel tortor at metus malesuada convallis. Nam diam magna, laoreet ac libero quis, laoreet semper sem. Etiam erat quam, suscipit in orci ut, aliquet finibus tortor. Nullam dui leo, convallis quis diam eget, aliquam feugiat nunc. Vivamus quis volutpat dui.', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'work_flow_icon',
			[
				'label' => __( 'Work Flow Icon', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'work_flow_image',
			[
				'label' => __( 'Work Flow Image', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Work Follow', 'maggie-core' ),
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
				'label'     => __( 'Title Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .info h3' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'client_price_typography',
				'label'    => __( 'Title Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .info h3',
			]
		);

		// Feature

		$this->add_control(
			'client_features_color',
			[
				'label'     => __( 'Details Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#7a808d',
				'selectors' => [
					'{{WRAPPER}} .details' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'client_features_typography',
				'label'    => __( 'Details Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .details',
			]
		);


		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<!-- Start service_feature -->
		<section class="service_feature">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_title text-center">
							<h2 class="title"><?php echo $settings['title'] ?></h2>
							<p class="subtitle"><?php echo $settings['subtitle'] ?></p>
						</div>
					</div>
				</div>
				<div class="feature_wrapper">
					<?php
						$counter = 1;
	            		foreach (  $settings['list'] as $item ) {
	            		if( $counter++ % 2 !== 0 ): 
	            	?>
					<div class="single_feature">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="maggie_img_box">
									<img src="<?php echo $item['work_flow_image']['url'] ?>" class="img-fluid" alt="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="maggie_content_box">
									<div class="icon">
										<img src="<?php echo $item['work_flow_icon']['url'] ?>" alt="">
									</div>
									<div class="info">
										<h3><?php echo $item['work_flow_title'] ?></h3>
										<div class="details">
											<?php echo $item['work_flow_details'] ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php else: ?>
					<div class="single_feature">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="maggie_content_box">
									<div class="icon">
										<img src="<?php echo $item['work_flow_icon']['url'] ?>" alt="">
									</div>
									<div class="info">
										<h3><?php echo $item['work_flow_title'] ?></h3>
										<div class="details">
											<?php echo $item['work_flow_details'] ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="maggie_img_box">
									<img src="<?php echo $item['work_flow_image']['url'] ?>" class="img-fluid" alt="">
								</div>
							</div>
						</div>
					</div>
					<?php endif ?>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- End maggie_feature -->
		<?php
	}
}