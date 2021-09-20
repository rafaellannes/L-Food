<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function categories($idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back;
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', compact('product', 'categories'));
    }

    public function categoriesAvaiable(Request $request, $idProduct)
    {

        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back;
        }

        $filters = $request->except('_token');

        $categories = $product->categoriesAvaiable($request->filter);

        return view('admin.pages.products.categories.available', compact('product', 'categories', 'filters'));
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back;
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()->back()->withErrors('Necessário escolher pelo menos uma permissão');
        }
        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    public function detachCategoriesProduct($idProduct, $idCategory)
    {

        $product = $this->product->findOrFail($idProduct);
        $category = $this->category->findOrFail($idCategory);

        if (!$product || !$category) {
            return redirect()->back;
        }


        $product->categories()->detach($category);

        return redirect()->route('products.categories', $product->id);
    }

    public function products($idCategory)
    {

        if (!$category = $this->category->find($idCategory)) {
            return redirect()->back;
        }

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }
}
