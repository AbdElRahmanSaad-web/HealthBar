<?php

namespace App\Http\Controllers\Admin\Order;

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

    public function index()
    {
        $Orders = $this->orderRepository->all();
        dd($Orders);
        // $categories = $this->Parent($main_categories)??[];
        
        return view('Dashboard.category.index', compact('categories'));
    }
}
