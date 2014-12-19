<!-- File: /app/View/categories/index.ctp -->

<?php //debug($posts); ?>

<h1>Categories</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($categories as $category): 
        //debug($post);

    ?>
    <tr>
        <td><?php echo $category['Category']['id']; ?></td>

        <td><?php echo $category['Category']['name']; ?></td>

        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $category['Category']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $category['Category']['id'])); ?>
        </td>

        <td><?php echo $category['Category']['created']; ?></td>
    </tr>

    <?php endforeach; ?>
    <?php unset($category); ?>
</table>
