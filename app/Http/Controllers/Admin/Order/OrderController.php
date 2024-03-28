<?php

namespace App\Http\Controllers\Admin\Order;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Orders.index');
    }

    public function find($id)
    {
        $order = $this->orderRepository->find($id);

        if($order)
        {
            foreach($order->details as $detail)
            {
                $order->productName = $detail->product->name;
                $order->quantity = $detail->quantity;
                $order->price = $detail->price;

            }
            return view('Dashboard.Orders.show',compact('order'));
        }
    }

    public function updateStatus(Request $request,$id)
    {
        $order = $this->orderRepository->find($id);

        if($order)
        {
            $order->update([
                'status' => $request->status,
            ]);

            foreach($order->details as $detail)
            {
                $order->productName = $detail->product->name;
                $order->quantity = $detail->quantity;
                $order->price = $detail->price;
            }

            return view('Dashboard.Orders.show',compact('order'));
        }

        foreach($order->details as $detail)
        {
            $order->productName = $detail->product->name;
            $order->quantity = $detail->quantity;
            $order->price = $detail->price;
        }

        return view('Dashboard.Orders.show',compact('order'));
    }
}
