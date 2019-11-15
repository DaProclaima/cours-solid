<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class jsonFormatter implements FormatterInterface
 {
    public function format(Report $report) : string
     {

        return json_encode($report->getContents());

    }

    public function deserialize(string $str): Report
    {
        // { "title": "Mon titre", "date": "2019-02-02", "data": [5,6]} // str
        $contents = json_decode($str);

        return new Report($contents['date'], $contents['title'], $contents['data']);
    }
}
// The SRP is respected now. The only reason why we might change the class is if I write the Json differently
