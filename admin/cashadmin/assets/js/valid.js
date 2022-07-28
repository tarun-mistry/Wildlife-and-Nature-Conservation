$("form.ajax").submit(function( event ) {
event.preventDefault();
if(validate_form(this))
{
loading(this);
var array = new FormData(this);
             $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                data:array,
                contentType: false,
                processData: false,
                success: function (data) {
           //$("body").append(data.action);
if(data.status=="Error")
{
message("danger",data.message);
}
if(data.status=="Success")
{
message("success",data.message);
}
$("body").append('<script>'+data.action+'</script>');
},
});
}
});

function loading($target)
{
var position=$($target).offset();
//$($target).hide();
$($target).after('<div class="alert alert-info" id="loading" style="position:absolute;top:50%;left:50%;margin-left:-25%;z-index:+10000"> Loading...... </div>');
$("#loading").fadeOut(8000);
}

function message($type,$text)
{
$("#message").remove();
$("aside.right-side").prepend('<div id="message" class="col-sm-12 alert-'+$type+'" style="z-index:+99999">'+$text+' <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>');
}

$("form:not(ajax)").submit(function(event){
if(validate_form(this))
{
loading(this);
return true;
}
return false;
//$(this).has("button").hide();
});

function choosetheme($theme)
{
$("iframe").attr("src",BASEURL+"themes/"+$theme);
}

$('iframe').load(function() {
this.style.height =this.contentWindow.document.body.offsetHeight + 'px';
});

function validate_form(thisform)
{
var state=true;
$(thisform).find("input,select,textarea").each(function(){
var $this=$(this)
$this.parent('div').removeClass("has-error");
$this.next('span').remove();
var inputclass=$this.attr("valid");
var inputvalue=$this.val();
var inputname=$this.attr("name");
var errormsg=$this.attr("placeholder");
function error(MSG){
$this.after('<span class="text-danger">Sorry! '+MSG+'</span>');
$this.parent('div').addClass("has-error");
}	

switch(inputclass)
{
												//Validation for number and text
case "name":
if(inputvalue.length==0)
{
error(errormsg+" Should Not Be Null");
$(this).focus();
return state=false;	
}
else
{
if($(this).attr("max")<$(this).val().length)
{
error("Character Length Should Not More Then "+ $(this).attr("max"));
$(this).focus();
return state=false;
}
if($(this).attr("min")>$(this).val().length)
{
error("Character Length Should Less More Then "+ $(this).attr("min"));
$(this).focus();
return state=false;
}
}
break;
																																																									//Validation for email
case "email":
var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]/;
if(!pattern.test(inputvalue))
{
error(errormsg);
$(this).focus();
return state=false;
}
break;
																																																									//Validation for password
case "password":
if(inputvalue.length<6)
{
$(this).focus();
error(errormsg+" minimum 8 Characters" );
return state=false;	
}
var pwd=$(thisform).find("[type=password]");
if($(pwd).length>1)
{
var lpwd=$(pwd).length-1;
var pwd1=$(thisform).find("[type=password]").eq(lpwd-1).val();
var pwd2=$(thisform).find("[type=password]").eq(lpwd).val();
if(pwd1!==pwd2)
{
$(this).focus();
error("Confirmation Password Does Not Match");
return state=false;	
}
}
break;

//Validation For Contact Number 
case "contact":
 var con = /^\d{10}$/;
 if(!inputvalue.match(con))
 {
	 error("Please Enter valid 10 digit");
	 $(this).focus();
	 return state = false;
 }
 break;
	
//Validation For Letter 
case "letter":
var leter = /^[A-Za-z]+$/;	
	if(!inputvalue.match(leter))
	{
	error("Name must be alphabetic");
		$(this).focus();
		return state = false;
	}
	break;

//Validation For Letter And space
case "string":
var strg = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
	if(!inputvalue.match(strg))
	{
	error("Only Alphabetic and space allow");	
	$(this).focus();
	return state = false;
	}
	break;
	
//Validation for number
case "number":
if(!RegExp("^[0-9]").test(inputvalue) && $(this).val()!="")
{
error("Please fill Only Number in "+ inputname);
$(this).focus();
$(this).val("");
return state=false;
}
else
{
$val=parseFloat($(this).val());
$max=parseFloat($(this).attr("max"));
$min=parseFloat($(this).attr("min"));
if($val > $max)
{
error("Value Should Not Greater Then "+ $(this).attr("max"));
$(this).focus();
return state=false;
}
if($val < $min)
{
error("Value Can Not Be Less Then "+ $(this).attr("min"));
$(this).focus();
return state=false;
}
}
break;

case "domain":
 if(!/^(http(s):\/\/)?(www\.)?[a-zA-Z\-]{3,}(\.(com|net|org|in|co.in))?$/.test(inputvalue))
  {
error("Please fill domain name in specific format in "+ inputname);
$(this).focus();
return state=false;
}
break;
 
 case "url":
 if(inputvalue!=""){
 var myRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
if (!myRegExp.test(inputvalue)){ 
 error("Incorrect Url");
 $(this).focus();
 return state = false;
 }
 }
 break;
 
 // Validation For IP Address
case "host_ip":
 var pattern = /\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;
	if(!pattern.test(inputvalue))
	{
		error("Incorrect host or ip address");
		$(this).focus();
		return state = false;
	}
 break;
 
 //Validation For Port 
 case "port_ip":
 if(!RegExp("^[0-9]").test(inputvalue))
 {
	 error("Incorrect Port Number");
	 $(this).focus();
	 return state = false;
 }
break;

//validation for numeric value
 case "digitt":
 if(!RegExp("^[0-9]").test(inputvalue))
 {
	 error("Only Digit Allow");
	 $(this).focus();
	 return state = false;
 }
break;


case "date":
if(inputvalue.length<1)
{
error("Please fill Date");
$(this).focus();
return state=false;
}
break;	
																																																							//Validation for number
case "select":
if(inputvalue=="")
{
$(this).focus();
error(errormsg);
return state=false;	
}
break;
}
});
return state;
}


$(function(){
var len=160;
$("#msgtype").change(function(){
len=160;
$("#unimsg").addClass("hide");
if($(this).val()=="uni")
{
len=70;
$("#unimsg").removeClass("hide");
}
});

$(".message").on("keyup",function(e)
{
e.preventDefault();
var msgtype=$("#msgtype").val();

var msg=$(this);
var msg_length=msg.val().length;
var credit=Math.ceil(msg_length/len);
if(credit==0)
{
credit=1;
}
$(".msg_char").text(msg_length);
$(".msg_credits").text(credit);
})
$("input:radio#http").click(function(){
$(".http").removeClass("hide");
$(".http").show();
$(".smpp").hide();
});
$("input:radio#smpp").click(function(){
$(".smpp").removeClass("hide");
$(".http").hide();
$(".smpp").show();
});
})

$(".datepicker_button").click(function(){
var date=$("#datepicker").val();
var time=$("#timepicker").val();
$("#schedule_time").remove();
$("#schedule_action").remove();
$("#sendsmsform").append('<input type="hidden" value="'+date+' '+time+'" name="schedule" id="schedule_time">');
$("#sendsmsform").append('<input type="hidden" value="schedule" name="action" id="schedule_action">');
$("#sendsmsform").submit();
})

$("#numbers").focus(function()
{
$(".fileupload").removeClass("hide");
}
)

$("#numbers").blur(function()
{
//$(".fileupload").addClass("hide");
}
)

function makeme(target)
{
$.post(BASEURL+"member/changeaccess",{"type":target},function(data){
$("body").append('<script>'+data.action+'</script>');
})
}

$("#dammy_rout").change(function(){
var index=$(this).prop("selectedIndex");
var balance=$(this).find("option").eq(index).attr("data-amount");
if(!balance)
{
balance=0;
}
$("#balance").text(balance);
});