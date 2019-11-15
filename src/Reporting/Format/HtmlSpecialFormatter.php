<?php
namespace App\Reporting\Format;

use App\Reporting\Report;

// Inherits of HtmlFormatter implementing FormatterInterface
class HtmlSpecialFormatter extends HtmlFormatter
 {
    public function format( Report $report)  : string
    {
        $html = parent::formatToHtml($report);
        return '
            <div style = "font-weight: bold">
                '. $html . '
            </div>
    
        ';
    }
}
