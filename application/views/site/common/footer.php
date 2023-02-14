<footer>
	<div class="foot_base">
		<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 nopadd">
				<div class="col-md-6 col-sm-6 col-xs-12 foot_logo_base">
					<img src="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo1');?>">
					<div class="copy_right "><p><?php echo $this->config->item('copy_right');?></p></div>
					<span class="foot_line">&nbsp;</span>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-12 nopadd">
					<div class="col-md-6 col-sm-6 col-xs-12 footer_ul">
						<ul class="list-unstyled">
							<?php foreach($cms_row1->result() as $cm1){?>
							<li><a href="<?php echo base_url().'page/'.$cm1->url;?>"><?php echo get_common_details(CMS_DETAILS,'title',$cm1->id,$lang_key);?></a></li>
							<?php } ?>
							<li><a href="<?php echo base_url().'contact_us';?>"><?php echo get_lang_site_key($lang_key,"header_footer_lang","contact_us"); ?></a></li>
						</ul>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 footer_ul socio_ul">
						<h6><?php echo get_lang_site_key($lang_key,"header_footer_lang","download_app"); ?></h6>
						<ul class="list-inline app_li">
							<li><a target="_blank" href="https://itunes.apple.com/us/app/service-rabbit/id1320568892?mt=8"><i class="fa fa-apple fa-3x" aria-hidden="true"></i></a></li>
							<li><a target="_blank" href="https://play.google.com/store/apps/details?id=servicerabbit.seeker&hl=en"><i class="fa fa-android fa-3x" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
				
			</div>
		</div>
	</div>
</footer>
<script>
	var swtOk="<?php echo get_lang_site_key($lang_key,"header_footer_lang","alert_text_ok")?>";
</script>
<!--<script src="<?php echo base_url();?>js/site/jquery-3.1.1.min.js"></script>-->
<script src="<?php echo base_url();?>js/site/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>js/site/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/notification.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/sweetalert.min.js"></script>
<script>
var img_width =	$('.img_base img').width();
$('.black_layer').width(img_width);
var img_pos= $('.img_base img').offset();

	
	var window_width= $(window).width()
$(document).ready(function(){
    
        if(window_width < 768 )
		{
				$('.black_layer').offset({left:img_pos.left});
		}
   
});


<?php if($logincheck!=""){?>
		get_unread_inbox_icon();
setInterval(function(){ 	
		
		get_unread_inbox_icon();
		
		}, 8000);	
function get_unread_inbox_icon(){

			$.post('<?php echo base_url();?>site/user/unreadmessage_count',{"<?php echo $key;?>":"<?php echo $value;?>"},function success(data){ 
				if($.parseJSON(data).count>0){
				$('.notify_msg').css('display','inline-block'); 
				}
				else
				{
					$('.notify_msg').css('display','none'); 
				}					
			      
					
				
			})
		
		}		
<?php } ?>		
</script>

<!--notification -->
</body>

</html>