@include('user.layouts.template_header_logged')
<div class="privacy-policy-cover other-cover">
    <img src="/assets/delivery-policy-cover.svg" alt="" width="1100">
</div>

<div class="delivery-policy-container other-container">
    <div class="delivery-policy-content other-content">
        <div class="delivery-policy-title other-title">
            <h1 class="page-txt-title">Chính sách vận chuyển</h1>
            <hr>
        </div>
        <div class="delivery-policy-body other-body" style="text-align: justify; padding: 30px">
            <p>Việc thu phí vận chuyển khi mua tại PING Cosmetics sẽ được tính như sau: </p>
            <table class="tb-delivery">
                <thead>
                <tr>
                    <th>Điều kiện</th>
                    <th>Mô tả</th>
                    <th>Phí vận chuyển</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>&#8804; 250.000 &#8363;</td>
                    <td>Đơn hàng ít hơn hoặc bằng 250.000 &#8363;</td>
                    <td>30.000 &#8363;</td>
                </tr>
                <tr>
                    <td>> 250.000 &#8363;</td>
                    <td>Đơn hàng lớn hơn 250.000 &#8363;</td>
                    <td>Miễn phí</td>
                </tr>
                </tbody>
            </table>
            <p>Nếu có bất cứ thắc mắc nào về điều kiện áp dụng phí vận chuyển, vui lòng liên hệ PING Cosmetics để được giải đáp.</p>
        </div>
    </div>
</div>

@include('user.layouts.template_footer')
