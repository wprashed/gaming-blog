<?php


class maggie_banner extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-banner';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Banner', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-text-width';
	}

	//	Widget Categories

	public function get_categories() {
		return [ 'maggie_addons' ];
	}

	// Register Widget Control

	protected function _register_controls() {

		$this->register_content_controls();
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
				'default'     => __( 'Latest Blog', 'maggie-core' ),
			]
		);

		$this->end_controls_section();

	}

	

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
		<section id="hero" class="img-bg-bottom img-bg-soft tint-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/art/slider03.jpg);">
				<div class="container inner">
					<div class="row">
						<div class="col-md-10">
							<header>
								<h1><?php echo $settings['title'] ?></h1>
							</header>
						</div><!-- /.col -->
					</div><!-- ./row -->
				</div><!-- /.container -->
			</section>
		<!-- End maggie_blog section -->
		<?php
	}
}