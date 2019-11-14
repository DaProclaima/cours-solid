<?php

namespace App\Reporting;

class Report
{
    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var array
     */
    protected $data;


// In future a report might contain also an author. So its structure might change as well as its constructor. 1st reason why we should modify this class




    /**
     * Constructeur qui reçoit la date et le titre du rapport
     *
     * @param string $date
     * @param string $title
     */
    public function __construct(string $date, string $title, array $data)
    {
        $this->date  = $date;
        $this->title = $title;
        $this->data = $data;
    }

    /**
     * Retourne le rapport formatté en HTML
     *
     * @return string
     */
    public function formatToHTML(): string
    {
        $data = "";

        foreach ($this->data as $value) {
            $data .= "<li>$value</li>";
        }

        return "
            <h2>$this->title</h2>
            <em>Date : $this->date</em>
            <h4>Données : </h4>
            <ul>
                $data
            </ul>
        ";
    }

// In future the html template might change as switching from h2 to h1 etc. 2nd reason why to change this class 

    /**
     * Retourne le rapport formatté en JSON
     *
     * @return string
     */
    public function formatToJSON(): string
    {
        return json_encode($this->getContents());
    }

    /**
     * Retourne un tableau associatif contenant la date et le titre du rapport
     * Indice : tiens tiens, on pourrait donc récupérer ces données depuis l'extérieur ?
     */
    public function getContents()
    {
        return [
            'date'  => $this->date,
            'title' => $this->title,
            'data' => $this->data
        ];
    }
}

// In future the json template might change as adding the new attributes we give to a report structure. 3rd reason why to change this class.
// We don t respect the SRP since this class has 3 responsibilities: represent a report, format it to html and json. So there should be 3 classes

