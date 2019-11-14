<?php
namespace App\Reporting\Format;

use App\Reporting\Report;

class CsvFormatter {
    /**
     * Undocumented function
     *
     * @param Report $report
     * @return void
     */
    public function formatToCsv(Report $report)
    {
        $contents = $report->getContents();
        $data = implode(";", $contents['data']);
        unset($contents['data']);
        // dd($data);
        return implode(";", $contents). ";" . $data;
    }
}
