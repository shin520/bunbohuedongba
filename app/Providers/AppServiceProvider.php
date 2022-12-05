<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Fshare;
use App\Models\ProductCategory1;
use App\Models\BranchCategory1;
use App\Models\Policy;
use App\Models\Product;
use App\Models\Page;
use App\Models\FeedBack;
use App\Models\Branch;
use App\Models\Social;
use App\Models\StaticContent;
use View;
use Carbon\Carbon;
use App\Models\Setting;
use Jenssegers\Agent\Agent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $is_active = "";
        View::share('is_active', $is_active);
        Carbon::setLocale('vi');
        $setting = Setting::first();
        View::share('setting',$setting);
        $menu = ProductCategory1::orderby('number','asc')->orderby('id','desc')->where('hideshow',1)->get();
        View::share('menu',$menu);
        $hot = Product::where('featured',true)->where('hideshow',true)->orderby('number','asc')->orderby('id','desc')->get();
        View::share('hot',$hot);
        $free_course = Page::where('type','course')->first();
        View::share('free_course',$free_course);
        $static['about_footer'] = StaticContent::where('type','about_footer')->first();
        $static['about_footer_content'] = StaticContent::where('type', 'about_footer_content')->first()->content;
        View::share('static',$static);
        $share['social_network'] = Social::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', "ASC")->get();
        $share['policy'] = Policy::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', "desc")->limit(4)->get();
        $share['branch'] = Branch::where('featured', true)->orderBy('number', 'ASC')->orderBy('id', "desc")->limit(3)->get();
        $share['branch_category_1'] = BranchCategory1::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', "desc")->get();
        $share['branch_full_menu'] = Branch::orderBy('number', 'ASC')->orderBy('id', "desc")->get();
        $share['about_menu'] = Page::where('type', 'about')->first();
        $share['contact_menu'] = Page::where('type', 'contact')->first();
        $share['all_product_menu'] = Page::where('type', 'all-product')->first();
        $share['all_recruitment_menu'] = Page::where('type', 'all-recruitment')->first();
        $share['all_post_menu'] = Page::where('type', 'all-post')->first();
        $share['all_branch_menu'] = Page::where('type', 'all-branch')->first();
        $share['all_feedback'] = Page::where('type', 'all-feedback')->first();
        $share['static_page'] = Page::where('hideshow', true)->get();
        View::share('share',$share);
        $policy_list['policy_list'] = Policy::where('featured', '1')->orderBy('number', 'ASC')->orderBy('id', "desc")->limit(4)->get();
        View::share('policy_list',$policy_list);
    }
}
