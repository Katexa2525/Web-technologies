<!DOCTYPE html>
<html>

<head>
	<title><?php echo $this->title?></title>
    <link rel="stylesheet" type="text/css" href=<?php echo $this->contentCssStyle?>>
	<link rel="stylesheet" type="text/css" href=<?php echo $this->contentCssStylePu?>>
</head>
<body>
    <header>
		<div>
		 <ul>
		 <li><a href="index.php"><?php echo $this->contentHome?></a></li>
		 <li><a href="about.php"><?php echo $this->contentAbout?></a></li>
		 <li class="active"><a href="#"><?php echo $this->contentPurchases?></a></li>
		 </li>
		</ul>
		</div>

	</div>
	<div class="title">
		<h1><?php echo $this->contentDELIVERY?></h1>
	</div>
	</header>


	<form action="about.php" method="post" class="ui-form">
		<h3><?php echo $this->contentFill?></h3>
		<div class="form-row">
		    <input type="text" id="Login" name="login" required autocomplete="off">
            <label for="Login"><?php echo $this->contentFormName?></label>
		</div>
		<div class="form-row">
		    <input type="text" id="Email" name="mail" required autocomplete="off">
            <label for="Email"><?php echo $this->contentEmail?></label>
		</div>
		<h2><?php echo $this->regexpStatus?></h2>
		<p><input type="submit" value="Enter"></p>
	</form>

	<div class="container">
		<div><img src=<?php echo $this->contentImgFruit?>></div>
		<div class="fruits"><?php echo $this->contentFruit?></div>
		<div><img src=<?php echo $this->contentImgMeat?>></div>
		<div class="meat"><?php echo $this->contentMeat?></div>
		<div><img src=<?php echo $this->contentImgVegetables?>></div>
		<div class="vegetables"><?php echo $this->contentVegetables?></div>
		</div>
</body>
</html>