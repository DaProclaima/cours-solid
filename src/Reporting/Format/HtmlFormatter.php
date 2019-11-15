<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class HtmlFormatter {
    public function formatToHtml(Report $report){
    
        $contents = $report->getContents();

        $data = "";

        foreach ($contents['data'] as $value) {
            $data .= "<li>$value</li>";
        }

        return "
            <h2>{$contents['title']}</h2>
            <em>Date : {$contents['date']}</em>
            <h4>Données : </h4>
            <ul>
                $data
            </ul>
        ";
    }
}
// Do I have several reason to change this class? No, the SRP is respected now. The only reason why we might change the class is if I write the Json differently
