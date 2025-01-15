<?php
    function current_date() {
        $date = date("d/m/Y");
        $pieces = explode("/", $date);

        return [
            'day' => $pieces[0],
            'month' => $pieces[1],
            'year' => $pieces[2],
            'format' => $date,
        ];
    }