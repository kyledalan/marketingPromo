<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

include("./includes/application.php");
$app = new application2234(); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8>
	<title>Welcome</title>
	<link href="./scripts/jquery-ui-1.10.3.custom/css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<link href="./styles/styles.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
	<div class="welcome">
		<h1>Welcome</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
		<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
	</div>
</div>
<form class="hidden dialog user-register">
	<input type="hidden" name="action" value="user-register" />
	<p>
		<label for="username">Name:</label>
		<input type="text" name="username" required />
	</p>
	<p>
		<label for="email">Email:</label>
		<input type="text" name="email" required />
	</p>
	<p>
		<label for="password">Password:</label>
		<input type="password" name="password" required />
	</p>
	<p>
		<a class="login">Sign in instead</a><br />
	</p>
	<p>
		<input type="submit" name="register" value="Reg">
		<input type="reset" name="cancel" value="Cancel">
	</p>
</form>
<form class="hidden dialog user-login">
	<input type="hidden" name="action" value="user-login" />
	<p>
		<label for="email">Email:</label>
		<input type="text" name="email" required />
	</p>
	<p>
		<label for="password">Password:</label>
		<input type="password" name="password" required />
	</p>
	<p>
		<a class="register">Register instead</a><br />
	</p>
	<p>
		<input type="submit" name="login" value="Log in">
		<input type="reset" name="cancel" value="Cancel">
	</p>
</form>
<form class="hidden dialog user-logout">
	<input type="hidden" name="action" value="user-logout" />
	<input name="logout" type="submit" value="Log out">
</form>
<div class="hidden dialog user-already-registered">You've already registered</div>
<div class="hidden promo" data-promo-id="1234">Promo materials here</div>
<div class="hidden promo promo-thanks">
	<p><span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span> Your files have downloaded successfully into the My Downloads folder.</p>
	<p>Currently using <b>36% of your storage space</b>.</p></div>

</body>
<script src="./scripts/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script src="./scripts/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
<script src="./scripts/jquery-cookie-master/jquery.cookie.js"></script>
<script src="./scripts/application.js"></script>
</html>