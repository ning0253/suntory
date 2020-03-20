@extends('layouts/app');
@csrf

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')
<div class="container">

    <a href="#create" data-toggle="collapse" class="btn btn-success">新增</a>

    <div class="collapse" id="create">
        <div class="card card-body">
            <form method="post" action="#" enctype="multipart/form-data" id="form1">
                @csrf
                <div class="form-group">
                    <label for="name">酒類名稱</label>
                    <input type="text" class="form-control" id="name" name="name">酒類名稱 </div>
                <div class="form-group">
                    <label for="img">banner照片</label>
                    <input type="file" class="form-update" id="img" name="img[]" onchange="uploadFile()" multiple>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="collapse"
                    data-target="#create">Submit</button>
            </form>
        </div>
    </div>
    <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>img</th>
                <th>title</th>
                <th>content</th>
                <th>sort</th>
                <th width='80px'></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>
                    <img src="{{$item->img}}" alt="" srcset="" style="width:50px; height=50px;">
                </td>
                <td>{{$item->title}}</td>
                <td>
                    {!!$item->content!!}
                </td>
                <td>
                    {{$item->sort}}
                </td>
                <td>
                    <a href="/home/news/edit/{{$item->id}}" class="btn btn-success btn-sm">修改</a>
                    <button class="btn btn-danger btn-sm" onclick="show_confirm({{$item->id}})">刪除</button>

                    <form id="news_delete{{$item->id}}" action="/home/news/delete/{{$item->id}}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>



@endsection


@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    });

    $(document).ready(function() {
        $('#example').DataTable({
            "order": [ 1, 'desc' ]
        });
    } );

function show_confirm(id)
{
var r=confirm("你要刪除嗎!");
if (r==true)
  {
    document.getElementById('news_delete'+id).submit();
  }
else
  {

  }
}


    function uploadFile() {
        console.log()


        for (var i = 0; i < $('#img')[0].files.length ; i++)
        {
            var file = $('#img')[0].files[i]
            if (file){


                $.upload(file);
            }
        }
    }



    $.upload = function (file) {
                let out = new FormData();
                console.log(out);

                out.append('file', file, file.name);
                console.log(out)
                $.ajax({
                    method: 'POST',
                    url: '/admin/liqueur',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function (img) {
                        console.log(img);

                        // $('#content').summernote('insertImage', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
    }


    // function ShowStr(files) {
    //     console.log(files);
    //                     for(let i=0; i < files.length; i++) {
    //                         console.log(files[i]);
    //                         // $.upload(files[i]);
    //                     }
    // }
    $(".btn-primary").click(function(){

        $name = $("#name").val()
        // var formData = $('#form1').serializeArray();
        // console.log(formData);


        $('form1').submit();
        let formdata = new FormData($('#form1'));
        //console.log();會是空值



         $.ajax({
                method: 'POST',
                url: '/admin/liqueur',
                contentType: false,
                cache: false,
                processData: false,
                data: [
                    formdata
                ] ,
                success: function (img) {
                    console.log(img);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
    })



</script>
@endsection
