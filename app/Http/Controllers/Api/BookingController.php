<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookATripRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SearchForTripRequest;
use App\Http\Resources\TripResource;
use App\Services\BookingServices;
use http\Client\Curl\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Info(title="Bus Booking Api ", version="0.1")

 */
class BookingController extends Controller
{
    /**
     * @OA\Post (
     *     path="/api/booking/search",
     *     tags={"Booking"},
     *    security={ {"bearer": {} }},
     *    @OA\RequestBody(
     *    required=true,
     *    description="Search for a trip",
     *    @OA\JsonContent(
     *       type="object",
     *       required={"email","password"},
     *       @OA\Property(property="start_station", type="int", example="1"),
     *       @OA\Property(property="end_station", type="int", example="3"),
     *    ),
     * ),
     *
     *     @OA\Response(response="200", description="Display a listing of Trips." , @OA\JsonContent()),
     *     @OA\Response(response="422", description="Invalid gavien data." , @OA\JsonContent())
     * )
     *
     * @param SearchForTripRequest  $request
     * @param BookingServices $bookingServices
     * @return JsonResource
     */
    public function searchForTrip(SearchForTripRequest  $request , BookingServices $bookingServices)
    {
        return TripResource::collection($bookingServices->searchForBus($request->start_station , $request->end_station));
    }

    /**
     * @OA\Post (
     *     path="/api/booking/book-trip",
     *     tags={"Booking"},
     *    security={ {"bearer": {} }},
     *    @OA\RequestBody(
     *    required=true,
     *    description="Book a trip",
     *    @OA\JsonContent(
     *       type="object",
     *       required={"email","password"},
     *       @OA\Property(property="start_station", type="int", example="1"),
     *       @OA\Property(property="end_station", type="int", example="3"),
     *       @OA\Property(property="trip_id", type="int", example="1"),
     *    ),
     * ),
     *
     *     @OA\Response(response="200", description="Display a listing of Trips." , @OA\JsonContent()),
     *     @OA\Response(response="422", description="Invalid gavien data." , @OA\JsonContent()),
     *     @OA\Response(response="404", description="Cant find trip." , @OA\JsonContent()),
     *     @OA\Response(response="401", description="Cant find trip." , @OA\JsonContent()),

     *
     * )
     *
     * @param BookATripRequest  $request
     * @param BookingServices $bookingServices
     * @return JsonResponse
     */
    public function bookATrip(BookATripRequest  $request , BookingServices $bookingServices)
    {
        $booking = $bookingServices->BookBus($request->start_station , $request->end_station , $request->trip_id );
        if ($booking){
            return  response()->json([
              'message' => 'You trip Has been booked successfully',
                'code' => 201
            ],201);
        }
        return  response()->json([
            'message' => 'We cant find any trips available',
            'code' => 404
        ],404);
    }


}
