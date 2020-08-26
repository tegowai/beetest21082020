<?php
namespace Core;
class View{
    function generate($content_view, $template_view, $data = null, $page = 1){
        include 'application/views/'.$template_view;
    }
}
