<?php

if (! function_exists('baseUrl')) {
    function baseUrl() {
        return config('app.base_url');
    }
}


if (! function_exists('adminUrl')) {
    function adminUrl() {
        return config('app.admin_subdomain') . '.' . baseUrl();
    }
}



if (! function_exists('redacUrl')) {
    function editorUrl() {
        return config('app.editor_subdomain') . '.' . baseUrl();
    }
}


if (!function_exists('myUrl')) {
    function myUrl()
    {
        return config('app.my_subdomain') . '.' . baseUrl();
    }
}
