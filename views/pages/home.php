<?php $this->layout('layout') ?>

<?php $this->start('main') ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-center"><?= $this->e($this->config('site.name', '')) ?></h1>
        <p class="text-xl text-center text-gray-600 mb-8"><?= $this->e($this->config('site.tagline', '')) ?></p>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <p class="mb-4"><strong>«<?= $this->e($this->config('site.name', '')) ?>»</strong> – is a group of specialists working in the sector of the development of electronic devices.</p>
            <p class="mb-4">We can offer our clients both full-cycle electronic devices development (from concept to finished product) or carry out separate phases (developing the electric circuits of a device, software, drawings of printed circuit boards and so on).</p>
        </div>

        <h2 class="text-2xl font-semibold text-center mb-6">Development trends:</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
            <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                technical specifications
            </div>
            <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                electric circuits
            </div>
            <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                software
            </div>
            <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                drafts of printed circuit boards
            </div>
            <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                structure and design of housings
            </div>
            <div class="bg-gray-100 p-4 text-center rounded border-b-2 border-blue-600">
                test models
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>

