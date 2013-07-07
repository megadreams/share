    <header class="header float-area">
        <a class="non-decoration" href="<?php echo $view_data['referer']; ?>">
            <div class="header-back-btn float">
                戻る
            </div>
        </a>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="header-pre-btn float">
            
        </div>
    </header>
<?php //タブ切り替えがいいな ?>


<?php $view = array('lend', 'borrow'); ?>
<?php foreach ($view as $type): ?>
    <section class="records">
        <?php foreach ($view_data['records'][$type] as $records): ?>
            <a href="<?php echo $view_data['base_url'] . 'lendborrow/detail/' . $type . '/' .$records->id;?>">
                <div class="user-record float-area">
                    <div class="recode-left float">
                        <span class="newline">
                            <?php echo date('Y-m-d', $records->date); ?>
                        </span>  
                        <span class="newline">
                            <?php echo date('H:i:s', $records->date); ?>
                        </span>  
                    </div>
                    
                    <div class="recode-center float">
                        <span class="newline">
                            <?php echo $records->category_mst->category_name; ?>　:　<?php echo $records->money; ?>円
                        </span>
                        <span class="newline">
                            <?php echo $records->memo; ?>
                        </span>  
                    </div>
                    <div class="recode-right float">
                            <span>
                                状態
                            </span>
                            <span class="newline">
                                <?php echo $view_data['lendborrow_status'][$type][$records->status]; ?></span>
                            </span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </section>
<?php endforeach; ?>
