
<?php
// echo preg_replace('/[#$%\s+@^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', '', "<b>            I s'la\"       m|Ab \n\rd/dlk@com.ala</b>");
class book
{
    private $title = "";
    private $description = "";
    private $details = "";
    private $photo = "";
    private $creator_id = "";
    function __construct()
    {
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    private function validateText($input)
    {
        $data = trim($input);
        $stripdata = stripslashes($data);
        $validate = htmlspecialchars($stripdata);
        return strtolower($validate);
    }
}
?>