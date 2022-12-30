<?php
    function thousandComma($value){
        return number_format($value, 0, ".", ",");
    }

    function ddmmyyyy($value){
        return date("d-m-Y", strtotime($value));
    }

    function ddmmyyyy_now(){
        return date("d-m-Y");
    }

    function yyyymmdd_now(){
        return date("Y-m-d");
    }
