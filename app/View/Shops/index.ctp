<!-- File: /app/View/SHops/index.ctp -->

<div class="contents">
    <div class="rows">
        <!-- コンテンツの中のレフトボックス -->
        <div class="left_box">
           <!--  <form action="cgi-bin/abc.cgi" method="post">
            <p>
            <!-- <ログインページ> -->
            <!-- adress：<input type="text" name="namae">
            </br>
            password：<input type="text" name="namae">
            </p> -->

           <!--  <p>
            <input type="submit" value="ログイン"> </br>
            </p>
            </form> -->

　　　　　<!-- エリアページ -->

    <form>
        <div class="area">
        <h1>エリア</h1></br>

    
            <?php foreach ($areas as $area): ?>


            <strong>
            <h3><?php echo h($area['Area']['name']); ?></h3>
            <input type="checkbox" name="area" value='$area'>
            </strong>

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

            <strong>
            <h3><?php echo h($category['Category']['name']); ?></h3>
            </strong>

            <input type="checkbox" name="category" value='$category'>

            <?php endforeach; ?>
            <?php unset($category); ?>
            <p>
            <input type="submit" value="検索"> </br>
            </p>
        </div>

        </div>
    </form>
   
        <!-- コンテンツの中のライトボックス -->
        <div class="right_box">
            <h2>ランキング</h2>
            <!-- <p><?php //echo $this->Html->link('Add Shop', array('action' => 'add')); ?></p> -->

          <!--   <?php //echo $this->Html->link('Add Shop',
            //array('controller' => 'Shops', 'action' => 'add')
            //); ?> -->


            <div style = "float:left;">
    


<!-- タグが壊れていたりおかしい場合はちょっとづつ書いて確かめていく -->
                <table>

                <tr>
                <th>Id</th>
                <th>写真</th>
                <th>店名</th>
                <th>らーめん</th>
               <!--  <th>Action</th> -->
                <th>種類</th>
                <th>場所</th>
               <!--  <th>Map</th> -->
                </tr>


    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

            <?php foreach ($shops as $shop): ?>
    　　　　　    <tr>  
        　　　　　<td><?php echo $shop['Shop']['id']; ?></td>

                <td>
                    <?php if (isset($shop['Ramen'][0])){ ?>

                    <img width="100" height="100" src="http://192.168.33.10/iloveramen/files/P<?php echo str_pad($shop['Ramen'][0]['id'], 5, "0",STR_PAD_LEFT);?>">

                    <?php } ?>
                </td>

                
                <td>
                    <?php if (isset($shop['Ramen'][0])){ ?>

                    <?php echo $this->Html->link($shop['Shop']['name'],array('controller' => 'shops', 'action' => 'view', $shop['Shop']['id'])); ?>
                    
                    <?php } ?>
                </td>

              <!--   <td>
                <?php //echo $this->Form->postLink(
                //'Delete',
                //array('action' => 'delete', $shop['Shop']['id']),
                //array('confirm' => 'Are you sure?'));
                ?>
                <?php //echo $this->Html->link('Edit', array('action' => 'edit', $shop['Shop']['id'])); ?>
                </td> -->
           <!--      <td><?php //echo $this->Html->link($shop['Shop']['name'],array('controller'=>'shops','action' =>'shop_index',$shop['Shop']['id'])); ?>
                </td> -->


                <td>
                    <?php if (isset($shop['Ramen'][0])){ ?>

                    <?php echo $this->Html->link($shop['Ramen'][0]['name'],array('controller' => 'ramens', 'action' => 'view', $shop['Ramen'][0]['id'])); ?>

                    <?php } ?>

                </td>

                <td>

                    <?php if (isset($shop['Ramen'][0])){ ?>
               
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
               // undefined offset:0→ 0っていう連想配列がない
                    ?>
                    <?php } ?>
                </td>

                <td>
                <?php if (isset($shop['Ramen'][0])){ ?>

                <?php 
                foreach ($areas as $area) {
                    if ($area['Area']['id'] == $shop['Ramen'][0]['area_id']) {
                        echo h($area['Area']['name']);
                        # code... name を表示する
                        break;
                    }
                }
                ?>
                <?php } ?>

               
                </td>

                </tr>


            <?php endforeach; ?>
            <?php unset($shop); ?>

  
            

        
                   
<!--     <?php //foreach ($ramens as $ramen):?>                            

                            <div style="float:left;">

                    
                                <img width="100" height="100" src="http://192.168.33.10/iloveramen/files/P<?php //echo str_pad($ramen['Ramen']['id'], 5, "0",STR_PAD_LEFT);?>">
                    

                            <h1><?php //echo h($ramen['Ramen']['name']); ?></h1>
                            <p><?php //echo h($ramen['Ramen']['description']); ?></p>
                            </div>

                            <?php //endforeach; ?>
                            <?php //unset($ramen); ?> -->
                    </table>

            </div>
        </div>
    </div>
</div>
          