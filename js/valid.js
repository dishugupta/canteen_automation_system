//registration form validation
function validation()
{
	flag	=	1;
	name	=	$('#name').val();
	if($('#name').val().trim()=="")
	{
		$('#name_error').html("Enter Your Name");
	flag=0;
	}
	else if(name.match(/^[A-Za-z ]*$/)	==	null)
	{
		$('#name_error').html("Invalid user Name");
		flag=0;
	}
	else
	{
		$('#name_error').html("");
	}
	if($('#username').val().trim()=="")
	{
		$('#username_error').html("Enter user Name");
		flag=0;
	}
	else
	{
		$('#username_error').html("");
	}
	if($('#address').val().trim()=="")
	{
		$('#address_error').html("Enter Address");
		flag=0;
	}
	else
	{
		$('#address_error').html("");
	}
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	email=$('#email').val();
	if(email.trim()=="")
	{
		$('#email_error').html("Enter Your Email");
		flag=0;
	}
	else if(!filter.test(email)) 
	{
		$('#email_error').html("Enter Valid Email");
		flag=0;
	}
	else
	{
		$('#email_error').html("");
	}
	mbl=$('#mobile').val().trim();
	if(mbl=="")
	{
		$('#mobile_error').html("Enter contect no.");
		flag=0;
	}
	else if(isNaN(mbl))
	{
		$('#mobile_error').html("Only no.");
		flag=0;
	}
	else if(mbl.length!=10)
	{
		$('#mobile_error').html("10 digit required");
		flag=0;
	}
	else
	{
		$('#mobile_error').html("");
	}
	pass=$('#password').val().trim();
	if(pass=="")
	{
		$('#password_error').html("Enter password");
		flag=0;
	}
	else if(pass.length<8)
	{
		$('#password_error').html("Minimum 8 character required");
		flag=0;
	}
	else
	{
		$('#password_error').html("");
	}
	img=$('#image').val();
	dotpos=img.lastIndexOf('.');
	ext=img.substring(dotpos,img.length);
	if(img=="")
	{
		$('#image_error').html("Please Select An Image");
		flag=0;
	}
	else if(ext!=".jpg" && ext!=".jpeg" && ext!=".png" && ext!=".gif" && ext!=".bmp")
	{
		$('#image_error').html("Only jpg,jpeg,bmp,gif,png allowed");
		flag=0;
	}
	else
	{
		$('#image_error').html("");
	}
	if(flag==0)
	{
		return false;
	}
}

//contact us form validation

function contact_validation()
{
	flag=1;
	name	=	$('#username').val();
	if($('#username').val().trim()=="")
	{
		$('#username_error').html("Enter Name");
		flag=0;
	}
	else if(name.match(/^[A-Za-z ]*$/)	==	null)
	{
		$('#username_error').html("Invalid user Name");
		flag=0;
	}
	else
	{
		$('#username_error').html("");
	}
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	email=$('#email').val();
	if(email.trim()=="")
	{
		$('#email_error').html("Enter Your Email");
		flag=0;
	}
	else if(!filter.test(email)) 
	{
		$('#email_error').html("Enter Valid Email");
		flag=0;
	}
	else
	{
		$('#email_error').html("");
	}
	mbl=$('#mobile').val().trim();
	if(mbl=="")
	{
		$('#mobile_error').html("Enter contact no.");
		flag=0;
	}
	else if(isNaN(mbl))
	{
		$('#mobile_error').html("Only no.");
		flag=0;
	}
	else if(mbl.length!=10)
	{
		$('#mobile_error').html("10 digit required");
		flag=0;
	}
	else
	{
		$('#mobile_error').html("");
	}
	
	if($('#address').val().trim()=="")
	{
		$('#address_error').html("Enter user Address");
		flag=0;
	}
	else
	{
		$('#address_error').html("");
	}
	
	if($('#message').val().trim()=="")
	{
		$('#message_error').html("Enter your message");
		flag=0;
	}
	else
	{
		$('#message_error').html("");
	}
	
	if(flag==0)
	{
		return false;
	}
}


//edit profile validation
function editvalidation()
{
	flag=1;
	if($('#name').val().trim()=="")
	{
		$('#name_error').html("Enter Your Name");
	flag=0;
	}
	else
	{
		$('#name_error').html("");
	}
	if($('#username').val().trim()=="")
	{
		$('#username_error').html("Enter user Name");
		flag=0;
	}
	else
	{
		$('#username_error').html("");
	}
	if($('#address').val().trim()=="")
	{
		$('#address_error').html("Enter Address");
		flag=0;
	}
	else
	{
		$('#address_error').html("");
	}
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	email=$('#email').val();
	if(email.trim()=="")
	{
		$('#email_error').html("Enter Your Email");
		flag=0;
	}
	else if(!filter.test(email)) 
	{
		$('#email_error').html("Enter Valid Email");
		flag=0;
	}
	else
	{
		$('#email_error').html("");
	}
	mbl=$('#mobile').val().trim();
	if(mbl=="")
	{
		$('#mobile_error').html("Enter contect no.");
		flag=0;
	}
	else if(isNaN(mbl))
	{
		$('#mobile_error').html("Only no.");
		flag=0;
	}
	else if(mbl.length!=10)
	{
		$('#mobile_error').html("10 digit required");
		flag=0;
	}
	else
	{
		$('#mobile_error').html("");
	}
	
	img=$('#image').val();
	if(img	!=	"")
	{
		dotpos=img.lastIndexOf('.');
		ext=img.substring(dotpos,img.length);
	
		 if(ext!=".jpg" && ext!=".jpeg" && ext!=".png" && ext!=".gif" && ext!=".bmp")
		{
			$('#image_error').html("Only jpg,jpeg,bmp,gif,png allowed");
			flag=0;
		}
		else
		{
			$('#image_error').html("");
		}
	}
	else
	{
		$('#image_error').html("");
	}
	if(flag==0)
	{
		return false;
	}
}