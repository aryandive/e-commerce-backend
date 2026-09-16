<?php

namespace Webkul\Shop\Listeners;

use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Customer\Contracts\Customer;

class GuestOrder
{
    /**
     * Create a new listener instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @return void
     */
    public function __construct(protected OrderRepository $orderRepository)
    {
    }

    /**
     * Save the guest order ID into the session for seamless tracking.
     *
     * @param  \Webkul\Sales\Contracts\Order  $order
     * @return void
     */
    public function afterOrderCreated($order)
    {
        if (empty($order->customer_id)) {
            session()->push('guest_orders', $order->id);
        }
    }

    /**
     * Link previous guest orders to the newly registered customer.
     *
     * @param  \Webkul\Customer\Contracts\Customer  $customer
     * @return void
     */
    public function afterCustomerCreated(Customer $customer)
    {
        $guestOrders = $this->orderRepository->findWhere([
            'customer_email' => $customer->email,
            'customer_id'    => null,
        ]);

        foreach ($guestOrders as $order) {
            $this->orderRepository->update(['customer_id' => $customer->id], $order->id);
        }
    }
}
