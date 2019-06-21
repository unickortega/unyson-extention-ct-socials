<?php
function ct_socials_facebook_customize_register( $wp_customize )
{
    $wp_customize->add_section( 'ct_social_facebook_credentials', array(
        'title' => __( 'CT Social Credentials Facebook' ),
        'description' => __( 'Please fill credentials for the api credentials.' ),
        'priority' => 160,
      ) );

    $wp_customize->add_setting( 'facebook_id', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'transport' => 'postMessage',
      ) 
    );

    $wp_customize->add_setting( 'facebook_access_token', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'transport' => 'postMessage',
      ) 
    );

    $wp_customize->add_control( 'facebook_id', array(
        'priority' => 1, // Within the section.
        'section' => 'ct_social_facebook_credentials', // Required, core or custom.
        'label' => __( 'Id' ),
      ) 
    );

    $wp_customize->add_control( 'facebook_access_token', array(
        'priority' => 2, // Within the section.
        'section' => 'ct_social_facebook_credentials', // Required, core or custom.
        'label' => __( 'Access Token' ),
      ) 
    );
}

function ct_socials_twitter_customize_register( $wp_customize )
{
    $wp_customize->add_section( 'ct_social_twitter_credentials', array(
        'title' => __( 'CT Social Credentials Twitter' ),
        'description' => __( 'Please fill credentials for the api credentials.' ),
        'priority' => 160,
      ) );

    $wp_customize->add_setting( 'twitter_consumer_key', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'transport' => 'postMessage',
      ) 
    );

    $wp_customize->add_setting( 'twitter_consumer_key_secret', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'transport' => 'postMessage',
      ) 
    );

    $wp_customize->add_control( 'twitter_consumer_key', array(
        'priority' => 1, // Within the section.
        'section' => 'ct_social_twitter_credentials', // Required, core or custom.
        'label' => __( 'Consumer API Key' ),
      ) 
    );

    $wp_customize->add_control( 'twitter_consumer_key_secret', array(
        'priority' => 2, // Within the section.
        'section' => 'ct_social_twitter_credentials', // Required, core or custom.
        'label' => __( 'Consumer API Key Secret' ),
      ) 
    );

    // access Tokens

    $wp_customize->add_setting( 'twitter_access_token', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'transport' => 'postMessage',
      ) 
    );

    $wp_customize->add_setting( 'twitter_access_token_secret', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'transport' => 'postMessage',
      ) 
    );

    $wp_customize->add_control( 'twitter_access_token', array(
        'priority' => 3, // Within the section.
        'section' => 'ct_social_twitter_credentials', // Required, core or custom.
        'label' => __( 'Access Token' ),
      ) 
    );

    $wp_customize->add_control( 'twitter_access_token_secret', array(
        'priority' => 4, // Within the section.
        'section' => 'ct_social_twitter_credentials', // Required, core or custom.
        'label' => __( 'Access Token Secret' ),
      ) 
    );
}

add_action( 'customize_register', 'ct_socials_facebook_customize_register' );
add_action( 'customize_register', 'ct_socials_twitter_customize_register' );