<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->title?></title>
	<link rel="stylesheet" type="text/css" href=<?php echo $this->contentCssStyle?>>
</head>
<body>
	<header>
		<div>
		 <ul>
		 <li class="active"><a href="#"><?php echo $this->contentHome?></a></li>
		 <li><a href="about.php"><?php echo $this->contentAbout?></a></li>
		 <li><a href="purchases.php"><?php echo $this->contentPurchases?></a></li>
		 </li>
		</ul>
		</div>

		 <div class="title">
		 	<h1><?php echo $this->contentGACHI_FOOD?></h1>
			 <h2><?php echo $this->contentEVERYTHING?></h2>
		 </div>
		 	</header>

</body>
</html>