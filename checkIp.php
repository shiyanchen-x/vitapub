<?php
//要检查的ip
$ip = '192.168.43.18';
//ip名单
$ip_list = ['117.20.43.58', '117.*.43.58', '117.20.*.*', '198.32.43.*', '34.88.201.205', '192.168.*.18', '158.20.11.22',  '217.20.45.66'];

public function checkip($ip, $ip_list)
{
    //检查ip
    if (in_array($ip, $ip_list)) {
        return '存在' ;
    }

    //检查包含*的情况
    $ips = explode('.', $ip);
    foreach ($ip_list as $row) {
        if (strpos($row, '*') === false) {
            continue;
        }
        $rows = explode('.', $row);
        foreach ($ips as $key => $val) {
            if ($rows[$key] != '*' && $rows[$key] != $val) {
                continue 2;
            }
            if ($key == 3) {
                return '存在';
            }
        }
    }
    return '不存在';
}