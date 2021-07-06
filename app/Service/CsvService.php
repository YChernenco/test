<?

namespace App\Service;

class CsvService
{
    /**
     * @param $file
     * @return array
     */
    public function parser($file): array
    {
        $data = explode("\n", file_get_contents($file));
        foreach ($data as $item) {
            $array = str_getcsv($item);
            if (empty($array[0])) {
                continue;
            }

            $phone = !empty($array[3]) ? $array[3] : '';
            $ip = !empty($array[4]) ? $array[4] : '';
            $array['phoneGeo'] = GeoService::getGeoByPhone($phone);
            $array['ipGeo'] = GeoService::getGeoByIp($ip);
            $users[$array[0]][] = $array;
            unset($array);
        }
        return $users;
    }
}

?>