<?php
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold mb-6">Projects</h1>
            
            <ol class="space-y-6 list-decimal list-inside">
                <li class="font-semibold">Systems.
                    <ul class="ml-6 mt-2 space-y-2 font-normal list-disc">
                        <li>Control rooms with the use of the public telephone networks, GSM connection and radio channels with frequencies up to 900 MHz (for the use in various businesses: elevators, communal services (hydraulic lifting systems, engineering communications), water intake systems).</li>
                        <li>Automated microelectronic circuits testers, electronic boards testing.</li>
                    </ul>
                </li>
                <li class="font-semibold">Tools.
                    <ul class="ml-6 mt-2 space-y-2 font-normal list-disc">
                        <li>Testers for microelectronic circuits, electronic boards testing.</li>
                        <li>Tools for archaeological and geological use (gradiometers, electronic probes).</li>
                        <li>Remote-reading gauges to collect information from sensors.</li>
                    </ul>
                </li>
                <li class="font-semibold">Everyday technology.
                    <ul class="ml-6 mt-2 space-y-2 font-normal list-disc">
                        <li>Wireless headphones (for the hard of hearing and older persons).</li>
                        <li>Dimmers (remote control for lighting).</li>
                        <li>Radio extenders for electronic sensors, remote controls for garage gates, blinds etc.</li>
                    </ul>
                </li>
                <li class="font-semibold">Medical devices.
                    <ul class="ml-6 mt-2 space-y-2 font-normal list-disc">
                        <li>Pressure and pulse meters.</li>
                    </ul>
                </li>
            </ol>
        </div>

        <!-- Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">«Dimgent Technologies» is:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• More than 20 years of experience.</li>
                    <li>• More than 50 successfully completed projects.</li>
                    <li>• Experienced specialists.</li>
                    <li>• Guaranteed quality.</li>
                    <li>• Short turn-around times.</li>
                    <li>• Cost effective.</li>
                    <li class="mt-4"><a href="/about" class="text-blue-600 hover:underline">And more…</a></li>
                </ul>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600">
                <h4 class="font-semibold mb-4">We can provide:</h4>
                <ul class="space-y-2 text-sm">
                    <li>• The full cycle of electronic devices development (from concept to finished product).</li>
                    <li>• Provision of individual phases of development.</li>
                    <li>• Completion of uncompleted projects which have already been started.</li>
                    <li class="mt-4"><a href="/services" class="text-blue-600 hover:underline">And more…</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Portfolio Gallery (if projects JSON exists) -->
    <?php if (!empty($projects)): ?>
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Project Gallery</h2>
        <div x-data="{ selectedProject: null }" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($projects as $index => $project): ?>
            <div 
                @click="selectedProject = <?= $index ?>"
                class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-lg transition"
            >
                <?php if (!empty($project['image'])): ?>
                <img 
                    src="<?= View::escape($project['image']) ?>" 
                    alt="<?= View::escape($project['title'] ?? 'Project') ?>"
                    class="w-full h-48 object-cover"
                >
                <?php endif; ?>
                <div class="p-4">
                    <h3 class="font-semibold mb-2"><?= View::escape($project['title'] ?? 'Project') ?></h3>
                    <?php if (!empty($project['description'])): ?>
                    <p class="text-sm text-gray-600 line-clamp-2"><?= View::escape($project['description']) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Lightbox Modal -->
        <div 
            x-show="selectedProject !== null"
            x-cloak
            @click.self="selectedProject = null"
            class="fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center p-4"
        >
            <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-auto relative">
                <button 
                    @click="selectedProject = null"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl"
                >
                    &times;
                </button>
                
                <template x-if="selectedProject !== null">
                    <div class="p-6">
                        <?php if (!empty($projects)): ?>
                        <template x-for="(project, index) in <?= json_encode($projects) ?>">
                            <div x-show="selectedProject === index" class="text-center">
                                <img 
                                    :src="project.image || ''" 
                                    :alt="project.title || 'Project'"
                                    class="w-full max-h-96 object-contain mx-auto mb-4"
                                >
                                <h2 class="text-2xl font-bold mb-4" x-text="project.title || 'Project'"></h2>
                                <p class="text-gray-600 mb-4" x-text="project.description || ''"></p>
                            </div>
                        </template>
                        <?php endif; ?>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>

