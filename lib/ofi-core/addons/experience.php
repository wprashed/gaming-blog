<?php

class maggie_Experience extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-experience';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Team', 'maggie-core' );
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'team_name',
			[
				'label'     => __( 'Team Member Name', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'MARINA GONZALES', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_role',
			[
				'label'     => __( 'Team Member Role', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'TEAM MANAGER', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_age',
			[
				'label'     => __( 'Team Member Age', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( '22 YEARS', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_joined',
			[
				'label'     => __( 'Team Member Joined', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'JAN 2016', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_country',
			[
				'label'     => __( 'Team Member Country', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'COSTA RICA', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_details',
			[
				'label'     => __( 'Team Member Details', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_twitter',
			[
				'label'     => __( 'Team Member Twitter', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_twitch',
			[
				'label'     => __( 'Team Member Twitch', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_instagram',
			[
				'label'     => __( 'Team Member Instagram', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'maggie-core' ),
				'default'     => __( '#', 'maggie-core' ),
			]
		);

		$repeater->add_control(
			'team_image',
			[
				'label' => __( 'Team Member Image', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'team',
			[
				'label' => __( 'Team One', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$repeater = new \Elementor\Repeater();

	}

	// Style Control

	protected function register_style_controls() {



		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();

		?>

			<main class="site-content" id="wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-5 page-heading page-heading--loop bg-image bg--ph-02">
						<div class="page-heading__subtitle h5 color-primary"><?php bloginfo( 'name' ); ?></div>
						<h1 class="page-heading__title h2"><?php the_title(); ?></h1>
					</div>
					<div class="col-lg-7 p-0 content staff-layout">
						<div class="row">
						<?php if ( $settings['team'] ) {
							foreach (  $settings['team'] as $item ) {
						?>
						<div class="col-lg-6 p-0 staff-member has-post-thumbnail">
							<div class="row">
								<div class="staff-member__thumbnail col-lg-6 col-sm-6">
									<img src="<?php echo $item['team_image']['url'] ?>" alt="">
								</div>
								<div class="staff-member__body col-lg-6 col-sm-6">
									<div class="staff-member__position"><?php echo $item['team_role'] ?></div>
									<h2 class="staff-member__title h3"><?php echo $item['team_name'] ?></h2>
									<ul class="staff-member__meta list-unstyled">
										<li class="staff-member__meta-item"><span>Age</span><?php echo $item['team_age'] ?></li>
										<li class="staff-member__meta-item"><span>Joined</span><?php echo $item['team_joined'] ?></li>
										<li class="staff-member__meta-item"><span>Country</span><?php echo $item['team_country'] ?></li>
									</ul>
									<div class="staff-member__excerpt"><?php echo $item['team_details'] ?></div>
									<ul class="social-menu social-menu--links">
										<li><a href="<?php echo $item['team_twitter'] ?>"></a></li>
										<li><a href="<?php echo $item['team_twitch'] ?>"></a></li>
										<li><a href="<?php echo $item['team_instagram'] ?>"></a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php } } ?>
						</div>
					</div>
				</div>
			</div>
			
			
		</main>
		<?php
	}
}