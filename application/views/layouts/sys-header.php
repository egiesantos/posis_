
<header class="row j-header">
	<div class="header-logo col-xs-12">
		<a href=""><div id="logo" class="col-md-5 col-sm-5 col-xs-5"></div></a>
		<div id="title" class="col-md-7 col-sm-7 col-xs-7">
			<span id="first-text">MUNICIPALITY OF</span>
			<span>BALIWAG</span>
			<span>Province of Bulacan</span>
		</div>
	</div>
	<div class="header-text col-xs-12">
		<div class="col-md-12">
			<div id="divider"></div>
			<span id="sys-title"><?php echo $this->config->item('app_name'); ?></span>
		</div>
	</div>
</header>

<script type="text/javascript">
	
	$(document).ready(function(){
		setTimeout(function(){
        	$('#loader').fadeOut(200, function(){
        		$('body').css({'overflow-y' : 'auto'});
        	});

		}, 400);


    });
</script>