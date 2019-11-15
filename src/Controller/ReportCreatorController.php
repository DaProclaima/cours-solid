<?php

namespace App\Controller;

use App\Reporting\Format\CsvFormatter;
// use App\Reporting\Format\HtmlFormatter;
use App\Reporting\Format\HtmlSpecialFormatter;
use App\Reporting\Format\jsonFormatter;
use App\Reporting\Report;
use App\Reporting\StringReport;
use Exception;

class ReportCreatorController
{
    public function show()
    {
        require_once(TEMPLATES_DIR . 'report-creator/show.html.php');
    }

    public function execute()
    {
        // Extraction des données, on fait au plus simple / rapide mais ce serait à revoir
        $date = $_POST['date'];
        $title = $_POST['title'];
        $data = $_POST['data'];
        $format = $_POST['format'];

        // Début de l'algorithme
        // $report = new Report($date, $title, $data);
        $report = new StringReport($date, $title, $data);


        // $csvFormatter = new CsvFormatter;
        // dd($csvFormatter->formatToCsv($report));

        // if ($format === "html") {
        //     $formatter = new HtmlFormatter;
        //     $reportResult = $formatter->format($report);
        // } elseif {
        //     $formatter = new jsonFormatter;
        //     $reportResult = $formatter->format($report);
        // }

        switch ($format) {
            case "html":
                $formatter = new HtmlSpecialFormatter;
                $reportResult = $formatter->format($report);
                break;
            
            case "json":
                $formatter = new JsonFormatter;
                $reportResult = $formatter->format($report);
                break;

            case "csv":
                $formatter = new CsvFormatter;
                $reportResult = $formatter->format($report);
                break;
            
            default:
                throw new Exception('Le format sélectionné n\'est pas disponible');
                break;
        }

        require_once(TEMPLATES_DIR . 'report-creator/result.html.php');
    }
}
