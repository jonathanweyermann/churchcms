<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome | <?php echo $this->global_data['site_title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">



	<!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/church-home.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/normalize.css" rel="stylesheet">
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


	   <!-- Header Carousel -->
	    <header id="myCarousel" class="carousel slide">
	        <!-- Indicators -->
	        <ol class="carousel-indicators">
	        	<?php foreach($carousels as $key=>$carousel) : ?>
		            <li data-target="#myCarousel" data-slide-to="<?php echo $key ; ?>" class="<?php if ($key==0) echo "active"; ?>"></li>
		        <?php endforeach ; ?>
	        </ol>

	        <!-- Wrapper for slides -->
	        <div class="carousel-inner">
	        	<?php foreach($carousels as $key=>$carousel) : ?>
	            	<div class="item <?php if ($key==0) echo "active"; ?>">
	                	 <img class="slides" src="<?php echo base_url() ; ?>images/<?php echo $carousel->image ; ?>" >
	                	<div class="carousel-caption">
	                    	<h2><?php echo $carousel->header2 ; ?></h2>
	                    	<h1><?php echo $carousel->header1 ; ?></h1>

	                	</div>
	            	</div>
	            <?php endforeach ; ?>

	        </div>


	        <!-- Controls -->
	        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	            <span class="icon-prev"></span>
	        </a>
	        <a class="right carousel-control" href="#myCarousel" data-slide="next">
	            <span class="icon-next"></span>
	        </a>
	    </header>
<div class="container">
      <ul class="home-content">
		<?php foreach($articles as $article) : ?>
			<li>
			<h4><?php echo $article->title; ?></h4>
				<?php echo word_limiter($article->body, 20); ?></font>
				<p><a href="<?php echo base_url(); ?>articles/view/<?php echo $article->id; ?>">Read More</a></p>
			</li>
		<?php endforeach; ?>
	</ul>
</div> <!-- /container -->
      <footer>
        <p>&copy; 2015 Harvest Church International | <a href="https://www.google.ca/maps/place/All+Nations+Harvest+Church/@52.272734,-113.818347,15z/data=!4m2!3m1!1s0x0:0xfd37477ef7755bf4">5233 54 Ave, Red Deer, AB T4N 5K5</a> | designed by Jonathan Weyermann | <a href="<?php echo base_url(); ?>admin/login">Admin Login</a></p>
      </footer>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

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
