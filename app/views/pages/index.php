<?php require APPROOT . '/views/inc/header.php' ?>
<h1> <?php echo $data['Title'] ?> </h1>
<ul>
    <?php foreach ($data['Users'] as $user) : ?>
        <li>
            <?php echo $user->name ?>
        </li>
    <?php endforeach ?>
</ul>



<?php require APPROOT . '/views/inc/footer.php' ?>