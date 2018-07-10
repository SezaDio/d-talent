<?php

function displayDate($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('d F Y', strtotime($date));
    }
    else{
        return "-";
    }
}

function displayMonthYear($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('Y-m', strtotime($date));
    }
    else{
        return "";
    }
}

function displayMonth($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('m', strtotime($date));
    }
    else{
        return "";
    }
}

function displayMonthName($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('M', strtotime($date));
    }
    else{
        return "";
    }
}

function displayYear($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('Y', strtotime($date));
    }
    else{
        return "";
    }
}

function displayCVWorkDate($work_start, $work_end)
{
    if ($work_start != '0000-00-00' && $work_end != '0000-00-00') {
        return date('F Y', strtotime($work_start)) . " - " . date('F Y', strtotime($work_end));
    }
    elseif ($work_start != '0000-00-00' && $work_end == '0000-00-00'){
    	return date('F Y', strtotime($work_start)) . " - ...";
    }
    else{
        return "-";
    }
}

function displayCVEducationDate($start_date, $end_date)
{
    if ($start_date != '0000-00-00' && $end_date != '0000-00-00') {
        return date('Y', strtotime($start_date)) . " - " . date('Y', strtotime($end_date));
    }
    elseif ($start_date != '0000-00-00' && $end_date == '0000-00-00'){
        return date('Y', strtotime($start_date)) . " - ...";
    }
    else{
        return "-";
    }
}

function capitalizeEachWord($string)
{
    $string = strtolower($string);
    $string = ucwords($string);
    return $string;
}

function countAge($birthday)
{
    $from = new DateTime($birthday);
    $to   = new DateTime('today');
    return $from->diff($to)->y;
}

function displaySkills($string)
{
    if ($string == "") {
        return "";
    }

    $array = explode(',', $string);
    foreach ($array as $key => $value) {
        echo '<span class="label">'. $value .'</span> ';
    }
}

function displayGender($gender)
{
    if ($gender == 0) {
        return "Perempuan";
    }
    else{
        return "Laki-laki";
    }
}

function displayMaritalStatus($status)
{
    if ($status == 0) {
        return "Belum menikah";
    }
    else{
        return "Sudah menikah";
    }
}

function displayCompanyUpdateStatus($status)
{
    if ($status == 0) {
        return "Konsep";
    }
    else{
        return "Terbit";
    }
}
