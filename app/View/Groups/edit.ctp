<!-- File: /app/View/Group/edit.ctp -->

<h1>Edit Category</h1>


<?php
echo $this->Form->create('Group');
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Group');
?>