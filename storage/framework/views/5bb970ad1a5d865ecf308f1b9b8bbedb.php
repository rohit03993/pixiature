

<?php $__env->startSection('content'); ?>
    <?php
        $hero = $sections['hero'] ?? null;
        $heroImage = $hero && $hero->image_path ? asset('storage/' . $hero->image_path) : asset('images/Web Design for course.png');
        $heroTexts = $hero && $hero->text_fields ? $hero->text_fields : [
            'tagline_left' => 'Create Like a Pro',
            'tagline_right' => 'Design Your Way Forward',
            'main_headline' => "Learn.\nDesign.\nGrow."
        ];
        $heroAnimation = $hero && $hero->settings ? ($hero->settings['typing_animation'] ?? true) : true;
        
        $ctaBar = $sections['cta_bar'] ?? null;
        $ctaText = $ctaBar && $ctaBar->text_fields ? ($ctaBar->text_fields['cta_text'] ?? 'Get Yourself Enrolled for the next batch') : 'Get Yourself Enrolled for the next batch';
    ?>

    <!-- Full Width Image - Desktop View (Same as original) -->
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

        <!-- Main Headline Overlay (Bottom Center) - "Learn. Design. Grow." -->
        <div class="absolute bottom-0 left-0 right-0 flex justify-center items-center z-20" 
             style="min-width: 1920px; height: 25%; padding-bottom: 8%; pointer-events: none;">
            <div class="typing-container">
                <?php if($heroAnimation): ?>
                    <span id="typing-text" class="text-white text-7xl md:text-9xl font-black" 
                          style="text-shadow: 4px 4px 8px rgba(0,0,0,0.9); line-height: 1.1; letter-spacing: 2px; display: inline-block; white-space: pre-line;">
                    </span>
                    <span class="typing-cursor" style="display: inline-block;"></span>
                <?php else: ?>
                    <span class="text-white text-7xl md:text-9xl font-black" 
                          style="text-shadow: 4px 4px 8px rgba(0,0,0,0.9); line-height: 1.1; letter-spacing: 2px; white-space: pre-line;">
                        <?php echo e($heroTexts['main_headline'] ?? "Learn.\nDesign.\nGrow."); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- CTA Bar Overlay (Positioned where it appears in the image) -->
        <?php
            $ctaBarSection = $sections['cta_bar'] ?? null;
            $showCtaBar = $ctaBarSection && ($ctaBarSection->settings['show'] ?? true);
        ?>
        <?php if($showCtaBar): ?>
        <div class="absolute" style="bottom: 15%; left: 50%; transform: translateX(-50%); z-20; min-width: 1920px;">
            <div class="bg-pixature-orange rounded-xl p-5 flex items-center justify-between shadow-2xl max-w-4xl mx-auto" style="background-color: rgba(255, 107, 53, 0.95);">
                <p class="text-white text-lg font-semibold ml-2"><?php echo e($ctaText); ?></p>
                <a href="#enroll" class="bg-white text-pixature-orange px-8 py-3 rounded-full font-bold hover:bg-gray-50 transition flex items-center gap-2 shadow-lg">
                    Enroll Now
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

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

    <?php if($heroAnimation): ?>
    <script>
        // Typing Animation for test page
        window.addEventListener('load', function() {
            console.log('Page loaded, initializing typing animation...');
            
            function typeText(element, text, speed = 100) {
                if (!element) {
                    console.error('Typing element not found');
                    return;
                }
                
                console.log('Starting typing animation with text:', text);
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
                    } else {
                        console.log('Typing animation complete');
                    }
                }
                
                type();
            }
            
            setTimeout(function() {
                const typingElement = document.getElementById('typing-text');
                console.log('Looking for #typing-text element:', typingElement);
                
                if (typingElement) {
                    const textToType = <?php echo json_encode($heroTexts['main_headline'] ?? "Learn.\nDesign.\nGrow."); ?>;
                    console.log('Found element, starting animation with:', textToType);
                    typeText(typingElement, textToType, 100);
                } else {
                    console.error('Element #typing-text not found!');
                    // Try again after a short delay
                    setTimeout(function() {
                        const retryElement = document.getElementById('typing-text');
                        if (retryElement) {
                            const textToType = <?php echo json_encode($heroTexts['main_headline'] ?? "Learn.\nDesign.\nGrow."); ?>;
                            typeText(retryElement, textToType, 100);
                        }
                    }, 500);
                }
            }, 1000);
        });
        
        // Also try on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const typingElement = document.getElementById('typing-text');
                if (typingElement && typingElement.innerHTML.trim() === '') {
                    const textToType = <?php echo json_encode($heroTexts['main_headline'] ?? "Learn.\nDesign.\nGrow."); ?>;
                    console.log('DOMContentLoaded - Starting animation');
                    
                    function typeText(element, text, speed = 100) {
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
                    
                    typeText(typingElement, textToType, 100);
                }
            }, 500);
        });
    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares DEV- Chiki\Pixature web\resources\views/test/index.blade.php ENDPATH**/ ?>