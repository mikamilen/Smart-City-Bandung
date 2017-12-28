<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
	
</head>
<body>
	
	<header>
		<div class="navbar navbar-fixed-top" id="navbar-scroll" role="navigation">
	<a href="<?php echo home_url(); ?>" class="navbar-brand"><img src="<?php echo home_url() . '/wp-content/themes/smartcity/asset/images/lg.png'; ?>" alt=""></a>
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="<?php echo home_url(); ?>">Home</a></li>
					<li><a href="<?php echo home_url() . '/profil'; ?>">Profile</a></li>
					<li><a href="<?php echo home_url() . '/blog'; ?>">Blog</a></li>
					<li><a href="<?php echo home_url() . '/kontak'; ?>">Kontak</a></li>
				</ul>
			</div>
		</div>
	</div>
		<div class="clear"></div>
	</header>