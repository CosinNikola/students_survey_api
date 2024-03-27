<?php

    namespace App\Helpers;

    class ResponseData {
        public $studentsCount = 0;
        public $menCount = 0;
        public $womenCount = 0;
        public $budgetCount = 0;
        public $selfFinancingCount = 0;
        public $sixSevenCount = 0;
        public $sevenEightCount = 0;
        public $eightNineCount = 0;
        public $nineTenCount = 0;
        public $rareCount = 0;
        public $periodicallyCount = 0;
        public $oftenCount = 0;
        public $alwaysCount = 0;


        // public function countStudents($data) {
        //     foreach($data as $one) {
        //         $this->studentsCount++;
        //     }
        // }

        // public function countGenders($data) {
        //     foreach($data as $one) {
        //         if($one->pol === 'M') {
        //             $this->menCount++;
        //         }
        //         else {
        //             $this->womenCount++;
        //         }
        //     }
        // }

        // public function statusCount($data) {
        //     foreach($data as $one) {

        //     }
        // }

        public function countData($data) {
            foreach($data as $one) {
                $this->studentsCount++;

                if($one->pol === 'M') {
                    $this->menCount++;
                }
                else if($one->pol === 'Z') {
                    $this->womenCount++;
                }

                if($one->status === 'B') {
                    $this->budgetCount++;
                }
                else if($one->status === 'S'){
                    $this->selfFinancingCount++;
                }

                if($one->prosecna_ocena === "6-7") {
                    $this->sixSevenCount++;
                }
                else if($one->prosecna_ocena === "7-8") {
                    $this->sevenEightCount++;
                }
                else if($one->prosecna_ocena === "8-9") {
                    $this->eightNineCount++;
                }
                else if($one->prosecna_ocena === "9-10") {
                    $this->nineTenCount++;
                }

                if($one->prisutnost === "retko") {
                    $this->rareCount++;
                }
                else if($one->prisutnost === "povremeno") {
                    $this->periodicallyCount++;
                }
                else if($one->prisutnost === "cesto") {
                    $this->oftenCount++;
                }
                else if($one->prisutnost === "redovno") {
                    $this->alwaysCount++;
                }
                
            }
        }
    }

?>