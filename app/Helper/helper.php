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

function shift()
{
    $date = now()->format('H:i:s');
    if ($date >= '00:00:00' && $date <= '08:00:00') {
        return 1;
    } else if ($date >= '08:00:01' && $date <= '16:00:00') {
        return 2;
    } else {
        return 3;
    }
}
