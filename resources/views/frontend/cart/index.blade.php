@extends('frontend.layout.master')
@section('content')
    <div class="container card">
        <div class="card-header">
            <h2 class="text-center text-danger mb-3">Giỏ hàng</h2>
        </div>
        <div class="card-body">
            <div id="cart">
                <table>
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('cart') as $id => $product)
                            <tr id="product_{{ $id }}" style="margin-bottom: 1rem;">
                                <td><img class="w-25" src="{{ asset('/') }}frontend/images/{{ $product['url_image'] }}"
                                        alt=""></td>

                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['price'] }}</td>
                                <td>
                                    <input type="number" min="1" value="{{ $product['quantity'] }}"
                                        data-id="{{ $id }}" onchange="updateCartItem(this)">
                                </td>
                                <td class="subtotal">{{ $product['price'] * $product['quantity'] }}</td>
                                <td><button onclick="deleteCartItem({{ $id }})">Xóa</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div id="cart-summary">
                <button class="update-btn"><a href="/gio-hang" class="btn btn-danger">Cập nhật giỏ hàng</a></button>
                <span id="total" class="float-right" style="font-weight: bold; color: red;"></span>
            </div>
        </div>
    </div>

    <script>
        function updateCartItem(input) {
            var productId = input.getAttribute('data-id');
            var quantity = input.value;
            fetch("{{ route('update.cart') }}", {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: productId,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        updateTotal(); // Cập nhật tổng tiền sau khi cập nhật sản phẩm
                    }
                });
        }

        function deleteCartItem(id) {
            fetch("{{ route('delete.cart') }}", {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('product_' + id).remove();
                        updateTotal(); // Cập nhật tổng tiền sau khi xóa sản phẩm
                    } else if (data.error) {
                        alert(data.error);
                    }
                });
        }



        function updateTotal() {
            var subtotalElements = document.getElementsByClassName('subtotal');
            var total = 0;
            for (var i = 0; i < subtotalElements.length; i++) {
                total += parseFloat(subtotalElements[i].textContent);
            }
            document.getElementById('total').textContent = "Tổng tiền: " + total;
        }

        // Gọi hàm tính tổng tiền khi trang được tải
        window.onload = updateTotal;
    </script>
@endsection
