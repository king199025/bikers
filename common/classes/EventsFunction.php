<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 12.09.2016
 * Time: 11:53
 */

namespace common\classes;



use common\models\db\City;
use common\models\db\Country;
use common\models\db\EventsUser;
use common\models\db\Region;

class EventsFunction
{
    public static function get_local_event($idCity){
        $result = '';
        $cityName = City::find()->where(['id' => $idCity])->one();
        $regionName = Region::find()->where(['id' => $cityName->region])->one();

        //Debug::prn($cityName);

        $countryName = Country::find()->where(['id' => $cityName->country])->one();

        $result = $countryName->Name . ' / ' . $regionName->Name . ' / ' . $cityName->Name;
        return $result;
    }

    public static function get_events_user_go($id){
        return EventsUser::find()->where(['events_id' => $id])->count();
    }

    public static function get_city_event($id){
        return City::find()->where(['id' => $id])->one()->Name;
    }


    //Получение координат города
    public static function getGps($id){
        $city = City::find()->where(['id' => $id])->one();
        return $city->Lon . 'N ' . $city->Lat . 'E';
    }

    public static function getGpsLat($id){
        $city = City::find()->where(['id' => $id])->one()->Lat;
        return $city;
    }
    public static function getGpsLon($id){
        $city = City::find()->where(['id' => $id])->one()->Lon;
        return $city;
    }

}