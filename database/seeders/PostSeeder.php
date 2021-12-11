<?php

namespace Database\Seeders;

use App\Http\Controllers\IAccessModifier;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->title = "Ngày cuối tuần";
        $post->content = "Ngày này của 15 năm trước, Blog 360 Yahoo đã lần đầu tiên ra mắt giới trẻ Việt.
Quay về thuở sơ khai ấy cách đây 15 năm, khi Yahoo vẫn còn sáng đèn và Võ Lâm được cả quán net chơi thì Blog là một trang mạng cho phép chúng ta chia sẻ những dòng nhật ký của mình với toàn thế giới.
Vào đó chúng ta có thể cập nhật được xem hôm nay đứa bạn của mình thế nào, thần tượng của mình ra sao, chưa kể còn có nhiều người từ Blog 360 sau này lại trở thành nhà văn, người nổi tiếng.
Có 1 điều mà facebook bây giờ thua đứt đuôi đó là Blog cho phép cài hình và nhạc nền tùy ý. Mấy kiểu hiệu ứng tuyết rơi rồi nhạc nền Mùa Đông Không Lạnh, Chuyện Tình Lan Can ngày ấy hot thôi rồi. Riêng khoản nhạc với hình nền cho blog đã đốt không biết bao nhiêu tiền của thanh niên 8x 9x đời đầu :)))))
Nhớ về thời ấy lại nhớ về thời thơ ngây của tuổi học trò đạp xe dưới ánh nắng chói chang để đến trường. Lên lớp thì thi nhau xem đứa nào nick yahoo chất hơn. Nào là. Tên mà kém chất là về lập nick mới luôn!
Sổ lưu bút ngoài ghi họ tên, sở thích và dòng tâm sự thì mọi người còn ghi thêm cả nick yahoo và đường link Blog. Ra trường nhớ vào đọc Blog của tao để biết tao sống chết như thế nào nhé các kiểu :))
Trên mạng ngày ấy có câu . Nghĩ lại thấy hài mà cũng thấy đúng. Ngoảnh đi ngoảnh lại chưa gì đã 15 năm kể từ ngày Blog bén duyên với giới trẻ Việt lần đầu tiên. Lũ bạn dùng blog ngày ấy đứa giờ thì đi 4 bánh, đứa thì bán mỹ phẩm online, đứa thì đã chui được vào chạn chăn ấm đệm êm. Nói chung là cũng ổn. Chỉ còn riêng mình thì vẫn lông bông....
Chắc viết vậy thôi, chúc mừng sinh nhật tuổi 15 nhé, Blog 360 :x";
        $post->image = "";
        $post->desc = "Ngày này của 15 năm trước, Blog 360 Yahoo đã lần đầu tiên ra mắt giới trẻ Việt.
Quay về thuở sơ khai ấy cách đây 15 năm";
        $post->access_modifier = IAccessModifier::Private;
        $post->user_id = "2";
        $post->category_id = "2";
        $post->save();


        $post = new Post();
        $post->title = "Chuyện tình cảm";
        $post->content = "Có rất nhiều người thứ ba cho rằng bản thân mình đúng. Đúng ở chỗ tình yêu không có lỗi, lỗi ở bản thân họ đã đến chậm hơn người vợ vài bước. Đúng ở chỗ người đàn ông đó tìm đến họ khi tình cảm đã nhạt với người vợ chính chuyên. Tuy nhiên đó chỉ là những câu nói trong lúc mộng mị, ngủ mê mà thôi. Người thứ ba à! Đã đến lúc tỉnh giấc và nhận ra hiện thực rằng mình đang ôm đàn ông của người khác. Có những hiện thực tàn nhẫn và điều chúng ta phải làm là chấp nhận. Trong chuyện tình cảm cũng vậy, chồng người vẫn là của người khác. Đừng dùng bất cứ lý do gì mà vơ vào mình, nghiệp báo đau đớn lắm.
Tôi không biết đây có phải là thời đại của người thứ ba hay không? Và không biết họ sẽ dương dương tự đắc được bao lâu? Nhưng tôi biết màn kịch đó sẽ sớm hạ màn mà thôi. Không ai diễn mãi một vở kịch, mà ngặt nỗi vai diễn đó bạn không được đóng chính. Không ai mãi ngủ mê trong cuộc đời này được, cũng sẽ đến lúc bạn giật mình nhận ra những thứ mình đang nắm giữ vốn dĩ thuộc về một người khác.";
        $post->image = "";
        $post->desc = "Tôi thường ví người thứ ba như “nàng công chúa ngủ quanh năm”, ngủ đến đầu óc mụ mị, nhận nhầm chồng người khác là người đàn ông của mình.";
        $post->access_modifier = IAccessModifier::Public;
        $post->user_id = "3";
        $post->category_id = "1";
        $post->save();


        $post = new Post();
        $post->title = "Ước mơ lập trình";
        $post->content = "“Lập trình viên giỏi không phải chỉ biết code” chính là phương châm của blogger Phạm Huy Hoàng – Du học sinh ngành Computer Science tại Anh. Kỹ thuật lập trình chiếm phân nửa nội dung mà tác giả hướng tới, phần còn lại là kĩ năng mềm như: cách thương lượng lương, sắp xếp thời gian, con đường phát triển sự nghiệp…";
        $post->image = "";
        $post->desc = "“Lập trình viên giỏi không phải chỉ bi...";
        $post->access_modifier = IAccessModifier::Public;
        $post->user_id = "2";
        $post->category_id = "3";
        $post->save();
    }
}
