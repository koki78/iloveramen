<!-- File: /app/View/Posts/index.ctp -->

<?php //debug($posts); ?>

<h1>Blog categories</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($categories as $category): 
        //debug($post);

    ?>
    <tr>
        <td><?php echo $post['Category']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Category']['title'],
array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
        </td>
        <td><?php echo $post['Category']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>