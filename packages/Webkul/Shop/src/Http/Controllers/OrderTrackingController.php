<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Sales\Repositories\OrderRepository;

class OrderTrackingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @return void
     */
    public function __construct(protected OrderRepository $orderRepository)
    {
    }

    /**
     * Display a listing of the guest orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $guestOrderIds = session()->get('guest_orders', []);

        if (empty($guestOrderIds)) {
            return view('shop::tracking.index', ['orders' => []]);
        }

        $orders = $this->orderRepository->findWhereIn('id', $guestOrderIds);

        return view('shop::tracking.index', compact('orders'));
    }
}
