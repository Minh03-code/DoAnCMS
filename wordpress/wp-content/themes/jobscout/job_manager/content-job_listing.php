<?php

/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;
$job_salary   = get_post_meta(get_the_ID(), '_job_salary', true);
$job_featured = get_post_meta(get_the_ID(), '_featured', true);
$company_name = get_post_meta(get_the_ID(), '_company_name', true);

?>
<div class="col-6">
	<div class="bg-white-module24">
		<div class="row">
			<div class="col-md-4">
				<?php the_company_logo('thumbnail'); ?>
			</div>
			<div class="col-md-8 alie">
				<div class="row">
					<div class="col-md-12">
						<h5 class="job-title-module24">
							<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
						</h5>

					</div>
					<div class="col-md-12">
						<div class="date-job-module24">
							<?php echo "Create: " . get_the_date('M j, Y'); ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="bg-gray-module-24">
							<div class="row">
								<div class="col-md-4 border-right text-company">
									<?php
									if (get_option('job_manager_enable_types')) {
										$types = wpjm_get_the_job_types();
										if (!empty($types)) : foreach ($types as $jobtype) : ?>
												<?php echo esc_html($jobtype->name); ?>
									<?php endforeach;
										endif;
									}
									do_action('job_listing_meta_end');
									?>

								</div>
								<div class="col-md-4 border-right text-company">
									<?php the_company_name('<strong>', '</strong> '); ?>
								</div>
								<div class="col-md-4 text-company text-company">
									<?php the_job_location(true); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 description">
						<?php echo wp_trim_words(get_the_content(), 20, ''); ?>
						<a href="<?php echo get_permalink() ?>">[...]</a>
					</div>
					<div class="col-md-12">
						<?php if ($job_featured) { ?>
							<div class="featured-label"><?php esc_html_e('Featured', 'jobscout'); ?></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>