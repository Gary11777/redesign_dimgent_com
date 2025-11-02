<?php
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold mb-2">Garand 101</h1>
            <h2 class="text-xl text-gray-600 mb-6">a high-resolution fluxgate magnetometer</h2>
            
            <p class="mb-4"><span class="text-lg font-bold text-blue-900">Magnetic detection can be easy and convenient!</span></p>
            
            <div class="bg-gray-100 rounded p-4 mb-6 flex items-center gap-4">
                <a href="<?= View::image('garand101_product_presentation.pdf') ?>" target="_blank" class="flex-shrink-0">
                    <img src="<?= View::image('download_button3.png') ?>" alt="Download PDF" class="w-32 h-auto">
                </a>
                <div>
                    <a href="<?= View::image('garand101_product_presentation.pdf') ?>" target="_blank" class="text-blue-600 hover:underline">
                        Product presentation
                    </a> of Garand 101
                </div>
            </div>

            <p class="mb-4"><span class="text-lg font-bold text-blue-900">Garand 101</span> is the high-resolution fluxgate magnetometer-gradiometer. This unit measures disruptions in the earth's magnetic field caused by ferromagnetic objects. It provides reliable detection of ferromagnetic metals such as iron, steel, and nickel. The Garand 101 is designed as an one man rapid location and identification device. This device is user-friendly and lightweight. It has significant reliability and low-price.</p>

            <p class="mb-4"><span class="text-lg font-bold text-blue-900">The target areas:</span> archaeological purposes, environmental, forensics, geological, civil engineering and peace-time military applications.</p>

            <p class="mb-4"><span class="text-lg font-bold text-blue-900">A new magnetic field measurement technology</span> had been proposed and practically realized in Garand 101. It allows to significantly reduce the energy consumption and device weight. Moreover, this technology of measurement simplifies construction and maintenance and increases the working time of the product.</p>

            <p class="mb-4">In comparison with another magnetometers and gradiometers, <span class="text-lg font-bold text-blue-900">Garand 101 has the following advantages:</span></p>

            <ol class="list-decimal list-inside space-y-2 mb-6 ml-4">
                <li>A new magnetic field measurement technology.</li>
                <li>The device is digital. It significantly increases noise stability of the magnetometer during use.</li>
                <li>This magnetometer has a convenient system of result visualization and user-friendly interface. Due to this, the detection of objects becomes much easier.</li>
                <li>It has a reliable and good solid design.</li>
                <li>Used design solutions expand the detection area.</li>
                <li>User-friendly "plug and play" system.</li>
                <li>The low price.</li>
            </ol>

            <p class="mb-6"><span class="text-lg font-bold text-blue-900">For more information</span> about magnetometer Garand 101, please visit our website <a href="https://gradiometr.com/" target="_blank" class="text-blue-600 hover:underline">www.gradiometr.com</a>.</p>

            <hr class="border-gray-300 my-8">

            <h2 class="text-2xl font-bold mb-6">Photos of Garand 101</h2>

            <div class="grid grid-cols-1 gap-4">
                <img src="<?= View::image('photo_garand101_5.jpg') ?>" alt="Garand 101 view" class="w-full rounded-lg shadow-md">
                <img src="<?= View::image('photo_garand101_6.jpg') ?>" alt="Garand 101 view" class="w-full rounded-lg shadow-md">
                <img src="<?= View::image('photo_garand101_7.jpg') ?>" alt="Garand 101 view" class="w-full rounded-lg shadow-md">
                <img src="<?= View::image('photo_garand101_8.jpg') ?>" alt="Garand 101 view" class="w-full rounded-lg shadow-md">
                <img src="<?= View::image('photo_garand101_10.jpg') ?>" alt="Garand 101 view" class="w-full rounded-lg shadow-md">
                <img src="<?= View::image('photo_garand101_11.jpg') ?>" alt="Garand 101 view" class="w-full rounded-lg shadow-md">
                <img src="<?= View::image('bag_2_forest.jpg') ?>" alt="Garand 101 bag" class="w-full rounded-lg shadow-md">
            </div>
        </div>

        <!-- Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <img src="<?= View::image('photo_garand101_32s_bgcolor2.jpg') ?>" alt="Garand 101" class="w-full rounded-lg mb-4">
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>

