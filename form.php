<html>
	<head>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/ui/ui.css" type="text/css">
	<style type="text/css">@import url(http://fonts.googleapis.com/css?family=Raleway:100|Terminal+Dosis:400,200,300,500,600,700,800|Arvo:400,700,400italic,700italic|Maven+Pro:400,500,700,900);</style>
	<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="js/blah.js"></script>
	<script>
	$(function() {
		$("#datepicker").datepicker();
		$("#datepicker").datepicker("option", "dateFormat","yy-mm-dd");
	});
	</script>

	</head>
	<body>
		<div class="full-width">
			<div class="container">
				<header>
					<div class="sixteen columns">
						<div class="four columns alpha">
							<h1 id="logo" style="margin-top:20px; margin-bottom:10px;">
								<a href="form.html">
									<img src="img/logo-hive1.png" alt="logo">
								</a>
							</h1>
						</div>
						<div class="eleven columns offset-by-one omega navigation">
						<!-- Default Superfish Nav (add/remove "light" class to toggle visual styling) -->
							<ul class="sf-menu light align-right">
								<li><a href="form.php"><strong class="text-highlight">New Patient</strong> <span>New entry</span></a></li>
								<li><a href="search.php"><strong class="text-highlight">Search & edit</strong> <span>edit</span></a></li>
							</ul>
							<!-- /End Default Superfish Nav-->
						</div>
					</div>
				</header>
			</div>
		</div>
		<div class="super-container full-width content" id="Main_Content">

		<!-- 960 Container -->
			<div class="container">

			<!-- SUPERQUOTES -->
				<div class="frontquote">
				<div class="superquote">					
				People pay the doctor for his trouble; for his kindness they still remain in his debt. 
				</div>
					<p><b>Seneca</b></p>

				<hr>
				</div>
		
			</div>
	<!-- /End 960 Container -->
		</div>
	
		<div class="super-container full-width" id="Sub_Content">

	<!-- 960 Container -->
			<div class="container">	
	<!-- Portfolio List-->  
				<div id="portfolio-list" class="content">
					<h2>Patient Details</h2> 	
				</div>
				<div class="form">
					<form id="patientdetail" action="response/new.php" method="POST">
						<div class="row">
							<span class="label">
								<label for="patient name">Name</label>
							</span>
							<input type="text" class="inputall" maxlength="15" name="pname">
						</div>
						<div class="row">
							<span class="label">
								<label for="patient contact">Contact</label>
							</span>
							<input type="text" class="inputall" maxlength="15" name="pcontact">
						</div>
						<div class="row">
							<span class="label">
								<label for="patient date">Date of visit</label>
							</span>
							<input id="datepicker" type="text" class="inputall" maxlength="15" name="pdate">
						</div>
						<div class="row">
							<span class="label">
								<label for="patient date">Issue</label>
							</span>
							<textarea class="inputall" name="pissue"></textarea>
						</div>
						<div class="row">
							<span class="label">
								<label for="patient date">Diagnosis</label>
							</span>
							<textarea class="inputall" name="pdiag" ></textarea>
						</div>
						<div class="row">
							<span class="label">
								<label for="patient date">Prescription</label>
							</span>
							<textarea class="inputall" name="ppres" ></textarea>
						</div>
						<div class="row">
							<span class="label"  style="width:140px;">
								<label></label>
							</span>
							<input type="submit" value="submit" style="width:120px; margin-top:20px; float:right;">
						</div>

					</form>
				</div>
			</div>
			
		</div>
		<div class="super-container full-width" id="sk123">
			<div class="container">
				<br>
				<hr>
			</div>
			<br>
	</div>
	
	
	<div class="super-container full-width" id="section-sub-footer">
		<div class="container">
			<div class="sixteen columns">	
				<span class="copyright">Saurabh kumar All rights reserved.</span>
			</div>
		</div>
	</div>
	</body>
</html>
