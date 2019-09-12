<?php

function findAttributeByName($name, $attribute, $file)
{
    $str = file_get_contents('../data/' . $file . '.json');
    $json = json_decode($str, true);
    foreach ($json as $field => $value) {
        if ((string)$value['name'] == $name) {
            return $value[$attribute];
        }
    }
    return "ERR";
}

function findAttribute($id, $attribute, $file)
{
    $str = file_get_contents('../data/' . $file . '.json');
    $json = json_decode($str, true);
    foreach ($json as $field => $value) {
        if ((string)$value['id'] == $id) {
            return $value[$attribute];
        }
    }
    return "ERR";
}

function translateEvent($event){
    switch ($event){
        case 'Tor': return 'goal';
        case 'Gelb': return 'yellow';
        case 'Rot': return 'red';
        case 'Eigentor': return 'own';
        case 'Strafstoß': return 'penalty';
        case 'Foulspiel' : return 'foul';
        case 'Unsportlichkeit' : return 'unfairness';
        case 'Sonder' : return 'special';
        case 'Normal' : return 'normal';
        case '' : return 'normal';
    }
    return $event;
}