<?php
/**
 * Products Page
 * Showcasing Dimgent Technologies products
 */

// Page metadata
$page_title = 'Products';
$page_description = 'Products of Dimgent Technologies: magnetometer Garand 101';
$page_keywords = 'magnetometer, gradiometer, Garand 101, high-resolution, fluxgate';

// Include header and navigation
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-dimgent-blue to-blue-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-center">Our Products</h1>
    </div>
</section>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Garand 101 Product -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <!-- Product Image -->
        <div class="md:col-span-1">
            <div class="sticky top-20">
                <img src="<?php echo asset('images/photo_garand101_32s_bgcolor2.jpg'); ?>" 
                     alt="Magnetometer Garand 101" 
                     class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Product Details -->
        <div class="md:col-span-2">
            <h1 class="text-4xl font-bold mb-2 text-dimgent-navy">Garand 101</h1>
            <h2 class="text-2xl text-gray-600 mb-6">A High-Resolution Fluxgate Magnetometer</h2>
            
            <p class="text-xl text-dimgent-navy font-semibold mb-6">
                Magnetic detection can be easy and convenient!
            </p>

            <!-- Product Presentation Download -->
            <div class="bg-blue-50 border-l-4 border-dimgent-blue p-6 mb-8 rounded-r-lg">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <a href="<?php echo asset('images/garand101_product_presentation.pdf'); ?>" 
                           target="_blank" 
                           class="block">
                            <svg class="w-16 h-16 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                                <path d="M14 2v6h6M10 13h4m-4 4h4m-4-8h4"/>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo asset('images/garand101_product_presentation.pdf'); ?>" 
                           target="_blank" 
                           class="text-lg font-semibold text-dimgent-blue hover:text-dimgent-blue-dark">
                            Product Presentation
                        </a>
                        <p class="text-sm text-gray-600">Download PDF documentation for Garand 101</p>
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="prose max-w-none mb-8">
                <p class="text-lg text-justify mb-4">
                    <span class="font-semibold text-dimgent-navy">Garand 101</span> is the high-resolution fluxgate 
                    magnetometer-gradiometer. This unit measures disruptions in the earth's magnetic field caused by 
                    ferromagnetic objects. It provides reliable detection of ferromagnetic metals such as iron, steel, 
                    and nickel. The Garand 101 is designed as an one man rapid location and identification device. 
                    This device is user-friendly and lightweight. It has significant reliability and low-price.
                </p>

                <p class="text-lg text-justify mb-4">
                    <span class="font-semibold text-dimgent-navy">The target areas:</span> archaeological purposes, 
                    environmental, forensics, geological, civil engineering and peace-time military applications.
                </p>

                <p class="text-lg text-justify mb-4">
                    <span class="font-semibold text-dimgent-navy">A new magnetic field measurement technology</span> had 
                    been proposed and practically realized in Garand 101. It allows to significantly reduce the energy 
                    consumption and device weight. Moreover, this technology of measurement simplifies construction and 
                    maintenance and increases the working time of the product.
                </p>
            </div>

            <!-- Advantages -->
            <div class="bg-white border border-dimgent-steel rounded-lg p-6 mb-8">
                <h3 class="text-2xl font-bold mb-4 text-dimgent-navy">
                    In comparison with another magnetometers and gradiometers, Garand 101 has the following advantages:
                </h3>
                <ol class="list-decimal list-inside space-y-3 text-gray-700">
                    <li>A new magnetic field measurement technology.</li>
                    <li>The device is digital. It significantly increases noise stability of the magnetometer during use.</li>
                    <li>This magnetometer has a convenient system of result visualization and user-friendly interface. 
                        Due to this, the detection of objects becomes much easier.</li>
                    <li>It has a reliable and good solid design.</li>
                    <li>Used design solutions expand the detection area.</li>
                    <li>User-friendly "plug and play" system.</li>
                    <li>The low price.</li>
                </ol>
            </div>

            <!-- External Link -->
            <div class="bg-dimgent-blue text-white rounded-lg p-6 mb-8">
                <p class="text-lg">
                    <span class="font-semibold">For more information</span> about magnetometer Garand 101, 
                    please visit our website 
                    <a href="https://gradiometr.com/" 
                       target="_blank" 
                       class="underline hover:no-underline font-semibold">
                        www.gradiometr.com
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Product Photos Gallery -->
    <div class="border-t-2 border-gray-300 pt-12">
        <h2 class="text-3xl font-bold mb-8 text-dimgent-navy">Photos of Garand 101</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="<?php echo asset('images/photo_garand101_5.jpg'); ?>" 
                     alt="Garand 101 side view" 
                     class="w-full h-auto">
            </div>
            <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="<?php echo asset('images/photo_garand101_6.jpg'); ?>" 
                     alt="Garand 101 front view" 
                     class="w-full h-auto">
            </div>
            <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="<?php echo asset('images/photo_garand101_7.jpg'); ?>" 
                     alt="Garand 101 panel view" 
                     class="w-full h-auto">
            </div>
            <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="<?php echo asset('images/photo_garand101_8.jpg'); ?>" 
                     alt="Garand 101 close-up" 
                     class="w-full h-auto">
            </div>
            <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="<?php echo asset('images/photo_garand101_10.jpg'); ?>" 
                     alt="Garand 101 display panel" 
                     class="w-full h-auto">
            </div>
            <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="<?php echo asset('images/photo_garand101_11.jpg'); ?>" 
                     alt="Garand 101 rear view" 
                     class="w-full h-auto">
            </div>
            <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow sm:col-span-2 lg:col-span-1">
                <img src="<?php echo asset('images/bag_2_forest.jpg'); ?>" 
                     alt="Garand 101 carrying case" 
                     class="w-full h-auto">
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="mt-12 bg-gradient-to-r from-dimgent-blue to-blue-600 text-white rounded-lg p-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Interested in Garand 101?</h2>
        <p class="text-lg mb-6">Contact us for pricing, specifications, or to place an order</p>
        <a href="contacts.php" class="inline-block bg-white text-dimgent-blue hover:bg-gray-100 font-semibold px-8 py-3 rounded-lg transition-colors shadow-md hover:shadow-lg">
            Contact Us
        </a>
    </div>

</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
