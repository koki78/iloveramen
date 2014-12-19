<!-- File: /app/View/Ramens/view.ctp -->

<!-- <h1><?php //echo h($ramen['Ramen']['id']); ?></h1>
<?php //echo "の"?>
<h1><?php //echo h($ramen['Ramen']['category_id']); ?></h1> -->

<!-- <img src="http://192.168.33.10/iloveramen/files/P<?php //echo str_pad($ramen['Ramen']['id'], 5, "0",STR_PAD_LEFT);?>"> -->

<div class="contents">
    <div class="rows">
        <!-- コンテンツの中のレフトボックス -->
        <div class="left_box">

　　　　　<!-- エリアページ -->
    <!-- <form> -->
        	<div class="area">
        	<h1>エリア</h1>
        	</br>
       
            <?php foreach ($areas as $area): ?>

            <h3>
            <input type="checkbox" name="area" value='$area'>
            <?php echo h($area['Area']['name']); ?>
            </h3>

            <?php endforeach; ?>
            <?php unset($area); ?>

            <p>
            <input type="submit" value="検索"> </br>
            </p>
            </div>
       

        <!-- カテゴリーページ -->
        	<div class="category">
            <h1>カテゴリー</h1></br>
           	
            <?php foreach ($categories as $category): ?>
            
            
            <h3>
     		<strong>
            <input type="checkbox" name="category" value='$category'>
            <?php echo h($category['Category']['name']); ?>
            </strong>
            </h3>

            <?php endforeach; ?>
            <?php unset($category); ?>
            <p>
            <input type="submit" value="検索"> </br>
            </p>

        	</div>


    	</div>

        <!-- コンテンツの中のライトボックス -->
        <div class="right_box">
            <h2>
	        <?php echo h($ramen['Ramen']['name']); ?>
			<?php echo "の"?>
				<!-- <p><?php //echo h($shop['Ramen'][0]['category_id']); ?> </p> -->
               
         <!--カテゴリーテーブルの情報を右のカテゴリー変数に一つづつ取り出す
               カテゴリーテーブルのIdとラーメンテーブルのカテゴリーIDが一致したときに名前を取り出す
               カテゴリーテーブルから名前を取り出してその名前を表示する-->
            <?php if (isset($shop['Ramen'][0])){ 
	            foreach ($categories as $category) {
	            	if ($category['Category']['id'] == $shop['Ramen'][0]['category_id']) {
	            		echo h($category['Category']['name']);
	            		# code... name を表示する
	            		break;
	            	}
	            }
	           }
	        ?>

            </h2>
            <img width="300" height="300" src="http://192.168.33.10/iloveramen/files/P<?php echo str_pad($shop['Shop']['id'], 5, "0",STR_PAD_LEFT);?>">
            
            <td>
            <h1>
                <?php echo "価格:"?>
                <?php echo "750円"?>
                <?php //echo h($shop['Shop']['price']); ?>
            </h1>
        	</td>
            
       		<?php echo $this->Html->link('Add Shop',
            array('controller' => 'Shops', 'action' => 'add')
            ); ?>

<!-- ここからさくじょ -->
        </div>
    </div>
</div>