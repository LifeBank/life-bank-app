<?php

/**
 * @author Kunle Adedayo
 * 
 * VO Helper; Helper to convert an array to a class object [VO]
 */
if (!function_exists('row_to_vo')) {

    function row_to_vo($arrayToConvert, $VOType) {
        if (!(is_array($arrayToConvert)))
            return 'wrong format' . ' ' . $VOType;

        if (empty($arrayToConvert))
            return $arrayToConvert;
        $requiredPath = 'application/models/vo/' . $VOType . '.php';
        require_once($requiredPath);

        $voData = new $VOType();

        while (list ($keyChar, $val) = each($arrayToConvert)) {
            if (!is_numeric($keyChar))
                $voData->$keyChar = $val;
        }

        return $voData;
    }

}


if (!function_exists('resultset_to_vo')) {

    function resultset_to_vo($resultSet, $VOType) {
        $result = array();

        foreach ($resultSet as $row)
            $result[] = row_to_vo($row, $VOType);

        return $result;
    }

}
?>
