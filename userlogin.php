<!DOCTYPE html>
<html>
    <head>
        <title>User Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 		<script src="js/jquery-2.0.3.min.js" type="text/javascript" ></script>
    	<script src="js/bootstrap.min.js" type="text/javascript" ></script>
     	<!-- External CSS -->
     	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" >
      	<style type="text/css">
        	img
        	{
            	width:30%;
    	        height:40%;
        	    border-style:solid;
            	border-radius:50%;
            	background-repeat:no-repeat;
        	}
    	</style>
    </head>
    <body>
		<div class="container">
			<div class="panel panel-primary">
 				<div class="panel-heading" style="font-size:35px; font-family:monotype corsiva; color:yellow;">User login</div>
  				<div class="panel-body"  style="background-image:url('images/gff.jpeg') ; background-size: 100% 100%;">
					<div class="row" style="text-align:center;">
        				<div class="col-xs-12">
      						<img src="images/der.gif" alt="Responsive image"> 
       						<br>
							<form id="reg6" action="loginconfig.php" method="post">
                <?php if (isset($_GET['error'])){ ?>
                <p class="error" style="background: #f2dede; color: #a94442; padding: 10px; border-radius: 5px;"><?php echo $_GET['error']; ?></p>
                <?php } ?>
   								<div class="form-group">
	            	                <label>Email Id</label>
    	            	            <input type="Email" name="uname" class="form-control" placeholder="Enter Id"/>
       							</div>
								<div class="form-group">
                	 	           	<label>Password</label>
                    		        <div class="input-group">
                   						<input type="password" class="form-control pwd" name="psw" placeholder="Password">
          								<span class="input-group-btn">
            								<button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          								</span>          
        							</div>
        						</div>
                    <div style="display:hidden;"> <input style="display:none;" type="text" name="table" value="customer"></div>
								<div class="form-group">
                         			<button type="submit" class="btn btn-primary">login</button>
                 				</div>
      						</form>	
      					</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
    $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
    </script>
            