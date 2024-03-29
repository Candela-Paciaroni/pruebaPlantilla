<?php
$tabs_id        = uniqid('orit-tabs-');
if(count($list) > 0):
    ?>
    <ul class="nav logisfareFAQTab logisfareHorizontalTabUL text-<?php echo $tab_menu_alignment; ?>" role="tablist">
        <?php 
            $i = 1;
            foreach ($list as $key => $item):
                $title      = (isset($item['tab_title'])) ? $item['tab_title'] : '';
                    ?>
                    <li class="nav-item" role="presentation">
                        <?php if($title != ''): ?>
                        <button class="<?php if($i == 1): ?>active<?php endif; ?>" id="<?php echo esc_attr($tabs_id . '-label-' . ($key + 1)); ?>" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" aria-selected="<?php echo ($i == 1 ? 'true' : 'false') ?>" tabindex="-1">
                            <?php echo logisfare_kses($title); ?>
                        </button>
                        <?php endif; ?>
                    </li>
                <?php
            $i++;
            endforeach;
        ?>
    </ul>
    <div class="tab-content logisfareHorizontalTabRow">
        <?php 
            $i = 1;
            foreach ($list as $key => $item):
                $tab_block  = (isset($item['tab_block'])) ? $item['tab_block'] : 0;
                if($tab_block > 0):
                    ?>
                    <div class="tab-pane fade <?php if($i == 1): ?> show active <?php endif; ?>" aria-labelledby="<?php echo esc_attr($tabs_id . '-label-' . ($key + 1)); ?>" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" role="tabpanel">
                        <div class="logisfareTabCon">
                            <?php
                                echo \Elementor\Plugin::$instance->frontend->get_builder_content( $tab_block );
                            ?>
                        </div>
                    </div>
                    <?php
                    $i++;
                endif;
            endforeach;
        ?>
    </div>
    <?php
endif;
