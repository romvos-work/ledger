<?php

namespace App\Http\Controllers;


use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ControllerBills extends Controller
{
    public function entity(Request $request, $id)
    {
        $this->validate($request, [
            'relations' => ['sometimes', 'nullable', 'array'],
        ]);

        $query = Bill::query()
            ->where('id', $id);

        if (!empty($request->relations)) {
            $query->with($request->relations);
        }

        $bill = $query->firstOrFail();

        if (empty($bill)) {
            throw new NotFoundHttpException();
        }

        return response()->json($bill);
    }

    public function list(Request $request)
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 10);

        $list = Bill::query()
            ->with(['shop'])
            ->forPage($page, $limit)
            ->get()
            ->all()
        ;

        return response()->json($list);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'shopId' => ['required', 'integer', 'min:1'],
        ]);

        $shop = Shop::find($request->input('shopId'));
        if (empty($shop)) {
            throw new NotFoundHttpException('Магазин не найдет');
        }

        $bill = Bill::create([
            'shopId' => $shop->id,
            'state' => Bill::STATE_CREATED,
            'createdAt' => date(Bill::FORMAT_DEFAULT),
        ]);

        return response()->json($bill);
    }

    public function storeItem(Request $request)
    {
        $this->validate($request, [
            'billId' => ['required', 'integer', 'min:1'],
            'productId' => ['required', 'integer', 'min:1'],
            'amount' => ['required', 'numeric', 'min:0.001'],
            'price' => ['required', 'numeric', 'min:0.001'],
            'discount' => ['sometimes', 'nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $product = Product::find($request->input('productId'));
        if (empty($product)) {
            throw new NotFoundHttpException('not found');
        }

        /** @var Bill $bill */
        $bill = Bill::find($request->input('billId'));
        if (empty($bill)) {
            throw new NotFoundHttpException('not found');
        }

        $amount = $request->input('amount');
        $price = $request->input('price');
        $discount = $request->input('discount');

        $priceDiscounted = empty($discount)
            ? $price
            : $price - ($price / 100 * $discount);

        $priceTotal = $priceDiscounted * $amount;
        $billItem = BillItem::create([
            'billId' => $bill->id,
            'productId' => $product->id,
            'amount' => $amount,
            'price' => $price,
            'discount' => $discount,
            'priceTotal' => $priceTotal,
            'createdAt' => date(BillItem::FORMAT_DEFAULT),
        ]);

        $bill->updateItemsPrice();

        return response()->json($billItem);
    }

    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'productId' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:0.001'],
            'price' => ['required', 'numeric', 'min:0.001'],
            'discount' => ['sometimes', 'integer', 'min:1', 'max:100'],
        ]);


    }

    public function getItems($id)
    {
        $bill = Bill::query()
            ->with(['items'])
            ->where('id', $id)
            ->firstOrFail()
        ;
    }
}
