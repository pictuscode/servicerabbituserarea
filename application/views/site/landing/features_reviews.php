<div class="col-md-12 featured-reviews-base">
			<div class="box box-primary">
				<?php if ($get_review->num_rows() > 0) { ?>
					<div class="box-body">
						<div class="common-header text-center headingblog">
							<h2><?php  echo get_lang_site_key($lang_key,"home_lang","review_title") ?></h2>
							<h5><?php  echo get_lang_site_key($lang_key,"home_lang","review_description") ?>.</h5>
						</div>

						<?php foreach ($get_review->result() as $task_review) { ?>
							<div class=" col-md-6">

							<div class="featured-box-item ">
								<div class="featured-imag d-inline-block">
								<?php if ($task_review->photo == '') { ?>
											<img src="<?php echo base_url() ?>images/site/profile/dummy.png" class="review-img-position ">
										<?php } else { ?>
											<img src="<?php echo base_url() ?>images/site/profile/<?php echo $task_review->photo; ?>" class="review-img-position ">
										<?php } ?>
								</div>
								<div class="featured-textblog">
								<ul class="list-inline m-0">									
									<li class="">
										<h5 class="font-bold"><?php echo $task_review->first_name ?> <span class="review_compare">
										<i class="fa fa-star orange" aria-hidden="true"></i> <strong><?php echo round($task_review->rate,2);?></strong>
											</span></h5>
										<div>
										<p><?php echo $task_review->comments ?></p>
										<h5 class="c-pink"><?php echo get_common_details(CATEGORY_DETAILS, 'task_name', $task_review->task_category_id, $lang_key); ?></h5>
										</div>
									</li>
									<li class="">
										
									</li>
									<li class="">
										
									</li>
								</ul>
								</div>
							</div>	
							

							</div>
						<?php } ?>

					</div>
				<?php } ?>
			</div>
			</div>