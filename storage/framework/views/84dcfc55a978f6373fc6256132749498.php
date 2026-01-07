

<?php $__env->startSection('content'); ?>
    <?php
        $hero = \App\Models\LandingPageSection::getByKey('hero');
        $heroImage = $hero && $hero->image_path ? asset('storage/' . $hero->image_path) : asset('images/Web Design for course.png');
        $heroTexts = $hero && $hero->text_fields ? $hero->text_fields : [
            'tagline_left' => 'Create Like a Pro',
            'tagline_right' => 'Design Your Way Forward',
            'main_headline' => "Learn.\nDesign.\nGrow."
        ];
    ?>

    <!-- Full Width Image - Desktop View -->
    <div class="w-full overflow-x-auto relative">
        <img src="<?php echo e($heroImage); ?>" 
             alt="Pixature Design Course Landing Page" 
             class="w-full h-auto"
             style="min-width: 1920px; width: 100%; height: auto; display: block;">
        
        <!-- Logo Overlay (Top Left) -->
        <div class="absolute top-6 left-6 z-20" style="min-width: 1920px;">
            <div class="text-white text-2xl font-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Pixature</div>
        </div>

        <!-- Taglines Overlay (Top) -->
        <div class="absolute top-20 left-0 right-0 z-20 flex justify-between items-start px-8" style="min-width: 1920px;">
            <h2 class="text-white text-xl font-medium" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);"><?php echo e($heroTexts['tagline_left'] ?? 'Create Like a Pro'); ?></h2>
            <h2 class="text-white text-xl font-medium" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);"><?php echo e($heroTexts['tagline_right'] ?? 'Design Your Way Forward'); ?></h2>
        </div>
        
        <!-- Typing Animation Overlay for "Learn. Design. Grow." -->
        <div class="absolute bottom-0 left-0 right-0 flex justify-center items-center" 
             style="min-width: 1920px; height: 25%; padding-bottom: 10%; pointer-events: none; z-index: 100;">
            <div class="typing-container">
                <span id="typing-text" class="text-white text-7xl md:text-9xl font-black" 
                      style="text-shadow: 4px 4px 8px rgba(0,0,0,0.9); line-height: 1.1; letter-spacing: 2px; display: inline-block; white-space: pre-line;">
                </span>
                <span class="typing-cursor" style="display: inline-block;"></span>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            function typeText(element, text, speed = 100) {
                if (!element) return;
                
                let i = 0;
                const fullText = text;
                element.innerHTML = '';
                
                function type() {
                    if (i < fullText.length) {
                        if (fullText[i] === '\n') {
                            element.innerHTML += '<br>';
                        } else {
                            element.innerHTML += fullText[i];
                        }
                        i++;
                        setTimeout(type, speed);
                    }
                }
                
                type();
            }
            
            setTimeout(function() {
                const typingElement = document.getElementById('typing-text');
                if (typingElement) {
                    const textToType = <?php echo json_encode($heroTexts['main_headline'] ?? "Learn.\nDesign.\nGrow."); ?>;
                    typeText(typingElement, textToType, 100);
                }
            }, 1000);
        });
    </script>

    <!-- Enrollment Form Section (Below the image) -->
    <section id="enroll" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">Enroll Now</h2>
                
                <?php if(session('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('enroll.store')); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pixature-orange focus:border-transparent">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pixature-orange focus:border-transparent">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pixature-orange focus:border-transparent">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="program" class="block text-gray-700 font-semibold mb-2">Program</label>
                        <select id="program" name="program" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pixature-orange focus:border-transparent">
                            <option value="">Select a program</option>
                            <option value="Design Sprint - 30 Days">Design Sprint - 30 Days</option>
                        </select>
                        <?php $__errorArgs = ['program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="w-full bg-pixature-orange text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-orange-600 transition">
                        Submit Enrollment
                    </button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares DEV- Chiki\Pixature web\resources\views/landing/index.blade.php ENDPATH**/ ?>