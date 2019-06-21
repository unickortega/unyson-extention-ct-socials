<style>
.ct-facebook-feed-item{
    background: white;
    padding: 15px;
    border-radius: 15px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 9px 0 rgba(0,0,0,0.12);
    display: block;
    text-decoration: none!important;
    color: inherit!important;
}

.ct-facebook-feed-item .post-picture{
    width: 100%;
}

.ct-facebook-feed-item .created_date{
    color: gray;
}
</style>

<?php
$posts = $data['posts'];
foreach($posts as $post)
{
    ?>
    <a class="ct-facebook-feed-item" target="_blank" href="<?php echo $post->permalink_url ?>">
        <?php

        if(isset($post->from))
        {
            ?>
            <div>
                <b><?php echo $post->from->name; ?></b>
            </div>
            <?php
        }

        if(isset($post->message))
        {
            ?>
            <div>
                <?php echo $post->message; ?>
            </div>
            <?php
        }
        
        if(isset($post->full_picture))
        {
            ?>
            <div>
                <img class="post-picture" src="<?php echo $post->full_picture; ?>">
            </div>
            <?php
        }

        if(isset($post->name))
        {
            ?>
            <div>
                <?php echo $post->name; ?>
            </div>
            <?php
        }

        if(isset($post->created_time))
        {
            $time = strtotime($post->created_time);

            $newformat = date("F j, Y, g:i a",$time);
            ?>
            <div class="created_date">
                <?php echo $newformat; ?>
            </div>
            <?php
        }

        ?>
    </a>
    <?php
}

?>