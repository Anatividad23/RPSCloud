<?php
namespace App\Services\Utility;

use Http\Client\Exception;

class DatbaseException implements Exception
{
    public function __construct($message,$code = 0,Exception $previous = null){
        parent::__construct($message,$code,$previous);
    }
}

