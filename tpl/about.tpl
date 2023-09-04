<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->title?></title>
	<link rel="stylesheet" type="text/css" href=<?php echo $this->contentCssStyle?>>
	<link rel="stylesheet" type="text/css" href=<?php echo $this->contentCssAbout?>>
</head>
<body>
    <header>
		<div>
		 <ul>
		 <li><a href="index.php"><?php echo $this->contentHome?></a></li>
		 <li class="active"><a href="#"><?php echo $this->contentAbout?></a></li>
		 <li><a href="purchases.php"><?php echo $this->contentPurchases?></a></li>
		 </li>
		</ul>
		</div>
		<div class="title">
			<h1><?php echo $this->contentABOUT_AUTHOR?></h1>
		</div>
	</header> 
	<p class="about">
        <?php echo $this->contentABOUT_TXT?>
	</p>
</body>
</html>