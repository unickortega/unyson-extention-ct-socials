<style>
.ct-twitter-feed-item{
    background: white;
    padding: 15px;
    border-radius: 15px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 9px 0 rgba(0,0,0,0.12);
    display: block;
    text-decoration: none!important;
    color: inherit!important;
}

.ct-twitter-feed-item .post-picture{
    width: 100%;
}

.ct-twitter-feed-item .auth-info img{
    vertical-align: middle;
    height: 40px;
    width: 40px;
    border-radius: 50%;
}

.ct-facebook-feed-item .created_date{
    color: gray;
}
</style>

<?php
$tweets = $data['tweets'];
foreach($tweets as $tweet)
{
    ?>
    <script>console.log(JSON.parse('<?php echo addslashes(json_encode($tweet)); ?>'))</script>
    <div class="ct-twitter-feed-item">
        <?php

        if(isset($tweet->user))
        {
            ?>
            <div class="auth-info">
                <img src="<?php echo $tweet->user->profile_image_url_https; ?>">
                <b><?php echo $tweet->user->name; ?></b>
            </div>
            <?php
        }

        if(isset($tweet->text))
        {
            ?>
            <div>
                <?php echo $tweet->text; ?>
            </div>
            <?php
        }
        
        if(isset($tweet->entities->media[0]))
        {
            ?>
            <div>
                <img class="post-picture" src="<?php echo $tweet->entities->media[0]->media_url_https; ?>">
            </div>
            <?php
        }

        if(isset($tweet->name))
        {
            ?>
            <div>
                <?php echo $tweet->name; ?>
            </div>
            <?php
        }

        if(isset($tweet->created_at))
        {
            $time = strtotime($tweet->created_at);

            $newformat = date("F j, Y, g:i a",$time);
            ?>
            <div class="created_date">
                <?php echo $newformat; ?>
            </div>
            <?php
        }

        ?>
    </div>
    <?php
}

?>