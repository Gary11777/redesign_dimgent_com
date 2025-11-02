<?php
/**
 * Home Page
 * Main landing page for Dimgent Technologies
 */

// Page metadata
$page_title = 'Electronics Development';
$page_description = 'Development of customized electronic devices, electrical equipment and devices. Full cycle of development (from mock-up to finished product). Full product support. Cost effective. Short turn-around times.';
$page_keywords = 'developing hardware devices, designing circuit boards, developing customized electronic devices, electric circuits, developing electronic equipment';

// Include header and navigation
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-dimgent-blue to-blue-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Dimgent Technologies</h1>
        <p class="text-xl md:text-2xl mb-8">Electronics Development</p>
        <p class="text-lg max-w-3xl mx-auto leading-relaxed">
            <strong>«Dimgent Technologies»</strong> is a group of specialists working in the sector of the development of electronic devices.
        </p>
    </div>
</section>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Introduction -->
    <div class="mb-12">
        <div class="prose max-w-none">
            <p class="text-lg text-justify">
                We can offer our clients both full-cycle electronic devices development (from concept to finished product) 
                or carry out separate phases (developing the electric circuits of a device, software, drawings of printed 
                circuit boards and so on).
            </p>
        </div>
    </div>

    <!-- New Product Highlight -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-12 border-l-4 border-dimgent-blue">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="flex-shrink-0">
                <img src="<?php echo asset('images/new.jpg'); ?>" alt="New magnetometer Garand 101" class="w-28 h-auto rounded">
            </div>
            <div>
                <p class="text-lg">
                    We have developed <a href="products.php" class="text-dimgent-blue hover:text-dimgent-blue-dark font-semibold">a new magnetometer Garand 101</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Development Trends -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-center mb-8 text-dimgent-navy">Development Trends:</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="bg-gray-100 border-b-2 border-dimgent-steel p-4 text-center rounded-lg hover:bg-white transition-colors">
                <p class="text-sm font-medium">Technical Specifications</p>
            </div>
            <div class="bg-gray-100 border-b-2 border-dimgent-steel p-4 text-center rounded-lg hover:bg-white transition-colors">
                <p class="text-sm font-medium">Electric Circuits</p>
            </div>
            <div class="bg-gray-100 border-b-2 border-dimgent-steel p-4 text-center rounded-lg hover:bg-white transition-colors">
                <p class="text-sm font-medium">Software</p>
            </div>
            <div class="bg-gray-100 border-b-2 border-dimgent-steel p-4 text-center rounded-lg hover:bg-white transition-colors">
                <p class="text-sm font-medium">Drafts of Printed Circuit Boards</p>
            </div>
            <div class="bg-gray-100 border-b-2 border-dimgent-steel p-4 text-center rounded-lg hover:bg-white transition-colors">
                <p class="text-sm font-medium">Structure and Design of Housings</p>
            </div>
            <div class="bg-gray-100 border-b-2 border-dimgent-steel p-4 text-center rounded-lg hover:bg-white transition-colors">
                <p class="text-sm font-medium">Test Models</p>
            </div>
        </div>
    </div>

    <!-- Services Overview -->
    <div class="bg-gradient-to-br from-blue-50 to-gray-50 rounded-lg p-8 mb-12">
        <h2 class="text-3xl font-bold text-center mb-8 text-dimgent-navy">Our Services</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Service 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow">
                <div class="text-dimgent-blue text-4xl mb-4 text-center">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-center">Full-Cycle Development</h3>
                <p class="text-gray-600 text-center">
                    From concept to finished product, we handle every phase of electronic device development.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow">
                <div class="text-dimgent-blue text-4xl mb-4 text-center">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-center">Software Development</h3>
                <p class="text-gray-600 text-center">
                    Custom software solutions for microcontrollers and embedded systems.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow">
                <div class="text-dimgent-blue text-4xl mb-4 text-center">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-center">Quality Assurance</h3>
                <p class="text-gray-600 text-center">
                    Rigorous testing and guaranteed quality for all our products and services.
                </p>
            </div>
        </div>
        <div class="text-center mt-8">
            <a href="services.php" class="inline-block bg-dimgent-blue hover:bg-dimgent-blue-dark text-white font-semibold px-8 py-3 rounded-lg transition-colors shadow-md hover:shadow-lg">
                View All Services
            </a>
        </div>
    </div>

    <!-- About Company Section -->
    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Left Column -->
        <div class="space-y-6">
            <div class="bg-white border border-dashed border-dimgent-steel rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-dimgent-navy">«Dimgent Technologies» is:</h3>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>More than 20 years of experience</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>More than 50 successfully completed projects</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Experienced specialists</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Guaranteed quality</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Short turn-around times</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">✓</span>
                        <span>Cost effective</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <a href="about.php" class="text-dimgent-blue hover:text-dimgent-blue-dark font-medium">Read more →</a>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <div class="bg-white border border-dashed border-dimgent-steel rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-dimgent-navy">We can provide:</h3>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>The full cycle of electronic devices development (from concept to finished product)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>Provision of individual phases of development</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-dimgent-blue mr-2">•</span>
                        <span>Completion of uncompleted projects which have already been started</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <a href="services.php" class="text-dimgent-blue hover:text-dimgent-blue-dark font-medium">Learn more →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-dimgent-navy text-white rounded-lg p-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Your Project?</h2>
        <p class="text-lg mb-6">Contact us today to discuss your electronic device development needs</p>
        <a href="contacts.php" class="inline-block bg-white text-dimgent-navy hover:bg-gray-100 font-semibold px-8 py-3 rounded-lg transition-colors shadow-md hover:shadow-lg">
            Get In Touch
        </a>
    </div>

</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
