<?php require_once('style.php'); ?>
<style>

    .ct-social-link{
        padding: 10px;
        display: block;
        margin-bottom: 5px;
    }

</style>
<p style="font-weight: bold">

    <a href="https://www.facebook.com/<?php echo $data['id_1'] ?>" class="ct-social-link ct-social-facebook">
        <i class="fa fa-facebook"></i>
        <?php echo $data['label_1']; ?>
    </a>

    <a href="https://twitter.com/<?php echo $data['id_2'] ?>" class="ct-social-link ct-social-twitter">
        <i class="fa fa-twitter"></i>
        <?php echo $data['label_2']; ?>
    </a>
    
</p>