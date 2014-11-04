<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Category']['title']); ?></h1>

<p><small>Created: <?php echo $post['Category']['created']; ?></small></p>

<p><?php echo h($post['Category']['body']); ?> </p>