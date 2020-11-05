<?php


class maggie_Pricing_Table extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-pricing-table';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Pricing Table', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-table';
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
				'default'     => __( 'Afforable Pricing', 'maggie-core' ),
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
			'pricing_table',
			[
				'label' => __( 'Pricing Table', 'maggie-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'table_icon',
			[
				'label' => __( 'Package Icon', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'table_title',
			[
				'label'     => __( 'Package Name', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'Basic', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'table_features',
			[
				'label'     => __( 'Package Features', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Features', 'maggie-core' ),
				'default'     => __( '<li>Graphic Design</li><li>Web Design</li><li>UI/UX</li><li>HTML/CSS</li><li>SEO Marketing</li><li>Business Analysis</li>', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'table_price',
			[
				'label'     => __( 'Package Price', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Price', 'maggie-core' ),
				'default'     => __( '$70', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'table_duration',
			[
				'label'     => __( 'Package Duration', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Duration', 'maggie-core' ),
				'default'     => __( 'month', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'button_text', [
				'label' => __( 'Button Text', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Start now' , 'maggie-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_url',
			[
				'label'     => __( 'Button Url', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'maggie-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Pricing Table', 'maggie-core' ),
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
				'selector' => '{{WRAPPER}} .maggie_pricing',
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
					'{{WRAPPER}} .maggie_pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .maggie_pricing' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'tabe_style_section',
			[
				'label' => __( 'Table Style Controls', 'maggie-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Title

		$this->add_control(
			'table_title_color',
			[
				'label'     => __( 'Title Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .title h3' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'table_title_typography',
				'label'    => __( 'Title Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title h3',
			]
		);

		// Feature

		$this->add_control(
			'table_features_color',
			[
				'label'     => __( 'Features Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#7a808d',
				'selectors' => [
					'{{WRAPPER}} .list li' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'table_features_typography',
				'label'    => __( 'Features Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .list li',
			]
		);

		// Price

		$this->add_control(
			'table_price_color',
			[
				'label'     => __( 'Price Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .price h2' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'table_price_typography',
				'label'    => __( 'Price Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price h2',
			]
		);

		// Duration

		$this->add_control(
			'table_duration_color',
			[
				'label'     => __( 'Duration Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#feb000',
				'selectors' => [
					'{{WRAPPER}} .price h2.duration' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'table_duration_typography',
				'label'    => __( 'Duration Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price h2.duration',
			]
		);

		// Button

		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Button Text Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .link_btn' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => __( 'Button Background Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#feb000',
				'selectors' => [
					'{{WRAPPER}} .link_btn:before' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'label'    => __( 'Button Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .link_btn',
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<!-- Start maggie_pricing section -->
		<section class="maggie_pricing pricing_v1">
			<div class="shape_v4">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape_11.png" class="shape_11" alt="">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_title text-center">
							<h2 class="title"><?php echo $settings['title'] ?></h2>
							<p class="subtitle"><?php echo $settings['subtitle'] ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php if ( $settings['list'] ) {
                		foreach (  $settings['list'] as $item ) {
                	?>
                	<?php
	            		$target = $item['button_url']['is_external'] ? ' ' : '';
						$nofollow = $item['button_url']['nofollow'] ? ' rel="nofollow"' : '';
	            	?>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="pircing_box wow fadeInUp">
							<div class="icon">
								<img src="<?php echo $item['table_icon']['url'] ?>" class="img-fluid" alt="">
							</div>
							<div class="title">
								<h3><?php echo $item['table_title'] ?></h3>
							</div>
							<div class="list">
								<ul>
									<?php echo $item['table_features'] ?>
								</ul>
							</div>
							<div class="price">
								<h2><?php echo $item['table_price'] ?> <span class="duration">/ <?php echo $item['table_duration'] ?></span></h2>
							</div>
							<div class="button_box">
								<a href="<?php echo $item['button_url']['url'] ?>" <?php echo $target  ?>  <?php $nofollow ?> class="maggie_btn"><?php echo $item['button_text'] ?></a>
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</section>
		<!-- End maggie_pricing section -->
		<?php
	}
}