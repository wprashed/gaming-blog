<?php


class maggie_Blog extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'maggie-blog';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Blog', 'maggie-core' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-file-o';
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

		$categories=get_categories($args);
		$cate_array = array();
		$arrayCateAll = array( 'all' => 'All categories ' );
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->cat_name] = $cate->slug;
			}
		} else {
			$cate_array["No content Category found"] = 0;
		}

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

		// Subtitle

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'maggie-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'maggie-core' ),
				'default'     => __( 'When unknow printer took a service of type and scramblted it to make a type specimen book', 'maggie-core' ),
			]
		);

		// Category

		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge($arrayCateAll,$cate_array),
			]
		);

		// Total Count

		$this->add_control(
			'total_count',
			[
				'label' => __( 'Total Post', 'maggie-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
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
				'selector' => '{{WRAPPER}} .maggie_blog',
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
					'{{WRAPPER}} .maggie_blog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .maggie_blog' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'blog_style_section',
			[
				'label' => __( 'Blog Style Controls', 'maggie-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Title

		$this->add_control(
			'blog_title_color',
			[
				'label'     => __( 'Title Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#011a3e',
				'selectors' => [
					'{{WRAPPER}} .maggie_info h3 a' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'blog_title_typography',
				'label'    => __( 'Title Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .maggie_info h3 a',
			]
		);

		// Date

		$this->add_control(
			'blog_date_color',
			[
				'label'     => __( 'Date Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#feb000',
				'selectors' => [
					'{{WRAPPER}} .maggie_info a' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'blog_date_typography',
				'label'    => __( 'Date Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .maggie_info a',
			]
		);

		// Subtitle

		$this->add_control(
			'blog_details_color',
			[
				'label'     => __( 'Content Color', 'maggie-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#7a808d',
				'selectors' => [
					'{{WRAPPER}} .maggie_info p' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'blog_details_typography',
				'label'    => __( 'Content Typography', 'maggie-core' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .maggie_info p',
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
				'label'     => __( 'Button Icon Color', 'maggie-core' ),
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

		$category = $settings['category'];
		$total_count = $settings['total_count'];
		$order = $settings['order_by'];

		$args = [];
		if ($category == 'all') {
			$args=[
				'post_type' => 'post',
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		} else {
			$args=[
				'post_type' => 'post', 
				'category_name'=>$category,
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		}

		$blog = new \WP_Query($args);

		?>
		<!-- Start maggie_blog section -->
		<section class="maggie_blog blog_v1">
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
					<?php
						if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post();
					?>
					<div <?php post_class("col-lg-4 col-md-6 col-sm-12"); ?> id="post-<?php the_ID(); ?>">
						<div class="grid_item wow fadeInUp">
							<div class="maggie_img">
								<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="">
							</div>
							<div class="maggie_info">
								<?php 
						            $archive_year  = get_the_time('Y'); 
						            $archive_month = get_the_time('m'); 
						            $archive_day   = get_the_time('d'); 
					            ?>
								<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>" class="date"><?php echo esc_html( get_the_date() ); ?></a>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="link_btn"><?php _e('Read More', 'maggie-core'); ?></a>
							</div>
						</div>
					</div>
					<?php
						endwhile; endif; wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
		<!-- End maggie_blog section -->
		<?php
	}
}