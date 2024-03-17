<style>
    /* category */
.rows {
display: flex;
align-items: center;
flex-wrap: wrap;
justify-content: space-around;
}

.col-2s {
flex-basis: 50%;
min-width: 300px;
}

.col-2s img {
max-width: 100%;
padding: 50px 0;
}

.col-2 h1 {
font-size: 50px;
line-height: 60px;
margin: 25px 0;
}

.btns {
display: inline-block;
background: #ff523b;
color: #fff;
padding: 8px 30px;
margin: 30px 0;
border-radius: 30px;
transition: background 0.5s;
}

.btns:hover {
background: #563434;
}

.header .row {
margin-top: 70px;
}

/* category */

.categories {
margin: 70px 0;
}

.col-3 {
flex-basis: 30%;
min-width: 250px;
margin-bottom: 30px;
}

.col-3 img {
width: 100%;
}

.small-container {
max-width: 1080px;
margin: auto;
padding-left: 25px;
padding-right: 25px;
}

.col-4s {
flex-basis: 25px;
padding: 10px;
min-width: 200px;
margin-bottom: 50px;
transition: transform 0.5s;
}

.col-4s img {
width: 100%;
}

.title-products {
text-align: center;
margin: 0 auto 80px;
position: relative;
line-height: 60px;
color: #555;
}

.title-products::after {
content: '';
background: #ff523b;
width: 80%;
height: 5px;
border-radius: 5px;
position: absolute;
bottom: 0;
left: 50%;
transform: translateX(-50%);
}

.col-4s h4 {
color: #555;
font-weight: normal;

}

.col-4s p {
font-size: 14px;
}

.rating .fa-star {
color: #ff523b;
}

.col-4s:hover {
transform: translateY(-5px);
}

/* only produc */

.offter {
background: radial-gradient(#fff, #ffd6d6);
margin-top: 80px;
padding: 30px 0;
}

.col-2 .offter-img {
padding: 50px;
}

.col-2 small {
color: #555
}


/*-----------------------  testimonial ---------------------------- */

.testimonial {
padding-top: 100px;

}

.testimonial .col-3 {
text-align: center;
padding: 40px 20px;
box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
cursor: pointer;
transition: transform 0.5s;
}

.testimonial .col-3 img {
width: 50px;
margin-top: 20px;
border-radius: 50%;
}

.testimonial .col-3:hover {
transform: translateY(-10px);

}

.fa-quote-left {
font-size: 34px;
color: #ff523b;
}

.col-3 p {
font-size: 12px;
margin: 12px 0;
color: #777;
}

.testimonial .col-3 h3 {
font-weight: 600;
color: #555;
font-size: 13px;
}

/* ---------------------brands--------------------- */

.brands {
margin: 100px auto;

}

.col-5s {
width: 160px;
}

.col-5s img {
width: 100%;
cursor: pointer;
filter: grayscale(100%);
}

.col-5s img:hover {
filter: grayscale(0);
}
.page-btn {
margin: 0 auto 80px;
}

.page-btn span {
display: inline-block;
border: 1px solid #ff523b;
margin-left: 10px;
width: 40px;
height: 40px;
text-align: center;
line-height: 40px;
cursor: pointer;
}

.page-btn span:hover {
background: #ff523b;
color: #fff;
}
</style>

@extends('frontend.layout.master')
@section('content')

<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="rows row-2s">
        <h2>All Products</h2>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/productsPage">Tất cả sảm phẩm</a></li>
              <li><a class="dropdown-item" href="/productsPage/1">Áo câu lạc bộ</a></li>
              <li><a class="dropdown-item" href="/productsPage/2">Áo đội tuyển quốc gia</a></li>
              <li><a class="dropdown-item" href="/productsPage/3">Áo không logo</a></a></li>
              <li><a class="dropdown-item" href="/productsPage/4">Áo giữ nhiệt</a></a></li>
            </ul>
          </div>
    </div>
      <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="/products/{{$product->id}}">
              <div class="img-box">
                <img src="{{ asset('/') }}frontend/images/{{ $product->url_image }}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                    {{ $product->name }}</h4>
                </h6>
                <h6>
                  Price
                  <span>
                    {{ $product->price }}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <div class="pagination-custom">
    {!! $products->links() !!}
    </div>
    </div>
@stop
