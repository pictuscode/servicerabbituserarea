<div class="col-md-12 col-sm-12 col-xs-12  text-center">

<?php if ($get_tasker_featured->num_rows() > 0) { ?>
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 feature-member-base text-center">

        <div class="common-header how_works text-center">
            <h6><?php echo get_lang_site_key($lang_key,"home_lang","feature_tasker") ?></h6>
        </div>

        <div class="blog_content">
            <div class="owl-carousel owl-theme">
                <?php foreach ($get_tasker_featured->result() as $task_fea) { ?>

                    <div class="blog_item">
                        <div class="">
                            <div class='row'>
                                <ul class="list-inline pt-5">
                                    <li class="list-inline-item pull-left">
                                        <?php if ($task_fea->photo == '') { ?>
                                            <img src="<?php echo base_url() ?>images/site/profile/dummy.png" class="rabbit-img-position ">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>images/site/profile/<?php echo $task_fea->photo; ?>" class="rabbit-img-position ">
                                        <?php } ?>
                                    </li>
                                    <li class="list-inline-item text-left boxItemLeft">
                                        <h5 class="font-bold"><?php echo $task_fea->first_name ?><span class='d-inline ml-5'><img src="<?php echo base_url() ?>images/site/quality.svg" class="rabbit-icon-size"></span> </h5>
                                        <p class="margin-0 grey-text"><span class="review_compare">
                                                <i class="fa fa-star<?php if ($task_fea->rate < 1) {
                                                                        echo '-o';
                                                                    } ?> orange" aria-hidden="true"></i>
                                                <i class="fa fa-star<?php if ($task_fea->rate < 2) {
                                                                        echo '-o';
                                                                    } ?> orange" aria-hidden="true"></i>
                                                <i class="fa fa-star<?php if ($task_fea->rate < 3) {
                                                                        echo '-o';
                                                                    } ?> orange" aria-hidden="true"></i>
                                                <i class="fa fa-star<?php if ($task_fea->rate < 4) {
                                                                        echo '-o';
                                                                    } ?> orange" aria-hidden="true"></i>
                                                <i class="fa fa-star<?php if ($task_fea->rate < 5) {
                                                                        echo '-o';
                                                                    } ?> orange" aria-hidden="true"></i>
                                            </span>

                                        </p>
                                        <p class="grey-text"> <span><img src="<?php echo base_url() ?>images/site/check.png" class="rabbit-icon-size"><?php echo $task_fea->task_complete ?> <?php echo get_lang_site_key($lang_key,"home_lang","complete_task") ?></span></p>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row feat-blog">
                                <p class="grey-text"> <?php echo get_lang_site_key($lang_key,"home_lang","feature_skill") ?></p>
                                <?php echo get_featured_tasker($task_fea->tasker_id, $lang_key); ?>
                            </div>
                            <hr>
                            <div class="row tasker-description">
                                <p class="font-bold"><?php echo get_lang_site_key($lang_key,"home_lang","right_person") ?>:</p>
                                <p class="tasker_description_info"> <?php echo get_tasker_des($task_fea->tasker_id); ?></p>
                            </div>
                        </div>


                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
<?php } ?>

</div>