<!-- File: /app/View/Ramens/index.ctp -->


<?php //debug($posts); ?>

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Info', array('action' => 'add')); ?></p>

<?php echo $this->Html->link(
    'Add Info',
    array('controller' => 'Infos', 'action' => 'add')
); ?>

<div style = "float:left;">
   
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
         <th>Info</th>
        <th>Created</th>
        <th>Modified</th>
    </tr>


    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($infos as $info): ?>
    <tr>
        <td><?php echo $info['Info']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($info['Info']['name'],
array('controller' => 'infos', 'action' => 'view', $info['Info']['id'])); ?>
        </td>

        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $info['Info']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $info['Info']['id'])); ?>
        </td>

        <td><?php echo $this->Html->link($info['Info']['name'],array('controller'=>'infos','action' =>'ranen_index',$info['Info']['id'])); ?></td>

        <td><?php echo $info['Info']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($info); ?>
</table>
</div>
<!--  <?php //echo $this->element('bottom_menu'); ?> -->

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




