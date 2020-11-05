<?php


class maggie_Achivement extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-achivement';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Service', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-award';
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
				'default'     => __( 'For Individuals', 'maggie-core' ),
			]
		);

		// Description

		$this->add_control(
			'description',
			[
				'label'     => __( 'Description', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Description', 'maggie-core' ),
				'default'     => __( 'Would you like to have something or someone important to you memorialized in a beautiful way through love and connection? Parr works directly with individuals to create signature artworks for home or office. Art that feels good in YOUR space; that holds a sense of presence and magic. An heirloom that lasts for generations.', 'maggie-core' ),
			]
		);

		$this->end_controls_section();

		// achivement One

		$this->start_controls_section(
			'achivement_one',
			[
				'label' => __( 'Service One', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_one_title',
			[
				'label'     => __( 'Title', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'Envision', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_one_perifix',
			[
				'label'     => __( 'Details', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Perifix', 'maggie-core' ),
				'default'     => __( 'First, Parr consults with you to envision what matters most to you in a signature artwork. Do you want to memorialize someone? Create a scene? Express something nostalgic? These are some of the questions that will help Parr develop a concept for your approval.', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_one_icon',
			[
				'label' => __( 'Icon', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		// achivement Two

		$this->start_controls_section(
			'achivement_two',
			[
				'label' => __( 'Service Two', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_two_title',
			[
				'label'     => __( 'Title', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'Co-Create', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_two_perifix',
			[
				'label'     => __( 'Details', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Perifix', 'maggie-core' ),
				'default'     => __( 'Once you decide on an image and style, Parr works with you every step of the way. This isnt a case where the artist comes back two months later with a piece you didnt expect. You can feel confident that Parr will include you in the process, and make any changes you request.', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_two_icon',
			[
				'label' => __( 'Icon', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		// achivement Three

		$this->start_controls_section(
			'achivement_three',
			[
				'label' => __( 'Service Three', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_three_title',
			[
				'label'     => __( 'Title', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'Enjoy', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_three_perifix',
			[
				'label'     => __( 'Details', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Perifix', 'maggie-core' ),
				'default'     => __( 'Now youre officially an art collector! But unlike a purchase from a gallery or dealer, this is a co-creation with an artist you trust. Its not just a financial investment; its a personal connection - an heirloom piece that fits who YOU are.', 'maggie-core' ),
			]
		);

		$this->add_control(
			'achivement_three_icon',
			[
				'label' => __( 'Icon', 'maggie-core' ),
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
				'selector' => '{{WRAPPER}} .maggie_achivement',
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
					'{{WRAPPER}} .maggie_achivement' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .maggie_achivement' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .maggie_content_box' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'    => __( 'Description Typography', 'wend_core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .maggie_content_box',
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<section id="services">
				<div class="container inner-top inner-bottom-sm">
					
					<div class="row">
						<div class="col-lg-8 col-md-9 mx-auto text-center">
							<header>
								<h1><?php echo $settings['title'] ?></h1>
								<p><?php echo $settings['description'] ?></p>
							</header>
						</div><!-- /.col -->
					</div><!-- /.row -->
					
					<div class="row inner-top-sm text-center">
						
						<div class="col-md-4 inner-bottom-xs">
							<div class="icon">
							<img src="<?php echo $settings['achivement_one_icon']['url'] ?>" class="img-fluid" alt="">
							</div><!-- /.icon -->
							<h2><?php echo $settings['achivement_one_title'] ?></h2>
							<p class="text-small"><?php echo $settings['achivement_one_perifix'] ?></p>
						</div><!-- /.col -->
						
						<div class="col-md-4 inner-bottom-xs">
							<div class="icon">
							<img src="<?php echo $settings['achivement_two_icon']['url'] ?>" class="img-fluid" alt="">
							</div><!-- /.icon -->
							<h2><?php echo $settings['achivement_two_title'] ?></h2>
							<p class="text-small"><?php echo $settings['achivement_two_perifix'] ?></p>
						</div><!-- /.col -->
						
						<div class="col-md-4 inner-bottom-xs">
							<div class="icon">
							<img src="<?php echo $settings['achivement_three_icon']['url'] ?>" class="img-fluid" alt="">
							</div><!-- /.icon -->
							<h2><?php echo $settings['achivement_three_title'] ?></h2>
							<p class="text-small"><?php echo $settings['achivement_three_perifix'] ?></p>
						</div><!-- /.col -->
						
					</div><!-- /.row -->
					
				</div><!-- /.container -->
			</section>
		<!-- End maggie_achivement section -->
		<?php
	}
}