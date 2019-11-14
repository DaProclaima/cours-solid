<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class jsonFormatter {
    public function formatToJson(Report $report) {

        return json_encode($report->getContents());

    }
}
// The SRP is respected now. The only reason why we might change the class is if I write the Json differently
