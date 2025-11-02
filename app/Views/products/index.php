<!-- Page Header -->
<section class="bg-gradient-to-br from-primary-800 to-primary-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Garand 101</h1>
            <p class="text-xl md:text-2xl text-primary-100">A high-resolution fluxgate magnetometer</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                        <img src="/assets/images/photo_garand101_32s_bgcolor2.jpg" 
                             alt="Magnetometer Garand 101" 
                             class="w-full rounded-lg shadow-md mb-6">
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Introduction -->
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <p class="text-2xl font-bold text-primary-700 mb-6">
                            Magnetic detection can be easy and convenient!
                        </p>
                        
                        <!-- Download Button -->
                        <a href="/assets/pdf/garand101_product_presentation.pdf" 
                           target="_blank"
                           class="inline-flex items-center space-x-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition-all mb-8">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span>Download Product Presentation (PDF)</span>
                        </a>

                        <p class="text-gray-700 leading-relaxed mb-6">
                            <strong class="text-primary-700">Garand 101</strong> is the high-resolution fluxgate magnetometer-gradiometer. This unit measures disruptions in the earth's magnetic field caused by ferromagnetic objects. It provides reliable detection of ferromagnetic metals such as iron, steel, and nickel. The Garand 101 is designed as an one man rapid location and identification device. This device is user-friendly and lightweight. It has significant reliability and low-price.
                        </p>

                        <p class="text-gray-700 leading-relaxed mb-6">
                            <strong class="text-primary-700">The target areas:</strong> archaeological purposes, environmental, forensics, geological, civil engineering and peace-time military applications.
                        </p>

                        <p class="text-gray-700 leading-relaxed">
                            <strong class="text-primary-700">A new magnetic field measurement technology</strong> had been proposed and practically realized in Garand 101. It allows to significantly reduce the energy consumption and device weight. Moreover, this technology of measurement simplifies construction and maintenance and increases the working time of the product.
                        </p>
                    </div>

                    <!-- Advantages -->
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">
                            Garand 101 Advantages
                        </h2>
                        <p class="text-gray-700 mb-4">In comparison with another magnetometers and gradiometers:</p>
                        <ol class="space-y-3 list-decimal list-inside">
                            <li class="text-gray-700">A new magnetic field measurement technology.</li>
                            <li class="text-gray-700">The device is digital. It significantly increases noise stability of the magnetometer during use.</li>
                            <li class="text-gray-700">This magnetometer has a convenient system of result visualization and user-friendly interface. Due to this, the detection of objects becomes much easier.</li>
                            <li class="text-gray-700">It has a reliable and good solid design.</li>
                            <li class="text-gray-700">Used design solutions expand the detection area.</li>
                            <li class="text-gray-700">User-friendly "plug and play" system.</li>
                            <li class="text-gray-700">The low price.</li>
                        </ol>
                    </div>

                    <!-- More Info -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-primary-600 rounded-lg p-6">
                        <p class="text-gray-700">
                            <strong class="text-primary-700">For more information</strong> about magnetometer Garand 101, please visit our website 
                            <a href="https://gradiometr.com/" target="_blank" class="text-primary-600 hover:text-primary-700 underline font-semibold">
                                www.gradiometr.com
                            </a>
                        </p>
                    </div>

                    <!-- Photos Section -->
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-8">Photos of Garand 101</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php
                            $photos = [
                                'photo_garand101_5.jpg' => 'Front panel view of magnetometer Garand 101',
                                'photo_garand101_6.jpg' => 'Top, front and side view of magnetometer Garand 101',
                                'photo_garand101_7.jpg' => 'Front panel of magnetometer Garand 101',
                                'photo_garand101_8.jpg' => 'Close-up side view of magnetometer Garand 101',
                                'photo_garand101_10.jpg' => 'Front panel of magnetometer Garand 101',
                                'photo_garand101_11.jpg' => 'Rear and side view of magnetometer Garand 101',
                                'bag_2_forest.jpg' => 'Carrying case for Garand 101 gradiometer',
                            ];
                            
                            foreach ($photos as $photo => $alt):
                            ?>
                            <div class="group cursor-pointer">
                                <img src="/assets/images/<?= $photo ?>" 
                                     alt="<?= $alt ?>" 
                                     class="w-full h-64 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
