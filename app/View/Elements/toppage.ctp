<div class="contents">
				<div class="rows">
					<!-- コンテンツの中のレフトボックス -->
					<div class="left_box">
					<form action="cgi-bin/abc.cgi" method="post">
						<p>
						adress：<input type="text" name="namae">
						</br>
						password：<input type="text" name="namae">
						</p>
						<p>
						<input type="submit" value="ログイン"> </br>
						</p>
						
						<div class="area">
						<h1>エリア</h1>
						<h1>エリア</h1></br>
							<?php foreach ($infos as $info): ?>
							<h1><?php echo h($info['Info']['name']); ?></h1>
							<h1><?php echo h($area['Area']['title']); ?></h1>

							<p><small>Created: <?php echo $area['Area']['created']; ?></small></p>
							<p><?php echo h($area['Area']['body']); ?> </p>
							

							<?php endforeach; ?>
    						<?php unset($info); ?>　

						<h1>東京　池袋　新宿　四谷　大塚</h1></br>
						</div>

						<div class="category">
						<h1>カテゴリー</h1></br>
							<?php foreach ($infos as $info): ?>
							<h1><?php echo h($info['Info']['name']); ?></h1>

							<h1><?php echo h($category['Category']['title']); ?></h1>
							<p><small>Created: <?php echo $category['Category']['created']; ?></small></p>
							<p><?php echo h($category['Category']['body']); ?> </p>

							<?php endforeach; ?>
    						<?php unset($info); ?>　

						<h1>醤油　塩　味噌　その他</h1>
						</div>

					</form>
					
					</div>

		 			<!-- コンテンツの中のライトボックス -->
		 			<div class="right_box">
						<h2>ランキング</h2>
						<img src="http://192.168.33.10/iloveramen/img/ra1.jpeg" alt="">
						<img src="http://192.168.33.10/iloveramen/img/ra2.jpeg" alt="">
						<img src="http://192.168.33.10/iloveramen/img/ra3.jpeg" alt="">
					</br>
					<!-- 						<img src="./ra5.jpg" alt=""> -->
						<img src="http://192.168.33.10/iloveramen/img/ra6.jpeg" alt="">
						<img src="http://192.168.33.10/iloveramen/img/ra7.jpg" alt="">
						<!-- <img src="./ra4.jpg" alt=""> -->
					</div>

				</div>
			
				<div class="rows">
					<div class="left_box1">
					<h2>ツイッター</h2>
					</div>
					<div class="left_box2">
						<h2>インフォメーション</h2>
								<?php foreach ($infos as $info): ?>
									<h1><?php echo h($info['Info']['name']); ?></h1>
									<p><small>Created: <?php echo $info['Info']['created']; ?></small></p>
									<!-- <p><?php //echo h($info['Info']['body']); ?> </p> -->

								<?php endforeach; ?>
    							<?php unset($info); ?>


						<h1>new!!  ラーメン翔   新店舗が秋葉原にオープン！</h1>
						<h1>new!!  ラーメン豊   新作ラーメンを発表！</h1>
					</div>
					<div class="right_box1">
					　　 <h1>食レポコーナー</h1>
						<iframe width="600" height="400" src="//www.youtube.com/embed/qtOERNId8gw" frameborder="0" allowfullscreen></iframe>
					
					</div>


				</div>
			</div>	