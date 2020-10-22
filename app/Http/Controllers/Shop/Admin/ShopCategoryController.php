<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopCategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Repositories\ShopCategoryRepository;
use App\Models\ShopCategory;
use Illuminate\Support\Str;

class ShopCategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $shopCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->shopCategoryRepository = app(ShopCategoryRepository::class);
    }

    public function index()
    {
        $paginator =
            $this->shopCategoryRepository->getAllWithPaginate(5);
        return view('shop.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ShopCategory();
        $categoryList = $this->shopCategoryRepository->getForComboBox();
        return view('shop.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = Str::str_slug($data['title']);
        }

        $item = (new ShopCategory())->create();

        if ($item) {
            return redirect()
                ->route('shop.admin.categories.edit', [$item->id])
                ->with(['succes' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохраниения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->shopCategoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->shopCategoryRepository->getForComboBox();
        return view('shop.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopCategoryUpdateRequest $request, $id)
    {
        $item = $this->shopCategoryRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id = [{$id}] не найдена"])
                ->withInput();
        }
        $data = $request->all();
        if (empty($data['slug'])) {
            $data['slug'] = Str::str_slug($data['title']);
        }
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.categories.edit')
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
