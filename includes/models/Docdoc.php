<?php



class Docdoc
{
   
    function __construct() {
        Transport::setInstance([
            'username' => get_option('username'),
            'password' => get_option('password')
        ]);
    }
    
    public function actionCities()
    {
        $req = new CityListRequest();
        $cities = self::getAttributesToArray($req->getData());

        return json_encode($cities);
    }

    public function actionSpecialisations(int $id)
    {
        $req = new SpecListRequest(['city' => $id]);
        $specs = self::getAttributesToArray($req->getData());

        return json_encode($specs);
    }

    public function actionDistrict(int $id)
    {
        $req = new DistrictListRequest(['city' => $id]);
        $districts = self::getAttributesToArray($req->getData());

        return json_encode($districts);
    }

    private static function getAttributesToArray(array $objects)
    {
        $attributes = $objects[0]->attributes();
        $result = [];

        foreach ($objects as $key => $obj) {
            $tmp = null;
            foreach ($attributes as $attribute) {
                 $tmp[$attribute] = $obj->getAttribute($attribute);
            }
            $result[] = $tmp;
        }

        return $result;
    }
}