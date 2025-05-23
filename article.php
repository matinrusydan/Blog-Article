<?php
// Include the database connection and utility functions
require_once 'db_connection.php';
require_once 'get_comments.php';

// Gunakan fungsi tanpa mendefinisikannya ulang
$article_id = 1; // Contoh, bisa dari $_GET atau lainnya

$comments = getComments($article_id);
$commentCount = countComments($article_id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Future of AI Development in 2025 - MOTOBUZZ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF5A00;    /* Bright orange - energetic, powerful */
            --secondary-color: #212529;  /* Dark gray/black - bold, serious */
            --third-color: #D10000;      /* Dark red - aggressive, sporty */
            --light-color: #FFFFFF;
        }
        
        body {
            font-family: 'Rajdhani', 'Segoe UI', sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }
        
        .navbar {
            background-color: var(--secondary-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 800;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.5rem;
        }
        
        .navbar-brand span {
            color: var(--third-color);
        }
        
        .nav-link {
            color: white !important;
            font-weight: 600;
            margin: 0 10px;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: all 0.3s;
            padding: 8px 15px !important;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary-color) !important;
            background-color: rgba(255,255,255,0.1);
            border-radius: 3px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 8px 22px;
            border-radius: 3px;
        }
        
        .btn-primary:hover {
            background-color: #e65100;
            border-color: #e65100;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            border-width: 2px;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-third {
            background-color: var(--third-color);
            border-color: var(--third-color);
            color: white;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 8px 22px;
            border-radius: 3px;
        }
        
        .btn-third:hover {
            background-color: #b10000;
            border-color: #b10000;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .article-header {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/api/placeholder/1920/400') center/cover no-repeat;
            padding: 60px 0;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .article-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            z-index: 1;
        }
        
        .article-header .container {
            position: relative;
            z-index: 2;
        }
        
        .article-header h1 {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .article-meta {
            margin-top: 20px;
        }
        
        .article-meta div {
            display: inline-block;
            color: #eee;
            font-size: 0.95rem;
        }
        
        .article-meta i {
            color: var(--primary-color);
            margin-right: 5px;
        }
        
        .category-badge {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 5px 15px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            margin-bottom: 15px;
        }
        
        .category-badge.technology {
            background-color: var(--primary-color);
        }
        
        .article-content {
            padding: 40px 0;
        }
        
        .article-content h2, .article-content h3 {
            color: var(--secondary-color);
            font-weight: 600;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        
        .article-content p {
            margin-bottom: 20px;
            line-height: 1.7;
        }
        
        .article-content ul, .article-content ol {
            margin-bottom: 25px;
            padding-left: 20px;
        }
        
        .article-content li {
            margin-bottom: 10px;
        }
        
        .article-content blockquote {
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            background-color: rgba(255, 90, 0, 0.05);
            margin: 30px 0;
            font-style: italic;
        }
        
        .share-buttons {
            margin: 40px 0;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .share-buttons h5 {
            font-weight: 600;
            text-transform: uppercase;
            color: var(--secondary-color);
        }
        
        .share-buttons a {
            color: var(--secondary-color);
            margin-right: 15px;
            font-size: 20px;
            transition: all 0.3s;
        }
        
        .share-buttons a:hover {
            color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .post-navigation {
            margin: 40px 0;
            padding: 20px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }
        
        .post-navigation a {
            color: var(--secondary-color);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .post-navigation a:hover {
            color: var(--primary-color);
        }
        
        .post-navigation i {
            color: var(--primary-color);
        }
        
        .post-navigation small {
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 0.7rem;
        }
        
        .related-posts {
            margin: 60px 0;
        }
        
        .related-posts h3 {
            font-weight: 600;
            text-transform: uppercase;
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        
        .related-posts h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .related-post-card {
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .related-post-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.15);
        }
        
        .related-post-img {
            height: 180px;
            object-fit: cover;
            transition: all 0.5s;
        }
        
        .related-post-card:hover .related-post-img {
            transform: scale(1.05);
        }
        
        .related-post-card a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .related-post-card a:hover {
            color: var(--primary-color);
        }
        
        .comments-section {
            margin: 60px 0;
        }
        
        .comments-section h3 {
            font-weight: 600;
            text-transform: uppercase;
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        
        .comments-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .comment {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eee;
        }
        
        .comment-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
        }
        
        .comment h5 {
            font-weight: 600;
        }
        
        .comment-meta {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .comment-reply {
            margin-left: 70px;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #f5f5f5;
        }
        
        .comment-form {
            margin-top: 40px;
        }
        
        .comment-form h4 {
            font-weight: 600;
            text-transform: uppercase;
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        
        .comment-form h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .comment-form label {
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 90, 0, 0.25);
        }
        
        footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 40px 0;
        }
        
        footer h5 {
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        footer h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        footer ul li {
            margin-bottom: 10px;
        }
        
        footer a {
            transition: all 0.3s;
            position: relative;
            display: inline-block;
            color: white;
            text-decoration: none;
        }
        
        footer a:hover {
            color: var(--primary-color) !important;
            transform: translateX(5px);
        }
        
        .social-links a {
            color: white;
            background-color: rgba(255,255,255,0.1);
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 3px;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">MOTO<span>BUZZ</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Modifikasi</a>
                    </li>
                </ul>
                <div class="ms-3">
                    <a href="#" class="btn btn-primary"><i class="fas fa-search me-2"></i>Cari</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Article Header -->
    <header class="article-header">
        <div class="container text-center position-relative" style="z-index: 1;">
            <span class="category-badge technology">Teknologi</span>
            <h1 class="display-4 fw-bold mb-4">The Future of AI Development in 2025</h1>
            <div class="article-meta d-flex justify-content-center">
                <div class="me-4">
                    <i class="far fa-calendar"></i> April 28, 2025
                </div>
                <div class="me-4">
                    <i class="far fa-user"></i> By Admin
                </div>
                <div>
                    <i class="far fa-comments"></i> 5 Comments
                </div>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="article-content">
                        <img src="images/Honda-Jazz.png" class="img-fluid rounded d-block mx-auto" alt="Honda Jazz">
                        
                        <p class="lead mt-4">Modifikasi Honda Jazz semakin digemari di kalangan pecinta otomotif, menggabungkan tampilan sporty dengan peningkatan performa yang signifikan. Dari body kit agresif hingga upgrade mesin, Jazz menjadi simbol gaya sekaligus kekuatan di jalanan.</p>

                        <p>Transformasi Honda Jazz bukan hanya soal penampilan. Dengan sentuhan modifikasi yang tepat, mobil hatchback ini bisa tampil lebih garang dan memiliki performa yang jauh lebih responsif. Kombinasi antara estetika dan kekuatan menjadikan Jazz sebagai salah satu pilihan utama dalam dunia modifikasi mobil di Indonesia.</p>

                        <h2>Body Kit yang Mengubah Tampilan</h2>

                        <p>Salah satu modifikasi paling mencolok adalah penggunaan body kit agresif. Elemen-elemen seperti bumper depan-belakang, side skirt, dan diffuser belakang tidak hanya menambah kesan sporty, tapi juga memberikan aerodinamika yang lebih baik:</p>

                        <ul>
                            <li><strong>Bumper custom:</strong> Desain tajam dan besar memberikan kesan lebih garang pada tampilan depan mobil.</li>
                            <li><strong>Side skirt:</strong> Menambah kesan ceper dan mempertegas garis bodi mobil.</li>
                            <li><strong>Rear diffuser:</strong> Tak hanya estetis, tapi juga membantu mengalirkan udara dengan lebih baik di bagian bawah mobil.</li>
                        </ul>

                        <p>Dengan pilihan body kit yang tepat, Honda Jazz bisa tampil layaknya mobil balap jalanan yang siap mencuri perhatian di mana pun ia melaju.</p>

                        <blockquote>
                            "Modifikasi bukan hanya soal gaya, tapi bagaimana karakter mobil mencerminkan kepribadian pemiliknya. Honda Jazz memberi ruang luas untuk berekspresi dan berinovasi."
                        </blockquote>

                        <h2>Peningkatan Performa Mesin</h2>

                        <p>Selain tampilan, sektor mesin juga tak luput dari sentuhan modifikasi. Beberapa penggemar memilih melakukan upgrade pada bagian intake, exhaust, hingga ECU tuning:</p>

                        <ul>
                            <li>Pemasangan cold air intake untuk aliran udara yang lebih baik</li>
                            <li>Exhaust system racing yang meningkatkan suara dan tenaga</li>
                            <li>ECU remap untuk pengaturan bahan bakar dan pembakaran yang lebih optimal</li>
                            <li>Suspensi dan rem yang ditingkatkan agar seimbang dengan tenaga tambahan</li>
                        </ul>

                        <p>Dengan modifikasi ini, Honda Jazz tidak hanya enak dilihat, tapi juga lebih menyenangkan dikendarai.</p>

                        <h2>Kesimpulan</h2>

                        <p>Modifikasi Honda Jazz merupakan perpaduan antara seni dan teknik. Dengan pendekatan yang seimbang antara gaya dan performa, mobil ini bisa menjadi cerminan jati diri penggunanya sekaligus meningkatkan kenyamanan dan pengalaman berkendara.</p>

                        <p><strong>Tren modifikasi:</strong> Dari gaya JDM, stance, hingga racing look, Jazz memberikan banyak ruang untuk berkreasi dan bereksperimen.</p>

                        <p><strong>Kustomisasi interior:</strong> Tidak sedikit yang juga melakukan upgrade pada bagian kabin, seperti penggantian jok, sistem audio, hingga penggunaan setir racing untuk kesan yang lebih personal.</p>

                        <p>Pada akhirnya, modifikasi Honda Jazz bukan sekadar hobi, tetapi juga bentuk ekspresi dan kecintaan terhadap dunia otomotif yang terus berkembang.</p>

                    </div>
                    
                    <!-- Share Buttons -->
                    <div class="share-buttons">
                        <h5 class="mb-3">Share this article</h5>
                        <a href="#" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" title="Share on Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a>
                        <a href="#" title="Share via Email"><i class="fas fa-envelope"></i></a>
                    </div>
                    
                    <!-- Post Navigation -->
                    <div class="post-navigation">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="d-flex align-items-center">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Artikel Sebelumnya</small>
                                        <span>Creating Accessible Websites: A Complete Guide</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                <a href="#" class="d-flex align-items-center justify-content-md-end">
                                    <div>
                                        <small class="text-muted d-block">Artikel Berikutnya</small>
                                        <span>UI/UX Design Trends To Watch This Year</span>
                                    </div>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Related Posts -->
                    <div class="related-posts">
                        <h3 class="mb-4">Artikel Terkait</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card related-post-card mb-4">
                                    <img src="/api/placeholder/400/250" class="card-img-top related-post-img" alt="Related Post">
                                    <div class="card-body">
                                        <h6 class="card-title"><a href="#" class="text-decoration-none">The Growing Impact of Blockchain Technology</a></h6>
                                        <small class="text-muted">April 15, 2025</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card related-post-card mb-4">
                                    <img src="/api/placeholder/400/250" class="card-img-top related-post-img" alt="Related Post">
                                    <div class="card-body">
                                        <h6 class="card-title"><a href="#" class="text-decoration-none">How Startups Are Adapting to Remote Work</a></h6>
                                        <small class="text-muted">April 20, 2025</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card related-post-card mb-4">
                                    <img src="/api/placeholder/400/250" class="card-img-top related-post-img" alt="Related Post">
                                    <div class="card-body">
                                        <h6 class="card-title"><a href="#" class="text-decoration-none">UI/UX Design Trends To Watch This Year</a></h6>
                                        <small class="text-muted">April 25, 2025</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section">
                        <h3 class="mb-4">Komentar (<?php echo $comment_count; ?>)</h3>
                        
                        <?php if (empty($comments)): ?>
                            <div class="alert alert-info">
                                Belum ada komentar. Jadilah yang pertama untuk berkomentar!
                            </div>
                        <?php else: ?>
                            <?php foreach ($comments as $comment): ?>
                                <?php if (!isset($comment['parent_comment_id'])): ?>
                                    <!-- Comment -->
                                    <div class="comment">
                                        <div class="d-flex">
                                            <div class="comment-avatar me-3">
                                                <img src="/api/placeholder/60/60" alt="User Avatar" class="img-fluid">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1"><?php echo htmlspecialchars($comment['name']); ?></h5>
                                                <div class="comment-meta">
                                                    <span><?php echo formatCommentDate($comment['comment_date']); ?></span>
                                                </div>
                                                <p><?php echo nl2br(htmlspecialchars($comment['comment_text'])); ?></p>
                                                <button class="btn btn-sm btn-primary reply-btn" data-comment-id="<?php echo $comment['comment_id']; ?>">Reply</button>
                                            </div>
                                        </div>
                                        
                                        <?php
                                        // Get replies to this comment
                                        $replies = getReplies($comment['comment_id']);
                                        foreach ($replies as $reply): 
                                        ?>
                                            <!-- Reply to Comment -->
                                            <div class="comment-reply">
                                                <div class="d-flex">
                                                    <div class="comment-avatar me-3">
                                                        <img src="/api/placeholder/60/60" alt="<?php echo $reply['is_admin'] ? 'Admin' : 'User'; ?> Avatar" class="img-fluid">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="mb-1"><?php echo $reply['is_admin'] ? 'Admin' : htmlspecialchars($reply['name']); ?></h5>
                                                        <div class="comment-meta">
                                                            <span><?php echo formatCommentDate($reply['comment_date']); ?></span>
                                                        </div>
                                                        <p><?php echo nl2br(htmlspecialchars($reply['comment_text'])); ?></p>
                                                        <button class="btn btn-sm btn-primary reply-btn" data-comment-id="<?php echo $comment['comment_id']; ?>">Reply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                        <!-- Comment Form -->
                        <div class="comment-form">
                            <h4 class="mb-4">Tinggalkan Komentar</h4>
                            
                            <!-- Alert for form submission status -->
                            <?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
                                <div class="alert alert-<?php echo $_GET['status'] == 'success' ? 'success' : 'danger'; ?> mb-4" role="alert">
                                    <?php echo htmlspecialchars($_GET['message']); ?>
                                </div>
                            <?php endif; ?>
                            
                            <form action="comment_handler.php" method="POST" id="commentForm">
                                <!-- Hidden field for article ID -->
                                <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                                
                                <!-- Hidden field for parent comment ID (for replies) -->
                                <input type="hidden" name="parent_comment_id" id="parent_comment_id" value="">
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama *</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email *</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Komentar *</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                            </form>
                        </div>
                    </div>
                    </div> 
                </div> 
            </div> 
        </div> 
    </section>


                        
    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
          <div class="row">
            <!-- Kolom 1: Tentang Kami -->
            <div class="col-md-3">
              <h5>Tentang Kami</h5>
              <p>Blog ini membahas dunia otomotif, mulai dari ulasan motor, tips perawatan kendaraan, hingga perkembangan teknologi terbaru di industri otomotif. Didedikasikan untuk para pecinta kendaraan roda dua dan empat, kami hadir untuk memberikan informasi yang akurat dan inspiratif.</p>
            </div>
            <!-- Kolom 2: Navigasi -->
            <div class="col-md-3">
              <h5>Navigasi</h5>
              <ul class="list-unstyled">
                <li><a href="index.html" class="text-white text-decoration-none">Home</a></li>
                <li><a href="blog.html" class="text-white text-decoration-none">Blog</a></li>
                <li><a href="#" class="text-white text-decoration-none">© 2025 Matin Rusydan</a></li>
              </ul>
            </div>
            <!-- Kolom 3: Kontak -->
            <div class="col-md-3">
              <h5>Kontak</h5>
              <ul class="list-unstyled">
                <li><a href="mailto:matin.rusydan@gmail.com" class="text-white text-decoration-none">matin.rusydan@gmail.com</a></li>
                <li><a href="tel:08123456789" class="text-white text-decoration-none">08123456789</a></li>
              </ul>
              <div class="d-flex gap-2 mt-2">
                <a href="#"><img src="images/whatsapp.png" alt="WhatsApp" width="24" height="24"></a>
                <a href="#"><img src="images/telegram.png" alt="Telegram" width="24" height="24"></a>
              </div>
            </div>
            <!-- Kolom 4: Informasi -->
            <div class="col-md-3">
              <h5>Informasi</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white text-decoration-none">Kontak Kami</a></li>
                <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                <li><a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a></li>
                <li><a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a></li>
                <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top border-secondary pt-4 mt-4 text-center">
            <p class="mb-0">© 2025 MotoBuzz. All rights reserved.</p>
          </div>
        </div>
      </footer>
      

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
    // Simple script to handle reply functionality
    document.addEventListener('DOMContentLoaded', function() {
        const replyButtons = document.querySelectorAll('.reply-btn');
        const commentForm = document.getElementById('commentForm');
        const parentCommentIdField = document.getElementById('parent_comment_id');
        
        replyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                parentCommentIdField.value = commentId;
                
                // Scroll to form
                commentForm.scrollIntoView({ behavior: 'smooth' });
                
                // Focus on comment textarea
                document.getElementById('comment').focus();
            });
        });
    });
</script>
</body>
</html>