<?php
/**
 * Template part for displaying the footer content
 *
 * @package gnws
 */
?>

<footer class="bg-[#091033] text-white">
    <!-- Desktop Footer -->
    <div class="hidden lg:block py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-4">
                    <a href="/" class="inline-block mb-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="BOGOS Logo" class="h-10 w-full" />
                    </a>
                    <p class="text-gray-400 text-base mb-8 lg:w-[80%]">
                        Boost conversion rate and AOV by a Shopify bogo, buy x get y, free gift with purchase, discount, or bundle promotion with BOGOS App.
                    </p>
                    <a href="#" class="inline-flex items-center bg-white rounded-lg px-6 py-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/shops.svg" class="w-5 h-5 mr-3" alt="Shopify Icon" />
                        <span class="text-[#091033] font-normal">Find it on the <br/>
                         <span class="text-[#091033] font-semibold"> Shopify App Store</span>
                        </span>
                    </a>
                </div>

                <div class="col-span-8">
                    <div class="grid grid-cols-4 gap-8">
                        <div>
                            <h3 class="text-white font-semibold mb-6">Product</h3>
                            <ul class="space-y-4">
                                <li><a href="#features" class="text-gray-400 hover:text-white">Features</a></li>
                                <li><a href="#pricing" class="text-gray-400 hover:text-white">Pricing</a></li>
                                <li><a href="#shopify" class="text-gray-400 hover:text-white">Shopify App Store</a></li>
                                <li><a href="#demo" class="text-gray-400 hover:text-white">Demo Store</a></li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-white font-semibold mb-6">Resources</h3>
                            <ul class="space-y-4">
                                <li><a href="#blogs" class="text-gray-400 hover:text-white">Blogs</a></li>
                                <li><a href="#tutorials" class="text-gray-400 hover:text-white">Video tutorials</a></li>
                                <li><a href="#case-study" class="text-gray-400 hover:text-white">Case Study</a></li>
                                <li><a href="#guidebook" class="text-gray-400 hover:text-white">Guidebook</a></li>
                                <li><a href="#faqs" class="text-gray-400 hover:text-white">FAQs</a></li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-white font-semibold mb-6">Partners</h3>
                            <ul class="space-y-4">
                                <li><a href="#affiliate" class="text-gray-400 hover:text-white">Affiliate program</a></li>
                                <li><a href="#partners" class="text-gray-400 hover:text-white">Our Partners</a></li>
                                <li><a href="#secomapp" class="text-gray-400 hover:text-white">Secomapp</a></li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-white font-semibold mb-6">Our Company</h3>
                            <ul class="space-y-4">
                                <li><a href="#about" class="text-gray-400 hover:text-white">About us</a></li>
                                <li><a href="#news" class="text-gray-400 hover:text-white">News</a></li>
                                <li><a href="#contact" class="text-gray-400 hover:text-white">Contact us</a></li>
                                <li><a href="#privacy" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                                <li><a href="#terms" class="text-gray-400 hover:text-white">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:hidden py-8">
        <div class="container mx-auto px-4">
            <!-- Logo & Description -->
            <div class="mb-8">
                <a href="/" class="inline-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="BOGOS Logo" class="h-10 w-full" />
                </a>
                <p class="mt-3 text-sm text-gray-400 leading-[22px]">
                    Boost conversion rate and AOV by a Shopify bogo, buy x get y, free gift with purchase, discount, or bundle promotion with BOGOS App.
                </p>
                <a href="#" class="inline-flex items-center bg-white rounded-lg px-6 py-3 mt-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/shops.svg" class="w-5 h-5 mr-3" alt="Shopify Icon" />
                        <span class="text-[#091033] text-[8px] font-normal">Find it on the <br/>
                         <span class="text-[#091033] text-[10px] font-semibold"> Shopify App Store</span>
                        </span>
                    </a>
            </div>

            <!-- Mobile Navigation -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h3 class="text-sm font-semibold mb-3">Product</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#features" class="text-gray-400">Features</a></li>
                        <li><a href="#pricing" class="text-gray-400">Pricing</a></li>
                        <li><a href="#shopify" class="text-gray-400">Shopify App Store</a></li>
                        <li><a href="#demo" class="text-gray-400">Demo Store</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold mb-3">Resources</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#blogs" class="text-gray-400">Blogs</a></li>
                        <li><a href="#tutorials" class="text-gray-400">Video tutorials</a></li>
                        <li><a href="#case-study" class="text-gray-400">Case Study</a></li>
                        <li><a href="#guidebook" class="text-gray-400">Guidebook</a></li>
                        <li><a href="#faqs" class="text-gray-400">FAQs</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold mb-3">Partners</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#affiliate" class="text-gray-400">Affiliate program</a></li>
                        <li><a href="#partners" class="text-gray-400">Our Partners</a></li>
                        <li><a href="#secomapp" class="text-gray-400">Secomapp</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold mb-3">Our Company</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#about" class="text-gray-400">About us</a></li>
                        <li><a href="#news" class="text-gray-400">News</a></li>
                        <li><a href="#contact" class="text-gray-400">Contact us</a></li>
                        <li><a href="#privacy" class="text-gray-400">Privacy Policy</a></li>
                        <li><a href="#terms" class="text-gray-400">Terms & Condition</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-[#1E2544] bg-[#080F2E]">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-row justify-between items-center">
                <p class="text-white !text-[10px] md:!text-[14px]  mb-0">©2024 BOGOS: Free gift. All Rights Reserved</p>
                <div class="flex items-center space-x-6">
                    <a href="#facebook" class="text-gray-400 hover:text-white">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/facebook.svg" class="w-7 h-7" alt="Facebook" />
                    </a>
                    <a href="#linkedin" class="text-gray-400 hover:text-white">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/linkin.svg" class="w-7 h-7" alt="LinkedIn" />
                    </a>
                    <a href="#twitter" class="text-gray-400 hover:text-white">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/twitter.svg" class="w-7 h-7" alt="Twitter" />
                    </a>
                    <a href="#youtube" class="text-gray-400 hover:text-white">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/youtube.svg" class="w-7 h-7" alt="YouTube" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>