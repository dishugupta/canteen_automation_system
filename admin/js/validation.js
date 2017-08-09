			
			//validation for changing in user side panel setting...****
			function setting_validation()
			{
				
				var title	=	document.getElementById('setting_title').value;
				var logo	=	document.getElementById('setting_logo').value;
				var email	=	document.getElementById('setting_email').value;
				var mobile	=	document.getElementById('setting_mobile').value;
				var copy	=	document.getElementById('setting_copy').value;
				var filter 	= 	/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				var errval	=	0;
				
				if(title.trim()	==	"")
				{
					document.getElementById('setting_errname').innerHTML	=	"Enter title name";
					errval	=	1;
				}
				else if(title.match(/^[a-zA-Z ]*$/)	==	null)
				{
					document.getElementById('setting_errname').innerHTML	=	"Invalid title name";
					errval	=	1;
				}
				else
				{
					document.getElementById('setting_errname').innerHTML	=	"";
				}
				
				if(logo.trim()	!=	"")
				{
					if(logo.match(/^.*\.(jpg|jpeg|gif|JPG|png|PNG)$/)	==	null)
					{
						document.getElementById('setting_errlogo').innerHTML	=	"Invalid image format";
						errval	=	1;
					}
					else
					{
						document.getElementById('setting_errlogo').innerHTML	=	"";
					}
				}
				
				if(email.trim()	==	"")
				{
					document.getElementById('setting_erremail').innerHTML	=	"Enter email id";
					errval	=	1;
				}
				else if(email.match(filter)	==	null)
				{
					document.getElementById('setting_erremail').innerHTML	=	"Invalid email id";
					errval	=	1;
				}
				else
				{
					document.getElementById('setting_erremail').innerHTML	=	"";
					
				}
				
				if(mobile.trim()	==	"")
				{
					document.getElementById('setting_errmobile').innerHTML	=	"Enter mobile no.";
					errval	=	1;
				}
				else if(mobile.match(/^[0-9]*$/)	==	null)
				{
					document.getElementById('setting_errmobile').innerHTML	=	"Invalid mobile no.";
					errval	=	1;
				}
				else if(mobile.length	!=	10)
				{
					document.getElementById('setting_errmobile').innerHTML	=	"Mobile no. must be in 10 digits";
					errval	=	1;
				}
				else
				{
					document.getElementById('setting_errmobile').innerHTML	=	"";
				}
				
				if(copy.trim()	==	"")
				{
					document.getElementById('setting_errcopy').innerHTML	=	"Enter copyright text";
					errval	=	1;
				}
				else
				{
					document.getElementById('setting_errcopy').innerHTML	=	"";
				}
				
				if(errval	==	1)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			
			//validation for updating admin user profile...****
			function user_profile_validation()
			{
				
				var name		=	document.getElementById('user_name').value;
				var email		=	document.getElementById('user_email').value;
				var username	=	document.getElementById('user_uname').value;
				var mobile		=	document.getElementById('user_mobile').value;
				var address		=	document.getElementById('user_address').value;
				var img			=	document.getElementById('user_img').value;
				var filter 		= 	/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				var errval		=	0;
				
				
				if(name.trim()	==	"")
				{
					document.getElementById('user_errname').innerHTML	=	"Enter title name";
					errval	=	1;
				}
				else if(name.match(/^[a-zA-Z ]*$/)	==	null)
				{
					document.getElementById('user_errname').innerHTML	=	"Invalid name of user";
					errval	=	1;
				}
				else
				{
					document.getElementById('user_errname').innerHTML	=	"";
				}
				
				
				if(email.trim()	==	"")
				{
					document.getElementById('user_erremail').innerHTML	=	"Enter email id";
					errval	=	1;
				}
				else if(email.match(filter)	==	null)
				{
					document.getElementById('user_erremail').innerHTML	=	"Invalid email id";
					errval	=	1;
				}
				else
				{
					document.getElementById('user_erremail').innerHTML	=	"";
					
				}
				
				
				
				if(username.trim()	==	"")
				{
					document.getElementById('user_erruname').innerHTML	=	"Enter user name id";
					errval	=	1;
				}
				else
				{
					document.getElementById('user_erruname').innerHTML	=	"";
				}
				
				
				if(mobile.trim()	==	"")
				{
					document.getElementById('user_errmobile').innerHTML	=	"Enter mobile no.";
					errval	=	1;
				}
				else if(mobile.match(/^[0-9]*$/)	==	null)
				{
					document.getElementById('user_errmobile').innerHTML	=	"Invalid mobile no.";
					errval	=	1;
				}
				else if(mobile.length	!=	10)
				{
					document.getElementById('user_errmobile').innerHTML	=	"Mobile no. must be in 10 digits";
					errval	=	1;
				}
				else
				{
					document.getElementById('user_errmobile').innerHTML	=	"";
				}
				
				if(address.trim()	==	"")
				{
					document.getElementById('user_erraddress').innerHTML	=	"Enter user address";
					errval	=	1;
				}
				else
				{
					document.getElementById('user_erraddress').innerHTML	=	"";
				}
				
				
				if(img.trim()	!=	"")
				{
					if(img.match(/^.*\.(jpg|jpeg|gif|JPG|png|PNG)$/)	==	null)
					{
						document.getElementById('user_errimage').innerHTML	=	"Invalid image format";
						errval	=	1;
					}
					else
					{
						document.getElementById('user_errimage').innerHTML	=	"";
					}
				}
				
				
				
				if(errval	==	1)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			
			//validation for add new lunch meal pack...****
			function addlunch()
			{
				
				var name		=	document.getElementById('lunchname').value;
				
				var menu		=	document.getElementById('lunchmenu').value;
				var dayrate		=	document.getElementById('lunchdayrate').value;
				var monthrate	=	document.getElementById('lunchmonthrate').value;
				var description	=	document.getElementById('lunchdescription').value;
				var errval		=	0;
				
				
				if(name.trim()	==	"")
				{
					document.getElementById('errname').innerHTML		=	"Enter name of lunch meal pack";
					errval	=	1;
				}
				else
				{
					document.getElementById('errname').innerHTML		=	"";
				}
				
				if(menu.trim()	==	"")
				{
					document.getElementById('errmenu').innerHTML		=	"Enter menu name";
					errval	=	1;
				}
				else
				{
					document.getElementById('errmenu').innerHTML		=	"";
				}
				
				if(dayrate.trim()	==	"")
				{
					document.getElementById('errdayrate').innerHTML		=	"Enter per day rate amount";
					errval	=	1;
				}
				else if(dayrate.match(/^[0-9]*$/)	==	null)
				{
					document.getElementById('errdayrate').innerHTML		=	"Invalid per day rate amount";
					errval	=	1;
				}
				else
				{
					document.getElementById('errdayrate').innerHTML		=	"";
				}
				
				if(monthrate.trim()	==	"")
				{
					document.getElementById('errmonthrate').innerHTML	=	"Enter monthly rate amount";
					errval	=	1;
				}
				else if(monthrate.match(/^[0-9]*$/)	==	null)
				{
					document.getElementById('errmonthrate').innerHTML	=	"Invalid monthly rate amount";
					errval	=	1;
				}
				else
				{
					document.getElementById('errmonthrate').innerHTML	=	"";
				}
				
				if(description.trim()	==	"")
				{
					document.getElementById('errdescription').innerHTML	=	"Enter description";
					errval	=	1;
				}
				else
				{
					document.getElementById('errdescription').innerHTML	=	"";
				}
				
				if(errval	==	1)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			
			//validation for add new dinner meal pack...****
			function adddinner()
			{
				
				var name		=	document.getElementById('lunchname').value;
				
				var menu		=	document.getElementById('lunchmenu').value;
				var dayrate		=	document.getElementById('lunchdayrate').value;
				var monthrate	=	document.getElementById('lunchmonthrate').value;
				var description	=	document.getElementById('lunchdescription').value;
				var errval		=	0;
				
				if(name.trim()	==	"")
				{
					document.getElementById('errname').innerHTML		=	"Enter name of dinner meal pack";
					errval	=	1;
				}
				else
				{
					document.getElementById('errname').innerHTML		=	"";
				}
				
				if(menu.trim()	==	"")
				{
					document.getElementById('errmenu').innerHTML		=	"Enter menu name";
					errval	=	1;
				}
				else
				{
					document.getElementById('errmenu').innerHTML		=	"";
				}
				
				if(dayrate.trim()	==	"")
				{
					document.getElementById('errdayrate').innerHTML		=	"Enter per day rate amount";
					errval	=	1;
				}
				else if(dayrate.match(/^[0-9]*$/)	==	null)
				{
					document.getElementById('errdayrate').innerHTML		=	"Invalid per day rate amount";
					errval	=	1;
				}
				else
				{
					document.getElementById('errdayrate').innerHTML		=	"";
				}
				
				if(monthrate.trim()	==	"")
				{
					document.getElementById('errmonthrate').innerHTML	=	"Enter monthly rate amount";
					errval	=	1;
				}
				else if(monthrate.match(/^[0-9]*$/)	==	null)
				{
					document.getElementById('errmonthrate').innerHTML	=	"Invalid monthly rate amount";
					errval	=	1;
				}
				else
				{
					document.getElementById('errmonthrate').innerHTML	=	"";
				}
				
				if(description.trim()	==	"")
				{
					document.getElementById('errdescription').innerHTML	=	"Enter description";
					errval	=	1;
				}
				else
				{
					document.getElementById('errdescription').innerHTML	=	"";
				}
				
				if(errval	==	1)
				{
					return false;
				}
				else
				{
					return true;
				}
			}