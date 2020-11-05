<?php


class maggie_Contact_Two extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-contact-two';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Contact Us Two', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-envelope-open';
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
				'default'     => __( 'Send us a message', 'maggie-core' ),
			]
		);

		// Subtitle

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( 'When unknow printer took a gallery of type and scramblted it to make a type specimen book', 'maggie-core' ),
			]
		);

		// Shortcode

		$this->add_control(
			'shortcode',
			[
				'label'     => __( 'Form Shortcode', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Shortcode', 'maggie-core' ),
				'default'     => __( '[contact-form-7 id="2797" title="Contact form 1"]', 'maggie-core' ),
			]
		);


		// Background Photo

		$this->add_control(
			'side_image',
			[
				'label' => __( 'Contact Image', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<!-- Start maggie_contact section -->
		<section class="maggie_contact cantact_v2 section_padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_title">
							<h2 class="title"><?php echo $settings['title'] ?></h2>
							<p class="subtitle"><?php echo $settings['subtitle'] ?></p>
						</div>
						<div class="contact_form">
							<?php echo $settings['shortcode'] ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}