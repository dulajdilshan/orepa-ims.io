<?php  if (count($errors) > 0) : ?>
    <div class="form-group">
        <?php foreach ($errors as $error) : ?>
            <p align="left" class="form-control" style="color: darkred;margin: 1px 0 0 0;height:fit-content;font-size: 12px"><?php echo $error ?></p>
        <?php endforeach ?>
    </div>

<?php  endif ?>