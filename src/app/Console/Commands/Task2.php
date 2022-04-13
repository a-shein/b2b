<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Task2 extends Command
{
    protected $signature = 'command:task2';
    protected $description = 'task2';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $string = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';
        $this->stringWorker($string);
    }

    /**
     * @param string $string
     * @return string
     */
    protected function stringWorker(string $string): string
    {
        $firstIteration = explode('?', $string);

        $secondIteration = explode('&',$firstIteration[1]);

        $tempArray = [];
        foreach ($secondIteration as $elem) {
            $tempArray[] = explode('=', $elem);
        }

        $keysArray = [];
        $valuesArray = [];
        foreach ($tempArray as $tempElem) {
            $keysArray[] = $tempElem[0];
            $valuesArray[] = $tempElem[1];
        }

        $associativeArray = array_combine($keysArray, $valuesArray);

        foreach ($associativeArray as $key => $value) {
            if ($value == 3) {
                unset($associativeArray[$key]);
            }
        }

        asort($associativeArray, SORT_REGULAR);

        $startString = str_replace(['index.html', 'param1=4&param2=3&param3=2&param4=1&param5=3'], '', $string);
        $lollString = 'url=%2Ftest%2Findex.html';

        $middleString = '';
        foreach ($associativeArray as $key => $value) {
            $middleString .= $key . '=' . $value . '&';
        }

        $resultString = $startString . $middleString . $lollString;

        return $resultString;
    }
}
