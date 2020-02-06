<script>
    //jquery start
    $(document).ready(function(){
//jquery enter contract id
        $('#contract_id').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#contractList').fadeIn();
                        $('#contractList').html(data);
                    }
                });
            }
        });
        //jquery enter mac
        $('#mac').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetchMac') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#macList').fadeIn();
                        $('#macList').html(data);
                    }
                });
            }
        });
//jquery click contract id
        $(document).on('click', '#contractl', function(){
            $('#contract_id').val($(this).text());
            $('#contractList').fadeOut();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/search/getmac",
                method:"POST",
                data:{contract_id:$('#contract_id').val(), _token:_token},
                success:function (data) {
                    $('#mac').val(data);
                }
            });
        });
//jquery click mac
        $(document).on('click', '#macl', function(){
            $('#mac').val($(this).text());
            $('#macList').fadeOut();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/search/getcontractid",
                method:"POST",
                data:{mac:$('#mac').val(), _token:_token},
                success:function (data) {
                    $('#contract_id').val(data);
                }
            });
        });
    });
</script>
