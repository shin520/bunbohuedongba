<style>
    /* RESPONSIVE VIEW */
    .shin_md_rp__open, .shin_md_rp__close{position: fixed;left: 40px;bottom: 40px;width: 48px;height: 48px;display: none;color: white;background-color: rgb(237, 157, 38);align-items: center;justify-content: center;border-radius: 50px;box-shadow: 1px 1px 3px grey;}
    .shin_md_rp{ width: 768px; height: calc(100vh - 40px); position: fixed; bottom: 20px; right: 120%; z-index: 100000; transition: .5s; }
    .shin_md_rp.show{ right: 20px; }
    .shin_rp iframe{ width: 100%; height: 100%; overflow: hidden; border: solid 20px white; box-shadow: 2px 2px 10px grey; border-radius: 10px; }
    .shin_sm_rp__open, .shin_sm_rp__close{position: fixed;left: 40px;bottom: 100px;width: 48px;height: 48px;display: none;color: white;background-color: #4cca5e;align-items: center;justify-content: center;border-radius: 25px;box-shadow: 1px 1px 3px grey;}
    .shin_md_rp__open.show, .shin_md_rp__close.show, .shin_sm_rp__open.show, .shin_sm_rp__close.show{ display: flex; }
    .shin_sm_rp{ width: 576px; height: calc(100vh - 40px); position: fixed; bottom: 20px; left: 120%; z-index: 100000; transition: .5s; }
    .shin_sm_rp.show{ left: 100px; }
    @media  screen and (max-width: 768px) { .shin_md_rp__open.show, .shin_md_rp__close.show, .shin_sm_rp__open.show, .shin_sm_rp__close.show{ display: none; } }
</style>

<div class="shin_md_rp shin_rp"><iframe src="#"></iframe></div>
<div class="shin_sm_rp shin_rp"><iframe src="#"></iframe></div>

<div class="shin_md_rp__open show"><i class="fa-regular fa-tablet"></i></div>
<div class="shin_md_rp__close"><i class="fa-solid fa-xmark"></i></div>
<div class="shin_sm_rp__open show"><i class="fa-regular fa-mobile"></i></div>
<div class="shin_sm_rp__close"><i class="fa-solid fa-xmark"></i></div>