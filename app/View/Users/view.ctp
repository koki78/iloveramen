<!-- File: /app/View/users/view.ctp -->

<h1><?php echo h($post['User']['name']); ?></h1>

<p><small>Created: <?php echo $post['User']['created']; ?></small></p>

<p><?php echo h($post['User']['body']); ?></p>