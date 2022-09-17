<?php $errors = array(); ?>

<?php if (count($errrs) > 0) : ?>
    <div class="error">
         <?php foreach ($errors as $error) : ?>    
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
<?php endif ?>