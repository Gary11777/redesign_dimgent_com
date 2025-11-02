<?php
/**
 * Projects Page
 * Showcase of completed projects by Dimgent Technologies
 */

// Page metadata
$page_title = 'Projects';
$page_description = 'Our electronic devices development projects include: control panels; automated meters for integrated microsystems, testing circuit boards; gradiometers and electronic probes; devices for the remote collection of information from sensors, wireless headphones, dimmers and remote control for lighting systems; radio extenders.';
$page_keywords = 'automated meters, developing hardware devices, integral microsystems, developing electronic devices, dimmers, radio extenders, wireless headphones, gradiometers, electroprobes, control panels';

// Include header and navigation
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-dimgent-blue to-blue-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-center">Our Projects</h1>
        <p class="text-center text-lg mt-4">50+ Successfully Completed Projects</p>
    </div>
</section>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Sidebar -->
        <aside class="md:col-span-1 space-y-6">
            <!-- Company Benefits -->
            <div class="bg-white border border-dashed border-dimgent-steel rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-dimgent-navy">«Dimgent Technologies» is:</h3>
                <ul class="space-y-2 text-gray-700 text-sm">
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>More than 20 years of experience.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>More than 50 successfully completed projects.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Experienced specialists.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Guaranteed quality.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Short turn-around times.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Cost effective.</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <a href="about.php" class="text-dimgent-blue hover:text-dimgent-blue-dark font-medium text-sm">And more...</a>
                </div>
            </div>

            <!-- We can provide -->
            <div class="bg-white border border-dashed border-dimgent-steel rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-dimgent-navy">We can provide:</h3>
                <ul class="space-y-2 text-gray-700 text-sm">
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>The full cycle of electronic devices development (from concept to finished product).</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>Provision of individual phases of development.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>Completion of uncompleted projects which have already been started.</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <a href="services.php" class="text-dimgent-blue hover:text-dimgent-blue-dark font-medium text-sm">And more...</a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="md:col-span-2">
            <h2 class="text-3xl font-bold mb-6 text-dimgent-navy">Projects</h2>
            
            <!-- Projects List -->
            <div class="space-y-8">
                <!-- Category 1: Systems -->
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-dimgent-blue">
                    <h3 class="text-2xl font-bold mb-4 text-dimgent-navy flex items-center">
                        <span class="bg-dimgent-blue text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-lg">1</span>
                        Systems
                    </h3>
                    <ul class="space-y-4 ml-11">
                        <li class="flex items-start">
                            <span class="text-dimgent-blue mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Control rooms</strong> with the use of the public telephone networks, 
                                GSM connection and radio channels with frequencies up to 900 MHz (for the use in various businesses: 
                                elevators, communal services (hydraulic lifting systems, engineering communications), water intake systems).
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-dimgent-blue mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Automated microelectronic circuits testers</strong>, electronic boards testing.
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Category 2: Tools -->
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                    <h3 class="text-2xl font-bold mb-4 text-dimgent-navy flex items-center">
                        <span class="bg-green-500 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-lg">2</span>
                        Tools
                    </h3>
                    <ul class="space-y-4 ml-11">
                        <li class="flex items-start">
                            <span class="text-green-600 mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Testers for microelectronic circuits</strong>, electronic boards testing.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-600 mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Tools for archaeological and geological use</strong> (gradiometers, electronic probes).
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-600 mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Remote-reading gauges</strong> to collect information from sensors.
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Category 3: Everyday Technology -->
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
                    <h3 class="text-2xl font-bold mb-4 text-dimgent-navy flex items-center">
                        <span class="bg-purple-500 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-lg">3</span>
                        Everyday Technology
                    </h3>
                    <ul class="space-y-4 ml-11">
                        <li class="flex items-start">
                            <span class="text-purple-600 mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Wireless headphones</strong> (for the hard of hearing and older persons).
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-600 mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Dimmers</strong> (remote control for lighting).
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-600 mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Radio extenders</strong> for electronic sensors, remote controls for garage gates, blinds etc.
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Category 4: Medical Devices -->
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
                    <h3 class="text-2xl font-bold mb-4 text-dimgent-navy flex items-center">
                        <span class="bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-lg">4</span>
                        Medical Devices
                    </h3>
                    <ul class="space-y-4 ml-11">
                        <li class="flex items-start">
                            <span class="text-red-600 mr-3 mt-1">▸</span>
                            <div>
                                <strong class="text-gray-800">Pressure and pulse meters</strong>.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-dimgent-blue to-blue-600 text-white rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold mb-2">20+</div>
                    <div class="text-sm uppercase tracking-wide">Years Experience</div>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold mb-2">50+</div>
                    <div class="text-sm uppercase tracking-wide">Projects Completed</div>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold mb-2">100%</div>
                    <div class="text-sm uppercase tracking-wide">Success Rate</div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-12 bg-dimgent-navy text-white rounded-lg p-8 text-center">
                <h2 class="text-2xl font-bold mb-4">Have a Project in Mind?</h2>
                <p class="text-lg mb-6">Let's discuss how we can help bring your electronic device to life</p>
                <a href="contacts.php" class="inline-block bg-white text-dimgent-navy hover:bg-gray-100 font-semibold px-8 py-3 rounded-lg transition-colors shadow-md hover:shadow-lg">
                    Start Your Project
                </a>
            </div>
        </div>
    </div>

</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
