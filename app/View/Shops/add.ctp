<!-- File: /app/View/Shops/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Shop',array('enctype' => 'multipart/form-data'));
echo $this->Form->input('name');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('upfile', array('type' => 'file'));
echo $this->Form->end('Save Post');
?>
