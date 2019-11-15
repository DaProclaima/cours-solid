<?php

namespace App\Reporting;

use App\Reporting\Format\FormatterInterface;


class ReportExtractor
{

    protected $formatters = [];

    // public function addHtmlFormatter(HtmlFormatter $htmlFormatter) {
    //     $this->formatters[] = $htmlFormatter;
    // }

    // public function addJsonFormatter(jsonFormatter $jsonFormatter) {
    //     $this->formatters[] = $jsonFormatter;
    // }

    // public function addCsvFormatter(CsvFormatter $csvFormatter) {
    //     $this->formatters[] = $csvFormatter;
    // }

    public function addFormatter(FormatterInterface $formatter) {
        $this->formatters[] = $formatter;
    }
    
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

        // $htmlFormatter = new HtmlFormatter;
        // $htmlSpecialFormtatter = new HtmlSpecialFormatter;
        // $JsonFormatter = new jsonFormatter;

        // $results[] = $htmlFormatter->format($report);
        // $results[] = $JsonFormatter->format($report);
        // $results[] = $htmlSpecialFormtatter->format($report);

        foreach($this->formatters as $formatter) {
            $results[] = $formatter->format($report);
        }

        return $results;
    }
}
