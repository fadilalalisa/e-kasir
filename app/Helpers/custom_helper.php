<?php 

function auth($key) {
    return session()->get('user')[$key];
}

function getUri() {
    $uri = service('uri');
    return $uri->getSegment(1);
}