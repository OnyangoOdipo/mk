<div class="p-8">
    <h2 class="text-3xl font-bold mb-6 gradient-text text-center">Start Your Application</h2>
    
    <!-- Progress Steps -->
    <div class="flex justify-between mb-12 relative">
        <!-- Progress Bar -->
        <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 -translate-y-1/2"></div>
        <div class="absolute top-1/2 left-0 h-1 bg-blue-600 -translate-y-1/2 transition-all duration-500" 
             id="progressBar" style="width: 0%"></div>

        <!-- Steps -->
        <?php
        $steps = [
            ['number' => 1, 'label' => 'Personal Info'],
            ['number' => 2, 'label' => 'Travel Details'],
            ['number' => 3, 'label' => 'Documents'],
            ['number' => 4, 'label' => 'Payment']
        ];

        foreach ($steps as $index => $step) {
            $isActive = $index === 0 ? 'active' : '';
            $bgClass = $index === 0 ? 'bg-blue-600 text-white' : 'bg-gray-200';
            ?>
            <div class="step <?= $isActive ?> relative z-10">
                <div class="w-10 h-10 <?= $bgClass ?> rounded-full flex items-center justify-center font-bold">
                    <?= $step['number'] ?>
                </div>
                <div class="text-sm mt-2"><?= $step['label'] ?></div>
            </div>
        <?php } ?>
    </div>

    <!-- Form Steps Content -->
    <?php include 'form-steps.php'; ?>
</div> 