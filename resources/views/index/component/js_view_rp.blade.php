<script>
    $(".shin_md_rp__open").on('click', function(){
        $(".shin_md_rp").addClass("show");
        $(".shin_md_rp__open").removeClass("show");
        $(".shin_md_rp__close").addClass("show");
    });

    $(".shin_md_rp__close").on('click', function(){
        $(".shin_md_rp").removeClass("show");
        $(".shin_md_rp__close").removeClass("show");
        $(".shin_md_rp__open").addClass("show");
    });

    $(".shin_sm_rp__open").on('click', function(){
        $(".shin_sm_rp").addClass("show");
        $(".shin_sm_rp__open").removeClass("show");
        $(".shin_sm_rp__close").addClass("show");
    });

    $(".shin_sm_rp__close").on('click', function(){
        $(".shin_sm_rp").removeClass("show");
        $(".shin_sm_rp__close").removeClass("show");
        $(".shin_sm_rp__open").addClass("show");
    });
</script>