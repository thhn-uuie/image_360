<?php

use yii\imagine\Image;
use yii\helpers\Url;
use frontend\widgets\recommendedWidget;

?>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <?php foreach ($products_cate as $item): ?>
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-products" src="<?php echo '../../image/products/' . $item->image ?>"
                             id="product-detail">
                    </div>

                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $item->name_products ?></h1>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Đánh giá 4.8 | 36 Bình luận</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Danh mục:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?= Url::toRoute(['products/products-category', 'id_cate' => $name_cate[0]['id_category']]) ?>">
                                        <p class="text-muted">
                                            <strong><?php echo $name_cate[0]['name_category'] ?></strong></p>
                                    </a>
                                </li>
                            </ul>

                            <h6>Mô tả:</h6>
                            <p><?php echo $item->description ?></p>


                            <h6>Mã QR:</h6>

                            <button data-modal-target="#modal">Open Modal</button>
                            <div class="modal" id="modal">
                                <div class="modal-header">
                                    <div class="title">Example Modal</div>
                                    <button data-close-button class="close-button">&times;</button>
                                </div>
                                <div class="modal-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quod alias ut illo
                                    doloremque eum ipsum obcaecati distinctio debitis reiciendis quae quia soluta totam
                                    doloribus quos nesciunt necessitatibus, consectetur quisquam accusamus ex, dolorum,
                                    dicta vel? Nostrum voluptatem totam, molestiae rem at ad autem dolor ex aperiam.
                                    Amet assumenda eos architecto, dolor placeat deserunt voluptatibus tenetur sint
                                    officiis perferendis atque! Voluptatem maxime eius eum dolorem dolor exercitationem
                                    quis iusto totam! Repudiandae nobis nesciunt sequi iure! Eligendi, eius libero. Ex,
                                    repellat sapiente!
                                </div>
                            </div>
                            <div id="overlay"></div>

                            <style>

                                .modal {
                                    position: fixed;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%) scale(0);
                                    transition: 200ms ease-in-out;
                                    border: 1px solid black;
                                    border-radius: 10px;
                                    z-index: 10;
                                    background-color: white;
                                    width: 500px;
                                    max-width: 80%;
                                }

                                .modal.active {
                                    transform: translate(-50%, -50%) scale(1);
                                }

                                .modal-header {
                                    padding: 10px 15px;
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                    border-bottom: 1px solid black;
                                }

                                .modal-header .title {
                                    font-size: 1.25rem;
                                    font-weight: bold;
                                }

                                .modal-header .close-button {
                                    cursor: pointer;
                                    border: none;
                                    outline: none;
                                    background: none;
                                    font-size: 1.25rem;
                                    font-weight: bold;
                                }

                                .modal-body {
                                    padding: 10px 15px;
                                }

                                #overlay {
                                    position: fixed;
                                    opacity: 0;
                                    transition: 200ms ease-in-out;
                                    top: 0;
                                    left: 0;
                                    right: 0;
                                    bottom: 0;
                                    background-color: rgba(0, 0, 0, .5);
                                    pointer-events: none;
                                }

                                #overlay.active {
                                    opacity: 1;
                                    pointer-events: all;
                                }
                            </style>


                            <script>
                                const openModalButtons = document.querySelectorAll('[data-modal-target]')
                                const closeModalButtons = document.querySelectorAll('[data-close-button]')
                                const overlay = document.getElementById('overlay')

                                openModalButtons.forEach(button => {
                                    button.addEventListener('click', () => {
                                        const modal = document.querySelector(button.dataset.modalTarget)
                                        openModal(modal)
                                    })
                                })

                                overlay.addEventListener('click', () => {
                                    const modals = document.querySelectorAll('.modal.active')
                                    modals.forEach(modal => {
                                        closeModal(modal)
                                    })
                                })

                                closeModalButtons.forEach(button => {
                                    button.addEventListener('click', () => {
                                        const modal = button.closest('.modal')
                                        closeModal(modal)
                                    })
                                })

                                function openModal(modal) {
                                    if (modal == null) return
                                    modal.classList.add('active')
                                    overlay.classList.add('active')
                                }

                                function closeModal(modal) {
                                    if (modal == null) return
                                    modal.classList.remove('active')
                                    overlay.classList.remove('active')
                                }
                            </script>
                            <h6>Ảnh 360 độ:</h6>
                            <?php echo $item->files ?>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">

                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">
                                            Đánh giá
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Recommended Products -->
<?= recommendedWidget::widget() ?>
<!-- End Recommended Products -->


<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        123 Consectetur at ligula 10660
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Luxury</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                    <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                    <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Home</a></li>
                    <li><a class="text-decoration-none" href="#">About Us</a></li>
                    <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                    <li><a class="text-decoration-none" href="#">FAQs</a></li>
                    <li><a class="text-decoration-none" href="#">Contact</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i
                                    class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i
                                    class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                           placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2021 Company Name
                        | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->
