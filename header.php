<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <title>Tokoku</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" id="font-awesome-style-css" href="http://phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		
	    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src = "/jquery/src/rowgrid/jquery.row-grid.js"></script>
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        
		<script type="text/javascript">
			function getCookie(name)
			  {
			    var re = new RegExp(name + "=([^;]+)");
			    var value = re.exec(document.cookie);
			    return (value != null) ? unescape(value[1]) : null;
			  }
			  
			jQuery(document).ready(function() {
				var category = "<?php echo $GLOBALS['category']; ?>";
				var str = "<?php echo $GLOBALS['str']; ?>";
				jQuery("#target-content").load("?controller=paging&action=filter&id=1&category=" + category + "&str=" + str);
			    jQuery("#pagination li").live('click',function(e){
			    	e.preventDefault();
			        jQuery("#target-content").html('memuat...');
			        jQuery("#pagination li").removeClass('active');
			        jQuery(this).addClass('active');
			        var id = this.id;
					var category = "<?php echo $GLOBALS['category']; ?>";
					var str = "<?php echo $GLOBALS['str']; ?>";
			        jQuery("#target-content").load("?controller=paging&action=filter&id=" + id + "&category=" + category + "&str=" + str);
			    });
		    });
	     // When the user scrolls down 20px from the top of the document, show the button
	        window.onscroll = function() {scrollFunction()};
	
	        function scrollFunction() {
	            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	                document.getElementById("myBtn").style.display = "block";
	            } else {
	                document.getElementById("myBtn").style.display = "none";
	            }
	        }
	
	        // When the user clicks on the button, scroll to the top of the document
	        function topFunction() {
	            document.body.scrollTop = 0; // For Chrome, Safari and Opera 
	            document.documentElement.scrollTop = 0; // For IE and Firefox
	        }

	        $(document).ready(function() {
	            $('#example').DataTable( {
	                "pagingType": "full_numbers"
	            } );
	        } );      
        </script>
        <style type="text/css">
			#myBtn {
			    display: none; /* Hidden by default */
			    position: fixed; /* Fixed/sticky position */
			    bottom: 20px; /* Place the button at the bottom of the page */
			    right: 30px; /* Place the button 30px from the right */
			    z-index: 99; /* Make sure it does not overlap */
			    border: none; /* Remove borders */
			    outline: none; /* Remove outline */
			    background-color: red; /* Set a background color */
			    color: white; /* Text color */
			    cursor: pointer; /* Add a mouse pointer on hover */
			    padding: 15px; /* Some padding */
			    border-radius: 10px; /* Rounded corners */
			}
			
			#myBtn:hover {
			    background-color: #555; /* Add a dark-grey background on hover */
			}        
        </style>
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #2a5275">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="/" style="color: white">Tokoku</a>
		</div>
	    <?php if (!isset($_SESSION['role']) || ($_SESSION['role'] != "ADMIN_ROLE")) { ?>				
		<form class="navbar-form navbar-left" action="" method="get">
	        <div class="form-group">
	          	<input type="hidden" name="controller" class="form-control" value="home">
	          	<input type="hidden" name="action" class="form-control" value="filter">
	          	<input type="hidden" name="id" class="form-control" value="1">
	          	<input type="hidden" name="category" class="form-control" value="fisik">
	          	<input type="text" name="str" class="form-control" placeholder="Cari Barang" size="80%">
	        </div>
        	<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
      	</form>
      	<?php } ?>      	
	    <ul class="nav navbar-nav navbar-right">
	      <?php if (isset($_SESSION['login_user'])) { ?>
			<?php if ($_SESSION['role'] == "ADMIN_ROLE") { ?>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" id="dropDownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color: white">
				  <span class="glyphicon glyphicon-user"></span> 
				  <?php echo $_SESSION['name']; ?>
				</a>
				<ul class="dropdown-menu" aria-labelledby="dropDownUser">
				  <li><a href="?controller=login&action=terminate"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			  </li>			
			<?php } else { ?>
			  <li>
			    <a href="?controller=keranjang&action=index" style="color: white">
				  <span class="glyphicon glyphicon-shopping-cart"></span> Keranjang
				  <span class="badge" style="color: yellow">
				    <?php if (isset($_SESSION['itemCount'])) { echo $_SESSION['itemCount']; } else { echo '0'; } ?>
				  </span>
				</a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" id="dropDownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color: white">
				  <span class="glyphicon glyphicon-user"></span> 
				  <?php echo $_SESSION['name']; ?>
				</a>
				<ul class="dropdown-menu" aria-labelledby="dropDownUser">
				  <li><a href="?controller=pembelian&action=index"><span class="glyphicon glyphicon-book"></span> Transaksi</a></li>
				  <li><a href="?controller=pembelian&action=indexDigital"><span class="glyphicon glyphicon-scale"></span> Transaksi Digital</a></li>
				  <li><a href="?controller=login&action=terminate"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			  </li>
			<?php }?>
	      <?php } else { ?>
		  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white">Login <span class="glyphicon glyphicon-log-in"></span></a>
			<div class="dropdown-menu">
			  <form id="form_login" action="?controller=login&action=authenticate" class="form container-fluid" method="post">
				<div class="form-group">
				  <label for="username">Username</label>
				  <input type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" class="form-control" name="password">
				</div>
				<button type="submit" id="btnLogin" class="btn btn-primary">Login <span class="glyphicon glyphicon-log-in"></span></button>
			  </form>
			</div>
		  <?php } ?>
		</ul>
	  </div>		
    </nav>