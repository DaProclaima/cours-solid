<?php
namespace App\Reporting;

class StringReport extends Report {

    // and there the code is broken. Classes using childkind Report classes should be able to use them normaly. 
    // So, we should not overwrite the function but add a new one.
    // public function getContents() {

    //     return "title:$this->title;date:$this->date;data:" . implode("," , $this->data);
    // }

    public function getStringContents(): string {

        return "title:$this->title;date:$this->date;data:" . implode("," , $this->data);
    }
}
