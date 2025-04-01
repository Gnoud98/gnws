<main class="container">
    <section class="mt-[50px]">
        <div class="flex flex-col items-center mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mb-10">
            <button
                class="flex items-center bg-[#2332D51C] text-left py-1 px-4 mb-3 rounded-full border-0">
                <img
                    src="https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/52d5e873-d8a4-4f65-a53b-5ca1fc87923f"
                    class="w-5 h-4 my-0.5 mr-2 object-fill"
                    alt="Shopify Icon" />
                <span class="text-[#2332D5] text-base text-center">
                    Built for Shopify
                </span>
            </button>

            <div class="relative flex flex-col items-center w-full py-3 mb-[40px]">
                <span
                    class="text-[#091033] text-3xl sm:text-4xl md:text-5xl lg:text-[56px] font-bold text-center mx-8 sm:mx-12 lg:mx-20 !leading-[68px]">
                    Scale Your Sales with<br />
                    <span class="text-[#2332D5]">
                        Powerful Shopify Promotion App
                    </span>
                </span>
                <img
                    src="https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/7a428715-c291-4326-9a69-20eee5fdc551"
                    class="w-full max-w-[420px] h-auto absolute bottom-0 right-8 sm:right-12 lg:right-20 object-fill"
                    alt="Underline Decoration" />
            </div>
				 <span class="text-[#6D757D] text-sm sm:text-base lg:text-lg text-center mb-10 mx-8 sm:mx-12 lg:mx-20 !leading-[28px] !lg:mt-[14px]">
                Ready to get more sales? BOGOS empowers you to create dynamic promotions—free gifts, bundles, <br/> discounts & upsells that motivate purchases and drive business growth.
           		 </span>

			<div
				class="flex justify-center items-center w-full max-w-md py-1 mb-10 mx-auto bg-gradient-to-b from-gradient-start via-gradient-middle to-gradient-end"
			>
                <img
                    src="https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/2d783bcb-ec1e-44c4-ac09-61f26325a291"
                    class="w-24 h-8 mr-3 object-fill"
                    alt="Rating Icon" />
                <span class="text-[#091033] text-sm sm:text-base font-bold mr-3">
                    4.9/5 rating
                </span>
                <img
                    src="https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/241bc703-c4d7-491e-bcfe-b90ef2867057"
                    class="w-1.5 h-1.5 mr-3 object-fill"
                    alt="Dot Separator" />
                <span class="text-[#091033] text-sm sm:text-base font-bold text-center">
                    2,500+ REVIEWS
                </span>
            </div>

            <div class="flex flex-col sm:flex-row items-center w-full max-w-[23rem] gap-5 mx-auto px-4 sm:px-0">
                <div class="flex-1 w-full bg-[#2332D5] py-3.5 rounded-[29px] shadow-[4px_38px_62px_rgba(0,0,0,0.1)]">
                    <span class="text-white text-sm sm:text-base font-bold text-center block mx-6">
                        Start Free Trial
                    </span>
                </div>
                <button
                    class="flex flex-1 items-center w-full bg-white text-left py-3.5 rounded-[30px] border-2 border-[#B6C3D1]">
                    <span class="flex-1 text-[#091033] text-sm sm:text-base font-bold text-center mx-4">
                        Watch Demo
                    </span>
                    <img
                        src="https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/b2fb01e8-7f4d-4828-9110-ae96d984a09a"
                        class="w-6 h-6 mr-4 object-fill"
                        alt="Play Icon" />
                </button>
            </div>
        </div>

		<div>

		</div>
    </section>

    <!-- Image Section -->
    <section class="">
        <div class=" mx-auto ">
            <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/imgHomePage1.png"
                alt="Homepage Image 1"
                class="w-full h-auto rounded-lg "
            />
        </div>
    </section>



</main>
<?php get_template_part('template-parts/components/brands-carousel'); ?>

<?php get_template_part('template-parts/components/hero-banner'); ?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>