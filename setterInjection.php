<?php
   class Profile {
      private $language;
      public function setLanguage($language){
         $this->language = $language;
      }
   }
   $profile = new Profile();
   $language = array("Hindi","English","French");
   $profile->setLanguage($language);
?>