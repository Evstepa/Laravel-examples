<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Log;
use Illuminate\Support\Facades\File;

class DataLogger
{
    // private $startTime;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $this->startTime = microtime(true);
        return $next($request);
    }

    public function terminate(Request $request): void
    {
        if (env('API_DATALOGGER', true)) {
            if (env('API_DATALOGGER_USE_BD')) {
                $endTime = microtime(true);
                $log = new Log();
                $log->time = gmdate('Y-m-d H:i:s');
                $log->duration = number_format($endTime - LARAVEL_START, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            } else {
                $endTime = microtime(true);
                $filename = 'api_datalogger_' . date('d-m-y') . '.log';
                $dataToLog = "Time: " . gmdate('Y-m-d H:i:s') . "\n";
                $dataToLog .= "Duration: " . number_format($endTime - LARAVEL_START, 3) . "\n";
                $dataToLog .= "IP address: " .  $request->ip() . "\n";
                $dataToLog .= "URL: " . $request->fullUrl() . "\n";
                $dataToLog .= "Method: " . $request->method() . "\n";
                $dataToLog .= "Input: " . $request->getContent() . "\n";
                File::append(
                    storage_path("logs" . DIRECTORY_SEPARATOR . $filename),
                    $dataToLog . "\n" . str_repeat("=", 20) . "\n\n"
                );
            }
        }
    }
}
