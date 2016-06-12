<script id="template_parent_comment" type="nexus/template">
	<div style="overflow:hidden;margin-bottom: 10px;margin-top: 20px;">
		<img src="--avatar--" alt="" class="pull-left" style=" width: 50px; width: 50px; overflow: hidden;  margin-right: 10px;">
		<p class="commenterName"> --name-- <span> --created_at-- </span></p>
		<p class="commentContent"> --content-- </p>
		<a href="#" class="reply_comment" data-id="--id--" style="font-size: 12px; font-weight: 700;" >reply</a>
        <div id="comment_child--id--"></div>              
		<div class="clearfix"></div>
		<div id="comment_textarea--id--"></div> 
	</div>
</script>

<script id="template_child_comment" type="nexus/template">
	<div class="childCommentContainer">
		<div style="height: 50px; width: 50px; overflow: hidden; float: left; margin-right: 10px;">
			<img src="--avatar--" alt="" class="pull-left">
		</div>
		<p class="commenterName">--name-- <span> --created_at-- </span> </p>
		<p class="commentContent">--content--</p>
		<a href="#" class="reply_comment" data-id="--parent_id--" style="font-size: 12px; font-weight: 700;" >reply</a> 
	</div>
</script>