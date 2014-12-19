
<!-- ラーメンコントローラにトップページみたいなファンクションを作って、ラーメンコントローラーに反映されるようにする -->
<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- divで区切ってページを作っていく -->
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('shop_page');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<meta charset="UTF-8">
	<title>I love らーめん</title>
	
	<Link rel="stylesheet" href="../css/shop_page.css">


	<!-- <Link rel="stylesheet" type="" href="css/style.css"> -->
</head>

<body>
	<div class="wrapper">
<!-- ヘッダーの部分 -->
		<div class="header">
			<h2>I love ramen</h2>
		</div>
			<?php echo $this->fetch('content'); ?>
<!-- コンテンツの部分 -->
			
				
<!--フッターの部分-->
		<div class="footer"></div>
			<!-- <div class="left_box">	
				<iframe width="200" height="200" src="//www.youtube.com/embed/qtOERNId8gw" frameborder="0" allowfullscreen></iframe>
					
					</div> -->
	
	<!-- <img src="ISID.jpeg" alt=""> -->
		<?php echo $this->element('sql_dump'); ?>
</body>
</html>

