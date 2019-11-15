<?php
namespace App\Reporting\Format;

use App\Reporting\Report;

class CsvFormatter implements FormatterInterface //, DeserializerInterface
 {
    /**
     * Undocumented function
     *
     * @param Report $report
     * @return void
     */
    public function format(Report $report) : string
    {
        $contents = $report->getContents();
        $data = implode(";", $contents['data']);
        unset($contents['data']);
        // dd($data);
        return implode(";", $contents). ";" . $data;
    }

    // /**
    //  * Undocumented function
    //  *
    //  * @param string $str
    //  * @return Report
    //  */
    // public function deserialize(string $str) : Report
    // {
    //     //  "titre;date;5;6"
    //     $contents = explode(";", $str);
    //     // ["titre", "date", 5, 6]
    //     $data = [
    //         $contents[2],
    //         $contents[3]
    //     ];

    //     return new Report($contents[1], $contents[0], $data);
    // }
}
