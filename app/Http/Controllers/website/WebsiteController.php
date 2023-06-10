<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\PaymentSetting;
use Redirect;
use Carbon\Carbon;
use Auth;
use Config;
use OneSignal;
use App\Category;
use App\Service;
use App\Salon;
use App\Review;
use App\Gallery;
use App\Employee;
use App\AdminSetting;
use App\Booking;
use App\Address;
use App\Notification;
use App\AppNotification;
use App\User;
use App\Coupon;
use App\Template;
use App\Mail\CreateAppointment;
use App\Mail\AppCreateAppointment;
use App\Mail\EmpAppCreateAppointment;
use App\Mail\Welcome;
use Hash;
use App\Subscription;
use App\sub_plan_detail;



class WebsiteController extends Controller
{

    public function isexistuseremail(Request $request){
        $existuser = User::where('email', '=', $request->email)->first();
        if ($existuser === null) {
            return false;
        }
        return true;
    }

    public function login(Request $request)
    {
        // dd($request);
        if(isset($request->email)){
            // dd($request);

            $request->validate([
                'email' => 'bail|required|email',
                'password' => 'bail|required',
            ]);
            $userdata = array(
                'email' => $request->email,
                'password' => $request->password,
                'role' => 3,
            );
            $remember = $request->get('remember');
            if (Auth::attempt($userdata, $remember)) {
                $id = Auth::user()->id;
                if (Auth::user()->verify == 1) {
                    return redirect()->away('all-salons');
                    // redirect()->route('all-categories');
                    return response()->json(['msg' => "done", 'success' => true], 200);
                } else {
                    Auth::logout();
                    return response()->json(['msg' => "Verify your account", 'data' => $id, 'success' => false], 200);
                }
            } else {
                return redirect()->away('login')->withErrors(['error' => 'Invalid email or password']);
                // return response()->json(['error' => 'Invalid email or password'], 401);
            }

        }else{
            // dd('get');
            return view('website.pages.newlogin');
        }
                
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'bail|required|email',
    //         'password' => 'bail|required',
    //     ]);
    //     $userdata = array(
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'role' => 3,
    //     );
    //     $remember = $request->get('remember');
    //     if (Auth::attempt($userdata, $remember)) {
    //         $id = Auth::user()->id;
    //         if (Auth::user()->verify == 1) {
    //             return response()->json(['msg' => "done", 'success' => true], 200);
    //         } else {
    //             Auth::logout();
    //             return response()->json(['msg' => "Verify your account", 'data' => $id, 'success' => false], 200);
    //         }
    //     } else {
    //         return response()->json(['error' => 'Invalid email or password'], 401);
    //     }
    // }

    public function signup(Request $request)
    {

        return view('website.pages.newregister');
    }

    
    public function termsofservices()
    {

        return view('website.pages.termsofservices');
    }

    public function submitbusinessregister(Request $request)
    {
        // dd($request->hasFile('company_logo'));
        // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->verify = 1;
        $user->role = 2;
        $user->company_name = $request->company_name;
        $user->company_desc = $request->company_desc;
        $user->how_many_employees = $request->how_many_employees;
        $user->company_location = $request->company_location;
        $user->company_interest = $request->company_interest;
        $user->serve_your_customer = $request->serve_your_customer;
        $user->extra_charges_home_services = $request->extra_charges_home_services;
        $user->company_overview = $request->company_overview;
        $user->save();

        $salon = new Salon();
        if($request->hasFile('company_logo'))
        {
            $image = $request->file('company_logo');
            $name = 'salon_'.uniqid().'.'. $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images/salon logos');
            $image->move($destinationPath, $name);
            $salon->image = $name;
            $salon->logo = $name;
        }
        if($request->hasFile('licence'))
        {
            $image = $request->file('licence');
            $name = 'salon_'.uniqid().'.'. $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images/salon logos');
            $image->move($destinationPath, $name);
            $salon->license_image = $name;
        }
        if($request->hasFile('id_copy'))
        {
            $image = $request->file('id_copy');
            $name = 'salon_'.uniqid().'.'. $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images/salon logos');
            $image->move($destinationPath, $name);
            $salon->id_card = $name;
        }
        // if($request->hasFile('logo'))
        // {
        //     $image = $request->file('logo');
        //     $name = 'salonLogo_'.uniqid().'.'. $image->getClientOriginalExtension();
        //     $destinationPath = public_path('/storage/images/salon logos');
        //     $image->move($destinationPath, $name);
        //     $salon->logo = $name;
        // }

        $salon_timer = explode(" - ",$request->opening_closing_times);

        $salon->sun = '{"open":"'.$salon_timer[0].'","close":"'.$salon_timer[1].'"}';
        $salon->mon = '{"open":"'.$salon_timer[0].'","close":"'.$salon_timer[1].'"}';
        $salon->tue = '{"open":"'.$salon_timer[0].'","close":"'.$salon_timer[1].'"}';
        $salon->wed = '{"open":"'.$salon_timer[0].'","close":"'.$salon_timer[1].'"}';
        $salon->thu = '{"open":"'.$salon_timer[0].'","close":"'.$salon_timer[1].'"}';
        $salon->fri = '{"open":"'.$salon_timer[0].'","close":"'.$salon_timer[1].'"}';
        $salon->sat = '{"open":"'.$salon_timer[0].'","close":"'.$salon_timer[1].'"}';
        
        $salon->name = $request->company_name;
        $salon->desc = $request->company_desc;
        $salon->gender = $request->company_interest;
        $salon->give_service = "Salon";//$request->give_service;
        $salon->home_charges = $request->extra_charges_home_services;
        if($request->give_service == "Salon") {
            $salon->home_charges = '0';
        }

        $salon->address = $request->company_location;
        $salon->zipcode = $request->zipcode ?? '';
        $salon->city = $request->company_location;//ucfirst($request->city);
        $salon->state = $request->company_location;//ucfirst($request->state) ?? '';
        $salon->country = $request->company_location;//ucfirst($request->country);
        // $salon->website = $request->website;
        $salon->phone = $request->phone;

       
        // if($request->sunopen == null || $request->sunclose == null){
        //     $salon->sun = json_encode(array('open' => $request->sunopen,'close' => $request->sunclose));
        // } else {
        //     $salon->sun = json_encode(array('open' => Carbon::parse($request->sunopen)->format('H:i'),'close' => Carbon::parse($request->sunclose)->format('H:i')));
        // }
        
        // if($request->monopen == null || $request->monclose == null){
        //     $salon->mon = json_encode(array('open' => $request->monopen,'close' => $request->monclose));
        // } else {
        //     $salon->mon = json_encode(array('open' => Carbon::parse($request->monopen)->format('H:i'),'close' => Carbon::parse($request->monclose)->format('H:i')));
        // }
  
        // if($request->tueopen == null || $request->tueclose == null){
        //     $salon->tue = json_encode(array('open' => $request->tueopen,'close' => $request->tueclose));
        // } else {
        //     $salon->tue = json_encode(array('open' => Carbon::parse($request->tueopen)->format('H:i'),'close' => Carbon::parse($request->tueclose)->format('H:i')));
        // }

        // if($request->wedopen == null || $request->wedclose == null){
        //     $salon->wed = json_encode(array('open' => $request->wedopen,'close' => $request->wedclose));
        // } else {
        //     $salon->wed = json_encode(array('open' => Carbon::parse($request->wedopen)->format('H:i'),'close' => Carbon::parse($request->wedclose)->format('H:i')));
        // }

        // if($request->thuopen == null || $request->thuclose == null){
        //     $salon->thu = json_encode(array('open' => $request->thuopen,'close' => $request->thuclose));
        // } else {
        //     $salon->thu = json_encode(array('open' => Carbon::parse($request->thuopen)->format('H:i'),'close' => Carbon::parse($request->thuclose)->format('H:i')));
        // }

        // if($request->friopen == null || $request->friclose == null){
        //     $salon->fri = json_encode(array('open' => $request->friopen,'close' => $request->friclose));
        // } else {
        //     $salon->fri = json_encode(array('open' => Carbon::parse($request->friopen)->format('H:i'),'close' => Carbon::parse($request->friclose)->format('H:i')));
        // }

        // if($request->satopen == null || $request->satclose == null){
        //     $salon->sat = json_encode(array('open' => $request->satopen,'close' => $request->satclose));
        // } else {
        //     $salon->sat = json_encode(array('open' => Carbon::parse($request->satopen)->format('H:i'),'close' => Carbon::parse($request->satclose)->format('H:i')));
        // }

        $salon->longitude = 'null';// $request->long;
        $salon->latitude = 'null'; //$request->lat;
        $salon->owner_id = $user->id;
        $salon->save();



        return true;
        // return response()->json(['success' => true,'data' => $category, 'msg' => 'category create'], 200);
                
    }
        
    public function submitindividual(Request $request)
    {

        $existuser = User::where('email', '=', $request->email)->first();
        if ($existuser === null) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->code = $request->phonecode;
            $user->password = Hash::make($request->password);
            $user->verify = 1;
            $user->role = 3;        
            $user->save();
        }else{
            return Redirect::back()->withWarning( 'User Exist!' );
            // return redirect('/signup')->with('flash_message', 'User Exist!');
        }

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->code = $request->phonecode;
        // $user->password = Hash::make($request->password);
        // $user->verify = 1;
        // $user->role = 3;        
        // $user->save();
        return redirect('/login');
        // redirect()->url('login');
        // return response()->json(['success' => true,'data' => $category, 'msg' => 'category create'], 200);
                
    }
    
    public function signupbusiness(Request $request)
    {

        return view('website.pages.newbusinessregister');
    }
    
    public function forgetpassword(Request $request)
    {

        return view('website.pages.newforgetpassword');
    }
    
    public function submitsupport(Request $request)
    {
        // dd($request);
        // $detail['UserName'] = "Majid";
        // $detail['AppName'] = "Meetendo";
        // Mail::to("majid.dev@gmail.com")->cc("majid.mernprofessional@gmail.com")->send(new Welcome('hi', $detail, 'tariq'));
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->code = $request->phonecode;
        // $user->password = Hash::make($request->password);
        // $user->verify = 1;
        // $user->role = 3;        
        // $user->save();
        // return redirect('/login');
        // redirect()->url('login');
        // return response()->json(['success' => true,'data' => $category, 'msg' => 'category create'], 200);
                
    }
    

    // public function register(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'bail|required',
    //         'email' => 'bail|required|email|unique:users',
    //         'code' => 'bail|required',
    //         'phone' => 'bail|required|numeric',
    //         'password' => 'bail|required|min:8',
    //         'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
    //     ]);

    //     $user_verify = AdminSetting::first()->user_verify;
    //     $user_verify_sms = AdminSetting::first()->user_verify_sms;
    //     $user_verify_email = AdminSetting::first()->user_verify_email;
    //     if ($user_verify == 0)
    //         $verify = 1;
    //     else
    //         $verify = 0;
    //     $user = User::create(
    //         [
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'code' => $request->code,
    //             'phone' => $request->phone,
    //             'verify' => $verify,
    //             'password' => Hash::make($request->password),
    //         ]
    //     );

    //     if ($user) {
    //         $setting = AdminSetting::find(1);
    //         if (config('point.active') == 1) {
    //             $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //             $code = substr(str_shuffle($permitted_chars), 0, 6);

    //             $user->referral_code = $code;
    //             if (isset($request->friend_code)) {
    //                 $find_user = User::where('referral_code', $request->friend_code)->first();
    //                 if (isset($find_user)) {
    //                     $user->referred_by = $find_user->id;
    //                     if ($setting->is_point == 1) {
    //                         $find_user->total_points = $find_user->total_points + $setting->referral_point;
    //                         $find_user->remain_points = $find_user->remain_points + $setting->referral_point;
    //                         $find_user->save();
    //                     }
    //                 }
    //             }
    //             $user->save();
    //         }
    //         if ($user->verify == 1) {
    //             $content = Template::where('title', 'Welcome')->first()->mail_content;
    //             $subject = Template::where('title', 'Welcome')->first()->subject;
    //             $detail['UserName'] = $user->name;
    //             $detail['AppName'] = AdminSetting::first()->app_name;
    //             $mail_enable = AdminSetting::first()->mail;

    //             if ($mail_enable) {
    //                 try {
    //                     Mail::to($user->email)->send(new Welcome($content, $detail, $subject));
    //                 } catch (\Throwable $th) {
    //                 }
    //             }
    //         } else {
    //             $otp = rand(1111, 9999);
    //             $user->otp = $otp;
    //             $user->save();

    //             $content = Template::where('title', 'User Verification')->first()->mail_content;
    //             $subject = Template::where('title', 'User Verification')->first()->subject;
    //             $msg_content = Template::where('title', 'User Verification')->first()->msg_content;
    //             $detail['UserName'] = $user->name;
    //             $detail['OTP'] = $otp;
    //             $detail['AppName'] = AdminSetting::first()->app_name;

    //             if ($user_verify_sms == 1) {
    //                 $sid = AdminSetting::first()->twilio_acc_id;
    //                 $token = AdminSetting::first()->twilio_auth_token;
    //                 $data = ["{{UserName}}", "{{OTP}}", "{{AppName}}"];
    //                 $message1 = str_replace($data, $detail, $msg_content);
    //                 try {
    //                     $client = new Client($sid, $token);

    //                     $client->messages->create(
    //                         $user->code . $user->phone,
    //                         array(
    //                             'from' => AdminSetting::first()->twilio_phone_no,
    //                             'body' => $message1
    //                         )
    //                     );
    //                 } catch (\Throwable $th) {
    //                 }
    //             }
    //             if ($user_verify_email == 1) {
    //                 try {
    //                     Mail::to($user->email)->send(new OTP($content, $detail, $subject));
    //                 } catch (\Throwable $th) {
    //                 }
    //             }
    //             return response()->json(['msg' => 'Verify your account', 'data' => $user->id, 'success' => true, 'send' => 'verify']);
    //         }
    //         return response()->json(['success' => true, 'message' => 'User created successfully!', 'send' => 'login']);
    //     } else {
    //         return response()->json(['error' => 'User not Created'], 401);
    //     }
    // }

    public function sendotp(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
        ]);
        $user = User::where([['role', 3], ['email', $request->email]])->first();
        if ($user) {
            if ($user->status == 1) {
                $otp = rand(1111, 9999);
                $user->otp = $otp;
                $user->save();

                $content = Template::where('title', 'User Verification')->first()->mail_content;
                $subject = Template::where('title', 'User Verification')->first()->subject;
                $msg_content = Template::where('title', 'User Verification')->first()->msg_content;
                $detail['UserName'] = $user->name;
                $detail['OTP'] = $otp;
                $detail['AppName'] = AdminSetting::first()->app_name;
                $detail['AppLogo'] = asset('storage/images/app/' . AdminSetting::first()->black_logo);
                $user_verify_email = AdminSetting::first()->user_verify_email;
                $mail_enable = AdminSetting::first()->mail;
                $user_verify_sms = AdminSetting::first()->user_verify_sms;
                $sms_enable = AdminSetting::first()->sms;
                if ($user_verify_email) {
                    if ($mail_enable) {
                        try {
                            Mail::to($user->email)->send(new OTP($content, $detail, $subject));
                        } catch (\Throwable $th) {
                        }
                    }
                }
                if ($user_verify_sms) {
                    if ($sms_enable == 1) {
                        $sid = AdminSetting::first()->twilio_acc_id;
                        $token = AdminSetting::first()->twilio_auth_token;
                        $data = ["{{UserName}}", "{{OTP}}", "{{AppName}}"];
                        $message1 = str_replace($data, $detail, $msg_content);
                        try {
                            $client = new Client($sid, $token);

                            $client->messages->create(
                                $user->code . $user->phone,
                                array(
                                    'from' => AdminSetting::first()->twilio_phone_no,
                                    'body' => $message1
                                )
                            );
                        } catch (\Throwable $th) {
                        }
                    }
                }
                return response()->json(['msg' => 'OTP sended', 'data' => $user->id, 'success' => true], 200);
            } else {
                return response()->json(['error' => 'You are blocked by admin'], 401);
            }
        } else {
            return response()->json(['error' => 'User not found'], 401);
        }
    }

    public function checkotp(Request $request)
    {
        $request->validate([
            'otp' => 'bail|required|digits:4',
            'user_id' => 'bail|required',
        ]);

        $user = User::find($request->user_id);
        if ($user->otp == $request->otp) {
            $user->verify = 1;
            $user->save();

            $content = Template::where('title', 'Welcome')->first()->mail_content;
            $subject = Template::where('title', 'Welcome')->first()->subject;
            $detail['UserName'] = $user->name;
            $detail['AppName'] = AdminSetting::first()->app_name;
            $mail_enable = AdminSetting::first()->mail;

            if ($mail_enable) {
                try {
                    Mail::to($user->email)->send(new Welcome($content, $detail, $subject));
                } catch (\Throwable $th) {
                }
            }

            return response()->json(['msg' => 'OTP match', 'success' => true], 200);
        } else {
            return response()->json(['error' => 'Wrong OTP'], 401);
        }
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
        ]);
        $user = User::where([['role', 3], ['email', $request->email]])->first();
        if ($user) {
            if ($user->status == 1) {
                $password = rand(11111111, 99999999);
                $user->password = Hash::make($password);
                $user->save();

                $content = Template::where('title', 'Forgot Password')->first()->mail_content;
                $subject = Template::where('title', 'Forgot Password')->first()->subject;
                $msg_content = Template::where('title', 'Forgot Password')->first()->msg_content;
                $detail['UserName'] = $user->name;
                $detail['NewPassword'] = $password;
                $detail['AppName'] = AdminSetting::first()->app_name;
                $mail_enable = AdminSetting::first()->mail;
                $sms_enable = AdminSetting::first()->sms;
                if ($mail_enable) {
                    try {
                        Mail::to($user->email)->send(new ForgetPassword($content, $detail, $subject));
                    } catch (\Throwable $th) {
                    }
                }
                if ($sms_enable == 1) {
                    $sid = AdminSetting::first()->twilio_acc_id;
                    $token = AdminSetting::first()->twilio_auth_token;
                    $data = ["{{UserName}}", "{{NewPassword}}", "{{AppName}}"];
                    $message1 = str_replace($data, $detail, $msg_content);
                    try {
                        $client = new Client($sid, $token);

                        $client->messages->create(
                            $user->code . $user->phone,
                            array(
                                'from' => AdminSetting::first()->twilio_phone_no,
                                'body' => $message1
                            )
                        );
                    } catch (\Throwable $th) {
                    }
                }
                return response()->json(['msg' => 'Password sended', 'success' => true], 200);
            } else {
                return response()->json(['error' => 'You are blocked by admin'], 401);
            }
        } else {
            return response()->json(['error' => 'Invalid email address'], 401);
        }
    }

    public function index()
    {
        // dd('tset');
        if (Auth::check()) {
            if (Auth::user()->role != 3) {
                Auth::logout();
            }
        }
        // Category
        $categories = Category::where('status', 1)->get(['cat_id', 'name', 'image', 'banner']);
        foreach ($categories as $cat) {
            $ar = array();
            $service = Service::where([['status', 1], ['cat_id', $cat->cat_id]])->get();
            foreach ($service as $key)
                array_push($ar, $key->salon_id);
            $cat->salonCount = Salon::whereIn('salon_id', $ar)->where('status', 1)->count();
        }

        $categories = $categories->sortByDesc('salonCount')->values();

        // Salon 1234
        $salons = Salon::where('status', 1)->get();
        $salons = $salons->sortByDesc('completedBooking');
        $salons = $salons->take(8);

        // $salons = Salon::select('salon.name as sname')->rightJoin('service', 'service.salon_id', '=', 'salon.salon_id')->where('salon.status', 1)->get();

        // dd($categories);
        // dd($salons);

        return view('website.pages.home', compact('categories', 'salons'));
    }

    public function allCat()
    {
        $categories = Category::where('status', 1)->get(['cat_id', 'name', 'image', 'banner']);
        foreach ($categories as $cat) {
            $ar = array();
            $service = Service::where([['status', 1], ['cat_id', $cat->cat_id]])->get();
            foreach ($service as $key)
                array_push($ar, $key->salon_id);
            $cat->salonCount = Salon::whereIn('salon_id', $ar)->where('status', 1)->count();
        }
        $categories = $categories->sortByDesc('salonCount')->values();
        return view('website.pages.allCat', compact('categories'));
    }

    public function singleSalon(Request $request, $id, $salonname)
    {
        // dd('test');
        $salon = Salon::find($id);
        $day = strtolower(Carbon::now()->format('l'));
        $start_time = new Carbon($salon->$day['open']);
        $close_time = new Carbon($salon->$day['close']);

        if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
            $today = 'Close';
        } else {
            $start_time = $start_time->format('g:i A');
            $close_time = $close_time->format('g:i A');
            $today = $start_time . '-' . $close_time;
        }

        $salon->review = Review::where([['salon_id', $salon->salon_id], ['report', 1]])
            ->orderBy('review_id', 'desc')->paginate(3);
        if ($request->ajax()) {
            $view = view('website.pages.review', compact('salon'))->render();
            return response()->json(['html' => $view, 'meta' => $salon->review]);
        }

        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $times = [];
        foreach ($days as $key => $day) {
            $start_time = new Carbon($salon->$day['open']);
            $close_time = new Carbon($salon->$day['close']);

            if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
                $open = 'Close';
            } else {
                $start_time = $start_time->format('g:i A');
                $close_time = $close_time->format('g:i A');
                $open = $start_time . '-' . $close_time;
            }
            $ab = [$day => $open];
            array_push($times, $ab);
        }
        $salon->gallery = Gallery::where([['salon_id', $id], ['status', 1]])->orderBy('gallery_id', 'desc')->get('image');
        $salon->serviceCount = Service::where([['salon_id', $id], ['status', 1], ['isdelete', 0]])->count();
        $salon->categories = Category::where('status', 1)->get();
        foreach ($salon->categories as $key => $cat) {
            $cat->services = Service::where([['salon_id', $id], ['cat_id', $cat->cat_id], ['status', 1], ['isdelete', 0]])->get();
            if (count($cat->services) == 0) {
                unset($salon->categories[$key]);
            }
        }
        $salons = Salon::where('status', 1)->get();
        $salons = $salons->sortByDesc('completedBooking');
        $salons = $salons->take(8);
        // dd($salon->categories[0]->services);
        $gap = (count($salon->categories[0]->services) < 6 ? 0 : count($salon->categories[0]->services));
        $setting = AdminSetting::first(['currency']);
        // return view('website.pages.singleSalon', compact('salon', 'today', 'times', 'setting'));
        return view('website.pages.newsinglesalon', compact('salon', 'today', 'times', 'setting', 'salons', 'gap'));
    }

    public function catSalon($id, $catname)
    {
        $ar = array();
        $service = Service::where([['status', 1], ['cat_id', $id]])->get();
        foreach ($service as $key)
            array_push($ar, $key->salon_id);
        $salon = Salon::whereIn('salon_id', $ar)->where('status', 1)->get();

        return view('website.pages.catSalon', compact('salon'));
    }

    public function bookingPage(Request $request, $id, $salonname)
    {
        $salon = Salon::find($id);
        $day = strtolower(Carbon::now()->format('l'));
        $start_time = new Carbon($salon->$day['open']);
        $close_time = new Carbon($salon->$day['close']);

        if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
            $today = 'Close';
        } else {
            $start_time = $start_time->format('g:i A');
            $close_time = $close_time->format('g:i A');
            $today = $start_time . '-' . $close_time;
        }
        $salon->serviceCount = Service::where([['salon_id', $id], ['status', 1], ['isdelete', 0]])->count();
        $salon->categories = Category::where('status', 1)->get();
        foreach ($salon->categories as $key => $cat) {
            $cat->services = Service::where([['salon_id', $id], ['cat_id', $cat->cat_id], ['status', 1], ['isdelete', 0]])->get();
            if (count($cat->services) == 0) {
                unset($salon->categories[$key]);
            }
        }
        $emps = [];
        $setting = AdminSetting::first(['currency_symbol']);
        $setting->stripe_public_key = PaymentSetting::first()->stripe_public_key;
        if ($request->ajax()) {
            $emps = $this->getEmp($request->all());
            $view = view('website.pages.empList', compact('emps'))->render();
            return response()->json(['html' => $view, 'meta' => $emps]);
        }
        $addresses = [];
        if (Auth::check()) {
            $addresses = Address::where('user_id', Auth::user()->id)->get();
        }

        // dd($salon);

        $coupons = $this->getCoupon();
        return view('website.pages.newbookingPageOne', compact('salon', 'setting', 'today', 'emps', 'addresses', 'coupons'));
    }
    
    public function bookingPageStepTwo(Request $request, $id, $salonname)
    {
        $salon = Salon::find($id);
        $day = strtolower(Carbon::now()->format('l'));
        $start_time = new Carbon($salon->$day['open']);
        $close_time = new Carbon($salon->$day['close']);

        if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
            $today = 'Close';
        } else {
            $start_time = $start_time->format('g:i A');
            $close_time = $close_time->format('g:i A');
            $today = $start_time . '-' . $close_time;
        }
        $salon->serviceCount = Service::where([['salon_id', $id], ['status', 1], ['isdelete', 0]])->count();
        $salon->categories = Category::where('status', 1)->get();
        foreach ($salon->categories as $key => $cat) {
            $cat->services = Service::where([['salon_id', $id], ['cat_id', $cat->cat_id], ['status', 1], ['isdelete', 0]])->get();
            if (count($cat->services) == 0) {
                unset($salon->categories[$key]);
            }
        }
        $emps = [];
        $setting = AdminSetting::first(['currency_symbol']);
        $setting->stripe_public_key = PaymentSetting::first()->stripe_public_key;
        if ($request->ajax()) {
            $emps = $this->getEmp($request->all());
            $view = view('website.pages.empList', compact('emps'))->render();
            return response()->json(['html' => $view, 'meta' => $emps]);
        }
        $addresses = [];
        if (Auth::check()) {
            $addresses = Address::where('user_id', Auth::user()->id)->get();
        }

        // dd($salon);

        $coupons = $this->getCoupon();
        return view('website.pages.newbookingPageTwo', compact('salon', 'setting', 'today', 'emps', 'addresses', 'coupons'));
    }

    public function bookingPageStepThree(Request $request, $id, $salonname)
    {
        $salon = Salon::find($id);
        $day = strtolower(Carbon::now()->format('l'));
        $start_time = new Carbon($salon->$day['open']);
        $close_time = new Carbon($salon->$day['close']);

        if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
            $today = 'Close';
        } else {
            $start_time = $start_time->format('g:i A');
            $close_time = $close_time->format('g:i A');
            $today = $start_time . '-' . $close_time;
        }
        $salon->serviceCount = Service::where([['salon_id', $id], ['status', 1], ['isdelete', 0]])->count();
        $salon->categories = Category::where('status', 1)->get();
        foreach ($salon->categories as $key => $cat) {
            $cat->services = Service::where([['salon_id', $id], ['cat_id', $cat->cat_id], ['status', 1], ['isdelete', 0]])->get();
            if (count($cat->services) == 0) {
                unset($salon->categories[$key]);
            }
        }
        $emps = [];
        $setting = AdminSetting::first(['currency_symbol']);
        $setting->stripe_public_key = PaymentSetting::first()->stripe_public_key;
        if ($request->ajax()) {
            $emps = $this->getEmp($request->all());
            $view = view('website.pages.empList', compact('emps'))->render();
            return response()->json(['html' => $view, 'meta' => $emps]);
        }
        $addresses = [];
        if (Auth::check()) {
            $addresses = Address::where('user_id', Auth::user()->id)->get();
        }

        // dd($emps);

        $coupons = $this->getCoupon();
        return view('website.pages.newbookingPageThree', compact('salon', 'setting', 'today', 'emps', 'addresses', 'coupons'));
    }

    public function bookingPageStepFour(Request $request, $id, $salonname)
    {
        $salon = Salon::find($id);
        $day = strtolower(Carbon::now()->format('l'));
        $start_time = new Carbon($salon->$day['open']);
        $close_time = new Carbon($salon->$day['close']);

        if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
            $today = 'Close';
        } else {
            $start_time = $start_time->format('g:i A');
            $close_time = $close_time->format('g:i A');
            $today = $start_time . '-' . $close_time;
        }
        $salon->serviceCount = Service::where([['salon_id', $id], ['status', 1], ['isdelete', 0]])->count();
        $salon->categories = Category::where('status', 1)->get();
        foreach ($salon->categories as $key => $cat) {
            $cat->services = Service::where([['salon_id', $id], ['cat_id', $cat->cat_id], ['status', 1], ['isdelete', 0]])->get();
            if (count($cat->services) == 0) {
                unset($salon->categories[$key]);
            }
        }
        $emps = [];
        $setting = AdminSetting::first(['currency_symbol']);
        $setting->stripe_public_key = PaymentSetting::first()->stripe_public_key;
        if ($request->ajax()) {
            $emps = $this->getEmp($request->all());
            $view = view('website.pages.empList', compact('emps'))->render();
            return response()->json(['html' => $view, 'meta' => $emps]);
        }
        $addresses = [];
        if (Auth::check()) {
            $addresses = Address::where('user_id', Auth::user()->id)->get();
        }

        // dd($salon);

        $coupons = $this->getCoupon();
        return view('website.pages.newbookingPageFour', compact('salon', 'setting', 'today', 'emps', 'addresses', 'coupons'));
    }

    public function bookingPageStepFive(Request $request, $id, $salonname)
    {
        // dd($request);
        $salon = Salon::find($id);
        $day = strtolower(Carbon::now()->format('l'));
        $start_time = new Carbon($salon->$day['open']);
        $close_time = new Carbon($salon->$day['close']);

        if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
            $today = 'Close';
        } else {
            $start_time = $start_time->format('g:i A');
            $close_time = $close_time->format('g:i A');
            $today = $start_time . '-' . $close_time;
        }
        $salon->serviceCount = Service::where([['salon_id', $id], ['status', 1], ['isdelete', 0]])->count();
        $salon->categories = Category::where('status', 1)->get();
        foreach ($salon->categories as $key => $cat) {
            $cat->services = Service::where([['salon_id', $id], ['cat_id', $cat->cat_id], ['status', 1], ['isdelete', 0]])->get();
            if (count($cat->services) == 0) {
                unset($salon->categories[$key]);
            }
        }
        $emps = [];
        $setting = AdminSetting::first(['currency_symbol']);
        $setting->stripe_public_key = PaymentSetting::first()->stripe_public_key;
        if ($request->ajax()) {
            $emps = $this->getEmp($request->all());
            $view = view('website.pages.empList', compact('emps'))->render();
            return response()->json(['html' => $view, 'meta' => $emps]);
        }
        $addresses = [];
        if (Auth::check()) {
            $addresses = Address::where('user_id', Auth::user()->id)->get();
        }

        // dd($salon);

        // Stripe

        // Enter Your Stripe Secret
        // \Stripe\Stripe::setApiKey('sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV');
                        
        // $amount = $request->amount;
        // $amount *= 100;
        // $amount = (int) $amount;
        $payment_desc = $request->description;
        // $payment_intent = \Stripe\PaymentIntent::create([
        //     'description' => $request->description,
        //     'amount' => $amount,
        //     'currency' => 'USD',
        //     // 'description' => 'Payment From Meetendo',
        //     'payment_method_types' => ['card'],
        // ]);
        // $intent = $payment_intent->client_secret;
        // dd($intent);
        // return view('checkout.credit-card',compact('intent'));


        //////////////////

        $coupons = $this->getCoupon();
        return view('website.pages.newbookingPageFive', compact('payment_desc', 'salon', 'setting', 'today', 'emps', 'addresses', 'coupons'));
    }

    public function bookingbooked(Request $request, $id, $salonname)
    {
        // \Stripe\Stripe::setApiKey('sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV');
        // $customer = \Stripe\Customer::create(array(
        //     "address" => [
        //             "line1" => "Virani Chowk",
        //             "postal_code" => "360001",
        //             "city" => "Rajkot",
        //             "state" => "GJ",
        //             "country" => "IN",
        //         ],
        //     "email" => "demo@gmail.com",
        //     "name" => $request->account_name,
        //     // "source" => $request->stripeToken
        //  ));
        // dd($customer->name);
        // dd($request);




        \Stripe\Stripe::setApiKey('sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV');
        // Stripe\Stripe::setApiKey("sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV");
    
        \Stripe\Charge::create ([
                "amount" => $request->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payer Name: ".$request->account_name.",".$request->payment_desc
        ]);

        $salon = Salon::find($id);
        $day = strtolower(Carbon::now()->format('l'));
        $start_time = new Carbon($salon->$day['open']);
        $close_time = new Carbon($salon->$day['close']);

        if ($salon->$day['open'] == null && $salon->$day['close'] == null) {
            $today = 'Close';
        } else {
            $start_time = $start_time->format('g:i A');
            $close_time = $close_time->format('g:i A');
            $today = $start_time . '-' . $close_time;
        }
        $salon->serviceCount = Service::where([['salon_id', $id], ['status', 1], ['isdelete', 0]])->count();
        $salon->categories = Category::where('status', 1)->get();
        foreach ($salon->categories as $key => $cat) {
            $cat->services = Service::where([['salon_id', $id], ['cat_id', $cat->cat_id], ['status', 1], ['isdelete', 0]])->get();
            if (count($cat->services) == 0) {
                unset($salon->categories[$key]);
            }
        }
        $emps = [];
        $setting = AdminSetting::first(['currency_symbol']);
        $setting->stripe_public_key = PaymentSetting::first()->stripe_public_key;
        if ($request->ajax()) {
            $emps = $this->getEmp($request->all());
            $view = view('website.pages.empList', compact('emps'))->render();
            return response()->json(['html' => $view, 'meta' => $emps]);
        }
        $addresses = [];
        if (Auth::check()) {
            $addresses = Address::where('user_id', Auth::user()->id)->get();
        }

        // dd($salon);

     
        $coupons = $this->getCoupon();
        return view('website.pages.newsuccessfullybooked', compact('salon', 'setting', 'today', 'emps', 'addresses', 'coupons'));
    }

    public function timeSlot(Request $request)
    {
        $salon = Salon::find($request->salon_id);
        $master = array();
        $day = strtolower(Carbon::parse($request->date)->format('l'));
        $salon = Salon::find($salon->salon_id)->$day;
        $start_time = new Carbon($request['date'] . ' ' . $salon['open']);

        $end_time = new Carbon($request['date'] . ' ' . $salon['close']);
        $diff_in_minutes = $start_time->diffInMinutes($end_time);
        for ($i = 0; $i <= $diff_in_minutes; $i += 30) {
            if ($start_time >= $end_time) {
                break;
            } else {
                $temp['start_time'] = $start_time->format('h:i A');
                $temp['end_time'] = $start_time->addMinutes('30')->format('h:i A');
                if (Carbon::parse($request->date)->format('Y-m-d') == date('Y-m-d')) {
                    if (strtotime(date("h:i A")) < strtotime($temp['start_time'])) {
                        array_push($master, $temp);
                    }
                } else {
                    array_push($master, $temp);
                }
            }
        }

        if (count($master) == 0) {
            return response()->json(['msg' => 'Day off', 'success' => false], 200);
        } else {
            return response()->json(['msg' => 'Time slots', 'data' => $master, 'success' => true], 200);
        }
    }

    public function getEmp($request)
    {
        $emp_array = array();
        $emps_all = Employee::where([['salon_id', $request['salon_id']], ['status', 1], ['give_service', $request['booking_at']]])
            ->orWhere([['salon_id', $request['salon_id']], ['status', 1], ['give_service', 'Both']])
            ->get();
        $book_service = $request['service'];

        $duration = Service::whereIn('service_id', $book_service)->sum('time') - 1;
        foreach ($emps_all as $emp) {
            $emp_service = json_decode($emp->service_id);
            foreach ($book_service as $ser) {
                if (in_array($ser, $emp_service)) {
                    array_push($emp_array, $emp->emp_id);
                }
            }
        }
        $master =  array();
        $emps = Employee::whereIn('emp_id', $emp_array)->get();
        $time = new Carbon($request['date'] . ' ' . $request['start_time']);
        $day = strtolower(Carbon::parse($request['date'])->format('l'));
        $date = $request['date'];
        foreach ($emps as $emp) {
            $employee = $emp->$day;

            $start_time = new Carbon($request['date'] . ' ' . $employee['open']);
            $end_time = new Carbon($request['date'] . ' ' . $employee['close']);
            $end_time = $end_time->subMinutes(1);
            if ($time->between($start_time, $end_time)) {
                array_push($master, $emp);
            }
        }

        $emps_final = array();
        foreach ($master as $emp) {
            $booking = Booking::where([['emp_id', $emp->emp_id], ['date', $date], ['start_time', $request['start_time']], ['booking_status', 'Approved']])
                ->orWhere([['emp_id', $emp->emp_id], ['date', $date], ['start_time', $request['start_time']], ['booking_status', 'Pending']])
                ->get();
            if (count($booking) == 0) {
                array_push($emps_final, $emp);
            }
        }
        $new = array();
        foreach ($emps_final as $emp) {
            array_push($new, $emp->emp_id);
        }
        $emps_final_1 = Employee::whereIn('emp_id', $new)->get();

        if (count($emps_final_1) > 0) {
            return $emps_final_1;
        } else {
            $emps_final_1 = [];
            return $emps_final_1;
        }
    }

    public function getCoupon()
    {
        $coupons = Coupon::where('status', 1)->get();
        $arr = array();
        foreach ($coupons as $key => $coupon) {

            $end_date = Carbon::parse($coupon->end_date)->addDays(1);
            $check = Carbon::now()->between($coupon->start_date, $end_date);
            $setting = AdminSetting::first();
            if ($coupon->max_use > $coupon->use_count && $check == 1) {
                if (config('point.active') == 1 && $setting->is_point == 1) {
                    if ($coupon->for_point == 1) {
                        $user = User::find(Auth::user()->id);
                        if ($user->remain_points < $coupon->min_point) {
                            unset($coupons[$key]);
                        }
                    }
                }
            } else {
                unset($coupons[$key]);
            }
        }

        return $coupons;
    }

    public function useCoupon(Request $request)
    {
        $coupon = Coupon::find($request->coupon_id);
        $cost = $request->cost;
        if ($coupon->type == "Percentage") {
            $data['discount'] = ($cost * $coupon->discount) / 100;
            $data['amount'] = $cost - $data['discount'];
        } else {
            $data['discount'] = $coupon->discount;
            $data['amount']  = $cost - $coupon->discount;
        }

        return response()->json(['msg' => 'amount', 'data' => $data, 'success' => true], 200);
    }

    public function booking(Request $request)
    {
        $booking = new Booking();
        $salon = Salon::find($request->salon_id);
        $book_service = json_encode($request->service_id);
        $duration = Service::whereIn('service_id', $request->service_id)->sum('time');

        $start_time = new Carbon($request['date'] . ' ' . $request['timeslot']);
        $booking->end_time = $start_time->addMinutes($duration)->format('h:i A');
        $booking->salon_id = $request->salon_id;
        $booking->emp_id = $request->emp_id;
        $booking->service_id = $book_service;
        $booking->payment = $request->payment;
        $booking->start_time = $request->timeslot;
        $booking->date = $request->date;
        $booking->payment_type = $request->payment_type;

        if ($salon->give_service == "Both") {
            $booking->booking_at = $request->service_at;
            if ($request->service_at == "Home") {
                $booking->extra_charges = $salon->home_charges;
                $booking->address_id = $request->address;
            } else {
                $booking->extra_charges = 0;
                $booking->address_id = null;
            }
        } elseif ($salon->give_service == "Salon") {
            $booking->booking_at = "Salon";
            $booking->extra_charges = 0;
            $booking->address_id = null;
        } elseif ($salon->give_service == "Home") {
            $booking->booking_at = "Home";
            $booking->extra_charges = $salon->home_charges;
            $booking->address_id = $request->address;
        }

        if ($request->payment_type == "STRIPE") {
            $booking->payment_status = 1;
            $paymentSetting = PaymentSetting::find(1);
            $stripe_sk = $paymentSetting->stripe_secret_key;

            $adminSetting = AdminSetting::find(1);
            $currency =  $adminSetting->currency;

            if ($currency == "USD") {
                $amount = $request->payment * 100;
            } else {
                $amount = $request->payment;
            }

            \Stripe\Stripe::setApiKey($stripe_sk);
            $token = $_POST['stripeToken'];
            $stripeDetail = \Stripe\Charge::create([
                "amount" => $amount,
                "currency" => $currency,
                "source" => $token,
            ]);
            $booking->payment_token = $stripeDetail->id;
        }

        $booking->user_id = Auth()->user()->id;
        $bid = rand(10000, 99999);
        $booking->booking_id = '#' . $bid;
        if (isset($request->coupon_id)) {
            $booking->coupon_id = $request->coupon_id;
            $booking->discount = $request->discount;
            $coupon = Coupon::find($request->coupon_id);
            $count = $coupon->use_count;
            $count = $count + 1;
            $coupon->use_count = $count;
            $coupon->save();
        } else {
            $booking->discount = 0;
        }
        $booking->booking_status = 'Pending';
        $setting = AdminSetting::find(1);

        if ($setting->commission_type == "Percentage") {
            $commission = ($booking->payment * $setting->commission_amount) / 100;
            $salon_income = $booking->payment - $commission;
        } elseif ($setting->commission_type == "Amount") {
            $commission = $setting->commission_amount;
            $salon_income = $booking->payment - $commission;
        }

        $booking->commission = $commission;
        $booking->salon_income = $salon_income;

        if (config('point.active') == 1) {
            if ($setting->is_point == 1) {
                $user = User::find(Auth::user()->id);
                $add = 0;
                if ($booking->booking_at == "Home") {
                    $tot = $booking->payment - $booking->extra_charges;
                    if ($tot >= $setting->min_amount)
                        $add = ($tot * $setting->point) / $setting->min_amount;
                } else {
                    if ($booking->payment >= $setting->min_amount)
                        $add = ($booking->payment * $setting->point) / $setting->min_amount;
                }
                $user->total_points = $user->total_points + $add;
                $user->remain_points = $user->remain_points + $add;
                $user->save();
                $booking->points = $add;
            }
        }

        $booking->save();

        $create_appointment = Template::where('title', 'Create Appointment')->first();

        $not = new Notification();
        $not->booking_id = $booking->id;
        $not->user_id = Auth()->user()->id;
        $not->title = $create_appointment->subject;

        $detail['UserName'] = $booking->user->name;
        $detail['Date'] = $booking->date;
        $detail['Time'] = $booking->start_time;
        $detail['BookingId'] = $booking->booking_id;
        $detail['SalonName'] = $booking->salon->name;
        $detail['BookingAt'] = $booking->booking_at;
        $detail['AppName'] = AdminSetting::first()->app_name;

        $data = ["{{UserName}}", "{{Date}}", "{{Time}}", "{{BookingId}}", "{{SalonName}}", "{{BookingAt}}", "{{AppName}}"];
        $message = str_replace($data, $detail, $create_appointment->msg_content);
        $mail_enable = AdminSetting::first()->mail;
        $notification_enable = AdminSetting::first()->notification;
        $not->msg = $message;
        $not->save();

        if ($mail_enable) {
            try {
                Mail::to(Auth()->user()->email)->send(new CreateAppointment($create_appointment->mail_content, $detail, $create_appointment->subject));
            } catch (\Throwable $th) {
            }
        }
        if ($notification_enable && Auth()->user()->device_token != null) {
            try {
                Config::set('onesignal.app_id', env('APP_ID'));
                Config::set('onesignal.rest_api_key', env('REST_API_KEY'));
                Config::set('onesignal.user_auth_key', env('USER_AUTH_KEY'));

                OneSignal::sendNotificationToUser(
                    $message,
                    Auth()->user()->device_token,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null,
                    $create_appointment->subject
                );
            } catch (\Throwable $th) {
            }
        }

        $app_create_appointment = Template::where('title', 'App Create Appointment')->first();

        $app_not = new AppNotification();
        $app_not->booking_id = $booking->id;
        $app_not->user_id = $booking->user_id;
        $app_not->salon_id = $booking->salon->salon_id;
        $app_not->title = $app_create_appointment->subject;

        $detail_app['SalonOwner'] = $booking->salon->ownerName;
        $detail_app['UserName'] = $booking->user->name;
        $detail_app['Date'] = $booking->date;
        $detail_app['Time'] = $booking->start_time;
        $detail_app['SalonName'] = $booking->salon->name;
        $detail_app['BookingAt'] = $booking->booking_at;
        $detail_app['EmployeeName'] = $booking->employee->name;
        $detail_app['BookingId'] = $booking->booking_id;
        $detail_app['AppName'] = AdminSetting::first()->app_name;

        $app_data = ["{{SalonOwner}}", "{{UserName}}", "{{Date}}", "{{Time}}", "{{SalonName}}", "{{BookingAt}}", "{{EmployeeName}}", "{{BookingId}}", "{{AppName}}"];
        $app_message = str_replace($app_data, $detail_app, $app_create_appointment->msg_content);
        $app_not->msg = $app_message;
        $app_not->save();

        $emp_app_create_appointment = Template::where('title', 'Employee Appointment')->first();

        $emp_app_not = new AppNotification();
        $emp_app_not->booking_id = $booking->id;
        $emp_app_not->user_id = $booking->user_id;
        $emp_app_not->salon_id = $booking->salon->salon_id;
        $emp_app_not->emp_id = $booking->employee->emp_id;
        $emp_app_not->title = $emp_app_create_appointment->subject;

        $emp_detail_app['EmployeeName'] = $booking->employee->name;
        $emp_detail_app['UserName'] = $booking->user->name;
        $emp_detail_app['Date'] = $booking->date;
        $emp_detail_app['Time'] = $booking->start_time;
        $emp_detail_app['SalonName'] = $booking->salon->name;
        $emp_detail_app['BookingAt'] = $booking->booking_at;
        $emp_detail_app['BookingId'] = $booking->booking_id;
        $emp_detail_app['AppName'] = AdminSetting::first()->app_name;

        $emp_app_data = ["{{EmployeeName}}", "{{UserName}}", "{{Date}}", "{{Time}}", "{{SalonName}}", "{{BookingAt}}", "{{BookingId}}", "{{AppName}}"];
        $emp_app_message = str_replace($emp_app_data, $emp_detail_app, $emp_app_create_appointment->msg_content);
        $emp_app_not->msg = $emp_app_message;
        $emp_app_not->save();

        if ($booking->salon->ownerDetails->mail == 1) {
            try {
                Mail::to($booking->salon->ownerDetails->email)->send(new AppCreateAppointment($app_create_appointment->mail_content, $detail_app, $app_create_appointment->subject));
                Mail::to($booking->employee->email)->send(new EmpAppCreateAppointment($emp_app_create_appointment->mail_content, $emp_detail_app, $emp_app_create_appointment->subject));
            } catch (\Throwable $th) {
            }
        }
        if ($booking->salon->ownerDetails->notification == 1) {
            if ($booking->salon->ownerDetails->device_token != null) {
                try {
                    Config::set('onesignal.app_id', env('OWNER_APP_ID'));
                    Config::set('onesignal.rest_api_key', env('OWNER_REST_API_KEY'));
                    Config::set('onesignal.user_auth_key', env('OWNER_USER_AUTH_KEY'));
                    OneSignal::sendNotificationToUser(
                        $app_message,
                        $booking->salon->ownerDetails->device_token,
                        $url = null,
                        $data = null,
                        $buttons = null,
                        $schedule = null,
                        $app_create_appointment->subject
                    );
                } catch (\Throwable $th) {
                }
            }

            if ($booking->employee->device_token != null) {
                try {
                    Config::set('onesignal.app_id', env('EMPLOYEE_APP_ID'));
                    Config::set('onesignal.rest_api_key', env('EMPLOYEE_REST_API_KEY'));
                    Config::set('onesignal.user_auth_key', env('EMPLOYEE_USER_AUTH_KEY'));
                    OneSignal::sendNotificationToUser(
                        $emp_app_message,
                        $booking->employee->device_token,
                        $url = null,
                        $data = null,
                        $buttons = null,
                        $schedule = null,
                        $emp_app_create_appointment->subject
                    );
                } catch (\Throwable $th) {
                }
            }
        }
        return view('website.pages.success', compact('booking'));
    }

    public function allSalon(Request $request)
    {
        // dd($request);
        
        $salons = Salon::where('status', 1)->orderBy('salon_id', 'desc');

        if (isset($request->lat) && isset($request->lang)) {
            $radius = AdminSetting::first()->radius;
            $salons->GetByDistance($request->lat, $request->lang, $radius);
        }

        if (isset($request->gender)) {
            if ($request->gender == "Male" || $request->gender == "Female") {
                $salons = $salons->where('gender', $request->gender)->orWhere('gender', 'Both');
            }
        }

        if (isset($request->give_service)) {
            if ($request->give_service == "Salon" || $request->give_service == "Home") {
                $salons = $salons->where('give_service', $request->give_service)->orWhere('give_service', 'Both');
            }
        }

        $salons = $salons->get();

        $salons = collect($salons->toArray());

        if (isset($request->category) && $request->category != 0) {
            $cat_id = $request->category;
            $salons = collect($salons)->filter(function ($item) use ($cat_id) {
                $check = collect($item['serviceName'])->filter(function ($ser) use ($cat_id) {
                    return $cat_id == $ser['cat_id'] ? true : false;
                });
                if (count($check) > 0) {
                    return true;
                }
            });
        }

        if (isset($request->rate)) {
            if ($request->rate != "all") {
                $salons = $salons->whereBetween('rate', [$request->rate, $request->rate + 0.9]);
            }
        }

        if (isset($request->look_for)) {
            $search = $request->look_for;

            $salons = collect($salons)->filter(function ($item) use ($search) {
                $check = collect($item['serviceName'])->filter(function ($ser) use ($search) {
                    return false !== stristr($ser['name'], $search);
                });
                if (count($check) > 0) {
                    return true;
                }
                return false !== stristr($item['name'], $search);
            });
        }

        if (isset($request->open)) {
            $salons = $salons->where('open', 1);
        }

        if (isset($request->sort)) {
            if ($request->sort == "high-rated") {
                $salons = $salons->sortByDesc('rate');
            } elseif ($request->sort == "most-reviewed") {
                $salons = $salons->sortByDesc('rateCount');
            } elseif ($request->sort == "popular-salons") {
                $salons = $salons->sortByDesc('completedBooking');
            } elseif ($request->sort == "newest-salons") {
                $salons = $salons->sortByDesc('salon_id');
            } elseif ($request->sort == "older-salons") {
                $salons = $salons->sortBy('salon_id');
            }
        }

        $salons = $salons->values()->all();
        if ($request->ajax()) {
            if ($request->view == "Grid")
                $view = view('website.pages.allSalonGrid', compact('salons'))->render();
            else
                $view = view('website.pages.allSalonList', compact('salons'))->render();
            return response()->json(['html' => $view, 'meta' => $salons]);
        }
        $include = "Grid";
        $categories = Category::where('status', 1)->get();
        $requests['look_for'] = isset($request->look_for) ? $request->look_for : '';
        $requests['location'] = isset($request->location) ? $request->location : '';
        $requests['lang'] = isset($request->lang) ? $request->lang : '';
        $requests['lat'] = isset($request->lat) ? $request->lat : '';
        $requests['category'] = isset($request->category) && $request->category != 0 ? $request->category : '';
        
        // dd($salons);
        return view('website.pages.newallSalon', compact('salons', 'include', 'categories', 'requests'));
        // return view('website.pages.allSalon', compact('salons', 'include', 'categories', 'requests'));
    }

    public function subscribenow(Request $request)
    {
        // dd($request->email);

        $content = Template::where('title', 'Welcome')->first()->mail_content;
        $subject = Template::where('title', 'Welcome')->first()->subject;
        $detail['UserName'] = $user->name;
        $detail['AppName'] = AdminSetting::first()->app_name;
        $mail_enable = AdminSetting::first()->mail;

        Mail::to($request->email)->send(new Welcome($content, $detail, $subject));
        
        // $message = "Hi";
        // $email = $request->email;
        // $subject = "Tariq";
        // Mail::send('emails.activation', $data, function ($message) use ($email, $subject) {
        //     $message->to($email)->subject($subject);
        // })->with('title', "Registered Successfully.");

        

        // $content = Template::where('title', 'Welcome')->first()->mail_content;
        // $subject = Template::where('title', 'Welcome')->first()->subject;
        // $detail['UserName'] = $request->email;
        // $detail['AppName'] = AdminSetting::first()->app_name;
        // $mail_enable = AdminSetting::first()->mail;

        // if ($mail_enable) {
            // try {
                // Mail::to($request->email)->send(new Welcome('hi', $detail, 'tariq'));
            // } catch (\Throwable $th) {
            // }
        // }
        
        
        // return view('website.pages.subscribenow', compact('salons', 'include', 'categories', 'requests'));
        
    }

    // public function allSalon(Request $request)
    // {
    //     // dd($request);
        
    //     $salons = Salon::where('status', 1)->orderBy('salon_id', 'desc');

    //     if (isset($request->lat) && isset($request->lang)) {
    //         $radius = AdminSetting::first()->radius;
    //         $salons->GetByDistance($request->lat, $request->lang, $radius);
    //     }

    //     if (isset($request->gender)) {
    //         if ($request->gender == "Male" || $request->gender == "Female") {
    //             $salons = $salons->where('gender', $request->gender)->orWhere('gender', 'Both');
    //         }
    //     }

    //     if (isset($request->give_service)) {
    //         if ($request->give_service == "Salon" || $request->give_service == "Home") {
    //             $salons = $salons->where('give_service', $request->give_service)->orWhere('give_service', 'Both');
    //         }
    //     }

    //     $salons = $salons->get();

    //     $salons = collect($salons->toArray());

    //     if (isset($request->category) && $request->category != 0) {
    //         $cat_id = $request->category;
    //         $salons = collect($salons)->filter(function ($item) use ($cat_id) {
    //             $check = collect($item['serviceName'])->filter(function ($ser) use ($cat_id) {
    //                 return $cat_id == $ser['cat_id'] ? true : false;
    //             });
    //             if (count($check) > 0) {
    //                 return true;
    //             }
    //         });
    //     }

    //     if (isset($request->rate)) {
    //         if ($request->rate != "all") {
    //             $salons = $salons->whereBetween('rate', [$request->rate, $request->rate + 0.9]);
    //         }
    //     }

    //     if (isset($request->look_for)) {
    //         $search = $request->look_for;

    //         $salons = collect($salons)->filter(function ($item) use ($search) {
    //             $check = collect($item['serviceName'])->filter(function ($ser) use ($search) {
    //                 return false !== stristr($ser['name'], $search);
    //             });
    //             if (count($check) > 0) {
    //                 return true;
    //             }
    //             return false !== stristr($item['name'], $search);
    //         });
    //     }

    //     if (isset($request->open)) {
    //         $salons = $salons->where('open', 1);
    //     }

    //     if (isset($request->sort)) {
    //         if ($request->sort == "high-rated") {
    //             $salons = $salons->sortByDesc('rate');
    //         } elseif ($request->sort == "most-reviewed") {
    //             $salons = $salons->sortByDesc('rateCount');
    //         } elseif ($request->sort == "popular-salons") {
    //             $salons = $salons->sortByDesc('completedBooking');
    //         } elseif ($request->sort == "newest-salons") {
    //             $salons = $salons->sortByDesc('salon_id');
    //         } elseif ($request->sort == "older-salons") {
    //             $salons = $salons->sortBy('salon_id');
    //         }
    //     }

    //     $salons = $salons->values()->all();
    //     if ($request->ajax()) {
    //         if ($request->view == "Grid")
    //             $view = view('website.pages.allSalonGrid', compact('salons'))->render();
    //         else
    //             $view = view('website.pages.allSalonList', compact('salons'))->render();
    //         return response()->json(['html' => $view, 'meta' => $salons]);
    //     }
    //     $include = "Grid";
    //     $categories = Category::where('status', 1)->get();
    //     $requests['look_for'] = isset($request->look_for) ? $request->look_for : '';
    //     $requests['location'] = isset($request->location) ? $request->location : '';
    //     $requests['lang'] = isset($request->lang) ? $request->lang : '';
    //     $requests['lat'] = isset($request->lat) ? $request->lat : '';
    //     $requests['category'] = isset($request->category) && $request->category != 0 ? $request->category : '';
    //     return view('website.pages.allSalon', compact('salons', 'include', 'categories', 'requests'));
    // }

    public function pricing(Request $request)
    {
        // dd('test');
        return view('website.pages.pricing');
    }

    public function silver(Request $request)
    {
        // dd('test');
        $setting = AdminSetting::first(['currency_symbol']);

        $coupons = $this->getCoupon();
        return view('website.pages.silver', compact('setting'));
    }

    public function gold(Request $request)
    {
        // dd('test');
        $setting = AdminSetting::first(['currency_symbol']);

        $coupons = $this->getCoupon();
        return view('website.pages.gold', compact('setting'));
    }

    public function plat(Request $request)
    {
        // dd('test');
        $setting = AdminSetting::first(['currency_symbol']);

        $coupons = $this->getCoupon();
        return view('website.pages.plat', compact('setting'));
    }

    public function aftersubscribepayment(Request $request){
        // dd($request);

        \Stripe\Stripe::setApiKey('sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV');
        // Stripe\Stripe::setApiKey("sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV");
    
        \Stripe\Charge::create ([
                "amount" => $request->amount * 100,
                "currency" => "AED",
                "source" => $request->stripeToken,
                "description" => "Payer Name: ".$request->account_name.", Package: ".$request->payment_desc
        ]);

        return redirect('/signupbusiness');
    }

    public function support(Request $request)
    {
        // dd('test');
        return view('website.pages.support');
    }

    public function profile()
    {
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        $setting = AdminSetting::first(['lat', 'lang']);
        return view('website.pages.profile', compact('addresses', 'setting'));
    }

    public function profile_data(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'phone' => 'bail|required|numeric',
            'code' => 'bail|required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->code = $request->code;
        if (isset($request->image)) {
            if ($user->image != "noimage.jpg") {
                if (\File::exists(public_path('/storage/images/users/' . $user->image))) {
                    \File::delete(public_path('/storage/images/users/' . $user->image));
                }
            }
            $image = $request->file('image');
            $name = 'User_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images/users');
            $image->move($destinationPath, $name);
            $user->image = $name;
        }
        $user->save();
        return Redirect::back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8', 'same:new_password'],
        ]);
        if (Hash::check($request->current_password, Auth::user()->password)) {
            $password = Hash::make($request->new_password);
            User::find(Auth::user()->id)->update(['password' => $password]);
        }
        return Redirect::back();
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'street' => 'bail|required',
            'city' => 'bail|required|regex:/^([^0-9]*)$/',
            'state' => 'bail|required|regex:/^([^0-9]*)$/',
            'country' => 'bail|required|regex:/^([^0-9]*)$/',
            'latitude' => 'bail|required',
            'longitude' => 'bail|required',
        ]);

        $address = new Address();
        $address->user_id = Auth()->user()->id;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->let = $request->latitude;
        $address->long = $request->longitude;
        $address->save();
        return Redirect::back();
    }

    public function getAddress($id)
    {
        $add = Address::find($id);
        return response()->json(['msg' => 'Get Address', 'data' => $add, 'success' => true], 200);
    }

    public function editAddress(Request $request)
    {
        $request->validate([
            'street' => 'bail|required',
            'city' => 'bail|required|regex:/^([^0-9]*)$/',
            'state' => 'bail|required|regex:/^([^0-9]*)$/',
            'country' => 'bail|required|regex:/^([^0-9]*)$/',
            'latitude' => 'bail|required',
            'longitude' => 'bail|required',
        ]);

        $address = Address::find($request->address_id);
        $address->street = $request->street;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->let = $request->latitude;
        $address->long = $request->longitude;
        $address->save();
        return Redirect::back();
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);
        $booking = Booking::where('address_id', $id)->first();
        if (isset($booking)) {
            return response()->json(['msg' => 'Cant delete',  'success' => false], 401);
        } else {
            $address->delete();
            return response()->json(['msg' => 'Deleted Successfully',  'success' => true], 200);
        }
    }

    public function appointments()
    {
        $master = array();

        $master['completed'] = Booking::where([['user_id', Auth::user()->id], ['booking_status', 'Completed']])
            ->with(['salon', 'review'])
            ->orderBy('id', 'DESC')->get();

        $master['cancel'] = Booking::where([['user_id', Auth::user()->id], ['booking_status', 'Cancel']])
            ->with(['salon', 'review'])
            ->orderBy('id', 'DESC')->get();

        $master['pending'] = Booking::where([['user_id', Auth::user()->id], ['booking_status', 'Pending']])
            ->with(['salon', 'review'])
            ->orderBy('id', 'DESC')->get();

        $master['approved'] = Booking::where([['user_id', Auth::user()->id], ['booking_status', 'Approved']])
            ->with(['salon', 'review'])
            ->orderBy('id', 'DESC')->get();

        $currency = AdminSetting::first()->currency_symbol;
        return view('website.pages.appointment', compact('master', 'currency'));
    }

    public function addReview(Request $request)
    {
        $request->validate([
            'review' => 'bail|required',
            'rating' => 'bail|required',
        ]);

        $salon_id = Booking::find($request->booking_id)->salon_id;
        $review = new Review();
        $review->user_id = Auth()->user()->id;
        $review->salon_id = $salon_id;
        $review->rate = $request->rating;
        $review->message = $request->review;
        $review->booking_id = $request->booking_id;
        $review->save();

        return response()->json(['msg' => 'Review Added',  'success' => true], 200);
    }

    public function cancelAppointment($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status = "Cancel";
        $booking->save();

        $booking_status = Template::where('title', 'Booking status')->first();

        $not = new Notification();
        $not->booking_id = $booking->id;
        $not->user_id = $booking->user_id;
        $not->title = $booking_status->subject;

        $detail['UserName'] = $booking->user->name;
        $detail['Date'] = $booking->date;
        $detail['Time'] = $booking->start_time;
        $detail['BookingId'] = $booking->booking_id;
        $detail['SalonName'] = $booking->salon->name;
        $detail['BookingStatus'] = $booking->booking_status;
        $detail['AppName'] = AdminSetting::first()->app_name;

        $data = ["{{UserName}}", "{{Date}}", "{{Time}}", "{{BookingId}}", "{{SalonName}}", "{{BookingStatus}}"];
        $message = str_replace($data, $detail, $booking_status->msg_content);

        $not->msg = $message;
        $title = "Appointment " . $booking->booking_status;
        $not->save();

        $mail_enable = AdminSetting::first()->mail;
        $notification_enable = AdminSetting::first()->notification;

        if ($mail_enable) {
            try {
                Mail::to($booking->user->email)->send(new BookingStatus($booking_status->mail_content, $detail, $booking_status->subject));
            } catch (\Throwable $th) {
            }
        }
        if ($notification_enable && $booking->user->device_token != null) {
            try {
                Config::set('onesignal.app_id', env('APP_ID'));
                Config::set('onesignal.rest_api_key', env('REST_API_KEY'));
                Config::set('onesignal.user_auth_key', env('USER_AUTH_KEY'));
                OneSignal::sendNotificationToUser(
                    $message,
                    $booking->user->device_token,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null,
                    $title
                );
            } catch (\Throwable $th) {
            }
        }

        // For emp
        $emp_booking_status = Template::where('title', 'Employee booking status')->first();

        $emp_not = new AppNotification();
        $emp_not->booking_id = $id;
        $emp_not->user_id = $booking->user_id;
        $emp_not->salon_id = $booking->salon_id;
        $emp_not->emp_id = $booking->emp_id;
        $emp_not->title = "Appointment " . $booking->booking_status;

        $emp_detail['EmployeeName'] = $booking->employee->name;
        $emp_detail['UserName'] = $booking->user->name;
        $emp_detail['Date'] = $booking->date;
        $emp_detail['Time'] = $booking->start_time;
        $emp_detail['SalonName'] = $booking->salon->name;
        $emp_detail['BookingAt'] = $booking->booking_at;
        $emp_detail['BookingStatus'] = $booking->booking_status;
        $emp_detail['BookingId'] = $booking->booking_id;
        $emp_detail['AppName'] = AdminSetting::first()->app_name;

        $data = ["{{EmployeeName}}", "{{UserName}}", "{{Date}}", "{{Time}}", "{{SalonName}}", "{{BookingAt}}", "{{BookingStatus}}", "{{BookingId}}", "{{AppName}}"];
        $emp_message = str_replace($data, $emp_detail, $emp_booking_status->msg_content);

        $emp_not->msg = $emp_message;
        $title = "Appointment " . $booking->booking_status;

        $emp_not->save();
        $owner_id = Salon::find($booking->salon_id)->owner_id;
        $owner = User::find($owner_id);
        $mail_enable = $owner->mail;
        $notification_enable = $owner->notification;

        if ($mail_enable) {
            try {
                Mail::to($booking->employee->email)->send(new EmpBookingStatus($emp_booking_status->mail_content, $emp_detail, $emp_booking_status->subject));
            } catch (\Throwable $th) {
            }
        }
        if ($notification_enable && $booking->employee->device_token != null) {
            try {
                Config::set('onesignal.app_id', env('EMPLOYEE_APP_ID'));
                Config::set('onesignal.rest_api_key', env('EMPLOYEE_REST_API_KEY'));
                Config::set('onesignal.user_auth_key', env('EMPLOYEE_USER_AUTH_KEY'));
                OneSignal::sendNotificationToUser(
                    $emp_message,
                    $booking->employee->device_token,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null,
                    $title
                );
            } catch (\Throwable $th) {
            }
        }
        return response()->json(['msg' => 'Appointment Cancel', 'success' => true], 200);
    }

    public function invoice($id)
    {
        $booking = Booking::find($id);
        $currency = AdminSetting::first()->currency_symbol;
        return view('website.pages.invoice', compact('booking', 'currency'));
    }

    public function subscribe()
    {
        $subscriptions = [];

        $subscriptions = Subscription::with(['subscription_details'])->take(3)->get();

        $subscriptions_table = Subscription::with(['subscription_details'])->get();
        $sub_plan_detail = sub_plan_detail::where('status', 1)->get();

        return view('website.pages.subscribe', compact('subscriptions', 'subscriptions_table', 'sub_plan_detail'));
    }

    public function chooseSubscription($id)
    {

        $subscription = Subscription::with(['subscription_details'])->find($id);
        return view('website.pages.choose-subscribe', compact('subscription'));
    }
}
