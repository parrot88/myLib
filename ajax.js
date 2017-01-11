//jquery, ajaxに関するメモ

//send ajax data
function send(){
	$.ajax({
		type: "POST",
		url: "./test.php",
		data: {'dat1 : "data1", 'data2': "data2", 'data3': "data3"},
		success:function(res){
			alert(res);
		},
		error:function(){
			alert("connection error");
		}
	});
}


function receive_dat(res){
	console.log(res);
	var dat = $.parseJSON(res);
}

//disp off
function disp_off(){
	$("#test").hide();
}

//disp on
function disp_on(){
	$("#test").show();
}


