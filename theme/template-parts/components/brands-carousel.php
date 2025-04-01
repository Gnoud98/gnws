<?php
/**
 * Brands Carousel Component using Swiper
 *
 * @package gnws
 */
?>

<section class="py-16">
    <div class="mx-auto px-4">
        <h2 class="text-[#6D757D] text-lg text-center mb-[24px]">
            The best brands on Shopify choose BOGOS
        </h2>

        <div class="swiper brandsSwiper mx-auto px-12 relative">
            <div class="swiper-wrapper items-center">
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/palladium.png" alt="Palladium" class="w-auto h-[88px] mx-auto object-contain">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heliocare.png" alt="Heliocare" class="w-auto h-[88px] mx-auto object-contain">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/medicube.png" alt="Medicube" class="w-auto h-[88px] mx-auto object-contain">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/parfums.png" alt="Parfums de Marly" class="w-auto h-[88px] mx-auto object-contain">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thefaceshop.png" alt="The Face Shop" class="w-auto h-[88px] mx-auto object-contain">
                </div>
            </div>

            <div class="swiper-button-prev !w-10 !h-10 !bg-white !rounded-full !shadow-lg after:!text-[#091033] after:!text-lg"></div>
            <div class="swiper-button-next !w-10 !h-10 !bg-white !rounded-full !shadow-lg after:!text-[#091033] after:!text-lg"></div>
            
            <div class="swiper-pagination !bottom-[-30px]"></div>
        </div>
    </div>
</section>

<style>
.brandsSwiper .swiper-slide {
    opacity: 0.5;
    transition: opacity 0.3s ease;
}

.brandsSwiper .swiper-slide-active {
    opacity: 1;
}

.brandsSwiper .swiper-button-prev,
.brandsSwiper .swiper-button-next {
    opacity: 1;
    transition: opacity 0.3s ease;
}

.brandsSwiper .swiper-button-prev {
    left: -5px;
}

.brandsSwiper .swiper-button-next {
    right: -5px;
}

.brandsSwiper .swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    background: #D1D5DB;
    opacity: 0.5;
}

.brandsSwiper .swiper-pagination-bullet-active {
    background: #091033;
    opacity: 1;
}

@media (max-width: 688px) {
    .brandsSwiper .swiper-button-prev,
    .brandsSwiper .swiper-button-next {
        display: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.brandsSwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        centeredSlides: false,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                centeredSlides: false,
            },
            768: {
                slidesPerView: 3,
                centeredSlides: false,
            },
            1024: {
                slidesPerView: 5,
                centeredSlides: false,
            },
        }
    });
});
</script>
