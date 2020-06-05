<?php
function number_format_short( $n, $precision = 1 ) {
    $rp = 'Rp ';
    if ($n < 1000) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = ',-';
    } else if ($n < 1000000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        if ($n % 1000 == 0){
            $suffix = '.000,-';
        } else {
            $suffix = '00,-';
        }
    } else if ($n < 1000000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        if ($n % 1000000 == 0){
            $suffix = '.000.000,-';
        } else {
            $suffix = '00.000,-';
        }
    } else if ($n < 1000000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        if ($n % 1000000000 == 0){
            $suffix = '.000.000.000,-';
        } else {
            $suffix = '00.000.000,-';
        }
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        if ($n % 1000000000000 == 0){
            $suffix = '.000.000.000.000,-';
        } else {
            $suffix = '00.000.000.000,-';
        }
    }
 
    if ( $precision > 0 ) {
        $dotzero = '.' . str_repeat( '0', $precision );
        $n_format = str_replace( $dotzero, '', $n_format );
    }
 
    return $rp . $n_format . $suffix;
}