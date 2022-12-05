<script>
    function switchChangeFeatured() {
        $("#{{ $model }}").on('change', 'input[class="featured"]', function() {
            var featured = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('be.'.$model.'.featured') }}",
                data: {
                    'featured': featured,
                    'id': id
                },
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                }
            });
        })
    }

    $(document).ready(function() {
        switchChangeFeatured();
    });
</script>