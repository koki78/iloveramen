<!-- File: /app/View/Ramens/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Ramen',array('enctype' => 'multipart/form-data'));
echo $this->Form->input('shop_id',array('options'=>$shops));
echo $this->Form->input('category_id',array('options'=>$categories));
echo $this->Form->input('area_id',array('options'=>$areas));
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('upfile', array('type' => 'file'));
echo $this->Form->end('Save Post');

?>
