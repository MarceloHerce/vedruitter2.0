<?php
function findUserById($users, $id){
    foreach($users as $el){
        if($el->id == $id){
            return $el;
        }
    }
}



?>