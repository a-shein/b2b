<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Task2 extends Command
{
    protected $signature = 'command:task2';
    protected $description = 'task2';

    /**
     * @return void
     */
    public function handle(): void
    {
        $url = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';

        $urlToArray = parse_url($url);
        $scheme = $urlToArray['scheme'];
        $host = $urlToArray['host'];
        $path = $urlToArray['path'];
        $query = $urlToArray['query'];

        $params = $this->removeSortAndGetParams($query);
        $pathToString = $this->pathToString($path);

        $newUrl = empty($scheme) ? '' : $scheme . '://';
        $newUrl = $newUrl . $host . '/?' . $params . '&url=' . $pathToString;

        echo $newUrl . PHP_EOL;
    }

    /**
     * @param string $params
     * @return string
     */
    protected function removeSortAndGetParams(string $params): string
    {
        $data = explode('&', $params);

        $paramsWithoutTree = [];

        foreach ($data as $param) {
            list(, $value) = explode('=', $param);

            if ($value != 3) {
                $paramsWithoutTree[$value] = $param;
            }
        }

        ksort($paramsWithoutTree);

        return implode('&', $paramsWithoutTree);
    }

    /**
     * @param string $path
     * @return string
     */
    protected function pathToString(string $path): string
    {
        return str_replace('/', '%2F', $path);
    }
}
