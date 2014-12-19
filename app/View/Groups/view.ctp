<!-- File: /app/View/groups/view.ctp -->

<h1><?php echo h($group['Group']['title']); ?></h1>

<p><small>Created: <?php echo $group['Group']['created']; ?></small></p>

<p><?php echo h($group['Group']['body']); ?></p>