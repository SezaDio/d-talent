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

function displayMonthName($month)
{
    if ($month != null && $month != '') {
        // return date('M', strtotime($date));
        switch ($month) {
            case 1:
                return "January";
                break;
            case 2:
                return "February";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
        }
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

/*function displayMonth($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('m', strtotime($date));
    }
    else{
        return "";
    }
}*/

/*function displayYear($date)
{
    if ($date != null && $date != '' && $date != '0000-00-00') {
        return date('Y', strtotime($date));
    }
    else{
        return "";
    }
}*/

/*function displayCVEducationDate($start_date, $end_date)
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
}*/

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

/* Company Job Vacancy */
function displayApplyDate($start_date, $end_date)
{
    if ($start_date != null && $start_date != '' && $start_date != '0000-00-00') {
        return date('d M', strtotime($start_date)) . ' - ' . date('d M Y', strtotime($end_date));
    }
    else{
        return "-";
    }
}

function displayRequiredSkills($string)
{
    if ($string == "") {
        return "";
    }

    $array = explode(',', $string);
    foreach ($array as $key => $value) {
        echo "<li>". $value ."</li>";
    }
}

/* Company Job Notification */
function displayNotificatioonStatus($status)
{
    //  1 accept, 2 decline, 3 expired, 0 menunggu
    switch ($status) {
        case 0:           
            return '<span class="label label-info">Menunggu</span>';
            break;
        case 1:           
            return '<span class="label label-success">Menerima</span>';
            break;
        case 2:           
            return '<span class="label label-danger">Menolak</span>';
            break;
        case 3:           
            return '<span class="label label-warning">Kadaluarsa</span>';
            break;
        
        default:
            return '';
            break;
    }
}