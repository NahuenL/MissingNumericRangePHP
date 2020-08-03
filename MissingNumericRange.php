<?php
# Name: MissingNumericRange.php
# Author: NahuenL
# Web: https://github.com/NahuenL
# Update: 2020-08-03
# Version: 1.0.0
# Copyright (c) 2020 NahuenL

function MissingNumericRange($actual_ranges, $min_range, $max_range)
{
    $array_return = array();
    $r_count = 0;
    $r_len = count($actual_ranges);
    $first_max = 0;
    if ($r_len != 0) {
        foreach ($actual_ranges as $key => $range) {
            $ext = false;
            if ($r_count == 0) {
                $ext = true;
                if ($range["min"] > $min_range) {
                    array_push($array_return, array("id" => 0, "min" => $min_range, "max" => ($range["min"] - 1)));
                    $first_max = $range["max"];
                } else {
                    $first_max = $range["max"];
                }
            }
            if ($r_count == $r_len - 1) {
                $ext = true;
                if ($range["max"] < $max_range) {
                    array_push($array_return, array("id" => 0, "min" => ($range["max"] + 1), "max" => $max_range));
                    //$primer_maximo = $maximo;
                }


                $first_max = $first_max + 1;
                if ($first_max >= $range["min"]) {
                    $first_max = $range["max"];
                } else {//no existe rango
                    array_push($array_return, array("id" => 0, "min" => $first_max, "max" => ($range["min"] - 1)));
                    $first_max = $range["max"];
                }

            }
            if (!$ext) {
                $first_max = $first_max + 1;
                if ($first_max == $range["min"]) {
                    $first_max = $range["max"];
                } else {
                    array_push($array_return, array("id" => 0, "min" => $first_max, "max" => ($range["min"] - 1)));
                    $first_max = $range["max"];
                }
            }
            $r_count++;
        }
    } else {
        array_push($array_return, array("id" => 0, "min" => $min_range, "max" => $max_range));
    }
    array_multisort(array_column($array_return, 'min'), SORT_ASC, $array_return);
    return $array_return;
}





