<!-- File: /app/View/Ramens/index.ctp -->


<?php //debug($posts); ?>

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Area', array('action' => 'add')); ?></p>

<?php echo $this->Html->link(
    'Add Area',
    array('controller' => 'Areas', 'action' => 'add')
); ?>

<div style = "float:left;">
   
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
         <th>Action</th>
        <th>Category</th>
        <th>Created</th>
    </tr>


    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($areas as $area): ?>
    <tr>
        <td><?php echo $area['Area']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($area['Area']['title'],
array('controller' => 'areas', 'action' => 'view', $area['Area']['id'])); ?>
        </td>

        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $area['Area']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $area['Area']['id'])); ?>
        </td>

        <td><?php echo $this->Html->link($area['Area']['name'],array('controller'=>'areas','action' =>'ranen_index',$area['Area']['id'])); ?></td>

        <td><?php echo $area['Area']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($area); ?>
</table>
</div>
 <?php echo $this->element('rightside_menu'); ?>

<!-- <div style = "float:right;">
    <?php //echo $this->element('rightside_menu'); ?>
<table>  
    <?php //foreach ($categories as $category): 
        //debug($post);
    ?>
    <tr>
        <td>
            <?php //echo $this->Html->link($category['Category']['name'],
//array('controller' => 'posts', 'action' => 'category_index',$category['Category']['id'])); ?>
        </td>
    </tr>
        <?php //endforeach; ?>
    <?php //unset($category); ?>
</table>
</div> -->




