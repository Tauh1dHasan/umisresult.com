<?php

    
    function conver_to_bn_number($number)
    {
        $numbers = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
        return strtr($number,$numbers);
    }
    
    function conver_to_bn_date($data)
    {
        $numbers = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
        $return_data = '';
        if ($data) {
            foreach (str_split($data) as $key => $value) {
                if (is_numeric($value)) {
                    $return_data = $return_data.''.strtr($value,$numbers);
                } else {
                    $return_data = $return_data.''.$value;
                }
            }
            return $return_data;
        }
        return '-';
    }


