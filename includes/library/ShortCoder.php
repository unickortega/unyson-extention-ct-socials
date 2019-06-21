<?php

 class ShortCoder
 {
     function renderPhpFile($path, $data){
        ob_start();
        require(__DIR__.'/../'.$path);
        $render = ob_get_clean();
        return $render;
     }

 }