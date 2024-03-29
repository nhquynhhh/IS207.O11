@include('user.layouts.template_header_logged')
<div class="most-asked-questions-cover other-cover">
    <img class src="/assets/most-asked-questions-cover.svg" alt="" width="1100">
</div>

<div class="most-asked-questions-container other-container">
    <div class="most-asked-questions-content other-content">
        <div class="most-asked-questions-title other-title">
            <h1 class="page-txt-title">Các câu hỏi thường gặp</h1>
            <hr>
        </div>
        <div class="most-asked-questions-body other-body">
            <div class="question-1 question">
                <div class="question-1-title question-title" onclick="toggleAnswer(1)">
                    <span><strong>Làm sao để đăng ký tài khoản trên website của PING Cosmetics?</strong></span>
                    <i class="fa-solid fa-angle-down right"></i>
                    <hr>
                </div>
                <div class="question-1-answer question-answer">
                    <p>
                        Quý khách vui lòng nhấn vào nút “Đăng ký” trên góc phải màn hình sau đó chọn “Tạo tài khoản”.
                        Vui lòng điền đầy đủ các thông tin được yêu cầu và nhấn nút “Đăng ký”. <br>
                        Trường hợp không đăng ký được tài khoản, vui lòng liên hệ quản trị viên website hoặc gọi đến hotline để được hỗ trợ.
                    </p>
                </div>
            </div>
            <div class="question-2 question">
                <div class="question-2-title question-title" onclick="toggleAnswer(2)">
                    <span><strong>Tại sao tôi không thể đăng nhập vào website?</strong></span>
                    <i class="fa-solid fa-angle-down right"></i>
                    <hr>
                </div>
                <div class="question-2-answer question-answer">
                    <p>
                        Quý khách vui lòng kiểm tra kỹ về kiểu gõ hoặc phím Caps Lock trong quá trình điền thông tin
                        đăng nhập thành viên, trường hợp không thể đăng nhập thành công quý khách vui lòng chọn nút
                        “Quên mật khẩu” trên góc phải màn hình và thực hiện các thao tác cần thiết.
                    </p>
                </div>
            </div>
            <div class="question-3 question">
                <div class="question-3-title question-title" onclick="toggleAnswer(3)">
                    <span><strong>Tôi có thể sử dụng chung tài khoản với người khác được không?</strong></span>
                    <i class="fa-solid fa-angle-down right"></i>
                    <hr>
                </div>
                <div class="question-3-answer question-answer">
                    <p>
                        Quý khách nên sử dụng tài khoản cá nhân để đảm bảo độ tin cậy cũng như quyền lợi của
                        bản thân khi mua sắm. Việc sử dụng chung tài khoản có thể dẫn đến những sai sót mà
                        người chịu ảnh hưởng trực tiếp chính là quý khách hàng.
                    </p>
                </div>
            </div>
            <div class="question-4 question">
                <div class="question-4-title question-title" onclick="toggleAnswer(4)">
                    <span><strong>Làm thế nào để đặt hàng trên website?</strong></span>
                    <i class="fa-solid fa-angle-down right"></i>
                    <hr>
                </div>
                <div class="question-4-answer question-answer">
                    <p>
                        Để đặt hàng, quý khách có thể thực hiện tìm kiếm sản phẩm để lựa chọn sản phẩm cần mua.
                        Sau khi lựa chọn được sản phẩm, nhấn chọn "Thêm vào giỏ hàng" để thêm sản phẩm vào giỏ hàng và tiếp tục mua sắm.
                        Nếu muốn mua ngay, nhấn chọn "Mua ngay", hệ thống sẽ chuyển hướng đến mục xác nhận đơn hàng và quý khách cần nhập đầy đủ thông tin nhận hàng để hoàn thành quy trình đặt hàng.
                    </p>
                </div>
            </div>
            <div class="question-5 question">
                <div class="question-5-title question-title" onclick="toggleAnswer(5)">
                    <span><strong>Tôi có thể liên hệ bằng cách nào để nhận được hỗ trợ?</strong></span>
                    <i class="fa-solid fa-angle-down right"></i>
                    <hr>
                </div>
                <div class="question-5-answer question-answer">
                    <p>
                        Để được hỗ trợ, quý khách vui lòng tham khảo phần <a href="" class="cyan-link">Thông tin liên hệ</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.layouts.template_footer')
