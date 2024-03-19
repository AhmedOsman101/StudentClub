<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CalendarController extends Controller {
    public function index() {
        $events = array();
        $bookings = Booking::all();
        foreach ($bookings as $booking) {
            $color = null;
            switch ($booking->title) {
                case "Test":
                    $color = "#924ACE";
                    break;
                case "Test 1":
                    $color = "#3be168";
                    break;
                case "Test 2":
                    $color = "#ef162d";
                    break;
                case "study":
                    $color = "#ef7816";
                    break;
                default:
                    break;
            }
            $events[] = [
                "id" => $booking->id,
                "title" => $booking->title,
                "start" => $booking->start_date,
                "end" => $booking->end_date,
                "color" => $color
            ];
        }

        return view("calendar.index", ["events" => $events]);
    }
    public function store(Request $request) {
        $request->validate([
            "title" => "required|string",
            "start_date" => "required",
            "end_date" => "required"
        ]);
        $booking = Booking::insert([
            "title" => $request["title"],
            "start_date" => $request["start_date"],
            "end_date" => $request["end_date"],

        ]);
        return response()->json($booking);
    }
    public function patch(Request $request, $id) {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                "error" => "unable to update"
            ], 404);
        }
        $booking->update([
            "start_date" => $request["start_date"],
            "end_date" => $request["end_date"]
        ]);
        return response()->json("event updated");
    }
    public function destroy(Request $request, $id) {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                "error" => "unable to update"
            ], 404);
        }
        $booking->delete();
        return $id;
    }
}
