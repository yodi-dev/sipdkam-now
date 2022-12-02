<?php
function format_tanggal($value)
{
    return date('d/m/Y H:i', strtotime($value));
}
