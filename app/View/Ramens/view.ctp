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
		<div style = "float:left;">
                <table>

                <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Category_id</th>
                <th>area_id</th>
               <!--  <th>Map</th> -->
                </tr>


    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->
	<!-- 左がリスト　右が一つずつ取り出す -->
			<?php foreach ($shops[0]['Ramen'] as $ramen): ?>
    　　　　　   <tr>  
        　　　　 <td>
        		<?php echo $ramen['id']; ?>
        		</td>
                <td>
                <img width="100" height="100" src="http://192.168.33.10/iloveramen/files/P<?php echo str_pad($shop['Ramen'][0]['id'], 5, "0",STR_PAD_LEFT);?>">
                 </td>
                
              <!--   <td><?php //echo $this->Html->link($shop['Shop']['name'],array('controller' => 'shops', 'action' => 'view', $shop['Shop']['id'])); ?>
                </td> -->

               
           <!--      <td><?php //echo $this->Html->link($shop['Shop']['name'],array('controller'=>'shops','action' =>'shop_index',$shop['Shop']['id'])); ?>
                </td> -->

                <td>
               
         <!--       カテゴリーテーブルの情報を右のカテゴリー変数に一つづつ取り出す
               カテゴリーテーブルのIdとラーメンテーブルのカテゴリーIDが一致したときに名前を取り出す
               カテゴリーテーブルから名前を取り出してその名前を表示する -->
            <?php 
            foreach ($categories as $category) {
                if ($category['Category']['id'] == $shop['Ramen'][0]['category_id']) {
                echo h($category['Category']['name']);
                        # code... name を表示する
            break;
                }
            }
            ?>
                </td>

            <td>

            <?php 
            foreach ($areas as $area) {
                if ($area['Area']['id'] == $shop['Ramen'][0]['area_id']) {
                echo h($area['Area']['name']);
                        # code... name を表示する
            break;
                }
            }
            ?>
                
            </td>

                </tr>
				
           	<?php endforeach; ?>

           <p>
           <?php echo $shops[0]['Shop']['map']; ?>
       	   </p>

 
<!--     <?php //foreach ($ramens as $ramen):?>                            

                            <div style="float:left;">

                    
                                <img width="100" height="100" src="http://192.
        </div>
    </div>
</div>