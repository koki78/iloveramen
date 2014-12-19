<!-- File: /app/View/Ramens/index.ctp -->


<?php //debug($posts); ?>

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Ramen', array('action' => 'add')); ?></p>

<?php echo $this->Html->link(
    'Add Ramen',
    array('controller' => 'Ramens', 'action' => 'add')
); ?>

<div style = "float:left;">
   
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
         <th>Action</th>
        <th>Category</th>
         <th>Thumbnail</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($ramens as $ramen): ?>
    <tr>
        <td><?php echo $ramen['Ramen']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($ramen['Ramen']['name'],
array('controller' => 'ramens', 'action' => 'view', $ramen['Ramen']['id'])); ?>
        </td>

        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $ramen['Ramen']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $ramen['Ramen']['id'])); ?>
        </td>

        <td><?php echo $this->Html->link($ramen['Ramen']['name'],array('controller'=>'ramens','action' =>'ranen_index',$ramen['Ramen']['id'])); ?></td>

        <td><img src="http://192.168.33.10/iloveramen/files/P<?php echo str_pad($ramen['Ramen']['id'], 5, "0",STR_PAD_LEFT);?>"></td>
        
        <td><?php echo $ramen['Ramen']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($ramen); ?>
</table>
</div>
 

 <?php //echo $this->element('toppage'); ?>

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




