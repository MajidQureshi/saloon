<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscription;
use App\SubscriptionDetail;
use App\AdminSetting;
use App\sub_plan_detail;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::orderBy('id', 'asc')->get();
        return view('admin.pages.subscription', compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {



        // $request->validate([
        //     'desc' => 'bail|required',
        //     'type' => 'bail|required',
        //     'discount' => 'bail|required|numeric',
        //     'min_discount_amount' => 'bail|required|numeric',
        //     'max_use' => 'bail|required|numeric',
        //     'start_date' => 'bail|required',
        //     'end_date' => 'bail|required|after:start_date',
        //     'min_point' => 'required_if:for_point,on'
        // ]);
        $setting = AdminSetting::find(1);
        $subscription = new Subscription();
        $subscription->name = $request->name;
        $subscription->small_description = $request->small_description;
        $subscription->description = $request->description;
        $subscription->old_price = $request->old_price;
        $subscription->new_price = $request->new_price;
        $subscription->icon = $request->icon;

        $subscription->save();
        return redirect('admin/subscriptions');
    }

    public function edit($id)
    {
        $subscription = Subscription::find($id);
        $setting = AdminSetting::find(1);
        return response()->json(['success' => true, 'data' => $subscription], 200);
    }

    public function loadSubscriptionFeature($id)
    {
        $subscription_feature = Subscription::with(['subscription_details'])->get()->find($id);
        return response()->json(['success' => true, 'data' => $subscription_feature], 200);
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'desc' => 'bail|required',
        //     'type' => 'bail|required',
        //     'discount' => 'bail|required|numeric',
        //     'min_discount_amount' => 'bail|required|numeric',
        //     'max_use' => 'bail|required|numeric',
        //     'start_date' => 'bail|required',
        //     'end_date' => 'bail|required|after:start_date',
        // ]);
        $setting = AdminSetting::find(1);
        $subscription = Subscription::find($id);

        $subscription->name = $request->name;
        $subscription->small_description = $request->small_description;
        $subscription->description = $request->description;
        $subscription->old_price = $request->old_price;
        $subscription->new_price = $request->new_price;
        $subscription->icon = $request->icon;

        $subscription->save();
        return response()->json(['success' => true, 'data' => $subscription, 'msg' => 'Subscription edit'], 200);
    }

    public function destroy($id)
    {
        $subscription = Subscription::find($id);
        $subscription->delete();
        return redirect('admin/subscriptions');
    }

    public function subscriptionFeatureStore(Request $request)
    {


        // print_r($request->all());
        // exit();

        $id_array = [];
        if ($request->status) {
            foreach ($request->status as $key => $data) {

                if ($data != 'true') {
                    $id_array[] = $data;
                    $sub_detail = SubscriptionDetail::find($data);
                    $sub_detail->status = 1;
                    $sub_detail->subscription_id = $request->subscription_id;
                    $sub_detail->feature = $request->feature[$key];
                    $sub_detail->save();
                } else {
                    $sub_detail = new SubscriptionDetail();
                    $sub_detail->status = ($data == 'true') ? 1 : 0;

                    $sub_detail->subscription_id = $request->subscription_id;
                    $sub_detail->feature = $request->feature[$key];
                    $sub_detail->save();

                    $new_feature_id = $sub_detail->id;
                    array_push($id_array, $new_feature_id);
                }
            }

            if ($id_array) {
                SubscriptionDetail::where('subscription_id', $request->subscription_id)
                    ->whereNotIn('id', $id_array)
                    ->update(['status' => 0]);
            }
        }

        return redirect('admin/subscriptions');
    }




    public function hideSubscription(Request $request)
    {
        $subscription = Subscription::find($request->subscriptionId);
        if ($subscription->status == 0) {
            $subscription->status = 1;
            $subscription->save();
        } else if ($subscription->status == 1) {
            $subscription->status = 0;
            $subscription->save();
        }
    }

    public function hideSubFeature(Request $request)
    {
        $sub_plan_detail = sub_plan_detail::find($request->sub_plan_id);
        if ($sub_plan_detail->status == 0) {
            $sub_plan_detail->status = 1;
            $sub_plan_detail->save();
        } else if ($sub_plan_detail->status == 1) {
            $sub_plan_detail->status = 0;
            $sub_plan_detail->save();
        }
    }


    public function subFeatures(Request $request)
    {

        $sub_features = sub_plan_detail::orderBy('id', 'asc')->get();
        return view('admin.pages.sub-feature', compact('sub_features'));
    }

    public function loadSubscriptions(Request $request)
    {


        $subscriptions = Subscription::get();
        return response()->json(['success' => true, 'data' => $subscriptions], 200);
    }

    public function subFeatureStore(Request $request)
    {

        if ($request->hdn_id) {
            $sub_plan_detail = sub_plan_detail::find($request->hdn_id);
        } else {
            $sub_plan_detail = new sub_plan_detail();
        }
        $sub_plan_detail->name = $request->name;
        $sub_plan_detail->sub_ids = implode(', ', $request->subscription);
        $sub_plan_detail->status = 1;
        $sub_plan_detail->save();

        return redirect('admin/sub-features');
    }

    public function editSubFeature($id)
    {
        $sub_plan_detail = sub_plan_detail::find($id);
        return response()->json(['success' => true, 'data' => $sub_plan_detail], 200);
    }
}
