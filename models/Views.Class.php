<?php
class Views {
    function getView($filename='', $results=array()) {
        include $filename;
    }
}
?>