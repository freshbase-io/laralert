<?php

namespace FreshbaseIo\Laralert\Console;

use CURLFile;
use Illuminate\Console\Command;

class UpdateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laralert:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send updated Composer files to Laralert for security analysis.';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $composerJson = base_path('composer.json');
        $composerLock = base_path('composer.lock');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.freshbase.io/u/be3cdaa3-8c88-467d-b1f7-7abe004c674f');
        curl_setopt($ch, CURLOPT_POST, 1);
        $fields = [
            'cj' => new CurlFile($composerJson, 'text/plain', 'composer.json'),
            'cl' => new CurlFile($composerLock, 'text/plain', 'composer.lock'),
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
