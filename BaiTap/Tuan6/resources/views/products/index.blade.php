@extends('layouts.app')

@section('content')
    <h2>Danh sách sản phẩm</h2>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th>Danh mục</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ number_format($p->price) }} đ</td>
                    <td>{{ $p->category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 15px;">
        {{ $products->links() }}
    </div>
@endsection
