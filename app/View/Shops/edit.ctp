<!-- File: /app/View/Shops/edit.ctp -->

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Shop');
echo $this->Form->input('name');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>