<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome | <?php echo $this->global_data['site_title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

	<!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/calendar.js"></script>
	<!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/church-home.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>

  <body>

    <div >
      <div class="header">
      	<div class="navbar-wrapper">
         <nav class="navbar navbar-static-top ">
		    <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand " href="#"><img src="<?php echo base_url(); ?>assets/images/<?php echo $this->global_data['logo']; ?>" alt="<?php echo $this->global_data['site_title']; ?>" /></a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="navbar-collapse collapse" id="navbar">
	                <ul class="nav navbar-nav navbar-right">
	                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
						<?php foreach($sections as $section) : ?>
	        				<li><a href="<?php echo base_url(); ?>sections/view/<?php echo $section->id; ?>"><?php echo $section->name; ?></a></li>
			        	<?php endforeach; ?>
			        	<?php foreach($menu_items as $item) : ?>
			        		<li><a href="<?php echo base_url(); ?>articles/view/<?php echo $item->id; ?>"><?php echo $item->title; ?></a></li>
			        	<?php endforeach; ?>
	 
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
          </div>
    	</nav>
		 

       
      </div>
     </div>
	<div class="container">
     	<div class="row">
			<?php foreach($articles as $article) : ?>
    		<div class="col-lg-12">
				<h1><?php echo $article->title; ?></h1>
				<?php if ($article->video!="") : ?>
					<?php if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $article->video, $match)) : ?>
    					<?php $video_id = $match[1]; ?>
					<?php endif ;?>
					<iframe width="630" height="354" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
				<?php endif ; ?>
				<?php if ($article->calendar!="") : ?>
					<iframe id="calendar" src="https://www.google.com/calendar/embed?src=<?php echo $article->calendar; ?>&ctz=America/Edmonton" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
				<?php endif ; ?>
				<?php echo $article->body; ?></font>
				
				<?php if ($article->audio!=""): ?>
					<br/>
					<audio controls>
						<source src="../../uploads/<?php echo $article->audio ;?>" >
						Your browser does not support the audio format
					</audio>
				<?php endif ; ?>
				
        	</div>
			<?php endforeach ; ?>
      </div>
	</div> <!-- /container -->
      <footer>
        <p>&copy; 2015 Harvest Church International | <a href="https://www.google.ca/maps/place/All+Nations+Harvest+Church/@52.272734,-113.818347,15z/data=!4m2!3m1!1s0x0:0xfd37477ef7755bf4">5233 54 Ave, Red Deer, AB T4N 5K5</a> | designed by Jonathan Weyermann | <a href="<?php echo base_url(); ?>admin/login">Admin Login</a></p>
      </footer>

    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
  </body>
</html>
