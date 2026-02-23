<?php
    $dirs = glob(get_stylesheet_directory() . '/functions/block-patterns/*', GLOB_ONLYDIR);

    foreach($dirs AS $dir){
        $basenameDir = basename($dir);

        register_block_pattern_category(
            'hvba-nds-' . $basenameDir,
            array( 'label' => esc_html__('NDS', 'hvba-nds') . '-' . ucfirst($basenameDir))
        );

        $files = glob($dir . '/*.html');
        foreach($files AS $file){
            $basenameFile = basename($file, '.html');

            register_block_pattern(
                'nds-sunflower-childtheme-2026-orange/' . $basenameFile,
                array(
                    'title'       => ucfirst($basenameFile),
                    'categories'  => ['hvba-nds-' . $basenameDir],
                    'content'     => file_get_contents($file),
                )
            );
        }
    }
