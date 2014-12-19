<!-- File: /app/View/Areas/view.ctp -->

<h1><?php echo h($area['Area']['title']); ?></h1>

<p><small>Created: <?php echo $area['Area']['created']; ?></small></p>

<p><?php echo h($area['Area']['body']); ?> </p>