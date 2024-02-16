<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\RepositoryInterface\ItemRepositoryInterface;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index(){
        $items = $this->itemRepository->all();

        return view('Dashboard.item.index', compact('items'));
    }

    public function create(){
        return view('Dashboard.item.create');
    }

    public function store(ItemRequest $request){
        $this->itemRepository->store($request->all());

        return redirect()->route('admin.items.index')->with('success', 'Item is Created Successfully');
    }

    public function edit($id){
        $item = $this->itemRepository->edit($id);
        
        return view('Dashboard.item.edit', compact('item'));
    }
   
    public function update(ItemRequest $request, $id){
        $item = $this->itemRepository->update($request->all(), $id);

        return redirect()->route('admin.items.index')->with('success', 'Item is Updated Successfully');
    }
}

