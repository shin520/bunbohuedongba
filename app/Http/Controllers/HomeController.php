<?php

namespace App\Http\Controllers;
use Http;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Download;
use App\Models\Counter;
use DB;
use View;
use Artisan;
use Hash;
use Str;
use Storage;
use Auth;
use App\Models\User;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory1;
use App\Models\ProductCategory2;
use App\Models\Setting;
use App\Models\Level;
use App\Models\HistoryLogin;
use App\Models\Wallet;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $now = Carbon::now();
        $month_of_year =  Carbon::now()->month;
        $year =  Carbon::now()->year;
        if ($month_of_year < 10) {
            $get_month = Carbon::now()->month;
            $month = '0'.$get_month;
        }else {
            $month =  Carbon::now()->month;
        }
        $data['get_link_today'] = Download::whereDate('created_at', Carbon::today())->get()->count();
        $data['get_access_today'] = Counter::whereDate('time',Carbon::today())->get()->count();

        $data['get_link_yesterday'] = Download::whereDate('created_at', Carbon::yesterday())->get()->count();
        $data['get_access_yesterday'] = Counter::whereDate('time',Carbon::yesterday())->get()->count();

        $a = $data['get_link_today'];
        $b = $data['get_access_today'];
        $c = $data['get_link_yesterday'];
        $d = $data['get_access_yesterday'];
        if($d == 0 ){
            $data['%access'] = ceil(abs(($b - $d)/1 * 100));
        }else{
            $data['%access'] = ceil(abs(($b - $d)/$d * 100));
        }
        if($c == 0){
            $data['%link'] = ceil(abs(($a-$c)/1 * 100)) ;
        }else{
            $data['%link'] = ceil(abs(($a-$c)/$c * 100)) ;
        }
        return view('be.page.home',compact('month','year','data'));
    }
    public function history_download(Request $request)
    {
        $alert = '';
        if($request->from || $request->to){
            $data = Download::orderby('id','desc')->whereBetween('created_at',[$request->from,$request->to])->paginate(10);
            $alert = 'Có tổng cộng '.$data->count().' lượt tải xuống từ '.Carbon::parse($request->from)->format('d/m/Y').' đến '.Carbon::parse($request->to)->format('d/m/Y');
        }
        else{
            $data = Download::orderby('id','desc')->paginate(10);
        }
        return view('be.page.download',compact('data','alert'));
    }
    public function counter(){
        $month =  Carbon::now()->month;
        $year =  Carbon::now()->year;
        $get_all_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
        ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
        ->get()
        ->groupBy('days');
        $count_day_duplicate = [];
        $count_day = [];
        foreach ($get_all_colum_counter as $key => $value) {
            $count_day_duplicate[(int)$key] = count($value);
        }
        for($i = 1; $i <= Carbon::now()->daysInMonth; $i++){
            if(!empty($count_day_duplicate[$i])){
                $count_day[$i] = $count_day_duplicate[$i];
            }else{
                $count_day[$i] = 0;
            }
            $day[] = $i;
            $access[] = $count_day[$i];
        }

        $get_all_colum_counter_download =  Download::select('id','created_at', DB::raw("DATE_FORMAT(created_at, '%d') days"))
        ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(created_at, '%m')"),'=',$month)
        ->get()
        ->groupBy('days');
        $count_day_duplicate_download = [];
        $count_day_download = [];
        foreach ($get_all_colum_counter_download as $key_download => $value_download) {
            $count_day_duplicate_download[(int)$key_download] = count($value_download);
        }
        for($i = 1; $i <= Carbon::now()->daysInMonth; $i++){
            if(!empty($count_day_duplicate_download[$i])){
                $count_day_download[$i] = $count_day_duplicate_download[$i];
            }else{
                $count_day_download[$i] = 0;
            }
            $access_download[] = $count_day_download[$i];
        }

        return response()->json(['day'=>$day,'access'=>$access,'download'=>$access_download]);
    }
    public function shortday(Request $resquest){
        $month = $resquest->get('getmonth');
        $year = $resquest->get('getyear');
        $timeget = "$year-$month";
        $get_short_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
        ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
        ->get()
        ->groupBy('days');
        $short_count_day_duplicate = [];
        $short_count_day = [];
        foreach ($get_short_colum_counter as $keyz => $valueshort) {
            $short_count_day_duplicate[(int)$keyz] = count($valueshort);
        }
        for($i = 1; $i <= Carbon::create($year,$month,1)->daysInMonth; $i++){
            if(!empty($short_count_day_duplicate[$i])){
                $short_count_day[$i] = $short_count_day_duplicate[$i];
            }else{
                $short_count_day[$i] = 0;
            }
            $day[] = $i;
            $access[] = $short_count_day[$i];
        }
        $get_all_colum_counter_download =  Download::select('id','created_at', DB::raw("DATE_FORMAT(created_at, '%d') days"))
        ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(created_at, '%m')"),'=',$month)
        ->get()
        ->groupBy('days');
        $count_day_duplicate_download = [];
        $count_day_download = [];
        foreach ($get_all_colum_counter_download as $key_download => $value_download) {
            $count_day_duplicate_download[(int)$key_download] = count($value_download);
        }
        for($i = 1; $i <= Carbon::now()->daysInMonth; $i++){
            if(!empty($count_day_duplicate_download[$i])){
                $count_day_download[$i] = $count_day_duplicate_download[$i];
            }else{
                $count_day_download[$i] = 0;
            }
            $access_download[] = $count_day_download[$i];
        }
        return response()->json(['day'=>$day,'access'=>$access,'download'=>$access_download]);

    }
    public function setting(){
        $data = Setting::firstorCreate();
        return view('be.page.setting',compact('data'));
    }
    
    public function update_info_web(Request $request){
        $data = Setting::firstorCreate();
        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
            $data->logo =  $filename ?? $data->img ;
        }
        if($request->file('logo_dark')){
            $file= $request->file('logo_dark');
            $logodark= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $logodark);
            $data->logo_dark =  $logodark ?? $data->logo_dark ;
        }
        if($request->file('favicon')){
            $file_f= $request->file('favicon');
            $filename_f= date('YmdHi').$file_f->getClientOriginalName();
            $file_f->storeAs('public/uploads', $filename_f);
            $data->favicon = $filename_f ?? $data->favicon  ;
        }
        if($request->file('img_share')){
            $file_s= $request->file('img_share');
            $filename_s= date('YmdHi').$file_s->getClientOriginalName();
            $file_s->storeAs('public/uploads', $filename_s);
            $data->img_share = $filename_s ?? $data->img_share  ;
        }
        $data->title = $request->title;
        $data->keyword = $request->keyword;
        $data->description = $request->description;
        $data->url = $request->url;
        $data->name = $request->name;
        $data->js_body = $request->js_body;
        $data->address = $request->address;
        $data->address_2 = $request->address_2;
        $data->phone = $request->phone;
        $data->phone_2 = $request->phone_2;
        $data->email = $request->email;
        $data->email_2 = $request->email_2;
        $data->robots = $request->robots;
        $data->maps = $request->maps;
        $data->publisher = $request->publisher;
        $data->lang = $request->lang;
        $data->author = $request->author;
        $data->captcha_secret	 = $request->captcha_secret	;
        $data->captcha_sitekey	 = $request->captcha_sitekey;
        $data->facebook		 = $request->facebook;
        $data->zalo		 = $request->zalo;
        $data->created_at = $request->created_at;
        $data->updated_at = $request->updated_at;
        $data->save();
        alert()->success('Thành công','Đã cập nhật thông tin');
        return redirect()->back();
    }

    public function ajax_update_info_web(Request $request){
        $data = Setting::first();
        $name = $request->name;
        $data->$name = $request->value;
        $data->save();
    }

    public function check_die_url(){
        Product::chunk(200, function ($data) {
            $apiURL = 'https://api.fshare.vn/api/fileops/getFolderList';
            $fshare= Fshare::first();
            foreach ($data as $d) {
                $postInput = [
                    'url' => $d->link,
                    "dirOnly" => 0,
                    "pageIndex" => 0,
                    "limit" => 200,
                    'token' => "$fshare->token",
                ];
                $headers = [
                    'User-Agent' => "$fshare->app_name",
                    'Cookie' => "session_id=$fshare->session"
                ];
                $response = Http::withHeaders($headers)->post($apiURL, $postInput);
                $statusCode = $response->status();
                if($statusCode == 404){
                    $d->delete();
                }
            }
            sleep(2);
        });
    }
    public function sitemap()
    {
        $data['page'] = Page::whereHideshow(1)->get();
        $data['cate1'] = ProductCategory1::whereHideshow(1)->get();
        $data['cate2'] = ProductCategory2::whereHideshow(1)->get();
        $data['product'] = Product::whereHideshow(1)->get();
        return response()->view('fe.page.sitemap', compact('data'))->header('Content-Type', 'text/xml');
    }
    public function check_link(Request $request){
        $link = Str::before($request->link, '?token=');
        $checker = Product::where('link',$link)->first();
        if($checker){
            return response()->json(['status' => 'error','link' => $checker->id]);
        }else{
            return response()->json(['status' => 'success']);
        }
    }
    public function profile(){
        $data = Auth::user();
        return view('be.profile.info',compact('data'));
    }
    public function update_profile(Request $request){
        $trans = [
            'phone.regex' => 'Số điện thoại chưa đúng định dạng !',
        ];
        $validated = $request->validate([
            'phone' => 'regex:/[0-9]{10}/'
        ],$trans);
        $data = User::find(Auth::user()->id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
            $data->img = $filename;
        }
        $data->email = $request->email;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->save();
        alert()->success('Thành công','Đã cập nhật thông tin.');
        return redirect()->back();
    }
    public function password(){
        $data = Auth::user();
        return view('be.profile.password',compact('data'));
    }
    public function update_password(Request $request)
    {
        $trans = [
            'old_password.required' => 'Chưa nhập mật khẩu cũ !',
            'new_password.required' => 'Chưa nhập mật khẩu mới !',
            'new_password.confirmed'=> 'Mật khẩu nhập lại chưa chính xác !'
        ];
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ],$trans);
        if(!Hash::check($request->old_password, auth()->user()->password)){
            alert()->error("Lỗi", "Mật khẩu cũ chưa đúng");
            return back();
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        alert()->success('Thành công','Đã cập nhật mật khẩu');
        return back();
    }
    public function show_2fa(){
        $data = Auth::user();
        return view('be.profile.2fa',compact('data'));
    }
    public function enable_2fa(Request $request){

        $trans = [
            'password.required' => 'Chưa nhập mật khẩu',
            'verify_code.required' => 'Chưa nhập mã ứng dụng',
        ];
        $request->validate([
            'password' => 'required',
            'verify_code'=>'required',
        ],$trans);

        $user = Auth::user();
        $google2fa = app('pragmarx.google2fa');
        $secret = $request->verify_code;
        $password = Hash::check($request->password, $user->password);
        $valid = $google2fa->verifyKey($user->google2fa_secret, $secret);
        if ($valid && $password) {
            $user->google2fa_enable = 1;
            $user->save();
            alert()->success('Thành công','Đã kích hoạt xác thực 2 bước');
            return back();
        } else {
            alert()->error('Lỗi','Mật khẩu hoặc mã ứng dụng chưa chính xác');
            return back();
        }
    }
    public function disable_2fa(Request $request){

        $trans = [
            'password.required' => 'Chưa nhập mật khẩu',
            'verify_code.required' => 'Chưa nhập mã ứng dụng',
        ];
        $request->validate([
            'password' => 'required',
            'verify_code'=>'required',
        ],$trans);

        if (!(Hash::check($request->password, Auth::user()->password))) {
            alert()->error('Lỗi','Mật khẩu chưa chính xác, hãy thử lại');
            return redirect()->back();
        }

        $user = Auth::user();

        $google2fa = app('pragmarx.google2fa');
        $secret = $request->verify_code;
        $valid = $google2fa->verifyKey($user->google2fa_secret, $secret);
        if ($valid) {
        $user->google2fa_enable = 0;
        $user->save();
            alert()->success('Thành công','Đã hủy xác thực 2 bước');
            return back();
        } else {
            alert()->error('Lỗi','Mật khẩu ứng dụng chưa chính xác');
            return back();
        }

    }
    public function show_history_login(){
        $data = Auth::user();
        $history = HistoryLogin::where('id_user',$data->id)->orderby('id','desc')->paginate(10);
        return view('be.profile.history_login',compact('data','history'));
    }
    public function analytics(){
        return view('be.api-google-analytics.index');
    }
    public function make_short_link(){
        $data = Product::where('short_link',NULL)->get();
        foreach ($data as $item) {
            $item->short_link =Str::random(6);
            $item->save();
        }
        if($data && $data->count() > 0){
            return response()->json(['message'=>'Phát hiện '.$data->count(). ' link và đã bổ sung Short-link']);
        }else{
            return response()->json(['message'=>'Không có link nào cần bổ sung !']);
        }

    }
    public function export_db(Request $request){
        $localhost = env('DB_HOST');
        $user = env('DB_USERNAME');
        $password=env('DB_PASSWORD');
        $db = env('DB_DATABASE');
        $auth = Auth::user();
        $trans = [
            'pass.required' => 'Chưa nhập mã ứng dụng',
        ];
        $request->validate([
            'pass' => 'required',
        ],$trans);

        $google2fa = app('pragmarx.google2fa');
        $secret = $request->pass;
        $valid = $google2fa->verifyKey($auth->google2fa_secret, $secret);
        if ($valid ) {
            alert()->success('Thành công','Đang tải xuống Database');
            EXPORT_DATABASE($localhost,$user,$password,$db );
            return back();
        } else {
            alert()->error('Lỗi','Mật khẩu ứng dụng chưa chính xác');
            return back();
        }
    }
    public function import_db(Request $request){
        $trans = [
            'file.required' => 'Chưa có database',
            'file.mimes' => 'Định dạng cho phép .zip',
            'pass.required' => 'Chưa nhập mã ứng dụng',

        ];
        $request->validate([
            'file' => 'required',
            'pass' => 'required',

        ],$trans);
        $localhost = env('DB_HOST');
        $user = env('DB_USERNAME');
        $password=env('DB_PASSWORD');
        $db = env('DB_DATABASE');
        $auth = Auth::user();

        $file = $request->file;
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->storeAs('public/uploads', $filename);
        $path = Storage::disk('public')->path('/uploads/'.$filename);
        IMPORT_TABLES($localhost,$user,$password,$db,$path );
        alert()->success('Thành công','Đã chèn database mới !');
        return back();
    }
    public function filemanager(){
        return view('be.filemanager.index');
    }
    public function down_web(Request $request)
    {
        $pass=$request->pass;
        $slug = Str::slug($pass);
        Artisan::call("down --secret=$slug");
        $maintain = Setting::firstorfail();
        $maintain->maintain = 1;
        $maintain->maintainpass = Hash::make($slug);
        $maintain->save();
        alert()->warning('Cảnh báo','Đã đưa trang web vào trạng thái bảo trì !');
        return redirect("/$slug")->with('maintain','đã bảo trì');
    }
    public function up_web(Request $request)
    {
        $maintain = Setting::firstorfail();
        if( Hash::check($request->pass  , $maintain->maintainpass)){
            $maintain->maintain = 0;
            $maintain->save();
            Artisan::call('up');
            alert()->success('Thành công','Website đã hoạt động lại !');
        }
        else{
            alert()->error('Thất bại','Mật khẩu chưa chính xác !');
        }
        return redirect()->route('home');
    }

    public function caching(){
        Artisan::call('route:cache');
        Artisan::call('view:cache');
    }

    public function tool(){
        return view('be.tool.index');
    }

    public function test(){
        $data['product'] = Product::truncate();
        $data['procat1'] = ProductCategory1::truncate();
        $data['procat2'] = ProductCategory2::truncate();
    }

    public function update_rank(){
        $data=User::whereType('customer')->get();
        foreach ($data as $d){
            $point = $d->user_exp;
            $rank = Level::orderby('number','asc')->where('exp','<=',$point)->get()->last();
            $d->level_id = $rank->id;
            $d->save();
        }
    }

    public function update_point(){
        $data=User::whereType('customer')->get();
        Wallet::truncate();
        foreach($data as $d){
            $poitn = new Wallet();
            $poitn->user_id = $d->id;
            $poitn->total_money_charge = rand(0,99999999);
            $rank = Level::orderby('number','asc')->where('exp','<=',$poitn->total_money_charge)->get()->last();
            $poitn->level_id = $rank->id;
            $poitn->save();
        }
    }

        public function update_avatar(){
        $data = User::where('type','customer')->where('img','noavatar.png')->get();
        foreach($data as $item){
            $url = "https://thispersondoesnotexist.com/image";
            $contents = file_get_contents($url);
            $name = Str::slug($item->name).'.png';
            Storage::put('public/uploads/'.$name, $contents);
            $item->img = $name;
            $item->save();
            // sleep(1);
        }
    }


}
