
<?php
// echo preg_replace('/[#$%\s+@^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', '', "<b>            I s'la\"       m|Ab \n\rd/dlk@com.ala</b>");
class user
{
    private $name = "";
    private $email = "";
    private $password = "";
    private $description = "";
    private $photo = "";

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