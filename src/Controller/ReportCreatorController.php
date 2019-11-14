<?php

namespace App\Controller;

use App\Reporting\Format\HtmlFormatter;
use App\Reporting\Format\jsonFormatter;
use App\Reporting\Report;

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
        $report = new Report($date, $title, $data);

        if ($format === "html") {
            $formatter = new HtmlFormatter;
            $reportResult = $formatter->formatToHtml($report);
        } else {
            $formatter = new jsonFormatter;
            $reportResult = $formatter->formatToJson($report);
        }

        require_once(TEMPLATES_DIR . 'report-creator/result.html.php');
    }
}
