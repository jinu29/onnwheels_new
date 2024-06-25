<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use App\CentralLogics\StoreLogic;
use Illuminate\Support\Facades\DB;
use App\CentralLogics\ProductLogic;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;
use Config;

class ItemController extends Controller
{

    public function get_latest_products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required',
            'category_id' => 'required',
            'limit' => 'required',
            'offset' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $zone_id = $request->header('zoneId');
        $type = $request->query('type', 'all');
        $product_id = $request->query('product_id') ?? null;
        $min = $request->query('min_price');
        $max = $request->query('max_price');

        $items = ProductLogic::get_latest_products($zone_id, $request['limit'], $request['offset'], $request['store_id'], $request['category_id'], $type, $min, $max, $product_id);
        $items['categories'] = $items['categories'];
        $items['products'] = Helpers::product_data_formatting($items['products'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_all_products(Request $request)
    {
        $items = ProductLogic::get_all();

        return response()->json($items, 200);
    }

    public function get_zone_products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'limit' => 'required',
            'offset' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $zone_id = $request->header('zoneId');
        $type = "all";
        $product_id = $request->query('product_id') ?? null;
        $min = $request->query('min_price');
        $max = $request->query('max_price');

        $items = ProductLogic::get_zone($zone_id, $request['limit'], $request['offset'], $type, $min, $max, $product_id);

        // $items['products'] = Helpers::product_data_formatting($items['products'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_new_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $zone_id = $request->header('zoneId');
        $type = $request->query('type', 'all');
        $product_id = $request->query('product_id') ?? null;
        $min = $request->query('min_price');
        $max = $request->query('max_price');
        $limit = isset($request['limit']) ? $request['limit'] : 50;
        $offset = isset($request['offset']) ? $request['offset'] : 1;

        $items = ProductLogic::get_new_products($zone_id, $type, $min, $max, $product_id, $limit, $offset);
        $items['categories'] = $items['categories'];
        $items['products'] = Helpers::product_data_formatting($items['products'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_searched_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $zone_id = $request->header('zoneId');

        $key = explode(' ', $request['name']);

        $limit = $request['limit'] ?? 10;
        $offset = $request['offset'] ?? 1;
        $category_ids = $request['category_ids'] ? json_decode($request['category_ids']) : '';

        $type = $request->query('type', 'all');

        $items = Item::active()->type($type)
            ->with('store', function ($query) {
                $query->withCount([
                    'campaigns' => function ($query) {
                        $query->Running();
                    }
                ]);
            })
            ->when($request->category_id, function ($query) use ($request) {
                $query->whereHas('category', function ($q) use ($request) {
                    return $q->whereId($request->category_id)->orWhere('parent_id', $request->category_id);
                });
            })
            ->when($category_ids, function ($query) use ($category_ids) {
                $query->whereHas('category', function ($q) use ($category_ids) {
                    return $q->whereIn('id', $category_ids)->orWhereIn('parent_id', $category_ids);
                });
            })
            ->when($request->store_id, function ($query) use ($request) {
                return $query->where('store_id', $request->store_id);
            })
            ->whereHas('module.zones', function ($query) use ($zone_id) {
                $query->whereIn('zones.id', json_decode($zone_id, true));
            })
            ->whereHas('store', function ($query) use ($zone_id) {
                $query->when(config('module.current_module_data'), function ($query) {
                    $query->where('module_id', config('module.current_module_data')['id'])->whereHas('zone.modules', function ($query) {
                        $query->where('modules.id', config('module.current_module_data')['id']);
                    });
                })->whereIn('zone_id', json_decode($zone_id, true));
            })
            ->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%");
                }
                $q->orWhereHas('translations', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('value', 'like', "%{$value}%");
                        };
                    });
                });
                $q->orWhereHas('tags', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('tag', 'like', "%{$value}%");
                        };
                    });
                });
                $q->orWhereHas('category.parent', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('name', 'like', "%{$value}%");
                        };
                    });
                });
                $q->orWhereHas('category', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('name', 'like', "%{$value}%");
                        };
                    });
                });

            })
            ->orderByRaw("FIELD(name, ?) DESC", [$request['name']])
            ->paginate($limit, ['*'], 'page', $offset);

        $data = [
            'total_size' => $items->total(),
            'limit' => $limit,
            'offset' => $offset,
            'products' => $items->items()
        ];

        $data['products'] = Helpers::product_data_formatting($data['products'], true, false, app()->getLocale());
        return response()->json($data, 200);
    }

    public function get_searched_products_suggestion(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $zone_id = $request->header('zoneId');

        $key = explode(' ', $request['name']);


        $limit = $request['limit'] ?? 10;
        $offset = $request['offset'] ?? 1;

        $type = $request->query('type', 'all');


        $items = Item::active()->type($type)
            ->when($request->category_id, function ($query) use ($request) {
                $query->whereHas('category', function ($q) use ($request) {
                    return $q->whereId($request->category_id)->orWhere('parent_id', $request->category_id);
                });
            })
            ->when($request->store_id, function ($query) use ($request) {
                return $query->where('store_id', $request->store_id);
            })
            ->whereHas('module.zones', function ($query) use ($zone_id) {
                $query->whereIn('zones.id', json_decode($zone_id, true));
            })
            // ->whereHas('store', function ($query) use ($zone_id) {
            //     $query->when(config('module.current_module_data'), function ($query) {
            //         $query->where('module_id', config('module.current_module_data')['id'])->whereHas('zone.modules', function ($query) {
            //             $query->where('modules.id', config('module.current_module_data')['id']);
            //         });
            //     })->whereIn('zone_id', json_decode($zone_id, true));

            //     // dd($query);

            // })
            ->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%");
                }
                $q->orWhereHas('translations', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('value', 'like', "%{$value}%");
                        };
                    });
                });
                $q->orWhereHas('tags', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('tag', 'like', "%{$value}%");
                        };
                    });
                });
            })->select(['name', 'image', 'id'])
            ->paginate($limit, ['*'], 'page', $offset);


        // dd($items);


        $data = [
            'total_size' => $items->total(),
            'limit' => $limit,
            'offset' => $offset,
            'products' => $items->items()
        ];

        return response()->json($data, 200);
    }

    public function get_popular_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $type = $request->query('type', 'all');

        $zone_id = $request->header('zoneId');
        $items = ProductLogic::popular_products($zone_id, $request['limit'], $request['offset'], $type);
        $items['products'] = Helpers::product_data_formatting($items['products'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_most_reviewed_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $type = $request->query('type', 'all');

        $zone_id = $request->header('zoneId');
        $items = ProductLogic::most_reviewed_products($zone_id, $request['limit'], $request['offset'], $type);
        $items['categories'] = $items['categories'];
        $items['products'] = Helpers::product_data_formatting($items['products'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_discounted_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $type = $request->query('type', 'all');
        $category_ids = $request->query('category_ids', '');

        $zone_id = $request->header('zoneId');
        $items = ProductLogic::discounted_products($zone_id, $request['limit'], $request['offset'], $type, $category_ids);
        $items['products'] = Helpers::product_data_formatting($items['products'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_cart_suggest_products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $zone_id = $request->header('zoneId');

        $type = $request->query('type', 'all');
        $recommended = $request->query('recommended');

        $items = ProductLogic::cart_suggest_products($zone_id, $request['store_id'], $request['limit'], $request['offset'], $type, $recommended);
        $items['items'] = Helpers::product_data_formatting($items['items'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_product($id)
    {
        try {
            // $item = Item::withCount('whislists')->with(['tags', 'reviews', 'reviews.customer'])->active()
            //     ->when(config('module.current_module_data'), function ($query) {
            //         $query->module(config('module.current_module_data')['id']);
            //     })
            //     ->when(is_numeric($id), function ($qurey) use ($id) {
            //         $qurey->where('id', $id);
            //     })
            //     ->when(!is_numeric($id), function ($qurey) use ($id) {
            //         $qurey->where('slug', $id);
            //     })
            //     ->first();

            //     dd($item);
            // $store = StoreLogic::get_store_details($item->store_id);
            // if ($store) {
            //     $category_ids = DB::table('items')
            //         ->join('categories', 'items.category_id', '=', 'categories.id')
            //         ->selectRaw('categories.position as positions, IF((categories.position = "0"), categories.id, categories.parent_id) as categories')
            //         ->where('items.store_id', $item->store_id)
            //         ->where('categories.status', 1)
            //         ->groupBy('categories', 'positions')
            //         ->get();

            //     $store = Helpers::store_data_formatting($store);
            //     $store['category_ids'] = array_map('intval', $category_ids->pluck('categories')->toArray());
            //     $store['category_details'] = Category::whereIn('id', $store['category_ids'])->get();
            //     $store['price_range'] = Item::withoutGlobalScopes()->where('store_id', $item->store_id)
            //         ->select(DB::raw('MIN(price) AS min_price, MAX(price) AS max_price'))
            //         ->get(['min_price', 'max_price']);
            // }

            $item = Item::where('id', $id)->with('stations')->first();

            $item = Helpers::product_data_formatting($item, false, false, app()->getLocale());
            // $item['store_details'] = $store;
            return response()->json($item, 200);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => ['code' => 'product-001', 'message' => translate('messages.not_found')]
            ], 404);
        }
    }

    public function payment(Request $request)
    {
        $key = Config::get('razor.razor_key');
        return response()->json(['key' => $key]);

    }

    public function get_all_orders(Request $request)
    {
        $userId = $request->input('user_id'); // Assuming 'vendor_id' is the key for vendor ID in the request

        $orders = Order::where('user_id', $userId)
            ->with('customer')
            ->Notpos()
            ->NotDigitalOrder()
            ->orderBy('schedule_at', 'desc')
            ->get();

        $orders = Helpers::order_data_formatting($orders, true);

        return response()->json($orders, 200);
    }


    public function createOrderStore(Request $request)
    {
        try {
            Log::info("Received request data: ", $request->all());

            // Extract user data from request
            $user_id = $request->input('user_id');
            $contact_person_name = $request->input('contact_person_name');
            $contact_person_number = $request->input('contact_person_number');
            $contact_person_email = $request->input('contact_person_email');

            $customer_address = collect([
                'contact_person_name' => $contact_person_name,
                'contact_person_number' => $contact_person_number,
                'contact_person_email' => $contact_person_email,
                "address_type" => "Delivery",
                "address" => $request->input('address'),
                "road" => "",
                "house" => "",
                "longitude" => $request->input('lng'),
                "latitude" => $request->input('lat')
            ]);

            // Create the order
            $order = new Order();
            $order->user_id = $user_id;
            $order->delivery_address = $customer_address;
            $order->store_id = $request->input('store_id');
            $order->order_amount = $request->input('order_amount');
            $order->payment_status = strtolower($request->input('payment_status'));
            $order->transaction_reference = $request->input('transaction_reference');
            $order->save();

            // Create the order detail if the order is successfully created
            if ($order->user_id == $user_id) {
                Log::info("Order created successfully with ID: " . $order->id);

                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->item_id = $request->input('item_id');
                $orderDetail->price = $request->input('order_amount');
                $orderDetail->distance = $request->input('distance');
                $orderDetail->start_date = $request->input('start_date');
                $orderDetail->end_date = $request->input('end_date');
                $orderDetail->save();

                if (isset($order->transaction_reference)) {
                    $order_payment = new OrderPayment();
                    $order_payment->order_id = $order->id;
                    $order_payment->transaction_ref = $request->input('transaction_reference');
                    $order_payment->amount = $request->input('order_amount');
                    $order_payment->payment_status = $request->input('payment_status');
                    $order_payment->payment_method = "Razorpay";
                    $order_payment->save();
                }
            }

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            Log::error('An error occurred while processing the order:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['success' => false, 'error' => 'An error occurred while processing your request.']);
        }
    }

    public function get_related_products(Request $request, $id)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $zone_id = $request->header('zoneId');
        if (Item::find($id)) {
            $items = ProductLogic::get_related_products($zone_id, $id);
            $items = Helpers::product_data_formatting($items, true, false, app()->getLocale());
            return response()->json($items, 200);
        }
        return response()->json([
            'errors' => ['code' => 'product-001', 'message' => translate('messages.not_found')]
        ], 404);
    }
    public function get_related_store_products(Request $request, $id)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $zone_id = $request->header('zoneId');
        if (Item::find($id)) {
            $items = ProductLogic::get_related_store_products($zone_id, $id);
            $items = Helpers::product_data_formatting($items, true, false, app()->getLocale());
            return response()->json($items, 200);
        }
        return response()->json([
            'errors' => ['code' => 'product-001', 'message' => translate('messages.not_found')]
        ], 404);
    }

    public function get_recommended(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $type = $request->query('type', 'all');
        $filter = $request->query('filter', 'all');

        $zone_id = $request->header('zoneId');
        $items = ProductLogic::recommended_items($zone_id, $request->store_id, $request['limit'], $request['offset'], $type, $filter);
        $items['items'] = Helpers::product_data_formatting($items['items'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }

    public function get_set_menus()
    {
        try {
            $items = Helpers::product_data_formatting(Item::active()->with(['rating'])->where(['set_menu' => 1, 'status' => 1])->get(), true, false, app()->getLocale());
            return response()->json($items, 200);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => ['code' => 'product-001', 'message' => 'Set menu not found!']
            ], 404);
        }
    }

    public function get_product_reviews(Request $request, $item_id)
    {
        if (isset($request['limit']) && ($request['limit'] != null) && isset($request['offset']) && ($request['offset'] != null)) {

            $reviews = Review::with(['customer', 'item'])->where(['item_id' => $item_id])->active()->paginate($request['limit'], ['*'], 'page', $request['offset']);
            $total = $reviews->total();
        } else {

            $reviews = Review::with(['customer', 'item'])->where(['item_id' => $item_id])->active()->get();
            $total = $reviews->count();
        }

        $storage = [];
        foreach ($reviews as $temp) {
            $temp['attachment'] = json_decode($temp['attachment']);
            $temp['item_name'] = null;
            if ($temp->item) {
                $temp['item_name'] = $temp->item->name;
                if (count($temp->item->translations) > 0) {
                    $translate = array_column($temp->item->translations->toArray(), 'value', 'key');
                    $temp['item_name'] = $translate['name'];
                }
            }

            unset($temp['item']);
            array_push($storage, $temp);
        }

        $data = [
            'total_size' => $total,
            'limit' => $request['limit'],
            'offset' => $request['offset'],
            'reviews' => $storage
        ];

        return response()->json($data, 200);
    }

    public function get_product_rating($id)
    {
        try {
            $item = Item::find($id);
            $overallRating = ProductLogic::get_overall_rating($item->reviews);
            return response()->json(floatval($overallRating[0]), 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
    }

    public function submit_product_review(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required',
            'order_id' => 'required',
            'comment' => 'required',
            'rating' => 'required|numeric|max:5',
        ]);

        $order = Order::find($request->order_id);
        if (isset($order) == false) {
            $validator->errors()->add('order_id', translate('messages.order_data_not_found'));
        }

        $item = Item::find($request->item_id);
        if (isset($order) == false) {
            $validator->errors()->add('item_id', translate('messages.item_not_found'));
        }

        $multi_review = Review::where(['item_id' => $request->item_id, 'user_id' => $request->user()->id, 'order_id' => $request->order_id])->first();
        if (isset($multi_review)) {
            return response()->json([
                'errors' => [
                    ['code' => 'review', 'message' => translate('messages.already_submitted')]
                ]
            ], 403);
        } else {
            $review = new Review;
        }

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $image_array = [];
        if (!empty($request->file('attachment'))) {
            foreach ($request->file('attachment') as $image) {
                if ($image != null) {
                    if (!Storage::disk('public')->exists('review')) {
                        Storage::disk('public')->makeDirectory('review');
                    }
                    array_push($image_array, Storage::disk('public')->put('review', $image));
                }
            }
        }

        $order?->OrderReference?->update([
            'is_reviewed' => 1
        ]);

        $review->user_id = $request->user()->id;
        $review->item_id = $request->item_id;
        $review->order_id = $request->order_id;
        $review->module_id = $order->module_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->attachment = json_encode($image_array);
        $review->save();

        if ($item->store) {
            $store_rating = StoreLogic::update_store_rating($item->store->rating, (int) $request->rating);
            $item->store->rating = $store_rating;
            $item->store->save();
        }

        $item->rating = ProductLogic::update_rating($item->rating, (int) $request->rating);
        $item->avg_rating = ProductLogic::get_avg_rating(json_decode($item->rating, true));
        $item->save();
        $item->increment('rating_count');

        return response()->json(['message' => translate('messages.review_submited_successfully')], 200);
    }

    public function item_or_store_search(Request $request)
    {

        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        if (!$request->hasHeader('longitude') || !$request->hasHeader('latitude')) {
            $errors = [];
            array_push($errors, ['code' => 'longitude-latitude', 'message' => translate('messages.longitude-latitude_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        $zone_id = $request->header('zoneId');
        $longitude = $request->header('longitude');
        $latitude = $request->header('latitude');

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $key = explode(' ', $request->name);

        $items = Item::active()->whereHas('store', function ($query) use ($zone_id) {
            $query->when(config('module.current_module_data'), function ($query) {
                $query->where('module_id', config('module.current_module_data')['id'])->whereHas('zone.modules', function ($query) {
                    $query->where('modules.id', config('module.current_module_data')['id']);
                });
            })->whereIn('zone_id', json_decode($zone_id, true));
        })
            ->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orwhere('name', 'like', "%{$value}%")->orWhere('description', 'like', "%{$value}%");
                }
                $q->orWhereHas('translations', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('value', 'like', "%{$value}%");
                        };
                    });
                });
                $q->orWhereHas('tags', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('tag', 'like', "%{$value}%");
                        };
                    });
                });
                $q->orWhereHas('category.parent', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('name', 'like', "%{$value}%");
                        };
                    });
                });
                $q->orWhereHas('category', function ($query) use ($key) {
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('name', 'like', "%{$value}%");
                        };
                    });
                });
            })
            ->limit(50)
            ->get(['id', 'name', 'image']);

        $stores = Store::whereHas('zone.modules', function ($query) {
            $query->where('modules.id', config('module.current_module_data')['id']);
        })->withOpen($longitude ?? 0, $latitude ?? 0)->with([
                    'discount' => function ($q) {
                        return $q->validate();
                    }
                ])->weekday()->where(function ($q) use ($key) {
                    foreach ($key as $value) {
                        $q->orWhere('name', 'like', "%{$value}%");
                    }
                })
            ->when(config('module.current_module_data'), function ($query) use ($zone_id) {
                $query->module(config('module.current_module_data')['id']);
                if (!config('module.current_module_data')['all_zone_service']) {
                    $query->whereIn('zone_id', json_decode($zone_id, true));
                }
            })
            ->active()
            ->limit(50)
            ->select(['id', 'name', 'logo'])
            ->get();

        return [
            'items' => $items,
            'stores' => $stores
        ];

    }

    public function get_store_condition_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'store_id' => 'required',
            'limit' => 'required',
            'offset' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $zone_id = $request->header('zoneId');

        $type = $request->query('type', 'all');
        $limit = $request['limit'];
        $offset = $request['offset'];

        $paginator = Item::
            whereHas('module.zones', function ($query) use ($zone_id) {
                $query->whereIn('zones.id', json_decode($zone_id, true));
            })
            ->whereHas('store', function ($query) use ($zone_id) {
                $query->whereIn('zone_id', json_decode($zone_id, true))->whereHas('zone.modules', function ($query) {
                    $query->when(config('module.current_module_data'), function ($query) {
                        $query->where('modules.id', config('module.current_module_data')['id']);
                    });
                });
            })
            ->whereHas('pharmacy_item_details', function ($q) {
                return $q->whereNotNull('common_condition_id');
            })
            ->when(is_numeric($request->store_id), function ($qurey) use ($request) {
                $qurey->where('store_id', $request->store_id);
            })
            ->when(!is_numeric($request->store_id), function ($query) use ($request) {
                $query->whereHas('store', function ($q) use ($request) {
                    $q->where('slug', $request->store_id);
                });
            })
            ->active()->type($type)->latest()->paginate($limit, ['*'], 'page', $offset);
        $data = [
            'total_size' => $paginator->total(),
            'limit' => $limit,
            'offset' => $offset,
            'products' => $paginator->items()
        ];
        $data['products'] = Helpers::product_data_formatting($data['products'], true, false, app()->getLocale());
        return response()->json($data, 200);
    }

    public function get_popular_basic_products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'limit' => 'required',
            'offset' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $zone_id = $request->header('zoneId');
        $type = $request->query('type', 'all');
        $product_id = $request->query('product_id') ?? null;
        $min = $request->query('min_price');
        $max = $request->query('max_price');
        $limit = $request['limit'] ?? 25;
        $offset = $request['offset'] ?? 1;

        $items = ProductLogic::get_popular_basic_products($zone_id, $limit, $offset, $type, $request['store_id'], $request['category_id'], $min, $max, $product_id);
        $items['categories'] = $items['categories'];
        $items['products'] = Helpers::product_data_formatting($items['products'], true, false, app()->getLocale());
        return response()->json($items, 200);
    }
}
