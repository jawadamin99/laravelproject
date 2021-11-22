<?php
if(!function_exists('admin_url'))
{
    function admin_url()
    {
        return env('ADMIN_URL','');
    }
}
