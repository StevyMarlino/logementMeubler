<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogementRequest;
use App\Models\Invoice;
use App\Models\logement;
use App\Services\LogementService;

class LogementController extends Controller
{
    public function home()
    {
        $userId = auth()->user()->id;
        $this_month_orders = Invoice::whereMonth('created_at', now()->month)
            ->where('user_id', $userId)
            ->where('status_reservation', 'complete')
            ->sum('total_amount');

        $this_years_orders = Invoice::whereYear('created_at', now()->year)
            ->where('user_id', $userId)
            ->where('status_reservation', 'complete')
            ->sum('total_amount');

        $total_week_sale = Invoice::whereMonth('created_at', today()->month)
            ->where('user_id', $userId)
            ->whereBetween('created_at', [today()->subWeeks(), today()])
            ->sum('total_amount');

        $today_orders_count = Invoice::whereDate('created_at', today())
            ->where('user_id', $userId)
            ->count();
        $today_orders = Invoice::whereDate('created_at', today())
            ->where('user_id', $userId)
            ->sum('total_amount');
        $yesterday_orders_count = Invoice::whereDate('created_at', today()->subDays(1))->count();

        $data = [
            'this_month_orders' => $this_month_orders,
            'this_years_orders' => $this_years_orders,
            'total_week_sale' => $total_week_sale,
            'today_orders' => $today_orders,
            'yesterday_orders' => $yesterday_orders_count,
            'today_orders_count' => $today_orders_count
        ];

        return view('dashboard', $data);
    }

    public function index()
    {
        return view('logement.index');
    }

    public function store(LogementRequest $request)
    {
        try {
            (new LogementService)->create($request);

            return back()->with('message', 'Reservations ajouté');
        } catch (\Exception $error) {
            return back()->withErrors($error->getMessage());
        }
    }

    public function storeSachen()
    {

    }

    public function details($id)
    {
        $data = [
            'details' => logement::find($id)
        ];
        return view('logement.details', $data);
    }
}
