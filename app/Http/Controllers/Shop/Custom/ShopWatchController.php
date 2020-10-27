<?php

namespace App\Http\Controllers\Shop\Custom;

use App\Repositories\ShopWatchRepository;
use Illuminate\Http\Request;

class ShopWatchController extends BaseController
{
    private $shopWatchRepository;

    public function __construct()
    {
        parent::__construct();
        $this->shopWatchRepository = app(ShopWatchRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->shopWatchRepository->getAllWithPaginate();
        return view('shop.custom.main.index', compact($paginator, 'paginator'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }
}
