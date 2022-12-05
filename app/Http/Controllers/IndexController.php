<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Counter;
use App\Models\Contact;
use App\Models\FeedBack;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Online;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Policy;
use App\Models\Recruitment;
use App\Models\Setting;
use App\Models\Slide;
use App\Models\StaticContent;
use App\Models\BranchCategory1;
use DB;
use App\Models\ProductCategory1;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(Request $request){
        $web = Setting::first();
        $time_now = Carbon::now('Asia/Ho_Chi_Minh');
        $user_online = $request->session()->getId();
        if (Online::where('session_id', '=', $user_online)->count() > 0) {
        } else {
            $online = new Online([
                'session_id' => $user_online,
            ]);
            $online->save();
        }
        $time_db = Online::get();
        foreach ($time_db as $item) {
            $time_old = $item->created_at;
            $time_id = $item->id;
            $check_time = $time_now->diffInMinutes($time_old);
            $check_time_counter = $time_now->diffInMinutes($time_old);
            $ip_user = $_SERVER['REMOTE_ADDR'];
            if (Counter::where('time', '=', $time_old)->count() > 0) {
            } else {
            DB::table('counters')->whereDate('time', '>=', date('Y-m-d H:i:s',strtotime('-1 minutes')) )->insert(['time' => $time_old,'ip'=>$ip_user]);
            }
            if ($check_time_counter > 1) {
                $deletedRows = Online::where('id', $time_id)->delete();
            }
        }
        $master =
        [
            'name' => $web->name,
            'title' => $web->title,
            'keyword' => $web->keyword,
            'description' => $web->description,
            'img' => $web->img_share,
            'created_at' => $web->created_at,
            'updated_at' => $web->updated_at
        ];
        $data['about_image_1'] = StaticContent::where('type', 'about_image_1')->first()->content;
        $data['about_image_2'] = StaticContent::where('type', 'about_image_2')->first()->content;
        $data['about_middle_content'] = StaticContent::where('type', 'about_middle_content')->first()->content;
        $data['feedback_content'] = StaticContent::where('type', 'feedback_content')->first()->content;
        $data['product_type'] = ProductCategory1::where('featured', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(2)->get();
        $data['branch_index'] = Branch::where('featured', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(1)->get();
        $data['feedback_index'] = FeedBack::where('featured', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(5)->get();
        $data['slider'] = Slide::orderBy('number', 'ASC')->orderBy('id', 'DESC')->get();
        $data['gallery_about'] = Gallery::where('parent_id', 4)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(1)->get();
        return view('index.home.index', compact('data', 'master'));
    }

    public function changelocale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function get_location(Request $request){
        $data = Branch::find($request->id);
        return $data;
    }

    public function policy($slug){
        $data = Policy::where('slug', $slug)->FirstOrFail();
        $master =
        [
            'name' => $data->name,
            'title' => $data->title_seo,
            'keyword' => $data->keyword_seo,
            'description' => $data->description_seo,
            'img' => $data->img,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
        return view('index.page.policy-detail', compact("data", "master"));
    }
    public function product($slug){
        $data = Product::where('slug', $slug)->FirstOrFail();
        $master =
        [
            'name' => $data->name,
            'title' => $data->title_seo,
            'keyword' => $data->keyword_seo,
            'description' => $data->description_seo,
            'img' => $data->img,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
        $datarelated = Product::where('parent_id', $data->parent_id)->orderBy("number", 'asc')->orderBy("id", 'desc')->get()->take(4);
        return view('index.page.product-detail', compact("data", "datarelated", "master"));
    }
    public function feedback($slug){
        $data = FeedBack::where('slug', $slug)->FirstOrFail();
        $master =
        [
            'name' => $data->name,
            'title' => $data->title_seo,
            'keyword' => $data->keyword_seo,
            'description' => $data->description_seo,
            'img' => $data->img,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
        return view('index.page.feedback-detail', compact("data", "master"));
    }
    public function branch($slug){
        $data = Branch::where('slug', $slug)->FirstOrFail();
        $master =
        [
            'name' => $data->name,
            'title' => $data->title_seo,
            'keyword' => $data->keyword_seo,
            'description' => $data->description_seo,
            'img' => $data->img,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
        $datarelated = Branch::where('parent_id', $data->parent_id)->orderBy("number", 'asc')->orderBy("id", 'desc')->get()->take(2);
        return view('index.page.branch-detail', compact("data", "datarelated", "master"));
    }
    public function post($slug){
        $data = Post::where('slug', $slug)->FirstOrFail();
        $master =
        [
            'name' => $data->name,
            'title' => $data->title_seo,
            'keyword' => $data->keyword_seo,
            'description' => $data->description_seo,
            'img' => $data->img,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
        $datarelated = Post::where('parent_id', $data->parent_id)->orderBy("number", 'asc')->orderBy("id", 'desc')->get()->take(4);
        return view('index.page.post-detail', compact("data", "datarelated", "master"));
    }
    public function recruitment($slug){
        $data = Recruitment::where('slug', $slug)->FirstOrFail();
        $master =
        [
            'name' => $data->name,
            'title' => $data->title_seo,
            'keyword' => $data->keyword_seo,
            'description' => $data->description_seo,
            'img' => $data->img,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
        return view('index.page.recruitment-detail', compact("data", "master"));
    }


    public function store_order_contact_form(Request $request)
    {
            $secret_key = Setting::first()->captcha_secret;
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $data = [
                    'secret' => $secret_key,
                    'response' => $request->recaptcha,
                    'remoteip' => $remoteip
                ];
            $options = [
                    'http' => [
                      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                      'method' => 'POST',
                      'content' => http_build_query($data)
                    ]
                ];
                    $context = stream_context_create($options);
                    $result = file_get_contents($url, false, $context);
                    $resultJson = json_decode($result);


            if ($resultJson->success != true) {
                    alert()->error('Lỗi','Captcha đã hết hạn');
                    return back()->withErrors(['captcha' => 'Captcha đã hết hạn']);
                    }

            if ($resultJson->score >= 0.3) {

                $data_info = [
                    'number' => $request->true ?? true,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'date' => $request->date,
                    'people' => $request->people,
                    'read' => $request->read,
                    'type' => 'order',
                ];

                $contact = Contact::create($data_info);

                alert()->success('Đã gửi thư','Chúng tôi sẽ phản hồi lại cho bạn ngay');
                return back();
            } else {
                    alert()->success('Lỗi','Đã có lỗi xảy ra !');
                    return back()->withErrors(['captcha' => 'Captcha đã hết hạn']);
            }
    }


    public function store_contact_form(Request $request) {
        $secret_key = Setting::first() -> captcha_secret;
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
            'secret' => $secret_key,
            'response' => $request -> recaptcha,
            'remoteip' => $remoteip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);


        if ($resultJson -> success != true) {
            alert() -> error('Lỗi', 'Captcha đã hết hạn');
            return back() -> withErrors(['captcha' => 'Captcha đã hết hạn']);
        }
        if ($resultJson -> score>= 0.3) {
            // $lang = [
            //     'name.required' => "Tên không được bỏ trống !",
            //     'phone.required' => "Số điện thoại không được bỏ trống !",
            // ];

            // $request -> validate([
            //     'name' => 'required',
            //     'phone' => 'required|unique:contacts',

            // ], $lang);

            $data_info = [
                'number' => $request -> true ?? true,
                'name' => $request -> name,
                'email' => $request -> email,
                'phone' => $request -> phone,
                'content' => $request -> content,
                'read' => $request -> read,
                'type' => 'contact',
            ];
            $contact = Contact::create($data_info);

            alert() -> success('Đã gửi thư', 'Chúng tôi sẽ phản hồi lại cho bạn ngay');
            return back();
        } else {
            alert() -> success('Lỗi', 'Đã có lỗi xảy ra !');
            return back() -> withErrors(['captcha' => 'Captcha đã hết hạn']);
        }
    }



    public function page($slug){
        $data = Page::where('slug',$slug)->FirstOrFail();
        $master =
        [
            'name' => $data->name,
            'title' => $data->title_seo,
            'keyword' => $data->keyword_seo,
            'description' => $data->description_seo,
            'img' => $data->img,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
        switch($data->type){
            case('about');
            $is_active = $data->slug;
            return view('index.page.about-us', compact('data', 'master', 'is_active'));
            break;
            case('contact');
            $is_active = $data->slug;
            $content = StaticContent::where('type', 'contact_content')->first();
            return view('index.page.contact', compact('data', 'content', 'master', 'is_active'));
            break;
            case('all-branch');
            $is_active = $data->slug;
            if(request('search')){
                $brand_cate = BranchCategory1::where('slug',request('search'))->first();
                $items = Branch::where('parent_id', $brand_cate->id)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(6);
            }
            else{
                $items = Branch::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(6);
            }
            return view('index.page.branch', compact('data', 'items', 'master', 'is_active'));
            case('all-post');
            $is_active = $data->slug;
            $items = Post::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(6);
            return view('index.page.post', compact('data', 'items', 'master', 'is_active'));
            case('all-feedback');
            $is_active = $data->slug;
            $items = FeedBack::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(6);
            return view('index.page.feedback', compact('data', 'items', 'master', 'is_active'));
            case('all-recruitment');
            $is_active = $data->slug;
            $items = Recruitment::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(6);
            return view('index.page.recruitment', compact('data', 'items', 'master', 'is_active'));
            case('all-product');
            $is_active = $data->slug;
            $items = Product::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(8);
            return view('index.page.product', compact('data', 'items', 'master', 'is_active'));
            break;
        }
    }
}

