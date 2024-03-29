@include('user.layouts.template_header_logged')
<!-- Content -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('assets/home-cover-1.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('assets/home-cover-2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('assets/home-cover-3.jpg') }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    <h4 class="mt-5 ms-lg-16 mb-6 text-muted small" data-config-id="logos-header">THƯƠNG HIỆU NỔI TIẾNG</h4>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-2 mb-6 mb-lg-0">
            <div class="d-flex align-items-center bg-white shadow-lg" style="height: 128px;">
                <img class="mx-auto d-block img-fluid"
                    src="https://vinabeauty.vn/wp-content/uploads/2021/10/my-pham-loreal-paris-1.jpg" alt=""
                    data-config-id="logo1">
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-6 mb-lg-0">
            <div class="d-flex align-items-center bg-white shadow-lg" style="height: 128px;">
                <img class="mx-auto d-block img-fluid"
                    src="https://images.krisshop.com/mdp/4pKijNsQlpVrulfi-ZlTlKa-_x0uGVj318l6oxBxEwA/0x0/bWRwLzE3OTQvQW5lc3NhX0hvcml6b250YWxfQmx1ZS5wbmc"
                    alt="" data-config-id="logo2">
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-6 mb-lg-0">
            <div class="d-flex align-items-center bg-white shadow-lg" style="height: 128px;">
                <img class="mx-auto d-block img-fluid"
                    src="https://cdn.shopify.com/s/files/1/0529/3106/8079/files/la_roche-posay_logo.png?v=1619938514"
                    alt="" data-config-id="logo3">
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-6 mb-lg-0">
            <div class="d-flex align-items-center bg-white shadow-lg" style="height: 128px;">
                <img class="mx-auto d-block img-fluid"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Maybelline-Logo.svg/1280px-Maybelline-Logo.svg.png"
                    alt="" data-config-id="logo4">
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-6 mb-md-0">
            <div class="d-flex align-items-center bg-white shadow-lg" style="height: 128px;">
                <img class="mx-auto d-block img-fluid"
                    src="https://1000logos.net/wp-content/uploads/2021/04/MAC-Cosmetics-logo.png" alt=""
                    data-config-id="logo5">
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            <div class="d-flex align-items-center bg-white shadow-lg" style="height: 128px;">
                <img class="mx-auto d-block img-fluid"
                    src="https://senkavietnam.com.vn/public/uploads/1652706890_Logo-Senka-2021_4.png" alt=""
                    data-config-id="logo6">
            </div>
        </div>
    </div>
</div>
<section class="flash-sale-sec">
    <div id="flash-sale">
        <div class="flash-sale-content">
            <div class="flash-sale-title">
                <h2 class="txt-title-bo"><i class="fa-solid fa-fire-flame-curved"></i> GIẢM GIÁ SÂU</h2>
            </div>
            <div class="flash-sale-product-wrapper">
                @foreach ($flashSaleProducts as $flashSaleProduct)
                    <div class="flash-sale-product">
                        <div class="product-ping width-common relative">
                            <a href="{{ route('detail product', ['categorySlug' => getCategoryByProductID($flashSaleProduct->productID)->categorySlug, 'subCategorySlug' => getSubCategoryByProductID($flashSaleProduct->productID)->subCategorySlug, 'productSlug' => $flashSaleProduct->productSlug]) }}"
                                class="image-common relative">
                                <div class="product-img sale">
                                    <img src="{{ asset($flashSaleProduct->productImage) }}" alt=""
                                        height="200" width="200">
                                    <span
                                        class="sale-percent">{{ (1 - round($flashSaleProduct->productDiscountPrice / $flashSaleProduct->productOriginalPrice, 2)) * 100 . '%' }}</span>
                                </div>
                                <div class="product-info">
                                    <div class="width-common price-block">
                                        <strong
                                            class="discount-price txt-16">{{ formatCurrency($flashSaleProduct->productDiscountPrice) }}
                                            &#8363;</strong>
                                        <span
                                            class="original-price txt-12 right">{{ $flashSaleProduct->productOriginalPrice }}
                                            &#8363;</span>
                                    </div>
                                    <div class="product-name-block">
                                        <h3 class="width-common pr-name sp-bottom-5">
                                            <div class="product-name cyan-link">{{ $flashSaleProduct->productName }}
                                            </div>
                                        </h3>
                                    </div>
                                    <div class="sold-number">
                                        <span class="sold-product-number">Đã bán: 100</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="suggested-products">
    <div class="suggested-product-container">
        <div class="suggested-product-title">
            <h1 class="section-txt-title">GỢI Ý CHO BẠN</h1>
        </div>
        <div class="suggested-product-content grid-5-col">
            @foreach ($suggestedProducts as $product)
                <div class="preview-product">
                    <div class="product-ping width-common relative">
                        <a href="{{ route('detail product', ['categorySlug' => getCategoryByProductID($product->productID)->categorySlug, 'subCategorySlug' => getSubCategoryByProductID($product->productID)->subCategorySlug, 'productSlug' => $product->productSlug]) }}"
                            class="image-common relative">
                            <div class="product-img sale">
                                <img src="{{ asset($product->productImage) }}" alt="" height="200"
                                    width="200">
                                <span
                                    class="sale-percent">{{ (1 - round($product->productDiscountPrice / $product->productOriginalPrice, 2)) * 100 . '%' }}</span>
                            </div>
                            <div class="product-info">
                                <div class="width-common price-block">
                                    <strong
                                        class="discount-price txt-16">{{ formatCurrency($product->productDiscountPrice) }}
                                        &#8363;</strong>
                                    <span
                                        class="original-price txt-12 right">{{ formatCurrency($product->productOriginalPrice) }}
                                        &#8363;</span>
                                </div>
                                <div class="product-name-block">
                                    <h3 class="width-common pr-name sp-bottom-5">
                                        <div class="product-name cyan-link">{{ $product->productName }}
                                        </div>
                                    </h3>
                                </div>
                                <div class="rate-block">
                                    <span class="rate-star left">4.5 <i class="fa-solid fa-star"></i></span>
                                    <span class="sold-product-number right">Đã bán: 100</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn-see-more">Xem thêm</button>
    </div>
</section>

<section class="suggested-blogs">
    <div class="suggested-blog-container">
        <div class="suggested-blog-title">
            <h1 class="section-txt-title">CẨM NANG</h1>
        </div>
        <div class="suggested-blog-content">
            <div class="preview-blog grid-3-col">
                @foreach ($blogs as $blog)
                    <div class="blog-ping width-common relative">
                        <a href="{{ route('blog.detail', ['blogSlug' => $blog->blogSlug]) }}"
                            class="blog-home relative">
                            <div class="blog-img">
                                <img src="{{ asset($blog->blogImage) }}" alt="" height="280"
                                    width="350">
                            </div>
                            <div class="width-common blog-content">
                                <div class="blog-title">
                                    <h3 class="title-preview">{{ $blog->blogTitle }}</h3>
                                </div>
                                <div class="blog-preview-content width-common">
                                    {{ $blog->blogIntro }}
                                </div>
                                <div class="read-more width-common">
                                    <span class="right">Đọc tiếp <i class="fa-solid fa-arrow-right-long"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="{{ route('blog') }}">
            <button class="btn-see-more">Xem thêm</button>
        </a>
    </div>
</section>
@include('user.layouts.template_footer')
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js
"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    $(document).ready(function() {});
</script>
