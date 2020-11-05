<?php


class maggie_AboutUs extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-about-us';
	}

	// Widget Titke

	public function get_title() {
		return __( 'About Us', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-users';
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
				'default'     => __( 'Experience', 'maggie-core' ),
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
				'default'     => __( 'Parr has been designing and painting for over thirty years, creating themed experiences and custom artworks for corporations and individuals. She also works with corporate clients to tailor their best marketing pitch by focusing on visual stories. Many individuals and small companies have worked with her to develop signature pieces for homes and offices. In addition, shes maintained a studio practice with a long list of exhibitions; and she writes and illustrates graphic novels. Contact Maggie Parr directly for a current resumé and/or list of exhibitions.', 'maggie-core' ),
			]
		);

		// Title Normal

		$this->add_control(
			'title_two',
			[
				'label'     => __( 'Title', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'maggie-core' ),
				'default'     => __( 'Bio', 'maggie-core' ),
			]
		);

		// Description

		$this->add_control(
			'description_two',
			[
				'label'     => __( 'Description', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Description', 'maggie-core' ),
				'default'     => __( 'Parr received her BA from Pomona College and MFA from Cal State Fullerton. Her first job was at Gemini Graphic Editions Limited, where she worked as a printer with artists such as Roy Lichtenstein and Claus Oldenberg. After that, Walt Disney Imagineering brought her on as a show designer for theme parks. Early projects included Toontown (California) and Animal Kingdom. Since going freelance, she has built a successful business designing themed environments and marketing presentations; illustrating books and advertising materials; and painting signature portraits and murals for individuals and companies.', 'maggie-core' ),
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

		$this->add_control(
			'team_color',
			[
				'label'     => __( 'Team Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#feb000',
				'selectors' => [
					'{{WRAPPER}} .team' => 'color: {{VALUE}}'
				]
			]
		);

		// Button

		$this->add_control(
			'award_color',
			[
				'label'     => __( 'Award Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .award' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<section id="who-we-are">
				<div class="container inner-md">
					<div class="row inner-top-xs">
						
						<div class="col-md-6 inner-right-xs inner-bottom-xs">
							<h2><?php echo $settings['title'] ?></h2>
							<p><?php echo $settings['description'] ?></p>
						</div><!-- /.col -->
						
						<div class="col-md-6 inner-left-xs inner-bottom-xs">
							<h2><?php echo $settings['title_two'] ?></h2>
							<p><?php echo $settings['description_two'] ?></p>
						</div><!-- /.col -->
						
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>
		<!-- End maggie_about section -->
		<?php
	}
}