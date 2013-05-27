<?php foreach ($users as $user_item): ?>

    <h2><a href="view/<?php echo $user_item['id'] ?>"><?php echo $user_item['username'] ?></a></h2>
    <div id="main">
        <?php echo $user_item['email'] ?>
        <?php echo $user_item['admin'] ?>
    </div>
    <a href="update/<?php echo $user_item['id'] ?>">edit	</a>

    <a href="delete/<?php echo $user_item['id'] ?>">delete</a>

<?php endforeach ?>

<!--<p><a href="create">create</a></p>-->