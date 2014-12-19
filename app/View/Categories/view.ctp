<!-- File: /app/View/Categoris/view.ctp -->

<h1><?php echo h($category['Category']['title']); ?></h1>

<p><small>Created: <?php echo $category['Category']['created']; ?></small></p>

<p><?php echo h($category['Category']['body']); ?> </p>