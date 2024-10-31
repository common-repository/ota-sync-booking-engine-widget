<?php
	wp_enqueue_script( 'myplugin-typekit', plugin_dir_url( __FILE__ ).'jbic.js', array(), '3.0' );
	wp_add_inline_script( 'myplugin-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
	wp_enqueue_script( 'myplugin1-typekit', plugin_dir_url( __FILE__ ).'popper.js', array(), '1.0' );
	wp_add_inline_script( 'myplugin1-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
	//wp_enqueue_script( 'myplugin2-typekit', plugin_dir_url( __FILE__ ).'datepicker.js', array(), '1.0' );
	wp_add_inline_script( 'myplugin2-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );

	$data='var dd = "";
	function change_date(){
		dd = document.getElementById("from_date").value;
		if(dd==""){}else{
		var future = new Date(dd);
		//alert(dd);
		future.setDate(future.getDate() + 3);
		var str = future.toLocaleDateString("en-US");
		//future=future.replace(/[^a-zA-Z0-9]/g,\'-\');
		var date_array=str.split("/");
		if(date_array[0]<10){
			date_array[0]="0"+date_array[0];
		}
		if(date_array[1]<10){
			date_array[1]="0"+date_array[1];
		}
		var new_date=date_array[2]+"-"+date_array[0]+"-"+date_array[1];
		//alert(new_date);
		//document.getElementById("to_date").min=dd;
		document.getElementById("to_date").value=new_date;
		document.getElementById("to_date").focus();
		
	   
	   
		}
	}

	function validate_date(){
		//alert("OK");
		var d1 = new Date(document.getElementById("to_date").value);
		var d2 = new Date(document.getElementById("from_date").value);
		//alert(d1);
		if(d2>d1){
			document.getElementById("to_date").value="";
			alert("Check out date must be greater than or equal to check in date.");
		}
	}
	var start = new Date();
	// set end date to max one year period:


	// $("#startDate, #endDate").datepicker("setDate", start );
	$("#from_date").datepicker({
		minDate : start,
		format: "dd-mm-yyyy",
		todayHighlight: true,
		autoclose: true,
	   
	});
	$("#to_date").datepicker({
		minDate : start,
		format: "dd-mm-yyyy",
		todayHighlight: true,
		autoclose: true,
	   
	});
	';
	//$data="";
	wp_add_inline_script( 'inline-custom-ota-script', $data, 'before' );
	//wp_enqueue_script( 'myplugin-typekit_ci', plugin_dir_url( __FILE__ ).'datepicker_002.js', array(), '3.0' );
	wp_enqueue_script( 'myplugin-typekit_cis', plugin_dir_url( __FILE__ ).'bootstrap-input-spinner.js', array(), '3.0' );
	wp_enqueue_script( 'myplugin-typekit_xie', plugin_dir_url( __FILE__ ).'script.js', array(), '3.0' );