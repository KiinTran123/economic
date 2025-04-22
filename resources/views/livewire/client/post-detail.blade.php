<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('/assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">{{ $post->title }}</h1>
                <p class="lead">
                    Đọc chi tiết bài viết của chúng tôi.
                </p>
            </div>
        </div>
    </div>
    <section class="pb-0">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-8">
                    <div class="post-wrapper">
                        <h3 class="title font-weight-normal mt-0 text-left">{{ $post->title }}</h3>
                        <p class="text-muted">Đăng bởi: {{ $post->author ?? 'Tác giả không rõ' }} | {{ $post->created_at->format('d/m/Y') }}</p>

                        <div class="post-content">
                            {!! nl2br(e($post->content)) !!} <!-- Hiển thị nội dung bài viết -->
                        </div>

                        <hr>

                        <!-- Form liên hệ -->
                        <div class="contact-wrapper mt-5">
                            <h3 class="title font-weight-normal text-left">Gửi chúng tôi một tin nhắn</h3>
                            <form action="#" method="POST" data-aos="fade-left" data-aos-duration="1200">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Họ và tên" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Tin nhắn" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-lg btn-primary mb-5">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="related-posts-wrapper">
                        <h3 class="font-weight-normal mb-3 text-primary">Bài viết liên quan</h3>
                        @foreach ($relatedPosts as $relatedPost)
                        <div class="card mb-3">
                            <img src="https://tse1.mm.bing.net/th/id/OIP.52YQJGp8zBSA6UX2kBAPPAHaDC?w=1500&h=617&rs=1&pid=ImgDetMain" class="card-img-top" alt="Thumbnail">
                            <div class="card-body">
                                <h5 class="card-title">{{ $relatedPost->title }}</h5>
                                <p class="card-text">{{ Str::limit($relatedPost->content, 120) }}</p>
                                <a href="{{ route('post.detail', $relatedPost->id) }}" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <section class="pt-5">
        <div class="container">
            <h3 class="font-weight-normal mb-3 text-center">Vị trí của chúng tôi</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.97915747782!2d107.58270291427688!3d-6.893096195019089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e67b57d420db%3A0x4dd071fcb9157e80!2sBTC+Fashion+Mall!5e0!3m2!1sen!2sid!4v1522964715022" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe>
        </div>
    </section>
</div>