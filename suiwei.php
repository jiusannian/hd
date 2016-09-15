<html>
<head>
 <title>潮安水位流量</title>
<style type="text/css">
	.grey:hover{ background-color: #ccc; }
</style>
</head>
<body>
<?php
	$url = 'http://www.gdsw.gov.cn/hfc_forcast/data/81500650.html';
	//$url = 'http://www.gdsw.gov.cn/hfc_forcast/data/81500450.html';
	$html = file_get_contents($url);
	//print_r($html);
	$reg = '/var line1\=\[(.*?)\]\;/';
	$reg2 = '/var line2\=\[(.*?)\]\;/';
	preg_match_all($reg, $html, $array,PREG_PATTERN_ORDER);
	preg_match_all($reg2, $html, $array2,PREG_PATTERN_ORDER);
    //print_r($array[0]);
    //print_r($array[1]);
    //var_dump($array2[0]);

    preg_match_all("/\[(.*?)\],/", $array[1][0], $time_ifo,PREG_PATTERN_ORDER);
    preg_match_all("/\[(.*?)\],/", $array2[1][0], $time_ifo2,PREG_PATTERN_ORDER);
    //var_dump($time_ifo[1]);
    $Index = $time_ifo[1];
    $Index2 = $time_ifo2[1];
    echo '<table width="600" height="23" border="1" style="margin: 0 auto;">';
    echo '<tr>';
    echo '<th colspan="2">水位</th>';
    echo '<th colspan="2">流量</th>';
    echo '</tr>';
	echo '<tr>';
    echo '<th>时间</th>';
    echo '<th>单位(m)</th>';
    echo '<th>时间</th>';
    echo '<th>单位(m<sup>3</sup>)</th>';
    echo '</tr>';
	foreach ($Index as $key => $value) {
		echo '<tr class="grey">';
		
		//print($map = {$Index[$key]:$value});
		$info = explode(",",$value);
		$info2 = explode(",",$Index2[$key]);
		foreach ($info as $val) {
			echo '<td align="center">'.$val.'</td>';
		}
		foreach ($info2 as $val2) {
			echo '<td align="center">'.$val2.'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
?>
</body>
</html>