<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CaptureRiderRequest;
use App\Models\Restaurant;
use App\Models\Rider;
use App\Models\RiderCapture;
use Illuminate\Http\JsonResponse;

class RiderController extends Controller
{
    /**
     * @param CaptureRiderRequest $request
     * @return JsonResponse
     */
    public function captureRider(CaptureRiderRequest $request): \Illuminate\Http\JsonResponse
    {
        RiderCapture::create([
            'rider_id' => $request->rider_id,
            'service_name' => $request->service_name,
            'lat' => $request->lat,
            'long' => $request->long,
            'capture_time' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rider captured successfully',
        ]);
    }

    public function getNearestRider($restudentId)
    {
        $restaurantId = $restudentId;
        $restaurant = Restaurant::find($restaurantId);

        if(!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        $riders = RiderCapture::where('capture_time', '>=', now()->subMinutes(5))->get();

        $nearestRider = null;
        $nearestDistance = PHP_INT_MAX;

        foreach ($riders as $rider) {
            $distance = $this->calculateDistance($restaurant->lat, $restaurant->long, $rider->lat, $rider->long);

            if ($distance < $nearestDistance) {
                $nearestRider = $rider;
                $nearestDistance = $distance;
            }
        }

        return response()->json(['nearest_rider' => $nearestRider, 'distance' => $nearestDistance]);
    }

    private function calculateDistance($restLat, $restLong, $riderLat, $riderLong): float
    {
        // Convert latitude and longitude from degrees to radians
        $restLat = deg2rad($restLat);
        $restLong = deg2rad($restLong);
        $riderLat = deg2rad($riderLat);
        $riderLong = deg2rad($riderLong);

        // Radius of the Earth in kilometers
        $earthRadius = 6371;

        // Haversine formula
        $distance = 2 * $earthRadius * asin(sqrt(
                pow(sin(($riderLat - $restLat) / 2), 2) +
                cos($restLat) * cos($riderLat) * pow(sin(($riderLong - $restLong) / 2), 2)
            ));
        return $distance;
    }


}
