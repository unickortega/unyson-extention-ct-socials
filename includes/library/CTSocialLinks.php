<?php

require_once 'ShortCoder.php';

 class CTSocialLinks extends ShortCoder
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
         add_shortcode('ct_socials', array( $this, 'register_ct_socials_shortcodes' ));
     }


     /**
      * Generate html
      */
     function register_ct_socials_shortcodes($atts)
     {
        $options = shortcode_atts( array(
            'style' => 'horizontal-small',
            'type_1' => 'facebook',
            'label_1' => 'Facebook',
            'id_1' => 'createIT',
            'type_2' => 'twitter',
            'label_2' => 'Check out twitter',
            'id_2' => 'createit'
        ), $atts );

        switch($options['style']){
            case 'horizontal-small':
                return $this->renderPhpFile('/views/links/horizontal-small.php', $options);
            break;
            case 'horizontal-large':
                return $this->renderPhpFile('/views/links/horizontal-large.php', $options);
            break;
            case 'vertical-small':
                return $this->renderPhpFile('/views/links/vertical-small.php', $options);
            break;
            case 'vertical-large':
                return $this->renderPhpFile('/views/links/vertical-large.php', $options);
            break;
            default:
                return "shorcode invalid";
        }
     }
 }