<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog groups</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($groups as $group): ?>
    <tr>
        <td><?php echo $group['Group']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($group['Group']['name'],
array('controller' => 'groups', 'action' => 'view', $group['Group']['id'])); ?>
        </td>
        <td><?php echo $group['Group']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($group); ?>
</table>