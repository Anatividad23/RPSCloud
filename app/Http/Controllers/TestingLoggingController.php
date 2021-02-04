<?php

namespace App\Http\Controllers;

use App\Services\Utility\ILoggerService;

class TestingLoggingController extends Controller
{
   
    public function __construct(ILoggerService $logger)
    {
        $this->logger = $logger;
    }
    
    public function index()
    {
        echo "In index()<br/>";
        $this->logger->info("Entering TestLoggingController.index()");
        echo "Out of index()";
    }
    
}