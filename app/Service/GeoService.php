<?

namespace App\Service;

class GeoService
{
    /**
     * @param $ip
     * @return string
     */
    static function getGeoByIp(string $ip): string
    {
//        ошибка по ssl, изза этого долго отдает ответ(для большей производительности нужно было сгрупировать все ip,
//        можно даже по маске, а только потом отдавать их порциями в сервис для определения гео)
//        $data = file_get_contents('https://api.ipstack.com/' . $ip . '?access_key=' . self::ACCESS_KEY);
//
//        if($data['status']!='sucsess'){
//            return false;
//        }

        $continents = ['EU', 'NA', 'AS'];

        return $continents[rand(0, count($continents) - 1)];
    }

    /**
     * @param string $phone
     * @return string
     */
    static function getGeoByPhone(string $phone): string
    {
        $continents = ['EU', 'NA', 'AS'];

        return $continents[rand(0, count($continents) - 1)];
    }

}

?>