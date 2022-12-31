<?php
function format_tanggal($value)
{
    return date('d/m/Y', strtotime($value));
}
