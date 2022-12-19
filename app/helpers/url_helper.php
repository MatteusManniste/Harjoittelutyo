<?php

function redirect($page)
{
    header('Location: ' . URLROOT . '/' . $page);
}

function redirectIndex()
{
    header('Location: ' . URLROOT . '/');
}
