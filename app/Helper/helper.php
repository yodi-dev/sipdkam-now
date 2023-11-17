<?php
function format_tanggal($value)
{
    return date('d/m/Y', strtotime($value));
}

function tanggal($value)
{
    return date('Y/m/d', strtotime($value));
}

function cuma_tanggal($value)
{
    return date('d', strtotime($value));
}

function bulan_now()
{
    return now()->format('M');
}

function bulan_angka()
{
    return now()->format('m');
}

function tanggal_now()
{
    return now()->format('d');
}



function tahun_now()
{
    return now()->format('Y');
}

function tgl()
{
    return now()->format('d-M-Y');
}
