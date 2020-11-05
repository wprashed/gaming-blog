<?php

class maggie_event extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-events';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Home Page', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-briefcase';
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
				'default'     => __( 'Esports and Streaming', 'maggie-core' ),
			]
		);

		// Subtitle

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( 'Necromancers', 'maggie-core' ),
			]
		);

		// Subtitle

		$this->add_control(
			'button_text',
			[
				'label'     => __( 'Button Text', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( 'Start Browsing!', 'maggie-core' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label'     => __( 'Button Url', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$this->add_control(
			'facebook_url',
			[
				'label'     => __( 'Facebook Url', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$this->add_control(
			'twitter_url',
			[
				'label'     => __( 'Twiller Url', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$this->add_control(
			'twich_url',
			[
				'label'     => __( 'Twich Url', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$this->add_control(
			'discord_url',
			[
				'label'     => __( 'Discord Url', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$this->end_controls_section();

	}

	// Style Control

	protected function register_style_controls() {

		


		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>
  <main class="site-content text-center" id="wrapper">
    
    <div class="site-content__center">
        <br>
        <h1 class="text-white landing-title"><span class="subtitle landing-subtitle"><?php echo $settings['title'] ?></span><?php echo $settings['subtitle'] ?></h1>
        <a href="<?php echo $settings['button_url'] ?>" class="btn btn-primary btn-lg btn--landing"><span><?php echo $settings['button_text'] ?></span></a>
    </div>
    
</main>

<!-- Footer
================================================== -->
<footer id="footer" class="footer text-center">
    <ul class="social-menu social-menu--landing social-menu--landing-glitch">
        <li>
            <a href="<?php echo $settings['facebook_url'] ?>" target="_blank">
                <i class="fab fa-facebook-square"></i>
                <span class="link-subtitle">Facebook</span>Necrogame
            </a>
        </li>
        <li>
            <a href="<?php echo $settings['twitter_url'] ?>" target="_blank">
                <i class="fab fa-twitter"></i>
                <span class="link-subtitle">Twitter</span>Necrotwt
            </a>
        </li>
        <li>
            <a href="<?php echo $settings['twich_url'] ?>" target="_blank">
                <i class="fab fa-twitch"></i>
                <span class="link-subtitle">Twitch</span>Necroplays
            </a>
        </li>
        <li>
            <a href="<?php echo $settings['discord_url'] ?>" target="_blank">
                <i class="fab fa-discord"></i>
                <span class="link-subtitle">Discord</span>Necrochat
            </a>
        </li>
    </ul>
</footer>
		<?php
	}
}