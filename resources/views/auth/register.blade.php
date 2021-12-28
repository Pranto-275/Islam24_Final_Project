<div class="main">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <style>

		body{
			background-image: url(bg.jpg);
			/* background-color: skyblue; */
			background-repeat: no-repeat;
			background-size: 1500px 620px;
			text-align: center;
			font-size: 22px;
			color: White;
		}
		h1{
			color: white;
			font-size: 60px;
			font-family: cursive;
		}
		.form1{
			background:rgba(0,0,0,0.6);
			padding: 24px;
			margin-top:0px;
			width: 28%;
			position: absolute;
			left:34%;
			border-radius: 15px;
		}
		input{
			width: 330px;
			height: 30px;
			border-radius: 7px;
			text-align: center;
		}
		input[type="text"]{
			font-size: 18px;
		}
		input[type="email"]{
			font-size: 18px;
		}
		input[type="submit"]{
			font-size: 20px;
			height: 40px;
			background-color: #00FF7F;

		}

		input[type="submit"]:hover{
			color:white;
			background-color: blue;
		}
		select{
			size:400px;
			height: 30px;
			width: 252px;
			border-radius: 20px;
			text-align: center;
			font-size: 18px;
		}
		input[type="radio"]
		{
			font-size: 14px;
			size: 10px;
			height:12px;
		}
		#imam{
			display: none;
		}
    </style>
		<h1 style="color:green">Registration For Islam24</h1>
		<div class="form1">
		<!--	Registration Form<br>!-->
			<form method="POST" action="{{ route('register') }}" class="login-form">
                @csrf
				<input type="text" id="req1" name="name" placeholder="Name"><br><br>
				<input type="email" id="req2" name="email" placeholder="Email"><br><br>
				<input type="text" id="req3" name="address" placeholder="Address"><br><br>
                <select id="selection" name="type" required>
                   <option value="user">User</option>
                   <option value="imam">Imam</option>
				</select>
				<br><br>
				<div id="imam">
				<input type="text" id="req6" name="nid" placeholder="National ID"><br><br>
				<input type="text" id="req7" name="mosque" placeholder="Present Mosque"><br><br>
	</div>
				<input type="password" id="req5" name="password" placeholder="Password"><br><br>
				<input type="password" id="req5" id="password_confirmation" class="block mt-1 w-full"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password"><br><br>
				<button type="submit" class="w3-button w3-purple">Submit</button>

		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/7.0.0/d3.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script>
        // Start

    $('#selection').on('change', function() {

      if ( this.value == 'imam')
      {
        $("#imam").show();
      }
      else
      {
        $("#imam").hide();
      }
    });

		// End
		function empty(){
			//var error=""
			if(document.getElementById('req1').value=="")
			{
				//error+="Enter Firstname";
				alert("Enter first name");
			}/*
			if(document.getElementById('req2').value=="")
			{
				alert("Enter last name");
			}*/
			if(document.getElementById('req3').value=="")
			{
				alert("Enter email address");
			}
			/*
			if(document.getElementById('req4').value=="")
			{
				alert("Enter contact number");
			}
			if(req4.value.length!=10)
			{
				alert('Note : Contact no must be 10 digits')
			}*/
			if(document.getElementById('req5').value=="")
			{
				alert("Password");
				return false;
			}
		}


		function emailValidate(element,message)
	{
		var emailExp=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0]{2,4}$/;
		if(element.value.length>0)
		{
			if(element.value.match(emailExp))
			{
				return true;
			}
			else
			{
				alert(message);
				element.focus();
				return false;
			}
			return true;
		}
		/*else
		{
				alert('Please fill email id');
				element.focus();
				return false;

		}*/
	}

	function isNumeric(element,message)
	{
		var numericExpression=/^[0-9]+$/;
		if(element.value.match(numericExpression))
		{
			return true;
		}
		else{
			alert(message);
			element.focus();
			return false;
		}
	}
	function Selection(element,message)
	{

		if(element.value == "Gender")
		{
			alert(message);
			element.focus();
			return false;
		}
		else{

			return true;
		}

	}



</script>
