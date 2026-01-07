

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-6 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Edit <?php echo e($section->section_name); ?></h1>
        
        <form action="<?php echo e(route('admin.landing-page.update', $section->id)); ?>" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-8">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="space-y-6">
                <!-- Image Upload (for hero section) -->
                <?php if($section->section_key === 'hero'): ?>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Hero Background Image</label>
                    <?php if($section->image_path): ?>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                            <img src="<?php echo e(asset('storage/' . $section->image_path)); ?>" alt="Current" class="max-w-md h-auto rounded-lg shadow-md">
                        </div>
                    <?php else: ?>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Using default image: <code>public/images/Web Design for course.png</code></p>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pixature-orange file:text-white hover:file:bg-orange-600">
                    <p class="text-xs text-gray-500 mt-1">Upload a new image to replace the current one</p>
                </div>
                <?php endif; ?>

                <!-- Text Fields -->
                <?php if($section->text_fields): ?>
                    <?php $__currentLoopData = $section->text_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <?php echo e(ucwords(str_replace('_', ' ', $key))); ?>

                                <?php if($key === 'main_headline'): ?>
                                    <span class="text-xs text-gray-500">(Use \n for line breaks)</span>
                                <?php endif; ?>
                            </label>
                            <?php if(is_array($value)): ?>
                                <!-- For arrays like sticky_notes, features, tools -->
                                <div class="space-y-2">
                                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="text" name="text_fields[<?php echo e($key); ?>][]" value="<?php echo e($item); ?>" 
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <button type="button" class="text-pixature-orange text-sm add-item" data-field="<?php echo e($key); ?>">+ Add Item</button>
                                </div>
                            <?php else: ?>
                                <textarea name="text_fields[<?php echo e($key); ?>]" rows="<?php echo e($key === 'main_headline' ? 3 : 2); ?>" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg"><?php echo e($value); ?></textarea>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <!-- Settings (for hero section - typing animation) -->
                <?php if($section->section_key === 'hero' && $section->settings): ?>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Settings</label>
                        <div class="space-y-2">
                            <?php $__currentLoopData = $section->settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="flex items-center">
                                    <input type="checkbox" name="settings[<?php echo e($key); ?>]" value="1" <?php echo e($value ? 'checked' : ''); ?> 
                                           class="rounded border-gray-300 text-pixature-orange focus:ring-pixature-orange">
                                    <span class="ml-2 text-gray-700"><?php echo e(ucwords(str_replace('_', ' ', $key))); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Display Order -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Display Order</label>
                    <input type="number" name="display_order" value="<?php echo e($section->display_order); ?>" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <!-- Is Active -->
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" <?php echo e($section->is_active ? 'checked' : ''); ?> 
                               class="rounded border-gray-300 text-pixature-orange focus:ring-pixature-orange">
                        <span class="ml-2 text-gray-700">Active</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-4">
                    <button type="submit" class="bg-pixature-orange text-white px-8 py-3 rounded-full font-bold hover:bg-orange-600 transition">
                        Update Section
                    </button>
                    <a href="<?php echo e(route('admin.landing-page.index')); ?>" class="bg-gray-300 text-gray-700 px-8 py-3 rounded-full font-bold hover:bg-gray-400 transition">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Add item functionality for arrays
    document.querySelectorAll('.add-item').forEach(button => {
        button.addEventListener('click', function() {
            const field = this.dataset.field;
            const container = this.previousElementSibling;
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = `text_fields[${field}][]`;
            newInput.className = 'w-full px-4 py-2 border border-gray-300 rounded-lg';
            newInput.placeholder = 'Enter new item';
            container.appendChild(newInput);
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares DEV- Chiki\Pixature web\resources\views/admin/landing-page/edit.blade.php ENDPATH**/ ?>