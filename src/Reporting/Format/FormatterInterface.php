<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

// A contract between this interface and the classes using it force them to use its methods
interface FormatterInterface {
    public function format(Report $report) : string;
    public function deserialize(string $string ) : Report;
}
