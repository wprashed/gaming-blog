<?php


class maggie_Service_Tab extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-service-tab';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Service Tab', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-server';
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title',
			[
				'label'     => __( 'Service Title', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'Web Design', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'service_icon',
			[
				'label' => __( 'Service Icon', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'service_image',
			[
				'label' => __( 'Service Image', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'service_details',
			[
				'label'     => __( 'Client Comments', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Features', 'maggie-core' ),
				'default'     => __( 'Etiam suscipit sed sem nec elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed accumsan, urna vel finibus sollicitudin, urna sem fringilla nisi.

					In vel ante tristique, blandit nisi in, feugiat nisl. Nunc sagittis pretium arcu, ac consectetur diam feugiat vitae. Pellentesque sit amet elit facilisis, sodales nisl non, luctus ex. Donec molestie consequat velit, id imperdiet arcu sollicitudin.

					Praesent ac tempus ipsum, eget consequat ante. Sed consequat, elit euismod finibus faucibus.', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'service_status',
			[
				'label' => __( 'Service Status Style', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'deactive',
				'options' => [
					'active'  => __( 'active', 'maggie-core' ),
					'deactive' => __( 'deactive', 'maggie-core' ),
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
				'selector' => '{{WRAPPER}} .service_wrapper',
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
					'{{WRAPPER}} .service_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .service_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Title

		$this->add_control(
			'normal_title_color',
			[
				'label'     => __( 'Service Title Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .stitle' => 'color: {{VALUE}}'
				]
			]
		);

		// Subtitle

		$this->add_control(
			'description_color',
			[
				'label'     => __( 'Service Details Color', 'wend_core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#7a808d',
				'selectors' => [
					'{{WRAPPER}} .details' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();


	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<!-- Start maggie_service section -->
		<section class="service_wrapper section_padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="service_tab_wrap">
							<div class="service_tab_nav">
								<ul class="nav nav-tabs">
									<?php if ( $settings['list'] ) {
										$i = 'a';
				                		foreach (  $settings['list'] as $item ) {
				                	?>
								    <li class="nav-item">
								      	<a class="nav-link stitle <?php echo $item['service_status'] ?>" data-toggle="tab" href="#<?php echo $i++; ?>"><img src="<?php echo $item['service_icon']['url'] ?>" alt=""><span><?php echo $item['service_title'] ?></span></a>
								    </li>
								    <?php } } ?>
								</ul>
							</div>
							<!-- Tab panes -->
							<div class="tab-content">
								<?php if ( $settings['list'] ) {
									$j = 'a';
									$f = 1;
			                		foreach (  $settings['list'] as $item ) {
			                	?>
							    <div id="<?php echo $j++; ?>" class="tab-pane <?php echo $item['service_status'] ?> <?php if($f++ > 1){echo "fade";} ?>">
							      	<div class="row align-items-center">
							      		<div class="col-lg-6">
							      			<div class="maggie_content_box">
							      				<h2 stitle><?php echo $item['service_title'] ?></h2>
							      				<div class="details">
							      					<?php echo $item['service_details'] ?>
							      				</div>
							      			</div>
							      		</div>
							      		<div class="col-lg-6">
							      			<div class="maggie_img_box">
							      				<img src="<?php echo $item['service_image']['url'] ?>" class="img-fluid" alt="">
							      			</div>
							      		</div>
							      	</div>
							    </div>
							    <?php } } ?>
							</div>
							<!-- tab pane -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End maggie_service section -->
		<!-- End service_wrapper section -->
		<?php
	}
}