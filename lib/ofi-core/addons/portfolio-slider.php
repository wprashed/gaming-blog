<?php


class maggie_Portfolio_Slider extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-portfolio-slider';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Portfolio Slider', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-picture-o';
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

		$args = array(
			'orderby' => 'name',
			'order' => 'ASC'
		);

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
				'default'     => __( 'Our Latest Projects', 'maggie-core' ),
			]
		);

		// Subtitle

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( 'When unknow printer took a portfolio of type and scramblted it to make a type specimen book', 'maggie-core' ),
			]
		);

		// Total Count

		$this->add_control(
			'total_count',
			[
				'label' => __( 'Total Post', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 9,
			]
		);

		// Order By

		$this->add_control(
			'order_by',
			[
				'label' => __('Order By', 'maggie-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __('ASC', 'maggie-core'),
					'desc' => __('DESC', 'maggie-core'),
				]
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
				'selector' => '{{WRAPPER}} .maggie_project',
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
					'{{WRAPPER}} .maggie_project' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .maggie_project' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		// Title

		$this->add_control(
			'portfolio_title_color',
			[
				'label'     => __( 'portfolio Title Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .stitle a' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'portfolio_title_typography',
				'label'    => __( 'portfolio Title Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .stitle a',
			]
		);

		// Subtitle

		$this->add_control(
			'portfolio_details_color',
			[
				'label'     => __( 'Portfolio Details Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#7a808d',
				'selectors' => [
					'{{WRAPPER}} .info p' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'portfolio_details_typography',
				'label'    => __( 'Portfolio Details Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .info p',
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {

		$settings   = $this->get_settings_for_display();
		$total_count = $settings['total_count'];
		$order = $settings['order_by'];

		$args=[
				'post_type' => 'portfolio',
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		$portfolio = new \WP_Query($args);

		?>
		<!-- Start maggie_project section -->
		<section class="maggie_project project_v1">
			<div class="shape_v3">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape_10.png" class="shape_10" alt="">
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
					<div class="col-lg-12">
						<div class="project_button text-center">
							<?php 
								$categories = get_categories('taxonomy=portfolio_category&post_type=portfolio'); 
							?>
							<button class="project_btn active_btn" data-filter="*"><?php _e('All', 'maggie-core'); ?></button>
							<?php foreach ($categories as $category) : ?>
							<button class="project_btn" data-filter=".<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>	
				<div class="projects_slider_content">
					<?php 
                        if($portfolio->have_posts()) : while($portfolio->have_posts()) : $portfolio->the_post();
                        $terms = get_the_terms ($portfolio->ID, 'portfolio_category');
                        if ( !is_wp_error($terms) && !empty($terms)) : 
                        $slugs = wp_list_pluck($terms, 'slug');

                        $slug = implode(" ", $slugs); 
                    ?>
					<div class="single_project <?php echo esc_attr($slug); ?>">
						<?php else: ?>
	                    <?php endif; ?>
						<div class="grid_item">
							<div class="maggie_img">
								<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="">
							</div>
							<div class="maggie_info">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><?php echo esc_html($category->name);?></p>
							</div>
						</div>
					</div>
					<?php endwhile; endif; wp_reset_postdata();?>
		          	<?php wp_reset_query(); ?>
				</div>
			</div>
		</section>
		<!-- End maggie_project section -->
		<?php
	}
}