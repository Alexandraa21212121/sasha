<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartAdd($id)
    {
        $id = intval($id);
        $productsInCart = [];

        session()->put('products', [
            'product_id' => 1
        ]);

        if (session()->has('products')) {
            $productsInCart = session()->get('products');
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }

        session()->put('products', $productsInCart);

        return redirect()->back();
    }
    public function cartAddAjax($id)
    {
        $id = intval($id);
        $productsInCart = [];

        if (session()->has('products')) {
            $productsInCart = session()-> get('products');
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }

        session()->put('products', $productsInCart);

        return $this->countItems();
    }

    public function countItems()
    {
        if (session()->has('products')) {
            $count = 0;
            foreach (session()->get('products') as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public function getProducts()
    {
        if (session()->has('products')) {
            return session()->get('products');
        }
        return false;
    }

    public function getTotalPrice($products)
    {
        $productsInCart = $this->getProducts();
        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public function deleteProduct($id)
    {

        $productsInCart = $this->getProducts();
        unset($productsInCart[$id]);
        session()->put('products', $productsInCart);
    }

    public function index(Request $request)
    {
        $categories = [];
        $categories = Category::getCategoriesList();
        $productsInCart = Cart::getProducts();
        $productsInCart = false;
        if ($request->post('submit')) {
            $userName = $request->post('userName');
            $userPhone = $request->post('userPhone');
            $userComment = $request->post('userComment');

            $errors = false;

            if (!User::checkName($userName))
                $errors[] = 'Неправильное имя';
            if (User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';
            if ($errors == false) {
                $productsInCart = Cart::getProducts();
                if (!empty(auth()->user())) {
                    $userId = false;
                } else {
                    $userId = auth()->user()->id;
                }
                $result = Order::save($userName, $userPhone , $userComment , $userId , $productsInCart);
                if($result)
                {

                }
            }else{
                $productsInCart= Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products=Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }


        }else {
            $productsInCart = Cart::getProducts();

            if ($productsInCart) {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
            }

            $productsInCart = Cart::getProducts();
            if ($productsInCart == false) {
                header("Location: /");
            } else {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;


                if (User::isGuest()) {

                } else {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }
            }
        }

        require_once (ROOT.'/templates/views/cart/index.php');
        return true;



    }
    public function actionDelete($id)
    {

        Cart::deleteProduct($id);
        header("location: /cart/");
    }
        public function view()
        {
            session()->has('products');
        }
}
