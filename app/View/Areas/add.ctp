<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Area');
echo $this->Form->input('name');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>
