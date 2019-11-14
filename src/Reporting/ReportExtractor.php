<?php

namespace App\Reporting;

use App\Reporting\Format\HtmlFormatter;
use App\Reporting\Format\HtmlSpecialFormatter;
use App\Reporting\Format\jsonFormatter;

class ReportExtractor
{

    /**
     * Doit afficher l'ensemble des formats possibles pour un rapport en se servant
     * des formatters ajoutés dans le tableau
     *
     * @param Report $report
     *
     * @return array
     */
    public function process(Report $report): array
    {
        $results = [];

        $htmlFormatter = new HtmlFormatter;
        $htmlSpecialFormtatter = new HtmlSpecialFormatter;
        $JsonFormatter = new jsonFormatter;

        $results[] = $htmlFormatter->formatToHTML($report);
        $results[] = $JsonFormatter->formatToJSON($report);
        $results[] = $htmlSpecialFormtatter->formatToHtml($report);

        return $results;
    }
}
