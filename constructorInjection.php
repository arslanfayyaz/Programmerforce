<?php
   class Programmer {
      private $skills;
      public function __construct($skills){
         $this->skills = $skills;
      }
      public function totalSkills(){
         return count($this->skills);
      }
   }
   $createskills = array("PHP", "JQUERY", "AJAX");
   $p = new Programmer($createskills);
   echo $p->totalSkills();
?>