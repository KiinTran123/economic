<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('/assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">Bài viết</h1>
                <p class="lead">Khám phá các tin tức và chia sẻ từ chúng tôi.</p>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                @forelse ($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://tse1.mm.bing.net/th/id/OIP.52YQJGp8zBSA6UX2kBAPPAHaDC?w=1500&h=617&rs=1&pid=ImgDetMain" class="card-img-top" alt="Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $post->title }}</h5>
                            <p class="card-subtitle mb-2 text-muted">
                                {{ $post->author ?? 'Tác giả không rõ' }} - {{ $post->created_at->format('d/m/Y') }}
                            </p>
                            <p class="card-text flex-grow-1">{{ Str::limit($post->content, 120) }}</p>
                            <a href=" {{ route('post.detail', $post->id) }}" class="btn btn-sm btn-outline-primary mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p>Không có bài viết nào.</p>
                </div>
                @endforelse
            </div>
            <style>
                .relative .inline-flex {
                    display: none;
                }
            </style>
            {{-- PHÂN TRANG --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </section>

</div>