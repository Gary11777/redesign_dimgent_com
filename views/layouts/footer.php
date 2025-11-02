        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-gray-300 mt-12">
            <div class="container mx-auto px-4 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Company Info -->
                    <div>
                        <p class="font-semibold text-white mb-2">// <?= View::escape(View::config('site.name', '')) ?></p>
                        <p class="mb-2"><?= View::escape(View::config('site.title', '')) ?></p>
                        <p class="mb-2">E-mail:</p>
                        <img src="<?= View::image('mail_bottom.png') ?>" alt="E-mail" class="inline-block mb-2">
                        <p><?= View::escape(View::config('site.location', '')) ?></p>
                    </div>

                    <!-- Site Map -->
                    <div>
                        <p class="font-semibold mb-2">Site Map</p>
                        <ul class="space-y-1">
                            <li><a href="/" class="hover:text-white">Home</a></li>
                            <li><a href="/products" class="hover:text-white">Products</a></li>
                            <li><a href="/services" class="hover:text-white">Services</a></li>
                            <li><a href="/projects" class="hover:text-white">Projects</a></li>
                            <li><a href="/contacts" class="hover:text-white">Contacts</a></li>
                            <li><a href="/about" class="hover:text-white">About Us</a></li>
                        </ul>
                    </div>

                    <!-- Credits -->
                    <div class="flex items-end">
                        <p class="text-sm">
                            <a href="http://www.sitestar.by" class="hover:text-white">Website design by Sitestar.by</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

