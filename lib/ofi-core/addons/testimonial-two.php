<?php


class maggie_Testimonials_Two extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-textimonial-two';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Testimonial Two', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-comments-o';
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
			'client_image',
			[
				'label' => __( 'Client Image', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'client_name',
			[
				'label'     => __( 'Client Name', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'Jhon Smith', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'client_designation',
			[
				'label'     => __( 'Client Designation', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'UI/UX Designer', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'client_comments',
			[
				'label'     => __( 'Client Comments', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Features', 'maggie-core' ),
				'default'     => __( 'Donec condimentum vehicula iaculis. Maecenas in aliquet neque. Suspendisse viverra, ante eget pellentesque pulvinar, nunc nisi molestie ligula, vitae convallis orci justo vitae sem. Integer vitae imperdiet augue, sed accumsan diam. Etiam non quam commodo dolor convallis cursus. Duis tempus dolor eget gravida fringilla. In ultricies velit eget sem tempus egestas.', 'maggie-core' ),
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Testimonial', 'maggie-core' ),
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
				'selector' => '{{WRAPPER}} .testimonials',
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
					'{{WRAPPER}} .testimonials' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .testimonials' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<!-- Testimonials -->
	    <section id="testimonials" class="testimonials section">
	      <!-- Testimonial Nav -->
	      <div id="testimonials-slider-pager" class="test-nav">
	        <?php if ( $settings['list'] ) {
	        	$i = 1; 
        		foreach (  $settings['list'] as $item ) {
        	?>
	        <a href="#" class="pager-item" data-slide-index="<?php echo $i++; ?>"><img src="<?php echo $item['client_image']['url'] ?>" alt="#"></a>
	        <?php } } ?>
	      </div>
	      <!--/ End Testimonial Nav -->
	      <div class="container">
	        <div class="row">
	          <div class="col-lg-7 offset-lg-5 col-md-6 offset-md-6 col-12">
	            <!-- Testimonial Slider -->
	            <div class="testimonials-slider">
	              <div class="slider-active">
	              	<?php if ( $settings['list'] ) {
		        		foreach (  $settings['list'] as $item ) {
		        	?>
	                <!-- Single Testimonial -->
	                <div class="single-testimonial">
	                  <div class="testimonial-text">
	                    <i class="icofont-quote-left"></i>
	                    <p><?php echo $item['client_comments'] ?></p>
	                    <h4><?php echo $item['client_name'] ?><span><?php echo $item['client_designation'] ?></h4>  
	                  </div>
	                </div>
	                <!--/ End Single Testimonial -->
	                <?php } } ?>
	              </div>
	            </div>
	            <!--/ End Tstimonial Slider -->
	          </div>
	        </div>
	      </div>
	    </section>
		<?php
	}
}