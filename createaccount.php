<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/main.css" />
		
		<script type="text/javascript">
      <?php include "db.php" ?>
  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores");
      form.username.focus();
      return false;
    }

    if(form.password1.value != "" && form.password1.value == form.password2.value) {
      if(form.password1.value.length < 6) {
        alert("Error: Password must contain at least six characters");
        form.password1.focus();
        return false;
      }
      if(form.password1.value == form.username.value) {
        alert("Error: Password must be different from Username");
        form.password1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.password1.value)) {
        alert("Error: password must contain at least one number");
        form.password1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.password1.value)) {
        alert("Error: password must contain at least one lowercase letter");
        form.password1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password1.value)) {
        alert("Error: password must contain at least one uppercase letter");
        form.password1.focus();
        return false;
      }
    } else {
      alert("Error: Passwords don't match");
      form.password1.focus();
      return false;
    }

    return true;
  }

</script>
		
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
						<img src = "images/logo.png" width="50px" />
						<h1>Create Account</h1>
							<form id="contact_form" action="#" method="POST" enctype="multipart/form-data" onsubmit="return checkForm(this);">
								<div class="row">
									<label for="username">Username:</label><br />
									<input id="username_id" class="input" name="username_name" type="text" value="" size="30" /><br />
								</div>
								<div class="row">
									<label for="password">Password:</label><br />
									<input id="password_id" class="input" name="password_name" type="password" value="" size="30" /><br />
								</div>
								<div class="row">
									<label for="password">Confirm password:</label><br />
									<input id="password" class="input" name="password2" type="password" value="" size="30" /><br />
								</div>
								<input id="submit_button" type="submit" value="Create" />
							</form>					
						</header>
            <?php $username1 = isset ($_POST["username_name"]) ? $_POST["username_name"] :  "" ;
            $password1 = isset ($_POST["password_name"]) ? $_POST["password_name"] : "" ;
            $query = "INSERT INTO UserInfo (`username`, `password`, `email`) VALUES ('$username1', '$password1', 'email@email.com')";
            

            $result = mysqli_query($conn, $query);
            
            /*while($row = mysql_fetch_array($result, MYSQL_NUM)) {
              echo $row;
            }  */    ?>
			</div>

		<!-- Scripts -->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>