<?

namespace App\Controller;

use App\Service\CsvService;
use App\Service\GeoService;
use App\View\View;
use Klein\Request;

class HomeController
{
    /**
     * @var Request
     */
    public $request;

    const ACCESS_KEY = 'd9f000dbc0237078dfb39bf8033d244c';
    /**
     * @var View
     */
    public $view;
    /**
     * @var array|mixed
     */
    public $pageData;
    /**
     * @var GeoService
     */
    public $geoService;
    /**
     * @var CsvService
     */
    public $csvService;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
        $this->geoService = new GeoService();
        $this->csvService = new CsvService();
    }

    public function index()
    {
        $this->view->render('form.tpl.php', null);
    }


    public function render()
    {
        $users = $this->csvService->parser($_FILES['file']['tmp_name']);

        foreach ($users as &$user) {
            $total['sameContinent'] = 0;
            $total['sameSeconds'] = 0;
            $total['allCalls'] = 0;
            $total['allSeconds'] = 0;
            foreach ($user as $value) {
                $seconds = !empty($value[2]) ? $value[2] : 0;
                if ($value['phoneGeo'] == $value['ipGeo']) {
                    $total['sameContinent']++;
                    $total['sameSeconds'] = $total['sameSeconds'] + $seconds;
                }
                $total['allSeconds'] = $total['allSeconds'] + $seconds;
                $total['allCalls']++;

            }
            $user['total'] = $total;
            unset($total);
        }

        $this->pageData = $users;
        $this->view->render('table.tpl.php', $this->pageData);
    }
}

?>