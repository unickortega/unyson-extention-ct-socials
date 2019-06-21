<?php

require_once 'ShortCoder.php';
require 'twitteroauth-1.0.1/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

 class CTSocialFeeder extends ShortCoder
 {
    function __construct()
    {
        $this->createShortCodes();
    }

    /**
     * This is for registering shorcodes
    */
    function createShortCodes()
    {
        add_shortcode('ct_facebook', array( $this, 'register_facebook_feed_shortcode' ));
        add_shortcode('ct_twitter', array( $this, 'register_twitter_feed_shortcode' ));
    }


    /**
     * Generate html
    */
    function register_facebook_feed_shortcode($atts)
    {
        $options = shortcode_atts( array(
            'limit' => '15',
        ), $atts );
        
        $response = json_decode(wp_remote_get( 'https://graph.facebook.com/v3.3/'.get_option('facebook_id').'/posts?access_token='.get_option('facebook_access_token', '').'&limit='.$options['limit'].'&debug=all&format=json&method=get&pretty=0&suppress_http_code=1&transport=cors&fields=full_picture,picture,message,created_time,permalink_url,name,from')['body']);


        if($response->error){
            return '<p>Oops there is an error! Please make sure your access token and ID are valid. <br>'.$response->error->message.'</p>';
        }

        $posts = $response->data;

        // render posts
        return $this->renderPhpFile('/views/feeds/facebook.php', compact('posts'));
    }

    /**
     * Generate html
    */
    function register_twitter_feed_shortcode($atts)
    {
        $options = shortcode_atts( array(
            'limit' => '15',
        ), $atts );

        $connection = new TwitterOAuth(get_option('twitter_consumer_key'), get_option('twitter_consumer_key_secret'), get_option('twitter_access_token'), get_option('twitter_access_token_secret'));
        $content = $connection->get("account/verify_credentials");

        $tweets = $connection->get("statuses/user_timeline", ["count" => $options['limit'], "exclude_replies" => true]);

        // render tweets
        return $this->renderPhpFile('/views/feeds/twitter.php', compact('tweets'));
    }
 }