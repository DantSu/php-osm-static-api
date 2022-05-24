<?php

namespace DantSu\OpenStreetMapStaticAPI\Utils;


use DantSu\OpenStreetMapStaticAPI\LatLng;

class GeographicConverter
{

    /**
     * Calculate the earth radius at the given latitude
     *
     * @param float $lat
     * @return float
     */
    public static function earthRadiusAtLatitude(float $lat): float
    {
        $equatorial = 6378137.0;
        $pole = 6356752.3;
        $lat = \deg2rad($lat);

        return \sqrt(
            (\pow(\pow($equatorial, 2) * \cos($lat), 2) + \pow(\pow($pole, 2) * \sin($lat), 2)) /
            (\pow($equatorial * \cos($lat), 2) + \pow($pole * \sin($lat), 2))
        );
    }

    /**
     * Convert distance and angle from a point to latitude and longitude
     *
     * @param LatLng $from Starting coordinate
     * @param float $distance Distance in meters
     * @param float $angle Angle in degrees
     * @return LatLng
     */
    public static function metersToLatLng(LatLng $from, float $distance, float $angle): LatLng
    {
        $earthRadius = self::earthRadiusAtLatitude($from->getLat());
        $lat = \deg2rad($from->getLat());
        $lng = \deg2rad($from->getLng());
        $angle = \deg2rad($angle);

        return new LatLng(
            \rad2deg(
                \asin(
                    \sin($lat) * \cos($distance / $earthRadius) +
                    \cos($lat) * \sin($distance / $earthRadius) * \cos($angle)
                )
            ),
            \rad2deg(
                $lng + \atan2(
                    \sin($angle) * \sin($distance / $earthRadius) * \cos($lat),
                    \cos($distance / $earthRadius) - \sin($lat) * \sin($lat)
                )
            )
        );
    }

}
