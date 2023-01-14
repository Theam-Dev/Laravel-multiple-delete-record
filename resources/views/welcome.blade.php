<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  
    </head>
    <body >
        
        <div class="container p-2">
            <button class="btn btn-danger" id="multidelete" data-route="{{ route('multi.delete') }}">Delete All Selected</button>
            <table class="table mt-2" id="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Check</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->title}}</td>
                            <td>{{ $item->body}}</td>
                            <td>
                                <input type="checkbox" class="checkitem" value="{{$item->id}}">
                            </td>
                        </tr>
                        @endforeach
                   
                </tbody>
            </table>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(function(){
                $("#multidelete").on("click",function(){
                var button = $(this);
                var selected = [];
                $('#table .checkitem:checked').each(function() {
                    selected.push($(this).val());
                });
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: button.data('route'),
                    data: {
                      'selected': selected
                    },
                    success: function (response) {
                        window.location='/'
                    }
                  });
            })
            })
        </script>
    </body>
</html>
