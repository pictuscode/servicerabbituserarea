<?php $this->load->view('site/common/header');	?>
<link rel="stylesheet" href="<?php echo base_url() ?>css/site/owl.carousel.min.css">
<style>
	.orange {
		color: orange !important;
	}
</style>

<head>

	<style>
		
	</style>

</head>

<body>


</body>

<section>
	<div class="content_base banner_content_base text-center">
		<div class="banner_home_img">
			<img src="<?php echo base_url() . 'images/site/banner_home.png'; ?>">
		</div>
		<div class="container">
			<div class="head_title col-md-12 col-sm-12 col-xs-12 nopadd">
				<h1><?php echo  get_lang_site_key($lang_key,"home_lang","make_your_life"); ?><br><?php echo  get_lang_site_key($lang_key,"home_lang","simple_and_easy"); ?> </h1>
				<span class="under_head">&nbsp;</span>
				<h2><?php echo  get_lang_site_key($lang_key,"home_lang","heading"); ?><br> <?php echo  get_lang_site_key($lang_key,"home_lang","heading1"); ?></h2>
			</div>
			<div class="search_input col-md-6 col-sm-6 col-xs-12 nopadd text-left">
				<input type="text" class="form-control searchbar_inputbox" placeholder="<?php echo get_lang_site_key($lang_key,"home_lang","placeholder_search"); ?>">
				<ul class="search_dropdown_box search_box_ul" id="myUL">
					<?php foreach ($task_category->result() as $task_cat) { ?>
						<li class="search_li_box" data-val="<?php echo get_common_details(CATEGORY_DETAILS, 'task_name', $task_cat->id, $lang_key); ?>" data-url="<?php echo base_url() . 'add_task/' . $task_cat->id; ?>">
							<img class="searchbar_img" src="<?php if ($task_cat->image == '') echo base_url() . 'images/site/category/contimg1.png';
															else echo base_url() . 'images/site/category/' . $task_cat->image; ?>">
							<?php echo get_common_details(CATEGORY_DETAILS, 'task_name', $task_cat->id, $lang_key); ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="content_base">
		<div class="container">
			<div class="clean_base col-md-12 col-sm-12 col-xs-12 nopadd">
				<?php $i = 1;
				foreach ($get_service_featured->result() as $task_cat) { ?>
					<div class="<?php if ($i % 2 != 0) { ?>clean_lft col-md-8 col-sm-8 col-xs-12<?php } else { ?>clean_rgt col-md-4 col-sm-4 col-xs-12<?php } ?>">
						<?php if ($i % 2 != 0) {
							$tempurl = base_url() . 'images/site/category/size_big/' . $task_cat->image;
						} else {
							$tempurl = base_url() . 'images/site/category/size_medium/' . $task_cat->image;
						}

						?>
						<img src="<?php if ($task_cat->image == '') echo base_url() . 'images/site/category/contimg1.png';
									else echo $tempurl; ?>">
						<div class="clean_cont_base">
							<div class="clean_cont_inner">
								<h4><?php echo get_common_details(CATEGORY_DETAILS, 'task_name', $task_cat->id, $lang_key); ?></h4>
								<p><?php echo mb_substr(get_common_details(CATEGORY_DETAILS, 'task_description', $task_cat->id, $lang_key), 0, 30); ?></p>
								<a href="<?php echo base_url() . 'add_task/' . $task_cat->id; ?>" class="theme_btn"> <?php echo  get_lang_site_key($lang_key,"home_lang","book"); ?></a>
							</div>
						</div>
					</div>
				<?php $i++;
				} ?>

			</div>
			<div class="img_section col-md-12 col-sm-12 col-xs-12 nopadd">
				<h3><?php echo  get_lang_site_key($lang_key,"home_lang","heading2"); ?></h3>
				<?php foreach ($task_category1->result() as $task_cat) { ?>
					<div class="col-md-4 col-sm-4 col-xs-12 img_base">
						<div class="img_inner">
							<img src="<?php if ($task_cat->image == '') echo base_url() . 'images/site/category/contimg1.png';
										else echo base_url() . 'images/site/category/' . $task_cat->image; ?>">
							<div class="img_content">
								<p><?php echo get_common_details(CATEGORY_DETAILS, 'task_name', $task_cat->id, $lang_key); ?></p>
								<a class="theme_btn" href="<?php echo base_url() . 'add_task/' . $task_cat->id; ?>">
									<?php echo  get_lang_site_key($lang_key,"home_lang","book"); ?>
								</a>
							</div>

						</div>
					</div>
				<?php } ?>

			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 how_works text-center">
				<h6><?php echo  get_lang_site_key($lang_key,"home_lang","how_it_works"); ?></h6>

				<div class="how_icons">
					<ul class="list-inline">
						<li>
							<div class="how_img"> <img src="<?php echo base_url(); ?>images/site/how_img1.png"></div>
							<p><?php echo  get_lang_site_key($lang_key,"home_lang","search_your"); ?> <br> <?php echo  get_lang_site_key($lang_key,"home_lang","need"); ?></p>
						</li>
						<li>
							<div class="how_img"><img src="<?php echo base_url(); ?>images/site/how_img2.png"></div>
							<p><?php echo  get_lang_site_key($lang_key,"home_lang","compare"); ?> <br><?php echo  get_lang_site_key($lang_key,"home_lang","quotes"); ?></p>
						</li>
						<li>
							<div class="how_img"><img src="<?php echo base_url(); ?>images/site/how_img3.png"></div>
							<p><?php echo  get_lang_site_key($lang_key,"home_lang","hire_confirm"); ?> <br> <?php echo  get_lang_site_key($lang_key,"home_lang","servicer"); ?> </p>
						</li>
					</ul>
				</div>
			</div>
		<?php $this->load->view('site/landing/features_tasker'); ?>
		<?php $this->load->view('site/landing/features_reviews'); ?>
			
		</div>
	</div>
	</div>
	</div>
	<div class="clearfix"></div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
	$('.owl-carousel').owlCarousel({
		/*  loop: true,   */
		margin: 10,
		dots: false,
		autoplay: true,
		smartSpeed: 3000,
		 /* autoplayTimeout: 7000,  */ 
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	})
	$(document).ready(function() {
		$('.searchbar_inputbox').click(function(e) {
			var e = window.event || e;
			var o = e.srcElement || e.target;
			$('.search_dropdown_box').show(500);
			e.stopPropagation();
		});

		var a = 0;
		var url = '';
		$('.search_li_box').click(function() {
			a = 1;
			url = $(this).attr('data-url');
			window.location.href = url;
		});
		$('.searchbar_inputbox').keyup(function() {
			value = $(this).val();

			var input, filter, ul, li, a, i;
			filter = value.toUpperCase();
			ul = document.getElementById("myUL");
			li = ul.getElementsByTagName('li');

			for (i = 0; i < li.length; i++) {
				a = li[i];
				if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
					li[i].style.display = "";
				} else {
					li[i].style.display = "none";
				}
			}
		})

	});
</script>
<script>
	$(document).click(function() {
		$('.search_dropdown_box').hide(500);
	});
</script>
<?php $this->load->view('site/common/footer'); ?>