<?php
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold mb-6"><?= View::escape(View::config('site.name', '')) ?></h1>
            <p class="text-center mb-4">
                <strong><?= View::escape(View::config('site.location', '')) ?></strong><br>
                development center
            </p>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <p class="mb-4"><strong>«Dimgent Technologies»</strong> is a group of specialists working in the sector of the development of electronic devices.</p>
                <p class="mb-4">Dimgent Technologies Development Center: <strong><?= View::escape(View::config('site.location', '')) ?></strong>.</p>
                <p class="mb-4">We develop customized electronic devices.</p>
                <p class="mb-4">Our company includes engineers, designers and programmers.</p>
                <p class="mb-4">Our specialists have been creating electronic devices for more than twenty years.</p>
                <p class="mb-4">We have developed and taken part in the development of more than 50 projects over this time.</p>
                <p class="mb-4"><strong>«Dimgent Technologies»</strong> offers a comprehensive approach to the projects we work on. We can offer our clients both full-cycle electronic devices development (from concept to finished product) or carry out separate phases (developing the electric circuits of a device, software, drawings of printed circuit boards and so on).</p>
                
                <p class="mb-2"><strong>Our aim:</strong></p>
                <p class="mb-4">We want our clients to be fully satisfied with the results of our work.<br>
                We work with our clients until the product is exactly the one they want it to be.<br>
                We can also offer ideas for changes and improvements of the product being developed in order to make it even better.</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="mb-4"><strong><u>We have experience in various areas of electronic devices development, software development and circuitry design,</u></strong></p>
                <p class="mb-4"><strong><u>and in the development and manufacture of:</u></strong></p>
                <ul class="space-y-2 ml-6 list-disc">
                    <li>devices and embedded systems using microcontrollers and microprocessors;</li>
                    <li>analog electronic devices;</li>
                    <li>digital electronic devices (logical systems, programmable logical matrices, embedded systems);</li>
                    <li>telemechanics (telemetry and remote controls) using infra-red and radio channels (both industry standard protocols like Wi-Fi, Bluetooth, GSM, and non-standard protocols);</li>
                    <li>systems to digitize analog and speech signals;</li>
                    <li>software for various microcontrollers;</li>
                    <li>designs for printed circuit boards;</li>
                    <li>signal monitors for three-phase power circuits;</li>
                    <li>magnetic ferroprobe gauges (gradiometers) and electronic soil probes;</li>
                    <li>robotics;</li>
                    <li>automated systems to measure microchips and hardware devices;</li>
                </ul>
                <p class="mt-4">We are happy to work on both large and small projects, for big or small enterprises.</p>
                <p class="mt-2">We strive to ensure the lowest cost of the products we develop by careful selection of components (maintaining the balance between cost and quality).</p>
                <p class="mt-4 font-semibold">The main reasons to choose us are cost-effectiveness, quick turn-around times and high quality!</p>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">We can provide:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• The full cycle of electronic devices development (from concept to finished product).</li>
                    <li>• Provision of individual phases of development.</li>
                    <li>• Completion of uncompleted projects which have already been started.</li>
                    <li class="mt-4"><a href="/services" class="text-blue-600 hover:underline">And more…</a></li>
                </ul>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">«Dimgent Technologies» is:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• More than 20 years of experience.</li>
                    <li>• More than 50 successfully completed projects.</li>
                    <li>• Experienced specialists.</li>
                    <li>• Guaranteed quality.</li>
                    <li>• Short turn-around times.</li>
                    <li>• Cost effective.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>

