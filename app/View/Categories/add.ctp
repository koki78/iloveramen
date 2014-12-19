<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Category</h1>
<?php
echo $this->Form->create('Category');
echo $this->Form->input('name');
echo $this->Form->input('body', array('rows' => '3'));

//下のendの文章はこれでもOK!
//echo $this->Form->input('Save Post', array('type' => 'submit'));
//cdho $this->Form->end();
echo $this->Form->end('Save Category');
?>