<script>

    function switchChange() {
        $("#{{ $model }}").on('change', 'input[class="hideshow"]', function() {
            var hideshow = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('be.'.$model.'.hideshow') }}",
                data: {
                    'hideshow': hideshow,
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
        switchChange();
        
        $(function() {
            $('#{{ $model }}').on('change', 'input[class="number"]', function() {
                var number = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('be.'.$model.'.number') }}",
                    data: {
                        'number': number,
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
        })
    })
</script>
