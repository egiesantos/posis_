<div id="loader" style="display:block;">
	<!-- <div style="width:100%; height:100%; background-color:black; opacity:0.2; position:fixed; left:0; top:0; z-index:999;"></div>

	<div style=" z-index:9999; float:right; width:25%; right:0; bottom:0; position:fixed;">
		<p>I need your patience...</p>
		<div class="progress progress-striped active" style="width:100%;">
			<div class="progress-bar progress-bar-danger" style="width:100%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" id="progress"></div>
		</div>
	</div> -->

        <!-- <img src="<?php echo base_url().'assets/images/preloader-round.gif'?>" alt="Loading" /><br/> -->
        <img src="<?php echo base_url().'assets/images/bal_loader.gif'?>" alt="Loading" /><br/>
        Please wait . . .

</div>

<!--for alertbox-->
<script type="text/javascript">
	
	function infoAlert(message) {
	    $('#alerts').append(
	        '<div id="infoAlert" class="alert alert-info alert-dismissable">'+
			  '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"> x </button>'+
			  '<span><p>'+message+'</p></span>'+
			'</div>');
	    setTimeout(function(){
		    $(".alert-info").fadeOut("slow");
		},2000)
	}

	function warnAlert(message) {
	    $('#alerts').append(
	        '<div id="warnAlert" class="alert alert-warning alert-dismissable">'+
			  '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"> x </button>'+
			  '<span><p>'+message+'</p></span>'+
			'</div>');
	    setTimeout(function(){
		    $(".alert-warning").fadeOut("slow");
		},2000)
	}

	function dangerAlert(message) {
	    $('#alerts').append(
	        '<div id="dangerAlert" class="alert alert-danger alert-dismissable">'+
			  '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"> x </button>'+
			  '<span><p>'+message+'</p></span>'+
			'</div>');
	    setTimeout(function(){
		    $(".alert-danger").fadeOut("slow");
		},2000)
	}



	//for inside note that inside the <p id="note" name="note"> tags </p>
	//if you will use this-- insert mu toh :D [ <p id="note" name="note"> tags </p> ]
	function infoNote(message) {
	    $('#note').append(
	        '<div id="infoAlert" class="alert alert-info alert-dismissable">'+
			  '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"> x </button>'+
			  '<span><p>'+message+'</p></span>'+
			'</div>');
	    setTimeout(function(){
		    $(".alert-info").slideUp("fast");
		},2000)
	}

	function warnNote(message) {
	    $('#note').append(
	        '<div id="warnAlert" class="alert alert-warning alert-dismissable">'+
			  '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"> x </button>'+
			  '<span><p>'+message+'</p></span>'+
			'</div>');
	    setTimeout(function(){
		    $(".alert-warning").slideUp("fast");
		},2000)
	}

	function dangerNote(message) {
	    $('#note').append(
	        '<div id="dangerAlert" class="alert alert-danger alert-dismissable">'+
			  '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"> x </button>'+
			  '<span><p>'+message+'</p></span>'+
			'</div>');
	    setTimeout(function(){
		    $(".alert-danger").slideUp("fast");
		},2000)
	}


	//for Displaying conflicts [note: This is for scheduling]
	function displayConflict(message) {
	    $('#note').append(
	        '<div id="conflictAlert" class="alert alert-danger alert-dismissable">'+
			  '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"> x </button>'+
			  '<span><p>'+message+'</p></span>'+
			'</div>');
	}

	function exportToExcel(filename) {
	    	//var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
	        //creating a temporary HTML link element (they support setting file names)
	        var a = document.createElement('a');
	        //getting data from our div that contains the HTML table
	        var data_type = 'data:application/vnd.ms-excel';
	        var table_div = document.getElementById('dvData');
	        var table_html = table_div.outerHTML.replace(/ /g, '%20');
	        a.href = data_type + ', ' + table_html;
	        //setting the file name
	        a.download = filename + '.xls';
	        
	        
	        //triggering the function
	        a.click();
	        //just in case, prevent default behaviour
	        e.preventDefault();
	}


	//for CUSTOMIZED AJAX DATATABLE
	function dataRequest(container, script) {
	
	 	var xmlhttp = new XMLHttpRequest();
		
		xmlhttp.onreadystatechange = function(){
				$('#loader').show();
				if(xmlhttp.readyState==4&&xmlhttp.status==200){
						document.getElementById(container).innerHTML = xmlhttp.responseText;
						$('#loader').hide();
					}
			}
		xmlhttp.open('GET',script,true);
		xmlhttp.send();
	}
	//for CUSTOMIZED AJAX DATATABLE
	

</script>
<div id="alerts" style="position:fixed; right:0; bottom:0; width:50%;" id="alerts"></div>


