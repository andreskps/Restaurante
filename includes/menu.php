<section id="menu" class="bg-primario">

    <div class="container p-3" data-aos="fade-up">

        <div>
            <h2 class="text-center fw-bold text-white">Menu</h2>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center " data-aos="fade-up" data-aos-delay="200">

            <li class="m-4 ">
                <a class="link text-white" data-bs-toggle="tab" data-bs-target="#menu-comidas">
                    <h4>Comidas</h4>
                </a><!-- End tab nav item -->
            </li>
            <i class="m-4 ">

                <a class="link text-white " data-bs-toggle="tab" data-bs-target="#menu-bebidas">
                    <h4>Bebidas</h4>
                </a>
            </i><!-- End tab nav item -->

        </ul>



        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            <?php include "comidas.php" ?>
            <?php include "bebidas.php" ?>

            
        </div><!-- End Menu Tabs Content -->

    </div>

    </div>
</section><!-- End Menu Section -->