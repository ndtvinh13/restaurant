<?php 
    class Format{
        public function formatDate($date){
            return date("F j, Y, g:i a", strtotime($date)); 
        }

        public function textCutoff($text, $limit){
            // Place a space at the end of the string
            $text=$text." ";
            $text=substr($text,0,$limit);
            //Get the end of the string by reconizing the space at the end
            // Then, place ... at the end
            $text=substr($text,0,strrpos($text," "));
            $text=$text."...";
            return $text;
        }

        public function validation($data){
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    }
?>