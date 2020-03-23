@extends('layouts/app')
@csrf

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')
<div class="container">

    {{-- <a href="#create" data-toggle="collapse" class="btn btn-success">新增</a> --}}

    {{-- <liqueur-story></liqueur-story> --}}
    {{-- <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>img</th>
                <th>name</th>
                <th>title</th>
                <th>content</th>
                <th>sort</th>
                <th width='80px'></th>
            </tr>
        </thead>
        <tbody class="tbody">

            @foreach ($data as $item)
            <tr>
                <td>
                    <div class="col-4">
                        <img src="{{$item->img}}" alt="" srcset="" class="img-fluid">
                    </div>

                </td>
                <td>{{$item->name->name}}</td>

                <td>
                    {{$item->title}}
                </td>
                <td>
                    {{$item->content}}
                </td>
                <td>
                    {{$item->sort}}
                </td>
                <td>
                    <a href="#edit{{$item->id}}" class="btn btn-success btn-sm" data-toggle="collapse">修改</a>
                    <button class="btn btn-danger btn-sm" onclick="show_confirm({{$item->id}})">刪除</button>

                    <form id="news_delete{{$item->id}}" action="/admin/liqueur/{{$item->id}}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                <div class="collapse" id="edit{{$item->id}}">
                    <div class="card card-body">

                    </div>
                </div>
                <div class="collapse" id="look{{$item->id}}">
                    <div class="card card-body">

                    </div>
                </div>
            </tr>

            @endforeach

        </tbody>


    </table> --}}
    {{-- <liqueur-text datas="{{$data}}"></liqueur-text> --}}
    <liqueur-all></liqueur-all>
</div>



@endsection


@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
@endsection
