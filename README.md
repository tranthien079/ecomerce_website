### Features :
- ##### PWA (progressive web app)
# ====== FRONT-END =======

- Bố cục đáp ứng
- Giỏ hàng, Danh sách yêu thích, Đánh giá sản phẩm
- Phiếu giảm giá & Giảm giá
- Thuộc tính sản phẩm: giá gốc, giá khuyến mãi, kho, kích thước...
- Blog: danh mục, thẻ, nội dung, trang web
- Module/Mở rộng: Vận chuyển, thanh toán, giảm giá, ...
- Trình quản lý tải lên: biểu ngữ, hình ảnh,..
- Hỗ trợ SEO: URL tùy chỉnh
- Quản lý bản tin
- Biểu mẫu liên hệ với thông báo thời gian thực (Laravel Pusher)
- Sản phẩm liên quan, Gợi ý cho bạn trong các danh mục của chúng tôi
- Biểu mẫu tìm kiếm sản phẩm
- Triển khai Laravel Socialite (Facebook, Google & Twitter) & Đăng nhập khách hàng
- Chia sẻ và theo dõi sản phẩm từ các nền tảng xã hội khác nhau...
- Tích hợp thanh toán (Paypal)
- Hệ thống theo dõi đơn hàng
- Hệ thống bình luận nhiều cấp nhiều hơn nữa......
## ======= ADMIN =======
- Vai trò quản trị viên, quyền hạn
- Quản lý sản phẩm
- Quản lý phương tiện truyền thông bằng cách sử dụng unisharp laravel file manager
- Quản lý biểu ngữ
- Quản lý đơn hàng
- Quản lý danh mục
- Quản lý thương hiệu
- Quản lý vận chuyển
- Quản lý đánh giá
- Quản lý blog, danh mục & thẻ
- Quản lý người dùng
- Quản lý phiếu giảm giá
- Cấu hình hệ thống: cài đặt email, thông tin cửa hàng, trạng thái bảo trì,...
- Biểu đồ đường và biểu đồ tròn ...
- Tạo đơn hàng dưới dạng tệp pdf...
- Tin nhắn và thông báo thời gian thực
- Cài đặt hồ sơ
- Nhiều hơn nữa....
## ======= USER DASHBOARD =======
- Quản lý đơn hàng
- Quản lý đánh giá
- Quản lý bình luận
- Cài đặt hồ sơ
### Set up :

1. Clone the repo and cd into it
2. In your terminal ```composer install```
3. Rename or copy ```.env.example``` file to ``.env``
4. php artisan key:generate
5. Set your database credentials in your ```.env``` file
6. Set your Braintree credentials in your ```.env``` file if you want to use PayPal
7. Import db file(```database/e-shop.sql```) into your database (```mysql,sql```)
8. ```npm install```
9. ```npm run watch```
10. run command[laravel file manager]:-  ```php artisan storage:link```
11. Edit ```.env``` file :- remove APP_URL
10. ```php artisan serve``` or use virtual host
11. Visit ```localhost:8000``` in your browser
12. Visit /admin if you want to access the admin panel. Admin Email/Password: ```admin@gmail.com```/```1111```. User Email/Password: ```user@gmail.com```/```1111```

<p style="text-align:center">Thank You so much for your time !!!</p> 
