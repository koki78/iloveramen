<!-- File: /app/View/Posts/index.ctp -->

   
<?php //debug($posts); ?>

<h1>Blog posts</h1>
<h2>カテゴリー「<?php echo $selected_category[0]['Category']['name'];?>」の一覧</h2>

<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>

<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>

<div style = "float:left;">
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>


    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): 
        //debug($post);
    ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>

        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        </td>

        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
</div>

<div style = "float:right;">
<table>  
    <?php foreach ($categories as $category): 
        //debug($post);
    ?>
    <tr>
        <td>
            <?php
            if ($selected_category[0]['Category']['id']==$category['Category']['id']){
                echo $category['Category']['name'];
            }else{
             echo $this->Html->link($category['Category']['name'],
array('controller' => 'posts', 'action' => 'category_index',$category['Category']['id'])); 
                  }

?>
        </td>
    </tr>
        <?php endforeach; ?>
    <?php unset($category); ?>
</table>
</div>




