$("input[type='number']").inputSpinner();

function formSubmit(){
        //let lcode = "276";
		
		let types_=$('#otasync_w_type').val();
        let lcode=$('#otasync_w_user_id').val();
		let lang=$('#otasync_w_lang').val();
		if(lang==""){ lang="en"; }
		//alert(lcode);
        let dfrom = $('#from_date').val();
        let dto = $('#to_date').val();
        let adults = $('#adults').val();
        let childrens = $('#childrens').val();
		//alert(types_);
		var query="";
        if(types_=='single'){
			query = "https://app.otasync.me/engine/"+lang+"/index.php?id_properties="+lcode+"&dfrom="+dfrom+"&dto="+dto+"&adults="+adults+"&chlidren="+childrens;
		}else{
			let destination_s_ = $('#destination_s_').val();
			query = "https://app.otasync.me/multiproperty/"+lang+"/index.php?id_multiproperties="+lcode+"&dfrom="+dfrom+"&dto="+dto+"&adults="+adults+"&chlidren="+childrens+"&search="+destination_s_;
		}
		
        window.location.replace(query);
		
    return false;
}