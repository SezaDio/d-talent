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
