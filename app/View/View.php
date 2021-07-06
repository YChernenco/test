<?
namespace App\View;

class View
{
    public function render($tpl, $pageData)
    {
        require_once (__DIR__.'/'.$tpl);
    }

}

?>