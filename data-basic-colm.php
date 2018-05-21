<?php
    $con = mysql_connect("localhost","root","");

    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("si_pkl", $con);

    $result = mysql_query("select tahun, count(tahun) as jumlah from prestasi group by tahun");

    $bln = array();
    $bln['name'] = 'tahun';
    $rows['name'] = 'Jumlah';
    while ($r = mysql_fetch_array($result)) {
        $bln['data'][] = $r['tahun'];
        $rows['data'][] = $r['jumlah'];
    }
	$rslt = array();
	array_push($rslt, $bln);
	array_push($rslt, $rows);
	print json_encode($rslt, JSON_NUMERIC_CHECK);

	mysql_close($con);


