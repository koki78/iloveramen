<!-- File: /app/View/Users/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('group_id');

echo $this->Form->end('Save Post');
?>