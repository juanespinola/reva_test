<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bookings $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bookings $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bookings $bookings)
    {
        //
    }

    public function dateTimeBooking(Request $request) {
        try {
            $request->validate([
                'date_booking' => 'required|date ',
                'start_booking' => 'time',
                'end_booking'  => 'time',
            ]);

            $bookings = DB::table('bookings')
            ->join('fields', 'fields.id', '=', 'bookings.field_id')
            ->join('venues', 'venies.id', "=", "fields.venue_id")
            ->where([
                'bookings.date', "=", $request->input('date_booking'),
                'start_booking', "=", $request->input('start_booking'),
                'end_booking', "=", $request->input('end_booking'),
            ])
            ->select('fields.description')
            ->get();

            return $bookings;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function fieldDateTimeBooking(Request $request) {
        try {
            $request->validate([
                'venue_id' => 'required|integer',
                'field_id' => 'required|integer',
                'date_booking' => 'required|date ',
                'start_booking' => 'time',
                'end_booking'  => 'time',
            ]);

            $bookings = DB::table('bookings')
            ->join('fields', 'fields.id', '=', 'bookings.field_id')
            ->join('venues', 'venies.id', "=", "fields.venue_id")
            ->where([
                'venues.id', "=", $request->input('venue_id'),
                'fields.id', "=", $request->input('field_id'),
                'bookings.date', "=", $request->input('date_booking'),
                'start_booking', "=", $request->input('start_booking'),
                'end_booking', "=", $request->input('end_booking'),
            ])
            ->select('fields.description')
            ->get();

            return $bookings;

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
