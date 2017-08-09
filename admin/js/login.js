
			function login_validation()
			{
				var name		=	document.getElementById('uname').value;
				var password	=	document.getElementById('pass').value;
				var errval		=	0;
			
				if(name.trim()	==	"")
				{
					document.getElementById('div_name').innerHTML	=	"Enter user name";
					errval	=	1;
				}
				else
				{
					document.getElementById('div_name').innerHTML	=	"";
					
				}
				
				if(password.trim()	==	"")
				{
					document.getElementById('div_pass').innerHTML	=	"Enter user password";
					errval	=	1;
				}
				else
				{
					document.getElementById('div_pass').innerHTML	=	"";
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
		