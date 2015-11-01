function pressed(){

    var a = document.getElementById('audio');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose audio file";
    }
    else
    {
    	 var theSplit = a.value.split('\\');
         fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};


function imgpressed(){

    var a = document.getElementById('image');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose image file";
    }
    else
    {
    	var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};

$(document).ready(function(){
    $("#reset").on('click', function(event){
    	event.preventDefault();
    	//$(‘input[type=”file”]’). wrap(document.createElement('form')).parent().trigger('reset').children().unwrap‌​();
    	reset_form_element( $('#audio') );
    	$("fileLabel").html("Choose audio file");
    	//$("#xxx")[0].reset();
        
    });
});

function reset_form_element (e) {
    //e.wrap("<form></form>").closest("form").get(0).reset();
	e.wrap('<form>').parent('form').trigger('reset');
	e.unwrap();
    fileLabel.innerHTML = "Choose audio file";
};
