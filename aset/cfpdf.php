<?php if ( !defined('BASEPATH')) exit();
class Cfpdf
{
    function __construct()
    {
        require_once APPPATH.'/aset/fpdf/fpdf.php';
    }
}